<?php include ( "inc/connect.inc.php" ); ?>
<?php 

if (isset($_REQUEST['poid'])) {
	
	$poid = mysqli_real_escape_string($link,$_REQUEST['poid']);
}else {
	header('location: index.php');
}

if (isset($_POST['order'])) {

    $mbl = $_POST['mobile'];
    $addr = $_POST['address'];
    $quan = $_POST['quantity'];
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Payment</title>
		<link rel="stylesheet" type="text/css" href="payment.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container py-5">
            <div class="text"><p>Payment</p></div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card ">
                        <div class="card-header">
                            <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                                
                                <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                    <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#cod" class="nav-link "> <i class="fas fa-rupee-sign"></i> Cash on Delivery </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#upi" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> UPI </a> </li>
                                </ul>
                            </div> 
                            
                            <div class="tab-content">
                                
                                <div id="credit-card" class="tab-pane fade show active ">
                                <?php
                                echo '<form action="payment2.php?poid='.$poid.'&mbl='.$mbl.'&quan='.$quan.'&addr='.$addr.'" method="POST" role="form">
                                        <div class="form-group"> <label for="username">
                                                <h6>Name on Card </h6>
                                            </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                        <div class="form-group"> <label for="cardNumber">
                                                <h6>Card number</h6>
                                            </label>
                                            <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                                <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group"> <label><span class="hidden-xs">
                                                            <h6>Expiration Date</h6>
                                                        </span></label>
                                                    <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                        <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                    </label> <input type="text" required class="form-control"> </div>
                                            </div>
                                        </div>
                                        <div class="card-footer"> <button name="order" type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                                    </form>' ?>
                                </div>
                            </div>
                            
                            <div id="paypal" class="tab-pane fade ">
                                <h6 class="pb-2">Select your paypal account type</h6>
                                <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> Domestic </label> <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">International </label></div>
                                <h4>Already Have a Paypal Account?</h4>
                                <h2>Login</h2>
                                <?php
                                echo '<form action="payment2.php?poid='.$poid.'&mbl='.$mbl.'&quan='.$quan.'&addr='.$addr.'" method="POST" role="form">
                                    <div class="form-group"> <label for="email">
                                            <h6>Email </h6>
                                        </label> <input type="text" name="email" placeholder="Enter your email id" required class="form-control "> 
                                    </div>
                                    <div class="form-group"> <label for="password">
                                        <h6>Password </h6>
                                    </label> <input type="text" name="password" placeholder="Enter your password" required class="form-control "> 
                                </div>
                                
                                <p> <button name="order" type="submit" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Log into my Paypal</button> </p>
                                <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                                </form>' ?>
                            </div> 
                            
                            <div id="net-banking" class="tab-pane fade ">
                                <div class="form-group "> <label for="Select Your Bank">
                                        <h6>Select your Bank</h6>
                                        <?php
                                echo '<form action="payment2.php?poid='.$poid.'&mbl='.$mbl.'&quan='.$quan.'&addr='.$addr.'" method="POST" role="form">
                                    </label> <select class="form-control" id="ccmonth">
                                        <option value="" selected disabled>--Please select your Bank--</option>
                                        <option>Andhra Bank</option>
                                        <option>Allahabad Bank</option>
                                        <option>Bank of Baroda</option>
                                        <option>Canara Bank</option>
                                        <option>IDBI Bank</option>
                                        <option>ICICI Bank</option>
                                        <option>Indian Overseas Bank</option>
                                        <option>Punjab National Bank</option>
                                        <option>South Indian Bank</option>
                                        <option>State Bank Of India</option>
                                        <option>City Union Bank</option>
                                        <option>HDFC Bank</option>
                                        <option>Indusland Bank</option>
                                        <option>Syndicate Bank</option>
                                        <option>Deutsche Bank</option>
                                        <option>Corporation Bank</option>
                                        <option>UCO Bank</option>
                                        <option>Indian Bank</option>
                                        <option>Federal Bank</option>
                                    </select> </div>
                                <div class="form-group">
                                    <p> <button name="order" type="submit" class="btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Proceed Payment</button> </p>
                                </div>
                                <p class="text-muted">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                                </form>' ?>
                            </div>
                            
                            <div id="cod" class="tab-pane fade ">
                            <?php
                                echo '<form action="payment2.php?poid='.$poid.'&mbl='.$mbl.'&quan='.$quan.'&addr='.$addr.'" method="POST" role="form">
                                    <div class="form-group"> <label for="fname">
                                            <h6>First Name: </h6>
                                        </label> <input type="text" name="fname" placeholder="Enter your first name" required class="form-control "> 
                                    </div>
                                    <div class="form-group"> <label for="lname">
                                        <h6>Last Name: </h6>
                                        </label> <input type="text" name="lname" placeholder="Enter your last name" required class="form-control "> 
                                    </div>
                                    <div class="form-group"> <label for="mobile">
                                        <h6>Mobile no: </h6>
                                        </label> <input type="text" name="mobile" placeholder="Enter your mobile number" required class="form-control "> 
                                    </div>
                                    <div class="form-group"> <label for="email">
                                        <h6>Email ID: </h6>
                                        </label> <input type="text" name="email" placeholder="Enter your Email ID" required class="form-control "> 
                                    </div>
                                    <div class="form-group"> <label for="address">
                                        <h6>Delivery Address: </h6>
                                        </label> <input type="text" name="address" placeholder="Enter your address" required class="form-control "> 
                                    </div>
                                    <p> <button type="submit" class="btn btn-primary "> Submit</button> </p>
                                </form>' ?>
                                
                            </div> 
                           
                            <div id="upi" class="tab-pane fade ">
                                <?php
                                echo '<form action="payment2.php?poid='.$poid.'&mbl='.$mbl.'&quan='.$quan.'&addr='.$addr.'" method="POST" role="form">
                                    <div class="form-group"> <label for="upiid">
                                            <h6>UPI ID: </h6>
                                        </label> <input type="text" name="upiid" placeholder="Enter your upi id" required class="form-control "> 
                                    </div>
                                    <p> <button name="order" type="submit" class="btn btn-primary "> Submit</button> </p>
                                </form>'
                                ?>
                                <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                            </div> 
                            
                        </div>
                    </div>
                </div>
            </div>
            <script src="payment.js"></script>
    </body>
</html>