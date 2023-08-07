<?php
session_start();
require '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $adminID=$_POST['admin_id'];
        $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            // var_dump($adminID);
            // var_dump($username);
            // var_dump($fullname);
            // var_dump($email);


            // Perform the update query
            $updateQuery = "UPDATE `admin_login` SET 
                            `fullname` = '$fullname',
                            `username` = '$username',
                            `email` = '$email'
                            WHERE `admin_id` = '$adminID'";
            if (mysqli_query($con, $updateQuery)) {
              
                echo "
                    <script>alert('Update successfully');
                    window.location.href='adminDashboard.php';
                    </script>";
                } 
            } else {
                echo "<script>alert('Cannot Update Admin');
                window.location.href='adminDashboard.php';
                </script>";
            }
        
 