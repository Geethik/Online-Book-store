<?php
    // Connect to the database server
    $MySQLi = new MySQLi("localhost", "root", "", "bookstore");
    if ($MySQLi->errno) {
        printf("Unable to connect to the database:<br /> %s",$MySQLi->error);
        exit();
    }
else
	printf("Successfully connected with the MySQL server and Book store database is opened");
?>
