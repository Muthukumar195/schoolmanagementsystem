-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2016 at 12:09 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`Admin_id` int(11) NOT NULL,
  `Admin_fullname` varchar(450) NOT NULL,
  `Admin_email` text NOT NULL,
  `Admin_phone` varchar(25) NOT NULL,
  `Admin_username` varchar(120) NOT NULL,
  `Admin_password` varchar(60) NOT NULL,
  `Admin_profile` text NOT NULL,
  `Admin_type` enum('A','E','M','I','AC') NOT NULL COMMENT 'A=Admin, E=Employee, M=Manager, I=Incharge, AC=Accountant',
  `Admin_user_rights` int(11) NOT NULL COMMENT 'reference id of user rights table',
  `Admin_created_dt_tme` datetime NOT NULL,
  `Admin_status` enum('A','D') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Admin_fullname`, `Admin_email`, `Admin_phone`, `Admin_username`, `Admin_password`, `Admin_profile`, `Admin_type`, `Admin_user_rights`, `Admin_created_dt_tme`, `Admin_status`) VALUES
(1, 'Administrator', 'info@criticeye.com', '9897987322', 'admin', 'admin', 'profile_pic1.jpg', 'A', 7, '2016-06-28 17:00:12', 'A'),
(2, 'Suresh', 'sureshkumarcbe66@gmail.com', '9542214522', 'suresh', 'admin', 'profile_pic2.jpg', 'A', 1, '2016-02-04 13:35:58', 'A'),
(3, 'muthu kumar', 'muthukumaran195@gmail.com', '9585561635', 'muthu', 'admin', 'profile_pic3.jpg', 'A', 1, '2016-08-05 17:37:17', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_rights_details`
--

CREATE TABLE IF NOT EXISTS `admin_user_rights_details` (
`User_rights_id` int(11) NOT NULL,
  `User_rights_name` varchar(220) NOT NULL,
  `User_rights_type_value` text NOT NULL,
  `User_rights_created_dt_time` datetime NOT NULL,
  `User_rights_status` enum('A','D') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user_rights_details`
--

INSERT INTO `admin_user_rights_details` (`User_rights_id`, `User_rights_name`, `User_rights_type_value`, `User_rights_created_dt_time`, `User_rights_status`) VALUES
(1, 'Suresh', 'Student,User Rights', '2016-08-08 14:09:31', 'A'),
(2, 'Emplopyee', 'Student,User Rights', '2016-08-08 14:06:23', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `batch_details`
--

CREATE TABLE IF NOT EXISTS `batch_details` (
`Batch_id` int(11) NOT NULL,
  `Batch_course_id` int(11) NOT NULL COMMENT 'refered Course table Id',
  `Batch_name` varchar(50) NOT NULL,
  `Batch_start` date NOT NULL,
  `Batch_end` date NOT NULL,
  `Batch_status` enum('A','D') NOT NULL,
  `Batch_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_details`
--

INSERT INTO `batch_details` (`Batch_id`, `Batch_course_id`, `Batch_name`, `Batch_start`, `Batch_end`, `Batch_status`, `Batch_create_dt_time`) VALUES
(1, 1, 'Batch 1', '2016-08-10', '2016-08-02', 'A', '2016-08-17 00:00:00'),
(2, 1, 'Batch 1', '2016-08-10', '2016-08-02', 'A', '2016-08-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE IF NOT EXISTS `course_details` (
`Course_id` int(11) NOT NULL,
  `Course_name` varchar(50) NOT NULL,
  `Course_code` varchar(50) NOT NULL,
  `Course_description` text NOT NULL,
  `Course_status` enum('A','D') NOT NULL COMMENT 'A=active, D= deny',
  `Course_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`Course_id`, `Course_name`, `Course_code`, `Course_description`, `Course_status`, `Course_create_dt_time`) VALUES
(1, 'bca', '1', 'bca', 'A', '2016-08-09 13:48:55'),
(2, 'bsc', '2', 'bsc', 'A', '2016-08-09 13:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `student_catagery`
--

CREATE TABLE IF NOT EXISTS `student_catagery` (
`Student_cat_id` int(11) NOT NULL,
  `Student_cat_name` varchar(200) NOT NULL,
  `Student_status` enum('A','D') NOT NULL,
  `Student_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE IF NOT EXISTS `student_details` (
`Student_id` int(11) NOT NULL,
  `Student_register_id` int(11) NOT NULL,
  `Student_join_date` date NOT NULL COMMENT 'refered by course table id',
  `Student_course_id` int(11) NOT NULL COMMENT 'refered by batch table id',
  `Student_batch_id` int(11) NOT NULL,
  `Student_first_name` varchar(50) NOT NULL,
  `Student_middle_name` varchar(50) NOT NULL,
  `Student_last_name` varchar(50) NOT NULL,
  `Student_date_of_birth` date NOT NULL,
  `Student_gender` varchar(20) NOT NULL,
  `Student_blood_group` varchar(20) NOT NULL,
  `Student_birth_place` varchar(50) NOT NULL,
  `Student_nationalaty` varchar(20) NOT NULL,
  `Student_mother_tongue` varchar(20) NOT NULL,
  `Student_category_id` int(11) NOT NULL COMMENT 'refered category table Id',
  `Student_religion` varchar(20) NOT NULL,
  `Student_permanent_address` text NOT NULL,
  `Student_present_address` text NOT NULL,
  `Student_city` varchar(20) NOT NULL,
  `Student_pincode` int(11) NOT NULL,
  `Student_county` int(11) NOT NULL,
  `Student_state` int(11) NOT NULL,
  `Student_phone` varchar(20) NOT NULL,
  `Student_email` varchar(200) NOT NULL,
  `Student_father_name` varchar(20) NOT NULL,
  `Student_father_mobile` varchar(20) NOT NULL,
  `Student_father_education` varchar(100) NOT NULL,
  `Student_father_occupation` varchar(100) NOT NULL,
  `Student_father_income` varchar(20) NOT NULL,
  `Student_mother_name` varchar(100) NOT NULL,
  `Student_mother_mobile` varchar(20) NOT NULL,
  `Student_mother_occupation` varchar(100) NOT NULL,
  `Student_guardian_name` varchar(100) NOT NULL,
  `Student_guardian_relationship` varchar(100) NOT NULL,
  `Student_guardian_education` varchar(100) NOT NULL,
  `Student_guardian_occupation` varchar(100) NOT NULL,
  `Student_guardian_income` varchar(20) NOT NULL,
  `Student_guardian_address` text NOT NULL,
  `Student_guardian_city` varchar(100) NOT NULL,
  `Student_guardian_country` varchar(100) NOT NULL,
  `Student_guardian_mobile` varchar(20) NOT NULL,
  `Student_guardian_email` varchar(100) NOT NULL,
  `Student_pre_sch_name` varchar(100) NOT NULL,
  `Student_pre_sch_address` text NOT NULL,
  `Student_pre_sch_qualification` varchar(100) NOT NULL,
  `Student_status` enum('A','D') NOT NULL,
  `Student_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `admin_user_rights_details`
--
ALTER TABLE `admin_user_rights_details`
 ADD PRIMARY KEY (`User_rights_id`);

--
-- Indexes for table `batch_details`
--
ALTER TABLE `batch_details`
 ADD PRIMARY KEY (`Batch_id`);

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
 ADD PRIMARY KEY (`Course_id`);

--
-- Indexes for table `student_catagery`
--
ALTER TABLE `student_catagery`
 ADD PRIMARY KEY (`Student_cat_id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
 ADD PRIMARY KEY (`Student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `admin_user_rights_details`
--
ALTER TABLE `admin_user_rights_details`
MODIFY `User_rights_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `batch_details`
--
ALTER TABLE `batch_details`
MODIFY `Batch_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
MODIFY `Course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student_catagery`
--
ALTER TABLE `student_catagery`
MODIFY `Student_cat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
