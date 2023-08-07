
  <button class="button" onclick="popup('register-popup')">Add Admin</button>
  <div class="popup-container" id="register-popup">
    <div class="register popup">
      <form method="POST" action="addAdmin.php" onsubmit="return validateForm()">
        <div class="login-header">
          <h2>REGISTER</h2>
          <i class="uil uil-times form_close" onclick="popup('register-popup')"></i>
        </div>

        <div class="input_box">
          <input type="text" name="fullname" placeholder="Enter your Full Name" required />
        </div>

        <div class="input_box">
          <input type="text" name="username" placeholder="Enter username" required />
          <i class="uil uil-user user"></i>
        </div>
        <div class="input_box">
          <input type="email" name="email" placeholder="Enter your email" required />
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
      </form>
    </div>
  </div>



<script  src="../../JS/header.js">
</script>


 <?php
require('../../connection.php');


if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Check if username or email already exist
    $user_exist_query = "SELECT * FROM `admin_login` WHERE `username`='$username' OR `email`='$email'";
    $result = mysqli_query($con, $user_exist_query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['username'] == $username) {
                echo "
                <script>alert('{$result_fetch['username']} - username already taken');
                window.location.href='adminDashboard.php';
                </script>";
            } else {
                echo "
                <script>alert('{$result_fetch['email']} - email already taken');
                window.location.href='adminDashboard.php';
                </script>";
            }
        } else {
            // Check if passwords match
            if ($_POST['password'] !== $_POST['confirm_password']) {
                echo "
                <script>alert('Passwords do not match');
                window.location.href='adminDashoard.php';
                </script>";
            } else {
                $fullname = $_POST['fullname'];
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                $query = "INSERT INTO `admin_login`(`fullname`, `username`, `email`, `password`)
                 VALUES ('$fullname', '$username', '$email', '$password' )";
                if (mysqli_query($con, $query)) {
                    echo "
                    <script>alert('Registration successful');
                    window.location.href='adminDashboard.php';
                    </script>";
                } else {
                    echo "
                    <script>alert('Cannot run query');
                    window.location.href='adminDashboard.php';
                    </script>";
                }
            }
        }
    } else {
        echo "
        <script>
        alert('Cannot run query');
        window.location.href='addAdmin.php';
        </script>";
    }
}
?>