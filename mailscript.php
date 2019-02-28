<?php

$conn =mysqli_connect("localhost","arjun_13","arjun@12345","hmt_new") or die(mysqli_connect_error());
	
	
$records = $conn->query("SELECT * FROM `user` where customer_id=27"); 
$row=mysqli_fetch_assoc($records);

$to = $row['email'];
$subject = "Home Made Tiffins";
$message = " Dear ".$row['fname']."

Your order has been cancelled due to some technical reasons. 
Sorry, for the inconvenience. Kindly stay with us for the next order.";
 
$from = "hmtiffins@gmail.com";
$headers = "From:" . $from . "\r\n";
$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n"; 
 
if(mail($to,$subject,$message,$headers))
	echo "success";
else
	echo "fail";
?>