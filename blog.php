<?php 
session_start();
include('includes/config.php');
include('includes/format_rupiah.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Blog - Car Rental Portal</title>
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

<!-- Banner -->
<section id="banner" class="banner-section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 60px 0; color: white;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 style="margin: 0 0 15px 0; font-size: 36px; font-weight: 700;">Blog & Artikel</h1>
        <p style="margin: 0; font-size: 14px; opacity: 0.9;">Tips, tutorial, dan informasi menarik seputar rental mobil</p>
      </div>
    </div>
  </div>
</section>

<!-- Blog Section -->
<section class="section-padding">
  <div class="container">
    <div class="row">
      <!-- Main Content -->
      <div class="col-md-8">
        <!-- Blog Post 1 -->
        <article style="background: white; padding: 30px; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.08);">
          <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 250px; border-radius: 8px; margin-bottom: 20px; display: flex; align-items: center; justify-content: center; color: white;">
            <span style="font-size: 60px;"><i class="fa fa-road"></i></span>
          </div>
          <span style="display: inline-block; background: #667eea; color: white; padding: 5px 15px; border-radius: 20px; font-size: 11px; font-weight: 600; margin-bottom: 15px;">Tips Perjalanan</span>
          <h3 style="margin: 0 0 10px 0; color: #333; font-weight: 700;">5 Tips Perjalanan Jauh dengan Aman dan Nyaman</h3>
          <p style="color: #999; margin: 0 0 15px 0; font-size: 12px;">
            <i class="fa fa-calendar"></i> 28 Desember 2025 | <i class="fa fa-user"></i> Admin
          </p>
          <p style="color: #666; line-height: 1.8; margin: 0 0 15px 0;">
            Perjalanan jauh memerlukan persiapan matang agar pengalaman berkendara menjadi menyenangkan dan aman. Berikut adalah tips-tips penting yang perlu Anda perhatikan sebelum memulai perjalanan jauh dengan mobil rental kami...
          </p>
          <a href="#" style="display: inline-block; color: #667eea; text-decoration: none; font-weight: 600; font-size: 13px;">Baca Selengkapnya <i class="fa fa-arrow-right"></i></a>
        </article>

        <!-- Blog Post 2 -->
        <article style="background: white; padding: 30px; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.08);">
          <div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); height: 250px; border-radius: 8px; margin-bottom: 20px; display: flex; align-items: center; justify-content: center; color: white;">
            <span style="font-size: 60px;"><i class="fa fa-wrench"></i></span>
          </div>
          <span style="display: inline-block; background: #f5576c; color: white; padding: 5px 15px; border-radius: 20px; font-size: 11px; font-weight: 600; margin-bottom: 15px;">Perawatan Mobil</span>
          <h3 style="margin: 0 0 10px 0; color: #333; font-weight: 700;">Cara Merawat Mobil Rental Agar Awet</h3>
          <p style="color: #999; margin: 0 0 15px 0; font-size: 12px;">
            <i class="fa fa-calendar"></i> 26 Desember 2025 | <i class="fa fa-user"></i> Admin
          </p>
          <p style="color: #666; line-height: 1.8; margin: 0 0 15px 0;">
            Merawat mobil rental adalah tanggung jawab bersama untuk menjaga kondisi kendaraan tetap prima. Kami memberikan panduan lengkap tentang cara merawat mobil rental kami dengan baik agar tetap aman dan nyaman...
          </p>
          <a href="#" style="display: inline-block; color: #667eea; text-decoration: none; font-weight: 600; font-size: 13px;">Baca Selengkapnya <i class="fa fa-arrow-right"></i></a>
        </article>

        <!-- Blog Post 3 -->
        <article style="background: white; padding: 30px; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.08);">
          <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); height: 250px; border-radius: 8px; margin-bottom: 20px; display: flex; align-items: center; justify-content: center; color: white;">
            <span style="font-size: 60px;"><i class="fa fa-tag"></i></span>
          </div>
          <span style="display: inline-block; background: #00bcd4; color: white; padding: 5px 15px; border-radius: 20px; font-size: 11px; font-weight: 600; margin-bottom: 15px;">Promo Terbaru</span>
          <h3 style="margin: 0 0 10px 0; color: #333; font-weight: 700;">Promo Spesial: Diskon 30% untuk Sewa Bulanan</h3>
          <p style="color: #999; margin: 0 0 15px 0; font-size: 12px;">
            <i class="fa fa-calendar"></i> 24 Desember 2025 | <i class="fa fa-user"></i> Admin
          </p>
          <p style="color: #666; line-height: 1.8; margin: 0 0 15px 0;">
            Rayakan akhir tahun dengan promo spektakuler! Dapatkan diskon hingga 30% untuk semua jenis mobil dengan paket sewa bulanan. Penawaran terbatas hanya untuk 100 penyewaan pertama. Jangan lewatkan kesempatan emas ini...
          </p>
          <a href="#" style="display: inline-block; color: #667eea; text-decoration: none; font-weight: 600; font-size: 13px;">Baca Selengkapnya <i class="fa fa-arrow-right"></i></a>
        </article>

        <!-- Blog Post 4 -->
        <article style="background: white; padding: 30px; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.08);">
          <div style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); height: 250px; border-radius: 8px; margin-bottom: 20px; display: flex; align-items: center; justify-content: center; color: white;">
            <span style="font-size: 60px;"><i class="fa fa-star"></i></span>
          </div>
          <span style="display: inline-block; background: #ffc107; color: #333; padding: 5px 15px; border-radius: 20px; font-size: 11px; font-weight: 600; margin-bottom: 15px;">Testimoni Pelanggan</span>
          <h3 style="margin: 0 0 10px 0; color: #333; font-weight: 700;">Pengalaman Mengesankan Pelanggan Setia Kami</h3>
          <p style="color: #999; margin: 0 0 15px 0; font-size: 12px;">
            <i class="fa fa-calendar"></i> 22 Desember 2025 | <i class="fa fa-user"></i> Admin
          </p>
          <p style="color: #666; line-height: 1.8; margin: 0 0 15px 0;">
            Kepuasan pelanggan adalah prioritas utama kami. Baca kisah-kisah inspiratif dari para pelanggan yang telah merasakan pengalaman luar biasa dengan layanan rental mobil kami. Dari perjalanan liburan keluarga hingga bisnis...
          </p>
          <a href="#" style="display: inline-block; color: #667eea; text-decoration: none; font-weight: 600; font-size: 13px;">Baca Selengkapnya <i class="fa fa-arrow-right"></i></a>
        </article>

      </div>

      <!-- Sidebar -->
      <div class="col-md-4">
        <!-- Search Box -->
        <div style="background: white; padding: 25px; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.08);">
          <h5 style="margin: 0 0 15px 0; color: #333; font-weight: 700;">Cari Artikel</h5>
          <form method="get" style="display: flex;">
            <input type="text" name="search" placeholder="Cari artikel..." style="flex: 1; padding: 10px; border: 1px solid #ddd; border-radius: 4px 0 0 4px; font-size: 12px;">
            <button type="submit" style="padding: 10px 15px; background: #667eea; color: white; border: none; border-radius: 0 4px 4px 0; cursor: pointer; font-weight: 600;">
              <i class="fa fa-search"></i>
            </button>
          </form>
        </div>

        <!-- Categories -->
        <div style="background: white; padding: 25px; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.08);">
          <h5 style="margin: 0 0 15px 0; color: #333; font-weight: 700;">Kategori</h5>
          <ul style="list-style: none; padding: 0; margin: 0;">
            <li style="margin-bottom: 12px;">
              <a href="blog.php" style="display: flex; justify-content: space-between; align-items: center; color: #666; text-decoration: none; padding: 8px 12px; border-radius: 4px; transition: all 0.3s; font-size: 12px;">
                <span><i class="fa fa-folder" style="margin-right: 8px; color: #667eea;"></i>Semua Artikel</span>
                <span style="background: #667eea; color: white; padding: 2px 8px; border-radius: 3px; font-size: 11px;">4</span>
              </a>
            </li>
            <li style="margin-bottom: 12px;">
              <a href="blog.php?cat=tips" style="display: flex; justify-content: space-between; align-items: center; color: #666; text-decoration: none; padding: 8px 12px; border-radius: 4px; transition: all 0.3s; font-size: 12px;">
                <span><i class="fa fa-lightbulb-o" style="margin-right: 8px; color: #667eea;"></i>Tips Perjalanan</span>
                <span style="background: #667eea; color: white; padding: 2px 8px; border-radius: 3px; font-size: 11px;">1</span>
              </a>
            </li>
            <li style="margin-bottom: 12px;">
              <a href="blog.php?cat=perawatan" style="display: flex; justify-content: space-between; align-items: center; color: #666; text-decoration: none; padding: 8px 12px; border-radius: 4px; transition: all 0.3s; font-size: 12px;">
                <span><i class="fa fa-cog" style="margin-right: 8px; color: #667eea;"></i>Perawatan Mobil</span>
                <span style="background: #667eea; color: white; padding: 2px 8px; border-radius: 3px; font-size: 11px;">1</span>
              </a>
            </li>
            <li style="margin-bottom: 12px;">
              <a href="blog.php?cat=promo" style="display: flex; justify-content: space-between; align-items: center; color: #666; text-decoration: none; padding: 8px 12px; border-radius: 4px; transition: all 0.3s; font-size: 12px;">
                <span><i class="fa fa-gift" style="margin-right: 8px; color: #667eea;"></i>Promo Terbaru</span>
                <span style="background: #667eea; color: white; padding: 2px 8px; border-radius: 3px; font-size: 11px;">1</span>
              </a>
            </li>
            <li>
              <a href="blog.php?cat=testimonial" style="display: flex; justify-content: space-between; align-items: center; color: #666; text-decoration: none; padding: 8px 12px; border-radius: 4px; transition: all 0.3s; font-size: 12px;">
                <span><i class="fa fa-heart" style="margin-right: 8px; color: #667eea;"></i>Testimoni</span>
                <span style="background: #667eea; color: white; padding: 2px 8px; border-radius: 3px; font-size: 11px;">1</span>
              </a>
            </li>
          </ul>
        </div>

        <!-- Popular Posts -->
        <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.08);">
          <h5 style="margin: 0 0 15px 0; color: #333; font-weight: 700;">Artikel Populer</h5>
          <ul style="list-style: none; padding: 0; margin: 0;">
            <li style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #eee;">
              <a href="#" style="color: #667eea; text-decoration: none; font-weight: 600; font-size: 12px; display: block; margin-bottom: 5px;">5 Tips Perjalanan Jauh dengan Aman</a>
              <span style="color: #999; font-size: 11px;"><i class="fa fa-eye"></i> 245 views</span>
            </li>
            <li style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #eee;">
              <a href="#" style="color: #667eea; text-decoration: none; font-weight: 600; font-size: 12px; display: block; margin-bottom: 5px;">Cara Merawat Mobil Rental</a>
              <span style="color: #999; font-size: 11px;"><i class="fa fa-eye"></i> 189 views</span>
            </li>
            <li>
              <a href="#" style="color: #667eea; text-decoration: none; font-weight: 600; font-size: 12px; display: block; margin-bottom: 5px;">Promo Spesial Diskon 30%</a>
              <span style="color: #999; font-size: 11px;"><i class="fa fa-eye"></i> 567 views</span>
            </li>
          </ul>
        </div>

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
</html>
