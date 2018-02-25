The website is also hosted at :
https://cryptic-reaches-45863.herokuapp.com

The source code is as follows:

SQL files: createtable.sql and insertValues.sql and rest all 

PHP files :

• index.php, signup.php, validatesignup.php

• signin.php, validateuser.php, topmenu.php

• addcustomer.php, cart.php, allitemslist.php

• checkconnection.php, countcart.php, showcart.php

• itemdetails.php, itemlist.php, logout.php

• shippinginfo.php,searchitems.php, placeorder.php

JS files - checkform.js

CSS files - style.css

to make the interface which are being provided along with the report 

The instructions to test the interface using WAMP server are as follows:

Download necessary software:

• Apache Web Server - to host from our local computer, "localhost" is the database host 

• MySQL - was choosen as the RDMS 

• PHP - was the chosen language for the web application UI, embeded in html and css

• Alternatively from downloading each software seperately there is bundle of these programs provided online WINDOWS download -[|| http://www.wampserver.com/en/] MAC downlaod - [https://www.mamp.info/en/ ]LINUX download - follow instructions provided at [http://lamphowto.com/]

Configure software: 

• In the WAMP server the MySQL login credentials used are Username: root password: (none)

• If other username and password are used then the php files will have to be edited. Anywhere the following variables are displayed please change to match your MySQL login.

• In all the PHP files of connect queries DB user = 'root' and for DB password=''(alter password here) and the DB name='bookstore'

• Download the source code and place them in C:\wamp64\www\ folder of the wamp64 installation directory.

• In the MySQL console of the WAMP server run the SQL scripts to generate and setup (populate) the database.

• Run the following commands in MySQL console - “source createtable.sql” and “source insertValues.sql”.

• After this the website can launched by localhost/php/index.php and then various php files traversed.

• Since only single item purchase is allowed, so if the cart contains an item, addition of another item to cart just leaves a blank screen, to redirect either click on cart to check its capacity or redirect to index page by clicking on “Online Book Store” at the top.