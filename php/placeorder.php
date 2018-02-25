<?php
//require_once("lib/Twocheckout.php");
//Twocheckout::privateKey('E0F6517A-CFCF-11E3-8295-A7DD28100996');
//Twocheckout::sellerId('102626791');
include('topmenu.php');
if (session_status() == PHP_SESSION_NONE) {
    	session_start();
}
if (isset($_SESSION['cartamount']))
{
	$cartamount=$_SESSION['cartamount'];
}
$firstName=$_POST['first_name'];
$lastName = $_POST['last_name'];
$streetNumber = $_POST['street_number'];
$streetName = $_POST['street_name'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];	
$shipping_address_line1 = $_POST['shipping_address_line1'];
$shipping_address_line2 = $_POST['shipping_address_line2'];
$shipping_city = $_POST['shipping_city'];
$shipping_state = $_POST['shipping_state'];	
$shipping_zipcode = $_POST['shipping_zipcode'];
$phone_no= $_POST['phone_no'] ;
$_SESSION['first_name'] =$firstName;
$_SESSION['last_name'] = $lastName;
$_SESSION['street_number'] =$streetNumber;
$_SESSION['street_name'] = $streetName;
$_SESSION['city'] =$city;
$_SESSION['state'] =$state;
$_SESSION['zipcode'] =$zipcode;	
$_SESSION['shipping_address_line1'] =$shipping_address_line1;
$_SESSION['shipping_address_line2'] =$shipping_address_line2;
$_SESSION['shipping_city'] =$shipping_city;
$_SESSION['shipping_state'] =$shipping_state;	
$_SESSION['shipping_zipcode'] =$shipping_zipcode;
$_SESSION['phone_no'] =$phone_no;
$email_address= $_SESSION['emailaddress'];

$connect = mysqli_connect("localhost", "root", "", "bookstore") or die("Please, check your server connection.");

$today = date("Y-m-d");
$sessid = session_id();
$sql = "INSERT INTO orders (emailId) VALUES ('$email_address')";
$result = mysqli_query($connect, $sql) or die(mysql_error());
$orderid = mysqli_insert_id($connect);

echo "<div  style=\"width: 50%; margin: 0 auto;\">";    	
echo "Thanks for your Order!<br/>";
echo "Please, remember your Order number is $orderid<br>";
echo "</div>";

$query = "SELECT * FROM cart WHERE cartSessId='$sessid'";
$results = mysqli_query($connect, $query) or die(mysql_error()); 
$totalamount=0;
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
	extract($row);	
	$totalamount=$totalamount + ($cartPrice * $cartQuantity);
	$shippingId = $orderid*2;	
	$connect2 = mysqli_connect("localhost","root","","bookstore") or die("Please check your connection"); 
	$sql2 = "INSERT INTO `shipping`(`orderNumber`, `orderDate`, `shippingId`, `shippingStreetNo`, `shippingStreetName`, `shippingCity`, `shippingState`, `shippingZip`) VALUES ($orderid,'$today',$shippingId,$shipping_address_line1,'$shipping_address_line2','$shipping_city','$shipping_state',$shipping_zipcode)";
		
	$insert = mysqli_query($connect2, $sql2) or die(mysql_error()); 
	
}
$query = "DELETE FROM cart WHERE cartSessId='$sessid'";
$delete = mysqli_query($connect, $query) or die(mysql_error()); 

session_destroy();
    	

//include('bottom.php');
?>