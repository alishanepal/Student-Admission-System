<?php 
require('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css" type="text/css">
	<title></title>
</head>
<body>
<style>
  <?php include "CSS/admindashboard.css" ?>
</style>

<section>
	<div class="left-div">
		<br>
		<h2 class="logo">LOGO</h2>
		<hr class="hr" />
		<ul class="nav">
			<li><a href=""><i class="fa fa-th-large"></i> Home</a></li>
			<li><a href=""><i class="fa fa-user"></i> User Control</a></li>
			<li><a href=""><i class="fa fa-key"></i> Access Request</a></li>
			<li><a href="" ><i class="fa fa-desktop"></i> Admin</a></li>
			<li><a href=""><i class="fa fa-gear"></i> Settings</a></li>
			<li><a href=""><i class="fa fa-bullhorn"></i> Support</a></li>
			<li><a href=""><i class="fa fa-power-off"></i> Quit</a></li>
		</ul>
		<br><br>
	</div>

	<div class="right-div">
		<div id="main">
			<br>
			<div class="head">
				<div class="col-div-6">
					<p class="nav">Dashboard</p>
				</div>
				<div class="col-div-6">
					<div class="profile">
						<p>Welcome  <?php echo $_SESSION['userrname']; ?><i class="fa fa-ellipsis-v dots" aria-hidden="true"></i></p>
						<div class="profile-div">
							<a href=""><i class="fa fa-user"></i>   Profile</a>
							<a href=""><i class="fa fa-cogs"></i>   Settings</a>
							<a href="logout.php"><i class="fa fa-power-off"></i>   Log Out</a>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<br/><br/><br/>
		</div>
	</div>
	<div class="clearfix"></div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
  var profileParagraph = document.querySelector(".profile p");
  var profileDiv = document.querySelector(".profile-div");

  profileParagraph.addEventListener("click", function() {
    profileDiv.style.display = (profileDiv.style.display === "block") ? "none" : "block";
  });

  notificationIcon.addEventListener("click", function() {
    notificationDiv.style.display = (notificationDiv.style.display === "block") ? "none" : "block";
  });
});
</script>
</body>
</html>
