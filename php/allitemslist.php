<html>
<head>
</head>
<body>
<div  style="width: 60%; margin: 0 auto;">
<?php
$connect = mysqli_connect("localhost", "root", "", "bookstore") or die("Please, check your server connection.");
/*Image name excluded from query*/
$query = "SELECT * FROM books";
$results = mysqli_query($connect, $query) or die(mysql_error()); 
echo "<table border=\"0\">";
$x=1;
echo "<tr>";
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC))  {
	if ($x <= 4)
	{
		$x = $x + 1;
 		extract($row);
   		echo "<td style=\"padding-right:15px;\">";
		echo "<a href=itemdetails.php?bookCode=$bookNumber>";		
		$imagename = "images/". $bookNumber .".jpg ";		
		echo '<img src='. $imagename . 'style="max-width:250px;max-height:240px;width:auto;height:auto; margin:3px;"></img><br/>';
 		echo "<h4>".$bookName .'</h4><br/>';
		echo "</a>";
    	echo "Price - $".$price .'<br/><br/>';
    	echo "</td>";
	}
	else
	{
		$x=1;
		echo "</tr><tr>";
		extract($row);
   		echo "<td style=\"padding-right:15px;\">";
		echo "<a href=itemdetails.php?bookCode=$bookNumber>";		
		$imagename = "images/". $bookNumber .".jpg ";		
		echo '<img src='. $imagename . 'style="max-width:250px;max-height:240px;width:auto;height:auto;margin:3px;"></img><br/>';
 		echo "<h4>".$bookName .'</h4><br/>';
		echo "</a>";
    	echo 'Price - $'.$price .'<br/><br/>';
    	echo "</td>";
		$x=2;
	}
}
echo "</table>";
?>
</div>
</body>
</html>