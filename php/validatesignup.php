<html>
<head>
<script language="JavaScript" type="text/JavaScript" src="js/checkform.js"></script>
</head>
<body>

	<table  width="100%" cellspacing="0" cellpadding="3">
        		<col style="width:30%">
        		<col style="width:40%">
        		<col style="width:20%">
		<tr><td style="background-color:cyan;color:Blue;"></td><td style="background-color:cyan;color:Blue;"></td><td style="background-color:cyan;color:Blue;">

		<tr><td style="font-size: 35px;color:white;background-color:cyan;">
    		<b><a href="index.php" style="color:Blue;margin:5px;padding:15px; text-decoration:none;" ><img src="images/books.png" width="40px" height="
			45px"></img>Online Book Store</b></a></font></td>
			<td bgcolor="cyan"></td>
			<td bgcolor="cyan"></td>
			</tr>
			</table>
			<div  style="width: 50%; margin: 0 auto;">
			<h2 style="text-align:center;">Signup form</h2>
  	<form action="addcustomer.php" method="post" onsubmit="return validate(this);" >
		<table border="0" cellspacing="1" cellpadding="3">
			<tr><td colspan="2" align="center">Enter your information</td></tr>
  			<tr><td>Email Address: </td><td> <input size="20" type="text" name="emailaddress" > <span id="emailmsg"></span></td></tr>
  			<tr><td>Password: </td><td>  <input size="20" type="password" name="password" ><span id="passwdmsg"></span></td></tr>
  			<tr><td>ReType Password:  </td><td> <input size="20" type="password" name="repassword"><span id="repasswdmsg"></span></td></tr>
  			<tr><td>First Name:  </td><td> <input size="50" type="text" name="first_name" ><span id="usrmsg1"></span></td></tr>
			<tr><td>Last Name:  </td><td> <input size="50" type="text" name="last_name" ><span id="usrmsg2"></span></td></tr>
   			<tr><td>Street Number:  </td><td> <input size="80" type="text" name="street_number"><span id="streetnomsg"></span></td></tr>
			<tr><td>Street Name:  </td><td> <input size="80" type="text" name="street_name"><span id="streetnamemsg"></span></td></tr>
  			<tr><td>City:  </td><td> <input size="30" type="text" name="city"></td></tr>
  			<tr><td>State:  </td><td> <input size="30" type="text" name="state"></td></tr> 			
  			<tr><td>Zip Code:  </td><td> <input size="20" type="text" name="zipcode"></td></tr>
    		<tr><td>Phone No:  </td><td> <input size="30" type="text" name="phone_no"></td></tr>
  			<tr><td><input type="submit" name="submit" value="Submit"> </td><td> 
    			<input type="reset" value="Cancel"></td></tr>
		</table>
  	</form>
	</div>
</body>
</html>


