<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT * FROM subscribers WHERE email_sub='$subscriberemail'";
$query = mysqli_query($koneksidb,$sql);
if(mysqli_num_rows($query)>0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql1="INSERT INTO subscribers(email_sub) VALUES('$subscriberemail')";
$lastInsertId=mysqli_query($koneksidb, $sql1);
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>

<footer style="background: #1a1a1a; color: #fff; padding: 60px 0 20px 0;">
  <div class="footer-top" style="padding-bottom: 40px; border-bottom: 1px solid rgba(255,255,255,0.1);">
    <div class="container">
      <div class="row">
      
        <!-- Column 1: About -->
        <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
          <h6 style="font-size: 16px; font-weight: 700; margin-bottom: 20px; color: #667eea;">Tentang Kami</h6>
          <ul style="list-style: none; padding: 0; margin: 0;">
            <li style="margin-bottom: 12px;"><a href="page.php?type=aboutus" style="color: #ccc; text-decoration: none; transition: all 0.3s; font-size: 13px;">➤ Tentang Kami</a></li>
            <li style="margin-bottom: 12px;"><a href="page.php?type=faqs" style="color: #ccc; text-decoration: none; transition: all 0.3s; font-size: 13px;">➤ FAQs</a></li>
            <li style="margin-bottom: 12px;"><a href="page.php?type=privacy" style="color: #ccc; text-decoration: none; transition: all 0.3s; font-size: 13px;">➤ Privacy</a></li>
            <li style="margin-bottom: 12px;"><a href="page.php?type=terms" style="color: #ccc; text-decoration: none; transition: all 0.3s; font-size: 13px;">➤ Terms of use</a></li>
            <li><a href="admin/" style="color: #ccc; text-decoration: none; transition: all 0.3s; font-size: 13px;">➤ Admin Login</a></li>
          </ul>
        </div>

        <!-- Column 2: Blog -->
        <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
          <h6 style="font-size: 16px; font-weight: 700; margin-bottom: 20px; color: #667eea;">Blog & Tips</h6>
          <ul style="list-style: none; padding: 0; margin: 0;">
            <li style="margin-bottom: 12px;"><a href="blog.php" style="color: #ccc; text-decoration: none; transition: all 0.3s; font-size: 13px;">➤ Semua Artikel</a></li>
            <li style="margin-bottom: 12px;"><a href="blog.php?cat=tips" style="color: #ccc; text-decoration: none; transition: all 0.3s; font-size: 13px;">➤ Tips Perjalanan</a></li>
            <li style="margin-bottom: 12px;"><a href="blog.php?cat=perawatan" style="color: #ccc; text-decoration: none; transition: all 0.3s; font-size: 13px;">➤ Perawatan Mobil</a></li>
            <li style="margin-bottom: 12px;"><a href="blog.php?cat=promo" style="color: #ccc; text-decoration: none; transition: all 0.3s; font-size: 13px;">➤ Promo Terbaru</a></li>
            <li><a href="blog.php?cat=testimonial" style="color: #ccc; text-decoration: none; transition: all 0.3s; font-size: 13px;">➤ Testimoni Pelanggan</a></li>
          </ul>
        </div>

        <!-- Column 3: Services -->
        <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
          <h6 style="font-size: 16px; font-weight: 700; margin-bottom: 20px; color: #667eea;">Layanan</h6>
          <ul style="list-style: none; padding: 0; margin: 0;">
            <li style="margin-bottom: 12px;"><a href="car-listing.php" style="color: #ccc; text-decoration: none; transition: all 0.3s; font-size: 13px;">➤ Daftar Mobil</a></li>
            <li style="margin-bottom: 12px;"><a href="#" style="color: #ccc; text-decoration: none; transition: all 0.3s; font-size: 13px;">➤ Sewa Harian</a></li>
            <li style="margin-bottom: 12px;"><a href="#" style="color: #ccc; text-decoration: none; transition: all 0.3s; font-size: 13px;">➤ Sewa Mingguan</a></li>
            <li style="margin-bottom: 12px;"><a href="#" style="color: #ccc; text-decoration: none; transition: all 0.3s; font-size: 13px;">➤ Sewa Bulanan</a></li>
            <li><a href="contact-us.php" style="color: #ccc; text-decoration: none; transition: all 0.3s; font-size: 13px;">➤ Hubungi Kami</a></li>
          </ul>
        </div>

        <!-- Column 4: Contact -->
        <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
          <h6 style="font-size: 16px; font-weight: 700; margin-bottom: 20px; color: #667eea;">Hubungi Kami</h6>
          <div style="font-size: 12px; line-height: 1.8; color: #bbb;">
            <p style="margin-bottom: 15px;">
              <i class="fa fa-map-marker" style="color: #667eea; margin-right: 10px;"></i>
              Jl. Rental Mobil No. 123<br/>Kota, Provinsi 12345
            </p>
            <p style="margin-bottom: 15px;">
              <i class="fa fa-phone" style="color: #667eea; margin-right: 10px;"></i>
              +62-812-3344-5551
            </p>
            <p style="margin-bottom: 15px;">
              <i class="fa fa-envelope" style="color: #667eea; margin-right: 10px;"></i>
              rental_mobil@gmail.com
            </p>
            <div style="margin-top: 15px;">
              <a href="#" style="color: #667eea; margin-right: 12px; font-size: 16px;"><i class="fa fa-facebook"></i></a>
              <a href="#" style="color: #667eea; margin-right: 12px; font-size: 16px;"><i class="fa fa-twitter"></i></a>
              <a href="#" style="color: #667eea; margin-right: 12px; font-size: 16px;"><i class="fa fa-instagram"></i></a>
              <a href="#" style="color: #667eea; font-size: 16px;"><i class="fa fa-youtube"></i></a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="footer-bottom" style="padding: 30px 0; text-align: center; border-top: 1px solid rgba(255,255,255,0.1);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p style="margin: 0; color: #999; font-size: 13px;">
            Copyright &copy; <script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script> 
            <span style="color: #667eea; font-weight: 700;">Car Rental Portal</span>. All rights reserved. | Developed with <i class="fa fa-heart" style="color: #e74c3c;"></i> by Our Team
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>