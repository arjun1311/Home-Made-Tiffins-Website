<?php 
session_start(); 
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
			  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>
	

<style>
@media only screen and (min-width: 300px) {
	.container .fit{
		padding-left:50px;
	}

}
@media only screen and (min-width: 768px) {
	.container .fit{
		padding-left:150px;
	}
}
</style>
	
</style>
	
<script>
$(document).ready(function(){
    $("#cbtn").click(function(){
        $("#m").slideUp("slow");
    });
	
});
</script>

<!------------------------------------------------Body-------------------------------------------->
	<body>
		
		
		
	<div class="msg" id="m">
		<!--	<button class="close" id="cbtn">&times;</button> -->
		<div class="container">
		<div class="row">
		<div class="col-sm-4">
			
		</div>
		<div class="col-sm-4">
			<span>Lines are open till 10 AM today.<br>Hurry, Order now!</span>
		</div>
		<div class="col-sm-4">
		</div></div></div>
	</div>

	
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
			<img src="7.jpg" class="responsive" width="1349px" height="538px">
			
			<?php	include "f.php"; ?>
			
					<form method="POST">
					<?php include "awe.php"; ?>
			
					<input type="submit" class="btn" value="Order Now" name="order">
					</form>
					
					

				<div class="container">
				<div class="row">
					<div class="col-sm-12">					
						<h3>Services available in these Areas of Jammu:</h3><hr>
						<div class="row fit" style="text-align:left;">
							<div class="col-sm-4">
								<h5><i class="fas fa-map-marker-alt"></i> Janipur</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Amphalla</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Panjtirthi</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Kacchi chawani</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Rehari</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Subash Nagar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Vikas Nagar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Ram Vihar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Talab Tillo</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Sainik Colony</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Sanjay Nagar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Nanak Nagar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Jeevan Nagar</h5><br>
								
							</div>
							<div class="col-sm-4">
								<h5><i class="fas fa-map-marker-alt"></i> Patal Nagar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Paloura</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Rajpura chungi</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Toph Sherkhanian</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Krishna Nagar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Roop Nagar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Karan Nagar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Peer Meetha</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Bohri</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Shastri Nagar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Channi Himmat</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Kunjwani</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Greater Kailash</h5><br>

							</div>
							<div class="col-sm-4">
								<h5><i class="fas fa-map-marker-alt"></i> Bakshi Nagar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Resham ghar colony</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Lower Shiv Nagar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Shakti Nagar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Sarwal</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Prade</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Jain Bazar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Prem Nagar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Udheywala</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Gandhi Nagar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Trikuta Nagar</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Satwari</h5><br>
								<h5><i class="fas fa-map-marker-alt"></i> Narwal</h5><br>
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

<?php
date_default_timezone_set('Asia/Kolkata');


if(isset($_POST['order'])){
	
	if(isset($_SESSION['email'])){
		
		$loc = $_POST['location'];
		
		if(date('H') >= '19' && date('H') < '24' || date('H')>='00' && date('H')<'10'){
		
		if(stripos($loc, 'jammu') == true){

			if(stripos($loc, 'janipur') !== false ||
			stripos($loc, 'karan nagar') !== false ||
			stripos($loc, 'panjtirthi') !== false ||
			stripos($loc, 'patal nagar') !== false ||
			stripos($loc, 'paloura') !== false ||
			stripos($loc, 'rajpura chungi') !== false ||
			stripos($loc, 'bakshi nagar') !== false ||
			stripos($loc, 'resham ghar colony') !== false ||
			stripos($loc, 'Lower Shiv Nagar') !== false ||
			stripos($loc, 'old heritage city') !== false ||
			stripos($loc, 'rehari') !== false ||
			stripos($loc, 'subash nagar') !== false ||
			stripos($loc, 'Toph Sherkhanian') !== false ||
			stripos($loc, 'Krishna Nagar') !== false ||
			stripos($loc, 'Bohri') !== false ||
			stripos($loc, 'Talab Tillo') !== false ||
			stripos($loc, 'Udheywala') !== false ||
			stripos($loc, 'Sainik Colony') !== false ||
			stripos($loc, 'Gandhi Nagar') !== false ||
			stripos($loc, 'Trikuta Nagar') !== false ||
			stripos($loc, 'Nanak Nagar') !== false ||
			stripos($loc, 'Shastri Nagar') !== false ||
			stripos($loc, 'Sanjay Nagar') !== false ||
			stripos($loc, 'Channi Himmat') !== false ||
			stripos($loc, 'Kunjwani') !== false ||
			stripos($loc, 'Satwari') !== false ||
			stripos($loc, 'Jeevan Nagar') !== false ||
			stripos($loc, 'Greater Kailash') !== false ||
			stripos($loc, 'Narwal') !== false ||
			stripos($loc, 'Roop Nagar') !== false){
				
					echo "<script>window.location.href='order.php';</script>";
					
			}else{
			echo "<script>
				var modal = document.getElementById('myModal1');
					modal.style.display = 'block';
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = 'none';
					}
				}
				</script>";
			}
		}else if(stripos($loc, 'jammu') !==false){
			echo "<script>
				var modal = document.getElementById('myModal2');
					modal.style.display = 'block';
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = 'none';
					}
				}
				</script>";		
		}else{
			echo "<script>
				var modal = document.getElementById('myModal1');
					modal.style.display = 'block';
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = 'none';
					}
				}
				</script>";
		}
		}else{
			echo "<script>
				var modal = document.getElementById('myModal');
					modal.style.display = 'block';
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = 'none';
					}
				}
				</script>";
		}
	}else{
			echo "<script>
				var modal = document.getElementById('myModal3');
					modal.style.display = 'block';
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = 'none';
					}
				}
				</script>";
		}
}
?>	
