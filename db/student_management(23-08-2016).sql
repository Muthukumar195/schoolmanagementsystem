-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2016 at 01:55 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Admin_fullname`, `Admin_email`, `Admin_phone`, `Admin_username`, `Admin_password`, `Admin_profile`, `Admin_type`, `Admin_user_rights`, `Admin_created_dt_tme`, `Admin_status`) VALUES
(1, 'Administrator', 'info@criticeye.com', '9897987322', 'admin', 'admin', 'profile_pic1.jpg', 'A', 7, '2016-06-28 17:00:12', 'A'),
(8, 'Muthu kumar', 'venommuthu@gmail.com', '9585561635', 'muthu', 'muthu', 'profile_pic8.jpg', 'A', 2, '2016-08-22 18:03:44', 'A');

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
(1, 1, 'Batch 1', '2016-08-11', '2016-08-02', 'A', '2016-08-10 13:08:10'),
(2, 1, 'Batch2', '2016-08-10', '2016-08-02', 'A', '2016-08-10 13:09:13');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`Course_id`, `Course_name`, `Course_code`, `Course_description`, `Course_status`, `Course_create_dt_time`) VALUES
(1, 'bca', '1', 'bca', 'A', '2016-08-09 13:48:55'),
(2, 'bsc', '2', 'bsc', 'A', '2016-08-09 13:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `employee_department_details`
--

CREATE TABLE IF NOT EXISTS `employee_department_details` (
`Employee_department_id` int(11) NOT NULL,
  `Employee_department_name` text NOT NULL,
  `Employee_department_created_dt_time` datetime NOT NULL,
  `Employee_department_status` enum('A','D') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_department_details`
--

INSERT INTO `employee_department_details` (`Employee_department_id`, `Employee_department_name`, `Employee_department_created_dt_time`, `Employee_department_status`) VALUES
(1, 'Staffs', '2016-05-13 00:00:00', 'A'),
(2, 'Test department', '2016-05-19 17:33:47', 'A'),
(3, 'staff 3', '2016-07-27 13:36:28', 'A'),
(4, 'demasprfdgsfg', '2016-08-23 12:47:48', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `student_catagery`
--

CREATE TABLE IF NOT EXISTS `student_catagery` (
`Student_cat_id` int(11) NOT NULL,
  `Student_cat_name` varchar(200) NOT NULL,
  `Student_status` enum('A','D') NOT NULL,
  `Student_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_catagery`
--

INSERT INTO `student_catagery` (`Student_cat_id`, `Student_cat_name`, `Student_status`, `Student_create_dt_time`) VALUES
(1, 'General', 'A', '2016-08-10 15:49:02'),
(3, 'science', 'A', '2016-08-10 15:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE IF NOT EXISTS `student_details` (
`Student_id` int(11) NOT NULL,
  `Student_register_no` varchar(50) NOT NULL,
  `Student_join_date` date NOT NULL,
  `Student_course_id` int(11) NOT NULL COMMENT 'refered by course table id',
  `Student_batch_id` int(11) NOT NULL COMMENT 'refered by batch .table id',
  `Student_roll_no` varchar(100) NOT NULL,
  `Student_profile` varchar(100) NOT NULL,
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
  `Student_pincode` varchar(20) NOT NULL,
  `Student_county` varchar(20) NOT NULL,
  `Student_state` varchar(20) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`Student_id`, `Student_register_no`, `Student_join_date`, `Student_course_id`, `Student_batch_id`, `Student_roll_no`, `Student_profile`, `Student_first_name`, `Student_middle_name`, `Student_last_name`, `Student_date_of_birth`, `Student_gender`, `Student_blood_group`, `Student_birth_place`, `Student_nationalaty`, `Student_mother_tongue`, `Student_category_id`, `Student_religion`, `Student_permanent_address`, `Student_present_address`, `Student_city`, `Student_pincode`, `Student_county`, `Student_state`, `Student_phone`, `Student_email`, `Student_father_name`, `Student_father_mobile`, `Student_father_education`, `Student_father_occupation`, `Student_father_income`, `Student_mother_name`, `Student_mother_mobile`, `Student_mother_occupation`, `Student_guardian_name`, `Student_guardian_relationship`, `Student_guardian_education`, `Student_guardian_occupation`, `Student_guardian_income`, `Student_guardian_address`, `Student_guardian_city`, `Student_guardian_country`, `Student_guardian_mobile`, `Student_guardian_email`, `Student_pre_sch_name`, `Student_pre_sch_address`, `Student_pre_sch_qualification`, `Student_status`, `Student_create_dt_time`) VALUES
(3, '123', '2016-08-01', 1, 1, '425', 'student_pic1.jpg', 'priya', 'selva', 'k', '2016-08-01', 'Female', 'O-', 'coimbatore', 'indian', 'tamil', 1, 'hindu', 'Manjees Wari Colony,Kovil Medu, Coimbatore.', 'Manjees Wari Colony,Kovil Medu, Coimbatore.', 'coimbatore', '641025', 'India', 'Tamil Nadu', '9632587410', 'priya@gmail.com', 'kalimuthu', '6541239845', '10', 'business', '54000', 'lakshmi', '9654123012', 'housewife', 'selva', 'friend', 'mca', 'business', '50000', 'Manjees Wari Colony,Kovil Medu, Coimbatore.', 'coimbatore', 'India', '9632587410', 'selva@gmail.com', 'ramakrishna school', 'ramakrishna college, coimbatore.', 'mca', 'A', '2016-08-11 17:05:57'),
(7, '1271853', '2016-08-18', 1, 1, '110', 'student_pic1.jpg', 'Muthu', '', 'kumar', '1995-05-29', 'Male', 'A+', 'coimbatore', 'Indian', 'Tamil', 1, 'Hindu', '14 lic colony', 'sdsdsd', 'Coimbatore', '632012', '-1', '0', '9585561635', 'venommuthu@gmail.com', 'aks', '54654545454', 'hdgg', 'textile', '500000', 'gnana selvi ', '4565798764', 'housewife', 'dgh', 'gh', 'gh', 'gfh', 'gfh', 'dghgh', 'ghfg', '-1', 'dghdgh', 'ghgh', 'voorhess college', 'vellore', 'bca', 'A', '2016-08-22 11:25:17'),
(8, '12455454', '2016-08-22', 1, 2, '021654', 'student_pic1.jpg', 'Magesh', '', 'kumar', '2016-08-03', 'Male', 'A+', 'vellore', 'Indian', 'tamil', 1, 'Hindu', 'sivaji colony\r\nedayarpalayam', '', 'Coimbatore', '54987987', 'India', 'Tamil Nadu', '08675752575', 'venommuthu@gmail.com', 'sdfsdf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'India', '', '', '', '', '', 'D', '2016-08-22 12:29:26');

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
-- Indexes for table `employee_department_details`
--
ALTER TABLE `employee_department_details`
 ADD PRIMARY KEY (`Employee_department_id`);

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
MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
MODIFY `Course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee_department_details`
--
ALTER TABLE `employee_department_details`
MODIFY `Employee_department_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student_catagery`
--
ALTER TABLE `student_catagery`
MODIFY `Student_cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
