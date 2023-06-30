<?php
require('connection.php');
session_start();

if (isset($_POST['register'])) {
    $user_exist_query = "SELECT * FROM `user_login` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";
    $result = mysqli_query($con, $user_exist_query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['username'] == $_POST['username']) {
                echo "
                <script>alert('$result_fetch[username]-username already taken');
                window.location.href='index.php';
                </script>";
            } else {  
                echo "
                <script>alert('$result_fetch[email]-email already taken');
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

                $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
                $query = "INSERT INTO `user_login`(`fullname`,`username`,`email`,`password`) VALUE('$_POST[fullname]','$_POST[username]','$_POST[email]','$password')";
                if (mysqli_query($con, $query)) {
                    echo "
                    <script>alert('Registration successful');
                    window.location.href='index.php';
                    </script>";
                } else {
                    echo "
                    <script>alert('Cannot run query');
                    window.location.href='index.php';
                    </script>";
                }
            }
        }
    } else {
        echo "
        <script>
        alert('Cannot run query');
        window.location.href='index.php';
        </script>";
    }
}



#for login

   if(isset($_POST['login']))
   {
$adminquery="SELECT * FROM `admin_login` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
$adminresult=mysqli_query($con,$adminquery); 

$userquery="SELECT * FROM `user_login` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
$userresult=mysqli_query($con,$userquery); 


if(mysqli_num_rows($adminresult)==1)
{
$result=mysqli_fetch_assoc($adminresult);
if ($_POST['password'] == $result['password'])  
{
    $_SESSION['loggedin']=true;
    $_SESSION['userrname']=$result['username'];
    header("location:adminDashboard.php");
}
else{
    echo"
    <script>
    alert('Incorrect Password');
    window.location.href='index.php';
    </script>
    ";
}
}

elseif(mysqli_num_rows($userresult)==1)
{
$result_fetch=mysqli_fetch_assoc($userresult);
if(password_verify($_POST['password'],$result_fetch['password']))
{

    $_SESSION['logged_in']=true;
    $_SESSION['username']=$result_fetch['username'];
    header("location:index.php");
}
else{
    echo"
    <script>
    alert('Incorrect Password');
    window.location.href='index.php';
    </script>
    ";
}
}

else{
    echo"
    <script>
    alert('Email or username not registered');
    window.location.href='index.php';
    </script>
    ";
}}
   
?>



