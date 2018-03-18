-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2016 at 01:02 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_details`
--

CREATE TABLE IF NOT EXISTS `academic_details` (
`Academic_id` int(11) NOT NULL,
  `Academic_class_id` int(11) NOT NULL COMMENT 'refered Class table Id',
  `Academic_name` varchar(50) NOT NULL,
  `Academic_start` date NOT NULL,
  `Academic_end` date NOT NULL,
  `Academic_status` enum('A','D') NOT NULL,
  `Academic_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_details`
--

INSERT INTO `academic_details` (`Academic_id`, `Academic_class_id`, `Academic_name`, `Academic_start`, `Academic_end`, `Academic_status`, `Academic_create_dt_time`) VALUES
(1, 1, 'First year', '2016-08-25', '2016-08-25', 'A', '2016-08-25 17:55:03'),
(2, 2, 'Second year', '2016-08-25', '2016-08-25', 'A', '2016-08-25 17:54:53'),
(3, 3, 'Third Year', '2016-08-11', '2016-08-24', 'A', '2016-08-25 17:54:38');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Admin_fullname`, `Admin_email`, `Admin_phone`, `Admin_username`, `Admin_password`, `Admin_profile`, `Admin_type`, `Admin_user_rights`, `Admin_created_dt_tme`, `Admin_status`) VALUES
(1, 'Administrator', 'muthukumaran195@gmail.com', '9585561635', 'admin', 'admin', 'profile_pic1.jpg', 'A', 0, '2016-08-25 14:13:08', 'A');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_details`
--

CREATE TABLE IF NOT EXISTS `class_details` (
`Class_id` int(11) NOT NULL,
  `Class_name` varchar(50) NOT NULL,
  `Class_code` varchar(50) NOT NULL,
  `Class_description` text NOT NULL,
  `Class_status` enum('A','D') NOT NULL COMMENT 'A=active, D= deny',
  `Class_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_details`
--

INSERT INTO `class_details` (`Class_id`, `Class_name`, `Class_code`, `Class_description`, `Class_status`, `Class_create_dt_time`) VALUES
(1, 'First Standard', 'STD1', 'Firstclass name', 'A', '2016-08-25 17:51:37'),
(2, 'Second standard', '2STD', 'second starndars', 'A', '2016-08-25 17:49:54'),
(3, 'Third Standard', '3STD', '3 starndars', 'A', '2016-08-25 17:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `employee_department_details`
--

CREATE TABLE IF NOT EXISTS `employee_department_details` (
`Employee_department_id` int(11) NOT NULL,
  `Employee_department_name` text NOT NULL,
  `Employee_department_created_dt_time` datetime NOT NULL,
  `Employee_department_status` enum('A','D') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_department_details`
--

INSERT INTO `employee_department_details` (`Employee_department_id`, `Employee_department_name`, `Employee_department_created_dt_time`, `Employee_department_status`) VALUES
(2, 'General', '2016-08-26 12:20:05', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `employee_designation_details`
--

CREATE TABLE IF NOT EXISTS `employee_designation_details` (
`Employee_designation_id` int(11) NOT NULL,
  `Employee_designation_name` text NOT NULL,
  `Employee_designation_created_dt_time` datetime NOT NULL,
  `Employee_designation_status` enum('A','D') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_designation_details`
--

INSERT INTO `employee_designation_details` (`Employee_designation_id`, `Employee_designation_name`, `Employee_designation_created_dt_time`, `Employee_designation_status`) VALUES
(2, 'Maths', '2016-08-26 12:21:53', 'A'),
(3, 'English', '2016-08-26 12:22:00', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE IF NOT EXISTS `employee_details` (
`Employee_id` int(11) NOT NULL,
  `Employee_code` varchar(120) NOT NULL,
  `Employee_joining_date` date NOT NULL,
  `Employee_department_id` int(11) NOT NULL COMMENT 'refered by department table id',
  `Employee_designation_id` int(11) NOT NULL COMMENT 'refered by designation table id',
  `Employee_qualification` varchar(120) NOT NULL,
  `Employee_total_experiences` varchar(120) NOT NULL,
  `Employee_experiences_details` text NOT NULL,
  `Employee_first_name` varchar(120) NOT NULL,
  `Employee_middle_name` varchar(120) NOT NULL,
  `Employee_last_name` varchar(120) NOT NULL,
  `Employee_dob` date NOT NULL,
  `Employee_gender` varchar(50) NOT NULL,
  `Employee_father_name` varchar(120) NOT NULL,
  `Employee_mother_name` varchar(120) NOT NULL,
  `Employee_marital_status` enum('S','M','D') NOT NULL COMMENT 's= single, m=married,D= divorse',
  `Employee_photo` varchar(120) NOT NULL,
  `Employee_persent_address` text NOT NULL,
  `Employee_premanent_address` text NOT NULL,
  `Employee_city` varchar(120) NOT NULL,
  `Employee_pin` varchar(120) NOT NULL,
  `Employee_country` varchar(120) NOT NULL,
  `Employee_state` varchar(120) NOT NULL,
  `Employee_mobile` varchar(20) NOT NULL,
  `Employee_email` varchar(120) NOT NULL,
  `Employee_status` enum('A','D') NOT NULL,
  `Employee_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`Employee_id`, `Employee_code`, `Employee_joining_date`, `Employee_department_id`, `Employee_designation_id`, `Employee_qualification`, `Employee_total_experiences`, `Employee_experiences_details`, `Employee_first_name`, `Employee_middle_name`, `Employee_last_name`, `Employee_dob`, `Employee_gender`, `Employee_father_name`, `Employee_mother_name`, `Employee_marital_status`, `Employee_photo`, `Employee_persent_address`, `Employee_premanent_address`, `Employee_city`, `Employee_pin`, `Employee_country`, `Employee_state`, `Employee_mobile`, `Employee_email`, `Employee_status`, `Employee_create_dt_time`) VALUES
(1, 'EM1', '2016-08-26', 2, 2, 'm.phil', '2years', 'Experiences Details :', 'Muthu', 'Kumar', 'K', '1995-05-29', 'Male', 'AKS', 'Gnana Selvi', 'S', 'employee_pic1.jpg', '14 lic colony', '14 Lic Colony', 'Coimbatore', '632013', 'India', 'Tamil nadu', '08675752575', 'venommuthu@gmail.com', 'D', '2016-08-26 14:14:08'),
(3, '302', '2016-08-01', 2, 2, 'bcom', '5', 'dgdfjgdfgdfg', 'th', 'mo', 'hy', '2016-08-31', 'Male', 'thirumoorthy', 'athilaksmi', 'S', '', 'sdfsdf', 'erw', 'covai', '25', 'India', 'Tamil Nadu', '22222222222', 'cxvxcfxc', 'A', '2016-08-26 14:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_details`
--

CREATE TABLE IF NOT EXISTS `enquiry_details` (
`Enq_id` int(11) NOT NULL,
  `Enq_student_name` varchar(120) NOT NULL,
  `Enq_student_class_id` int(11) NOT NULL,
  `Enq_student_gender` varchar(20) NOT NULL,
  `Enq_student_dob` date NOT NULL,
  `Enq_father_name` varchar(120) NOT NULL,
  `Enq_address` text NOT NULL,
  `Enq_mobile` varchar(20) NOT NULL,
  `Enq_email` varchar(120) NOT NULL,
  `Enq_city` varchar(20) NOT NULL,
  `Enq_pin` varchar(20) NOT NULL,
  `Enq_status` enum('A','D') NOT NULL,
  `Enq_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fees_details`
--

CREATE TABLE IF NOT EXISTS `fees_details` (
`Fees_id` int(11) NOT NULL,
  `Fees_class_id` int(11) NOT NULL COMMENT 'refered by class details table id',
  `Fees_academic_id` int(11) NOT NULL COMMENT 'refered by academic details table id',
  `Fees_amount` int(11) NOT NULL,
  `Fees_status` enum('A','D') NOT NULL,
  `Fees_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_details`
--

INSERT INTO `fees_details` (`Fees_id`, `Fees_class_id`, `Fees_academic_id`, `Fees_amount`, `Fees_status`, `Fees_create_dt_time`) VALUES
(1, 1, 1, 5000, 'A', '2016-08-29 11:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `instution_details`
--

CREATE TABLE IF NOT EXISTS `instution_details` (
`Instution_id` int(11) NOT NULL,
  `Instution_name` varchar(120) NOT NULL,
  `Instution_code` varchar(120) NOT NULL,
  `Instution_email` varchar(120) NOT NULL,
  `Instution_mobile` varchar(20) NOT NULL,
  `Instution_address` text NOT NULL,
  `Instution_fax` varchar(120) NOT NULL,
  `Instution_city` varchar(120) NOT NULL,
  `Instution_pin` varchar(120) NOT NULL,
  `Instution_country` varchar(120) NOT NULL,
  `Instution_state` varchar(120) NOT NULL,
  `Instution_status` enum('A','D') NOT NULL,
  `Instution_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instution_details`
--

INSERT INTO `instution_details` (`Instution_id`, `Instution_name`, `Instution_code`, `Instution_email`, `Instution_mobile`, `Instution_address`, `Instution_fax`, `Instution_city`, `Instution_pin`, `Instution_country`, `Instution_state`, `Instution_status`, `Instution_create_dt_time`) VALUES
(1, 'Daffodills', 'I124', 'venommuthu@gmail.com', '8675752575', 'sivaji colony, edayarpalayam', '', 'Coimbatore', '632574', 'Austria', 'Tirol', 'A', '2016-08-29 15:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `student_catagery`
--

CREATE TABLE IF NOT EXISTS `student_catagery` (
`Student_cat_id` int(11) NOT NULL,
  `Student_cat_name` varchar(200) NOT NULL,
  `Student_status` enum('A','D') NOT NULL,
  `Student_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_catagery`
--

INSERT INTO `student_catagery` (`Student_cat_id`, `Student_cat_name`, `Student_status`, `Student_create_dt_time`) VALUES
(1, 'section 1', 'A', '2016-08-25 17:55:41'),
(2, 'Section 2', 'A', '2016-08-25 17:55:48'),
(3, 'Section 3', 'A', '2016-08-25 17:55:53'),
(4, 'Section4', 'A', '2016-08-25 17:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE IF NOT EXISTS `student_details` (
`Student_id` int(11) NOT NULL,
  `Student_register_no` varchar(50) NOT NULL,
  `Student_join_date` date NOT NULL,
  `Student_class_id` int(11) NOT NULL COMMENT 'refered by class table id',
  `Student_academic_id` int(11) NOT NULL COMMENT 'refered by academic  .table id',
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`Student_id`, `Student_register_no`, `Student_join_date`, `Student_class_id`, `Student_academic_id`, `Student_roll_no`, `Student_profile`, `Student_first_name`, `Student_middle_name`, `Student_last_name`, `Student_date_of_birth`, `Student_gender`, `Student_blood_group`, `Student_birth_place`, `Student_nationalaty`, `Student_mother_tongue`, `Student_category_id`, `Student_religion`, `Student_permanent_address`, `Student_present_address`, `Student_city`, `Student_pincode`, `Student_county`, `Student_state`, `Student_phone`, `Student_email`, `Student_father_name`, `Student_father_mobile`, `Student_father_education`, `Student_father_occupation`, `Student_father_income`, `Student_mother_name`, `Student_mother_mobile`, `Student_mother_occupation`, `Student_guardian_name`, `Student_guardian_relationship`, `Student_guardian_education`, `Student_guardian_occupation`, `Student_guardian_income`, `Student_guardian_address`, `Student_guardian_city`, `Student_guardian_country`, `Student_guardian_mobile`, `Student_guardian_email`, `Student_pre_sch_name`, `Student_pre_sch_address`, `Student_pre_sch_qualification`, `Student_status`, `Student_create_dt_time`) VALUES
(1, '20201', '2016-08-25', 1, 1, '1001', 'student_pic1.jpg', 'Muthu', 'Kumar', 'k', '1995-05-29', 'Male', 'A+', 'Coimbatore', 'Indian', 'Tamil', 1, 'Hindu', '14 lic colony, kagithapatarai,', '14 Lic Colony, Kagithapatarai,', 'Vellore', '632012', 'India', 'Tamil Nadu', '9585561365', 'muthukumaran195@gmail.com', 'Aks', '8545445654', '--', 'Textile', '30000', 'Gnana Selvi', '9585465455', 'House Wife', 'Test name', 'Test  Relation', 'test Education', 'test Job', '52000', 'test address', 'Vellore', 'India', '9523576465', 'sample@gmail.com', 'voorhess School', 'vellore -632001', '10th', 'A', '2016-08-25 18:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `subject_allocation_details`
--

CREATE TABLE IF NOT EXISTS `subject_allocation_details` (
`Subject_allocation_id` int(11) NOT NULL,
  `Subject_allocation_employee_id` int(11) NOT NULL COMMENT 'refered employee table id',
  `Subject_allocation_class_id` int(11) NOT NULL COMMENT 'refered classtable id',
  `Subject_allocation_academic_id` int(11) NOT NULL COMMENT 'refered academic table id',
  `Subject_allocation_subject_id` int(11) NOT NULL COMMENT 'refered by student table id',
  `Subject_allocation_status` enum('A','D') NOT NULL,
  `Subject_allocation_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_allocation_details`
--

INSERT INTO `subject_allocation_details` (`Subject_allocation_id`, `Subject_allocation_employee_id`, `Subject_allocation_class_id`, `Subject_allocation_academic_id`, `Subject_allocation_subject_id`, `Subject_allocation_status`, `Subject_allocation_create_dt_time`) VALUES
(1, 1, 1, 1, 1, 'A', '2016-08-27 12:00:58'),
(3, 3, 2, 2, 5, 'A', '2016-08-27 12:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `subject_details`
--

CREATE TABLE IF NOT EXISTS `subject_details` (
`Subject_id` int(11) NOT NULL,
  `Subject_name` varchar(120) NOT NULL,
  `Subject_code` varchar(120) NOT NULL,
  `Subject_status` enum('A','D') NOT NULL,
  `Subject_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_details`
--

INSERT INTO `subject_details` (`Subject_id`, `Subject_name`, `Subject_code`, `Subject_status`, `Subject_create_dt_time`) VALUES
(1, 'English', 'E1', 'A', '2016-08-25 17:52:01'),
(2, 'Tamil', 'T1', 'A', '2016-08-25 17:52:14'),
(3, 'Maths', 'M1', 'A', '2016-08-25 17:52:23'),
(4, 'Science', 'S1', 'A', '2016-08-25 17:52:32'),
(5, 'Social Science', 'SS1', 'A', '2016-08-25 17:52:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_details`
--
ALTER TABLE `academic_details`
 ADD PRIMARY KEY (`Academic_id`);

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
-- Indexes for table `class_details`
--
ALTER TABLE `class_details`
 ADD PRIMARY KEY (`Class_id`);

--
-- Indexes for table `employee_department_details`
--
ALTER TABLE `employee_department_details`
 ADD PRIMARY KEY (`Employee_department_id`);

--
-- Indexes for table `employee_designation_details`
--
ALTER TABLE `employee_designation_details`
 ADD PRIMARY KEY (`Employee_designation_id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
 ADD PRIMARY KEY (`Employee_id`);

--
-- Indexes for table `enquiry_details`
--
ALTER TABLE `enquiry_details`
 ADD PRIMARY KEY (`Enq_id`);

--
-- Indexes for table `fees_details`
--
ALTER TABLE `fees_details`
 ADD PRIMARY KEY (`Fees_id`);

--
-- Indexes for table `instution_details`
--
ALTER TABLE `instution_details`
 ADD PRIMARY KEY (`Instution_id`);

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
-- Indexes for table `subject_allocation_details`
--
ALTER TABLE `subject_allocation_details`
 ADD PRIMARY KEY (`Subject_allocation_id`);

--
-- Indexes for table `subject_details`
--
ALTER TABLE `subject_details`
 ADD PRIMARY KEY (`Subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_details`
--
ALTER TABLE `academic_details`
MODIFY `Academic_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_user_rights_details`
--
ALTER TABLE `admin_user_rights_details`
MODIFY `User_rights_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_details`
--
ALTER TABLE `class_details`
MODIFY `Class_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee_department_details`
--
ALTER TABLE `employee_department_details`
MODIFY `Employee_department_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee_designation_details`
--
ALTER TABLE `employee_designation_details`
MODIFY `Employee_designation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
MODIFY `Employee_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `enquiry_details`
--
ALTER TABLE `enquiry_details`
MODIFY `Enq_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fees_details`
--
ALTER TABLE `fees_details`
MODIFY `Fees_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `instution_details`
--
ALTER TABLE `instution_details`
MODIFY `Instution_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student_catagery`
--
ALTER TABLE `student_catagery`
MODIFY `Student_cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subject_allocation_details`
--
ALTER TABLE `subject_allocation_details`
MODIFY `Subject_allocation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subject_details`
--
ALTER TABLE `subject_details`
MODIFY `Subject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
