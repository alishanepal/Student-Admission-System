<?php

$con=mysqli_connect("localhost","root","","student_admission_system");

if(mysqli_connect_error()){
    echo"<script>alert('cannot connect to database);</script>";
    exit();
}

?> 