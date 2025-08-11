-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 06:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `contact_number`, `password`, `email`) VALUES
(2, 'juhil', 9824057123, 'juhil@123', 'juhilmistry05@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `assign_project`
--

CREATE TABLE `assign_project` (
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bid_detail`
--

CREATE TABLE `bid_detail` (
  `bid_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `bid_date` date NOT NULL,
  `bid_total` int(11) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bid_detail`
--

INSERT INTO `bid_detail` (`bid_id`, `user_id`, `project_id`, `bid_date`, `bid_total`, `days`) VALUES
(20, 33, 109, '2024-03-10', 4000, 15),
(21, 33, 111, '2024-03-12', 1500, 10);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'web developer'),
(4, 'ios app development'),
(6, 'android app development '),
(8, 'web desgin'),
(10, 'full stack development');

-- --------------------------------------------------------

--
-- Table structure for table `category_user`
--

CREATE TABLE `category_user` (
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_user`
--

INSERT INTO `category_user` (`user_id`, `category_id`) VALUES
(36, 8),
(36, 10);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `feedback_detail` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback_detail` varchar(255) NOT NULL,
  `feedback_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback_detail`
--

INSERT INTO `feedback_detail` (`feedback_id`, `user_id`, `feedback_detail`, `feedback_date`) VALUES
(9, 33, 'nice website for freelancing', '2024-03-10 02:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `language_name`) VALUES
(1, 'html'),
(2, 'java'),
(3, 'php'),
(4, 'python'),
(5, 'rust'),
(6, 'react js'),
(7, 'node js'),
(8, 'flutter'),
(9, 'ruby'),
(10, 'go'),
(11, 'javascript'),
(12, 'kotlin'),
(13, 'swift'),
(14, 'typescript'),
(15, 'c++'),
(16, 'vue.js'),
(17, 'scala');

-- --------------------------------------------------------

--
-- Table structure for table `language_detail`
--

CREATE TABLE `language_detail` (
  `project_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language_detail`
--

INSERT INTO `language_detail` (`project_id`, `language_id`) VALUES
(111, 1),
(111, 6),
(112, 8),
(111, 11),
(109, 13);

-- --------------------------------------------------------

--
-- Table structure for table `language_user_detail`
--

CREATE TABLE `language_user_detail` (
  `user_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language_user_detail`
--

INSERT INTO `language_user_detail` (`user_id`, `language_id`) VALUES
(33, 1),
(33, 2),
(36, 2),
(33, 3),
(36, 4),
(36, 5),
(36, 8),
(36, 17);

-- --------------------------------------------------------

--
-- Table structure for table `payment_detail`
--

CREATE TABLE `payment_detail` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `payment_mode` varchar(30) NOT NULL,
  `payment_date` date NOT NULL,
  `total_payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL,
  `min_bid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upload_date` date NOT NULL,
  `due_date` date NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `category_id`, `min_bid`, `user_id`, `upload_date`, `due_date`, `description`) VALUES
(109, 'ios develop', 4, 5000, 35, '2024-03-10', '2024-03-24', 'you have to develop an app like flappy bird.'),
(111, 'desgin web page', 8, 1580, 35, '2024-03-10', '2024-03-20', 'design page for e-commerce site'),
(112, 'app develop', 6, 2100, 37, '2024-03-10', '2024-03-29', 'develop the app like subway surf');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `user_address` varchar(225) NOT NULL,
  `usertype` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `security_que` varchar(30) NOT NULL,
  `security_ans` varchar(30) NOT NULL,
  `city_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `email`, `gender`, `contact_number`, `user_address`, `usertype`, `dob`, `security_que`, `security_ans`, `city_id`, `is_active`) VALUES
(33, 'vyom', 'vyom@123', 'vyomchauhan71@gmail.com', 'male', 9033897728, 'ghatlodia', 'freelancer', '2004-07-15', 'What is Your Pet Name ?', 'kuku', 6, 1),
(35, 'krish4719', 'krish@123', 'krishprajapati91@gmail.com', 'male', 9033897728, 'adalaj', 'company', '2003-08-26', 'What is Your Fav. Colour ?', 'black', 8, 1),
(36, 'dev', 'dev@123', 'devpanchal15@gmail.com', 'male', 9824097726, 'sola', 'freelancer', '2004-10-26', 'What is Your Fav. Food ?', 'burger', 9, 1),
(37, 'aryan', 'aryan@123', 'aryanrami21@gmail.com', 'male', 9824097728, 'chaganpur', 'company', '2004-06-24', 'What is Your Pet Name ?', 'dudu', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assign_project`
--
ALTER TABLE `assign_project`
  ADD PRIMARY KEY (`user_id`,`project_id`),
  ADD KEY `assign_fk_project` (`project_id`);

--
-- Indexes for table `bid_detail`
--
ALTER TABLE `bid_detail`
  ADD PRIMARY KEY (`bid_id`),
  ADD KEY `user_fk_bid` (`user_id`),
  ADD KEY `pro_fk_bid` (`project_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `category_user`
--
ALTER TABLE `category_user`
  ADD PRIMARY KEY (`category_id`,`user_id`),
  ADD KEY `cate_fk_cateuser` (`category_id`),
  ADD KEY `user_fk_cateuser` (`user_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_fk` (`state_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `feedback_detail`
--
ALTER TABLE `feedback_detail`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_fk_feed` (`user_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `language_detail`
--
ALTER TABLE `language_detail`
  ADD PRIMARY KEY (`language_id`,`project_id`),
  ADD KEY `proj_fk_landetail` (`project_id`),
  ADD KEY `lan_fk_landetail` (`language_id`);

--
-- Indexes for table `language_user_detail`
--
ALTER TABLE `language_user_detail`
  ADD PRIMARY KEY (`language_id`,`user_id`),
  ADD KEY `user_fk_lanuser` (`user_id`);

--
-- Indexes for table `payment_detail`
--
ALTER TABLE `payment_detail`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_fk_pay` (`user_id`),
  ADD KEY `pro_fk_pay` (`project_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `cat_fk_proj` (`category_id`),
  ADD KEY `user_fk_proj` (`user_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`),
  ADD KEY `country_fk` (`country_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_uq` (`email`),
  ADD KEY `city_fk` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bid_detail`
--
ALTER TABLE `bid_detail`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback_detail`
--
ALTER TABLE `feedback_detail`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment_detail`
--
ALTER TABLE `payment_detail`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_project`
--
ALTER TABLE `assign_project`
  ADD CONSTRAINT `assign_fk_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `assign_fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `bid_detail`
--
ALTER TABLE `bid_detail`
  ADD CONSTRAINT `pro_fk_bid` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `user_fk_bid` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `category_user`
--
ALTER TABLE `category_user`
  ADD CONSTRAINT `cate_fk_cateuser` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `user_fk_cateuser` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `state_fk` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`);

--
-- Constraints for table `feedback_detail`
--
ALTER TABLE `feedback_detail`
  ADD CONSTRAINT `user_fk_feed` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

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
  ADD CONSTRAINT `lan_fk_lanuser` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`),
  ADD CONSTRAINT `user_fk_lanuser` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `payment_detail`
--
ALTER TABLE `payment_detail`
  ADD CONSTRAINT `pro_fk_pay` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `user_fk_pay` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `cat_fk_proj` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `user_fk_proj` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `country_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `city_fk` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
