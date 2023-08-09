-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 06:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deepak`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `faculties_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `faculties_name`) VALUES
(1, 'Bachelor of Arts - BA', 'Department of Arts'),
(5, 'Bachelor of Commerce - (Banking and Insurance)', 'Department of Commerce'),
(4, 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Department of Commerce'),
(3, 'Bachelor of Commerce - B.Com (plain)', 'Department of Commerce'),
(8, 'Bachelor of Management Studies - BMS', 'Department of Managemant Studies'),
(9, 'Bachelor of Science - B.Sc (CS)', 'Department of Information Technology'),
(7, 'Bachelor of Science - B.Sc (IT)', 'Department of Information Technology'),
(6, 'Bachelor of Science - B.Sc (plain)', 'Department of Science');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries_tbl`
--

CREATE TABLE `enquiries_tbl` (
  `e_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `student/staff` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(13) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiries_tbl`
--

INSERT INTO `enquiries_tbl` (`e_id`, `name`, `student/staff`, `email`, `phone`, `message`) VALUES
(2, 'Deepak', 'Student', 'deepak@mail.com', 2147483647, 'hello'),
(3, 'Rahul', 'Staff', 'rahul@gmail.com', 2147483647, 'hii');

-- --------------------------------------------------------

--
-- Table structure for table `facuties_tbl`
--

CREATE TABLE `facuties_tbl` (
  `faculties_id` int(10) UNSIGNED NOT NULL,
  `faculties_name` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facuties_tbl`
--

INSERT INTO `facuties_tbl` (`faculties_id`, `faculties_name`, `note`) VALUES
(1, 'Department of Information Technology', 'IT & CS'),
(14, 'Department of Managemant Studies', 'BMS'),
(15, 'Department of Commerce', 'B.Com (plain, BAF, BBI)'),
(16, 'Department of Arts', 'BAA'),
(18, 'Department of Science', 'B.Sc (plain)');

-- --------------------------------------------------------

--
-- Table structure for table `new_appilcations_tbl`
--

CREATE TABLE `new_appilcations_tbl` (
  `a_no` int(10) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `father_name` varchar(20) NOT NULL,
  `mother_name` varchar(20) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `pincode` int(6) NOT NULL,
  `state` varchar(30) NOT NULL,
  `X_board` varchar(100) NOT NULL,
  `X_%` int(4) NOT NULL,
  `X_yop` varchar(13) NOT NULL,
  `XII_board` varchar(100) NOT NULL,
  `XII_%` int(4) NOT NULL,
  `XII_yop` varchar(13) NOT NULL,
  `course` varchar(120) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `X_marksheet` varchar(50) NOT NULL,
  `XII_marksheet` varchar(50) NOT NULL,
  `applied_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_appilcations_tbl`
--

INSERT INTO `new_appilcations_tbl` (`a_no`, `f_name`, `l_name`, `father_name`, `mother_name`, `dob`, `email`, `phone`, `gender`, `address`, `city`, `pincode`, `state`, `X_board`, `X_%`, `X_yop`, `XII_board`, `XII_%`, `XII_yop`, `course`, `photo`, `X_marksheet`, `XII_marksheet`, `applied_on`) VALUES
(6, 'Deepak', 'Deepak', 'Deepak', 'Deepak', '19 / September / 1999', 'deepak@mail.com', 9096627212, 'Male', 'Deepak', 'Deepak', 421003, 'deepak', 'MSB', 65, '2034', 'MSB', 75, '2036', 'Bachelor of Commerce - (Banking and Insurance)', 'uploads/photoDeepakDeepakcard-img.jpg', 'uploads/XmarksheetDeepakDeepakprofile-img-1.jpg', 'uploads/XIImarksheetDeepakDeepakprofile-img-2.webp', '2022-02-18 17:19:31'),
(7, 'Demo', 'Demo', 'Demo', 'Demo', '8 / September / 1996', 'Demo', 2147483647, 'Female', 'demo', 'Demo', 421003, 'Demo', 'Demo', 74, '2034', 'Demo', 98, '2036', 'Bachelor of Science - B.Sc (IT)', 'uploads/photoDemoDemoprofile.png', 'uploads/XmarksheetDemoDemoprofile-img-2.webp', 'uploads/XIImarksheetDemoDemoprofile-img-1.jpg', '2022-02-18 17:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `stu_score_tbl`
--

CREATE TABLE `stu_score_tbl` (
  `ss_id` int(10) UNSIGNED NOT NULL,
  `roll_no` int(7) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `class` varchar(15) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `midterm` int(3) NOT NULL,
  `final` int(3) NOT NULL,
  `paas/fail` varchar(10) NOT NULL,
  `remark` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_score_tbl`
--

INSERT INTO `stu_score_tbl` (`ss_id`, `roll_no`, `student_name`, `course_name`, `class`, `subject_name`, `midterm`, `final`, `paas/fail`, `remark`) VALUES
(1, 215601, 'Radha Gera', 'Bachelor of Management Studies - BMS', 'FY', 'Foundation of Human Skills', 56, 69, 'paas', 'good'),
(2, 215602, 'Disha Dutt', 'Bachelor of Management Studies - BMS', 'FY', 'Foundation of Human Skills', 56, 69, 'paas', 'good'),
(3, 215603, 'Rajendra Chadha', 'Bachelor of Management Studies - BMS', 'FY', 'Foundation of Human Skills', 56, 69, 'paas', 'good'),
(4, 215604, 'Sarthak Setty', 'Bachelor of Management Studies - BMS', 'FY', 'Foundation of Human Skills', 56, 69, 'paas', 'good'),
(5, 215605, 'Kamakshi Rai', 'Bachelor of Management Studies - BMS', 'FY', 'Foundation of Human Skills', 56, 69, 'paas', 'good'),
(16, 215601, 'Radha Gera', 'Bachelor of Management Studies - BMS', 'FY', 'Introduction to Financial Accounts', 56, 69, 'paas', 'good'),
(17, 215602, 'Disha Dutt', 'Bachelor of Management Studies - BMS', 'FY', 'Introduction to Financial Accounts', 56, 69, 'paas', 'good'),
(18, 215603, 'Rajendra Chadha', 'Bachelor of Management Studies - BMS', 'FY', 'Introduction to Financial Accounts', 56, 69, 'paas', 'good'),
(19, 215604, 'Sarthak Setty', 'Bachelor of Management Studies - BMS', 'FY', 'Introduction to Financial Accounts', 56, 69, 'paas', 'good'),
(20, 215605, 'Kamakshi Rai', 'Bachelor of Management Studies - BMS', 'FY', 'Introduction to Financial Accounts', 56, 69, 'paas', 'good'),
(21, 215601, 'Radha Gera', 'Bachelor of Management Studies - BMS', 'FY', 'Introduction to Financial Accounts', 56, 69, 'paas', 'good'),
(22, 215602, 'Disha Dutt', 'Bachelor of Management Studies - BMS', 'FY', 'Introduction to Financial Accounts', 34, 30, 'fail', 'ATKT'),
(23, 215603, 'Rajendra Chadha', 'Bachelor of Management Studies - BMS', 'FY', 'Introduction to Financial Accounts', 56, 69, 'paas', 'good'),
(24, 215604, 'Sarthak Setty', 'Bachelor of Management Studies - BMS', 'FY', 'Introduction to Financial Accounts', 56, 69, 'paas', 'good'),
(25, 215605, 'Kamakshi Rai', 'Bachelor of Management Studies - BMS', 'FY', 'Introduction to Financial Accounts', 56, 69, 'paas', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `stu_tbl`
--

CREATE TABLE `stu_tbl` (
  `stu_id` int(10) UNSIGNED NOT NULL,
  `roll_no` int(10) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `class` varchar(15) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `fees_paid` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_tbl`
--

INSERT INTO `stu_tbl` (`stu_id`, `roll_no`, `f_name`, `l_name`, `course_name`, `class`, `gender`, `dob`, `address`, `phone`, `email`, `fees_paid`, `note`) VALUES
(13, 215001, 'Sudhir', 'Gade', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '1999-10-16', 'Mumbai', '65252799732', 'sudhir@mail.com          ', 'Full Fees Paid', 'student'),
(14, 215002, 'Rati', 'Gade', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '2000-03-21', 'Mumbai', '5647383546', 'rati@gmail.com ', '1st Installments Paid', 'student'),
(15, 215003, 'Tara', 'Dar', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Female', '2001-10-08', 'Mumbai', '7353728676', 'tara@yahoo.com ', '2nd Installments Paid', 'student'),
(16, 215004, 'Karan', 'Meka', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '2001-09-03', 'Ambernath', '6473635643', 'meka@gmail.com ', '1st Installments Paid', 'student'),
(17, 215005, 'Amitabh', 'Madan', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '1999-04-22', 'Ambernath', '65252799537', 'madan@mail.com ', 'Full Fees Paid', 'student'),
(18, 215006, 'Saraswati', 'Narasimhan', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Female', '2002-02-17', 'Mumbai', '64737368322', 'narasimhan@mail.com ', '2nd Installments Paid', 'student'),
(19, 215007, 'Akhil', 'Ahluwalia', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '2000-09-12', 'Ulhasnagar', '43537292743', 'Ahluwalia@mail.com ', '1st Installments Paid', 'student'),
(20, 215008, 'Rashmi', 'Trivedi', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Female', '2003-06-08', 'Kalyan', '6473635247', 'trivedi@mail.com ', '2nd Installments Paid', ''),
(21, 215009, 'Rani', 'Sen', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Female', '2002-12-04', 'Ulhasnagar', '6525279643', 'sen@yahoo.com ', 'Full Fees Paid', 'student'),
(22, 215010, 'Manju', 'Mani', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '2000-09-12', 'Mumbai', '83736382922', 'Mani@gmail.com  ', 'Full Fees Paid', 'student'),
(23, 215011, 'Dhruv', 'Narang', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '2001-06-13', 'Ambernath', '65468966868', 'Narang@mail.com  ', 'Full Fees Paid', 'student'),
(24, 215012, 'Anaya', 'Sathe', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Female', '2001-06-18', 'Kalyan', '9827692929', 'Sathe@gmail.com ', '2nd Installments Paid', 'student'),
(25, 215013, 'Ankit', 'Roy', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '2003-10-18', 'Kalyan', '764783763732', 'kiara@gmail.com ', '2nd Installments Paid', ''),
(27, 215014, 'Indu', 'Dugar', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Female', '2001-07-13', 'Ulhasnagar', '528393763839', 'Dugar@yahoo.com', '1st Installments Paid', 'student'),
(28, 215015, 'Prabodh ', 'Sood', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '2001-11-05', 'Ambernath', '8474790992', 'Sood@mail.com', 'Full Fees Paid', ''),
(29, 215016, 'Riya', 'Shere', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Female', '2005-04-18', 'Ambernath', '7363537282', 'shere@gmail.com', '1st Installments Paid', 'student'),
(30, 215017, 'Ranjit', 'Chada', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '2001-09-12', 'Mumbai', '5252627223', 'Chada@mail.com', 'Full Fees Paid', ''),
(31, 215018, 'Roshan', 'Bedi', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '2000-05-11', 'Ulhasnagar', '9383876387', 'Bedi@gmail.com', '1st Installments Paid', ''),
(32, 215019, 'Pratik', 'Bhat', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '1999-04-16', 'Kalyan', '98276929298', 'Bhat@mail.com', 'Full Fees Paid', ''),
(33, 215020, 'Nilam', 'Khurana', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '1999-04-25', 'Mumbai', '92727987283', 'Khurana@gmail.com', '1st Installments Paid', ''),
(34, 215021, 'Karan', 'Karnik', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '2002-08-06', 'Ulhasnagar', '73537282764', 'kiara@gmail.com', 'Full Fees Paid', 'student'),
(35, 215022, 'Vimal', 'Talwar', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '2001-11-10', 'Kalyan', '8763633723', 'Talwar@yahoo.com', '1st Installments Paid', ''),
(36, 215023, 'Isha', 'Chand', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Female', '2001-06-08', 'Ambernath', '8364782822', 'Chand@gmail.com', '1st Installments Paid', ''),
(37, 215024, 'Shanta', 'Dixit', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '2001-05-09', 'Ulhasnagar', '8273638382', 'Dixit@mail.com ', 'Full Fees Paid', 'student'),
(38, 215025, 'Kanta', 'Bhalla', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '1997-11-13', 'Mumbai', '8752426272', 'Bhalla@yahoo.com', 'Full Fees Paid', ''),
(39, 215026, 'Gautam', 'Dua', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '2000-05-30', 'Mumbai', '93836746373', 'Dua@mail.com', '2nd Installments Paid', 'student'),
(40, 215027, 'Nishant', 'Doctor', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '2001-05-13', 'Mumbai', '647363538292', 'nishant@yahoo.com', 'Full Fees Paid', ''),
(41, 215028, 'Shakti', 'Kohli', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '2001-04-21', 'Ambernath', '647363538292', 'Kohli@gmail.com', 'Full Fees Paid', ''),
(42, 215029, 'Arnav', 'Nigam', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '0000-00-00', 'Ulhasnagar', '73537282764', 'nigam@yahoo.com', '1st Installments Paid', ''),
(43, 215030, 'Mohandas', 'Prabhu', 'Bachelor of Science - B.Sc (IT)', 'FY', 'Male', '2001-07-14', 'Ambernath', '73537282764', 'p@gmail.com', 'Full Fees Paid', ''),
(44, 215601, 'Radha', 'Gera', 'Bachelor of Management Studies - BMS', 'FY', 'Female', '2000-03-16', 'Kalyan', '83635748743', 'radha@mail.com', 'Full Fees Paid', 'student'),
(45, 215602, 'Disha', 'Dutt', 'Bachelor of Management Studies - BMS', 'FY', 'Female', '2000-10-19', 'Mumbai', '76473837383', 'disha@gmail.com', '1st Installments Paid', 'student'),
(46, 215603, 'Rajendra', 'Chadha', 'Bachelor of Management Studies - BMS', 'FY', 'Male', '1999-08-15', 'Mumbai', '98276929298', 'Rajendra@mail.com', '2nd Installments Paid', 'student'),
(47, 215604, 'Sarthak', 'Setty', 'Bachelor of Management Studies - BMS', 'FY', 'Male', '2000-01-01', 'Ambernath', '8373638322', 'sarthak@yahoo.com', 'Full Fees Paid', 'student'),
(48, 215605, 'Kamakshi', 'Rai', 'Bachelor of Management Studies - BMS', 'FY', 'Male', '2001-08-02', 'Mumbai', '84746484932', 'Kamakshi@gmail.com', '1st Installments Paid', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_tbl`
--

CREATE TABLE `sub_tbl` (
  `sub_id` int(10) UNSIGNED NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `class` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_tbl`
--

INSERT INTO `sub_tbl` (`sub_id`, `sub_name`, `class`, `semester`, `course_name`, `teacher_name`, `note`) VALUES
(16, 'Imperative Programming', 'FY', '1', 'Bachelor of Science - B.Sc (IT)', 'kiara Sangtani', ''),
(17, 'Digital Electronics', 'FY', '1', 'Bachelor of Science - B.Sc (IT)', 'Jairam Mulchandani', ''),
(18, 'Operating Systems', 'FY', '1', 'Bachelor of Science - B.Sc (IT)', 'Shilpa Advani', ''),
(19, 'Discrete Mathematics', 'FY', '1', 'Bachelor of Science - B.Sc (IT)', 'Leena Chawla', ''),
(20, 'Communication Skills', 'FY', '1', 'Bachelor of Science - B.Sc (IT)', 'Hrishikesh Samra', ''),
(21, 'Object oriented Programming', 'FY', '2', 'Bachelor of Science - B.Sc (IT)', 'Azhar Wagle', ''),
(22, 'Microprocessor Architecture', 'FY', '2', 'Bachelor of Science - B.Sc (IT)', 'Sirish Kata', ''),
(23, 'Web Programming', 'FY', '2', 'Bachelor of Science - B.Sc (IT)', 'Omkar Kulkarni', ''),
(24, 'Numerical and Statistical  Methods', 'FY', '2', 'Bachelor of Science - B.Sc (IT)', 'Jairam Mulchandani', ''),
(25, 'Green Computing', 'FY', '2', 'Bachelor of Science - B.Sc (IT)', 'Kiran Gurbani', ''),
(26, 'Python Programming', 'SY', '3', 'Bachelor of Science - B.Sc (IT)', 'Omkar Kulkarni', ''),
(27, 'Data Structures', 'SY', '3', 'Bachelor of Science - B.Sc (IT)', 'Hrishikesh Samra', ''),
(28, 'Computer Networks', 'SY', '3', 'Bachelor of Science - B.Sc (IT)', 'Sirish Kata', ''),
(29, 'Database Management Systems', 'SY', '3', 'Bachelor of Science - B.Sc (IT)', 'Azhar Wagle', ''),
(30, 'Applied Mathematics', 'SY', '3', 'Bachelor of Science - B.Sc (IT)', 'kiara Sangtani', ''),
(31, 'Core Java', 'SY', '4', 'Bachelor of Science - B.Sc (IT)', 'Leena Chawla', ''),
(32, 'Introduction to Embedded  Systems', 'SY', '4', 'Bachelor of Science - B.Sc (IT)', 'Shilpa Advani', ''),
(33, 'Computer Oriented Statistical  Techniques', 'SY', '4', 'Bachelor of Science - B.Sc (IT)', 'Kiran Gurbani', ''),
(34, 'Software Engineering', 'SY', '4', 'Bachelor of Science - B.Sc (IT)', 'Hrishikesh Samra', ''),
(35, 'Computer Graphics and  Animation', 'SY', '4', 'Bachelor of Science - B.Sc (IT)', 'Omkar Kulkarni', ''),
(36, 'Software Project Management', 'TY', '5', 'Bachelor of Science - B.Sc (IT)', 'kiara Sangtani', ''),
(37, 'Internet of Things', 'TY', '5', 'Bachelor of Science - B.Sc (IT)', 'Kiran Gurbani', ''),
(38, 'Advanced Web Programming', 'TY', '5', 'Bachelor of Science - B.Sc (IT)', 'Azhar Wagle', ''),
(39, 'Linux System Administration', 'TY', '5', 'Bachelor of Science - B.Sc (IT)', 'Sirish Kata', ''),
(40, 'Enterprise Java', 'TY', '5', 'Bachelor of Science - B.Sc (IT)', 'Shilpa Advani', ''),
(41, 'Software Quality Assurance', 'TY', '6', 'Bachelor of Science - B.Sc (IT)', 'Leena Chawla', ''),
(42, 'Security in Computing', 'TY', '6', 'Bachelor of Science - B.Sc (IT)', 'Jairam Mulchandani', ''),
(43, 'Business Intelligence', 'TY', '6', 'Bachelor of Science - B.Sc (IT)', 'kiara Sangtani', ''),
(44, 'Principles of Geographic Information Systems', 'TY', '6', 'Bachelor of Science - B.Sc (IT)', 'Sirish Kata', ''),
(45, 'IT Service Management', 'TY', '6', 'Bachelor of Science - B.Sc (IT)', 'Azhar Wagle', ''),
(46, 'Foundation of Human Skills', 'FY', '1', 'Bachelor of Management Studies - BMS', 'Narmada Yohannan', ''),
(47, 'Introduction to Financial Accounts', 'FY', '1', 'Bachelor of Management Studies - BMS', 'Radheshyam Tank', ''),
(48, 'Principles of Management?I', 'FY', '1', 'Bachelor of Management Studies - BMS', 'Nishi Edwin', ''),
(49, 'Business Statistics', 'FY', '1', 'Bachelor of Management Studies - BMS', 'Chinmay Dua', ''),
(50, 'Business Communication', 'FY', '1', 'Bachelor of Management Studies - BMS', 'Geetanjali Maraj', ''),
(51, 'Business Environment', 'FY', '2', 'Bachelor of Management Studies - BMS', 'Narmada Yohannan', ''),
(52, 'Industrial Law', 'FY', '2', 'Bachelor of Management Studies - BMS', 'Radheshyam Tank', ''),
(53, 'Managerial Economics?I', 'FY', '2', 'Bachelor of Management Studies - BMS', 'Nishi Edwin', ''),
(54, 'Business Mathematics', 'FY', '2', 'Bachelor of Management Studies - BMS', 'Chinmay Dua', ''),
(55, 'Introduction to Cost Accounting', 'FY', '2', 'Bachelor of Management Studies - BMS', 'Geetanjali Maraj', ''),
(56, 'Management Accounting', 'SY', '3', 'Bachelor of Management Studies - BMS', 'Narmada Yohannan', ''),
(58, 'Managerial Economics?II', 'SY', '3', 'Bachelor of Management Studies - BMS', 'Radheshyam Tank', ''),
(59, 'Marketing Management', 'SY', '3', 'Bachelor of Management Studies - BMS', 'Nishi Edwin', ''),
(60, 'Materials Managements', 'SY', '3', 'Bachelor of Management Studies - BMS', 'Chinmay Dua', ''),
(61, 'Principles of Management?II', 'SY', '3', 'Bachelor of Management Studies - BMS', 'Geetanjali Maraj', ''),
(62, 'International Marketing?I', 'SY', '4', 'Bachelor of Management Studies - BMS', 'Narmada Yohannan', ''),
(64, 'Elements of Direct & Indirect Taxes', 'SY', '4', 'Bachelor of Management Studies - BMS', 'Nishi Edwin', ''),
(65, 'Management of Small Scale Industries', 'SY', '4', 'Bachelor of Management Studies - BMS', 'Radheshyam Tank', ''),
(66, 'Productivity & Quality Management', 'SY', '4', 'Bachelor of Management Studies - BMS', 'Chinmay Dua', ''),
(67, 'Public Relations Management', 'SY', '4', 'Bachelor of Management Studies - BMS', 'Geetanjali Maraj', ''),
(68, 'Human Resource Management', 'SY', '5', 'Bachelor of Management Studies - BMS', 'Narmada Yohannan', ''),
(69, 'Service Sector Management', 'TY', '5', 'Bachelor of Management Studies - BMS', 'Radheshyam Tank', ''),
(70, 'Financial Management', 'TY', '5', 'Bachelor of Management Studies - BMS', 'Nishi Edwin', ''),
(71, 'Elements of Logistics and Supply chain Management', 'TY', '5', 'Bachelor of Management Studies - BMS', 'Chinmay Dua', ''),
(72, 'Business Ethics and Corporate Social Responsibility', 'TY', '5', 'Bachelor of Management Studies - BMS', 'Geetanjali Maraj', ''),
(73, 'Entrepreneurship & Management of Small & Medium Enterprises', 'TY', '6', 'Bachelor of Management Studies - BMS', 'Narmada Yohannan', ''),
(74, 'Operations Research', 'TY', '6', 'Bachelor of Management Studies - BMS', 'Radheshyam Tank', ''),
(75, 'International Finance', 'TY', '6', 'Bachelor of Management Studies - BMS', 'Narmada Yohannan', ''),
(76, 'Indian Management Thought and Practices', 'TY', '6', 'Bachelor of Management Studies - BMS', 'Chinmay Dua', ''),
(77, 'Retail Management', 'TY', '6', 'Bachelor of Management Studies - BMS', 'Geetanjali Maraj', ''),
(79, 'Programming with Python- I', 'FY', '1', 'Bachelor of Science - B.Sc (CS)', 'Jairam Mulchandani', ''),
(80, 'Database Systems', 'FY', '1', 'Bachelor of Science - B.Sc (CS)', 'Leena Chawla', ''),
(81, 'Discrete Mathematics', 'FY', '1', 'Bachelor of Science - B.Sc (CS)', 'Shilpa Advani', ''),
(82, 'Programming with C', 'FY', '2', 'Bachelor of Science - B.Sc (CS)', 'kiara Sangtani', ''),
(83, '', 'FY', '2', 'Bachelor of Science - B.Sc (CS)', 'Kiran Gurbani', ''),
(84, 'Data Structures', 'FY', '2', 'Bachelor of Science - B.Sc (CS)', 'Omkar Kulkarni', ''),
(85, 'Core Java', 'SY', '3', 'Bachelor of Science - B.Sc (CS)', 'Hrishikesh Samra', ''),
(86, 'Operating Systems', 'SY', '3', 'Bachelor of Science - B.Sc (CS)', 'Sirish Kata', ''),
(87, 'Web Programming', 'SY', '3', 'Bachelor of Science - B.Sc (CS)', 'Azhar Wagle', ''),
(88, 'Advanced JAVA', 'SY', '4', 'Bachelor of Science - B.Sc (CS)', 'Jairam Mulchandani', ''),
(89, '.NET Technologies', 'SY', '4', 'Bachelor of Science - B.Sc (CS)', 'Leena Chawla', ''),
(90, ' Android Developer ', 'SY', '4', 'Bachelor of Science - B.Sc (CS)', 'Shilpa Advani', ''),
(91, 'Linux Server Administration', 'TY', '5', 'Bachelor of Science - B.Sc (CS)', 'kiara Sangtani', ''),
(92, 'Information and Network Security', 'TY', '5', 'Bachelor of Science - B.Sc (CS)', 'Kiran Gurbani', ''),
(93, 'Game Programming', 'TY', '5', 'Bachelor of Science - B.Sc (CS)', 'Omkar Kulkarni', ''),
(94, 'Cloud Computing', 'TY', '6', 'Bachelor of Science - B.Sc (CS)', 'Hrishikesh Samra', ''),
(95, 'Data Science', 'TY', '6', 'Bachelor of Science - B.Sc (CS)', 'Sirish Kata', ''),
(96, 'Ethical Hacking ', 'TY', '6', 'Bachelor of Science - B.Sc (CS)', 'Azhar Wagle', ''),
(97, 'Accountancy and Financial Management?', 'FY', '1', 'Bachelor of Commerce - B.Com (plain)', 'Prerna Vala', ''),
(98, 'Commerce–I (Business Development)', 'FY', '1', 'Bachelor of Commerce - B.Com (plain)', 'Zeeshan Balan', ''),
(99, 'Business Economics?I', 'FY', '1', 'Bachelor of Commerce - B.Com (plain)', 'Lalit Baria', ''),
(100, 'Accountancy and Financial Management?II', 'FY', '2', 'Bachelor of Commerce - B.Com (plain)', 'Yadu Cherian', ''),
(101, 'Commerce–II (Business Development)', 'FY', '2', 'Bachelor of Commerce - B.Com (plain)', 'Tanuja Savant', ''),
(102, 'Business Economics?II', 'FY', '2', 'Bachelor of Commerce - B.Com (plain)', 'Atul Dodiya', ''),
(103, 'Accountancy and Financial Management?III', 'SY', '3', 'Bachelor of Commerce - B.Com (plain)', 'Gulab Rao', ''),
(104, 'Commerce–III (Management and Finance)', 'SY', '3', 'Bachelor of Commerce - B.Com (plain)', 'Mowgli Balasubramanian', ''),
(105, 'Business Economics?III', 'SY', '3', 'Bachelor of Commerce - B.Com (plain)', 'John Singhal', ''),
(106, 'Accountancy and Financial Management?IV', 'SY', '4', 'Bachelor of Commerce - B.Com (plain)', 'Arvind Barman', ''),
(107, 'Commerce–IV (Management and Finance)', 'SY', '4', 'Bachelor of Commerce - B.Com (plain)', 'Afreen Mane', ''),
(108, 'Business Economics?IV', 'SY', '4', 'Bachelor of Commerce - B.Com (plain)', 'Omar Warrior', ''),
(109, 'Commerce–V (Marketing and Human Resource)', 'TY', '5', 'Bachelor of Commerce - B.Com (plain)', 'Prerna Vala', ''),
(110, 'Business Economics?VI', 'TY', '5', 'Bachelor of Commerce - B.Com (plain)', 'Zeeshan Balan', ''),
(111, 'Commerce–VI (Marketing and Human Resource)', 'TY', '6', 'Bachelor of Commerce - B.Com (plain)', 'Lalit Baria', ''),
(112, 'Business Economics?VI', 'TY', '6', 'Bachelor of Commerce - B.Com (plain)', 'Yadu Cherian', ''),
(113, 'Financial Accounting?I', 'FY', '1', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Tanuja Savant', ''),
(114, 'Cost Accounting?I', 'FY', '1', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Atul Dodiya', ''),
(115, 'Economics?I', 'FY', '1', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Gulab Rao', ''),
(116, 'Financial Accounting?II', 'FY', '2', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Mowgli Balasubramanian', ''),
(117, 'Auditing?I', 'FY', '2', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'John Singhal', ''),
(119, 'Auditing?I', 'FY', '2', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Arvind Barman', ''),
(120, 'Cost Accounting?II', 'SY', '3', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Afreen Mane', ''),
(121, 'Auditing?II', 'SY', '3', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Omar Warrior', ''),
(122, 'Economics?II', 'SY', '3', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Prerna Vala', ''),
(123, 'Financial Accounting?IV', 'SY', '4', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Zeeshan Balan', ''),
(124, 'Taxation?II', 'SY', '4', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Lalit Baria', ''),
(125, 'Management Accounting?', 'SY', '4', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Yadu Cherian', ''),
(126, 'Financial Accounting? V', 'TY', '5', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Tanuja Savant', ''),
(127, 'Management Accounting? II', 'TY', '5', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Atul Dodiya', ''),
(128, 'Taxation? III', 'TY', '5', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Gulab Rao', ''),
(129, 'Cost Accounting ?IV', 'TY', '6', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Arvind Barman', ''),
(130, 'Auditing? III', 'TY', '6', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Mowgli Balasubramanian', ''),
(131, 'Taxation?IV', 'TY', '6', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'John Singhal', ''),
(132, 'Environment and Management of Financial Services', 'FY', '1', 'Bachelor of Commerce - (Banking and Insurance)', 'Afreen Mane', ''),
(133, 'Principles of Management', 'FY', '1', 'Bachelor of Commerce - (Banking and Insurance)', 'Omar Warrior', ''),
(134, 'Economics?I (Micro)', 'FY', '1', 'Bachelor of Commerce - (Banking and Insurance)', 'Prerna Vala', ''),
(135, 'Principles and Practices of Banking and Insurance', 'FY', '2', 'Bachelor of Commerce - (Banking and Insurance)', 'Zeeshan Balan', ''),
(136, 'Financial Accounting', 'FY', '2', 'Bachelor of Commerce - (Banking and Insurance)', 'Lalit Baria', ''),
(137, 'Economics?II (Micro)', 'FY', '2', 'Bachelor of Commerce - (Banking and Insurance)', 'Yadu Cherian', ''),
(138, 'Laws Governing Banking and Insurance', 'SY', '3', 'Bachelor of Commerce - (Banking and Insurance)', 'Tanuja Savant', ''),
(139, 'Financial Management?I', 'SY', '3', 'Bachelor of Commerce - (Banking and Insurance)', 'Atul Dodiya', ''),
(140, 'Taxation of Financial Services', 'SY', '3', 'Bachelor of Commerce - (Banking and Insurance)', 'Gulab Rao', ''),
(141, 'Universal Banking', 'SY', '4', 'Bachelor of Commerce - (Banking and Insurance)', 'Mowgli Balasubramanian', ''),
(142, 'Financial Management?II', 'SY', '4', 'Bachelor of Commerce - (Banking and Insurance)', 'Jairam Mulchandani', ''),
(143, 'Innovations in Banking and Insurance', 'SY', '4', 'Bachelor of Commerce - (Banking and Insurance)', 'Arvind Barman', ''),
(144, 'Marketing in Banking and Insurance', 'TY', '5', 'Bachelor of Commerce - (Banking and Insurance)', 'Afreen Mane', ''),
(145, 'Financial Services Management', 'TY', '5', 'Bachelor of Commerce - (Banking and Insurance)', 'Omkar Kulkarni', ''),
(146, 'International Banking and Finance', 'TY', '5', 'Bachelor of Commerce - (Banking and Insurance)', 'Prerna Vala', ''),
(147, 'Strategic Management (Banking and Insurance)', 'TY', '6', 'Bachelor of Commerce - (Banking and Insurance)', 'Zeeshan Balan', ''),
(148, 'Central Banking', 'TY', '6', 'Bachelor of Commerce - (Banking and Insurance)', 'Lalit Baria', ''),
(149, 'Human Resource Management in Banking and Insurance', 'TY', '6', 'Bachelor of Commerce - B.Com (Accounting and Finance)', 'Yadu Cherian', ''),
(150, 'ENGLISH IN DAILY LIFE ', 'FY', '1', 'Bachelor of Arts - BA', 'Aadil Setty', ''),
(151, ' INDIVIDUAL AND SOCIETY ', 'FY', '1', 'Bachelor of Arts - BA', 'Tulsi Ray', ''),
(152, 'ENGLISH COMMUNICATION SKILLS ', 'FY', '2', 'Bachelor of Arts - BA', 'Aditya Dave', ''),
(153, 'ENGLISH AT THE WORKPLACE', 'FY', '2', 'Bachelor of Arts - BA', 'Sameedha Ahuja', ''),
(154, 'SELECTIONS FROM INDIAN WRITING: CULTURAL DIVERSITY', 'FY', '2', 'Bachelor of Arts - BA', 'Kabeer Bhandari', ''),
(155, 'WRITING AND STUDY SKILLS', 'SY', '3', 'Bachelor of Arts - BA', 'Aadil Setty', ''),
(156, 'LANGUAGE THROUGH LITERATURE', 'SY', '3', 'Bachelor of Arts - BA', 'Tulsi Ray', ''),
(157, 'BRITISH LITERATURE', 'SY', '3', 'Bachelor of Arts - BA', 'Aditya Dave', ''),
(158, 'READING & SPEAKING SKILLS', 'SY', '4', 'Bachelor of Arts - BA', 'Sameedha Ahuja', ''),
(159, 'READING THE NOVEL', 'SY', '4', 'Bachelor of Arts - BA', 'Kabeer Bhandari', ''),
(160, 'UNDERSTANDING PROSE', 'TY', '5', 'Bachelor of Arts - BA', 'Aadil Setty', ''),
(161, 'UNDERSTANDING POETRY', 'TY', '5', 'Bachelor of Arts - BA', 'Tulsi Ray', ''),
(162, 'SOFT SKILLS', 'TY', '5', 'Bachelor of Arts - BA', 'Aditya Dave', ''),
(163, 'ENGLISH LANGUAGE TEACHING ', 'TY', '5', 'Bachelor of Arts - BA', 'Sameedha Ahuja', ''),
(164, 'UNDERSTANDING DRAMA', 'TY', '6', 'Bachelor of Arts - BA', 'Kabeer Bhandari', ''),
(165, 'LANGUAGE AND LINGUISTICS', 'TY', '6', 'Bachelor of Arts - BA', 'Aadil Setty', ''),
(166, 'CREATIVE WRITING', 'TY', '6', 'Bachelor of Arts - BA', 'Tulsi Ray', ''),
(167, 'BUSINESS COMMUNICATION', 'TY', '6', 'Bachelor of Arts - BA', 'Aditya Dave', ''),
(168, 'Mechanics', 'FY', '1', 'Bachelor of Science - B.Sc (plain)', 'Pradeep Goyal', ''),
(169, 'Atomic Structure, Bonding, General Organic Chemistry & Aliphatic Hydrocarbons', 'FY', '1', 'Bachelor of Science - B.Sc (plain)', 'Lata Acharya', ''),
(170, 'Differential Calculus', 'FY', '1', 'Bachelor of Science - B.Sc (plain)', 'Zara Master', ''),
(171, 'Environmental Studies', 'FY', '1', 'Bachelor of Science - B.Sc (plain)', 'Mayawati Manda', ''),
(172, 'Thermal Physics and Statistical Mechanics', 'FY', '2', 'Bachelor of Science - B.Sc (plain)', 'Richa Sahota', ''),
(173, 'Solutions, Phase Equilibria, Conductance, Electrochemistry & Functional Group Organic Chemistry-II', 'FY', '2', 'Bachelor of Science - B.Sc (plain)', 'Pradeep Goyal', ''),
(174, 'Real Analysis', 'FY', '2', 'Bachelor of Science - B.Sc (plain)', 'Lata Acharya', ''),
(175, 'Electrical circuits and Network Skills', 'FY', '2', 'Bachelor of Science - B.Sc (plain)', 'Zara Master', ''),
(176, 'Basic Instrumentation Skills', 'SY', '3', 'Bachelor of Science - B.Sc (plain)', 'Mayawati Manda', ''),
(177, 'Renewable Energy and Energy harvesting', 'SY', '3', 'Bachelor of Science - B.Sc (plain)', 'Richa Sahota', ''),
(178, 'Weather Forecasting', 'FY', '3', 'Bachelor of Science - B.Sc (plain)', 'Pradeep Goyal', ''),
(179, 'Thermal Physics and Statistical Mechanics Lab', 'SY', '3', 'Bachelor of Science - B.Sc (plain)', 'Lata Acharya', ''),
(180, 'Waves and Optics', 'SY', '4', 'Bachelor of Science - B.Sc (plain)', 'Zara Master', ''),
(181, 'Algebra', 'SY', '4', 'Bachelor of Science - B.Sc (plain)', 'Mayawati Manda', ''),
(182, 'Green Methods in Chemistry', 'SY', '4', 'Bachelor of Science - B.Sc (plain)', 'Richa Sahota', ''),
(183, 'Waves and Optics Lab', 'SY', '4', 'Bachelor of Science - B.Sc (plain)', 'Pradeep Goyal', ''),
(184, 'Elements of Modern Physics', 'TY', '5', 'Bachelor of Science - B.Sc (plain)', 'Lata Acharya', ''),
(185, 'Analytical Methods in Chemistry', 'TY', '5', 'Bachelor of Science - B.Sc (plain)', 'Zara Master', ''),
(186, 'Instrumental Methods of Analysis', 'TY', '5', 'Bachelor of Science - B.Sc (plain)', 'Mayawati Manda', ''),
(187, 'Number Theory', 'TY', '5', 'Bachelor of Science - B.Sc (plain)', 'Richa Sahota', ''),
(188, 'Nuclear and Particle Physics', 'TY', '6', 'Bachelor of Science - B.Sc (plain)', 'Pradeep Goyal', ''),
(189, 'Mathematical Physics', 'TY', '6', 'Bachelor of Science - B.Sc (plain)', 'Lata Acharya', ''),
(190, 'Industrial Chemicals & Environment', 'TY', '6', 'Bachelor of Science - B.Sc (plain)', 'Zara Master', ''),
(191, 'IT Skills for Chemists', 'TY', '6', 'Bachelor of Science - B.Sc (plain)', 'Mayawati Manda', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_tbl`
--

CREATE TABLE `teacher_tbl` (
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `faculties_name` varchar(50) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_tbl`
--

INSERT INTO `teacher_tbl` (`teacher_id`, `f_name`, `l_name`, `faculties_name`, `gender`, `dob`, `address`, `phone`, `email`) VALUES
(10, 'Jairam', 'Mulchandani', 'Department of Information Technology', 'Male', '1986-11-08', 'Mumbai', '73537282764', 'jairam@mail.com'),
(11, 'Leena', 'Chawla', 'Department of Information Technology', 'Female', '1987-04-18', '   Mumbai', '564738363829', 'leena@gmail.com'),
(12, 'Shilpa', 'Advani', 'Department of Information Technology', 'Female', '1990-02-02', 'Mumbai', '647363538292', 'shilpa@yahoo.com'),
(13, 'kiara', 'Sangtani', 'Department of Information Technology', 'Female', '1988-06-10', 'Mumbai', '528393763839', 'kiara@gmail.com'),
(14, 'Kiran', 'Gurbani', 'Department of Information Technology', 'Female', '1985-10-21', 'Mumbai', '98276929298', 'kiran@gmail.com'),
(15, 'Omkar', 'Kulkarni', 'Department of Information Technology', 'Male', '1987-09-15', 'Mumbai', '65252799732', 'omkar@mail.com'),
(20, 'Hrishikesh', 'Samra', 'Department of Information Technology', 'Male', '1987-08-18', 'Mumbai', '6373836548', 'hrishikesh@ymail.com'),
(21, 'Sirish', 'Kata', 'Department of Information Technology', 'Male', '1986-04-07', 'Mumbai', '65252799637', 'sirish@gmail.com'),
(22, 'Azhar', 'Wagle', 'Department of Information Technology', 'Male', '1985-09-21', 'Mumbai', '52736464738', 'azhar@mail.com'),
(23, 'Narmada', 'Yohannan', 'Department of Managemant Studies', 'Female', '1988-05-05', 'Mumbai', '83646484933', 'narmada@gmail.com'),
(24, 'Radheshyam', 'Tank', 'Department of Managemant Studies', 'Male', '1990-07-14', 'Mumbai', '56484937322', 'shyam@mail.com'),
(25, 'Nishi', 'Edwin', 'Department of Managemant Studies', 'Female', '1991-09-02', 'Mumbai', '867564839333', 'nishi@gmail.com'),
(26, 'Chinmay', 'Dua', 'Department of Managemant Studies', 'Male', '1986-09-05', 'Mumbai', '98685464839', 'chinmay@mail.com'),
(27, 'Geetanjali', 'Maraj', 'Department of Managemant Studies', 'Female', '1987-11-05', 'Mumbai', '9854376898', 'geeta@mail.com'),
(28, 'Prerna', 'Vala', 'Department of Commerce', 'Female', '1992-03-15', 'Mumbai', '98575784943', 'prerna@mail.com'),
(29, 'Zeeshan', 'Balan', 'Department of Commerce', 'Male', '1988-12-06', 'Mumbai', '7353756789', 'zeeshan@gmail.com'),
(30, 'Lalit', 'Baria', 'Department of Commerce', 'Male', '1987-02-22', 'Mumbai', '846r4748939', 'lalit@yahoo.com'),
(31, 'Yadu', 'Cherian', 'Department of Commerce', 'Female', '1991-05-02', 'Mumbai', '857575893733', 'yadu@mail.com'),
(32, 'Tanuja', 'Savant', 'Department of Commerce', 'Female', '1989-06-19', 'Mumbai', '857473839372', 'tanuja@gmail.com'),
(33, 'Atul', 'Dodiya', 'Department of Commerce', 'Male', '1988-09-29', 'Mumbai', '745468836363', 'atul@gmail.com'),
(34, 'Gulab', 'Rao', 'Department of Commerce', 'Female', '1989-04-19', 'Mumbai', '97363672822', 'gulab@gmail.com'),
(35, 'Mowgli', 'Balasubramanian', 'Department of Commerce', 'Male', '1994-04-07', 'Mumbai', '87637390282', 'mowgli@mail.com'),
(36, 'John', 'Singhal', 'Department of Commerce', 'Male', '1990-02-04', 'Mumbai', '43536378222', 'john@mail.com'),
(37, 'Arvind', 'Barman', 'Department of Commerce', 'Male', '1986-08-14', 'Mumbai', '83536373732', 'arvind@gmail.com'),
(38, 'Afreen', 'Mane', 'Department of Commerce', 'Female', '1992-09-07', 'Mumbai', '63243637322', 'afreen@mail.com'),
(39, 'Omar', 'Warrior', 'Department of Commerce', 'Male', '1987-10-12', 'Mumbai', '844573839233', 'omar@mail.com'),
(40, 'Aadil', 'Setty', 'Department of Arts', 'Male', '1986-03-03', 'Mumbai', '62436372892', 'aadil@mail.com'),
(41, 'Tulsi', 'Ray', 'Department of Arts', 'Female', '1992-03-19', 'Mumbai', '836468392737', 'tulsi@gmail.com'),
(42, 'Aditya', 'Dave', 'Department of Arts', 'Male', '1988-03-09', 'Mumbai', '4343637282', 'aditya@mail.com'),
(43, 'Sameedha', 'Ahuja', 'Department of Arts', 'Female', '1990-08-03', 'Mumbai', '65435363822', 'sameedha@yahoo.com'),
(44, 'Kabeer', 'Bhandari', 'Department of Arts', 'Male', '1985-12-06', 'Mumbai', '75454637382', 'kabeer@mail.com'),
(45, 'Pradeep', 'Goyal', 'Department of Science', 'Male', '1988-03-05', 'Mumbai', '634537396373', 'pradeep@mail.com'),
(46, 'Lata', 'Acharya', 'Department of Science', 'Female', '1987-03-12', 'Mumbai', '53748464647', 'lata@mail.com'),
(47, 'Zara', 'Master', 'Department of Science', 'Female', '1990-10-09', 'Mumbai', '535474838732', 'zara@yahoo.com'),
(48, 'Mayawati', 'Manda', 'Department of Science', 'Female', '1986-08-03', 'Mumbai', '846474847342', 'mayawati@mail.com'),
(49, 'Richa', 'Sahota', 'Department of Science', 'Female', '1987-03-04', 'Mumbai', '84645637382', 'richa@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `u_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` char(10) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`u_id`, `username`, `password`, `type`, `note`) VALUES
(1, 'admin', 'admin', 'clg staffs', ''),
(2, 'admin', 'admin', 'clg staffs', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `faculties_name` (`faculties_name`),
  ADD KEY `course_name` (`course_name`,`faculties_name`);

--
-- Indexes for table `enquiries_tbl`
--
ALTER TABLE `enquiries_tbl`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `facuties_tbl`
--
ALTER TABLE `facuties_tbl`
  ADD PRIMARY KEY (`faculties_id`),
  ADD KEY `faculties_name` (`faculties_name`);

--
-- Indexes for table `new_appilcations_tbl`
--
ALTER TABLE `new_appilcations_tbl`
  ADD PRIMARY KEY (`a_no`);

--
-- Indexes for table `stu_score_tbl`
--
ALTER TABLE `stu_score_tbl`
  ADD PRIMARY KEY (`ss_id`),
  ADD KEY `student_name` (`student_name`,`course_name`,`subject_name`,`class`);

--
-- Indexes for table `stu_tbl`
--
ALTER TABLE `stu_tbl`
  ADD PRIMARY KEY (`stu_id`),
  ADD KEY `f_name` (`f_name`,`l_name`,`course_name`,`fees_paid`);

--
-- Indexes for table `sub_tbl`
--
ALTER TABLE `sub_tbl`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `sub_name` (`sub_name`),
  ADD KEY `sub_name_2` (`sub_name`),
  ADD KEY `sub_name_3` (`sub_name`,`semester`,`course_name`,`teacher_name`);

--
-- Indexes for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `f_name` (`f_name`,`l_name`,`faculties_name`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `enquiries_tbl`
--
ALTER TABLE `enquiries_tbl`
  MODIFY `e_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `facuties_tbl`
--
ALTER TABLE `facuties_tbl`
  MODIFY `faculties_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `new_appilcations_tbl`
--
ALTER TABLE `new_appilcations_tbl`
  MODIFY `a_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stu_score_tbl`
--
ALTER TABLE `stu_score_tbl`
  MODIFY `ss_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stu_tbl`
--
ALTER TABLE `stu_tbl`
  MODIFY `stu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sub_tbl`
--
ALTER TABLE `sub_tbl`
  MODIFY `sub_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  MODIFY `teacher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `u_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
