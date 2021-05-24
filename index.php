<?php include ( "inc/connect.inc.php" ); ?>
<?php 
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($link,"SELECT * FROM user WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['firstName'];
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to E-Sporting</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        
		<script src="homeslideshow.js"></script>
	</head>
	<body style="min-width: 980px;">
		<div class="homepageheader" style="position: relative;">
			<div class="signinButton loginButton">
			<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="cart1.php">Cart</a>';
						}
						else {
							echo '<a style="color: #fff; text-decoration: none;" href="login.php">Cart</a>';
						}
					 ?>
					
				</div>
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="color: #fff; text-decoration: none;" href="signin.php">SIGN IN</a>';
						}
					 ?>
					
				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="profile.php?uid='.$user.'">Hi '.$uname_db.'</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="login.php">LOG IN</a>';
						}
					 ?>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.html">
					<img style=" height: 75px; width: 130px;" src="image/logo.png">
				</a>
			</div>
			<div class="">
				<div id="srcheader">
					<form id="newsearch" method="get" action="search.php">
					        <input type="text" class="srctextinput" name="keywords" size="21" maxlength="120"  placeholder="Search Here..."><input type="submit" value="search" class="srcbutton" >
					</form>
				<div class="srcclear"></div>
				</div>
			</div>
		</div>
		<div class="home-welcome">
			<div class="home-welcome-text" style="background-image: url(image/i4.jpg); height: 380px; ">
				<h1 style="margin: 0px;">Welcome To E-Sporting</h1>
				<h2>Largest Online Shopping for Sports Equipment</h2>
			</div>
		</div>
		<div class="home-prodlist">
			<div>
				<h2 style="text-align: center;">Products Category</h2>
			</div>
			<div style="padding: 20px 30px; width: 100%; margin: 0 auto;">
				<ul >
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="sports/gym.php">
							<img src="./image/gym.jpg" class="home-prodlist-imgi">
							</a>
						</div>
						<h2 style="margin-left: 110px;">Gym</h2>
					</li>
				</ul>
				<ul >
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="sports/cricket.php">
							<img src="./image/cricket.jpg" class="home-prodlist-imgi">
							</a>
						</div>
						<h2 style="margin-left: 110px;">Cricket</h2>
					</li>
				</ul>
				<ul >
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="sports/basketball.php">
							<img src="./image/basketball.jpg" class="home-prodlist-imgi"></a>
						</div>
						<h2 style="margin-left: 110px;">BasketBall</h2>
					</li>
				</ul>
				<ul >
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="sports/indoor.php">
							<img src="./image/indoorgames.jpg" class="home-prodlist-imgi"></a>
						</div>
						<h2 style="margin-left: 110px;">Indoor Sports</h2>
					</li>
				</ul>
				<ul >
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="sports/football.php">
							<img src="./image/football.jpg" class="home-prodlist-imgi"></a>
						</div>
						<h2 style="margin-left: 110px;">FootBall</h2>
					</li>
				</ul>
				<ul >
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="sports/badminton.php">
							<img src="./image/badminton.jpg" class="home-prodlist-imgi"></a>
						</div>
						<h2 style="margin-left: 110px;">Badminton</h2>
					</li>
				</ul>
				<ul >
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="sports/swim.php">
							<img src="./image/swimming.jpg" class="home-prodlist-imgi"></a>
						</div>
						<h2 style="margin-left: 110px;">Swimming</h2>
					</li>
				</ul>
				<ul >
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="sports/hockey.php">
							<img src="./image/hockey.jpg" class="home-prodlist-imgi"></a>
						</div>
						<h2 style="margin-left: 110px;">Hockey</h2>
					</li>
				</ul>
			</div>			
		</div>


		<footer class="w3-container w3-padding-16 w3-center w3-black w3-xlarge">
			<br>
			<a href="#"><i class="fa fa-facebook-official"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#"><i class="fa fa-pinterest-p"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#"><i class="fa fa-twitter"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#"><i class="fa fa-flickr"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#"><i class="fa fa-linkedin"></i></a>
			<p class="w3-medium">
			<br>
			Made by: Pulkit Gupta - 18BCE0620 || Sarvesh Kaushik - 18BCE0531
			</p>
		</footer>


	</body>
</html>