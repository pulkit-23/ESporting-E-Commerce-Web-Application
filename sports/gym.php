<?php include ( "../inc/connect.inc.php" ); ?>
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
	<title>Gym</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<?php include ( "../inc/mainheader.inc.php" ); ?>


	<div class="categolis">
		<table>
			<tr>
				<th><a href="gym.php" style="text-decoration: none;color: #fff;padding: 4px 12px;background-color: #E85A4F;border-radius: 12px;">Gym</a></th>
				<th><a href="hockey.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">Hockey</a></th>
				<th><a href="swim.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">Swimming</a></th>
				<th><a href="cricket.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">Cricket</a></th>
				<th><a href="basketball.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">BasketBall</a></th>
				<th><a href="badminton.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">Badminton</a></th>
				<th><a href="football.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">FootBall</a></th>
				<th><a href="indoor.php" style="text-decoration: none;color: #ddd;padding: 4px 12px;background-color: #1C3334;border-radius: 12px;">Indoor Games</a></th>
			</tr>
		</table>
	</div>


	<div style="padding: 30px 120px; font-size: 25px; margin: 0 auto; display: table; width: 98%;">
		<div>
		<?php 
			$getposts = mysqli_query($link,"SELECT * FROM products WHERE available >='1' AND item='gym'  ORDER BY id DESC LIMIT 10") or die(mysqli_error());
					if (mysqli_num_rows($getposts)) {
					echo '<ul id="recs">';
					while ($row = mysqli_fetch_assoc($getposts)) {
						$id = $row['id'];
						$pName = $row['pName'];
						$price = $row['price'];
						$description = $row['description'];
						$picture = $row['picture'];
						
						echo '
							<ul style="float: left;">
								<li style="float: left; padding: 0px 25px 25px 25px;">
									<div class="home-prodlist-img"><a href="view_product.php?pid='.$id.'">
										<img src="../image/product/gym/'.$picture.'" class="home-prodlist-imgi">
										</a>
										<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px;">'.$pName.'</span><br> Price: Rs. '.$price.' </div>
									</div>
									
								</li>
							</ul>
						';

						}
				}
		?>
			
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