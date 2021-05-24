<?php include ( "inc/connect.inc.php" ); ?>
<?php 

if (isset($_REQUEST['poid'])) {
	
	$poid = mysqli_real_escape_string($link,$_REQUEST['poid']);
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



if (isset($_POST['order'])) {

$mbl = $_POST['mobile'];
$addr = $_POST['address'];
$quan = $_POST['quantity'];

	try {
		if(empty($_POST['mobile'])) {
			throw new Exception('Mobile can not be empty');
			
		}
		if(empty($_POST['address'])) {
			throw new Exception('Address can not be empty');
			
		}
		if(empty($_POST['quantity'])) {
			throw new Exception('Address can not be empty');
			
		}
		
		
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
			
		if(mysqli_query($link,"INSERT INTO orders (uid,pid,pname,quantity,cost,oplace,mobile,odate,ddate) VALUES ('$user','$poid','$pName',$quan,$amount,'$addr','$mbl','$d','$date')")){

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
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
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
<th><a href="sports/indoor.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">Indoor Games</a></th>
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
					else {
					echo '
						<div class="">
						<div class="signupform_text"></div>
						<div>
							<form action="payment1.php?poid='.$poid.'" method="POST" class="registration">
								<div class="signup_form" style="    margin-top: 38px;">
									<div>
										<td>
											<input name="mobile" placeholder="Your mobile number" required="required" class="email signupbox" type="text" size="30" >
										</td>
									</div>
									<div>
										<td>
											<input name="address" id="password-1" required="required"  placeholder="Write your full address" class="password signupbox " type="text" size="30" >
										</td>
									</div>
									<div>
										<td>
											<select onchange="changeAmount()" name="quantity" required="required" id="productAmount" style=" font-size: 20px;
										font-style: italic; margin-bottom: 3px;margin-top: 0px;padding: 14px;line-height: 25px;border-radius: 4px;border: 1px solid #000000;color: #000000;margin-left: 0;width: 300px;background-color: transparent;" class="">';
				 ?><?php
												for ($i=1; $i<=$available; $i++) { 
													echo '<option  value="'.$i.'">Quantity: '.$i.'</option>';
												}
											?>
											<?php echo '
											</select>
										</td>
									</div>
									<div>
										<input name="order" class="uisignupbutton signupbutton" type="submit" value="Confirm Order">
									</div>
									<div class="signup_error_msg"> '; ?>
										<?php 
											if (isset($error_message)) {echo $error_message;}
											
										?>
									<?php echo '</div>
								</div>
							</form>
							
						</div>
					</div>

					';

					}

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
	<script type="text/javascript">
	function changeAmount() {
	    var v = document.getElementById("aHiddenText").innerHTML;
	    document.getElementById("amountText").innerHTML = v;
	    var sBox = document.getElementById("productAmount");
    	var y = sBox.value;
	    var x = document.getElementById("amountText").innerHTML;
	    var y = parseInt(y);
	    var x = parseInt(x);
	    document.getElementById("amountText").innerHTML = x+"x"+y+ " = " + x*y;
	}
	</script>
</body>
</html>
