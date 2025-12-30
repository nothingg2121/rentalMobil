<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');

if(strlen($_SESSION['ulogin'])==0){ 
	header('location:index.php');
}else{
// Accept params from GET or fallback to session
$vid = isset($_GET['vid']) ? intval($_GET['vid']) : 0;
$mulai = isset($_GET['fromdate']) ? trim($_GET['fromdate']) : (isset($_GET['mulai']) ? trim($_GET['mulai']) : '');
$selesai = isset($_GET['todate']) ? trim($_GET['todate']) : (isset($_GET['selesai']) ? trim($_GET['selesai']) : '');
$driverRaw = isset($_GET['driver']) ? trim((string)$_GET['driver']) : '1';
$driver = ($driverRaw === '0') ? '0' : '1';
$pickup = isset($_GET['pickup']) ? trim($_GET['pickup']) : 'Ambil Sendiri';
$email = $_SESSION['ulogin'];

if($vid<=0){
    echo "<script>alert('ID mobil tidak valid.'); window.location='index.php';</script>";
    exit;
}

if($mulai==='' || $selesai===''){
  echo "<script>alert('Tanggal mulai/selesai tidak valid. Silakan ulangi proses pemesanan.'); window.location='booking.php?vid=".$vid."';</script>";
  exit;
}

// compute durations and totals similar to booking_ready
$start = new DateTime($mulai);
$finish = new DateTime($selesai);
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

$sql1 = "SELECT mobil.*,merek.* FROM mobil,merek WHERE merek.id_merek=mobil.id_merek and mobil.id_mobil='$vid'";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);
$harga = $result['harga'];
$totalmobil = $durasi*$harga;
$totalsewa = $totalmobil+$drivercharges;
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Konfirmasi Sewa</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
</head>
<body>
<?php include('includes/header.php');?>
<section class="user_profile inner_pages">
  <div class="container">
    <div class="col-md-6 col-sm-8">
      <div class="product-listing-img"><img src="admin/img/vehicleimages/<?php echo htmlentities($result['image1']);?>" class="img-responsive" alt="Image" /> </div>
      <div class="product-listing-content">
        <h5><?php echo htmlentities($result['nama_merek']);?> , <?php echo htmlentities($result['nama_mobil']);?></h5>
        <p class="list-price"><?php echo htmlentities(format_rupiah($result['harga']));?> / Hari</p>
      </div>
    </div>

    <div class="user_profile_info">  
      <div class="col-md-12 col-sm-10">
        <h3>Konfirmasi Rincian Pemesanan</h3>
        <form method="post" action="booking_complete.php">
          <input type="hidden" name="vid" value="<?php echo $vid;?>">
          <input type="hidden" name="fromdate" value="<?php echo $mulai;?>">
          <input type="hidden" name="todate" value="<?php echo $selesai;?>">
          <input type="hidden" name="driver" value="<?php echo $driver;?>">
          <input type="hidden" name="pickup" value="<?php echo htmlspecialchars($pickup);?>">
          <input type="hidden" name="email" value="<?php echo $email;?>">

          <p><strong>Tanggal Mulai:</strong> <?php echo htmlentities($mulai);?></p>
          <p><strong>Tanggal Selesai:</strong> <?php echo htmlentities($selesai);?></p>
          <p><strong>Durasi:</strong> <?php echo $durasi;?> Hari</p>
          <p><strong>Metode Pickup:</strong> <?php echo htmlentities($pickup);?></p>
          <p><strong>Biaya Mobil (<?php echo $durasi;?> Hari):</strong> <?php echo format_rupiah($totalmobil);?></p>
          <p><strong>Biaya Driver (<?php echo $durasi;?> Hari):</strong> <?php echo format_rupiah($drivercharges);?></p>
          <p><strong>Total Biaya Sewa:</strong> <?php echo format_rupiah($totalsewa);?></p>

          <div class="form-group">
            <button type="submit" name="confirm" class="btn btn-success">Konfirmasi Sewa</button>
            <a href="booking_ready.php?vid=<?php echo $vid;?>&mulai=<?php echo $mulai;?>&selesai=<?php echo $selesai;?>&driver=<?php echo $driver;?>&pickup=<?php echo urlencode($pickup);?>" class="btn btn-default">Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php include('includes/footer.php');?>
</body>
</html>
<?php } ?>