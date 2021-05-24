<?php include ( "inc/connect.inc.php" ); ?>
<?php session_start(); ?>
<?php
ob_start();
if (!isset($_SESSION['user_login'])) {
}
else {
	header("location: index.php");
}
$emails = "";
$passs = "";
if (isset($_POST['login'])) {
	if (isset($_POST['email']) && isset($_POST['password'])) {
		$user_login = mysqli_real_escape_string($link,$_POST['email']);
		$user_login = mb_convert_case($user_login, MB_CASE_LOWER, "UTF-8");
		$password_login = mysqli_real_escape_string($link,$_POST['password']);		
		$num = 0;
		//$password_login_md5 = md5($password_login);
		$result = mysqli_query($link,"SELECT * FROM user WHERE (email='$user_login') AND password='$password_login'");
		$num = mysqli_num_rows($result);
		$get_user_email = mysqli_fetch_assoc($result);
		$get_user_uname_db = $get_user_email['id'];
		if ($num>0) {
			$_SESSION['user_login'] = $get_user_uname_db;
			setcookie('user_login', $user_login, time() + (365 * 24 * 60 * 60), "/");
			
			if (isset($_REQUEST['ono'])) {
				$ono = mysqli_real_escape_string($link,$_REQUEST['ono']);
				header("location: orderform.php?poid=".$ono."");
			}else {
				header('location: index.php');
			}
			exit();
		}
	}
}
?>

<!doctype html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body class="home-welcome-text" style="background-image: url(image/i15.jpg);">
		<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<a style="text-decoration: none; color: #fff;" href="signin.php">SIGN IN</a>
				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<a style="text-decoration: none; color: #fff;" href="login.php">LOG IN</a>
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
					        <input type="text" class="srctextinput" name="keywords" size="21" maxlength="120"  placeholder="Search Here..."><input type="submit" value="search" class="srcbutton" >
					</form>
				<div class="srcclear"></div>
				</div>
			</div>
		</div>
		<div class="holecontainer" style="float: right; margin-right: 36%; padding-top: 110px;">
			<div class="container">
				<div>
					<div>
						<div class="signupform_content">
							<?php
							 	if (isset($activacc)){
							 		echo '<h2>Activation Form</h2>';
							 	}else {
							 		echo '<h2>Login Form</h2>';
							 	}
							?>
							<div class="signupform_text"></div>
							<div>
								<form action="" method="POST" class="registration" name="myForm">
									<div class="signup_form">
										<?php
											
												echo '
										<div>
											<td>
												<input name="email" placeholder="Enter Your Email" required="required" class="email signupbox" type="text" size="30" value="'.$emails.'">
											</td>
										</div>
										<div>
											<td>
												<input name="password" id="password-1" required="required"  placeholder="Enter Password" class="password signupbox" type="password" size="30" value="'.$passs.'">
											</td>
										</div>
										<div>
											<input name="login" class="uisignupbutton signupbutton" type="submit" id="submit" value="Log In">
										</div>
										';
											
										  ?>
										<div style="float: right;">
											<a class="forgetpass" href="forgetpass.php">
												<span>forget your password?</span>
											</a>
										</div>
										<div class="signup_error_msg">
											<?php 
												if (isset($error_message)) {echo $error_message;}
												
											?>
										</div>
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="userlogin.js"></script>
	</body>
</html>