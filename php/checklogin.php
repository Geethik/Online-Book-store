<?php
include('topmenu.php');
if (session_status() == PHP_SESSION_NONE) {
    	session_start();
}
$connect = mysqli_connect("localhost", "root", "", "bookstore") or die("Please, check your server connection.");
$cartamount=0;
$cartamount = $_POST['cartamount'];
$_SESSION['cartamount']=$cartamount;
	
if (isset($_SESSION['emailaddress']))
{
	$email_address=$_SESSION['emailaddress'];
	?><html>
	<head></head>
	<body><div  style="width: 50%; margin: 0 auto;padding:20px;">
	
	Welcome <?php echo $email_address ?> <br/>
	</div></body></html>
	<?php
}
if (isset($_SESSION['password']))
{
	$password=$_SESSION['password'];
}
if ((isset($_SESSION['emailaddress']) && $_SESSION['emailaddress'] != "") ||   (isset($_SESSION['password']) && $_SESSION['password'] != "")) {
	$sess = session_id();
	$query="select * from cart where cartSessId = '$sess'";
	$result = mysqli_query($connect, $query) or die(mysql_error()); 
	if(mysqli_num_rows($result)>=1)
	{
		?>
		<html>
		<head></head>
		<body><div  style="width: 50%; margin: 0 auto;padding:20px;">
		If you have finished Shopping 
    	<a href=shipping_info.php>Click Here</a> to supply Shipping Information
		 Or You can do more purchasing by selecting items from the menu 
		</div></body></html>
		<?php
	}
	else
	{?>
		<html>
		<head></head>
		<body><div  style="width: 50%; margin: 0 auto;padding:20px;">
		You can do purchasing by selecting items from the menu on left side
		</div></body></html>
		<?php
	}
}
else
{
?>
	<html>
	<head>
	</head>
	<body>
	<div  style="width: 50%; margin: 0 auto;padding:20px;">
	
		<h3>Not Logged in yet</h3>
		<p>
  		You are currently not logged into our system.<br>
  		You can do purchasing only if you are logged in.<br>
  		If you have already registered, 
  		<a href="signin.php">click here</a> to login, or if would like to create an account, <a href="validatesignup.php">click here</a> to register.
		</p>
		</div>
	</body>
	</html>
<?php
}
?>