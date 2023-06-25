<?php

$con1=mysqli_connect("localhost","root","","login_reg");

if(mysqli_connect_error()){
    echo"<script>alert('cannot connect to database);</script>";
    exit();
}

$co2=mysqli_connect("localhost","root","","application_form");

if(mysqli_connect_error()){
    echo"<script>alert('cannot connect to database);</script>";
    exit();
}

?> 