
<?php 
session_start(); 


$text = " ";

if(isset($_POST['msg-submit']))
{
	$name=$_POST['fname'];
	$email=$_POST['email'];
	$message=$_POST['msg'];
	
	$to = "hmtiffins@gmail";
	$subject = "Home Made Tiffins Query";
	$message = " Name: " . $name ."\r\n Email: " . $email . "\r\n Message:\r\n" . $message;
	 
	$from = "hmtiffins@gmail.com";
	$headers = "From:" . $from . "\r\n";
	$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n"; 
	 
	if(mail($to,$subject,$message,$headers))
	{
	  $text = "<span style='color:blue; font-size: 35px; line-height: 40px; margin: 10px;'>Your Message was sent successfully !</span>";
	}else{
		$text = "<span style='color:red; font-size: 35px; line-height: 40px; magin: 10px;'>Error! Please try again.</span>";
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
.contact-area{
	background:#EAECEE;
	padding-top:50px;
	padding-bottom:50px;
}
.contact-form{
	border-radius:5px;
	padding:10px 20px;
	background:#fff;
	border:1px solid #ddd;
}
.contact-form .col-75 {
	padding:0 15px;
	float: left;
	width: 100%;
	margin-top: 6px;
}
.contact-form textarea{
	width: 100%;
	height: 100px;
	padding:10px 10px;
	box-sizing: border-box;
	border: 1px solid #ccc;
	resize: none;
}
.contact-form input[type="submit"]{
	float:right;
	background:#DF1B1B;
	padding:10px 20px;
	border:none;
	color:#fff;
	border-radius:5px;
	font-size:15px;
}
.contact-form input[type="submit"]:hover{
	background:#EC3838;
}
.contact-form p{
	font-size:15px;
	margin-bottom:10px;
	margin-left:5px;
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

		<section id ="cont">
			
			<div class="contact-area">
				<div class="container">
					<div class="row">
						<div class="col-sm-7">
							<div class="contact-form">
								<h4>Contact Form </h4><hr>
								<?php echo $text ?>
								<div class="row">
									<form method="POST">
									<div class="col-75">
										<input type="text" name="fname" placeholder="Enter Full Name">
									</div>
									<div class="col-75">
										<input type="email" name="email" placeholder="Enter Email"> 
									</div>
									<div class="col-75">
										<textarea name="msg" placeholder="Enter Message" autocomplete="off"></textarea>
									</div>
									<div class="col-75">
										<input type="submit" name="msg-submit" value="Submit">
									</div>
									</form>
								</div>
							</div>
						</div>
						
						<div class="col-sm-5">
							<div class="contact-form">
								<h4>Contact us</h4><hr>
								<p><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Office :- SMVDU kakryal, J & K</p><br>
								<p><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;7006723115, 7051003706</p><br>
								<p><i class="fas fa-envelope"></i>&nbsp;&nbsp;hmtiffins@gmail.com</p><br>
							</div>
						
						</div>
					</div>
				</div>
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

		<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
		
	
	</body>
	
</html>