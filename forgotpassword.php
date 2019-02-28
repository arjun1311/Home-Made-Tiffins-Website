<?php
	
$conn =mysqli_connect("localhost","arjun_13","arjun@12345","hmt_new") or die(mysqli_connect_error());
	
	
$text = "";
	
if(isset($_POST['reset'])){
	$email = $_POST['email'];
	
	$result = $conn->query("SELECT * FROM user WHERE email='$email'");
	
	
    if(mysqli_num_rows($result) < 1){
		$text = "<div class='warning2'>
		<span style='margin: 10px 0 0 20px;color:red;font-size:20px;' class='glyphicon glyphicon-alert'></span>
		<span style='color:red; font-size: 15px; line-height: 40px; margin: 10px 10px;'>This Email does not exist</span>
		</div>";	
	}else{
		$id = md5(uniqid(mt_rand()));
		
		$to = $email;
		$subject = "Reset Password";
		$url = "http://homemadetiffins.in/resetpassword.php?fp_code=$id&email=$email";
		$message = " To reset password, Please visit this : $url";
		$from = "hmtiffins@gmail.com";
		$headers = "From:" . $from . "\r\n";
		$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n"; 
		 
		mail($to,$subject,$message,$headers);
		
		$result = $conn->query("UPDATE user SET fp_code = '$id' WHERE email='$email'");
		
		
		$text = "<div class='warning'>
				<span style='margin: 10px 0 0 20px;color:green;font-size:20px;' class='glyphicon glyphicon-ok'></span>
				<span style='color:green; font-size: 15px; line-height: 40px; margin: 10px 10px;'>Please check your email to reset your password.</span>
				</div>";	
	}
}

?>


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
	

<!------------------------------------------------Body-------------------------------------------->
	<body>
		

	
<!---------------------------------------------------header----------------------------------------->
	
	
		<header>
			<a href="index.html"><img src="logo.png" width="170px" height="60px" align="left" style="margin:10px 0 0 40px;"></a>
			
			

				<?php if(isset($_SESSION['email'])){
						include 'username.php';
					}else{
						echo '<div class="reg"><a href="login.php">Login / Signup</a></div>';
					}?>
			
			
		</header>

		<!------------------------------------------------Login-------------------------------------------->

		<div class="login">
			<div class="login-cont">
				<div class="login-head">
					<h3><b>Enter Email to Reset Password</b></h3>
				</div>
				<!----------------------Warning--------------->
					<?php echo $text; ?>
				<!-------------------------------------------->
				
				<div class="login-body">
					<form method="Post" action="<?php echo $_SERVER['PHP_SELF']?>">
						  <label for="uname"><b>Email</b></label>
						  <input type="email" placeholder="Enter Email" name="email">
						  
						  <button type="submit" name="reset" >Submit</button>
					</form>
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