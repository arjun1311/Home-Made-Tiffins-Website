<?php
	
$conn =mysqli_connect("localhost","arjun_13","arjun@12345","hmt_new") or die(mysqli_connect_error());
	
	
$text = "";

// uses regex that accepts any word character or hyphen in last name
function split_name($name) {
    $name = trim($name);
    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
    return array($first_name, $last_name);
}
	
if(isset($_POST['signup'])){




	$name = $_POST['name'];
	$email = $_POST['email'];
	$psw = $_POST['psw'];
	$cpsw = $_POST['cpsw'];
	
//------------------------------------------------Split Name Function----------------------------------//
	$parts = array();

    while ( strlen( trim($name)) > 0 ) {
        $name = trim($name);
        $string = preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $parts[] = $string;
        $name = trim( preg_replace('#'.$string.'#', '', $name ) );
    }

    if (empty($parts)) {
        return false;
    }

    $parts = array_reverse($parts);
    $name = array();
    $fname = $parts[0];
    $mname = (isset($parts[2])) ? $parts[1] : '';
    $lname = (isset($parts[2])) ? $parts[2] : ( isset($parts[1]) ? $parts[1] : '');
	
//-------------------------------------------------END----------------------------------------------------//
		
	if($psw == $cpsw){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$text = "<div class='warning2'>
			<span style='margin: 10px 0 0 20px;color:red;font-size:20px;' class='glyphicon glyphicon-remove'></span>
			<span style='color:red; font-size: 15px; line-height: 40px; margin: 10px 20px;'>Email is not valid</span></div>";
			}else{
			$sql1 = $conn->query("select * from user where email= '$email'");
			$res = mysqli_num_rows($sql1);
		
			if($res > 0){
				$text = "<div class='warning2'>
						<span style='margin: 10px 0 0 20px;color:red;font-size:20px;' class='glyphicon glyphicon-remove'></span>
						<span style='color:red; font-size: 15px; line-height: 40px; margin: 10px 20px;'>Email already exists</span>
						</div>";
			}else{
				$pass = password_hash($psw,PASSWORD_DEFAULT);
				$sql = $conn->query("INSERT INTO `user`(`fname`,`mname`,`lname`, `email`, `password`) VALUES ('{$fname}','{$mname}','{$lname}','{$email}','{$pass}')");
				$text = "<div class='warning'>
						<span style='margin: 10px 0 0 20px;color:green;font-size:20px;' class='glyphicon glyphicon-ok'></span>
						<span style='color:green; font-size: 15px; line-height: 40px; margin: 10px 20px;'>Registered successfully. Please Login</span>
						</div>";
			}}
			}else
				$text = "<div class='warning2'>
				<span style='margin: 10px 0 0 20px;color:red;font-size:20px;' class='glyphicon glyphicon-remove'></span>
				<span style='color:red; font-size: 15px; line-height: 40px; margin: 10px 20px;'>Passwords not Match</span>
				</div>";
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
		<!------------------------------------------------SignUp-------------------------------------------->

		
		<div class="signup">
			<div class="login-cont">
				<div class="login-head">
					<h3><b>Register to HMT</b></h3>
				</div>
				
				<!----------------------Warning--------------->
					<?php echo $text; ?>
				<!-------------------------------------------->
				
				<div class="login-body">
					<form method="Post">
						  <label for="uname"><b>Name</b></label>
						  <input type="text" placeholder="Enter Name" name="name" required>
						  
						  <label for="psw"><b>Email</b></label>
						  <input type="email" placeholder="Enter Email" name="email" required>
						  
						  <label for="psw"><b>Password</b></label>
						  <input type="password" placeholder="Enter Password" name="psw" required>
						
						  <label for="psw"><b>Confirm Password</b></label>
						  <input type="password" placeholder="Confirm Password" name="cpsw" required>
												
						  <button type="submit" name="signup">Sign Up</button>
						  <center><span>Already have an Account? <a href="login.php">Login!</a></span></center>
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