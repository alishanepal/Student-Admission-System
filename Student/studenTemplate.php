<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../CSS/template.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link rel="stylesheet" href="../CSS/buttons.css" />
  <link rel="stylesheet" href="../CSS/header.css">
</head>


<body>
	
	<div id="mySidenav" class="sidenav">
	<p class="logo">Dashboard<span class="menu">☰</span></p>
	<p class="logo1"> <span class="menu1">☰</span></p>
   <a href="studentDashboard.php" class="icon-a">   <i class="uil uil-dashboard"></i>   Dashboard</a>
  <a href="viewDetails.php"class="icon-a">  <i class="uil uil-chart-pie"></i> view Details</a>
  <a href="../Index-pages/form.php"class="icon-a"><i class="uil uil-list-ul"></i> Application Form</a>
 <!--  <a href="Profile.php"class="icon-a"><i class="fa fa-shopping-bag icons"></i> profile</a>
 <a href="#"class="icon-a"><i class="fa fa-tasks icons"></i>   Inventory</a>
  <a href="#"class="icon-a"><i class="fa fa-user icons"></i>   Accounts</a>
  <a href="#"class="icon-a"><i class="fa fa-list-alt icons"></i>   Tasks</a>
  <a href="#"class="icon-a"><i class="fa fa-bell icons"></i>   Notification</a>
  <a href="#"class="icon-a"><i class="fa fa-circle icons"></i>   Icons</a>-->


</div>
<div id="main">

	<div class="head">
		<div class="col-div-6">
<p class="nav"> Dashboard</p>

</div>
	
	<div class="col-div-6">
		

		
		
		<div class="notification-div">
			<p class="noti-head">Notification <span>2</span></p>
			<hr class="hr" />
			
		</div>
	<div class="profile">

		
	<p>	
    <?php
   session_start();
        echo $_SESSION['username']?><i class="fa fa-ellipsis-v dots" aria-hidden="true"></i></p>
		<div class="profile-div">
			<p><i class="fa fa-user"></i> <a href="../Index-pages/index.php">Home</a></p>
			<p><i class="fa fa-power-off"></i><a href="../logout.php">   Log Out</a></p>
		</div>
	</div>
</div>
	<div class="clearfix"></div>
</div>

	<div class="clearfix"></div>
	<br/>
	
	
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

  $(".menu").click(function(){
    $("#mySidenav").css('width','70px');
    $("#main").css('margin-left','70px');
    $(".logo").css('display', 'none');
    $(".logo1").css('display','block');
    $(".logo span").css('visibility', 'visible');
     $(".logo span").css('margin-left', '-10px');
     $(".icon-a").css('visibility', 'hidden');
     $(".icon-a").css('height', '25px');
     $(".icons").css('visibility', 'visible');
     $(".icons").css('margin-left', '-8px');
      $(".menu1").css('display','block');
      $(".menu").css('display','none');
  });

$(".menu1").click(function(){
    $("#mySidenav").css('width','300px');
    $("#main").css('margin-left','300px');
    $(".logo").css('visibility', 'visible');
    $(".logo").css('display','block');
     $(".icon-a").css('visibility', 'visible');
     $(".icons").css('visibility', 'visible');
     $(".menu").css('display','block');
      $(".menu1").css('display','none');
 });

</script>
<script>
$(document).ready(function(){
  $(".profile p").click(function(){
    $(".profile-div").toggle();
    
  });
  $(".noti-icon").click(function(){
    $(".notification-div").toggle();
  });



  
});
</script>



</html>