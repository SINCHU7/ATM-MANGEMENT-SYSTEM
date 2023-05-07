-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2022 at 06:25 AM
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
-- Database: `atm`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `transaction_display`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `transaction_display` ()  NO SQL
select * from transaction where transaction_date not BETWEEN 2022-10-31 and 2022-08-30 GROUP by transaction_id,transaction_type,user_id,transaction_status,transaction_date$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `Account_number` bigint(15) NOT NULL AUTO_INCREMENT,
  `Balance` int(50) NOT NULL,
  `Account_type` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`Account_number`,`user_id`),
  KEY `user_id` (`user_id`),
  KEY `Balance` (`Balance`)
) ENGINE=InnoDB AUTO_INCREMENT=1010 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Account_number`, `Balance`, `Account_type`, `user_id`) VALUES
(100000000000, 72309, 'savings', 100),
(100000000001, 5000, 'current', 101),
(100000000002, 19200, 'savings', 102),
(100000000003, 12200, 'current', 103),
(100000000004, 103200, 'savings', 104),
(100000000005, 9532, 'savings', 105),
(100000000006, 4000, 'savings', 106),
(100000000007, 47042, 'savings', 107),
(100000000008, 52200, 'current', 108),
(100000000009, 58200, 'savings', 109);

--
-- Triggers `account`
--
DROP TRIGGER IF EXISTS `logs`;
DELIMITER $$
CREATE TRIGGER `logs` AFTER UPDATE ON `account` FOR EACH ROW insert into logs values(null, new.user_id,new.balance,now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(12) NOT NULL,
  `admin_pin` int(12) NOT NULL,
  `atm_id` int(12) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `atm_id` (`atm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_pin`, `atm_id`) VALUES
(500, 1222, 120),
(501, 2244, 121),
(502, 5566, 122),
(503, 7890, 123),
(504, 9810, 124),
(505, 1999, 125),
(506, 1887, 126),
(507, 4596, 127),
(508, 8988, 128),
(509, 9999, 129);

-- --------------------------------------------------------

--
-- Table structure for table `atm`
--

DROP TABLE IF EXISTS `atm`;
CREATE TABLE IF NOT EXISTS `atm` (
  `atm_id` int(12) NOT NULL,
  `atm_location` varchar(255) NOT NULL,
  `available_cash` int(12) NOT NULL,
  PRIMARY KEY (`atm_id`),
  KEY `atm_id` (`atm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atm`
--

INSERT INTO `atm` (`atm_id`, `atm_location`, `available_cash`) VALUES
(120, 'Channasandra', 105000),
(121, 'RR Nagar', 150000),
(122, 'Whitefield', 70000),
(123, 'Bellenduru', 20000),
(124, 'Uttrahalli', 80000),
(125, 'Marathahalli', 80000),
(126, 'Indranagara', 70000),
(127, 'Jayanagar', 100000),
(128, 'Kumarswamy Layout', 100500),
(129, 'K R Puram', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `Bank_name` varchar(255) NOT NULL,
  `Bank_id` int(12) NOT NULL,
  `Branch_Location` varchar(255) NOT NULL,
  `account` bigint(15) NOT NULL,
  PRIMARY KEY (`Bank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`Bank_name`, `Bank_id`, `Branch_Location`, `account`) VALUES
('SKV Bank', 1, 'Uttrahalli', 100000000000),
('Canara Bank', 2, 'Kumarswamy Layout', 100000000001),
('Syndicate Bank', 3, 'JP Nagar', 100000000002),
('State Bank of India', 4, 'Jayanagar', 100000000003),
('Bank of Baroda', 5, 'Basavanagudi', 100000000004),
('Bank of India', 6, 'Gandhi Bazar', 100000000005),
('Indian bank', 7, 'Chikkalsandra', 100000000006),
('Punjab National Bnak', 8, 'NR Colony', 100000000007);

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE IF NOT EXISTS `card` (
  `card_no` int(12) NOT NULL,
  `card_pin` int(12) NOT NULL,
  `balance` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  PRIMARY KEY (`card_no`),
  KEY `balance` (`balance`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_no`, `card_pin`, `balance`, `user_id`) VALUES
(123456, 9001, 9532, 105),
(123965, 9120, 72309, 109),
(145672, 1837, 72309, 100),
(312315, 4142, 12200, 103),
(423415, 1312, 19200, 102),
(456789, 1002, 9532, 106),
(512345, 1231, 5000, 101),
(765345, 4810, 52200, 108),
(914321, 8198, 103200, 104),
(987651, 1213, 47042, 107);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) NOT NULL,
  `balance` int(20) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `balance`, `created_date`) VALUES
(1, 100, 60400, '2022-12-14 10:26:44'),
(2, 100, 60200, '2022-12-14 10:28:26'),
(3, 100, 60000, '2022-12-14 10:59:18'),
(4, 100, 59000, '2022-12-14 13:40:20'),
(5, 100, 58200, '2022-12-14 13:45:22'),
(6, 101, 700, '2022-12-14 13:47:01'),
(7, 101, 100, '2022-12-14 13:47:23'),
(8, 101, 10000, '2022-12-14 13:48:02'),
(9, 101, 9900, '2022-12-14 13:50:13'),
(10, 101, 10400, '2022-12-14 13:53:26'),
(11, 100, 57700, '2022-12-14 13:53:26'),
(12, 101, 10500, '2022-12-14 13:56:40'),
(13, 100, 57600, '2022-12-14 13:56:40'),
(14, 100, 57400, '2022-12-14 14:48:47'),
(15, 101, 10600, '2022-12-14 14:49:52'),
(16, 100, 57300, '2022-12-14 14:49:53'),
(17, 101, 10700, '2022-12-14 14:50:22'),
(18, 100, 57200, '2022-12-14 14:50:22'),
(19, 100, 56200, '2022-12-29 11:05:36'),
(20, 101, 10800, '2023-01-03 06:43:14'),
(21, 100, 56100, '2023-01-03 06:43:14'),
(22, 100, 55100, '2023-01-03 11:10:42'),
(23, 101, 10900, '2023-01-03 11:13:19'),
(24, 100, 55000, '2023-01-03 11:13:20'),
(25, 105, 25000, '2023-01-05 15:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_date` date NOT NULL,
  `transaction_id` int(12) NOT NULL AUTO_INCREMENT,
  `transaction_status` varchar(255) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `user_id` int(12) NOT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `user_id` (`user_id`),
  'amount' float,
  'remark' VARCHAR2(50)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_date`, `transaction_id`, `transaction_status`, `transaction_type`, `user_id`, 'amount', 'remark') VALUES
('2022-12-10', 1, 'Successful', 'savings', 108, 1000, 'WITHDRAW'),
('2022-12-14', 2, 'Successful', 'Savings', 100, 2500, 'DEPOSIT'),
('2022-10-17', 3, 'Successful', 'current', 101, 3500, 'WITHDRAW'),
('2022-10-18', 4, 'Failed', 'savings', 102, 1000, 'TRANSFER'),
('2022-09-14', 5, 'Successful', 'current', 103, 800, 'WITHDRAW'),
('2022-10-18', 6, 'Failed', 'Savings', 104, 200, 'TRANSFER'),
('2022-12-13', 7, 'Successful', 'savings', 105, 1000, 'DEPOSIT'),
('2022-10-28', 8, 'Failed', 'current', 106, 250, 'WITHDRAW'),
('2022-12-10', 9, 'Successful', 'savings', 107, 800, 'DEPOSIT');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(12) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` int(12) NOT NULL,
  `DOB` date NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `address`, `contact_no`, `DOB`) VALUES
(100, 'SINCHANA', 'SK', 'BANGALORE', 123456789, '2000-01-10'),
(101, 'VARSHINI', 'JAKATI', 'BANGALORE',23456789 , '1988-03-02'),
(102, 'RADHA', 'R', 'MYSORE', 547653252, '1985-02-14'),
(103, 'KRISHNA', 'K', 'TUMKUR', 797437902, '1991-03-08'),
(104, 'RUKMINI', 'R', 'DHARWAD', 786437902, '1994-05-04'),
(105, 'BHARGAVI', 'B', 'VRIDAVAN', 876422341, '1999-06-13'),
(106, 'SRINIVAS', 'S', 'BARSANA', 786479823, '1989-07-09'),
(107, 'GOPA', 'DEVI', 'GOKUL', 67753987, '1997-11-11'),
(108, 'GOPAL', 'G', 'GOVARDHAN', 864709078, '1997-08-12'),
(109, 'BALRAM', 'B', 'BANGALORE', 787548970, '1977-09-01');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`atm_id`) REFERENCES `atm` (`atm_id`);

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`balance`) REFERENCES `account` (`Balance`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `card_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `account` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
