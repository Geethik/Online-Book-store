<?php
include('topmenu.php');
$connect = mysqli_connect("localhost", "root", "", "bookstore") or die("Please, check your server connection.");
$category=$_REQUEST['category'];
$catId=0;
switch($category){
	case "comics": $catId=101;
					break;
	case "horror": $catId=102;
					break;
	case "science fiction": $catId=103;
					break;
	case "fantasy": $catId=104;
					break;
}
$query = "SELECT bookNumber, bookName, genreCategory, price FROM books " .
         	"where genreCategory like '$catId' order by bookNumber";
$results = mysqli_query($connect, $query) or die(mysql_error()); 
echo "<table border=\"0\">";
$x=1;
echo "<tr>";
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC))  {
	if ($x <= 3)
	{
		$x = $x + 1;
 		extract($row);
   		echo "<td style=\"padding-right:15px;\">";
		echo "<a href=itemdetails.php?bookCode=$bookNumber>";
		$imagename = "images/". $bookNumber .".jpg "; 
		echo '<img src='. $imagename .  ' style="max-width:220px;max-height:240px;width:auto;height:auto;"></img><br/>';
 		echo $bookName .'<br/>';
		echo "</a>";
    		echo '$'.$price .'<br/>';
    		echo "</td>";
	}
	else
	{
		$x=1;
		echo "</tr><tr>";
	}
}
echo "</table>";
?>
</body>
</html>