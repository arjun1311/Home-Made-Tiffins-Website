<?php
session_start();

$text="";

if(isset($_POST['login'])){
	
	$name = $_POST['name'];
	$pass = $_POST['psw'];
	
	if($name == "adminhmt" && $pass == "akatsuki890"){
		$_SESSION['name'] = $name;
		header("Location:admin-panel.php");
	}else{
					$text = "<div class='warning2'>
					<span style='margin: 10px 0 0 20px;color:red;font-size:20px;' class='glyphicon glyphicon-remove'></span>
					<span style=' line-height: 40px;margin: 10px 10px;color:red;font-size: 15px;'>Wrong Username or Password</span>
					</div>";	
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
		  
		<link rel="stylesheet" type="text/css" href="css/admin-style.css">

	</head>
<style>
body{
	background:#EAECEE;
}
.login{
	margin-top:150px;
}

.login-cont{
	width:30%;
	height:auto;
	margin:auto;
	background:#fff;
	border:1px solid #ccc;
}

.login-head{
	padding:5px 20px;
	border-bottom:1px solid #D6DBDF;
	text-align: center;
	color:#000;
}

.login-body{
	padding:20px 20px;
}
@media only screen and (min-width: 300px) {
	.login-cont{
		width:95%;
		margin:10px;
	}
}
@media only screen and (min-width: 768px) {
	.login-cont{
		width:35%;
		margin:auto;
	}
}

/* Full-width input fields */
input[type=text], input[type=password],  input[type=tel],  input[type=email]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: black;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}


button:hover {
    opacity: 0.8;
}
.warning2{
	background:#FDEDEC;
}


</style>	
	<body>
		<div class="login">
			<div class="login-cont">
				<div class="login-head">
					<h3><b>LOGIN</b></h3>
				</div>
				<?php echo $text; ?>
				
				<div class="login-body">
					<form method="Post" action="<?php echo $_SERVER['PHP_SELF']?>">
						  <label for="uname"><b>Email</b></label>
						  <input type="text" placeholder="Enter Username" name="name" autocomplete="off" required>

						  <label for="psw"><b>Password</b></label>
						  <input type="password" placeholder="Enter Password" name="psw"  required>
					 
						  <button type="submit" name="login" >Login</button>
					</form>
				</div>			
				
			</div>
		</div>
	
	</body>
	
</html>