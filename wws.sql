-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2024 at 03:56 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wws`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` bigint NOT NULL,
  `password` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `contact_number`, `password`, `email`) VALUES
(1, 'juhil mistry', 7069963889, 'juhil@123', 'juhilmistry05@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `assign_project`
--

DROP TABLE IF EXISTS `assign_project`;
CREATE TABLE IF NOT EXISTS `assign_project` (
  `user_id` int NOT NULL,
  `project_id` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`,`project_id`),
  KEY `assign_fk_project` (`project_id`)
);

--
-- Dumping data for table `assign_project`
--

INSERT INTO `assign_project` (`user_id`, `project_id`, `status`) VALUES
(18, 101, 0),
(18, 102, 0),
(18, 105, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bid_detail`
--

DROP TABLE IF EXISTS `bid_detail`;
CREATE TABLE IF NOT EXISTS `bid_detail` (
  `bid_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `project_id` int NOT NULL,
  `bid_date` date NOT NULL,
  `bid_total` int NOT NULL,
  `days` int NOT NULL,
  PRIMARY KEY (`bid_id`),
  KEY `user_fk_bid` (`user_id`),
  KEY `pro_fk_bid` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bid_detail`
--

INSERT INTO `bid_detail` (`bid_id`, `user_id`, `project_id`, `bid_date`, `bid_total`, `days`) VALUES
(6, 3, 101, '0000-00-00', 200, 23),
(7, 18, 102, '2023-11-21', 200, 14),
(8, 18, 101, '2023-11-21', 1220, 14),
(9, 3, 101, '2023-11-21', 2200, 10),
(10, 3, 101, '2024-02-15', 1200, 20),
(11, 3, 102, '2024-02-15', 200, 2),
(12, 3, 101, '2024-02-15', 200, 2),
(13, 3, 101, '2024-02-15', 200, 20),
(14, 3, 101, '2024-02-18', 22001, 20),
(15, 2, 105, '2024-02-18', 1100, 10),
(16, 18, 105, '2024-02-18', 100, 10),
(17, 18, 102, '2024-02-19', 1211, 10);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'web developer'),
(2, 'writing & content');

-- --------------------------------------------------------

--
-- Table structure for table `category_user`
--

DROP TABLE IF EXISTS `category_user`;
CREATE TABLE IF NOT EXISTS `category_user` (
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`category_id`,`user_id`),
  KEY `cate_fk_cateuser` (`category_id`),
  KEY `user_fk_cateuser` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_user`
--

INSERT INTO `category_user` (`user_id`, `category_id`) VALUES
(18, 1),
(19, 1),
(26, 1),
(18, 2),
(19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int NOT NULL AUTO_INCREMENT,
  `city_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `state_id` int NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `state_fk` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `state_id`) VALUES
(5, 'Hyderabad', 1),
(6, 'Itanagar', 2),
(7, 'Dispur', 3),
(8, 'Patna', 4),
(9, 'Raipur', 5),
(10, 'Panaji', 6),
(11, 'Gandhinagar', 7),
(12, 'Chandigarh', 8),
(13, 'Shimla', 9),
(14, 'Ranchi', 10),
(15, 'Bengaluru', 11),
(16, 'Thiruvananthapuram', 12),
(17, 'Bhopal', 13),
(18, 'Mumbai', 14),
(19, 'Imphal', 15),
(20, 'Shillong', 16),
(21, 'Aizawl', 17),
(22, 'Kohima', 18),
(23, 'Bhubaneswar', 19),
(24, 'Chandigarh', 20),
(25, 'Jaipur', 21),
(26, 'Gangtok', 22),
(27, 'Chennai', 23),
(28, 'Hyderabad', 24),
(29, 'Agartala', 25),
(30, 'Lucknow', 26),
(31, 'Dehradun', 27),
(32, 'Kolkata', 28),
(33, 'Calgary', 29),
(34, 'Edmonton', 29),
(35, 'Vancouver', 30),
(36, 'Victoria', 30),
(38, 'Winnipeg', 31),
(39, 'Fredericton', 32),
(40, 'Saint John', 32),
(41, 'St. John\'s', 33),
(42, 'Halifax', 34),
(43, 'Dartmouth', 34),
(44, 'Toronto', 35),
(45, 'Ottawa', 35),
(46, 'Montreal', 37),
(47, 'Quebec City', 37),
(48, 'Regina', 38),
(49, 'Saskatoon', 38),
(50, 'Yellowknife', 39),
(51, 'Whitehorse', 40),
(52, 'Iqaluit', 41);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int NOT NULL AUTO_INCREMENT,
  `country_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'india'),
(2, 'canada');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_detail`
--

DROP TABLE IF EXISTS `feedback_detail`;
CREATE TABLE IF NOT EXISTS `feedback_detail` (
  `feedback_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `feedback_detail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `feedback_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`feedback_id`),
  KEY `user_fk_feed` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_detail`
--

INSERT INTO `feedback_detail` (`feedback_id`, `user_id`, `feedback_detail`, `feedback_date`) VALUES
(2, 2, 'good for side income', '2023-11-21 20:43:06'),
(8, 18, 'good', '2024-02-20 12:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int NOT NULL AUTO_INCREMENT,
  `language_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `language_name`) VALUES
(1, 'html'),
(2, 'java'),
(3, 'php');

-- --------------------------------------------------------

--
-- Table structure for table `language_detail`
--

DROP TABLE IF EXISTS `language_detail`;
CREATE TABLE IF NOT EXISTS `language_detail` (
  `project_id` int NOT NULL,
  `language_id` int NOT NULL,
  PRIMARY KEY (`language_id`,`project_id`),
  KEY `proj_fk_landetail` (`project_id`),
  KEY `lan_fk_landetail` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language_detail`
--

INSERT INTO `language_detail` (`project_id`, `language_id`) VALUES
(101, 1),
(101, 2),
(101, 3),
(102, 3),
(105, 1),
(105, 2),
(105, 3),
(106, 2),
(107, 1),
(107, 2),
(107, 3);

-- --------------------------------------------------------

--
-- Table structure for table `language_user_detail`
--

DROP TABLE IF EXISTS `language_user_detail`;
CREATE TABLE IF NOT EXISTS `language_user_detail` (
  `user_id` int NOT NULL,
  `language_id` int NOT NULL,
  PRIMARY KEY (`language_id`,`user_id`),
  KEY `user_fk_lanuser` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language_user_detail`
--

INSERT INTO `language_user_detail` (`user_id`, `language_id`) VALUES
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 2),
(19, 3);

-- --------------------------------------------------------

--
-- Table structure for table `payment_detail`
--

DROP TABLE IF EXISTS `payment_detail`;
CREATE TABLE IF NOT EXISTS `payment_detail` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `project_id` int NOT NULL,
  `payment_mode` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_date` date NOT NULL,
  `total_payment` int NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `user_fk_pay` (`user_id`),
  KEY `pro_fk_pay` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int NOT NULL AUTO_INCREMENT,
  `project_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` int NOT NULL,
  `min_bid` int NOT NULL,
  `user_id` int NOT NULL,
  `upload_date` date NOT NULL,
  `due_date` date NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `cat_fk_proj` (`category_id`),
  KEY `user_fk_proj` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `category_id`, `min_bid`, `user_id`, `upload_date`, `due_date`, `description`) VALUES
(101, 'ecommerce', 1, 122, 26, '2024-02-01', '2024-02-29', 'ecomm'),
(102, 'xl12', 2, 1212, 26, '2024-02-09', '2024-02-09', 'nothing'),
(105, 'new', 2, 1200, 26, '2024-02-18', '2003-11-29', 'nothing'),
(106, 'new12', 1, 120, 32, '2024-02-19', '2024-11-29', 'nothing'),
(107, 'new1234', 1, 120, 32, '2024-02-19', '2003-11-29', 'nothing'),
(108, '121', 2, 1212, 32, '2024-02-19', '1212-12-12', '1212');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int NOT NULL AUTO_INCREMENT,
  `state_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country_id` int NOT NULL,
  PRIMARY KEY (`state_id`),
  KEY `country_fk` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`, `country_id`) VALUES
(1, 'Andhra Pradesh', 1),
(2, 'Arunachal Pradesh', 1),
(3, 'Assam', 1),
(4, 'Bihar', 1),
(5, 'Chhattisgarh', 1),
(6, 'Goa', 1),
(7, 'Gujarat', 1),
(8, 'Haryana', 1),
(9, 'Himachal Pradesh', 1),
(10, 'Jharkhand', 1),
(11, 'Karnataka', 1),
(12, 'Kerala', 1),
(13, 'Madhya Pradesh', 1),
(14, 'Maharashtra', 1),
(15, 'Manipur', 1),
(16, 'Meghalaya', 1),
(17, 'Mizoram', 1),
(18, 'Nagaland', 1),
(19, 'Odisha', 1),
(20, 'Punjab', 1),
(21, 'Rajasthan', 1),
(22, 'Sikkim', 1),
(23, 'Tamil Nadu', 1),
(24, 'Telangana', 1),
(25, 'Tripura', 1),
(26, 'Uttar Pradesh', 1),
(27, 'Uttarakhand', 1),
(28, 'West Bengal', 1),
(29, 'Alberta', 2),
(30, 'British Columbia', 2),
(31, 'Manitoba', 2),
(32, 'New Brunswick', 2),
(33, 'Newfoundland and Labrador', 2),
(34, 'Nova Scotia', 2),
(35, 'Ontario', 2),
(36, 'Prince Edward Island', 2),
(37, 'Quebec', 2),
(38, 'Saskatchewan', 2),
(39, 'Northwest Territories', 2),
(40, 'Nunavut', 2),
(41, 'Yukon', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` bigint NOT NULL,
  `user_address` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usertype` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date NOT NULL,
  `security_que` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `security_ans` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city_id` int NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_uq` (`email`),
  KEY `city_fk` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `email`, `gender`, `contact_number`, `user_address`, `usertype`, `dob`, `security_que`, `security_ans`, `city_id`, `is_active`) VALUES
(2, 'vyom chauhan', 'vyom@123', 'vyomchauhan@gmail.com', 'male', 9624621219, 'sec3,gandhinagar', 'freelancer', '0000-00-00', 'hello', 'hello', 11, 1),
(3, 'dev', 'dev@123', 'devpanchal@gmail.com', 'male', 7069963889, 'maharashtra', 'freelancer', '2003-11-29', 'fav color ?', 'black', 18, 1),
(18, 'het_patel', 'het@123', 'hetpatel@gmail.com', 'male', 9638711497, 'ranip,ahemdabad', 'freelancer', '2003-02-19', 'fav person?', 'dj', 11, 1),
(19, 'freelancer', 'vyom123', 'vyomchauhan71@gmail.com', 'male', 9033897715, '74,satadhar', 'freelancer', '2023-12-28', 'fav color?', 'red', 9, 1),
(26, 'diksha_mistry', 'diksha@123', 'dikshamistry@gmail.com', 'female', 7069963884, 'aapdu ghar', 'company', '2003-10-10', 'fav person?', 'juhil', 51, 1),
(30, '', '123456', 'juhilmistry05@gmail.com', 'male', 0, '', 'company', '2003-11-29', 'What is Your Pet Name ?', 'no', 21, 1),
(32, '', 'juhil@123', 'dikshamistry05@gmail.com', 'female', 7069963884, 'ahemdbabad', 'company', '2003-11-29', 'What is Your Pet Name ?', 'kuki', 22, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_project`
--
ALTER TABLE `assign_project`
  ADD CONSTRAINT `assign_fk_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `assign_fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `bid_detail`
--
ALTER TABLE `bid_detail`
  ADD CONSTRAINT `pro_fk_bid` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `user_fk_bid` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `category_user`
--
ALTER TABLE `category_user`
  ADD CONSTRAINT `cate_fk_cateuser` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `user_fk_cateuser` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `state_fk` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`);

--
-- Constraints for table `feedback_detail`
--
ALTER TABLE `feedback_detail`
  ADD CONSTRAINT `user_fk_feed` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `language_detail`
--
ALTER TABLE `language_detail`
  ADD CONSTRAINT `lan_fk_landetail` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`),
  ADD CONSTRAINT `proj_fk_landetail` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `language_user_detail`
--
ALTER TABLE `language_user_detail`
  ADD CONSTRAINT `lan_fk_lanuser` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_fk_lanuser` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `payment_detail`
--
ALTER TABLE `payment_detail`
  ADD CONSTRAINT `pro_fk_pay` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `user_fk_pay` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `cat_fk_proj` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `user_fk_proj` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `country_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `city_fk` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
