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
$connect = mysqli_connect("localhost", "root", "", "bookstore") or die("Please, check your server connection.");
$query = "SELECT emailId, password, firstName, lastName FROM customers WHERE emailId like '" . $_POST['emailaddress'] . "' " .
	"AND password like (PASSWORD('" . $_POST['password'] . "'))";
$result = mysqli_query($connect, $query) or die(mysql_error()); 
if (mysqli_num_rows($result) == 1) {
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		extract($row);
		echo "Welcome " . $firstName . " to our Book store <br>"; 
		$_SESSION['emailaddress'] = $_POST['emailaddress'];
		$_SESSION['password'] = $_POST['password'];
		echo "<SCRIPT LANGUAGE=\"JavaScript\">updateUser('$firstName');</SCRIPT>";
		echo '<script type="text/javascript">window.location = "index.php"</script>';
	}
}
else {
?>
<div  style="width: 50%; margin: 0 auto;padding:20px;">
	
	Invalid Email address and/or Password<br>
	Not registered? 
	<a href="validatesignup.php">Click here</a> to register.<br><br><br>
	Want to Try again<br>
	<a href="signin.php">Click here</a> to try login again.<br>
</div>	
	<?php
 }
?>
</body>
</html>
