<?php include ( "inc/connect.inc.php" ); ?>
<?php

if (isset($_POST['searchId'])){
	$email=$_POST['username'];
	$q = mysqli_query($link,"SELECT * FROM user WHERE email ='$email'") or die(mysqli_error());
	if (mysqli_num_rows($q)) {
		$row = mysqli_fetch_assoc($q);
		$pass = $row['password'];
		$msg = '<h2>Your password is:'.$pass.'</h2>';
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Password Recover</title>
	<link rel="icon" href="image/contactimage.jpg" type="image/x-icon">
	<meta charset="uft-8">
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body class="home-welcome-text" style="background-image: url(image/i12.jpg);">
	<div>
		<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<a style="text-decoration: none;" href="signin.php">SIGN IN</a>
				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<a style="text-decoration: none;" href="login.php">LOG IN</a>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 75px; width: 130px;" src="image/logo.png">
				</a>
			</div>
			<div class="">
				<div id="srcheader">
					<form id="newsearch" method="get" action="search.php">
					        <input type="text" class="srctextinput" name="q" size="21" maxlength="120"  placeholder="Search Here..."><input type="submit" value="search" class="srcbutton" >
					</form>
				<div class="srcclear"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="holecontainer" style="float: right; margin-right: 36%; padding-top: 110px;">
		<div class="container">
			<?php if(isset($msg)) echo $msg; ?>
			<div>
				<div>
					<div class="signupform_content">
						<h2>Find Account!</h2>
						<div class="signupform_text"></div>
						<div>
							<form action="" method="POST" class="registration" name="myForm">
								<div class="signup_form">
									<div>
										<td>
											<input type="text" name="username" class="email signupbox" placeholder="Enter your E-Sporting Email..." size="30" required autofocus>
										</td>
									</div>
									<div>
										<input class="uisignupbutton signupbutton" type="submit" name="searchId" id="senddata" value="Search">
									</div>
									<div class="signup_error_msg">
									</div>
								</div>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="forgetpass.js"></script>
</body>
</html>