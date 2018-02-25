<?php
include('topmenu.php');
$connect = mysqli_connect("localhost", "root", "", "bookstore") or die("Please, check your server connection.");
$tosearch=$_POST['tosearch'];
$query = "select * from books where ";
$query_fields = Array();
$sql = "SHOW COLUMNS FROM books";
$columnlist = mysqli_query($connect, $sql) or die(mysql_error()); 
while($arr = mysqli_fetch_array($columnlist, MYSQLI_ASSOC)){
	extract($arr);
 	$query_fields[] = $Field . " like('%". $tosearch . "%')";
}
$query .= implode(" OR ", $query_fields);
$results = mysqli_query($connect, $query) or die(mysql_error()); 
echo "<table border=\"0\" >";
$x=1;
echo "<tr>";
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC))  {
	if ($x <= 3)
	{
		$x = $x + 1;
 		extract($row);
   		echo "<td style=\"padding-right:15px;\">";
		echo "<a href=itemdetails.php?bookCode=$bookNumber>";
		$imagename = "images/" . $bookNumber .".jpg ";
		echo '<img src='. $imagename . ' style="max-width:220px;max-height:240px;width:auto;height:auto;"></img><br/>';
 		echo $bookName .'<br/>';
		echo "</a>";
    	echo '$'.$price .'<br/>';
    	echo "</td>";
	}
	else
	{
		$x=1;
		echo "</tr><tr>";
		extract($row);
   		echo "<td style=\"padding-right:15px;\">";
		echo "<a href=itemdetails.php?bookCode=$bookNumber>";
		$imagename = "images/" . $bookNumber .".jpg ";
		echo '<img src='. $imagename . ' style="max-width:220px;max-height:240px;width:auto;height:auto;"></img><br/>';
 		echo $bookName .'<br/>';
		echo "</a>";
    	echo '$'.$price .'<br/>';
    	echo "</td>";
		$x=2;
	}
}
echo "</table>";
?>
