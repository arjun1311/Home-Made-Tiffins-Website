<?php
	
$conn =mysqli_connect("localhost","arjun_13","arjun@12345","hmt_new") or die(mysqli_connect_error());
	
	
$text = "";
	
if(isset($_POST['login'])){
	$email = $_POST['email'];
	$psw = $_POST['psw'];
	
	$result = $conn->query("SELECT * FROM user WHERE email='$email'");
	
	
    if(mysqli_num_rows($result) < 1){
		$text = "<div class='warning2'><span style='color:red; font-size: 15px; line-height: 40px; margin: 10px 20px;'>This Email is not registered</span></div>";	
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

<DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		  
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	
	
	
	<body>
<!---------------------------------------------------header----------------------------------------->
	
	
		<header>
			<a href="index.html"><img src="logo.png" width="170px" height="60px" align="left" style="margin:10px 0 0 40px;"></a>
			
			

				<?php if(isset($_SESSION['email'])){
						include 'username.php';
					}else{
						echo '<div class="reg"><a href="login.php">Login / Signup</a></div>';
					}?>
					

			<div class="menubar">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="#">About</a></li>
				</ul>
			</div>
			
			
		</header>
		
		<!------------------------------------------------Login-------------------------------------------->

		<div class="val">
			<div class="login-cont">
				<div class="login-head">
					<h3><b>Register to HMT</b></h3>
				</div>
				<!----------------------Warning--------------->
					<?php echo $text; ?>
				<!-------------------------------------------->
				<div class="login-body">
						<span style="font-size:20px;color:green;"><b>Check your Inbox for verification email.</b> </span>
				</div>			
				
			</div>
		</div>
		
<!-----------------------------------------------------Footer---------------------------------------->		

		<footer id="footer">
			<span>Copyright &copy; 2018 AG | All rights Reserved.</span>
		</footer>
	</body>
	
</html>