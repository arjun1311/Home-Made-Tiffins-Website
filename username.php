
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php
$conn =mysqli_connect("localhost","arjun_13","arjun@12345","hmt_new") or die(mysqli_connect_error());
	$result = $conn->query("SELECT * FROM user WHERE email='{$_SESSION['email']}'");
	$row = mysqli_fetch_array($result);
?>

<div class="username" style="position:absolute;right:10px;">
<div class="menu-content">
	<a href="#" id="login">
	<?php if($row['dp'] != null){
		echo "<img src='dp/".$row['dp']."' height='22px' width='22px' style='border-radius:50px;'>";
	}else{
		echo "<img src='dp/a.png' height='22px' width='22px' style='border-radius:50px;'>";
	} ?>
	&nbsp;<?php echo $_SESSION['fname']; ?> <span class="glyphicon glyphicon-triangle-bottom"></span></a>
</div>

<div class="arrow-up"></div>

<div class="name-form" >
<ul>
<li><span class="glyphicon glyphicon-user"></span><a href="myaccount.php"> My Account</a></li>
<li><span class="glyphicon glyphicon-shopping-cart"></span><a href="Myorders.php"> My Orders</a></li>
<li><span class="glyphicon glyphicon-log-out"></span><a href="logout.php"> Logout</a></li>
</ul>
</div>
</div>


<script type="text/javascript">

$(document).ready(function(){
var arrow = $(".arrow-up");
var form = $(".name-form");
var status = false;
$("#login").click(function(event){
event.preventDefault();
if(status == false){
arrow.slideDown("fast");
form.slideDown("fast");
status = true;
}else{
arrow.slideUp("fast");
form.slideUp("fast");
status = false;
}
})
})


$(document).mouseup(function(e) 
{
    var arrow = $(".arrow-up");
	var form = $(".name-form");		

    // if the target of the click isn't the container nor a descendant of the container
    if (!arrow.is(e.target) && arrow.has(e.target).length === 0 && !form.is(e.target) && form.has(e.target).length === 0) 
    {
		arrow.slideUp("fast");
		form.slideUp("fast");
    }
});

</script>