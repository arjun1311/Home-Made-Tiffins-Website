<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>HMT</title>
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
			  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		  
		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>
		<script>
		function myFunction() {
			var x = document.getElementById("quantity").value;
			var p = 50;
			for(var i=2;i<=x;i++){
				p += 50;
			}

			document.getElementById("price").innerHTML ='&#8377; '+ p;
			document.getElementById("price1").value = p;

		}
		</script>
	<style>
	
		* {
			box-sizing: border-box;
		}

		input[type=text], select, textarea {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			resize: vertical;
		}

		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: right;
		}

		input[type=submit]:hover {
			background-color: #45a049;
		}

		.container1 {
			border-radius: 5px;
			padding: 20px;
		}

		.col-75 {
			float: left;
			width: 100%;
			margin-top: 6px;
		}
		/* Clear floats after the columns */
		.row:after {
			content: "";
			display: table;
			clear: both;
		}
		textarea {
			width: 100%;
			height: 100px;
			padding:10px 10px;
			box-sizing: border-box;
			border: 1px solid #ccc;
			border-radius: 4px;
			resize: none;
		}
		.pay{
			border-left:1px solid #EAECEE;
			height:570px;
		}
		.fa{
			margin-right:10px;
		}
		.adrshow{
			background:black;
			color:white;
			line-height:10px;
			outline: none;
		}
		.adrshow:hover{
			background-color:#000;
		}
		.order-form{
			padding:5px 40px;
		}
		.btn{
			float:right;
			background:none;
			color:black;
			border:1px solid red;
			width:70px;
			line-height:30px;
			margin-right:10px;
			margin-top:0px;
		}
		.btn:hover{
			background:red;
			color:white;
		}
	</style>
	
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

	
	<div class="container">
	  <div class="row">
		<h1>Order</h1><hr style="border:1px solid red;">
			<div class="col-sm-4">
				<h4>Delivery Address:</h4><hr>
				<p> In this address we deliver your Tiffin.</p>
				<div class="container1">
				<form method="POST" action="order-confirm.php">

			<?php 
			
			if(isset($_SESSION['email'])){
				echo '<div class="col-75">';
				include "useraddr-display.php";
				echo '</div>';
				
			}?>
				<div class="row">
					<div class="col-75">
						<button type="submit" class="adrshow" name="Delete_d"><i class="fa fa-trash"></i> Delete </button>
					</div>
				</div>
				
				<div class="row">
					<div class="col-75">
						<button type="button" class="adrshow" data-toggle="modal" data-target="#myModal"><i class="far fa-plus-square"></i>&nbsp; Add New Address </button>
					</div>
				</div>

			</div>
		</div>

			<div class="col-sm-4">
				<h4>Home Address:</h4><hr>
				<p> From this address we recieve your Tiffin.</p>
				<div class="container1">

							<?php 
			
			if(isset($_SESSION['email'])){
				echo '<div class="col-75">';
				include "pickupaddr_display.php";
				echo '</div>';
				
			}?>
				<div class="row">
					<div class="col-75">
						<button type="submit" class="adrshow" name="Delete_p"><i class="fa fa-trash"></i> Delete </button>
					</div>
				</div>
				<div class="row">
					<div class="col-75">
						<button type="button" class="adrshow" data-toggle="modal" data-target="#myModal1"><i class="far fa-plus-square"></i>&nbsp; Add New Address </button>
					</div>
				</div>
				
					
				</div>
			</div>
			
			<div class="col-sm-4 pay">
				<h4>Pay:</h4><hr>
				<div class="row">
					<div class="col-sm-6">
						<h5>Quantity</h5>
					</div>
					<div class="col-sm-6" style="float:right;width:17%;padding:1px 1px;margin-right:15px;">
						  <select name="quantity" id="quantity" onchange="myFunction()">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						  </select>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6">
						<h5><i>Delivery Charges</i></h5>
					</div>
					
					<div class="col-sm-6">
						<input type="hidden" name="price1" id="price1" value='50'>
						<h5 style="float:right;" id="price" name="price">&#8377; 50</h5>
					</div>
				</div>
					<br>
					<input type="submit" name="order" value="Place Order">
				</form>
			</div>
		</div>
	</div>
		
 <!----------------------------------Delivery Modal ------------------------------------------------------------>
			<div class="modal custom fade" id="myModal" role="dialog">
				<div class="modal-dialog">
    
				<!-- Modal content-->
				 <div class="modal-content">
			    	<div class="modal-header">
						<h4 class="modal-title">Personal Details :-</h4>
					</div>
					<div class="order-form">
					<div class="row">
					<p>All fields are required (<b style="color:#e32;">*</b>)</p>
				
										
					<form method="POST" action="order2.php">
					  <div class="col-75">
						<input type="text" name="fname" placeholder="Your Full name.." autocomplete="off" required>
					 </div>
					
						<div class="col-75">
							<input type="text" name="mob" placeholder="Enter Your Mobile No.." autocomplete="off" required>
						</div>
					
						<div class="col-75">
							<textarea name="addr" placeholder="Your Address" autocomplete="off" required></textarea>
						</div>
					
						<div class="col-75">
							<input type="text" name="pincode" placeholder="Your Pincode.." autocomplete="off" required>
						</div>
								
						<div class="col-75">
							<input type="text" name="landmark" placeholder="Your landmark.." autocomplete="off" required>
						</div>

						
					</div>
					</div>
						<div class="modal-footer">
							<input type="submit" name="save-del"  value="Save">
						  <button type="button" class="btn" data-dismiss="modal">Close</button>
						  </form>
						</div>
					</div>
					</div>
					</div>
					
<!------------------------------------------------End---------------------------------------------------------->


 <!----------------------------------Pick up Delivery Modal ------------------------------------------------------------>
			<div class="modal custom fade" id="myModal1" role="dialog">
				<div class="modal-dialog">
    
				<!-- Modal content-->
				 <div class="modal-content">
			    	<div class="modal-header">
						<h4 class="modal-title">Pickup Details :-</h4>
					</div>
					<div class="order-form">
					<div class="row">
					<p>All fields are required (<b style="color:#e32;">*</b>)</p>
				
										
					<form method="POST" action="order2.php">
					  <div class="col-75">
						<input type="text" name="fname" placeholder="Your Full name.." autocomplete="off" required>
					 </div>
					
						<div class="col-75">
							<input type="text" name="mob" placeholder="Enter Your Home Mobile No.." autocomplete="off" required>
						</div>
					
						<div class="col-75">
							<textarea name="addr" placeholder="Your Address" autocomplete="off" required></textarea>
						</div>
					
						<div class="col-75">
							<input type="text" name="pincode" placeholder="Your Pincode.." autocomplete="off" required>
						</div>
								
						<div class="col-75">
							<input type="text" name="landmark" placeholder="Your landmark.." autocomplete="off" required>
						</div>
					
						
					</div>
					</div>
						<div class="modal-footer">
							<input type="submit" name="save-pickupdel"  value="Save">
						  <button type="button" class="btn" data-dismiss="modal">Close</button>
						  </form>
						</div>
					</div>
					</div>
					</div>

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

		<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
		
	
	</body>
	
</html>