<?php
session_start(); 

date_default_timezone_set('Asia/Kolkata');

$conn =mysqli_connect("localhost","arjun_13","arjun@12345","hmt_new") or die(mysqli_connect_error());

if(date('H') >= '19' && date('H') < '23' || date('H')>='00' && date('H')<'10'){

if(isset($_POST['cancel-order'])){
	
	$oid=$_POST['orderid'];
	
		$result = $conn->query("UPDATE `orders` SET `order-status` = 'cancel' WHERE order_id = $oid");
		
		
$records = $conn->query("SELECT * FROM `user_address` WHERE adr_id = (SELECT `adr_id` FROM `orders` WHERE order_id = $oid)"); 
$row = mysqli_fetch_assoc($records);

$records = $conn->query("SELECT * FROM `pickup_address` WHERE pickupadr_id = (SELECT `pickupadr_id` FROM `orders` WHERE order_id = $oid)");
$r = mysqli_fetch_assoc($records);
		

$omob = $row['mobileno'];
$pickupmob = $r['mobileno'];

$message = "Dear ".$row['name']." 
Order no ".$oid."
You have successfully cancelled your order.";

$authKey = "245526AIeHtyzx5bd978c4";
$senderId = "MYHMTS";
$route = "4";
$mobile = "$omob,$pickupmob";
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobile,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route,
    'country'=>'91'
);
$url="https://api.msg91.com/api/sendhttp.php";
$ch = curl_init();
    curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$output = curl_exec($ch);
 if(curl_errno($ch))
{
    $result = $conn->query("UPDATE `orders` SET `sms`='fail' WHERE order_id ='{$oid}';");	
}else{
	$result = $conn->query("UPDATE `orders` SET `sms`='success' WHERE order_id ='{$oid}';");	
}
curl_close($ch);
		


$records = $conn->query("SELECT * FROM `user_address` WHERE adr_id = (SELECT `adr_id` FROM `orders` WHERE order_id = $oid)"); 
$row = mysqli_fetch_assoc($records);
		
$records = $conn->query("SELECT * FROM `pickup_address` WHERE pickupadr_id = (SELECT `pickupadr_id` FROM `orders` WHERE order_id = $oid)");
$r = mysqli_fetch_assoc($records);

$records = $conn->query("SELECT * FROM `orders` WHERE order_id = $oid");
$re = mysqli_fetch_assoc($records);


$message = "
Order has been CANCELLED BY USER

----ORDER------
Order no is ".$oid."
Mode - ".$re['mode']."
Quantity - ".$re['quantity']."
Price - ".$re['price']."

----DELIVERY ADDRESS----
Name - ".$row['name']."
Mobile No - ".$row['mobileno']."
Address - ".$row['address']."
Pincode - ".$row['pincode']."
Landmark - ".$row['landmark']."
State - ".$row['state']."

----PICKUP ADDRESS----
Name - ".$r['name']."
Mobile No - ".$r['mobileno']."
Address - ".$r['address']."
Pincode - ".$r['pincode']."
Landmark - ".$r['landmark']."
State - ".$r['state']."

Pickup the delivery from pickup address and deliver it on the delivery address.";

$authKey = "245526AIeHtyzx5bd978c4";
$senderId = "MYHMTS";
$route = "4";
$mobile = "7780950994,7006723115";
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobile,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route,
    'country'=>'91'
);
$url="https://api.msg91.com/api/sendhttp.php";
$ch = curl_init();
    curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$output = curl_exec($ch);
 if(curl_errno($ch))
{
    $result = $conn->query("UPDATE `orders` SET `smsd`='fail' WHERE order_id ='{$oid}';");	
}else{
	$result = $conn->query("UPDATE `orders` SET `smsd`='success' WHERE order_id ='{$oid}';");	
}
curl_close($ch);



	$to = $_SESSION['email'];
	$subject = "Home Made Tiffins";
	$message = " Dear ".$row['name']."
	
	Your Order No. ".$oid." has successfully been cancelled";
	 
	$from = "hmtiffins@gmail.com";
	$headers = "From:" . $from . "\r\n";
	$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n"; 
	 
	mail($to,$subject,$message,$headers);
	
	$to = "hmtiffins@gmail.com";
	$subject = "Home Made Tiffins";
	$message = " Order has been CANCELLED BY USER

----ORDER------
Order no is ".$oid."
Mode - ".$re['mode']."
Quantity - ".$re['quantity']."
Price - ".$re['price']."

----DELIVERY ADDRESS----
Name - ".$row['name']."
Mobile No - ".$row['mobileno']."
Address - ".$row['address']."
Pincode - ".$row['pincode']."
Landmark - ".$row['landmark']."
State - ".$row['state']."

----PICKUP ADDRESS----
Name - ".$r['name']."
Mobile No - ".$r['mobileno']."
Address - ".$r['address']."
Pincode - ".$r['pincode']."
Landmark - ".$r['landmark']."
State - ".$r['state']."

Pickup the delivery from pickup address and deliver it on the delivery address.";
	 
	$from = "hmtiffins@gmail.com";
	$headers = "From:" . $from . "\r\n";
	$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n"; 
	 
	mail($to,$subject,$message,$headers);
		
	header("Location:Myorders.php");
		
}

}else{
			echo "<center><h1>Lines are closed</h1></center>";
			echo "<center><h2><a href='Myorders.php'> Back </a></h2></center>";
		}
		


?>