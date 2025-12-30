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
<title> Rental Mobil</title>
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
<?php include('includes/header.php');?>

<?php
$email=$_SESSION['ulogin'];  

// ensure cancellation requests table exists
$sqlCreate = "CREATE TABLE IF NOT EXISTS cancellation_requests (
	id INT AUTO_INCREMENT PRIMARY KEY,
	kode_booking VARCHAR(50) NOT NULL,
	email VARCHAR(255) NOT NULL,
	alasan TEXT,
	status VARCHAR(20) NOT NULL DEFAULT 'Pending',
	created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
mysqli_query($koneksidb,$sqlCreate);

// Handle cancellation request submission from riwayatsewa
if(isset($_POST['request_cancel'])){
	$kode_cancel = mysqli_real_escape_string($koneksidb, $_POST['kode_booking']);
	$alasan = mysqli_real_escape_string($koneksidb, $_POST['alasan']);
	$emailReq = $_SESSION['ulogin'];
	// prevent duplicate pending requests
	$check = "SELECT id FROM cancellation_requests WHERE kode_booking='$kode_cancel' AND status='Pending'";
	$rescheck = mysqli_query($koneksidb,$check);
	if(mysqli_num_rows($rescheck)>0){
		echo "<script>alert('Anda sudah memiliki permohonan pembatalan yang pending untuk booking ini.');</script>";
	} else {
		$ins = "INSERT INTO cancellation_requests (kode_booking,email,alasan) VALUES('$kode_cancel','$emailReq','$alasan')";
		if(mysqli_query($koneksidb,$ins)){
			echo "<script>alert('Permohonan pembatalan telah dikirim. Status: Pending.'); window.location=window.location.href;</script>";
		} else {
			echo "<script>alert('Gagal mengirim permohonan. Silahkan coba lagi.');</script>";
		}
	}
}

// Data akan ditampilkan pada loop tabel di bawah
?>
<section class="user_profile inner_pages">
<center><h3>Riwayat Sewa</h3></center>
	<div class="container">
	<table class="table table-striped table-bordered">
	<thead>
		<tr>    
			<th width="23" align="center">No</th>
			<th width="100">Kode Sewa</th>		
			<th width="132">Nama Mobil</th>
			<th width="80">Tgl. Mulai</th>
			<th width="100">Tgl. Selesai</th>
			<th width="50">Durasi</th>
			<th width="100">Biaya Mobil</th>
			<th width="110">Biaya Driver</th>
			<th width="100">Total Biaya</th>
			<th width="100">Status</th>
			<th width="50">Opsi</th>
		</tr>
	</thead>
	<?php
	$email=$_SESSION['ulogin'];  
	$sql1 = "SELECT booking.*, mobil.*, merek.*, users.nama_user
			FROM booking
			INNER JOIN mobil ON booking.id_mobil = mobil.id_mobil
			INNER JOIN merek ON merek.id_merek = mobil.id_merek
			LEFT JOIN users ON booking.email = users.email
			WHERE booking.email='$email'
			ORDER BY booking.tgl_booking DESC, booking.kode_booking DESC";
	$query1 = mysqli_query($koneksidb,$sql1);
	if(mysqli_num_rows($query1)!=0){
		$nomor = 0;
		while($result = mysqli_fetch_array($query1)){
			$harga	= $result['harga'];
			$durasi = $result['durasi'];
			$totalmobil = $durasi*$harga;
			$drivercharges = $result['driver'];
			$totalsewa = $totalmobil+$drivercharges;
			$tglmulai = strtotime($result['tgl_mulai']);
			$jmlhari  = 86400*1;
			$tgl	  = $tglmulai-$jmlhari;
			$tglhasil = date("Y-m-d",$tgl);
			$nomor++;
		?>
			<tr>
				<td align="center"><?php echo $nomor; ?></td>
				<td><?php echo $result['kode_booking']; ?></td>
				<td><?php echo $result['nama_mobil']; ?></td>
				<td><?php echo IndonesiaTgl($result['tgl_mulai']); ?></td>
				<td><?php echo IndonesiaTgl($result['tgl_selesai']); ?></td>
				<td><?php echo $result['durasi']; ?></td>
				<td><?php echo format_rupiah($totalmobil); ?></td>
				<td><?php echo format_rupiah($drivercharges); ?></td>
				<td><?php echo format_rupiah($totalsewa); ?></td>
				<td><?php echo $result['status']; ?></td>
				<td align="center">
				<?php 
					if($result['status']=="Sudah Dibayar"||$result['status']=="Selesai"){
					?>
					<a href="booking_detail.php?kode=<?php echo $result['kode_booking'];?>" class="glyphicon glyphicon-eye-open"></a>
					<?php 
					}else{
					?>
					<a href="booking_edit.php?kode=<?php echo $result['kode_booking'];?>" class="fa fa-edit"></a>&nbsp;&nbsp;&nbsp;
					<a href="booking_detail.php?kode=<?php echo $result['kode_booking'];?>" class="glyphicon glyphicon-eye-open"></a>
					<?php }?>
				</td>
			</tr>
			<tr>
				<td colspan="11">
					<!-- Cancellation form for this booking -->
					<?php if($result['status']!='Selesai'){ ?>
					<form method="post" class="form-inline">
						<input type="hidden" name="kode_booking" value="<?php echo $result['kode_booking']; ?>">
						<div class="form-group" style="width:70%; margin-right:10px;">
							<input type="text" name="alasan" class="form-control" placeholder="Alasan pembatalan (singkat)" style="width:100%" required>
						</div>
						<button type="submit" name="request_cancel" class="btn btn-danger">Ajukan Pembatalan</button>
					</form>
					<?php } else { echo '<em>Tidak dapat mengajukan pembatalan.</em>'; } ?>
				</td>
			</tr>
		<?php } ?>
		
	<?php
	}else{
	?>
		<tr>
			<td colspan="11" align="center"><b>Belum ada riwayat sewa.</b></td>
		</tr>
<?php }?>
	</table>
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