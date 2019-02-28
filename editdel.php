<?php

$conn =mysqli_connect("localhost","arjun_13","arjun@12345","hmt_new") or die(mysqli_connect_error());

$adid=$_POST['adrid'];

if(isset($_POST['delete'])){
	
	
    $query = "DELETE FROM `user_address` WHERE adr_id = $adid";
	$records=mysqli_query($conn,$query);
	
	header("Location:order.php");
	
}

if(isset($_POST['edit'])){
	
	
    $query = "DELETE FROM `user_address` WHERE adr_id = $adid";
	$records=mysqli_query($conn,$query);
	
}






















?>