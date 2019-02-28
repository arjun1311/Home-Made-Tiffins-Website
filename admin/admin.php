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
#cont .container{
	padding:50px;
}

button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 15px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
}


button:hover {
    background-color: #ddd;
}
.tabcontentall{
	padding:10px 20px 10px 20px;
	border-radius:5px;
	margin-bottom:20px;
-webkit-box-shadow: 0px 0px 14px 0px rgba(143,143,143,1);
-moz-box-shadow: 0px 0px 14px 0px rgba(143,143,143,1);
box-shadow: 0px 0px 14px 0px rgba(143,143,143,1);
}

.tabcontentall input[type='submit']{
	background:#E74C3C;
	border:none;
	color:#fff;
	border-radius:5px;
	padding:10px 20px;
}


@media only screen and (min-width: 300px) {
	.container .col-sm-10{
		border-left:none;
	}
	.body-orders-all{
		padding-top:20px;
	}

}
@media only screen and (min-width: 768px) {
	.body-orders-all{
		padding:50px;
	}
	.container .col-sm-10{
		border-left:1px solid #ccc;
	}
}
</style>
 
<body>
	<header>
		<h3>Welcome <?php echo $_SESSION['name']; ?></h3>
	</header>
	
		<section id ="cont">	
			<div class="container">
				<div class="row">
					<div class="col-sm-2" style="border-top:1px solid #ccc;">
						  <button class="tablinks" onclick="openCity(event, 'order')" id="defaultOpen">Orders</button>
						  <button class="tablinks" onclick="openCity(event, 'cancel')">Cancel</button>
						  <button class="tablinks" onclick="openCity(event, 'deliver')">Delivered</button>
						  <button class="tablinks" onclick="openCity(event, 'user')">Users</button>
					</div>
					<div class="col-sm-10" style="border-top:1px solid #ccc;">
						
						
						<div class="body-orders-all">
								
								<div id='order' class='tabcontent'>
								
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
									<form method='POST' action='cancel.php'><hr>
									<input type='hidden' name='orderid' value='".$row['order_id']."'>
									<input type='submit' name='deliver-order' value='Delivered'>
									</form>";
									
									echo "
									<form method='POST' action='cancel.php'><hr>
									<input type='hidden' name='orderid' value='".$row['order_id']."'>
									<input type='submit' name='deliver-order' value='Cancel'>
									</form></div>";
								}
								}
								?>
								</div>

									<div id="cancel" class="tabcontent">
									
							<?php	
$result = $conn->query("SELECT * FROM `orders` WHERE customer_id = (SELECT `customer_id` FROM `user` WHERE email = '{$_SESSION['email']}')");
							while($row=mysqli_fetch_assoc($result)){
								
								if($row['order-status']=='cancel'){

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
																				
									echo "<hr><h4><b>ORDER STATUS :</b> <span style='color:red;'>".$row['order-status']."</span></h4>
									</div>";
								}
							}
								?>
									
									</div>
									
								<div id='deliver' class='tabcontent'>
								
								<?php
$result = $conn->query("SELECT * FROM `orders` WHERE customer_id = (SELECT `customer_id` FROM `user`" );
								while($row=mysqli_fetch_assoc($result)){
									
									if($row['order-status']=='delivered'){

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
											
									echo "<hr><h4><b>ORDER STATUS :</b> <span style='color:green;'>".$row['order-status']."</span></h4>
									</div>";
								}
							}
								?>
							</div>
							
							
							
									<div id="user" class="tabcontent">
									<center><h3>USERS</h3></center><br>
									
							<?php	
							$result = $conn->query("SELECT * FROM `user`");
							while($row=mysqli_fetch_assoc($result)){

									echo "<div class='tabcontentall'>
										<h4><b>Name : ".$row['fname']." ".$row['mname']." ".$row['lname']."</b></h4>
										<h4><b>Email : ".$row['email']."</b></h4>
										<h5>Mobile No. : ".$row['mobno']."</b></h5>
										<h5>Gender : ".$row['gender']."</b></h5>
										<h5>Date of Birth : ".$row['date']." ".$row['month']." ".$row['year']."</b></h5>";
										
										
									echo "</div>";
							}
							?>
									
									</div>
						</div>
					</div>

				</div>
			</div>
		</section>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     
</body>
</html> 
