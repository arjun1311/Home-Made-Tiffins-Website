<?php 
session_start(); 
?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>HMT</title>
		<meta name="description" content="Order food from your home and we deliver it to you.">
		<meta name="author" content="Home Made Tiffins">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
			  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		  
		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>
<!------------------------------------------------Body-------------------------------------------->
	<body>
	
<!---------------------------------------------------header----------------------------------------->
	
	
		<header>
		<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<a href="index.php"><img src="logo.png" width="170px" height="60px" align="left" style="margin:10px 0 0 0;"></a>
			</div>
			
			<div class="col-sm-6">
				<?php if(isset($_SESSION['email'])){
						include 'username.php';
					}else{
						echo '<div class="reg"><a href="login.php">Login / Signup</a></div>';
					}?>
			</div>
			</div>
		</div>
			
		</header>
		
		<section id ="cont">	
			<div id="area" class="s-container" >

<?php
$conn =mysqli_connect("localhost","arjun_13","arjun@12345","hmt_new") or die(mysqli_connect_error());

$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$udf1=$_POST["udf1"];
$udf2=$_POST["udf2"];
$udf3=$_POST["udf3"];
$salt="ubjIZWMC3d";

// Salt should be same Post Request 

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'||||||||'.$udf3.'|'.$udf2.'|'.$udf1.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'||||||||'.$udf3.'|'.$udf2.'|'.$udf1.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
       if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
		   } else {
		
		$result = $conn->query("UPDATE `orders` SET `mode`='Online',`transaction_id`= '{$txnid}',`status`='{$status}',`order-status`='confirmed' WHERE order_id ='{$udf1}';");			   
			   
          echo "<div class='row'>
		  <div class='col-sm-12'>
		  <div class='head-pay'>
		  <h3><b><i class='far fa-check-circle'></i></b><h3>Thank You. Your order status is ". $status .".</h3>
		  </div><br>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4><br>";
		  echo "<h4>Your Order No. for this transaction is ".$udf1.".</h4><br>";
          echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4><br>";	  

		  echo "<h3><b>Please give a call at your home so that they can prepare your tiffin on time</b></h3>
		  </div>
		  </div><br><br>";
 }


	   
$message = "Dear ".$firstname." 
You have placed an order of tiffin from HMT.
Your order no is ".$udf1."
Our delivery boy will pick the order in 1 hour from your pickup address and soon it will shipped to you";

$authKey = "245526AIeHtyzx5bd978c4";
$senderId = "MYHMTS";
$route = "4";
$mobile = "$udf2,$udf3";
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobile,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route,
    'country'=>'91'
);
$url="https://api.msg91.com/api/sendhttp.php";
$ch = curl_init();
    curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$output = curl_exec($ch);
 if(curl_errno($ch))
{
    $result = $conn->query("UPDATE `orders` SET `sms`='fail' WHERE order_id ='{$udf1}';");	
}else{
	$result = $conn->query("UPDATE `orders` SET `sms`='success' WHERE order_id ='{$udf1}';");	
}
curl_close($ch);
		


$records = $conn->query("SELECT * FROM `user_address` WHERE adr_id = (SELECT `adr_id` FROM `orders` WHERE order_id = $udf1)"); 
$row = mysqli_fetch_assoc($records);
		
$records = $conn->query("SELECT * FROM `pickup_address` WHERE pickupadr_id = (SELECT `pickupadr_id` FROM `orders` WHERE order_id = $udf1)");
$r = mysqli_fetch_assoc($records);

$records = $conn->query("SELECT * FROM `orders` WHERE order_id = $udf1");
$re = mysqli_fetch_assoc($records);


$message = "
".$firstname." have placed an order of tiffin from HMT.

----ORDER------
Order no is ".$udf1."
Mode - ".$re['mode']."
Quantity - ".$re['quantity']."
Price - ".$re['price']."

----DELIVERY ADDRESS----
Name - ".$row['name']."
Mobile No - ".$row['mobileno']."
Address - ".$row['address']."
Pincode - ".$row['pincode']."
Landmark - ".$row['landmark']."
State - ".$row['state']."

----PICKUP ADDRESS----
Name - ".$r['name']."
Mobile No - ".$r['mobileno']."
Address - ".$r['address']."
Pincode - ".$r['pincode']."
Landmark - ".$r['landmark']."
State - ".$r['state']."


Pickup the delivery from pickup address and deliver it on the delivery address.";

$authKey = "245526AIeHtyzx5bd978c4";
$senderId = "MYHMTS";
$route = "4";
$mobile = "7780950994,7006723115";
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobile,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route,
    'country'=>'91'
);
$url="https://api.msg91.com/api/sendhttp.php";
$ch = curl_init();
    curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$output = curl_exec($ch);
 if(curl_errno($ch))
{
    $result = $conn->query("UPDATE `orders` SET `smsd`='fail' WHERE order_id ='{$udf1}';");	
}else{
	$result = $conn->query("UPDATE `orders` SET `smsd`='success' WHERE order_id ='{$udf1}';");	
}
curl_close($ch);

	$to = $_SESSION['email'];
	$subject = "Home Made Tiffins Query";
	$message = "Dear ".$firstname." 
	
				You have placed an order of tiffin from HMT.
				Your order no is ".$udf1."
				Our delivery boy will pick the order in 1 hour from your pickup address and soon it will shipped to you";
	 
	$from = "hmtiffins@gmail.com";
	$headers = "From:" . $from . "\r\n";
	$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n"; 
	 
	mail($to,$subject,$message,$headers);
		
		
	$to = "hmtiffins@gmail.com";
	$subject = "Home Made Tiffins Query";
	$message = "".$firstname." have placed an order of tiffin from HMT.

----ORDER------
Order no is ".$udf1."
Mode - ".$re['mode']."
Quantity - ".$re['quantity']."
Price - ".$re['price']."

----DELIVERY ADDRESS----
Name - ".$row['name']."
Mobile No - ".$row['mobileno']."
Address - ".$row['address']."
Pincode - ".$row['pincode']."
Landmark - ".$row['landmark']."
State - ".$row['state']."

----PICKUP ADDRESS----
Name - ".$r['name']."
Mobile No - ".$r['mobileno']."
Address - ".$r['address']."
Pincode - ".$r['pincode']."
Landmark - ".$r['landmark']."
State - ".$r['state']."


Pickup the delivery from pickup address and deliver it on the delivery address.";
	 
	$from = "hmtiffins@gmail.com";
	$headers = "From:" . $from . "\r\n";
	$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n"; 
	 
	mail($to,$subject,$message,$headers);
	
?>	

			
			</div>
			
		</section>
		
<!-----------------------------------------------------Footer---------------------------------------->		


		<footer id="footer">
			<div class="foot">
				<div class="row">
					<div class="col-sm-4">
						<ul>
							<h4>Links</h4>
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About us</a></li>
							<li><a href="contact.php">Contact</a></li>
							<li><a href="">Carrers</a></li>
						</ul>
					</div>
					
					<div class="col-sm-4">
						<ul>
							<h4>Other</h4>
							<li><a href="">Terms & Conditions</a></li>
							<li><a href="">Refund & Cancellation</a></li>
							<li><a href="">Privacy Policy</a></li>
							<li><a href="">Offer Terms</a></li>
						</ul>
					</div>
					
					<div class="col-sm-4">
						<h4>Keep in touch</h4>
						<div class="social">
							<span><a href=""><i class="fab fa-twitter-square"></i></a></span>
							<span><a href=""><i class="fab fa-facebook-square"></i></a></span>
							<span><a href=""><i class="fab fa-instagram"></i></a></span>
							<span><a href=""><i class="fab fa-pinterest-square"></i></a></span>
						</div>
					</div>
				</div >
				<hr>
				<div class="row">
					<div class="col-sm-12">
						<p>&copy; 2018 HMT | All rights Reserved.</p>
					</div>
				</div>
			</div>
		</footer>
	
	</body>
	
</html>
