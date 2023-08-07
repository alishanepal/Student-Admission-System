<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../CSS/template.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>


<body>
	
	<div id="mySidenav" class="sidenav">
	<p class="logo">M-SoftTech <span class="menu">☰</span></p>
	<p class="logo1"> <span class="menu1">☰</span></p>
  <a href="adminDashboard.php" class="icon-a"><i class="fa fa-dashboard icons"></i>   Dashboard</a>
  <a href=""class="icon-a"><i class="fa fa-pie-chart icons"></i>   College Application</a>
  <a href="Registered_colleges.php"class="icon-a"><i class="fa fa-list icons"></i>   Registered Colleges</a>
  <a href="#"class="icon-a"><i class="fa fa-shopping-bag icons"></i>   Orders</a>
  <a href="#"class="icon-a"><i class="fa fa-tasks icons"></i>   Inventory</a>
  <a href="#"class="icon-a"><i class="fa fa-user icons"></i>   Accounts</a>
  <a href="#"class="icon-a"><i class="fa fa-list-alt icons"></i>   Tasks</a>
  <a href="#"class="icon-a"><i class="fa fa-bell icons"></i>   Notification</a>
  <a href="#"class="icon-a"><i class="fa fa-circle icons"></i>   Icons</a>


</div>
<div id="main">

	<div class="head">
		<div class="col-div-6">
<p class="nav"> Dashboard</p>

</div>
	
	<div class="col-div-6">
		<i class="fa fa-search search-icon"></i>

		
		<i class="fa fa-bell noti-icon"></i>
		<div class="notification-div">
			<p class="noti-head">Notification <span>2</span></p>
			<hr class="hr" />
			<p>Your Order is Placed
				<span>Lorem Ipsum is simply dummy </span>
			</p>
			<p>Your Order is Placed
				<span>Lorem Ipsum is simply dummy </span>
			</p>
			<p>Your Order is Placed
				<span>Lorem Ipsum is simply dummy </span>
			</p>
		</div>
	<div class="profile">

		<p>Manoj Adhikari <i class="fa fa-ellipsis-v dots" aria-hidden="true"></i></p>
		<div class="profile-div">
			<p><i class="fa fa-user"></i>   Profile</p>
			<p><i class="fa fa-cogs"></i>   Settings</p>
			<p><i class="fa fa-power-off"></i>   Log Out</p>
		</div>
	</div>
</div>
	<div class="clearfix"></div>
</div>

	<div class="clearfix"></div>
	<br/>
	
	
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
</body>


</html>