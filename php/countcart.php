<?php
$totalquantity=0;
if (session_status() == PHP_SESSION_NONE) {
    	session_start();
}
$connect = mysqli_connect("localhost", "root", "", "bookstore") or die("Please, check your server connection.");
$sess = session_id();
$query="select * from cart where cartSessId = '$sess'";
$results = mysqli_query($connect, $query) or die(mysql_error()); 
$totalquantity=0;
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
  	extract($row);
	$totalquantity = $totalquantity + $cartQuantity;
}
echo $totalquantity;
?>