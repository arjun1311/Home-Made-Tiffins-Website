<?php 
session_start();

$conn =mysqli_connect("localhost","arjun_13","arjun@12345","hmt_new") or die(mysqli_connect_error());


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
		  
		<link rel="stylesheet" type="text/css" href="css/admin-style.css">

	</head>
<style>
header{
	background:#000;
	height:80px;;
	width:100%;
	padding:10px;
	text-align:Center;
	color:#fff;
}
section{
	background:#999;
	padding:20px;
}
.aheader{
	background:#fff;
	padding:10px;
}
.tabcontentall{
	padding:20px;
	margin-top:20px;
	background:#fff;
	margin-bottom:20px;
}

.tabcontentall input[type='submit']{
	background:#1D8348;
	border:none;
	color:#fff;
	border-radius:5px;
	padding:10px 20px;
}
.tabcontentall input[type='submit']:hover{
	background:#229954;
}

@media only screen and (min-width: 300px) {
	section{
		padding:20px;
	}

	.body-orders-all{
		padding-top:20px;
	}

}
@media only screen and (min-width: 768px) {
	section{
		padding:20px;
	}
	.body-orders-all{
		padding:50px;
	}
}
</style>
 
<body>
	<header>
		<h3>Welcome <?php echo $_SESSION['name']; ?></h3>
	</header>
	
	<section>
		<div id="body">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="aheader">
						<h3>Order Status :<b style="color:grey"> Confirmed</b></h3>
					</div>
		<?php
$result = $conn->query("SELECT * FROM `orders`");
								while($row=mysqli_fetch_assoc($result)){
									
								if($row['order-status']=="confirmed"){

									echo "<div class='tabcontentall'>
										<h4><b>Order No. : ".$row['order_id']."</b></h4><hr>

										<h5>Date : ".$row['date']."</h5>";

									echo "<h5>Quantity : ".$row['quantity']."</h5>
										<h5>Price : ₹".$row['price']."</h5>
										<h5>Mode : ".$row['mode']."</h5>";
										
										if($row['mode'] == 'Online'){
											echo "<h5>Transaction Id : ".$row['transaction_id']."</h5>";
										}
										
$deliver = $conn->query("SELECT * FROM `user_address` WHERE adr_id = ".$row['adr_id']."");
$del=mysqli_fetch_assoc($deliver);
$home = $conn->query("SELECT * FROM `pickup_address` WHERE pickupadr_id = ".$row['pickupadr_id']."");
$hom=mysqli_fetch_assoc($home);
								
									echo "<hr><h4>Delivery Address:</h4>";
									echo "<h5><b>".$del['name']."</b></h5>
										<h5>".$del['mobileno']."</h5>
										<h5>".$del['address']."
										".$del['pincode']."</h5>";

									echo "<hr><h4>Home Address:</h4>";
									echo "<h5><b>".$hom['name']."</b></h5>
										<h5>".$hom['mobileno']."</h5>
										<h5>".$hom['address']."
										".$hom['pincode']."</h5>";
											
									echo "<hr><h4><b>ORDER STATUS : ".$row['order-status']."</b></h4>";											
									echo "
									<form method='POST' action='delivered.php'><hr>
									<input type='hidden' name='orderid' value='".$row['order_id']."'>
									<input type='submit' name='deliver-order' value='Delivered'>
									</form></div>";
								}
								}
								?>
						</div>
				
				
				<div class="col-sm-4">
					<div class="aheader">
						<h3>Order Status :<b style="color:red"> Canceled</b></h3>
					</div>
		<?php
$result = $conn->query("SELECT * FROM `orders`");
								while($row=mysqli_fetch_assoc($result)){
									
								if($row['order-status']=="cancel"){	

									echo "<div class='tabcontentall'>
										<h4><b>Order No. : ".$row['order_id']."</b></h4><hr>

										<h5>Date : ".$row['date']."</h5>";

									echo "<h5>Quantity : ".$row['quantity']."</h5>
										<h5>Price : ₹".$row['price']."</h5>
										<h5>Mode : ".$row['mode']."</h5>";
										
										if($row['mode'] == 'Online'){
											echo "<h5>Transaction Id : ".$row['transaction_id']."</h5>";
										}
										
$deliver = $conn->query("SELECT * FROM `user_address` WHERE adr_id = ".$row['adr_id']."");
$del=mysqli_fetch_assoc($deliver);
$home = $conn->query("SELECT * FROM `pickup_address` WHERE pickupadr_id = ".$row['pickupadr_id']."");
$hom=mysqli_fetch_assoc($home);
								
									echo "<hr><h4>Delivery Address:</h4>";
									echo "<h5><b>".$del['name']."</b></h5>
										<h5>".$del['mobileno']."</h5>
										<h5>".$del['address']."
										".$del['pincode']."</h5>";

									echo "<hr><h4>Home Address:</h4>";
									echo "<h5><b>".$hom['name']."</b></h5>
										<h5>".$hom['mobileno']."</h5>
										<h5>".$hom['address']."
										".$hom['pincode']."</h5>";
											
									echo "<hr><h4><b>ORDER STATUS : ".$row['order-status']."</b></h4></div>";											
								}
								}
								?>
				</div>
				
				
				<div class="col-sm-4">
					<div class="aheader">
						<h3>Order status :<b style="color:green"> Delivered</b></h3>
					</div>
		<?php
$result = $conn->query("SELECT * FROM `orders` ");
								while($row=mysqli_fetch_assoc($result)){
									
								if($row['order-status']=="delivered"){

									echo "<div class='tabcontentall'>
										<h4><b>Order No. : ".$row['order_id']."</b></h4><hr>

										<h5>Date : ".$row['date']."</h5>";

									echo "<h5>Quantity : ".$row['quantity']."</h5>
										<h5>Price : ₹".$row['price']."</h5>
										<h5>Mode : ".$row['mode']."</h5>";
										
										if($row['mode'] == 'Online'){
											echo "<h5>Transaction Id : ".$row['transaction_id']."</h5>";
										}
										
$deliver = $conn->query("SELECT * FROM `user_address` WHERE adr_id = ".$row['adr_id']."");
$del=mysqli_fetch_assoc($deliver);
$home = $conn->query("SELECT * FROM `pickup_address` WHERE pickupadr_id = ".$row['pickupadr_id']."");
$hom=mysqli_fetch_assoc($home);
								
									echo "<hr><h4>Delivery Address:</h4>";
									echo "<h5><b>".$del['name']."</b></h5>
										<h5>".$del['mobileno']."</h5>
										<h5>".$del['address']."
										".$del['pincode']."</h5>";

									echo "<hr><h4>Home Address:</h4>";
									echo "<h5><b>".$hom['name']."</b></h5>
										<h5>".$hom['mobileno']."</h5>
										<h5>".$hom['address']."
										".$hom['pincode']."</h5>";
											
									echo "<hr><h4><b>ORDER STATUS : ".$row['order-status']."</b></h4></div>";											
								}
								}
								?>
				</div>
		</div>
	
	</section>

</body>
</html>