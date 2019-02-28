<?php



$message = "HELLO HMT";
$authKey = "241800AyKRk22D5bbb6828";
$senderId = "MSGIND";
$route = "4";
$postData = array(
    'authkey' => $authKey,
    'mobiles' => "7051003706",
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
    echo 'error:' . curl_error($ch);
}
curl_close($ch);
echo '<script>alert("Message sent Successfully")</script>';
?>