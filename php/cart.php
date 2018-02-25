<?php
include('topmenu.php');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$connect = mysqli_connect("localhost", "root", "", "bookstore") or die("Please, check your server connection.");
$message = "";
$quantity="";
$action="";
$query="";
if (isset($_POST['quantity'])) {
  	$quantity = trim($_POST['quantity']);
}
if ($quantity=='')
{
	$quantity=1;
}
if($quantity <=0)
{
	echo "Quantity value is invalid ";
	echo "Go Back and enter a valid value";
}
else
{
	if (isset($_REQUEST['icode'])) {
  		$itemcode = $_REQUEST['icode'];
	}
	if (isset($_REQUEST['iname'])) {
  		$item_name = $_REQUEST['iname'];
	}
	if (isset($_REQUEST['iprice'])) {
  		$price = $_REQUEST['iprice'];
	}
	if (isset($_POST['modified_quantity'])) {
  		$modified_quantity = $_POST['modified_quantity'];
	}
	$sess = session_id();
	if (isset($_REQUEST['action'])) {
		$action = $_REQUEST['action'];
	}
	switch ($action) {
  		case "add":			
			
			$query="select * from cart where cartSessId = '$sess' and itemCode like $itemcode";
			$result = mysqli_query($connect, $query) or die(mysql_error()); 
			
			if(mysqli_num_rows($result)==1)
				{	
				
				$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
				$qt=$row['cartQuantity'];
				$qt=$qt + $quantity;
				$query="UPDATE cart set cartQuantity=$quantity where cartSessId = '$sess' and itemCode like $itemcode";
				$result = mysqli_query($connect, $query)  or die(mysql_error());
			}
			else
			{		
    				$query = "INSERT INTO cart (cartSessId, itemCode, cartQuantity, cartPrice) VALUES ('$sess', $itemcode, $quantity, $price)";					
					
					$message = "<div align=\"center\"><strong>Item added.</strong></div>";
						
					
			}
    			break;

  		case "change":
			if($modified_quantity==0)
			{
    				$query = "DELETE FROM cart WHERE cartSessId = '$sess' and itemCode like $itemcode";
    				$message = "<div style=\"width:200px; margin:auto;\">Item deleted</div>";
			}
			else
			{
				if($modified_quantity <0)
				{
					echo "Invalid quantity entered";
				}
				else
				{
    					$query = "UPDATE cart SET cartQuantity = $modified_quantity  WHERE cartSessId = '$sess' and itemCode like $itemcode";
    					$message = "<div style=\"width:200px; margin:auto;\">Quantity changed</div>";
				}
			}
    			break;
  		case "delete":
    			$query = "DELETE FROM cart WHERE cartSessId = '$sess' and itemCode like $itemcode";
    			$message = "<div style=\"width:200px; margin:auto;\">Item deleted</div>";
    			break;
  		case "empty":
    			$query = "DELETE FROM cart WHERE cartSessId = '$sess'";
      			break;
	}
	if($query !="")
	{
		$results = mysqli_query($connect, $query) or die(mysql_error());
		echo $message;
	}
	
	include("showcart.php");
	echo "<SCRIPT LANGUAGE=\"JavaScript\">updateCart();</SCRIPT>";
	//echo '<script type="text/javascript">window.location = "cart.php"</script>';
}
?>
