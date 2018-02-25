<html>
<head>
<script language="JavaScript" type="text/JavaScript">
function updateUser(username){
	var ajaxUser = document.getElementById("userinfo");
	ajaxUser.innerHTML = "Welcome " + username + "&nbsp;&nbsp;&nbsp;<a href=\"logout.php\">Log Out</a>";
}
</script>
</head>
<body>
<?php
include('topmenu.php');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$connect = mysqli_connect("localhost", "root", "", "bookstore") or die ("Please, check the server connection.");
$email_address = $_POST['emailaddress'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$streetNumber = $_POST['street_number'];
$streetName = $_POST['street_name'];           
$city = $_POST['city'];
$state = $_POST['state'];
$zipCode = $_POST['zipcode'];
$phone_no = $_POST['phone_no'];

$sql = "INSERT INTO customers (emailId, password, firstName,lastName, streetName, streetNumber, city, state, zipCode, mobileNo) 
	VALUES ('$email_address',(PASSWORD('$password')), '$firstName', '$lastName','$streetName', $streetNumber, '$city', '$state', $zipCode, '$phone_no')";
$result = mysqli_query($connect, $sql) or die(mysql_error());
echo $email_address;
if ($result)
{

	//echo "<p>	Dear, ". $firstName ." your account is successfully created</p>";
	$_SESSION['emailaddress'] = $_POST['emailaddress'];
	$_SESSION['password'] = $_POST['password'];
	echo "<SCRIPT LANGUAGE=\"JavaScript\">updateUser('$firstName');</SCRIPT>";
	echo '<script type="text/javascript">  window.location = "index.php"  </script>';
 }
else
{
 	echo "Some error occurred. Please use different email address";
	echo "<h3>Not Logged in yet</h3>";
	echo "<p>".
  		"You are currently not logged into our system.<br>".
  		"You can do purchasing only if you are logged in.<br>".
  		"If you have already registered,". 
  		"<a href=\"signin.php\">click here</a> to login, or if would like to create an account, <a href=\"validatesignup.php\">click here</a> to register.".
	"</p>";
}
?>
</body>
</html>

