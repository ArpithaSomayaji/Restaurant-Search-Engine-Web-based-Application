-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2016 at 07:59 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurantsearchengine`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget_range`
--

CREATE TABLE `budget_range` (
  `Budget_ID` int(11) NOT NULL,
  `Budget` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget_range`
--

INSERT INTO `budget_range` (`Budget_ID`, `Budget`) VALUES
(1, '0 to 20$'),
(2, '20 to 40$'),
(3, '40 to 80$'),
(4, '100$ and above');

-- --------------------------------------------------------

--
-- Table structure for table `cuisine`
--

CREATE TABLE `cuisine` (
  `Cuisine_ID` int(11) NOT NULL,
  `Cuisine_Name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuisine`
--

INSERT INTO `cuisine` (`Cuisine_ID`, `Cuisine_Name`) VALUES
(111, 'American'),
(222, 'Carribean'),
(333, 'Chinese'),
(444, 'Indian'),
(555, 'Italian'),
(666, 'Lebanese'),
(777, 'Mediterranean'),
(888, 'Mexican'),
(999, 'Thai');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(11) NOT NULL,
  `Customer_Type` varchar(10) NOT NULL,
  `Customer_LoginID` varchar(50) DEFAULT NULL,
  `Customer_LoginPassword` varchar(50) DEFAULT NULL,
  `Customer_Contact` varchar(15) DEFAULT NULL,
  `Customer_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Customer_Type`, `Customer_LoginID`, `Customer_LoginPassword`, `Customer_Contact`, `Customer_Name`) VALUES
(1, 'Registered', 'arpitha.somayaji', 'abcd123', '+16825591311', 'Arpitha Somayaji'),
(2, 'Guest', NULL, NULL, NULL, NULL),
(3, 'Registered', 'jayashree.matadh', 'Guess@456', '+16824476890', 'Jayashree matath'),
(4, 'Guest', NULL, NULL, NULL, NULL),
(5, 'Registered', 'Sachin@mavs.uta.edu', 'Cricket001', '+16824986011', 'Sachin '),
(6, 'Registered', 'george@gmail.com', 'GreatStart', '+17984452233', 'George '),
(7, 'Registered', 'UTStudenT', 'School987', '+16827893420', 'Blaze'),
(8, 'Guest', NULL, NULL, NULL, NULL),
(9, 'Guest', NULL, NULL, NULL, NULL),
(10, 'Guest', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `Manager_ID` int(11) NOT NULL,
  `Manager_Name` varchar(50) NOT NULL,
  `Manager_LoginID` varchar(50) NOT NULL,
  `Manager_LoginPassword` varchar(50) NOT NULL,
  `Manager_Contact` varchar(15) DEFAULT NULL,
  `Restaurant_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`Manager_ID`, `Manager_Name`, `Manager_LoginID`, `Manager_LoginPassword`, `Manager_Contact`, `Restaurant_ID`) VALUES
(110, 'Chris Evans', 'Chris.Evans@yahoo.co.in', 'Avengers', '(817) 265-3833', 1001),
(111, 'Dennis Game', 'DennisG12', 'Mennace001', '(817) 860-5498', 1002),
(112, 'Charlie Puth', 'PuthCharlie@', 'CPuth%67', '(817) 277-8042', 1003),
(113, 'Sangeetha Parmar', 'SangeethaParmar12', 'India990', '(817) 472-9733', 1004),
(114, 'Justin Blake', 'JustinB@gmail.com', 'JTLake@12', '(817) 465-2211', 1005),
(115, 'Ranvir Singh', 'SinghR@gmail.com', 'znmd456', '(682) 323-4441', 1006),
(116, 'Rekha Bhat', 'BhatRekha@gmail.com', 'Kaveri845', ' (972) 255-5400', 1007),
(117, 'Yograj sella', 'ygk5567@gmail.com', 'Trumpets45', ' (682) 593-1428', 1008),
(118, 'Taylor Lautner', 'tyl45', 'TwilightFans', ' (214) 559-0325', 1009),
(119, 'Robbie Williams', 'RB199@facebook.com', 'EDMMix87', '(415) 931-6917', 1010);

-- --------------------------------------------------------

--
-- Table structure for table `managerviewsfeedback`
--

CREATE TABLE `managerviewsfeedback` (
  `Rating_ID` int(11) NOT NULL,
  `Manager_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managerviewsfeedback`
--

INSERT INTO `managerviewsfeedback` (`Rating_ID`, `Manager_ID`) VALUES
(1, 110),
(1, 115),
(2, 110),
(3, 111),
(4, 112),
(5, 114),
(5, 117),
(6, 117),
(7, 119),
(9, 113);

-- --------------------------------------------------------

--
-- Table structure for table `rating_feedback`
--

CREATE TABLE `rating_feedback` (
  `Rating_ID` int(11) NOT NULL,
  `Restaurant_Visited_Date` varchar(30) NOT NULL,
  `Customer_ID` int(11) DEFAULT NULL,
  `Customer_Comment` mediumtext,
  `Customer_Cuisine_Rating` int(11) NOT NULL,
  `Customer_Overall_Rating` int(11) NOT NULL,
  `Restaurant_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_feedback`
--

INSERT INTO `rating_feedback` (`Rating_ID`, `Restaurant_Visited_Date`, `Customer_ID`, `Customer_Comment`, `Customer_Cuisine_Rating`, `Customer_Overall_Rating`, `Restaurant_ID`) VALUES
(1, '2016-11-08', 1, 'Incredible, one of the best meals I had had in a long time. Expansive menu, so there are lots of choices', 4, 3, 1001),
(2, '2016-11-07', 1, 'Small place, but amazing food!', 4, 5, 1004),
(3, '2016-10-09', 6, 'Adelmos is a beautiful place for amazing food and great customer service!', 5, 5, 1009),
(4, '2016-10-29', 3, 'Try the chicken and gyro mix plate or the Brooklyn burger, cant go wrong.', 3, 4, 1008),
(5, '2016-11-01', 5, 'They have a wide variety of selections and offer exquisite Indian food', 4, 4, 1007),
(6, '2016-11-01', 1, 'This place has local beer, excellent pizza, and super friendly staff', 4, 4, 1006),
(7, '2016-11-02', 5, 'Waitress forgot to give us the complimentary bread and butter', 2, 2, 1005),
(8, '2016-10-20', 3, 'Delicious!!! Came to the area for a meeting and wanted to try something new. We tried two dishes (upon recommendation) and were truly satisfied with the flavors and the amount of food for the price. Its worth your time to check them out', 4, 4, 1007),
(9, '2016-11-07', 5, 'Craft beers, good prices, great food', 4, 2, 1006),
(10, '2016-11-08', 6, 'The wait to get seated took about 5 minutes Food is good as usual staff A+', 5, 5, 1004);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Reservation_ID` int(11) NOT NULL,
  `Reservation_Date` varchar(30) DEFAULT NULL,
  `Reservation_Time` varchar(30) DEFAULT NULL,
  `Reservation_No_Of_People` int(11) DEFAULT NULL,
  `Restaurant_Reservation_Capacity_Per_Hour` int(11) DEFAULT NULL,
  `Restaurant_ID` int(11) DEFAULT NULL,
  `Customer_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Reservation_ID`, `Reservation_Date`, `Reservation_Time`, `Reservation_No_Of_People`, `Restaurant_Reservation_Capacity_Per_Hour`, `Restaurant_ID`, `Customer_ID`) VALUES
(100, '2016-11-10', '20:00:00', 6, 20, 1001, 1),
(101, '2016-11-11', '19:30:00', 2, 100, 1010, 2),
(102, '2016-11-10', '20:30:00', 15, 20, 1001, 3),
(103, '2016-11-12', '21:00:00', 50, 50, 1007, 4),
(104, '2016-11-12', '16:00:00', 4, 20, 1005, 5),
(105, '2016-11-14', '17:00:00', 12, 100, 1004, 6),
(106, '2016-11-10', '20:00:00', 6, 10, 1002, 7),
(107, '2016-11-13', '18:45:00', 5, 10, 1006, 4),
(108, '2016-11-12', '20:50:00', 20, 30, 1008, 8),
(109, '2016-11-10', '21:30:00', 100, 100, 1009, 2),
(110, '2016-11-10', '21:30:00', 10, 20, 1001, 3),
(111, '2016-11-10', '20:00:00', 10, 20, 1001, 3);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `Restaurant_ID` int(11) NOT NULL,
  `Restaurant_Name` varchar(50) NOT NULL,
  `Restaurant_OpenHours` varchar(30) DEFAULT NULL,
  `Restaurant_Menu` blob,
  `Restaurant_Contact` varchar(15) DEFAULT NULL,
  `Restaurant_Email` varchar(30) DEFAULT NULL,
  `Budget_ID` int(11) DEFAULT NULL,
  `Zip` int(11) DEFAULT NULL,
  `Restaurant_Reservation_Capacity_Per_Hour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`Restaurant_ID`, `Restaurant_Name`, `Restaurant_OpenHours`, `Restaurant_Menu`, `Restaurant_Contact`, `Restaurant_Email`, `Budget_ID`, `Zip`, `Restaurant_Reservation_Capacity_Per_Hour`) VALUES
(1001, 'Panda House Chinese Restaurant', '11:00AM-9:15PM', NULL, '(817) 265-3833', 'panda.house@gmail.com', 1, 76011, 20),
(1002, 'Beirut Rock Cafe', '11:00AM-11:00PM', NULL, '(817) 860-5498', ' beirutrockcafe.com', 3, 76010, 10),
(1003, 'Taco Bell', '7:00AM-2:00AM', NULL, '(817) 277-8042', ' Tacobell.com', 2, 76013, 50),
(1004, 'Olive Garden ', '11:00AM-10:00PM', NULL, '(817) 472-9733', ' olivegarden.com', 4, 76017, 100),
(1005, 'The Cheesecake Factory ', '11:00AM-11:00PM', NULL, '(817) 465-2211', 'thecheesecakefactory.com', 1, 76015, 20),
(1006, 'Old School Pizza and Suds', '11:00AM-12:00AM', NULL, '(682) 323-4441', 'oldschoolpizzaandsuds.com', 2, 76010, 10),
(1007, 'Bombay Sizzlers', '11:00AM-6:00AM', NULL, ' (972) 255-5400', 'urbanspoon.com', 4, 75039, 50),
(1008, 'New York Eats ', '11:00AM-12:00AM', NULL, ' (682) 593-1428', 'newyorkeats.net', 2, 76010, 30),
(1009, 'Adelmos Ristorante ', '11:30AM-2:30AM', NULL, ' (214) 559-0325', 'places.singleplatform.com', 4, 75209, 100),
(1010, 'Lers Ros Thai ', '5:00PM-12:30AM', NULL, '(415) 931-6917', 'lersros.com', 3, 94109, 100);

-- --------------------------------------------------------

--
-- Table structure for table `restaurantprovidingcuisinetype`
--

CREATE TABLE `restaurantprovidingcuisinetype` (
  `Restaurant_ID` int(11) NOT NULL,
  `Cuisine_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurantprovidingcuisinetype`
--

INSERT INTO `restaurantprovidingcuisinetype` (`Restaurant_ID`, `Cuisine_ID`) VALUES
(1001, 111),
(1001, 777),
(1002, 333),
(1002, 999),
(1004, 555),
(1005, 444),
(1006, 333),
(1007, 888),
(1008, 333),
(1008, 666),
(1009, 111),
(1009, 222);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_location`
--

CREATE TABLE `restaurant_location` (
  `Zip` int(11) NOT NULL,
  `Restaurant_Street` varchar(50) DEFAULT NULL,
  `Restaurant_City` varchar(50) DEFAULT NULL,
  `Restaurant_State` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_location`
--

INSERT INTO `restaurant_location` (`Zip`, `Restaurant_Street`, `Restaurant_City`, `Restaurant_State`) VALUES
(75039, '397 E Las Colinas Blvd ', 'Irving', 'TX'),
(75209, 'Inwood Village, 5450 W Lovers Ln ', 'Dallas', 'TX'),
(76010, '603 W Abram St', 'Arlington', 'TX'),
(76011, ' S Cooper St ', 'Arlington', 'TX'),
(76012, ' S Cooper St ', 'Arlington', 'TX'),
(76013, '604 Doug Russell Rd B', 'Arlington', 'TX'),
(76014, ' S Cooper St ', 'Arlington', 'TX'),
(76015, '3811 S Cooper St ', 'Arlington', 'TX'),
(76017, '4604 S Cooper St ', 'Arlington', 'TX'),
(94109, '730 Larkin St ', 'San Francisco', 'CA');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `Search_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Search_Date` date DEFAULT NULL,
  `Zip` int(11) DEFAULT NULL,
  `Rating_ID` int(11) DEFAULT NULL,
  `Cuisine_ID` int(11) DEFAULT NULL,
  `Budget_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`Search_ID`, `Customer_ID`, `Search_Date`, `Zip`, `Rating_ID`, `Cuisine_ID`, `Budget_ID`) VALUES
(1, 1, '2016-11-09', 76013, 7, 111, 1),
(2, 9, '2016-11-06', 76010, NULL, NULL, NULL),
(3, 5, '2016-10-07', 94109, NULL, 555, 3),
(4, 4, '2016-10-09', 76015, 3, NULL, 2),
(5, 5, '2016-11-08', 76013, 4, NULL, NULL),
(6, 6, '2016-11-07', 76015, NULL, 444, 1),
(7, 7, '2016-11-06', 76017, 7, 555, 2),
(8, 8, '2016-11-05', 76014, 9, 666, 4),
(9, 9, '2016-11-04', 76011, 1, 777, 2),
(10, 1, '2016-11-03', 76010, 1, 222, 2);

-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

CREATE TABLE `searches` (
  `Search_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `searches`
--

INSERT INTO `searches` (`Search_ID`, `Customer_ID`) VALUES
(1, 1),
(2, 9),
(3, 5),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `Manager_ID` int(11) NOT NULL,
  `Restaurant_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`Manager_ID`, `Restaurant_ID`) VALUES
(110, 1001),
(111, 1002),
(112, 1003),
(113, 1004),
(114, 1005),
(115, 1006),
(116, 1007),
(117, 1008),
(118, 1009),
(119, 1010);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budget_range`
--
ALTER TABLE `budget_range`
  ADD PRIMARY KEY (`Budget_ID`);

--
-- Indexes for table `cuisine`
--
ALTER TABLE `cuisine`
  ADD PRIMARY KEY (`Cuisine_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`Manager_ID`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`);

--
-- Indexes for table `managerviewsfeedback`
--
ALTER TABLE `managerviewsfeedback`
  ADD PRIMARY KEY (`Rating_ID`,`Manager_ID`),
  ADD KEY `Manager_ID` (`Manager_ID`);

--
-- Indexes for table `rating_feedback`
--
ALTER TABLE `rating_feedback`
  ADD PRIMARY KEY (`Rating_ID`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Reservation_ID`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Restaurant_ID`),
  ADD KEY `Budget_ID` (`Budget_ID`),
  ADD KEY `Zip` (`Zip`);

--
-- Indexes for table `restaurantprovidingcuisinetype`
--
ALTER TABLE `restaurantprovidingcuisinetype`
  ADD PRIMARY KEY (`Restaurant_ID`,`Cuisine_ID`),
  ADD KEY `Cuisine_ID` (`Cuisine_ID`);

--
-- Indexes for table `restaurant_location`
--
ALTER TABLE `restaurant_location`
  ADD PRIMARY KEY (`Zip`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`Search_ID`,`Customer_ID`),
  ADD KEY `Cuisine_ID` (`Cuisine_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Rating_ID` (`Rating_ID`),
  ADD KEY `Budget_ID` (`Budget_ID`),
  ADD KEY `Zip` (`Zip`);

--
-- Indexes for table `searches`
--
ALTER TABLE `searches`
  ADD PRIMARY KEY (`Search_ID`,`Customer_ID`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`Restaurant_ID`,`Manager_ID`),
  ADD KEY `Manager_ID` (`Manager_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rating_feedback`
--
ALTER TABLE `rating_feedback`
  MODIFY `Rating_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `Search_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurant` (`Restaurant_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `managerviewsfeedback`
--
ALTER TABLE `managerviewsfeedback`
  ADD CONSTRAINT `managerviewsfeedback_ibfk_1` FOREIGN KEY (`Manager_ID`) REFERENCES `manager` (`Manager_ID`),
  ADD CONSTRAINT `managerviewsfeedback_ibfk_2` FOREIGN KEY (`Rating_ID`) REFERENCES `rating_feedback` (`Rating_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `rating_feedback`
--
ALTER TABLE `rating_feedback`
  ADD CONSTRAINT `rating_feedback_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurant` (`Restaurant_ID`),
  ADD CONSTRAINT `rating_feedback_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurant` (`Restaurant_ID`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`Budget_ID`) REFERENCES `budget_range` (`Budget_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurant_ibfk_2` FOREIGN KEY (`Zip`) REFERENCES `restaurant_location` (`Zip`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `restaurantprovidingcuisinetype`
--
ALTER TABLE `restaurantprovidingcuisinetype`
  ADD CONSTRAINT `restaurantprovidingcuisinetype_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurant` (`Restaurant_ID`),
  ADD CONSTRAINT `restaurantprovidingcuisinetype_ibfk_2` FOREIGN KEY (`Cuisine_ID`) REFERENCES `cuisine` (`Cuisine_ID`);

--
-- Constraints for table `search`
--
ALTER TABLE `search`
  ADD CONSTRAINT `search_ibfk_1` FOREIGN KEY (`Cuisine_ID`) REFERENCES `cuisine` (`Cuisine_ID`),
  ADD CONSTRAINT `search_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`),
  ADD CONSTRAINT `search_ibfk_3` FOREIGN KEY (`Rating_ID`) REFERENCES `rating_feedback` (`Rating_ID`),
  ADD CONSTRAINT `search_ibfk_4` FOREIGN KEY (`Budget_ID`) REFERENCES `budget_range` (`Budget_ID`),
  ADD CONSTRAINT `search_ibfk_5` FOREIGN KEY (`Zip`) REFERENCES `restaurant_location` (`Zip`);

--
-- Constraints for table `searches`
--
ALTER TABLE `searches`
  ADD CONSTRAINT `searches_ibfk_1` FOREIGN KEY (`Search_ID`,`Customer_ID`) REFERENCES `search` (`Search_ID`, `Customer_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `updates`
--
ALTER TABLE `updates`
  ADD CONSTRAINT `updates_ibfk_1` FOREIGN KEY (`Manager_ID`) REFERENCES `manager` (`Manager_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `updates_ibfk_2` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurant` (`Restaurant_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
