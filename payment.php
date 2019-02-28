<?php 

if(isset($_POST['payment'])){
	
	
// Change the Merchant key here as provided by Payumoney
$MERCHANT_KEY = "qOCSXlB5";

// Change the Merchant Salt as provided by Payumoney
$SALT = "ubjIZWMC3d";

//$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

	$udf1 =$_POST['orderid'];
	$firstname =$_POST['oname'];
	$email =$_POST['oemail'];
	$udf2 =$_POST['omob'];
	$udf3 =$_POST['pickupmob'];
	$productinfo =$_POST['oproduct'];
	$amount =$_POST['oprice'];
	$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	$surl = "http://homemadetiffins.in/success.php";
	$furl = "http://homemadetiffins.in/fail.php";
	//$ =$_POST[''];
	
	$action = $PAYU_BASE_URL . '/_payment';

	
	$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
	$hashseq=$MERCHANT_KEY.'|'.$txnid.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|'.$udf1.'|'.$udf2.'|'.$udf3.'||||||||'.$SALT;
	$hash =strtolower(hash("sha512", $hashseq)); 
}

?>


<!DOCTYPE html>
<html>
<head>

<title>Payment Processing</title>
	<script>
    function submitForm() {
      var postForm = document.forms.postForm;
      postForm.submit();
    }
</script>
</head>
<body onload="submitForm();">

<div><center>
<h2>Payment Gateway</h2>
<br>
<p>Please be patient. this process might take some time,<br />please do not hit refresh or browser back button or close this window</p>
</div></center>
</div>

<div>
	<form name="postForm" action="<?php echo $action; ?>" method="POST" >
		<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY; ?>" />
		<input type="hidden" name="hash" value="<?php echo $hash;  ?>"/>
		<input type="hidden" name="txnid" value="<?php echo $txnid  ?>" />
		<input type="hidden" name="amount" value="<?php echo $_POST['oprice'];  ?>" />
		<input type="hidden" name="firstname" value="<?php echo $_POST['oname'];  ?>" />
		<input type="hidden" name="email" value="<?php echo $_POST['oemail'];  ?>" />
		<input type="hidden" name="udf2" value="<?php echo $_POST['omob'];  ?>" />
		<input type="hidden" name="udf3" value="<?php echo $_POST['pickupmob'];  ?>" />
		<input type="hidden" name="productinfo" value="<?php echo $_POST['oproduct'];  ?>" />
		<input type="hidden" name="udf1" value="<?php echo $_POST['orderid'];  ?>" />
		<input type="hidden" name="service_provider" value="payu_paisa" size="64" />
		<input type="hidden" name="surl" value="<?php echo $surl;  ?>" />
		<input type="hidden" name="furl" value="<?php echo $furl;  ?>" />
	</form>
</div>
</body>
</html>