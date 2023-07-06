-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 08:43 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineojt`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `suffix` varchar(90) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `picture` longblob NOT NULL,
  `course` int(29) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_email` text NOT NULL,
  `company_address` varchar(200) NOT NULL,
  `acc_type` int(11) NOT NULL,
  `acc_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `acc_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`acc_id`, `name`) VALUES
(1, 'Student'),
(2, 'Coordinator'),
(3, 'Supervisor'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `acc_status`
--

CREATE TABLE `acc_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc_status`
--

INSERT INTO `acc_status` (`status_id`, `status_name`) VALUES
(1, 'Active'),
(2, 'Archive');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `message` varchar(250) NOT NULL,
  `date_announced` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `time` datetime NOT NULL,
  `name` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(255) NOT NULL,
  `student_id` int(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coordinator_student`
--

CREATE TABLE `coordinator_student` (
  `id` int(11) NOT NULL,
  `coordinator` int(100) NOT NULL,
  `student_id` varchar(200) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `suffix` varchar(100) NOT NULL,
  `mobile` bigint(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `course` int(50) NOT NULL,
  `acc_type` int(50) NOT NULL,
  `acc_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `acronym` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `acronym`) VALUES
(3, 'Bachelor of Science in Marine Biology', 'BSMB'),
(4, 'Bachelor of Science in Information Technology', 'BSIT'),
(5, 'Bachelor of Secondary Education Major in Technology and Livelihood Education', 'BSED'),
(6, 'Bachelor of Technology Livelihood Education Major in Home Economics and Major in Industrial Arts', 'BTLED');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `journal_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `pic1` longblob NOT NULL,
  `pic2` longblob NOT NULL,
  `grade` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(200) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `suffix` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `course` int(50) NOT NULL,
  `acc_type` int(50) NOT NULL,
  `acc_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_files`
--

CREATE TABLE `student_files` (
  `id` int(200) DEFAULT NULL,
  `stud_id` int(200) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `task` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `grade` int(100) NOT NULL,
  `date_given` date NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acc_type` (`acc_type`,`acc_status`),
  ADD KEY `acc_status` (`acc_status`),
  ADD KEY `course` (`course`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `acc_status`
--
ALTER TABLE `acc_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `id` (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `coordinator_student`
--
ALTER TABLE `coordinator_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course` (`course`,`acc_type`,`acc_status`),
  ADD KEY `coordinator` (`coordinator`),
  ADD KEY `acc_type` (`acc_type`),
  ADD KEY `acc_status` (`acc_status`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`journal_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course` (`course`,`acc_type`,`acc_status`),
  ADD KEY `acc_status` (`acc_status`),
  ADD KEY `acc_type` (`acc_type`);

--
-- Indexes for table `student_files`
--
ALTER TABLE `student_files`
  ADD KEY `stud-id` (`stud_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `acc_status`
--
ALTER TABLE `acc_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coordinator_student`
--
ALTER TABLE `coordinator_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `journal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`acc_status`) REFERENCES `acc_status` (`status_id`),
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`acc_type`) REFERENCES `account_type` (`acc_id`),
  ADD CONSTRAINT `accounts_ibfk_3` FOREIGN KEY (`course`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`attendance_id`) REFERENCES `coordinator_student` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `coordinator_student` (`id`);

--
-- Constraints for table `coordinator_student`
--
ALTER TABLE `coordinator_student`
  ADD CONSTRAINT `coordinator_student_ibfk_1` FOREIGN KEY (`acc_type`) REFERENCES `account_type` (`acc_id`),
  ADD CONSTRAINT `coordinator_student_ibfk_2` FOREIGN KEY (`acc_status`) REFERENCES `acc_status` (`status_id`),
  ADD CONSTRAINT `coordinator_student_ibfk_3` FOREIGN KEY (`course`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `coordinator_student_ibfk_4` FOREIGN KEY (`coordinator`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `journal`
--
ALTER TABLE `journal`
  ADD CONSTRAINT `journal_ibfk_1` FOREIGN KEY (`id`) REFERENCES `coordinator_student` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`acc_status`) REFERENCES `acc_status` (`status_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`acc_type`) REFERENCES `account_type` (`acc_id`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`course`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `student_files`
--
ALTER TABLE `student_files`
  ADD CONSTRAINT `student_files_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `coordinator_student` (`id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `coordinator_student` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
