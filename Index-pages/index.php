<?php 
require('../connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<style>
  <?php include "../CSS/style.css" ?>
</style>
<?php include('header.php'); ?>

    <!-- Home -->
    <section class="home">
      <div class="content-box">
        <p>Welcome to our esteemed college admissions program!</p><br>
        <h1>Your College Journey Starts with Us</h1><br>
        <p>Embark on Your College Journey with Us, Experience Excellence in Education:</p>
        <div class="link-container">
        <a href="form.php" class="get" id=studentForm>Get your form</a>
        <a href="college_form.php" class="get" id=collegeForm>register your college</a>
</div>
      </div>
        <div class="picture"></div>
</section>
  
<section class="about-us-content" id="about-us-content">
    <h2>About Us</h2>
    <p> we empower students to pursue their dreams of higher education by offering them a seamless
        platform to apply to colleges.With our user-friendly interface,<br> students can explore a diverse
        range of educational institutions,discover their desired courses,and easily submit their applications.<br>
        We strive to simplify the admission process,providing comprehensive information and guidance to help<br>
        students make informed decisions. Our mission is to connect aspiring students<br> with global opportunities, 
        making the journey towards<br> their desired college a smooth and successful one.</p>
  </section> 

  <!--contact Section-->
    <section class="contact">
      <div class="content">
        <h1>Contact us</h1>
        <p></p>
        <div class="container">
        <div class="contactInfo">
          <div class="box">
            <div class="icon"><i class="uil uil-phone"></i></div>
            <div class="contact-info">
              <h3>Phone</h3>
              <p>9845612338</p>
              <p>9861234248</p>
            </div>
          </div>
          <div class="box">
            <div class="icon"><i class="uil uil-envelope-alt"></i></div>
            <div class="contact-info">
              <h3>Email</h3>
              <p>info@gmail.com</p>
              <p>abcd@gmail.com</p>
            </div>
          </div>
          <div class="box">
            <div class="icon"><i class="uil uil-map-marker"></i></div>
            <div class="contact-info">
              <h3>Address</h3>
              <p>Kathmandu, Lalitpur</p>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
  
</body>
</html>