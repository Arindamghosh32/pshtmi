-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 12:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pshtm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(225) NOT NULL,
  `admin_username` varchar(225) NOT NULL,
  `admin_password` varchar(225) NOT NULL,
  `status` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `status`) VALUES
(1, 'adminone', 'admin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `num` int(225) NOT NULL,
  `word` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`num`, `word`) VALUES
(30, 'one'),
(40, 'two'),
(50, 'three'),
(70, 'four'),
(60, 'five'),
(80, 'six');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(225) NOT NULL,
  `emp_first_name` varchar(225) NOT NULL,
  `emp_last_name` varchar(225) NOT NULL,
  `emp_department` varchar(225) NOT NULL,
  `emp_job_post` varchar(225) NOT NULL,
  `emp_email` varchar(225) NOT NULL,
  `emp_phone` int(225) NOT NULL,
  `emp_image` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `emp_first_name`, `emp_last_name`, `emp_department`, `emp_job_post`, `emp_email`, `emp_phone`, `emp_image`, `status`) VALUES
(3, 'person', 'one', 'deptone', 'posttwo', 'x@gmail.com', 1234567890, 'profile (1).png', 'deactivated'),
(4, 'person', 'two', 'deptone', 'postone', 'one@gmail.com', 987654321, 'profile (3).png', 'deactivated'),
(5, 'person', 'three', 'deptone', 'postone', 'two@gmail.com', 987809876, 'profile (4).png', 'deactivated'),
(6, 'person', 'three', 'deptone', 'postone', 'two@gmail.com', 987809876, 'profile (4).png', 'active'),
(7, 'experement', 'one', 'deptone', 'postone', 'exp@gmail.com', 1234512345, 'profile (1).png', 'active'),
(10, 'test', 'user', 'deptthree\r\n                                                                                 ', 'posttwo', 'test@gmail.com', 1234509876, 'profile (2).png', 'deactivated'),
(11, 'xone', 'xtwo', 'deptone', 'postone', 'xone@gmail.com', 1209348756, 'profile (3).png', 'deactivated'),
(12, 'yone', 'ytwo', 'deptone', 'posttwo', 'yone@gmail.com', 2147483647, 'profile (4).png', 'deactivated'),
(13, 'y', 'y', 'deptone', 'postone', 'x@gmail.com', 2147483647, 'profile (3).png', 'active'),
(14, 'b', 'b', 'deptone', 'posttwo', 'b@gmail.com', 1029394857, 'profile (2).png', 'active'),
(15, 'rsfuy', 'tudfgt', 'deptone', 'ftdf', 'twesto@gmail.com', 1234567890, 'profile (1).png', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `emp_department`
--

CREATE TABLE `emp_department` (
  `emp_department_id` int(225) NOT NULL,
  `emp_department_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_department`
--

INSERT INTO `emp_department` (`emp_department_id`, `emp_department_name`) VALUES
(1, 'deptone'),
(2, 'deptthree\r\n                                                                                 '),
(3, 'deptthree'),
(4, 'deptfour');

-- --------------------------------------------------------

--
-- Table structure for table `emp_job_post`
--

CREATE TABLE `emp_job_post` (
  `emp_job_post_id` int(225) NOT NULL,
  `emp_job_post` varchar(225) NOT NULL,
  `emp_dept` varchar(225) NOT NULL,
  `emp_dept_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_job_post`
--

INSERT INTO `emp_job_post` (`emp_job_post_id`, `emp_job_post`, `emp_dept`, `emp_dept_id`) VALUES
(4, 'ftdf', 'deptthree\r\n                                                                                 ', '2'),
(5, 'emp pst one', 'deptone', '1'),
(6, 'emp pst two', 'deptfour', '4');

-- --------------------------------------------------------

--
-- Table structure for table `postq`
--

CREATE TABLE `postq` (
  `postq_id` int(225) NOT NULL,
  `question_title` varchar(225) NOT NULL,
  `training_id` int(225) NOT NULL,
  `training_name` varchar(225) NOT NULL,
  `dept_id` int(225) NOT NULL,
  `dept_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postq`
--

INSERT INTO `postq` (`postq_id`, `question_title`, `training_id`, `training_name`, `dept_id`, `dept_name`) VALUES
(1, 'paper one post', 2, 'trtwo', 1, 'deptone'),
(5, 'paper two post', 1, 'trone', 3, 'deptthree');

-- --------------------------------------------------------

--
-- Table structure for table `postq_data`
--

CREATE TABLE `postq_data` (
  `q_id` int(225) NOT NULL,
  `postq_id` int(225) NOT NULL,
  `question` varchar(225) NOT NULL,
  `input_type` varchar(225) NOT NULL,
  `opt1` varchar(225) NOT NULL,
  `opt2` varchar(225) NOT NULL,
  `opt3` varchar(225) NOT NULL,
  `opt4` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postq_data`
--

INSERT INTO `postq_data` (`q_id`, `postq_id`, `question`, `input_type`, `opt1`, `opt2`, `opt3`, `opt4`) VALUES
(2, 5, 'dahyxijgdbnsfhfxzjhjdg', 'number', '', '', '', ''),
(3, 5, 'zbvzcb', 'number', '', '', '', ''),
(4, 5, 'zdxsfn', 'number', '', '', '', ''),
(5, 5, 'daggdadg', 'number', '', '', '', ''),
(6, 5, 'daggdadg', 'number', '', '', '', ''),
(7, 5, 'Vx', 'number', '', '', '', ''),
(8, 5, 'qetgqwegyt', 'number', '', '', '', ''),
(9, 5, 'wdgtswg', 'text', '', '', '', ''),
(10, 5, 'fjhfsjsdj', 'text', '', '', '', ''),
(11, 5, 'vnx', 'number', '', '', '', ''),
(12, 5, 'fhgdsfh', 'number', '', '', '', ''),
(13, 5, 'dagb', 'textarea', '', '', '', ''),
(14, 5, 'sfhsfhsfhsf', 'mcq', 'ss', 'sdf', 'sde', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `preq`
--

CREATE TABLE `preq` (
  `preq_id` int(225) NOT NULL,
  `question_title` varchar(225) NOT NULL,
  `training_id` int(225) NOT NULL,
  `training_name` varchar(225) NOT NULL,
  `dept_id` int(225) NOT NULL,
  `dept_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preq`
--

INSERT INTO `preq` (`preq_id`, `question_title`, `training_id`, `training_name`, `dept_id`, `dept_name`) VALUES
(2, 'paper one pre', 1, 'trone', 2, 'deptthree\r\n                                                                                 '),
(4, 'paper three pre', 2, 'trtwo', 4, 'deptfour');

-- --------------------------------------------------------

--
-- Table structure for table `preq_data`
--

CREATE TABLE `preq_data` (
  `q_id` int(11) NOT NULL,
  `preq_id` int(225) NOT NULL,
  `question` varchar(225) NOT NULL,
  `input_type` varchar(225) NOT NULL,
  `opt1` varchar(225) NOT NULL,
  `opt2` varchar(225) NOT NULL,
  `opt3` varchar(225) NOT NULL,
  `opt4` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preq_data`
--

INSERT INTO `preq_data` (`q_id`, `preq_id`, `question`, `input_type`, `opt1`, `opt2`, `opt3`, `opt4`) VALUES
(2, 2, 'adgasdgasdg', 'number', '', '', '', ''),
(3, 2, 'bzsfcbnzxcn', 'textarea', '', '', '', ''),
(4, 2, 'ewgfaegtagh', 'mcq', 'sw', 'a', 's', 'saf'),
(5, 2, 'etujedikJdgjdgjkdgjdgj', 'text', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pre_answer`
--

CREATE TABLE `pre_answer` (
  `ans_id` int(225) NOT NULL,
  `preq_id` int(225) NOT NULL,
  `q_id` int(225) NOT NULL,
  `answer` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pre_answer`
--

INSERT INTO `pre_answer` (`ans_id`, `preq_id`, `q_id`, `answer`) VALUES
(1, 0, 2, '1111'),
(2, 0, 3, 'aaaaaa'),
(3, 0, 4, 'a'),
(4, 0, 5, 'bbbbb'),
(5, 2, 2, '22222'),
(6, 2, 3, 'xxxxxxx'),
(7, 2, 4, 'a'),
(8, 2, 5, 'yyyyyyy');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `training_id` int(225) NOT NULL,
  `training_name` varchar(225) NOT NULL,
  `tr_desc` varchar(225) NOT NULL,
  `duration` int(225) NOT NULL,
  `dept_id` int(225) NOT NULL,
  `dept_name` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`training_id`, `training_name`, `tr_desc`, `duration`, `dept_id`, `dept_name`, `status`) VALUES
(1, 'trone', 'sfjdgjdgkfhkfhzkfhykfh', 3, 1, 'deptone', 'active'),
(2, 'trtwo', 'dfjhdjgdgkjfdghk', 7, 2, 'deptthree\r\n                                                                                 ', 'active'),
(3, 'xfh', 'fsxhsfjdsfjdsgfjxfhhsfxhjsfjggds', 4, 2, 'deptthree\r\n                                                                                 ', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `emp_department`
--
ALTER TABLE `emp_department`
  ADD PRIMARY KEY (`emp_department_id`);

--
-- Indexes for table `emp_job_post`
--
ALTER TABLE `emp_job_post`
  ADD PRIMARY KEY (`emp_job_post_id`);

--
-- Indexes for table `postq`
--
ALTER TABLE `postq`
  ADD PRIMARY KEY (`postq_id`);

--
-- Indexes for table `postq_data`
--
ALTER TABLE `postq_data`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `preq`
--
ALTER TABLE `preq`
  ADD PRIMARY KEY (`preq_id`);

--
-- Indexes for table `preq_data`
--
ALTER TABLE `preq_data`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `pre_answer`
--
ALTER TABLE `pre_answer`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`training_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `emp_department`
--
ALTER TABLE `emp_department`
  MODIFY `emp_department_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emp_job_post`
--
ALTER TABLE `emp_job_post`
  MODIFY `emp_job_post_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `postq`
--
ALTER TABLE `postq`
  MODIFY `postq_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `postq_data`
--
ALTER TABLE `postq_data`
  MODIFY `q_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `preq`
--
ALTER TABLE `preq`
  MODIFY `preq_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `preq_data`
--
ALTER TABLE `preq_data`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pre_answer`
--
ALTER TABLE `pre_answer`
  MODIFY `ans_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `training_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
