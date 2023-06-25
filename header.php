<?php 
require('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Unicons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>

<body>
  <style>
    <?php include "CSS/header.css" ?>
  </style>
  <header>
    <div>
      <a href="index.php" class="logo" onclick>LOGO</a>
    </div>
    <nav>
      <ul class="nav-items">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About </a></li>
        <li><a href="form.php">Admission Form </a></li>
        <li><a href="contact.php">Contact Us</a></li>
      </ul>
      <?php
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        echo "<div class='username'>
            <span class='username'>Welcome   {$_SESSION['username']}</span>
            <br>
            <div class='logout'>
              <a href='logout.php'>Logout</a>
            </div>
          </div>";
      } else {
        echo "
    <button type='button' class='button' onclick='popup(\"login-popup\")'>Login</button>
    <button type='button' class='button' onclick='popup(\"register-popup\")'>Signup</button>";
      }
      ?>


    </nav>
  </header>


  <div class="popup-container" id="login-popup">
    <div class="popup">
      <form method="POST" action="login_register.php">
        <div class="login-header">
          <h2 class="h2">
            LOGIN
          </h2>
          <i class="uil uil-times form_close" onclick="popup('login-popup')"></i>
        </div>
        <div class="input_box">
          <input type="text" name="email_username" placeholder="  Enter username or email" required />
          <i class="uil uil-user user"></i>
        </div>
        <div class="input_box">
          <input type="password" name="password" placeholder="Enter your password" required />
          <i class="uil uil-lock password"></i>
          <i class="uil uil-eye-slash pw_hide"></i>
        </div>
        <a href="#" class="forgot_pw">Forgot password?</a>
        <button type="submit" name="login" class="button">Login Now</button>

        <div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
      </form>
    </div>
  </div>

  <div class="popup-container" id="register-popup">
    <div class="register popup">
      <form method="POST" action="login_register.php" onsubmit="return validateForm()">
        <div class="login-header">
          <h2>
            REGISTER
          </h2>
          <i class="uil uil-times form_close" onclick="popup('register-popup')"></i>
        </div>

        <div class="input_box">
          <input type="text" name="fullname" placeholder="Enter your Full Name" required />
        </div>

        <div class="input_box">
          <input type="text" name="username" placeholder=" Enter username" required />
          <i class="uil uil-user user"></i>
        </div>
        <div class="input_box">
          <input type="email" name="email" placeholder="  Enter your email" required />
          <i class="uil uil-envelope-alt email"></i>
        </div>

        <div class="input_box">
          <input type="password" name="password" placeholder="Create password" required />
          <i class="uil uil-lock password"></i>
          <i class="uil uil-eye-slash pw_hide"></i>
        </div>
        <div class="input_box">
          <input type="password" name="confirm_password" placeholder="Confirm password" required />
          <i class="uil uil-lock password"></i>
          <i class="uil uil-eye-slash pw_hide"></i>
        </div>

        <button type="submit" name="register" class="button">Signup Now</button>

        <div class="login_signup">Already have an account? <a href="#" id="login">Login</a></div>
      </form>
    </div>
  </div>
  <script>
    <?php include "header.js" ?>
  </script>
</body>

</html>