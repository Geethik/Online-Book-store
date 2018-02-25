<?php
include('topmenu.php');
if (session_status() == PHP_SESSION_NONE) {
    	session_start();
}
if (isset($_SESSION['cartamount']))
{
	$cartamount=$_SESSION['cartamount'];
}
$connect = mysqli_connect("localhost", "root", "", "bookstore") or die("Please, check your server connection.");
$email_address="";
if (isset($_SESSION['emailaddress'])) 
{
	$email_address=$_SESSION['emailaddress'];
}
if (isset($_SESSION['password'])) 
{
	$password=$_SESSION['password']; 
}
if ((isset($_SESSION['emailaddress']) && $_SESSION['emailaddress'] != "") ||   (isset($_SESSION['password']) && $_SESSION['password'] != "")) {
	$query = "SELECT * FROM customers  where emailId like '$email_address' and password like (PASSWORD('$password'))";
	$results = mysqli_query($connect, $query) or die(mysql_error()); 
	$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
 	extract($row);
?>
	<div  style="width: 50%; margin: 0 auto;">
  	<form action="placeorder.php" method="post">
		<table border="0" cellspacing="1" cellpadding="3">
		<tr><td colspan="2" align="center">Your information available with us:</td></tr>
  		<tr><td>Email Address:</td><td> <input size="20" type="text" name="email_address" value="<?php echo $emailId; ?>"></td></tr>
  		<tr><td>First Name: </td><td> <input size="50" type="text" name="first_name" value="<?php echo $firstName; ?>"></td></tr>
		<tr><td>Last Name: </td><td> <input size="50" type="text" name="last_name" value="<?php echo $lastName; ?>"></td></tr>
    	<tr><td>Street Number:  </td><td> <input size="80" type="text" name="street_number" value="<?php echo $streetNumber; ?>"></td></tr>
  		<tr><td>Street Name:</td><td> <input size="80" type="text" name="street_name" value="<?php echo $streetName; ?>"></td></tr>
  		<tr><td>City:  </td><td> <input size="30" type="text" name="city" value="<?php echo $city; ?>"></td></tr>
  		<tr><td>State:  </td><td> <input size="30" type="text" name="state" value="<?php echo $state; ?>"></td></tr>  		
  		<tr><td>Zip Code:  </td><td> <input size="20" type="text" name="zipcode" value="<?php echo $zipCode; ?>"></td></tr>
  		<tr><td>Phone No:  </td><td> <input size="30" type="text" name="phone_no" value="<?php echo $mobileNo; ?>"></td></tr>
  		<tr><td colspan=2 align="center">Please update shipping information if different from the shown below: </td></tr>
  		<tr><td>    Address to deliver at:  </td></tr>
		<tr><td>	Street Number:	</td><td><input type="text" size="80" name="shipping_address_line1" value="<?php echo $streetNumber; ?>"></td></tr>
  		<tr><td>	Street Name:	</td><td> <input type="text" size="80" name="shipping_address_line2" value="<?php echo $streetName; ?>"></td></tr>
  		<tr><td>    City:	</td><td> <input size="30" type="text" name="shipping_city" value="<?php echo $city; ?>"></td></tr>
  		<tr><td>    State:  </td><td> <input size="30" type="text" name="shipping_state" value="<?php echo $state; ?>"></td></tr>  		
  		<tr><td>    Zip Code:  </td><td> <input type="text" size="20" name="shipping_zipcode" value="<?php echo $zipCode; ?>"></td></tr>
   		<tr><td>  <input type="submit" name="submit" value="Update and Confirm Order">  </td><td> 
    		<input type="reset" value="Cancel"></td></tr>
		</table>
  	</form>
	</<div>
<?php
}
?>
</body>
</html>

