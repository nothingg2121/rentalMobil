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
<title>Mutiara Motor Car Rental Portal</title>
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

<!--Listing-Image-Slider-->

<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT mobil.*, merek.* from mobil, merek WHERE merek.id_merek=mobil.id_merek AND mobil.id_mobil='$vhid'";
$query = mysqli_query($koneksidb,$sql);
if(mysqli_num_rows($query)>0)
{
while($result = mysqli_fetch_array($query))
{ 
	$_SESSION['brndid']=$result['id_merek'];  
?>  

<!--Listing-detail-->
<section class="listing-detail" style="padding-top: 20px;">
  <div class="container">
    <div class="row">
      
      <!-- Image Slider Column -->
      <div class="col-md-8">
        <div id="listing_img_slider" style="margin-bottom: 20px;">
          <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result['image1']);?>" class="img-responsive" alt="image" style="width: 100%; border-radius: 8px;"></div>
          <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result['image2']);?>" class="img-responsive" alt="image" style="width: 100%; border-radius: 8px;"></div>
          <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result['image3']);?>" class="img-responsive" alt="image" style="width: 100%; border-radius: 8px;"></div>
          <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result['image4']);?>" class="img-responsive"  alt="image" style="width: 100%; border-radius: 8px;"></div>
          <?php if($result['image5']!="") { ?>
          <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result['image5']);?>" class="img-responsive" alt="image" style="width: 100%; border-radius: 8px;"></div>
          <?php } ?>
        </div>
        
        <div class="listing_detail_head" style="margin-bottom: 20px;">
          <h2 style="margin: 0 0 10px 0;"><?php echo htmlentities($result['nama_merek']);?> <?php echo htmlentities($result['nama_mobil']);?></h2>
          <div style="font-size: 24px; font-weight: 700; color: #667eea;">
            <?php echo htmlentities(format_rupiah($result['harga']));?> <span style="font-size: 14px; color: #999;">/ Hari</span>
          </div>
        </div>
        
        <div class="main_features" style="margin-bottom: 30px;">
          <ul>
          
            <li> <i class="fa fa-calendar" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result['tahun']);?></h5>
              <p>Tahun Registrasi</p>
            </li>
            <li> <i class="fa fa-cogs" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result['bb']);?></h5>
              <p>Tipe Bahan Bakar</p>
            </li>
       
            <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result['seating']);?></h5>
              <p>Seats</p>
            </li>
          </ul>
        </div>
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" class="active"><a href="#vehicle-overview" aria-controls="vehicle-overview" role="tab" data-toggle="tab">Deskripsi Kendaraan</a></li>
          
              <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Accessories</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content"> 
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                
                <p><?php echo htmlentities($result['deskripsi']);?></p>
              </div>
              
              
              <!-- Accessories -->
              <div role="tabpanel" class="tab-pane" id="accessories"> 
                <!--Accessories-->
                <table>
                  <thead>
                    <tr>
                      <th colspan="2">Accessories</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Air Conditioner</td>
<?php if($result['AirConditioner']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?> 
   <td><i class="fa fa-close" aria-hidden="true"></i></td>
   <?php } ?> </tr>

<tr>
<td>AntiLock Braking System</td>
<?php if($result['AntiLockBrakingSystem']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else {?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Power Steering</td>
<?php if($result['PowerSteering']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>
                   

<tr>

<td>Power Windows</td>

<?php if($result['PowerWindows']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>
                   
 <tr>
<td>CD Player</td>
<?php if($result['CDPlayer']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Leather Seats</td>
<?php if($result['LeatherSeats']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Central Locking</td>
<?php if($result['CentralLocking']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Power Door Locks</td>
<?php if($result['PowerDoorLocks']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
                    </tr>
                    <tr>
<td>Brake Assist</td>
<?php if($result['BrakeAssist']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php  } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Driver Airbag</td>
<?php if($result['DriverAirbag']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
 </tr>
 
 <tr>
 <td>Passenger Airbag</td>
 <?php if($result['PassengerAirbag']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else {?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Crash Sensor</td>
<?php if($result['CrashSensor']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
<?php }} ?>
   
      </div>
      
      <!-- Sidebar Kanan -->
      <aside class="col-md-4">
        
        <div style="position: sticky; top: 20px;">
          
          <div style="margin-bottom: 15px; text-align: center;">
            <p style="font-size: 12px; margin: 0;"><strong>Bagikan:</strong> 
              <a href="#" style="margin: 0 5px;"><i class="fa fa-facebook-square" style="color: #3b5998; font-size: 20px;"></i></a> 
              <a href="#" style="margin: 0 5px;"><i class="fa fa-twitter-square" style="color: #1da1f2; font-size: 20px;"></i></a> 
              <a href="#" style="margin: 0 5px;"><i class="fa fa-linkedin-square" style="color: #0077b5; font-size: 20px;"></i></a>
            </p>
          </div>
          
          <!-- Book Now Card -->
          <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 12px; padding: 25px; margin-bottom: 20px; box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);">
            <h5 style="margin: 0 0 15px 0; font-size: 18px; font-weight: 700; text-align: center;">
              <i class="fa fa-calendar-check-o"></i> Pesan Sekarang
            </h5>
            <div style="text-align: center; margin-bottom: 20px;">
              <p style="font-size: 28px; font-weight: 700; margin: 0; line-height: 1;">
                <?php echo htmlentities(format_rupiah($result['harga']));?>
              </p>
              <p style="font-size: 13px; margin: 5px 0 0 0; opacity: 0.9;">Per hari</p>
            </div>
            <form method="get" action="booking.php">
              <input type="hidden" name="vid" value="<?php echo $vhid;?>" required>
              <?php if($_SESSION['ulogin']) { ?>
                <button type="submit" class="btn btn-block" style="background: white; color: #667eea; font-weight: 700; border: none; padding: 14px; border-radius: 6px; cursor: pointer; font-size: 14px; width: 100%; transition: all 0.3s;">
                  <i class="fa fa-check-circle"></i> Sewa Sekarang
                </button>
              <?php } else { ?>
                <a href="#loginform" class="btn btn-block" data-toggle="modal" data-dismiss="modal" style="background: white; color: #667eea; font-weight: 700; border: none; padding: 14px; border-radius: 6px; display: block; text-align: center; text-decoration: none; font-size: 14px;">
                  <i class="fa fa-sign-in"></i> Login untuk Menyewa
                </a>
              <?php } ?>
            </form>
          </div>
          
          <!-- Spesifikasi -->
          <div style="background: white; border-radius: 10px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); border: 2px solid #667eea;">
            <h5 style="margin: 0 0 15px 0; font-size: 14px; font-weight: 700; color: #333; text-transform: uppercase; letter-spacing: 0.5px;">
              <i class="fa fa-list" style="color: #667eea; margin-right: 8px;"></i> Spesifikasi Mobil
            </h5>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
              <div style="background: #f8f9fa; padding: 12px; border-radius: 6px; border-left: 3px solid #667eea;">
                <p style="color: #999; margin: 0 0 5px 0; font-size: 10px; text-transform: uppercase;">Tahun</p>
                <p style="margin: 0; font-weight: 700; color: #333; font-size: 14px;"><?php echo htmlentities($result['tahun']);?></p>
              </div>
              <div style="background: #f8f9fa; padding: 12px; border-radius: 6px; border-left: 3px solid #28a745;">
                <p style="color: #999; margin: 0 0 5px 0; font-size: 10px; text-transform: uppercase;">Kapasitas</p>
                <p style="margin: 0; font-weight: 700; color: #333; font-size: 14px;"><?php echo htmlentities($result['seating']);?> Orang</p>
              </div>
              <div style="background: #f8f9fa; padding: 12px; border-radius: 6px; border-left: 3px solid #ffc107;">
                <p style="color: #999; margin: 0 0 5px 0; font-size: 10px; text-transform: uppercase;">Bahan Bakar</p>
                <p style="margin: 0; font-weight: 700; color: #333; font-size: 14px;"><?php echo htmlentities($result['bb']);?></p>
              </div>
              <div style="background: #f8f9fa; padding: 12px; border-radius: 6px; border-left: 3px solid #e74c3c;">
                <p style="color: #999; margin: 0 0 5px 0; font-size: 10px; text-transform: uppercase;">Plat</p>
                <p style="margin: 0; font-weight: 700; color: #333; font-size: 13px; font-family: monospace;"><?php echo htmlentities($result['nopol']);?></p>
              </div>
            </div>
          </div>
          
          <!-- Keuntungan -->
          <div style="background: white; border-radius: 10px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); border: 2px solid #28a745;">
            <h5 style="margin: 0 0 15px 0; font-size: 14px; font-weight: 700; color: #333; text-transform: uppercase; letter-spacing: 0.5px;">
              <i class="fa fa-star" style="color: #28a745; margin-right: 8px;"></i> Keuntungan Rental
            </h5>
            <ul style="list-style: none; padding: 0; margin: 0;">
              <li style="padding: 10px 0; color: #666; font-size: 13px; border-bottom: 1px solid #eee;">
                <i class="fa fa-check-circle" style="color: #28a745; margin-right: 10px;"></i> Proses booking mudah
              </li>
              <li style="padding: 10px 0; color: #666; font-size: 13px; border-bottom: 1px solid #eee;">
                <i class="fa fa-check-circle" style="color: #28a745; margin-right: 10px;"></i> Armada bersih terawat
              </li>
              <li style="padding: 10px 0; color: #666; font-size: 13px; border-bottom: 1px solid #eee;">
                <i class="fa fa-check-circle" style="color: #28a745; margin-right: 10px;"></i> Harga transparan
              </li>
              <li style="padding: 10px 0; color: #666; font-size: 13px;">
                <i class="fa fa-check-circle" style="color: #28a745; margin-right: 10px;"></i> Layanan 24/7
              </li>
            </ul>
          </div>

          <!-- Contact Box -->
          <div style="background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%); color: white; border-radius: 10px; padding: 20px; text-align: center; box-shadow: 0 3px 15px rgba(255, 193, 7, 0.3);">
            <i class="fa fa-phone" style="font-size: 24px; margin-bottom: 12px; display: block;"></i>
            <p style="margin: 0 0 6px 0; font-size: 13px; opacity: 0.95;">Butuh bantuan?</p>
            <p style="margin: 0; font-weight: 700; font-size: 16px;">Hubungi Kami</p>
          </div>
          
        </div>
        
      </aside>
      <!--/Sidebar-->
      
    </div>
    
    <div class="space-20"></div>
    <div class="divider"></div>
    
    <!--Similar-Cars-->
    <div class="similar_cars">
      <h3>Mobil Sejenis</h3>
      <div class="row">
<?php 
$bid = isset($_SESSION['brndid']) ? intval($_SESSION['brndid']) : 0;
$sql1 = "SELECT mobil.*, merek.* \
         FROM mobil \
         INNER JOIN merek ON merek.id_merek = mobil.id_merek \
         WHERE mobil.id_merek = '$bid' AND mobil.id_mobil != '$vhid' \
         ORDER BY mobil.id_mobil DESC \
         LIMIT 4";
$query1 = mysqli_query($koneksidb,$sql1);
if(mysqli_num_rows($query1)>0)
{
while($result = mysqli_fetch_array($query1))
{ 
 ?>      

        <div class="col-md-3 grid_listing">
          <div class="product-listing-m gray-bg">
            <div class="product-listing-img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result['id_mobil']);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result['image1']);?>" class="img-responsive" alt="image" /> </a>
            </div>
            <div class="product-listing-content">
              <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result['id_mobil']);?>"><?php echo htmlentities($result['nama_merek']);?>, <?php echo htmlentities($result['nama_mobil']);?></a></h5>
              <p class="list-price"><?php echo htmlentities(format_rupiah($result['harga']));?></p>
          
              <ul class="features_list">
                
             <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result['seating']);?> seats</li>
                <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result['tahun']);?> model</li>
                <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result['bb']);?></li>
              </ul>
            </div>
          </div>
        </div>
 <?php }} ?>       

      </div>
    </div>
    <!--/Similar-Cars--> 
    
  </div>
</section>
<!--/Listing-detail--> 

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

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<script src="assets/switcher/js/switcher.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>