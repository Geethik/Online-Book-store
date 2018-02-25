<?php
if ( ! isset($totalamount)) {
   	$totalamount=0;
}
$totalquantity=0;
if (!session_id()) {
  	session_start();
}
$connect = mysqli_connect("localhost", "root", "", "bookstore") or die("Please, check your server connection.");
$sessid = session_id();
$query = "SELECT * FROM cart WHERE cartSessId = '$sessid'";
$results = mysqli_query($connect, $query) or die (mysql_query());
if(mysqli_num_rows($results)==0)
{
	echo "<div style=\"width:200px; margin:auto;\">Your Cart is empty</div> ";
}
else
{ 
?>
	<table border="1" align="center" cellpadding="5">
  	<tr><td> Book Number</td><td>Quantity</td><td>Book Name</td><td>Price</td><td>Total Price</td>
<?php
	while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
  		extract($row);
  		echo "<tr><td>";
  		echo $itemCode;
  		echo "</td>";
  		echo "<td> <form method=\"POST\" action=\"cart.php?action=change&icode=$itemCode\"> <input type=\"text\" name=\"modified_quantity\" size=\"2\" value=\"$cartQuantity\">";
  		echo "</td><td>";
		$queryBookName = "SELECT * FROM books WHERE bookNumber=$itemCode";
		$output = mysqli_query($connect,$queryBookName) or die(mysql_squery());
		//if(mysqli_num_rows($output)==1){
			$rowBookName = mysqli_fetch_array($output,MYSQLI_ASSOC);
		//}
		extract($rowBookName);
  		echo $bookName; /*Cart book name to be extracted using query*/
  		echo "</td><td>";
  		echo $cartPrice;
  		echo "</td><td>";
		$totalquantity = $totalquantity + $cartQuantity;
  		$totalprice = number_format($cartPrice * $cartQuantity, 2);
		$totalamount=$totalamount + ($cartPrice * $cartQuantity);
  		echo $totalprice;
  		echo "</td><td>";
  		echo "<input type=\"submit\" name=\"Submit\"  value=\"Change quantity\"> </form></td>";
  		echo "<td>";
  		echo "<form method=\"POST\" action=\"cart.php?action=delete&icode=$itemCode\">";
  		echo "<input type=\"submit\" name=\"Submit\" value=\"Delete Item\"> </form></td></tr>";
	}
	echo "<tr><td >Total</td><td>$totalquantity</td><td></td><td></td><td>";
  	$totalamount = number_format($totalamount, 2);
	echo $totalamount;
	echo "</td></tr>";
	echo "</table><br>";
	echo "<div style=\"width:400px; margin:auto;\">You currently have " . $totalquantity . " book(s) selected in your cart</div> ";
?>
	<table border="0" style="margin:auto;">
	<tr><td  style="padding: 10px;">
	<form method="POST" action="cart.php?action=empty">
		<input type="submit" name="Submit" value="Empty Cart" style="font-family:verdana; font-size:150%;" > 
	</form>
	</td><td>
	<form method="POST" action="checklogin.php">
		<input id="cartamount" name="cartamount" type="hidden" value= "<?php echo $totalamount ; ?>">
		<input type="submit" name="Submit" value="Checkout"  style="font-family:verdana; font-size:150%;" >
	</form>
	</td></tr></table>
<?php
}
?>
</body>
</html>

