-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2017 at 10:46 PM
-- Server version: 5.5.53-0+deb8u1
-- PHP Version: 5.6.29-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `petCatalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
`URI` int(11) NOT NULL,
  `itemType` varchar(255) NOT NULL,
  `petType` varchar(255) NOT NULL,
  `accType` varchar(255) NOT NULL,
  `petSubType` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `lifeSpan` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `price` decimal(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `itemNum` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`URI`, `itemType`, `petType`, `accType`, `petSubType`, `color`, `lifeSpan`, `age`, `price`, `quantity`, `itemNum`) VALUES
(1, 'Pet', 'Dog', 'NA', 'Corgi', 'Red', 12, 1, 500.00, 1, 8007),
(2, 'Pet', 'Dog', 'NA', 'Spaniel', 'Brown', 15, 8, 79.99, 1, 8783),
(3, 'Pet', 'Dog', 'NA', 'Boxer', 'Brown', 12, 3, 250.00, 1, 8518),
(4, 'Pet', 'Dog', 'NA', 'Chihuahua', 'Yellow', 12, 2, 100.00, 1, 8765),
(5, 'Pet', 'Dog', 'NA', 'Corgi', 'Black', 12, 8, 500.00, 1, 8008),
(6, 'Pet', 'Cat', 'NA', 'Siamese', 'Yellow', 15, 5, 70.00, 1, 6578),
(7, 'Pet', 'Cat', 'NA', 'Calico', 'Yellow', 15, 10, 50.00, 1, 6874),
(8, 'Pet', 'Cat', 'NA', 'Bobcat', 'Red', 15, 3, 59.99, 1, 6506),
(9, 'Pet', 'Cat', 'NA', 'Persian', 'Black', 10, 8, 20.00, 1, 6844),
(10, 'Pet', 'Cat', 'NA', 'Sphynx', 'Grey', 15, 8, 20.00, 1, 6108),
(11, 'Pet', 'Reptile', 'NA', 'Turtle', 'Green', 10, 8, 5.00, 1, 5643),
(12, 'Pet', 'Reptile', 'NA', 'Snake', 'Black', 15, 10, 10.00, 1, 5887),
(13, 'Pet', 'Reptile', 'NA', 'Iguana', 'Blue', 10, 3, 50.00, 1, 5941),
(14, 'Pet', 'Reptile', 'NA', 'Iguana', 'Green', 10, 6, 50.00, 1, 5942),
(15, 'Pet', 'Reptile', 'NA', 'Anole', 'Brown', 5, 1, 15.00, 1, 5887),
(16, 'Accessory', 'Dog', 'Toy Bone', '', 'Red', 1, 1, 5.00, 50, 1809),
(17, 'Accessory', 'Dog', 'Toy Ball', '', 'Green', 1, 1, 0.00, 10, 1884),
(18, 'Accessory', 'Dog', 'Toy Bone', '', 'Red', 1, 1, 5.00, 50, 1037),
(19, 'Accessory', 'Dog', 'Toy Ball', '', 'Blue', 1, 1, 10.00, 25, 1048),
(20, 'Accessory', 'Cat', 'Toy Mouse', '', 'Grey', 1, 1, 8.00, 12, 1037),
(21, 'Accessory', 'Cat', 'Toy Jingle Ball', '', 'Blue', 1, 1, 7.50, 10, 1066),
(22, 'Accessory', 'Reptile', 'Terrarium Castle', '', 'Grey', 1, 1, 35.00, 5, 2588),
(23, 'Accessory', 'Dog', 'Large Carrier', '', 'Grey', 1, 1, 50.00, 5, 4588),
(24, 'Accessory', 'Dog', 'Small Carrier', '', 'Grey', 1, 1, 45.00, 5, 4586),
(25, 'Accessory', 'Cat', 'Medium Carrier', '', 'Red', 1, 1, 48.00, 3, 4587),
(26, 'Accessory', 'Cat', 'Small Carrier', '', 'Red', 1, 1, 45.00, 8, 4586),
(27, 'Accessory', 'Reptile', 'Reptile Carrier', '', 'Grey', 1, 1, 10.00, 20, 4098);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
 ADD PRIMARY KEY (`URI`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
MODIFY `URI` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
