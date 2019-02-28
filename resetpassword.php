<?php

$conn =mysqli_connect("localhost","arjun_13","arjun@12345","hmt_new") or die(mysqli_connect_error());
	
	
$text = "";
	
if(isset($_POST['reset'])){
	$email = $_POST['email'];
	$fp = $_POST['fp'];
	$psw = $_POST['psw'];
	$psw2 = $_POST['psw2'];
	
		if($psw == $psw2){
			$pass = password_hash($psw,PASSWORD_DEFAULT);

			$conn->query("UPDATE user SET password = '$pass' WHERE email='$email' AND fp_code='$fp'");
			
		}else{
				$text = "<div class='warning2'>
				<span style='margin: 10px 0 0 20px;color:red;font-size:20px;' class='glyphicon glyphicon-remove'></span>
				<span style='color:red; font-size: 15px; line-height: 40px; margin: 10px 20px;'>Passwords not Match</span>
				</div>";			
		}
}
	
	
if(isset($_GET['email']) && isset($_GET['fp_code'])){

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
					<h3><b>Reset Password</b></h3>
				</div>
				<!----------------------Warning--------------->
					<?php echo $text; ?>
				<!-------------------------------------------->
				
				<div class="login-body">
					<form method="Post" action="<?php echo $_SERVER['PHP_SELF']?>">
						  <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
						  <input type="hidden" name="fp" value="<?php echo $_GET['fp_code']; ?>">
						  <label for="uname"><b>New Password</b></label>
						  <input type="password" placeholder="Enter Password" name="psw">
						  <label for="uname"><b>Confirm Password</b></label>
						  <input type="password" placeholder="Enter Password" name="psw2">
						  
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

<?php
}else{
	header("Location:login.php");
}
?>