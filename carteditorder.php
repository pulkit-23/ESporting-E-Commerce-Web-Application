<?php include ( "inc/connect.inc.php" ); ?>
<?php 

ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
	header("location: login.php?ono=".$pid."");
}
else {
	if (isset($_REQUEST['pid'])) {
		
		$pid = mysqli_real_escape_string($link,$_REQUEST['pid']);
	}else {
		header('location: index.php');
	}
	$user = $_SESSION['user_login'];
	$result = mysqli_query($link,"SELECT * FROM user WHERE id='$user'");
	$get_user_email = mysqli_fetch_assoc($result);
		$uname_db = $get_user_email['firstName'];
}

$result1 = mysqli_query($link,"SELECT * FROM cart WHERE id='$pid'");
$get_order_info = mysqli_fetch_assoc($result1);
	$eouid = $get_order_info['uid'];
	$eopid = $get_order_info['pid'];
	$eoquantity = $get_order_info['quantity'];
	$eoplace = $get_order_info['oplace'];
	$eomobile = $get_order_info['mobile'];

$result2 = mysqli_query($link,"SELECT * FROM user WHERE id='$eouid'");
$get_order_info2 = mysqli_fetch_assoc($result2);
	$euname = $get_order_info2['firstName'];
	$euemail = $get_order_info2['email'];
	$eumobile = $get_order_info2['mobile'];


$getposts = mysqli_query($link,"SELECT * FROM products WHERE id ='$pid'") or die(mysqli_error());
if (mysqli_num_rows($getposts)) {
	$row = mysqli_fetch_assoc($getposts);
	$id = $row['id'];
	$pName = $row['pName'];
	$price = $row['price'];
	$description = $row['description'];
	$picture = $row['picture'];
	$item = $row['item'];
	$category = $row['category'];
	$available =$row['available'];
}	

//update product
if (isset($_POST['updatepro'])) {
	$quan = $_POST['quantity'];
	$mob = $_POST['mob'];
	if($result = mysqli_query($link,"UPDATE cart SET quantity=$quan, mobile=$mob WHERE pid='$pid'")){
		header("Location: cart1.php");

	}else {
		echo "no changed";
	}
}

if (isset($_POST['delprod'])) {
	if(mysqli_query($link,"DELETE FROM cart WHERE pid='$pid'")){

	header('location: cart1.php');
	}

}
$search_value = "";


?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-image: url(../image/i17.jpg);">
	<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="logout.php">LOG OUT</a>';
						}
					 ?>
					
				</div>
				<div class="uiloginbutton signinButton loginButton">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="login.php">Hi '.$uname_db.'</a>';
						}
						else {
							echo '<a style="text-decoration: none;color: #fff;" href="login.php">LOG IN</a>';
						}
					 ?>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 75px; width: 130px;" src="image/logo.png">
				</a>
			</div>
			<div id="srcheader">
				<form id="newsearch" method="get" action="search.php">
				        <?php 
				        	echo '<input type="text" class="srctextinput" name="keywords" size="21" maxlength="120"  placeholder="Search Here..." value="'.$search_value.'"><input type="submit" value="search" class="srcbutton" >';
				         ?>
				</form>
			<div class="srcclear"></div>
			</div>
		</div>
		<div class="categolis">
			<table>
				<tr>
					
						<a  style="text-decoration: none;color: #fff;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">Cart Update</a>
					
				</tr>
			</table>
		</div>
		<div class="holecontainer" style=" padding-top: 20px; padding: 0 20%">
		<div class="container signupform_content ">
			<div>

				<h2 style="padding-bottom: 20px;">Edit Product</h2>
				<div style="float: right;">
				<?php 
					echo '
					<div class="">
						<div class="signupform_text"></div>
							<div>
								<form action="" method="POST" class="registration">
									<div class="signup_form">
										<div>
											<td>
												<input name="quantity" placeholder="Change Quantity"  class="email signupbox" type="number" size="30">
											</td>
										</div>
										<div>
											<td>
												<input name="mob" placeholder="Change Mobile no."  class="email signupbox" type="text" size="30">
											</td>
										</div>
										<div>
											<input name="updatepro" class="uisignupbutton signupbutton" type="submit" value="Update Product">
										</div>
										<div>
											<input name="delprod" class="uisignupbutton signupbutton" type="submit" value="Delete This Product">
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

					';
					if(isset($success_message)) {echo $success_message;}

				 ?>
					
				</div>
			</div>
		</div>
		<div style="float: left;">
			<div>
				<?php
					echo '
						<ul style="float: left;">
							<li style="float: left; padding: 0px 25px 25px 25px;">
								<div class="home-prodlist-img prodlist-img">';
								if (file_exists('image/product/'.$item.'/'.$picture.'')){
									echo '<img src="image/product/'.$item.'/'.$picture.'" class="home-prodlist-imgi">';
								}else {
									echo '
									<div class="home-prodlist-imgi" style="text-align: center; padding: 0 0 6px 0;">No Image Found!</div>';
								} echo '
									
								</div>
							</li>
							
						</ul>
					';
				?>
			</div>

		</div>
	</div>
</body>
</html>