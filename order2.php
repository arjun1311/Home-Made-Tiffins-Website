<?php
session_start();

$conn =mysqli_connect("localhost","arjun_13","arjun@12345","hmt_new") or die(mysqli_connect_error());

if(isset($_POST['save-del'])){
	
	$fname = $_POST['fname'];
	$mob = $_POST['mob'];
	$addr = $_POST['addr'];
	$pincode = $_POST['pincode'];
	$landmark = $_POST['landmark'];
	
	if(isset($_SESSION['email'])){
		$sql = $conn->query("INSERT INTO `user_address`(`customer_id`, `name`, `mobileno`, `address`, `pincode`, `landmark`) 
				VALUES ((SELECT `customer_id` FROM `user` WHERE email='{$_SESSION['email']}'),'$fname',$mob,'$addr',$pincode,'$landmark')");
			header("Location:order.php");
	}	
}

if(isset($_POST['save-pickupdel'])){
	
	$fname = $_POST['fname'];
	$mob = $_POST['mob'];
	$addr = $_POST['addr'];
	$pincode = $_POST['pincode'];
	$landmark = $_POST['landmark'];
	
	if(isset($_SESSION['email'])){
		$sql = $conn->query("INSERT INTO `pickup_address`(`customer_id`, `name`, `mobileno`, `address`, `pincode`, `landmark`) 
				VALUES ((SELECT `customer_id` FROM `user` WHERE email='{$_SESSION['email']}'),'$fname',$mob,'$addr',$pincode,'$landmark')");
			header("Location:order.php");
	}	
}

?>