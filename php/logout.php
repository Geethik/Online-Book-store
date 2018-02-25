<?php
session_start();
if (isset($_SESSION['emailaddress']))
{
	unset($_SESSION['emailaddress']);
	session_destroy();
}
echo "Thank you for visiting our book store. Your session ended.";
include("index.php"); 
?>
