<?php 
session_start(); 


date_default_timezone_set('Asia/Kolkata');

$conn =mysqli_connect("localhost","arjun_13","arjun@12345","hmt_new") or die(mysqli_connect_error());


if(isset($_SESSION['email'])){
	
	$result = $conn->query("SELECT * FROM user WHERE email='{$_SESSION['email']}'");
	$row = mysqli_fetch_array($result);
	
	if(isset($_POST['saveinfo'])){
		$newpass = $_POST['newpass'];
		$conpass = $_POST['conpass'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mname = $_POST['mname'];
		$mobno = $_POST['mobno'];
		$date = $_POST['date'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$gender = $_POST['gender'];
		
		$target = "dp/".basename($_FILES['dp']['name']);
		
		$image = $_FILES['dp']['name'];
		
		
		if($image !=null){
			$rec = $conn->query("UPDATE `user` SET `dp`= '{$image}' WHERE email='{$_SESSION['email']}';");
			move_uploaded_file($_FILES['dp']['tmp_name'],$target);	
		}
		if($newpass !=null && $conpass !=null){
			if($newpass == $conpass){
				$pass = password_hash($newpass,PASSWORD_DEFAULT);
				$rec = $conn->query("UPDATE `user` SET `password`= '{$pass}' WHERE email='{$_SESSION['email']}';");			   
			}
		}
		if($fname!=null)
			$rec = $conn->query("UPDATE `user` SET `fname`= '{$fname}' WHERE email='{$_SESSION['email']}';");
		if($lname!=null)
			$rec = $conn->query("UPDATE `user` SET `lname`= '{$lname}'WHERE email='{$_SESSION['email']}';");
		if($mname!=null)
			$rec = $conn->query("UPDATE `user` SET `mname`= '{$mname}' WHERE email='{$_SESSION['email']}';");
		if($mobno!=null)
			$rec = $conn->query("UPDATE `user` SET `mobno`= '{$mobno}'WHERE email='{$_SESSION['email']}';");
		if($date!=null)
			$rec = $conn->query("UPDATE `user` SET `date`= '{$date}' WHERE email='{$_SESSION['email']}';");
		if($month!=null)
			$rec = $conn->query("UPDATE `user` SET `month`= '{$month}'WHERE email='{$_SESSION['email']}';");
		if($year!=null)
			$rec = $conn->query("UPDATE `user` SET `year`= '{$year}'WHERE email='{$_SESSION['email']}';");
		if($gender!=null)
			$rec = $conn->query("UPDATE `user` SET `gender`= '{$gender}'WHERE email='{$_SESSION['email']}';");
		
		
	$result = $conn->query("SELECT * FROM user WHERE email='{$_SESSION['email']}'");
	$row = mysqli_fetch_array($result);
		
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
#cont {
	padding:50px;
}
.myacc{
	border:1px solid grey;
}

.myacc h5{
	float:left;
}
.noedit{
	background:#CCD1D1;
}


select{
	width:100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
.savein{
	float:right;
	margin-top:10px;
	margin-bottom:10px;
	border:none;
	background:#229954;
	font-size:15px;
	font-weight:bold;
	padding:10px 30px;
	color:white;
	border-radius:3px;
}
.savein:hover{
	background:#28B463;
	outline:none;
}

.password-form{
	display:none;
	position:relative;
}
.dp_image{
background: #000428;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #004e92, #000428);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #004e92, #000428); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

	margin-bottom:50px;
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



<script>
	$(function(){
		var $date = $(".date");
		var $year = $(".year");
		for (i=1901;i<=2018;i++){
			if(<?php echo $row['year']; ?> == i){
				$year.append($('<option selected="selected"></option>').val(i).html(i))
			}else if (<?php echo $row['year']; ?> == null){
				$year.append($('<option></option>').val(i).html(i))
			}else{
				$year.append($('<option></option>').val(i).html(i))
			}
		}
		for (i=1;i<=31;i++){
			if(<?php echo $row['date']; ?> == i){
				$date.append($('<option selected="selected"></option>').val(i).html(i))
			}else if (<?php echo $row['date']; ?> == null){
				$date.append($('<option></option>').val(i).html(i))
			}else{
				$date.append($('<option></option>').val(i).html(i))
			}
		}
	});
	
	$(document).ready(function(){
		var pass = $(".password-form");
		var status = false;
			$("#chpass").click(function(event){
			event.preventDefault();
			if(status == false){
				pass.slideDown("fast");
				status = true;
			}else{
				pass.slideUp("fast");
				status = false;
			}
		})
	})
</script>
     
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
		
		<div class=" myacc">
			<div class="dp_image">
			<form method="POST" enctype="multipart/form-data">
				<?php include "upload_image.php"; ?>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h4>Account details:-</h4>
						<div class="row">
							<div class="col-sm-6">
								<h5>Email :-</h5> <input type="email" value="<?php echo $row['email']; ?>" class="noedit" readonly>
							</div>
							<div class="col-sm-6">
								<h5>Password :-</h5> <input type="password" value="<?php echo $row['password']; ?>" class="noedit" readonly>
								<a href="#" id="chpass">Change Password</a>
							</div>
						</div>
						<div class="password-form"><hr>
							<div class="row">
								<div class="col-sm-6">
									<h5>New Password:-</h5>
									<input type="password" name="newpass">
								</div>
								<div class="col-sm-6">
									<h5>Confirm Password:-</h5>
									<input type="password" name="conpass">
								</div>
							</div>
							<hr>
						</div>

						<h4>General Information:-</h4>
						<div class="row">
							<div class="col-sm-4">
								<h5>First name :-</h5> <input type="text" name="fname" value="<?php echo $row['fname']; ?>">
							</div>
							<div class="col-sm-4">
								<h5>Middle name :-</h5> <input type="text" name="mname" value="<?php echo $row['mname']; ?>">
							</div>
							<div class="col-sm-4">
								<h5>Last name :-</h5> <input type="text" name="lname" value="<?php echo $row['lname']; ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<h5>Mobile No. :-</h5> <input type="text" name="mobno" value="<?php echo $row['mobno']; ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<h5>Date of Birth :-</h5>
							</div>
							<div class="col-sm-12">
								<div class="col-sm-4">
									<select name="date" class="date">
									</select>
								</div>
								<div class="col-sm-4">
									<select name="month">
										<option value='Janaury'<?php if($row['month'] == 'Janaury'): ?> selected="selected"<?php endif; ?>>Janaury</option>
										<option value='February'<?php if($row['month'] == 'February'): ?> selected="selected"<?php endif; ?>>February</option>
										<option value='March'<?php if($row['month'] == 'March'): ?> selected="selected"<?php endif; ?>>March</option>
										<option value='April'<?php if($row['month'] == 'April'): ?> selected="selected"<?php endif; ?>>April</option>
										<option value='May'<?php if($row['month'] == 'May'): ?> selected="selected"<?php endif; ?>>May</option>
										<option value='June'<?php if($row['month'] == 'June'): ?> selected="selected"<?php endif; ?>>June</option>
										<option value='July'<?php if($row['month'] == 'July'): ?> selected="selected"<?php endif; ?>>July</option>
										<option value='August'<?php if($row['month'] == 'August'): ?> selected="selected"<?php endif; ?>>August</option>
										<option value='September'<?php if($row['month'] == 'September'): ?> selected="selected"<?php endif; ?>>September</option>
										<option value='October'<?php if($row['month'] == 'October'): ?> selected="selected"<?php endif; ?>>October</option>
										<option value='November'<?php if($row['month'] == 'November'): ?> selected="selected"<?php endif; ?>>November</option>
										<option value='December'<?php if($row['month'] == 'December'): ?> selected="selected"<?php endif; ?>>December</option>
									</select> 
								</div>
								<div class="col-sm-4">
									<select name="year" class="year"></select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<h5>Gender :-</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="col-sm-4">								
									<input type="radio" name="gender" value="Male" <?php if($row['gender'] == 'Male'): ?> checked<?php endif; ?>> Male
								</div>
								<div class="col-sm-4">
									<input type="radio" name="gender" value="Female" <?php if($row['gender'] == 'Female'): ?> checked<?php endif; ?>> Female
								</div>
								<div class="col-sm-4">
									<input type="radio" name="gender" value="Other" <?php if($row['gender'] == 'Other'): ?> checked<?php endif; ?>> Other
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">					
								<input type="submit" name="saveinfo" value="SAVE" class="savein">
							</div>
						</div>
						</form>
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
	
	</body>
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

		<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>

<?php 
}else{
	echo "";
}
?>