<?php
session_start();

$conn =mysqli_connect("localhost","arjun_13","arjun@12345","hmt_new") or die(mysqli_connect_error());

date_default_timezone_set('Asia/Kolkata');


if(isset($_SESSION['email'])){
	
	if(isset($_POST['Delete_d'])){
		
		$row = $conn->query("select adr_id from `user_address` WHERE customer_id=(SELECT `customer_id` FROM `user` WHERE email = '{$_SESSION['email']}')");
		
		if(mysqli_num_rows($row) > 0){
			$adrid = $_POST['adrid-check'];
		
			$result = $conn->query("DELETE FROM `user_address` WHERE adr_id=$adrid");
			header("Location:order.php");
		}else{
			header("Location:order.php");	
		}
	}
	
	if(isset($_POST['Delete_p'])){
		
		$row = $conn->query("select pickupadr_id from `pickup_address` WHERE customer_id=(SELECT `customer_id` FROM `user` WHERE email = '{$_SESSION['email']}')");
		
		if(mysqli_num_rows($row) > 0){
			$adrid = $_POST['pickupadrid-check'];
		
			$result = $conn->query("DELETE FROM `pickup_address` WHERE pickupadr_id=$adrid");
			header("Location:order.php");
		}else{
			header("Location:order.php");	
		}
	}
	

	
	if(isset($_POST['order'])){
	
		$quantity = $_POST['quantity'];
		$price = $_POST['price1'];
		$adrid = $_POST['adrid-check'];
		$pickupadr = $_POST['pickupadrid-check'];
		$date = date('Y-m-d');

		if($adrid == NULL){
			header("Location:order.php");
		}else if($pickupadr == NULL){
			header("Location:order.php");
		}else{
			$result = $conn->query("INSERT INTO `orders`(`date`, `customer_id`, `adr_id`, `pickupadr_id`, `quantity`, `price`) VALUES 
			('".$date."',(SELECT `customer_id` FROM `user` WHERE email = '{$_SESSION['email']}') , $adrid , $pickupadr, $quantity , $price)");

		$oid = mysqli_insert_id($conn);
		}		
	}
}
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
	
	<style>
	.order-confirm{
		padding:20px;
	}
	.order-confirm input[type=submit]{
		border:none;
		border-radius:5px;
		background:#3498DB;
		color:#fff;
		padding:7px 15px;
		float:right;
		font-size:15px;
		font-weight:bold;
	}
	.order-confirm input[type=submit]:hover{
		background:#5DADE2;
	}
	
	</style>

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
		
<!--------------------------------------------------Body--------------------------------------------->
			
			<div class="order-confirm">
					
				<div class="row">
					<div class="col-sm-12">
						<h1>Proceed to checkout</h1><hr style="border:1px solid red;">
						<div class="col-sm-6">
							<h4>Your <b>Order No</b> is <b><?php echo $oid; ?></b></h4>
				
							<h4> Your <b>Order Quantity</b> is <b><?php echo $quantity; ?></b></h4>
				
							<h4> Your <b>Order Price</b> is <b><?php echo "₹ ".$price; ?></b></h4>
							
						</div>
						<div class="col-sm-12">
							<hr style="border:1px solid grey;">
						
						<form action="payment.php" method="post">
						
						<?php
						
						$records = $conn->query("SELECT `name`, `mobileno` FROM `user_address` WHERE adr_id = $adrid;"); 
						$row = mysqli_fetch_assoc($records);
						
						$rec = $conn->query("SELECT `mobileno` FROM `pickup_address` WHERE pickupadr_id = $pickupadr;"); 
						$r = mysqli_fetch_assoc($rec);
						
						echo "<input type='hidden' name='pickupmob' value='".$r['mobileno']."'>";
						echo "<input type='hidden' name='oname' value='".$row['name']."'>";
						echo "<input type='hidden' name='omob' value='".$row['mobileno']."'>";
						echo "<input type='hidden' name='oemail' value='".$_SESSION['email']."'>";
						echo "<input type='hidden' name='oproduct' value='Home Made Tiffin'>";
						echo "<input type='hidden' name='oprice' value='".$price."'>";
						echo "<input type='hidden' name='orderid' value='".$oid."'>";
						
						?>
						<div class="col-sm-4">
							<span style="font-size:20px;font-weight:bold;">Online</span>
							<input type="submit" name="payment" value="Submit">
						
						</form>
						<br><br><br>
						<form action="cod.php" method="post">
						
						<?php
						
						$records = $conn->query("SELECT `name`, `mobileno` FROM `user_address` WHERE adr_id = $adrid;"); 
						$row = mysqli_fetch_assoc($records);
						
						$rec = $conn->query("SELECT `mobileno` FROM `pickup_address` WHERE pickupadr_id = $pickupadr;"); 
						$r = mysqli_fetch_assoc($rec);
						
						echo "<input type='hidden' name='pickupmob' value='".$r['mobileno']."'>";
						echo "<input type='hidden' name='oname' value='".$row['name']."'>";
						echo "<input type='hidden' name='omob' value='".$row['mobileno']."'>";
						echo "<input type='hidden' name='oemail' value='".$_SESSION['email']."'>";
						echo "<input type='hidden' name='oproduct' value='Home Made Tiffin'>";
						echo "<input type='hidden' name='oprice' value='".$price."'>";
						echo "<input type='hidden' name='orderid' value='".$oid."'>";
						
						?>
						
							<span style="font-size:20px;font-weight:bold;">Cash on delivery</span> 
							<input type="submit" name="cod" value="Submit">
						</form>
						</div>
						
						</div>
						</div>
					</div>
				</div>
			</div>
				
				
			<br>
		
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
