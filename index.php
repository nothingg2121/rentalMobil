<?php 
session_start();
include('includes/config.php');
include('includes/format_rupiah.php');
error_reporting(0);

// Simple homepage stats (avoid “sepi” feel)
$totalMobil = 0;
$totalMerek = 0;
$totalBooking = 0;
if($koneksidb){
  $q1 = mysqli_query($koneksidb, "SELECT COUNT(*) AS c FROM mobil");
  if($q1){ $r1 = mysqli_fetch_array($q1); $totalMobil = intval($r1['c']); }

  $q2 = mysqli_query($koneksidb, "SELECT COUNT(*) AS c FROM merek");
  if($q2){ $r2 = mysqli_fetch_array($q2); $totalMerek = intval($r2['c']); }

  $q3 = mysqli_query($koneksidb, "SELECT COUNT(*) AS c FROM booking");
  if($q3){ $r3 = mysqli_fetch_array($q3); $totalBooking = intval($r3['c']); }
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Rental Mobil</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!-- Banners -->
<section id="banner" class="banner-section">
  <div class="container">
    <div class="div_zindex">
      <div class="row">
        <div class="col-md-5 col-md-push-7">
          <div class="banner_content">
            <h1>Cari Mobil untuk kenyamanan anda.</h1>
            <p>Kami Punya beberapa pilihan untuk anda. </p>
            <a href="car-listing.php" class="btn">Selengkapnya <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Banners --> 

<!-- Highlights -->
<section class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Rental Mobil yang Praktis & Terpercaya</h2>
        <p>Proses cepat, armada terawat, dan rincian biaya transparan.</p>
      </div>
    </div>

    <div class="row" style="margin-top:20px;">
      <div class="col-md-4 col-sm-6">
        <div class="panel panel-default">
          <div class="panel-body text-center">
            <i class="fa fa-car" aria-hidden="true" style="font-size:32px;"></i>
            <h4 style="margin-top:10px;">Armada Tersedia</h4>
            <p><strong><?php echo $totalMobil; ?></strong> mobil dari <strong><?php echo $totalMerek; ?></strong> merek</p>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6">
        <div class="panel panel-default">
          <div class="panel-body text-center">
            <i class="fa fa-calendar-check-o" aria-hidden="true" style="font-size:32px;"></i>
            <h4 style="margin-top:10px;">Cek Ketersediaan</h4>
            <p>Pilih tanggal mulai & selesai, lalu sistem cek otomatis.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6">
        <div class="panel panel-default">
          <div class="panel-body text-center">
            <i class="fa fa-print" aria-hidden="true" style="font-size:32px;"></i>
            <h4 style="margin-top:10px;">Bukti Bisa Dicetak</h4>
            <p>Setelah booking berhasil, Anda bisa cetak detail sewa.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row" style="margin-top:10px;">
      <div class="col-md-12 text-center">
        <small>Total transaksi tercatat: <?php echo $totalBooking; ?></small>
      </div>
    </div>
  </div>
</section>
<!-- /Highlights -->


<!-- Resent Cat-->
<section class="section-padding gray-bg">
  <div class="container">
    
    <!-- Section Title -->
    <div class="row" style="margin-bottom: 30px;">
      <div class="col-md-12">
        <h2 style="text-align: center; margin: 0 0 10px 0; font-weight: 700; color: #333;">Pilihan Mobil Terbaik Kami</h2>
        <p style="text-align: center; color: #666; margin: 0; font-size: 14px;">Armada lengkap dengan harga terjangkau dan pelayanan terbaik</p>
      </div>
    </div>

<?php 
$sql = "SELECT mobil.*, merek.* 
  FROM mobil, merek 
  WHERE merek.id_merek = mobil.id_merek 
  ORDER BY mobil.id_mobil DESC 
  LIMIT 9";
$query = mysqli_query($koneksidb,$sql);
if(mysqli_num_rows($query)>0)
{
?>

<div class="row">

<?php
$counter = 0;
while($results = mysqli_fetch_array($query))
{
$counter++;
?>  

<div class="col-xs-12 col-sm-6 col-md-4" style="margin-bottom: 30px;">
  <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: all 0.3s ease; height: 100%; display: flex; flex-direction: column; min-height: 460px;">
    
    <!-- Image Section -->
    <div style="position: relative; overflow: hidden; height: 220px; flex-shrink: 0; background: #f8f9fa;">
      <a href="vehical-details.php?vhid=<?php echo htmlentities($results['id_mobil']);?>" style="display: block; height: 100%; width: 100%;">
        <img src="admin/img/vehicleimages/<?php echo htmlentities($results['image1']);?>" alt="<?php echo htmlentities($results['nama_mobil']);?>" style="width: 100%; height: 100%; object-fit: cover; object-position: center; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
      </a>
      <div style="position: absolute; top: 10px; right: 10px; background: rgba(102, 126, 234, 0.95); color: white; padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 600;">
        Tahun <?php echo htmlentities($results['tahun']);?>
      </div>
      <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.85), transparent); color: white; padding: 12px 15px;">
        <div style="font-size: 11px; display: flex; justify-content: space-around; align-items: center;">
          <span style="display: flex; align-items: center; gap: 4px;"><i class="fa fa-car" style="font-size: 13px;"></i> <?php echo htmlentities($results['bb']);?></span>
          <span style="border-left: 1px solid rgba(255,255,255,0.3); height: 14px;"></span>
          <span style="display: flex; align-items: center; gap: 4px;"><i class="fa fa-users" style="font-size: 13px;"></i> <?php echo htmlentities($results['seating']);?> Orang</span>
        </div>
      </div>
    </div>
    
    <!-- Content Section -->
    <div style="padding: 18px; flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
      <div>
        <h6 style="margin: 0 0 10px 0; font-size: 16px; font-weight: 700; color: #333; min-height: 44px; line-height: 1.4; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
          <a href="vehical-details.php?vhid=<?php echo htmlentities($results['id_mobil']);?>" style="color: #333; text-decoration: none;"><?php echo htmlentities($results['nama_merek']);?> <?php echo htmlentities($results['nama_mobil']);?></a>
        </h6>
        <div style="font-size: 20px; font-weight: 700; color: #667eea; margin-bottom: 8px;">
          <?php echo htmlentities(format_rupiah($results['harga']));?><span style="font-size: 13px; color: #999; font-weight: 400;"> / Hari</span>
        </div>
        <p style="color: #777; font-size: 12px; margin: 0 0 12px 0; line-height: 1.6; min-height: 40px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
          <?php echo htmlentities(substr($results['deskripsi'],0,75));?>...
        </p>
      </div>
      <a href="vehical-details.php?vhid=<?php echo htmlentities($results['id_mobil']);?>" style="display: block; padding: 12px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: 600; text-align: center; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);" onmouseover="this.style.boxShadow='0 4px 12px rgba(102, 126, 234, 0.5)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.boxShadow='0 2px 8px rgba(102, 126, 234, 0.3)'; this.style.transform='translateY(0)'">
        Lihat Detail <i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
</div>

<?php 
// Add clearfix every 3 items untuk ensure proper grid
if($counter % 3 == 0) { 
  echo '<div class="clearfix visible-md visible-lg"></div>';
}
?>

<?php } ?>

</div>

<?php } ?>

  </div>
</section>
<!-- /Resent Cat --> 

<!-- How It Works Section -->
<section class="section-padding" style="background: white;">
  <div class="container">
    <div class="row" style="margin-bottom: 40px;">
      <div class="col-md-12 text-center">
        <h2 style="margin: 0 0 10px 0; color: #333; font-weight: 700;">Cara Menggunakan Layanan Kami</h2>
        <p style="color: #666; margin: 0; font-size: 14px;">Proses yang mudah dan transparan untuk kenyamanan Anda</p>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-3 col-sm-6" style="margin-bottom: 30px; text-align: center;">
        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 28px;">
          <i class="fa fa-search"></i>
        </div>
        <h5 style="margin: 0 0 10px 0; color: #333; font-weight: 700;">1. Cari Mobil</h5>
        <p style="color: #666; font-size: 12px; line-height: 1.6;">Pilih kendaraan favorit sesuai dengan kebutuhan perjalanan Anda</p>
      </div>
      
      <div class="col-md-3 col-sm-6" style="margin-bottom: 30px; text-align: center;">
        <div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 28px;">
          <i class="fa fa-calendar"></i>
        </div>
        <h5 style="margin: 0 0 10px 0; color: #333; font-weight: 700;">2. Pilih Tanggal</h5>
        <p style="color: #666; font-size: 12px; line-height: 1.6;">Tentukan tanggal mulai dan akhir sewa sesuai kebutuhan</p>
      </div>
      
      <div class="col-md-3 col-sm-6" style="margin-bottom: 30px; text-align: center;">
        <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 28px;">
          <i class="fa fa-credit-card"></i>
        </div>
        <h5 style="margin: 0 0 10px 0; color: #333; font-weight: 700;">3. Konfirmasi</h5>
        <p style="color: #666; font-size: 12px; line-height: 1.6;">Lakukan konfirmasi pemesanan dan pembayaran</p>
      </div>
      
      <div class="col-md-3 col-sm-6" style="margin-bottom: 30px; text-align: center;">
        <div style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); color: white; width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 28px;">
          <i class="fa fa-car"></i>
        </div>
        <h5 style="margin: 0 0 10px 0; color: #333; font-weight: 700;">4. Nikmati</h5>
        <p style="color: #666; font-size: 12px; line-height: 1.6;">Ambil kendaraan dan nikmati perjalanan Anda</p>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Us Section -->
<section class="section-padding gray-bg">
  <div class="container">
    <div class="row" style="margin-bottom: 40px;">
      <div class="col-md-12 text-center">
        <h2 style="margin: 0 0 10px 0; color: #333; font-weight: 700;">Mengapa Memilih Kami?</h2>
        <p style="color: #666; margin: 0; font-size: 14px;">Komitmen kami terhadap kualitas dan kepuasan pelanggan</p>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
        <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); border-top: 4px solid #667eea; transition: all 0.3s ease;">
          <i class="fa fa-check-circle" style="font-size: 28px; color: #667eea; margin-bottom: 15px; display: block;"></i>
          <h5 style="margin: 0 0 10px 0; color: #333; font-weight: 700;">Armada Terawat</h5>
          <p style="color: #666; font-size: 12px; line-height: 1.6; margin: 0;">Semua kendaraan secara rutin dirawat dan diservis untuk keselamatan Anda</p>
        </div>
      </div>
      
      <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
        <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); border-top: 4px solid #28a745; transition: all 0.3s ease;">
          <i class="fa fa-money" style="font-size: 28px; color: #28a745; margin-bottom: 15px; display: block;"></i>
          <h5 style="margin: 0 0 10px 0; color: #333; font-weight: 700;">Harga Kompetitif</h5>
          <p style="color: #666; font-size: 12px; line-height: 1.6; margin: 0;">Tarif terbaik dengan transparansi penuh, tanpa biaya tersembunyi</p>
        </div>
      </div>
      
      <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
        <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); border-top: 4px solid #ffc107; transition: all 0.3s ease;">
          <i class="fa fa-headphones" style="font-size: 28px; color: #ffc107; margin-bottom: 15px; display: block;"></i>
          <h5 style="margin: 0 0 10px 0; color: #333; font-weight: 700;">Dukungan 24/7</h5>
          <p style="color: #666; font-size: 12px; line-height: 1.6; margin: 0;">Tim customer service siap membantu kapan saja Anda membutuhkan</p>
        </div>
      </div>
      
      <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
        <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); border-top: 4px solid #e74c3c; transition: all 0.3s ease;">
          <i class="fa fa-shield" style="font-size: 28px; color: #e74c3c; margin-bottom: 15px; display: block;"></i>
          <h5 style="margin: 0 0 10px 0; color: #333; font-weight: 700;">Asuransi Lengkap</h5>
          <p style="color: #666; font-size: 12px; line-height: 1.6; margin: 0;">Perlindungan asuransi komprehensif untuk ketenangan pikiran Anda</p>
        </div>
      </div>
      
      <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
        <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); border-top: 4px solid #00bcd4; transition: all 0.3s ease;">
          <i class="fa fa-clock-o" style="font-size: 28px; color: #00bcd4; margin-bottom: 15px; display: block;"></i>
          <h5 style="margin: 0 0 10px 0; color: #333; font-weight: 700;">Fleksibel</h5>
          <p style="color: #666; font-size: 12px; line-height: 1.6; margin: 0;">Jadwal sewa yang fleksibel sesuai dengan kebutuhan Anda</p>
        </div>
      </div>
      
      <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
        <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); border-top: 4px solid #9c27b0; transition: all 0.3s ease;">
          <i class="fa fa-star" style="font-size: 28px; color: #9c27b0; margin-bottom: 15px; display: block;"></i>
          <h5 style="margin: 0 0 10px 0; color: #333; font-weight: 700;">Terpercaya</h5>
          <p style="color: #666; font-size: 12px; line-height: 1.6; margin: 0;">Dipercaya oleh ribuan pelanggan dan memiliki rating tinggi</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="section-padding" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2 style="margin: 0 0 10px 0; font-weight: 700; font-size: 28px;">Siap untuk Perjalanan Berikutnya?</h2>
        <p style="margin: 0; font-size: 14px; opacity: 0.95;">Jangan biarkan kesempatan berlalu. Booking mobil impian Anda sekarang dan dapatkan penawaran terbaik.</p>
      </div>
      <div class="col-md-4" style="display: flex; align-items: center; justify-content: flex-end;">
        <a href="car-listing.php" style="display: inline-block; background: white; color: #667eea; padding: 14px 35px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 14px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(255,255,255,0.2);">
          <i class="fa fa-arrow-right"></i> Jelajahi Semua Mobil
        </a>
      </div>
    </div>
  </div>
</section>


<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

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

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->
</html>