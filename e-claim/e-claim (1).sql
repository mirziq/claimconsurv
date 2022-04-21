-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2020 at 07:44 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-claim`
--

-- --------------------------------------------------------

--
-- Table structure for table `claimreports`
--

DROP TABLE IF EXISTS `claimreports`;
CREATE TABLE IF NOT EXISTS `claimreports` (
  `reportid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `advance` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `company` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`reportid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claimreports`
--

INSERT INTO `claimreports` (`reportid`, `username`, `advance`, `date`, `company`, `status`, `reason`, `userid`) VALUES
(58, 'kel', '123', '2020-05-28', 'Dyna Segmen Sdn Bhd', 'APPROVED', 'bad', 1),
(59, 'kel', '200', '2020-05-28', 'Consurv Technic (M) Sdn Bhd', 'APPROVED', 'etc', 1),
(60, 'kel', '100', '2020-05-28', 'Dyna O&M Sdn Bhd', 'PENDING FROM BOSS', 'NULL', 1),
(61, 'kel', '100', '2020-05-28', 'Dyna O&M Sdn Bhd', 'APPROVED', 'again', 1);

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

DROP TABLE IF EXISTS `claims`;
CREATE TABLE IF NOT EXISTS `claims` (
  `claimid` int(11) NOT NULL AUTO_INCREMENT,
  `particulars` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `projectno` varchar(50) NOT NULL,
  `priceperunit` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `totalprice` varchar(255) NOT NULL,
  `filetype` varchar(5000) NOT NULL,
  `filedata` varchar(255) NOT NULL,
  `reportid` int(11) NOT NULL,
  PRIMARY KEY (`claimid`),
  KEY `reportid` (`reportid`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`claimid`, `particulars`, `remarks`, `projectno`, `priceperunit`, `quantity`, `totalprice`, `filetype`, `filedata`, `reportid`) VALUES
(103, 'Monthly', 'forth', 'NULL', '10', '1', '10', 'file/1590648400151-add-user-64x64.png', 'image/png', 58),
(104, 'Offshore', 'second', 'NULL', '12', '1', '12', 'file/1590648400154-571465.png', 'image/png', 58),
(106, 'Profit Sharing', 'try', 'NULL', '10', '1', '10', 'file/1590652455319-add-user-128x128.png', 'image/png', 60),
(107, 'Offshore', 'anything', 'NULL', '10', '2', '20', 'file/1590654574012-571465.png', 'image/png', 61),
(108, 'Monthly', 'second', '1234', '20', '3', '60', 'file/1590654574019-add-user-64x64.png', 'image/png', 61),
(110, 'Monthly', 'second', '5678', '1', '1', '1', 'file/1590656901075-571465.png', 'image/png', 59),
(112, 'Profit Sharing', 'work', 'NULL', '1', '1', '1', 'file/1590657505996-blue.jpg', 'image/jpeg', 59),
(113, 'Monthly', 'second', 'NULL', '1', '1', '12', 'file/1590717793824-A.jpg', 'image/jpeg', 59);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `role`) VALUES
(1, 'kel', '123', 'Staff'),
(2, 'ada', '123', 'Finance'),
(3, 'boss', '123', 'Boss'),
(4, 'jihan', '123', 'Fmanage'),
(5, 'vin', '456', 'Staff');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `claimreports`
--
ALTER TABLE `claimreports`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `claims`
--
ALTER TABLE `claims`
  ADD CONSTRAINT `reportid` FOREIGN KEY (`reportid`) REFERENCES `claimreports` (`reportid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
