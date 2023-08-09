<?php
require('connection.php');
session_start();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $fullname = $_POST['fullname'];
    $usertype = $_POST['usertype'];

    // Initialize an array to store validation errors
    $errors = [];

    // Validate if all fields are filled
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword) || empty($fullname) || empty($usertype)) {
        $errors['empty_fields'] = "Please fill in all fields";
    }

    // Check if email is in correct format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email_format'] = "Email is not in a valid format";
    }

    // Check if password is at least 8 characters long
    if (strlen($password) < 8) {
        $errors['password_length'] = "Password should be at least 8 characters long";
    }

    // Check if username contains only alphanumeric characters
    if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        $errors['username_format'] = "Username should only contain alphanumeric characters";
    }

    // Rest of the validation logic remains the same...

    // If no validation errors were found, proceed with registration
    if (empty($errors)) {
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
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
        echo "<script>window.location.href='Index-pages/index.php';</script>";
    }
}
?>
