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
    <link rel="stylesheet" href="../CSS/style.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
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
                      <a href="form.php" class="get" id=studentForm>Student Application<br>Form</a>
                      <a href="college_form.php" class="get" id=collegeForm>college Application<br>Form</a>
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
                                <p>Ekantakuna Jwalakhel</p>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="info-box">
                                <i class="uil uil-envelope-alt"></i>
                                <h3>Email Us</h3>
                                <p>alisha53@gmail.com<br>jinisha03@gmail.com</p>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="info-box">
                                <i class="uil uil-phone-volume"></i>
                                <h3>Call Us</h3>
                                <p>9846648121<br>9860212904</p>
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
              we empower students to pursue their dreams of higher education by offering them a seamless platform to apply to colleges.With our user-friendly interface,
students can explore a diverse range of educational institutions,discover their desired courses,and easily submit their applications.
We strive to simplify the admission process,providing comprehensive information and guidance to help
students make informed decisions. Our mission is to connect aspiring students
with global opportunities, making the journey towards
their desired college a smooth and successful one
              </p>
          </section>
          <!--end of about us-->

        <footer class="footer">
  <div class="footer_containerleft">
  </div>
  <div class="footer_containerright">
    <div class="row">
      <div class="footer-col">
       
        <ul>
          <li>
            <a href="#about-us"> About Us</a>
            <a href="#contact"> Contact Us</a>
            <a href="form.php"> Admission Form</a>
            <a href="college_form.php"> College Form</a>
          </li>
        </ul>
      </div> <!-- footer-col -->
      <div class="footer-col">
        <h4> Get Help </h4>
        <ul>
          <li class="register_style">
            <p>Do you have any inquiries ? Feel Free to </p><br><br>
            <button> <a href="#contact">Contact Us </a></button>
          </li>
        </ul>
      </div> <!-- footer-col -->
      <!-- <div class="footer-col">
        <h4> Follow US</h4>
        <div class="social-links">
          <a href="#"> <i class="uil uil-facebook"></i></a>
          <a href="#"> <i class="uil uil-instagram-alt"></i></a>
          <a href="#"> <i class="uil uil-linkedin"></i></a>
          <a href="#"> <i class="uil uil-twitter"></i></i></a>
        </div> -->
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