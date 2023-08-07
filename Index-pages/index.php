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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
<style>
  <?php include "../CSS/style.css" ?>
</style>
<?php include('header.php'); ?>

    <!-- Home -->
    <section id="hero">
                  <div class="row">
                    <div class="text-box">
                      <h1>Your College Journey Starts with Us</h1>
                      <p>Welcome to our esteemed college admissions program!<br>
                        Embark on Your College Journey with Us, Experience Excellence in Education.
                    </p>
                    <div class="link-container">
                      <a href="form.php" class="get" id=studentForm>Get your form</a>
                      <a href="college_form.php" class="get" id=collegeForm>Register your college</a>
                  </div>
                    </div>
                  </div>
            
              </section>

            <!--Contact us-->
                <section id="contact" class="contact">
                    <div class="container">
              
                      <div class="section-title">
                        <h2>Contact Us:</h2>
                        <p>For further information contact us: </p>
                      </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="info-box">
                                <i class="uil uil-map-marker"></i>
                                <h3>Our Address</h3>
                                <p>A108 Adam Street, New York, NY 535022</p>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="info-box">
                                <i class="uil uil-envelope-alt"></i>
                                <h3>Email Us</h3>
                                <p>info@example.com<br>contact@example.com</p>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="info-box">
                                <i class="uil uil-phone-volume"></i>
                                <h3>Call Us</h3>
                                <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                              </div>
                            </div>
                          </div>
                  </section>
            
            <!--End of contact us-->
           <!-- <section class="Campus">
              <h1>Our Colleges</h1>
              <p>International College for Bachelor Degree.</p>
  
              <div class="row">
                  <div class="campus-col">
                      <img src="../img/College_campus.jpg">
                      <div class="layer">
                          <h3>Kathmandu</h3>
                      </div>
                  </div>
              </div>
  
              <div class="row">
                  <div class="campus-col">
                      <img src="../img/Wellesley_College_Tower_Court.jpg">
                      <div class="layer">
                          <h3>Lalitpur</h3>
                      </div>
                  </div>
              </div>
  
              <div class="row">
                  <div class="campus-col">
                      <img src="../img/University of Oxford 3.jpg">
                      <div class="layer">
                          <h3>Bhaktapur</h3>
                      </div>
                  </div>
              </div>
          </section>-->
  
            <!--about us -->
            <section id="about-us" class="about-us">
              <h2>About Us</h2>
              <p> To Inspire and Empower<br>
              Since 1981, Education has been America's most trusted resource for K-12 education news and information. 
              1.6+ million readers. National coverage. From teachers to principals to district leaders across the country.<br>
              Education Week's diverse audience turns to us for the most up-to-date information on K-12 education in the U.S., as well as innovative, high-value tools and solutions.

              </p>
          </section>
          <!--end of about us-->

        <!--Footer Section
        <div class="footer">
            <div class="footer-top">
                <div class="container">
                  <div class="row">
          
                    <div class="footer-contact">
                      <h3>LOGO<span>.</span></h3>
                      <p>
                        A108 Adam Street <br>
                        New York, NY 535022<br>
                        United States <br><br>
                        <strong>Phone:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
                      </p>
                    </div>
          
                    <div class="footer-links">
                      <h4>Useful Links</h4>
                      <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                      </ul>
                    </div>
                    
                    <div class="footer-links">
                        <h4>Our Services</h4>
                        <ul>
                          <li>Hostel</li>
                          <li>Futsal</li>
                          <li>Libraries</li>
                          <li>Court</li>
                        </ul>
                    </div>

                   </div>
                 </div>
             </div>
        </div>-->

        <footer class="footer">
  <div class="footer_containerleft">
  </div>
  <div class="footer_containerright">
    <div class="row">
      <div class="footer-col">
        <h4> LOGO .</h4>
        <ul>
          <li>
            <a href="#aboutus"> About Us</a>
          </li>
          <li>
            <a href="#Featuredevent"> Our Services</a>
            <ul>
                          <li>Hostel</li>
                          <li>Futsal</li>
                          <li>Libraries</li>
                          <li>Court</li>
                        </ul>
          </li>
        </ul>
      </div> <!-- footer-col -->
      <div class="footer-col">
        <h4> Get Help </h4>
        <ul>
          <li class="register_style">
            <p>Do you have any inquiries ? Feel Free to </p>
            <button> <a href="#contact">Contact Us </a></button>
          </li>
        </ul>
      </div> <!-- footer-col -->
      <div class="footer-col">
        <h4> Follow US</h4>
        <div class="social-links">
          <a href="#"> <i class="uil uil-facebook"></i></a>
          <a href="#"> <i class="uil uil-instagram-alt"></i></a>
          <a href="#"> <i class="uil uil-linkedin"></i></a>
          <a href="#"> <i class="uil uil-twitter"></i></i></a>
        </div>
      </div> <!-- footer-col ends -->
    </div> <!-- row -->
    <div class="copyright1">
      <p> 2023 College. All rights reserved.</p>
      <p>Use of this site constitutes acceptance of our User Agreement and privacy policy.</p>
      <p>The Material on this site may not be reproduced, distributed, transmitted, cached or otherwise used, except
        with the prior written permission of College.</p>
    </div>
  </div> <!-- footer_containerright -->

</footer>
  
</body>
</html>