<?php
require('connection.php');
session_start();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Check if username or email already exist
    $user_exist_query = "SELECT * FROM `user_login` WHERE `username`='$username' OR `email`='$email'";
    $result = mysqli_query($con, $user_exist_query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['username'] == $username) {
                echo "
                <script>alert('{$result_fetch['username']} - username already taken');
                window.location.href='index.php';
                </script>";
            } else {
                echo "
                <script>alert('{$result_fetch['email']} - email already taken');
                window.location.href='index.php';
                </script>";
            }
        } else {
            // Check if passwords match
            if ($_POST['password'] !== $_POST['confirm_password']) {
                echo "
                <script>alert('Passwords do not match');
                window.location.href='index.php';
                </script>";
            } else {
                $fullname = $_POST['fullname'];
                $usertype = $_POST['usertype'];
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                $query = "INSERT INTO `user_login`(`fullname`, `username`, `email`, `password`, `usertype`) VALUES ('$fullname', '$username', '$email', '$password', '$usertype')";
                if (mysqli_query($con, $query)) {
                    echo "
                    <script>alert('Registration successful');
                    window.location.href='Index-pages/index.php';
                    </script>";
                } else {
                    echo "
                    <script>alert('Cannot run query');
                    window.location.href='Index-pages/index.php';
                    </script>";
                }
            }
        }
    } else {
        echo "
        <script>
        alert('Cannot run query');
        window.location.href='Index-pages/index.php';
        </script>";
    }
}

#for login

if (isset($_POST['login'])) {
    $email_username = $_POST['email_username'];
    $password = $_POST['password'];

    // Check admin login
    $admin_query = "SELECT * FROM `admin_login` WHERE `email`='$email_username' OR `username`='$email_username'";
    $admin_result = mysqli_query($con, $admin_query);

    if (mysqli_num_rows($admin_result) == 1) {
        $admin_row = mysqli_fetch_assoc($admin_result);
        if (password_verify($password, $admin_row['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $admin_row['username'];
            header("location: admin/admin/adminDashboard.php");
            exit;
        } else {
            echo "
            <script>
            alert('Incorrect Password');
            window.location.href='Index-pages/index.php';
            </script>";
        }
    } else {
        // Check user login
        $user_query = "SELECT * FROM `user_login` WHERE `email`='$email_username' OR `username`='$email_username'";
        $user_result = mysqli_query($con, $user_query);

        if (mysqli_num_rows($user_result) == 1) {
            $user_row = mysqli_fetch_assoc($user_result);
            if (password_verify($password, $user_row['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user_row['username'];
                $_SESSION['usertype']= $user_row['usertype'];
                $_SESSION['userid']= $user_row['user_id'];

                if ($user_row['usertype'] == 'College') {
                    header("Location: College/students_application.php");
                    
                    exit;
                } elseif ($user_row['usertype'] == 'Student') {
                    header("Location: Index-pages/index.php");
                   
                    exit;
                }
            } else {
                echo "
                <script>
                alert('Incorrect Password');
                window.location.href='Index-pages/index.php';
                </script>";
            }
        } else {
            echo "
            <script>
            alert('Email or username not registered');
            window.location.href='Index-pages/index.php';
            </script>";
        }
    }
}
?>
