


<style>
/* The container */
.useradr-cont {
	background:#D5F5E3;
    display: block;
    position: relative;
    cursor: pointer;
	border:1px solid #ABEBC6;
	padding:10px 10px;
	border-radius:5px;
	color:#2C3E50;
	margin-bottom:20px;
    font-size: 15px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}


/* Hide the browser's default radio button */
.useradr-cont input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    height:18px;
    width:18px;
    background-color: #eee;
    border-radius: 50%;
	border:2px solid #27AE60
}

/* On mouse-over, add a grey background color */
.useradr-cont:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.useradr-cont input:checked ~ .checkmark {
    background-color:#27AE60;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.useradr-cont input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.useradr-cont .checkmark:after {
 	top: 3px;
	left: 3.5px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}

.useradr-body{
	margin-left:30px;
}

.useradr-body span{
	font-weight: normal;
	font-size:14px;
}
</style>


<?php

$conn =mysqli_connect("localhost","arjun_13","arjun@12345","hmt_new") or die(mysqli_connect_error());

    $query = "SELECT `pickupadr_id`,`name`,`mobileno`, `address`, `pincode`, `landmark` FROM `pickup_address` 
			WHERE customer_id = (SELECT `customer_id` FROM `user` WHERE email = '{$_SESSION['email']}')";
	$records=mysqli_query($conn,$query);


    while($row=mysqli_fetch_assoc($records)){

	
	echo "<label class='useradr-cont'>";
	echo "<input type='radio' name='pickupadrid-check' value='".$row['pickupadr_id']."' checked>";
    echo "<span class='checkmark'></span>";
	
	
	echo "<div class='useradr-body'>";
	
	echo "<span style='font-weight:bold;font-size:16px;'>".$row['name']."</span><br>";
			
	echo "<span>Mobile No - ".$row['mobileno']."</span><br><br>";
			
	echo "<span>Address - ".$row['address']."</span><br>";
	
	echo "<span>Pincode - ".$row['pincode']."</span><br>";
	
	echo "<span>Landmark - ".$row['landmark']."</span><br>";
	
	echo "</div>";
	echo "</label>";
	
	}					
?>
