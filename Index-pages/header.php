<?php
require('../connection.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Unicons -->
  </head>

<body>
  <style>
    <?php include "../CSS/header.css" ?>
  </style>
  <header>
    <div>
      <a href="index.php" class="logo" onclick>LOGO</a>
    </div>
    <nav>
      <ul class="nav-items">
        <li><a href="index.php">Home</a></li>
        <li><a href="#about-us">About </a></li>
        <li><a href="form.php">Admission Form </a></li>
        <li><a href="#contact">Contact Us</a></li>
      </ul>
  <?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "
    <button type='button' class='button' onclick='popup(\"login-popup\")'>Login</button>
    <button type='button' class='button' onclick='popup(\"register-popup\")'>Signup</button>";
}else {
  if (isset($_SESSION['usertype']) && $_SESSION['usertype'] === 'College') { 
      echo "
      <button class='button'>
          <a href='../College/collegeDashboard.php' style='text-decoration: none; color: white;'>Dashboard</a>
      </button>";
  } elseif (isset($_SESSION['usertype']) && $_SESSION['usertype'] === 'Student') { 
      echo "
      <button class='button'>
          <a href='../Student/StudentDashboard.php' style='text-decoration: none; color: white;'>Dashboard</a>
      </button>";
  } else { 
      echo "
      <button class='button'>
          <a href='../admin/admin/adminDashboard.php' style='text-decoration: none; color: white;'>Dashboard</a>
      </button>";
  }
}

?>

    </nav>
  </header>


  <div class="popup-container" id="login-popup">
    <div class="popup">
      <form method="POST" action="../login.php">
        <div class="login-header">
          <h2 class="h2">
            LOGIN
          </h2>
          <i class="uil uil-times form_close" onclick="popup('login-popup')"></i>
        </div>
        <div class="input_box">
          <input type="text" name="email_username" placeholder="  Enter username or email" />
          <i class="uil uil-user user"></i>
        </div>
        <div class="input_box">
          <input type="password" name="password" placeholder="Enter your password" />
          <i class="uil uil-lock password"></i>
          <i class="uil uil-eye-slash pw_hide"></i>
        </div>
        <!-- <a href="#" class="forgot_pw">Forgot password?</a> -->
        <button type="submit" name="login" class="button">Login Now</button>

        <div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
      </form>
    </div>
  </div>

  <div class="popup-container" id="register-popup">
    <div class="register popup">
      <form method="POST" action="../register.php">
        <div class="login-header">
          <h2>
            REGISTER
          </h2>
          <i class="uil uil-times form_close" onclick="popup('register-popup')"></i>
        </div>

        <div class="input_box">
          <input type="text" id = "fullname" name="fullname" placeholder="Enter your Full Name"/>
        </div>

        <div class="input_box">
          <input type="text" id="username" name="username" placeholder=" Enter username" />
          <i class="uil uil-user user"></i>
        </div>
        <div class="input_box">
          <input type="email"  id="email" name="email" placeholder="  Enter your email" />
          <i class="uil uil-envelope-alt email"></i>
        </div>

        <div class="input_box">
          <input type="password" id="password" name="password" placeholder="Create password" />
          <i class="uil uil-lock password"></i>
          <i class="uil uil-eye-slash pw_hide"></i>
        </div>
        <div class="input_box">
          <input type="password"id="confirmPassword" name="confirm_password" placeholder="Confirm password"/>
          <i class="uil uil-lock password"></i>
          <i class="uil uil-eye-slash pw_hide"></i>
        </div>

        <div class="input_box">
          <select name="usertype">
            <option value="">User Type</option>
            <option value="Student">Student</option>
            <option value="College">College</option>
          </select>
        </div>


        <button type="submit" name="register" class="button">Signup Now</button>

        <div class="login_signup">Already have an account? <a href="#" id="login">Login</a></div>
      </form>
    </div>
  </div>
  <script>
    <?php include "../JS/header.js" ?>
  </script>


  <script>
    const form= document.querySelector("form");
    form.addEventListener('submit', function (event){

      event.preventDefault();
      if(validateForm()){
      form.submit();

      }
    });
function validateForm(){

  const fullname = document.getElementById(fullname).value;
  const username = document.getElementById(username).value;
  const email =document.getElementById(email).value;
  const emailregex=/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  const password = document.getElementById(password).value;
  const confirmPassword = document.getElementById(confirmPassword).value;

  if(!emailregex.test(emailinput)){
    alert("invalid email address.");
    return false;
  }

  if(!fullname || !username ||!email || !password || !confirmPassword){
    alert("please fill in all the field.")" 
    return false;
  }
 
  if(password.length<8){
    alert("password must be atleast 8");
    return false;
  }
  return true;
}

    </script>
</body>

</html>
