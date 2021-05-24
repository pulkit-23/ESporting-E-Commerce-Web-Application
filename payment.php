<?php include ( "inc/connect.inc.php" ); ?>
<?php 

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

$d = date("Y-m-d"); 
$timestamp = time();
$date = strtotime("+7 day", $timestamp);
$date = date('Y-m-d', $date);

$getposts1 = mysqli_query($link,"SELECT * FROM cart") or die(mysqli_error());
$price=0;
if (mysqli_num_rows($getposts1)) {
        while($row = mysqli_fetch_assoc($getposts1)){

            $poid=$row['pid'];
            $quan=$row['quantity'];
            $price1=$row['price'];
            $oplace=$row['oplace'];
            $mobile=$row['mobile'];
            $temp=$price1*$quan;
            $price =$price + $temp;


            $q=mysqli_query($link,"INSERT INTO orders (uid,pid,quantity,oplace,mobile,dstatus,odate,ddate) VALUES ('$user','$poid',$quan,'$oplace','$mobile','no','$d','$date')");


        }

        $success_message = '
            <div class="signupform_content"><h2><font face="bookman">Your order was successfull!</font></h2>
            <div class="signupform_content"><h2><font face="bookman">Total Price: '.$price.'</font></h2>
            <div class="signupform_text" style="font-size: 18px; text-align: center;">
            <font face="bookman">
			We have sent you a verification mail.<br> Thank you for shopping with E-Sporting!.
			</font></div></div>';
		
		$msg = "
		Hello, ".$uname_db."!
		Your Order was successfull!
		You will receive your order by ".$date."
		Thank you for shopping with E-Sporting!
		";

		mail("pulkit.gupta2018@vitstudent.ac.in","Order Confirmation",$msg,"From: pulkitg1010@gmail.com");

}

?>