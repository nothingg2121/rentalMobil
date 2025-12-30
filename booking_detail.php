<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
if(strlen($_SESSION['ulogin'])==0){ 
	header('location:index.php');
}else{
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Rental Mobill</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->  
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php'); ?>

<?php

$kode = isset($_GET['kode'])? mysqli_real_escape_string($koneksidb, $_GET['kode']) : '';
// Ensure cancellation_requests table exists
$sqlCreate = "CREATE TABLE IF NOT EXISTS cancellation_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_booking VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    alasan TEXT,
    status VARCHAR(20) NOT NULL DEFAULT 'Pending',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
mysqli_query($koneksidb,$sqlCreate);

// Handle cancellation request submission (permohonan)
if(isset($_POST['request_cancel'])){
    $alasan = mysqli_real_escape_string($koneksidb, $_POST['alasan']);
    $emailReq = $_SESSION['ulogin'];
    $check = "SELECT id FROM cancellation_requests WHERE kode_booking='$kode' AND status='Pending'";
    $rescheck = mysqli_query($koneksidb,$check);
    if(mysqli_num_rows($rescheck)>0){
        $_SESSION['error_msg'] = 'Anda sudah memiliki permohonan pembatalan yang pending untuk booking ini.';
    } else {
        $ins = "INSERT INTO cancellation_requests (kode_booking,email,alasan) VALUES('$kode','$emailReq','$alasan')";
        if(mysqli_query($koneksidb,$ins)){
            $_SESSION['success_msg'] = 'Permohonan pembatalan telah dikirim. Status: Pending.';
        } else {
            $_SESSION['error_msg'] = 'Gagal mengirim permohonan. Silahkan coba lagi.';
        }
    }
    header("Location: booking_detail.php?kode=".$kode);
    exit;
}

// Fetch booking info
$sql1 	= "SELECT booking.*,mobil.*, merek.* FROM booking,mobil,merek WHERE booking.id_mobil=mobil.id_mobil AND merek.id_merek=mobil.id_merek and booking.kode_booking='$kode'";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);

// Handle direct cancellation (only allowed when unpaid / status = Menunggu Pembayaran)
if(isset($_POST['cancel_booking'])){
    // verify ownership
    if($result['email'] != $_SESSION['ulogin']){
        $_SESSION['error_msg'] = 'Hanya pemesan yang dapat membatalkan booking ini.';
    } elseif($result['status'] != 'Menunggu Pembayaran'){
        $_SESSION['error_msg'] = 'Pembatalan hanya bisa dilakukan untuk booking yang belum dibayar.';
    } else {
        $upd = "UPDATE booking SET status='Dibatalkan' WHERE kode_booking='".mysqli_real_escape_string($koneksidb,$kode)."'";
        $upd2 = "UPDATE cek_booking SET status='Dibatalkan' WHERE kode_booking='".mysqli_real_escape_string($koneksidb,$kode)."'";
        $ok1 = mysqli_query($koneksidb,$upd);
        $ok2 = mysqli_query($koneksidb,$upd2);
        if($ok1){
            $_SESSION['success_msg'] = 'Booking berhasil dibatalkan.';
        } else {
            $_SESSION['error_msg'] = 'Gagal membatalkan booking. Silahkan coba lagi.';
        }
    }
    header("Location: booking_detail.php?kode=".$kode);
    exit;
}
$harga	= $result['harga'];
$durasi = $result['durasi'];
$totalmobil = $durasi*$harga;
$drivercharges = $result['driver'];
$totalsewa = $totalmobil+$drivercharges;
$tglmulai = strtotime($result['tgl_mulai']);
$jmlhari  = 86400*1;
$tgl	  = $tglmulai-$jmlhari;
$tglhasil = date("Y-m-d",$tgl);

// decide if we should show a prominent success confirmation layout
$showSuccess = false;
if(isset($_SESSION['success_msg']) && !empty($_SESSION['success_msg'])){
    $showSuccess = true;
    $success_text = $_SESSION['success_msg'];
    unset($_SESSION['success_msg']);
}
?>
<section class="user_profile inner_pages">
    <div class="container">
    <?php if($showSuccess){ ?>
    <div class="row">
        <div class="col-md-6">
            <div class="product-listing-img"><img src="admin/img/vehicleimages/<?php echo htmlentities($result['image1']);?>" class="img-responsive" alt="Image" /></div>
            <div class="product-listing-content">
                <h4><?php echo htmlentities($result['nama_merek']);?> , <?php echo htmlentities($result['nama_mobil']);?></h4>
                <p class="list-price"><?php echo htmlentities(format_rupiah($result['harga']));?> / Hari</p>
            </div>
        </div>
        <div class="col-md-6">
            <h2>Berhasil Sewa</h2>
            <p class="text-success"><?php echo htmlentities($success_text);?></p>
            <ul class="list-unstyled">
                <li><strong>Tanggal Mulai:</strong> <?php echo htmlentities($result['tgl_mulai']);?></li>
                <li><strong>Tanggal Selesai:</strong> <?php echo htmlentities($result['tgl_selesai']);?></li>
                <li><strong>Durasi:</strong> <?php echo $durasi;?> Hari</li>
                <li><strong>Metode Pickup:</strong> <?php echo htmlentities($result['pickup']);?></li>
                <li><strong>Biaya Mobil (<?php echo $durasi;?> Hari):</strong> <?php echo format_rupiah($totalmobil);?></li>
                <li><strong>Biaya Driver (<?php echo $durasi;?> Hari):</strong> <?php echo format_rupiah($drivercharges);?></li>
                <li><strong>Total Biaya Sewa:</strong> <?php echo format_rupiah($totalsewa);?></li>
            </ul>
            <form method="post" onsubmit="return confirm('Anda yakin ingin membatalkan booking ini?');">
                <!-- cancel only if unpaid -->
                <?php if($result['status']=='Menunggu Pembayaran' && $result['email']==$_SESSION['ulogin']){ ?>
                    <button type="submit" name="cancel_booking" class="btn btn-danger">Batalkan Sewa</button>
                <?php } ?>
                <a href="index.php" class="btn btn-default">Kembali</a>
                <a href="detail_cetak.php?kode=<?php echo $kode;?>" target="_blank" class="btn btn-primary">Cetak</a>
            </form>
        </div>
    </div>
    <?php } else { ?>
        <center><h3>Detail Sewa</h3></center>
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($_SESSION['error_msg'])){ echo '<div class="alert alert-danger">'.htmlentities($_SESSION['error_msg']).'</div>'; unset($_SESSION['error_msg']); } ?>
                <!-- existing detail layout (compact) -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-4">
                            <img src="admin/img/vehicleimages/<?php echo htmlentities($result['image1']);?>" class="img-responsive" alt="Image" />
                        </div>
                        <div class="col-md-8">
                            <p><strong>Kode:</strong> <?php echo htmlentities($result['kode_booking']);?></p>
                            <p><strong>Mobil:</strong> <?php echo htmlentities($result['nama_merek']).', '.htmlentities($result['nama_mobil']);?></p>
                            <p><strong>Tanggal:</strong> <?php echo htmlentities($result['tgl_mulai']);?> - <?php echo htmlentities($result['tgl_selesai']);?></p>
                            <p><strong>Total:</strong> <?php echo format_rupiah($totalsewa);?></p>
                            <?php if($result['status']=='Menunggu Pembayaran' && $result['email']==$_SESSION['ulogin']){ ?>
                                <form method="post" style="display:inline-block">
                                    <button type="submit" name="cancel_booking" class="btn btn-danger btn-sm">Batalkan Sewa</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</section>
<!--/my-vehicles--> 
<?php include('includes/footer.php');?>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
<?php } ?>