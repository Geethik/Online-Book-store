<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Online Book Store</title>
<link rel="stylesheet" href="css/style.css">
<script language="JavaScript" type="text/JavaScript">
	function makeRequestObject(){
		var xmlhttp=false; 
		try {
			xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
		} catch (e) {
			try {
				xmlhttp = new
				ActiveXObject('Microsoft.XMLHTTP'); 
			} catch (E) {
				xmlhttp = false;
			}
		}
		if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
			xmlhttp = new XMLHttpRequest(); 
		}
		return xmlhttp;
	}
	function updateCart(){
		var xmlhttp=makeRequestObject();
		xmlhttp.open('GET',  'countcart.php', true); 
		xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var ajaxCart = document.getElementById("cartcountinfo");
			ajaxCart.innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.send(null);
}
</script>
</head>
<body>
	<table  width="100%" cellspacing="0" cellpadding="3">
        		<col style="width:30%">
        		<col style="width:40%">
        		<col style="width:20%">
		<tr><td style="background-color:cyan;color:Blue;"></td><td style="background-color:cyan;color:Blue;"></td><td style="background-color:cyan;color:Blue;">
<?php
		if (session_status() == PHP_SESSION_NONE) {
    			session_start();
		}
		if (isset($_SESSION['emailaddress']))
		{
			echo "Welcome " . $_SESSION['emailaddress'] .  "&nbsp;&nbsp;&nbsp;";
			echo "<a href=\"logout.php\">Log Out</a></td></tr>";
		}
		else
		{
  			echo "<a href=\"signin.php\">Login</a> &nbsp;&nbsp;&nbsp;";
			echo "<a href=\"validatesignup.php\">Signup</a></td></tr>";
		}
?>
		<tr><td style="font-size: 35px;color:white;background-color:cyan;">
    		<b><a href="index.php" style="color:Blue;margin:5px;padding:15px; text-decoration:none;" ><img src="images/books.png" width="40px" height="
			45px"></img>Online Book Store</b></a></font></td>
		<td bgcolor="cyan">
		<form  method="post" action="searchitems.php">  
			<input  size="60" type="text" name="tosearch" placeholder="Search by Book name, author" style="padding:5px;">  
			<input  type="submit" name="submit" value="Search" style="padding:5px;">  
		</form></td>
		<td bgcolor="cyan" ><a href="cart.php"><img style="max-width:40px;max-height:40px;width:auto;height:auto;" src="images/cart.png"></img><span id="cartcountinfo"></span></a>
		</td></tr>
	</table>
   	<!--<div class="container">
    		<nav>
      		<ul class="nav">
        			<li><a href="index.php">Home</a></li>
        			<li class="dropdown">
          				<a href="index.php">Electronics</a>
          				<ul>
            					<li><a href="itemlist.php?category=CellPhone">Smart Phones</a></li>
            					<li><a href="itemlist.php?category=Laptop">Laptops</a></li>
            					<li><a href="index.php">Cameras </a></li>
            					<li><a href="index.php">Televisions</a></li>
          				</ul>
        			</li>
        			<li class="dropdown">
          				<a href="index.php">Home & Furniture</a>
          				<ul class="large">
            					<li><a href="index.php">Kitchen Essentials</a></li>
            					<li><a href="index.php">Bath Essentials</a></li>
            					<li><a href="index.php">Furniture</a></li>
            					<li><a href="index.php">Dining & Serving</a></li>
           	 				<li><a href="index.php">Cookware</a></li>
          				</ul>
        			</li>
        			<li><a href="index.php">Books</a></li>
      		</ul>
    		</nav>
     	</div>-->
<p>