<?php
	
$conn =mysqli_connect("localhost","arjun_13","arjun@12345","hmt_new") or die(mysqli_connect_error());
	
	
$text = "";
	
if(isset($_POST['login'])){
	$email = $_POST['email'];
	$psw = $_POST['psw'];
	$pass = $_POST['psw'];
	
	$result = $conn->query("SELECT * FROM user WHERE email='$email'");
	
	
    if(mysqli_num_rows($result) < 1){
		$text = "<div class='warning2'>
		<span style='margin: 10px 0 0 20px;color:red;font-size:20px;' class='glyphicon glyphicon-alert'></span>
		<span style='color:red; font-size: 15px; line-height: 40px; margin: 10px 10px;'>This Email is not registered</span>
		</div>";	
	}else{
		if($row = mysqli_fetch_array($result)){
			if(password_verify($psw, $row['password']))
				{
					session_start();
					if(!empty($_POST['remember'])) {
						$year = time() + 31536000;
						setcookie('remember_email', $email, $year);
					}else{
						if(isset($_COOKIE['remember_email'])) {
							setcookie('remember_email','');
						}
				}
					$_SESSION['fname'] = $row['fname'];
					$_SESSION['email'] = $row['email'];
					header("Location:index.php");
				}
				else{
					$text = "<div class='warning2'>
					<span style='margin: 10px 0 0 20px;color:red;font-size:20px;' class='glyphicon glyphicon-remove'></span>
					<span style=' line-height: 40px;margin: 10px 10px;color:red;font-size: 15px;'>Password Invalid</span>
					</div>";	
		
				}
			}
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
		<!------------------------------------------------Login-------------------------------------------->

		<div class="login">
			<div class="login-cont">
				<div class="login-head">
					<h3><b>Login to HMT</b></h3>
				</div>
				<!----------------------Warning--------------->
					<?php echo $text; ?>
				<!-------------------------------------------->
				
				<div class="login-body">
					<form method="Post" action="<?php echo $_SERVER['PHP_SELF']?>">
						  <label for="uname"><b>Email</b></label>
						  <input type="email" placeholder="Enter Email" name="email" value="<?php if(isset($_COOKIE['remember_email'])) { echo $_COOKIE['remember_email']; } ?>" required>

						  <label for="psw"><b>Password</b></label>
						  <input type="password" placeholder="Enter Password" name="psw"  required>

						  <label>
							<input type="checkbox" name="remember" <?php if(isset($_COOKIE['remember_email'])) { ?> checked <?php } ?> > Remember Me
						  </label>
					 
						  <button type="submit" name="login" >Login</button>
						  
							<span>Create an <a href="signup.php">Account?</a></span>
							<span class="psw">Forgot <a href="forgotpassword.php">password?</a></span>
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