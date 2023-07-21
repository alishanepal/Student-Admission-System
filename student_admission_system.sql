-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 12:51 PM
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
-- Database: `student_admission_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `fullname`, `username`, `email`, `password`) VALUES
(1, 'jini', 'jini', 'jinisha@gmail.com', '$2y$10$/usDCjahvgPNaMXWPfgCK.1hOY27L4GO5sLTyMMFEcfbWitY0fmRy');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `college_id` int(11) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `establishment_date` date NOT NULL,
  `college_type` varchar(255) NOT NULL,
  `authority_name` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`college_id`, `college_name`, `address`, `phone_number`, `email`, `establishment_date`, `college_type`, `authority_name`, `user_id`) VALUES
(36, 'sagarmatha', 'lalitpur', '123456', 'alishanepal53@gmail.com', '2022-12-12', 'private', 'alisha', NULL),
(40, 'achs', 'lalitpur', '123456', 'alishanepal95@gmail.com', '0555-12-31', 'private', 'alisha', NULL),
(41, 'achs', 'lalitpur', '123456', 'alishanepal95@gmail.com', '0555-12-31', 'private', 'alisha', NULL),
(42, 'achs', 'lalitpur', '123456', 'alishanepal95@gmail.com', '0555-12-31', 'private', 'alisha', NULL),
(43, 'Everest', 'thamel', '55668899', 'everest@gmail.com', '1992-09-19', 'private', 'everest', 4),
(45, 'prime', 'nayabazar', '789456123', 'prime@gmail.com', '1889-01-12', 'private', 'prime', 5);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `course_name`) VALUES
(1, 'ggg', 'bca'),
(2, 'sss', 'csit'),
(4, 'fff', 'bbm'),
(5, 'AAA', 'BBS'),
(6, 'BBB', 'BBA'),
(7, 'CCC', 'BIT'),
(8, 'KKK', 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `course_coll_relation`
--

CREATE TABLE `course_coll_relation` (
  `relation_id` int(11) NOT NULL,
  `begins_at` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `admission_fee` decimal(10,2) DEFAULT NULL,
  `fee_structure` decimal(10,2) DEFAULT NULL,
  `college_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_coll_relation`
--

INSERT INTO `course_coll_relation` (`relation_id`, `begins_at`, `duration`, `admission_fee`, `fee_structure`, `college_id`, `course_id`) VALUES
(6, '7am', '3hrs', 8800.00, 5500.00, 41, 1),
(7, '8am', '5hrs', 75000.00, 5500.00, 41, 2),
(9, '7am', '3hrs', 8800.00, 5500.00, 42, 1),
(10, '8am', '5hrs', 75000.00, 5500.00, 42, 2),
(11, '7am', '3hrs', 8800.00, 999.00, 42, 4),
(12, '7am', '3hrs', 75000.00, 60000.00, 43, 5),
(13, '6am', '4hrs', 95000.00, 50000.00, 43, 6),
(14, '8am', '6hrs', 80000.00, 82000.00, 43, 7),
(18, '7am', '3hrs', 8800.00, 5500.00, 45, 8);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facility_id` int(11) NOT NULL,
  `college_id` int(11) DEFAULT NULL,
  `campus_size` varchar(255) DEFAULT NULL,
  `number_of_classrooms` int(11) DEFAULT NULL,
  `number_of_labs` int(11) DEFAULT NULL,
  `number_of_libraries` int(11) DEFAULT NULL,
  `number_of_hostels` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facility_id`, `college_id`, `campus_size`, `number_of_classrooms`, `number_of_labs`, `number_of_libraries`, `number_of_hostels`) VALUES
(24, 36, '324', 985, 2, 3, 0),
(28, 40, '656', 45, 544, 2, 0),
(29, 41, '656', 45, 544, 2, 0),
(30, 42, '656', 45, 544, 2, 0),
(31, 43, '685', 60, 8, 4, 2),
(33, 45, '656', 45, 544, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_application`
--

CREATE TABLE `student_application` (
  `id` int(11) NOT NULL,
  `college_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `father_address` varchar(255) DEFAULT NULL,
  `father_post_code` varchar(10) DEFAULT NULL,
  `father_telephone` varchar(255) DEFAULT NULL,
  `father_mobile` varchar(255) DEFAULT NULL,
  `father_email` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(255) DEFAULT NULL,
  `mother_address` varchar(255) DEFAULT NULL,
  `mother_post_code` varchar(10) DEFAULT NULL,
  `mother_telephone` varchar(255) DEFAULT NULL,
  `mother_mobile` varchar(255) DEFAULT NULL,
  `mother_email` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `year_of_passing` int(11) DEFAULT NULL,
  `advertisement` varchar(255) DEFAULT NULL,
  `special_needs` enum('yes','no') DEFAULT NULL,
  `special_needs_description` text DEFAULT NULL,
  `benefit_to_UNI` text DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_application`
--

INSERT INTO `student_application` (`id`, `college_id`, `course_id`, `full_name`, `birth_date`, `email`, `phone_number`, `gender`, `father_name`, `father_occupation`, `father_address`, `father_post_code`, `father_telephone`, `father_mobile`, `father_email`, `mother_name`, `mother_occupation`, `mother_address`, `mother_post_code`, `mother_telephone`, `mother_mobile`, `mother_email`, `qualification`, `institute_name`, `year_of_passing`, `advertisement`, `special_needs`, `special_needs_description`, `benefit_to_UNI`, `submission_date`) VALUES
(1, 45, NULL, 'Alisha Nepal', '2022-02-12', 'alishanepal53@gmail.com', '9846648121', 'female', 'allisha nepal', 'bussnessman', 'nayabazar,ktm', '', '', '789654', '', 'alisha nepal', 'housewife', 'nayabazar', '', '', '585869', '', '+2', 'achs', 2029, 'Friend', 'yes', 'jhcxxcbkugtutdcv', 'hgfr4ysxcgvbi', '2023-07-19 02:03:21'),
(2, 45, NULL, 'Alisha Nepal', '2022-02-12', 'alishanepal53@gmail.com', '9846648121', 'female', 'allisha nepal', 'bussnessman', 'nayabazar,ktm', '', '', '789654', '', 'alisha nepal', 'housewife', 'nayabazar', '', '', '585869', '', '+2', 'achs', 2029, 'Friend', 'yes', 'jhcxxcbkugtutdcv', 'hgfr4ysxcgvbi', '2023-07-19 02:08:50'),
(3, 45, NULL, 'jenisha', '2002-02-12', 'jenisha@gmail.com', '9846648121', 'female', 'jenisha', 'bussnessman', 'nayabazar,ktm', '', '', '789654123', '', 'alisha nepal', 'housewife', 'nayabazar', '', '', '4569851', '', '+2', 'achs', 2018, 'Friend', 'yes', 'kjhcdxcvuyibjn', ';uyftdrcvibjlnk', '2023-07-19 03:16:28'),
(4, 45, NULL, 'jenisha', '2002-02-12', 'jenisha@gmail.com', '9846648121', 'female', 'jenisha', 'bussnessman', 'nayabazar,ktm', '', '', '789654123', '', 'alisha nepal', 'housewife', 'nayabazar', '', '', '4569851', '', '+2', 'achs', 2018, 'Friend', 'yes', 'kjhcdxcvuyibjn', ';uyftdrcvibjlnk', '2023-07-19 03:25:06'),
(5, 45, NULL, 'jenisha', '2002-02-12', 'jenisha@gmail.com', '9846648121', 'female', 'jenisha', 'bussnessman', 'nayabazar,ktm', '', '', '789654123', '', 'alisha nepal', 'housewife', 'nayabazar', '', '', '4569851', '', '+2', 'achs', 2018, 'Friend', 'yes', 'kjhcdxcvuyibjn', ';uyftdrcvibjlnk', '2023-07-19 03:25:45'),
(6, 43, NULL, 'rushab', '2022-02-12', 'rushab@gmail.com', '9846648121', 'female', 'rushab', 'bussnessman', 'kalanki', '', '', '4569875', '', 'rushab', 'housewife', 'nayabazar', '', '', '657896412', '', '+2', 'achs', 78956, 'Advertisement, Friend, Education Fair', 'yes', 'hello how are you', 'asnhvsefbe', '2023-07-19 03:31:47'),
(7, 43, 5, 'ashwin neplal', '2002-02-12', 'ashu@gmail.com', '658945', 'male', 'allisha nepal', 'bussnessman', 'nayabazar,ktm', '', '', '65489451', '', 'alisha nepal', 'housewife', 'nayabazar', '', '', '214641', '', '+2', 'achs', 326451, 'Friend, Education Fair, Internet', 'no', '', 'jhvgcg', '2023-07-19 03:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `fullname`, `username`, `email`, `password`, `usertype`) VALUES
(1, 'alishanepal', 'alisha', 'alishanepal53@gmail.com', '$2y$10$ce/UruwZXZhPT2X6ozf3KufG4JIWl6F9t2eSLLQqdCCf31jK02Y0G', NULL),
(2, 'azushakya', 'azu', 'azu@gmail.com', '$2y$10$zxwP9yYNJ3kADO.MviZZ6ODSUshCLxDKIr4Mxlkgf7dhBUfxOKcOy', NULL),
(3, 'sumanmaharjan', 'suman', 'suman@gmail.com', '$2y$10$ZHGJ0r6U8S3YdniTf08UkuqiaZy8bO6OJU0a1d94rLJfJQCxg2ZEy', 'Student'),
(4, 'nalinakunwar', 'nalina', 'nalina@gmail.com', '$2y$10$N5QwnAoGkTcVFpPxS9uqSercap3WyOLV/qVYipusY8/NyJzpQrGx2', 'College'),
(5, 'prime college', 'prime', 'prime@gmailcom', '$2y$10$YSQNPU1GVr4.DeJEfwBUjOtvdG1dR9K185tbcGrefi34.ElBTX2Wy', 'College'),
(6, 'krishna ', 'krishna', 'krishna@gmail.com', '$2y$10$sKX4B9Nzs8QT7vl5/m1uAul8dkRVqMMv2xDRpWCyVo2hF.Hdt5XR2', 'Student'),
(7, 'jenisha', 'jensha', 'jenisha@gmail.com', '$2y$10$hRqiQFuli7jwiQlcdJUqnek2IHQl4CvD8uc86L8pasHsRUGPE9XLm', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`college_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_coll_relation`
--
ALTER TABLE `course_coll_relation`
  ADD PRIMARY KEY (`relation_id`),
  ADD KEY `college_id` (`college_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facility_id`),
  ADD KEY `college_id` (`college_id`);

--
-- Indexes for table `student_application`
--
ALTER TABLE `student_application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PersonOrder` (`college_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_coll_relation`
--
ALTER TABLE `course_coll_relation`
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `student_application`
--
ALTER TABLE `student_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `colleges`
--
ALTER TABLE `colleges`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`);

--
-- Constraints for table `course_coll_relation`
--
ALTER TABLE `course_coll_relation`
  ADD CONSTRAINT `course_coll_relation_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`),
  ADD CONSTRAINT `course_coll_relation_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`);

--
-- Constraints for table `student_application`
--
ALTER TABLE `student_application`
  ADD CONSTRAINT `FK_PersonOrder` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`),
  ADD CONSTRAINT `student_application_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
