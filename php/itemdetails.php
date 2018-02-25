<?php
include('topmenu.php');
$connect = mysqli_connect("localhost", "root", "", "bookstore") or die("Please, check your server connection.");

$code=$_REQUEST['bookCode'];
$query = "SELECT * FROM books where bookNumber like '$code'";
$results = mysqli_query($connect, $query) or die(mysql_error());
$row = mysqli_fetch_array($results, MYSQLI_ASSOC);

extract($row);
echo "<div style=\"width: 50%; margin: 0 auto;padding:20px;\">";
echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"25\">";
echo "<tr><td style=\"padding: 3px;\" rowspan=\"6\">";

$imagename = "images/". $bookNumber .".jpg ";

echo '<img src='. $imagename . ' style="max-width:200px;max-height:260px;width:auto;height:auto;"></img></td>';
echo "<td colspan=\"2\" align=\"center\" style=\"font-family:verdana; font-size:150%;\"><b>";
echo $bookName;
echo "</b></td></tr><tr> <td colspan=\"2\"><table><tr><td>";
$itemname=urlencode($bookName);
$itemprice=$price;
$itemdescription=$pageCount;
$author=$author;
$genre=$genreCategory;
$quantity=$quantityInStock;
echo "<b>Genre</b>  - ".$author;
echo "</td><td>";
switch($genre){
	case 101: echo "<b>Genre</b> - Comics";
				break;
	case 102: echo "<b>Genre</b>  - Horror";
				break;
	case 103: echo "<b>Genre</b>  - Sci-Fi";
				break;
	case 104: echo "<b>Genre</b>  - Fantasy";
				break;
}
echo "</td></tr><tr><td>";
echo "<b>Price - </b>".$price;
echo "</td><td>";
echo "<b>In Stock</b> - ".$quantity;
echo "</td></tr><tr>";
echo "<form method=\"POST\" action=\"cart.php?action=add&icode=$bookNumber&iname=$itemname&iprice=$itemprice\">";
echo "<td colspan=\"2\" style=\"font-family:verdana; font-size:100%;\">";
echo " Quantity: <input type=\"text\" name=\"quantity\" size=\"2\"> &nbsp;&nbsp;&nbsp;Price: " . $itemprice;
echo "</td></tr><tr><td  colspan=\"2\"><input type=\"submit\" name=\"buynow\" value=\"Buy Now\" style=\"font-size:125%;\">";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"addtocart\" value=\"Add To Cart\" style=\"font-size:125%;\"></td>";
echo"  </form>";
echo "</tr></table></table>";
/*echo "<p  style=\"font-size:140%;\">Description</p>";*/
echo "<p  style=\"font-size:125%;\">Pages:". $itemdescription."</p>";
echo "</div>"
?>
