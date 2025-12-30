<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Rental Mobil | Tentang Kami</title>
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
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>
<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<?php 
$pagetype=$_GET['type'];
$sql = "SELECT * from tblpages where type='$pagetype'";
$query = mysqli_query($koneksidb,$sql);
if(mysqli_num_rows($query)>=1){
while($results = mysqli_fetch_array($query))
{ ?>
<section class="page-header aboutus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1><?php   echo htmlentities($results['PageName']); ?></h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li><?php   echo htmlentities($results['PageName']); ?></li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<section class="about_us section-padding">
  <div class="container">
    <div class="section-header text-center">
      <h2><?php   echo htmlentities($results['PageName']); ?></h2>
      <?php if($pagetype == 'faqs') { ?>
        <p>Berikut jawaban atas beberapa pertanyaan umum yang sering diajukan pelanggan kami.</p>
      <?php } else { ?>
        <p><?php  echo $results['detail']; ?> </p>
      <?php } ?>
    </div>

    <?php if($pagetype == 'faqs') { ?>
      <div class="row faq_content">
        <div class="col-md-6">
          <div class="faq_block">
            <h4>Tentang Pemesanan</h4>
            <div class="faq_item"><strong>Q: Bagaimana cara cek ketersediaan?</strong>
              <p>A: Gunakan fitur pencarian pada menu "Daftar Mobil" atau hubungi CS kami melalui halaman Kontak; Anda juga dapat mengecek tanggal yang tersedia saat memilih kendaraan.</p>
            </div>
            <div class="faq_item"><strong>Q: Apa saja metode pembayarannya?</strong>
              <p>A: Kami menerima transfer bank (rekening tersedia pada saat konfirmasi), pembayaran melalui gerai mitra, dan pembayaran tunai saat penjemputan (jika disepakati).</p>
            </div>
          </div>

          <div class="faq_block mt-4">
            <h4>Tentang Biaya</h4>
            <div class="faq_item"><strong>Q: Apakah sudah termasuk asuransi?</strong>
              <p>A: Harga sewa biasanya belum termasuk asuransi tambahan. Jika tersedia paket asuransi, akan tertera saat pemesanan atau dapat ditambahkan atas permintaan.</p>
            </div>
            <div class="faq_item"><strong>Q: Bagaimana dengan biaya bahan bakar?</strong>
              <p>A: Pengisian bahan bakar kembali menjadi tanggung jawab penyewa kecuali disepakati lain. Pastikan kondisi BBM saat pengembalian sesuai dengan kebijakan yang berlaku.</p>
            </div>
            <div class="faq_item"><strong>Q: Ada deposit/jaminan?</strong>
              <p>A: Tergantung kebijakan pada jenis kendaraan dan durasi sewa; informasi deposit akan diinformasikan saat konfirmasi pemesanan.</p>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="faq_block">
            <h4>Tentang Pengambilan / Pengembalian</h4>
            <div class="faq_item"><strong>Q: Bisa antar-jemput?</strong>
              <p>A: Layanan antar-jemput tersedia di area yang telah kami tentukan atau berdasarkan kesepakatan dengan biaya tambahan bila diperlukan.</p>
            </div>
            <div class="faq_item"><strong>Q: Proses pengembalian mobil bagaimana?</strong>
              <p>A: Mobil dikembalikan pada lokasi dan waktu yang disepakati; tim kami akan melakukan pemeriksaan kondisi singkat dan menyelesaikan administrasi pengembalian.</p>
            </div>
          </div>

          <div class="faq_block mt-4">
            <h4>Tentang Masalah Teknis</h4>
            <div class="faq_item"><strong>Q: Bagaimana jika mobil rusak/ kecelakaan di jalan?</strong>
              <p>A: Segera hubungi layanan darurat dan tim dukungan kami; dokumentasikan kejadian dan ikuti prosedur klaim yang akan kami bantu proses.</p>
            </div>
            <div class="faq_item"><strong>Q: Ada dukungan 24 jam?</strong>
              <p>A: Kami menyediakan nomor darurat / dukungan untuk bantuan teknis; jam operasional dukungan dapat bervariasi menurut paket layanan—silakan cek informasi kontak kami.</p>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
   <?php } }?>

    <?php if($pagetype != 'faqs') { ?>
    <!-- Cerita Perusahaan -->
    <div class="row about-content">
      <div class="col-md-12">
        <h3 class="text-center">Cerita Perusahaan</h3>
        <p class="text-center">Didirikan dengan tujuan memberikan layanan sewa mobil yang aman, transparan, dan ramah, kami terus berkembang berkat kepercayaan pelanggan dan komitmen tim untuk pelayanan terbaik.</p>
      </div>
    </div>

    <!-- Visi & Misi -->
    <div class="row mt-4">
      <div class="col-md-6">
        <h4>Visi</h4>
        <p>Menyediakan solusi mobilitas terpercaya dan nyaman bagi setiap pelanggan di seluruh wilayah layanan kami.</p>
      </div>
      <div class="col-md-6">
        <h4>Misi</h4>
        <ul>
          <li>Menyediakan armada berkualitas dengan perawatan teratur.</li>
          <li>Memberikan layanan pelanggan yang cepat, sopan, dan profesional.</li>
          <li>Menerapkan standar keamanan dan transparansi dalam setiap transaksi.</li>
        </ul>
      </div>
    </div>

    <!-- Nilai-Nilai Perusahaan -->
    <div class="row mt-4">
      <div class="col-md-12">
        <h4>Nilai-Nilai Perusahaan</h4>
      </div>
      <div class="col-sm-4 text-center">
        <i class="fa fa-check fa-2x" aria-hidden="true"></i>
        <h5 class="mt-2">Kejujuran</h5>
        <p>Transparan dalam harga, kondisi kendaraan, dan kebijakan layanan.</p>
      </div>
      <div class="col-sm-4 text-center">
        <i class="fa fa-shield fa-2x" aria-hidden="true"></i>
        <h5 class="mt-2">Keamanan</h5>
        <p>Armada dipelihara secara berkala untuk kenyamanan dan keselamatan Anda.</p>
      </div>
      <div class="col-sm-4 text-center">
        <i class="fa fa-smile-o fa-2x" aria-hidden="true"></i>
        <h5 class="mt-2">Pelayanan Ramah</h5>
        <p>Tim kami siap membantu dengan sikap sopan dan profesional.</p>
      </div>
    </div>

    <!-- Foto Tim -->
    <div class="row mt-5">
      <div class="col-md-12 text-center">
        <h4>Tim Kami</h4>
        <p>Wajah-wajah ramah dari tim yang siap membantu perjalanan Anda.</p>
      </div>

      <div class="col-sm-4 text-center custom-team">
        <img src="assets/images/our_team_1.jpg" alt="Nama Tim 1" class="img-responsive team-photo">
        <p class="mt-2"><strong>Nama Tim 1</strong><br><small>Customer Service</small></p>
      </div>

      <div class="col-sm-4 text-center custom-team">
        <img src="assets/images/our_team_2.jpg" alt="Nama Tim 2" class="img-responsive team-photo">
        <p class="mt-2"><strong>Nama Tim 2</strong><br><small>Teknisi & Logistik</small></p>
      </div>

      <div class="col-sm-4 text-center custom-team">
        <?php
          // Prefer a custom driver image if uploaded; otherwise use an available fallback
          $img_path = 'assets/images/our_team_3_custom.jpg';
          $fs_path = dirname(__FILE__) . '/' . $img_path;
          if (!file_exists($fs_path)) {
            $img_path = 'assets/images/about_us_img2.jpg';
          }
        ?>
        <img src="<?php echo $img_path; ?>" alt="Nama Tim 3" class="img-responsive team-photo">
        <p class="mt-2"><strong>Nama Tim 3</strong><br><small>Driver</small></p>
      </div>
    </div> 

    <!-- Pencapaian / Penghargaan -->
    <div class="row mt-5">
      <div class="col-md-12">
        <h4>Pencapaian & Penghargaan</h4>
        <ul>
          <li>Telah melayani lebih dari 5.000 pelanggan puas.</li>
          <li>Rasio kepuasan pelanggan tinggi dan ulasan positif di platform kami.</li>
          <li>Komitmen pada standar keamanan dan pelayanan.</li>
        </ul>
        <p><em>Catatan: Jika Anda memiliki penghargaan resmi atau sertifikat, kami bisa menampilkannya di sini.</em></p>
      </div>
    </div>

    <?php } ?>

  </div>
</section>
<!-- /About-us--> 

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

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:12 GMT -->
</html>