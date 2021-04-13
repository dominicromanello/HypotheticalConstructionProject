-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2020 at 05:15 PM
-- Server version: 8.0.19
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lh7310`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bid`
--

CREATE TABLE `Bid` (
  `bidid` int NOT NULL,
  `subid` int NOT NULL,
  `projectid` int NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Bid`
--

INSERT INTO `Bid` (`bidid`, `subid`, `projectid`, `date`, `description`, `amount`) VALUES
(1, 3002, 1, '2020-11-11', 'Mark\'s  metal is going to put up the framing for the building, and the structure for the roof.', 75000),
(2, 4992, 1, '2020-11-11', 'Carol Concrete is going to pour the concrete foundation and pillars.', 50000),
(3, 194, 1, '2020-11-19', 'Flip\'s Floors is going to lay the flooring, including wood, tile, and carpet.', 35000),
(4, 2940, 1, '2020-11-16', 'Ronny\'s Rooves will install the roof, including structure and shingles.', 29000),
(5, 9889, 1, '2020-11-11', 'Perry\'s Paint will paint the entire building, interior and exterior.', 25000),
(6, 5409, 2, '2020-12-17', 'Walter\'s Wood will put up the wooden structure of the building.', 40000),
(7, 194, 2, '2020-12-15', 'Flip\'s Floors is responsible for installing the floors.', 20000),
(8, 2940, 2, '2020-12-22', 'Ronny\'s Rooves will install he structure of he roof and shingles.', 25000),
(9, 9889, 2, '2020-12-30', 'Perry\'s Paint will paint all of the walls, interior and exterior.', 15000),
(10, 5409, 3, '2021-01-21', 'Walter\'s Wood is going to install the wood for the deck and canopy.', 30000),
(11, 5882, 3, '2020-12-17', 'Danny\'s Demolition will demo the existing deck at James Miller\'s house.', 10000),
(12, 4920, 4, '2021-02-17', 'Frank\'s Fireplace will install a new fireplace into Alex Tunis\'s house.', 20000),
(13, 5882, 5, '2021-03-11', 'Danny\'s Demolition will remove the existing roof at Matt Marino\'s house.', 5000),
(14, 2940, 5, '2021-03-17', 'Ronny\'s Rooves will install a new roof at Matt Marino\'s house.', 9000),
(15, 3303, 3, '2020-11-11', 'Install wooden deck and canopy at James Miller\'s house.', 40000),
(16, 5882, 6, '2020-10-13', 'Danny\'s Demolition has to remove current gazebo.', 3000),
(17, 2940, 6, '2020-10-13', 'Ronny\'s Rooves will install roof onto  gazebo.', 4000),
(18, 3303, 6, '2020-10-20', 'Wendy\'s Wood will provide the wood and foundation for the project.', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `clientid` int NOT NULL,
  `companyname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phonenumber` char(10) NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`clientid`, `companyname`, `phonenumber`, `email`) VALUES
(123, 'Guitar Center', '4439980284', 'john.dempsey@gmail.com'),
(144, 'Drift Coffee', '3023349284', 'carolinereagan@yahoo.com'),
(156, 'James Miller', '9103398473', 'jamesmiller123@gmail.com'),
(4899, 'Matt Marino', '3013898743', 'matthewmarino@icloud.com'),
(9133, 'Maximon', '4105130633', 'alextunis7@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Hires`
--

CREATE TABLE `Hires` (
  `projectid` int NOT NULL,
  `subid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Hires`
--

INSERT INTO `Hires` (`projectid`, `subid`) VALUES
(1, 3002),
(1, 4992),
(1, 194),
(1, 2940),
(1, 9889),
(2, 5409),
(2, 194),
(2, 2940),
(2, 9889),
(3, 5409),
(3, 5882),
(4, 4920),
(5, 5882),
(5, 2940),
(6, 5882),
(6, 2940),
(6, 3303);

-- --------------------------------------------------------

--
-- Table structure for table `Manager`
--

CREATE TABLE `Manager` (
  `manid` int NOT NULL,
  `manfirstname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `manlastname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Manager`
--

INSERT INTO `Manager` (`manid`, `manfirstname`, `manlastname`) VALUES
(1, 'Nancy', 'Hope'),
(2, 'Greg', 'Duncan'),
(3, 'Colin', 'Sanders'),
(4, 'Jamie', 'Smith'),
(5, 'Tod', 'Hamden');

-- --------------------------------------------------------

--
-- Table structure for table `Project`
--

CREATE TABLE `Project` (
  `projectid` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `cost` float NOT NULL,
  `revenue` float NOT NULL,
  `description` text NOT NULL,
  `clientid` int NOT NULL,
  `managerid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Project`
--

INSERT INTO `Project` (`projectid`, `name`, `startdate`, `enddate`, `cost`, `revenue`, `description`, `clientid`, `managerid`) VALUES
(1, 'Guitar Center', '2020-12-10', '2021-04-23', 204000, 250000, 'Building a Guitar Center on 13 Chapel Road', 123, 1),
(2, 'Drift Coffee', '2021-01-07', '2021-04-22', 100000, 110000, 'New Drift Coffee Shop on 5 Water Avenue', 144, 2),
(3, 'Miller\'s Deck Renovation', '2021-03-02', '2021-04-15', 41000, 50000, 'Renovating a residential deck at 126 Wesley Lane', 156, 3),
(4, 'Fireplace Installation', '2021-05-03', '2021-05-31', 20000, 32019, 'Installing a new fireplace into Maximon Restaurant', 4899, 4),
(5, 'Marino\'s Roof Repair', '2020-12-24', '2021-02-02', 14250, 23000, 'Re-doing a roof on 13 Rand Lane', 9133, 5),
(6, 'Gazebo Build', '2020-11-12', '2021-02-11', 15000, 25000, 'Making a gazebo for Matt Marino.', 4899, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Subcontractor`
--

CREATE TABLE `Subcontractor` (
  `subid` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Subcontractor`
--

INSERT INTO `Subcontractor` (`subid`, `name`) VALUES
(194, 'Flip\'s Floors'),
(2940, 'Ronny\'s Rooves'),
(3002, 'Mark\'s Metals'),
(3303, 'Wendy\'s Wood'),
(4920, 'Frank\'s Fireplaces'),
(4992, 'Carrol Concrete'),
(5409, 'Walter\'s Wood'),
(5882, 'Danny\'s Demolition'),
(9889, 'Perry\'s Paint');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bid`
--
ALTER TABLE `Bid`
  ADD PRIMARY KEY (`bidid`),
  ADD UNIQUE KEY `bidid` (`bidid`),
  ADD UNIQUE KEY `bidid_2` (`bidid`),
  ADD UNIQUE KEY `bidid_3` (`bidid`),
  ADD KEY `subid` (`subid`),
  ADD KEY `projectid` (`projectid`);

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`clientid`);

--
-- Indexes for table `Hires`
--
ALTER TABLE `Hires`
  ADD KEY `projectid(FK)` (`projectid`),
  ADD KEY `subid` (`subid`);

--
-- Indexes for table `Manager`
--
ALTER TABLE `Manager`
  ADD PRIMARY KEY (`manid`);

--
-- Indexes for table `Project`
--
ALTER TABLE `Project`
  ADD PRIMARY KEY (`projectid`),
  ADD KEY `clientid(FK)` (`clientid`),
  ADD KEY `Project_ibfk_2` (`managerid`);

--
-- Indexes for table `Subcontractor`
--
ALTER TABLE `Subcontractor`
  ADD PRIMARY KEY (`subid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Bid`
--
ALTER TABLE `Bid`
  ADD CONSTRAINT `Bid_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `Subcontractor` (`subid`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Bid_ibfk_2` FOREIGN KEY (`projectid`) REFERENCES `Project` (`projectid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `Hires`
--
ALTER TABLE `Hires`
  ADD CONSTRAINT `Hires_ibfk_1` FOREIGN KEY (`projectid`) REFERENCES `Project` (`projectid`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Hires_ibfk_2` FOREIGN KEY (`subid`) REFERENCES `Subcontractor` (`subid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `Project`
--
ALTER TABLE `Project`
  ADD CONSTRAINT `Project_ibfk_1` FOREIGN KEY (`clientid`) REFERENCES `Client` (`clientid`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Project_ibfk_2` FOREIGN KEY (`managerid`) REFERENCES `Manager` (`manid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
