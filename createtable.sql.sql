DROP DATABASE IF EXISTS `bookStore`;

CREATE DATABASE `bookStore`;
USE `bookStore`;

/*Table structure for table `genre`*/
DROP TABLE IF EXISTS `genre`;

CREATE TABLE `genre`(
	`genreID` int(11) NOT NULL,
	`genre` varchar(50) NOT NULL,
	PRIMARY KEY (`genreID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*Table structure for table `books` */
DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
	`bookNumber` int(11) NOT NULL,
	`bookName` varchar(50) NOT NULL,
	`pageCount` int(5) NOT NULL,
	`author` varchar(50) NOT NULL,
	`price` DECIMAL(7,2) NOT NULL,
	`genreCategory` int(11) NOT NULL,
	`quantityInStock` int(5) NOT NULL,
	PRIMARY KEY (`bookNumber`),
	CONSTRAINT `books_ct_1` FOREIGN KEY (`genreCategory`) REFERENCES `genre` (`genreID`)
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


/*Table structure for `cart`*/
DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
	`cartSessId` varchar(50) NOT NULL,
	`itemCode` int(11) NOT NULL,
	`cartQuantity` int(5) NOT NULL,
	`cartPrice` DECIMAL(7,2) NOT NULL,
	PRIMARY KEY (`cartSessId`),
	CONSTRAINT `cart_ct_1` FOREIGN KEY (`itemCode`) REFERENCES `books` (`bookNumber`)
	ON DELETE CASCADE ON UPDATE CASCADE	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `customers` */
DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
	`emailId` varchar(50) NOT NULL,
	`password` varchar(50) NOT NULL,
	`firstName` varchar(50) NOT NULL,
	`lastName` varchar(50) NOT NULL,
	`streetName` varchar(50) NOT NULL,
	`streetNumber` int(11) NOT NULL,
	`city` varchar(50) NOT NULL,
	`state` varchar(50) DEFAULT NULL,
	`zipCode` varchar(11) DEFAULT NULL,
	`mobileNo` varchar(15) DEFAULT NULL,
	PRIMARY KEY (`emailId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `orders`*/
DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
	`orderNumber` int(11) NOT NULL auto_increment,
	`emailId` varchar(50) NOT NULL,	
	PRIMARY KEY (`orderNumber`),
	CONSTRAINT `orders_ct_1` FOREIGN KEY (`emailId`) REFERENCES `customers` (`emailId`)
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `shipping`*/
DROP TABLE IF EXISTS `shipping`;

CREATE TABLE `shipping` (
	`orderNumber` int(11) NOT NULL,
	`orderDate` date NOT NULL,
	`shippingId` int(11) NOT NULL,
	`shippingStreetNo` int (11) NOT NULL,
	`shippingStreetName` varchar(50) NOT NULL,
	`shippingCity` varchar(50) NOT NULL,
	`shippingState` varchar(50) NOT NULL,
	`shippingZip` int(11) NOT NULL,
	PRIMARY KEY (`orderNumber`,`shippingId`),
	CONSTRAINT `shipping_ct_1` FOREIGN KEY (`orderNumber`) REFERENCES `orders`(`orderNumber`)
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


