<?php
session_start();
// show errors for debugging during development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');

if(strlen($_SESSION['ulogin'])==0){ 
	header('location:index.php');
}else{
    // Handle cancellation coming from this page
    if(isset($_POST['cancel_booking'])){
        $kodeCancel = mysqli_real_escape_string($koneksidb, $_POST['kode']);
        $upd = "UPDATE booking SET status='Dibatalkan' WHERE kode_booking='".$kodeCancel."'";
        $upd2 = "UPDATE cek_booking SET status='Dibatalkan' WHERE kode_booking='".$kodeCancel."'";
        $ok1 = mysqli_query($koneksidb,$upd);
        $ok2 = mysqli_query($koneksidb,$upd2);
        if($ok1){
            $_SESSION['success_msg'] = 'Booking berhasil dibatalkan.';
        } else {
            $_SESSION['error_msg'] = 'Gagal membatalkan booking.';
        }
        header('Location: booking_detail.php?kode='.urlencode($kodeCancel));
        exit;
    }

    if(isset($_POST['confirm'])){
    $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $driver=$_POST['driver'];
    $vid=$_POST['vid'];
    $pickup=$_POST['pickup'];
    // Always trust session email for ownership/history
    $email=$_SESSION['ulogin'];

    // server-side date checks (same as before)
    $minDate = date('Y-m-d', strtotime('+1 day'));
    if(strtotime($fromdate) < strtotime($minDate)){
        echo "<script>alert('Tanggal sewa minimal H-1! (mulai dari $minDate)'); window.history.back();</script>";
        exit;
    }
    if(strtotime($todate) < strtotime($fromdate)){
        echo "<script>alert('Tanggal selesai harus lebih besar dari tanggal mulai sewa!'); window.history.back();</script>";
        exit;
    }

    // calculate duration
    $start = new DateTime($fromdate);
    $finish = new DateTime($todate);
    $int = $start->diff($finish);
    $dur = $int->days;
    $durasi = $dur+1;

    // biaya driver
    $sqldriver = "SELECT * FROM tblpages WHERE id='0'";
    $querydriver = mysqli_query($koneksidb,$sqldriver);
    $resultdriver = mysqli_fetch_array($querydriver);
    $drive=$resultdriver['detail'];
    if($driver=="1"){
        $drivercharges = $drive*$durasi;
    }else{
        $drivercharges = 0;
    }

    $kode = buatKode("booking", "TRX");
    $status = "Menunggu Pembayaran";
    $tgl=date('Y-m-d');

    // Re-check availability at confirmation time to prevent double-booking
    $vidEsc = mysqli_real_escape_string($koneksidb, $vid);
    $fromEsc = mysqli_real_escape_string($koneksidb, $fromdate);
    $toEsc = mysqli_real_escape_string($koneksidb, $todate);
    $cek = "SELECT 1 FROM cek_booking WHERE id_mobil='$vidEsc' AND tgl_booking BETWEEN '$fromEsc' AND '$toEsc' AND status NOT IN ('Cancel','Dibatalkan') LIMIT 1";
    $cekQ = mysqli_query($koneksidb, $cek);
    if($cekQ && mysqli_num_rows($cekQ) > 0){
        echo "<script>alert('Maaf, mobil sudah terbooking pada tanggal yang dipilih. Silakan pilih tanggal lain.'); window.location='booking.php?vid=$vid';</script>";
        exit;
    }

    $pickupEsc = mysqli_real_escape_string($koneksidb, $pickup);
    $emailEsc = mysqli_real_escape_string($koneksidb, $email);

    // Atomic write: either booking + all cek_booking rows succeed, or none
    mysqli_begin_transaction($koneksidb);
    try {
        $sql = "INSERT INTO booking (kode_booking,id_mobil,tgl_mulai,tgl_selesai,durasi,driver,status,email,pickup,tgl_booking,bukti_bayar)
                VALUES('$kode','$vidEsc','$fromEsc','$toEsc','$durasi','$drivercharges','$status','$emailEsc','$pickupEsc','$tgl','')";
        $query = mysqli_query($koneksidb,$sql);
        if(!$query){
            throw new Exception('Gagal menyimpan booking.');
        }

        for($i=0;$i<$durasi;$i++){
            $tglmulai = strtotime($fromdate);
            $jmlhari  = 86400*$i;
            $tglLoop  = $tglmulai+$jmlhari;
            $tglhasil = date("Y-m-d",$tglLoop);
            $tglhasilEsc = mysqli_real_escape_string($koneksidb, $tglhasil);
            $sql1 ="INSERT INTO cek_booking (kode_booking,id_mobil,tgl_booking,status)VALUES('$kode','$vidEsc','$tglhasilEsc','$status')";
            $query1 = mysqli_query($koneksidb,$sql1);
            if(!$query1){
                throw new Exception('Gagal mengunci tanggal booking.');
            }
        }

        mysqli_commit($koneksidb);

        // Redirect to detail page (has Print button) and makes sure it appears in Riwayat Sewa
        $_SESSION['success_msg'] = 'Mobil berhasil disewa. Kode booking: '.$kode;
        header('Location: booking_detail.php?kode='.urlencode($kode));
        exit;
    } catch (Exception $e) {
        mysqli_rollback($koneksidb);
        $_SESSION['error_msg'] = 'Ooops, terjadi kesalahan. Silahkan coba lagi.';
        header("Location: booking_confirm.php?vid=$vid&fromdate=".urlencode($fromdate)."&todate=".urlencode($todate));
        exit;
    }
    } else {
        // If accessed directly without POST data show a helpful message (avoid blank page)
        echo '<!doctype html><html><head><meta charset="utf-8"><title>Booking</title></head><body>';
        echo '<div style="padding:40px;font-family:Arial,Helvetica,sans-serif">';
        echo '<h2>Halaman Booking</h2>';
        echo '<p>Tidak ada data konfirmasi yang diterima. Silakan kembali ke halaman pemesanan.</p>';
        echo '<p><a href="booking_ready.php">Kembali ke Pemesanan</a> | <a href="index.php">Beranda</a></p>';
        echo '</div></body></html>';
        exit;
    }
}
?>