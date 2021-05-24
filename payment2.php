<?php include ( "inc/connect.inc.php" ); ?>
<?php 

if (isset($_REQUEST['poid'])) {
	
	$poid = mysqli_real_escape_string($link,$_REQUEST['poid']);
	$mbl = mysqli_real_escape_string($link,$_REQUEST['mbl']);
	$addr = mysqli_real_escape_string($link,$_REQUEST['addr']);
	$quan = mysqli_real_escape_string($link,$_REQUEST['quan']);
}else {
	header('location: index.php');
}
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
	header("location: login.php?ono=".$poid."");
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($link,"SELECT * FROM user WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['firstName'];
			$uemail_db = $get_user_email['email'];

			$umob_db = $get_user_email['mobile'];
			$uadd_db = $get_user_email['address'];
}


$getposts = mysqli_query($link,"SELECT * FROM products WHERE id ='$poid'") or die(mysqli_error());
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


	try {
		
		
		
		$d = date("Y-m-d"); 
		$timestamp = time();
		$date = strtotime("+7 day", $timestamp);
		$date = date('Y-m-d', $date);
		
		$amount=$price*$quan;

		$msg = "
		Hello, ".$uname_db."!
		Your Order was successfull!
		You will receive your order by ".$date."
		Thank you for shopping with E-Sporting!

		Your order summary is as follows:
		Total Amount: ".$amount."
		Delivery Address: ".$addr."
		Mobile number: ".$mbl."

		Please visit again! :)
		";
		
		if(mysqli_query($link,"INSERT INTO orders (uid,pid,pName,quantity,cost,oplace,mobile,odate,ddate) VALUES ('$user','$poid','$pName',$quan,$amount,'$addr','$mbl','$d','$date')")){

			$success_message = '
			<div class="signupform_content"><h2><font face="bookman">Your order was successfull!</font></h2>
			<div class="signupform_text" style="font-size: 18px; text-align: center;">
			<font face="bookman">
				We have sent you a verification mail.<br> Thank you for shopping with E-Sporting!.
			</font></div></div>';
			mail("pulkit.gupta2018@vitstudent.ac.in","Order Confirmation",$msg,"From: pulkitg1010@gmail.com");
		}else{
			$error_message = 'Something goes wrong!';
		}
						

	}
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
//}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Order Successful!</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-image: url(image/i10.jpg);">
	<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="signin.php">SIGN IN</a>';
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
	<div class="categolis">
		<table>
			<tr>
			<th><a href="sports/gym.php" style="text-decoration: none;color: #fff;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">Gym</a></th>
<th><a href="sports/hockey.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">Hockey</a></th>
<th><a href="sports/swim.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">Swimming</a></th>
<th><a href="sports/cricket.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">Cricket</a></th>
<th><a href="sports/basketball.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">BasketBall</a></th>
<th><a href="sports/badminton.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">Badminton</a></th>
<th><a href="sports/football.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">FootBall</a></th>
<th><a href="sports/indoor.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">Indoor Gamnes</a></th>
			</tr>
		</table>
	</div>
	<div class="holecontainer" style=" padding-top: 20px; padding: 0 20%">
		<div class="container signupform_content ">
			<div>

				<h2 style="padding-bottom: 20px;">Order Form</h2>
				<div style="float: right;">
				<?php 
                    if(isset($success_message)) {echo $success_message;}
                    else if (isset($error_message)) {echo $error_message;}
					

				 ?>
					
				</div>
			</div>
		</div>
		<div style="float: left; font-size: 23px;">
			<div>
				<?php
					echo '
						<ul style="float: left;">
							<li style="float: left; padding: 0px 25px 25px 25px;">
								<div class="home-prodlist-img"><a href="'.$category.'/view_product.php?pid='.$id.'">
									<img src="image/product/'.$item.'/'.$picture.'" class="home-prodlist-imgi">
									</a>
									<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px;">'.$pName.'</span><br> Price: Rs. <span id="amountText">'.$price.'</span> <span id="aHiddenText" style="display:none">'.$price.'</span></div>
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
