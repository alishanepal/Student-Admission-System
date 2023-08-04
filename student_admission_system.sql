-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 05:57 PM
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
(2, 'jinisha', 'jini', 'jini@gmail.com', '$2y$10$18DeI0/P81v4fPkNYvckGuRh3zixLbf2IO0YLFBZce3KS0e1Pwfb6'),
(3, 'hanabi ha', 'hanabi', 'hanabi@gmail.com', '$2y$10$.Pg9ZlBqA0IAl2rgJlHcjel6VWc0n97MgmUZ/OOJ5neARf.HZpBYu');

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
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`college_id`, `college_name`, `address`, `phone_number`, `email`, `establishment_date`, `college_type`, `authority_name`, `user_id`, `status`) VALUES
(41, 'achs', 'lalitpur', '123456', 'alishanepal95@gmail.com', '0555-12-31', 'private', 'alisha', NULL, 'pending'),
(42, 'achs', 'lalitpur', '123456', 'alishanepal95@gmail.com', '0555-12-31', 'private', 'alisha', NULL, 'pending'),
(45, 'prime', 'nayabazar', '789456123', 'prime@gmail.com', '1889-01-12', 'private', 'prime', 5, 'pending'),
(51, 'nalina', 'nallichowk', '123456', 'alishanepal53@gmail.com', '2002-12-31', 'private', 'DAV', 4, 'pending');

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
(5, 'AAA', 'BBS'),
(14, 'UUU', 'bca');

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
(26, '7am', '3hrs', 75000.00, 5500.00, 51, 14),
(27, '8am', '5hrs', 8800.00, 5500.00, 51, 5);

-- --------------------------------------------------------

--
-- Table structure for table `educational_background`
--

CREATE TABLE `educational_background` (
  `bckgrnd_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `highest_qualification` varchar(255) NOT NULL,
  `institute_name` varchar(255) NOT NULL,
  `year_of_passing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extended_details`
--

CREATE TABLE `extended_details` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `advertisement_source` varchar(255) DEFAULT NULL,
  `special_needs` enum('yes','no') DEFAULT NULL,
  `special_needs_description` text DEFAULT NULL,
  `reasons_for_application` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(29, 41, '656', 45, 544, 2, 0),
(39, 51, '324', 45, 4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `family_details`
--

CREATE TABLE `family_details` (
  `family_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `father_occupation` varchar(255) NOT NULL,
  `father_address` varchar(255) NOT NULL,
  `father_mobile` varchar(20) DEFAULT NULL,
  `father_email` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) NOT NULL,
  `mother_occupation` varchar(255) NOT NULL,
  `mother_address` varchar(255) NOT NULL,
  `mother_mobile` varchar(20) DEFAULT NULL,
  `mother_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Std_id` int(11) NOT NULL,
  `college_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `post_code` varchar(10) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_application`
--

CREATE TABLE `student_application` (
  `id` int(11) NOT NULL,
  `college_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
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

INSERT INTO `student_application` (`id`, `college_id`, `course_id`, `user_id`, `full_name`, `birth_date`, `email`, `phone_number`, `gender`, `father_name`, `father_occupation`, `father_address`, `father_post_code`, `father_telephone`, `father_mobile`, `father_email`, `mother_name`, `mother_occupation`, `mother_address`, `mother_post_code`, `mother_telephone`, `mother_mobile`, `mother_email`, `qualification`, `institute_name`, `year_of_passing`, `advertisement`, `special_needs`, `special_needs_description`, `benefit_to_UNI`, `submission_date`) VALUES
(10, 51, 5, 12, 'Alisha Nepal', '2022-12-12', 'alishanepal53@gmail.com', '9846648121', 'female', 'allisha nepal', 'bussnessman', 'nayabazar,ktm', '', '', '45698752', '', 'sharada nepal', 'housewife', 'nayabazar', '', '', '54864513243', '', '+2', 'achs', 2022, 'Advertisement, Friend, Education Fair', 'no', '', 'njvghcfxdtxjctuvh ', '2023-07-24 15:34:01');

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
(4, 'nalinakunwar', 'nalina', 'nalina@gmail.com', '$2y$10$N5QwnAoGkTcVFpPxS9uqSercap3WyOLV/qVYipusY8/NyJzpQrGx2', 'College'),
(5, 'prime college', 'prime', 'prime@gmailcom', '$2y$10$YSQNPU1GVr4.DeJEfwBUjOtvdG1dR9K185tbcGrefi34.ElBTX2Wy', 'College'),
(12, 'Alisha Nepal', 'alisha', 'alishanepal53@gmail.com', '$2y$10$wxkXoZ92doAxOsyLvt/Lhuy953XYWX4iUptyaBAuHYP1Jvk.K2C0.', 'Student');

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
-- Indexes for table `educational_background`
--
ALTER TABLE `educational_background`
  ADD PRIMARY KEY (`bckgrnd_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `extended_details`
--
ALTER TABLE `extended_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facility_id`),
  ADD KEY `college_id` (`college_id`);

--
-- Indexes for table `family_details`
--
ALTER TABLE `family_details`
  ADD PRIMARY KEY (`family_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Std_id`),
  ADD KEY `college_id` (`college_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `student_application`
--
ALTER TABLE `student_application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PersonOrder` (`college_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `course_coll_relation`
--
ALTER TABLE `course_coll_relation`
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `educational_background`
--
ALTER TABLE `educational_background`
  MODIFY `bckgrnd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extended_details`
--
ALTER TABLE `extended_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `family_details`
--
ALTER TABLE `family_details`
  MODIFY `family_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `Std_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_application`
--
ALTER TABLE `student_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Constraints for table `educational_background`
--
ALTER TABLE `educational_background`
  ADD CONSTRAINT `educational_background_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`Std_id`);

--
-- Constraints for table `extended_details`
--
ALTER TABLE `extended_details`
  ADD CONSTRAINT `extended_details_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`Std_id`);

--
-- Constraints for table `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`);

--
-- Constraints for table `family_details`
--
ALTER TABLE `family_details`
  ADD CONSTRAINT `family_details_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`Std_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`);

--
-- Constraints for table `student_application`
--
ALTER TABLE `student_application`
  ADD CONSTRAINT `FK_PersonOrder` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`),
  ADD CONSTRAINT `student_application_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `student_application_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
