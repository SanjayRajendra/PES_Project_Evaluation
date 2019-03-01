-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 10:37 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `email` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`email`, `username`, `password`) VALUES
('sanjayawate37@gmail.com', 'sanjay', '66f974a8b91174539b43aa3b9028b7530cca6eb1');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation1`
--

CREATE TABLE `evaluation1` (
  `student_srn` varchar(20) NOT NULL,
  `application_realworld` int(2) NOT NULL,
  `title` int(2) NOT NULL,
  `method` int(2) NOT NULL,
  `presentation` int(2) NOT NULL,
  `viva` int(2) NOT NULL,
  `total` int(2) NOT NULL,
  `remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation2`
--

CREATE TABLE `evaluation2` (
  `student_srn` varchar(20) NOT NULL,
  `progress` int(2) NOT NULL,
  `presentation` int(2) NOT NULL,
  `method` int(2) NOT NULL,
  `viva` int(2) NOT NULL,
  `total` int(2) NOT NULL,
  `remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation3`
--

CREATE TABLE `evaluation3` (
  `student_srn` varchar(12) NOT NULL,
  `progress` int(2) NOT NULL,
  `presentation` int(2) NOT NULL,
  `viva` int(2) NOT NULL,
  `total` int(2) NOT NULL,
  `remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation4`
--

CREATE TABLE `evaluation4` (
  `student_srn` varchar(12) NOT NULL,
  `progress` int(2) NOT NULL,
  `presentation` int(2) NOT NULL,
  `discussion` int(2) NOT NULL,
  `viva` int(2) NOT NULL,
  `total` int(2) NOT NULL,
  `remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation5`
--

CREATE TABLE `evaluation5` (
  `student_srn` varchar(12) NOT NULL,
  `formulation` int(2) NOT NULL,
  `review` int(2) NOT NULL,
  `discussion` int(2) NOT NULL,
  `method` int(2) NOT NULL,
  `originality` int(2) NOT NULL,
  `contribution` int(2) NOT NULL,
  `presentation` int(2) NOT NULL,
  `viva` int(2) NOT NULL,
  `total` float NOT NULL,
  `remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `title` varchar(4) NOT NULL,
  `empid` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) NOT NULL,
  `department` varchar(40) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `exp_in_pes` int(5) DEFAULT '0',
  `exp_non_pes` int(5) DEFAULT '0',
  `spl_area` text,
  `research_area` text,
  `email` varchar(25) NOT NULL,
  `phoneno` varchar(13) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `Eligibility` varchar(5) NOT NULL DEFAULT 'no',
  `ug_projects` int(1) NOT NULL DEFAULT '0',
  `pg_projects` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`title`, `empid`, `name`, `mname`, `lname`, `department`, `designation`, `exp_in_pes`, `exp_non_pes`, `spl_area`, `research_area`, `email`, `phoneno`, `password`, `Eligibility`, `ug_projects`, `pg_projects`) VALUES
('Mr', '1000', 'BADRIPRASAD', '', 'SIR', 'Computer Science and Engineering', 'Associate Professor', 5, 5, 'Make sure that all words are spelled correctly.', 'A wiki is run using wiki software, otherwise known as a wiki engine. A wiki engine is a type of content management system, but it differs from most other such systems, including blog software, in that the content is created without any defined owner or leader, and wikis have little implicit structure, allowing structure to emerge according to the needs of the users.', 'sanjusrn37@gmail.com', '9213456978', '70c881d4a26984ddce795f6f71817c9cf4480e79', 'yes', 3, 2),
('Mr', '1001', 'DINESH', '', 'SIR', 'Computer Science and Engineering', 'Associate Professor', 6, NULL, 'Try different keywords.', 'There are dozens of different wiki engines in use, both standalone and part of other software, such as bug tracking systems. Some wiki engines are open source, whereas others are proprietary. Some permit control over different functions (levels of access); ', 'dineshsir@gmail.com', '8521479632', '70c881d4a26984ddce795f6f71817c9cf4480e79', 'yes', 1, 1),
('Mrs', '1002', 'PRAFULLATA', '', 'MAM', 'Computer Science and Engineering', 'Associate Professor', 8, NULL, 'competitive Academy Awards from a total of fifty-nine nominations, and holds the records for most wins and most nominations for an individual in history. Disney won his first competitive Academy Award and received his first Honorary Academy Award at the 5th Academy Awards (1932). He received the Honorary Academy Award for the creation of Mickey Mouse and won the', 'competitive Academy Awards from a total of fifty-nine nominations, and holds the records for most wins and most nominations for an individual in history. Disney won his first competitive Academy Award and received his first Honorary Academy Award at the 5th Academy Awards (1932). He received the Honorary Academy Award for the creation of Mickey Mouse and won the', 'prafullata1002@pes.edu', '9586858696', '70c881d4a26984ddce795f6f71817c9cf4480e79', 'yes', 1, 2),
('Mr', '1003', 'CHANNA', '', 'SIR', 'Computer Science and Engineering', 'Professor', 6, NULL, 'novels, short stories, a play, poetry, essays, and screenplays, he is primarily known for his works set in the fictional Yoknapatawpha County. Faulkner\'s work was published widely during the 1920s and 1930s, but he remained relatively unknown until receiving the 1949 Nobel Prize in Literature. Two of his works, A Fable (1954) and The Reivers (1962), won the Pulitzer Prize for Fiction. Today, Faulkner is one of the most celebrated writers in American literature.', 'novels, short stories, a play, poetry, essays, and screenplays, he is primarily known for his works set in the fictional Yoknapatawpha County. Faulkner\'s work was published widely during the 1920s and 1930s, but he remained relatively unknown until receiving the 1949 Nobel Prize in Literature. Two of his works, A Fable (1954) and The Reivers (1962), won the Pulitzer Prize for Fiction. Today, Faulkner is one of the most celebrated writers in American literature.', 'channa1003@gmail.com', '9595969693', '70c881d4a26984ddce795f6f71817c9cf4480e79', 'yes', 2, 3),
('Mr', '1004', 'CHIDAMBARA', '', 'SIR', 'Computer Science and Engineering', 'Professor', 6, 10, 'List pages enumerate items of a particular type, such as the List of sovereign states or List of South Africans. Wikipedia has \"lists of lists\" when there are too many items to fit on a single page, when the items can sorted in different ways, or as a way of navigating lists on a topic (for example Lists of countries and territories or Lists of people). There are several ways to find lists:', 'List pages enumerate items of a particular type, such as the List of sovereign states or List of South Africans. Wikipedia has \"lists of lists\" when there are too many items to fit on a single page, when the items can sorted in different ways, or as a way of navigating lists on a topic (for example Lists of countries and territories or Lists of people). There are several ways to find lists:', 'chidambara1004@gmail.com', '8989858487', '70c881d4a26984ddce795f6f71817c9cf4480e79', 'yes', 2, 0),
('Mrs', '1005', 'BHAGYA', '', 'MAM', 'Computer Science and Engineering', 'Professor', 20, 15, 'In computer science and computer programming, a data type or simply type is a classification of data which tells the compiler or interpreter how the programmer intends to use the data. Most programming languages support various types of data, for example: real, integer or Boolean. A data type provides a set of values from which an expression (i.e. variable, function ...) may take its values. The type defines the operations that can be done on the data,', 'In computer science and computer programming, a data type or simply type is a classification of data which tells the compiler or interpreter how the programmer intends to use the data. Most programming languages support various types of data, for example: real, integer or Boolean. A data type provides a set of values from which an expression (i.e. variable, function ...) may take its values. The type defines the operations that can be done on the data,', 'bhagya1005@gmail.com', '8985828145', '70c881d4a26984ddce795f6f71817c9cf4480e79', 'yes', 0, 0),
('Mrs', '1006', 'blezy', '', 'sam', 'Computer Science and Engineering', 'Associate Professor', NULL, NULL, '', '', 'blezy@pes.edu', '8795452121', '70c881d4a26984ddce795f6f71817c9cf4480e79', 'no', 0, 0),
('Ms', '1007', 'PREET', '', 'MAM', 'Computer Science and Engineering', 'Assistant Professor', 2, NULL, 'r example, in the Java programming language, the \"int\" type represents the set of 32-bit integers ranging in value from -2,147,483,648 to 2,147,483,647, as well as the operations that can be performed on integers, such as addition, subtraction, and multiplication. Colors, on the other hand, are represented by three bytes denoting the amounts each of red, green, and blue, and one string representing th', 'r example, in the Java programming language, the \"int\" type represents the set of 32-bit integers ranging in value from -2,147,483,648 to 2,147,483,647, as well as the operations that can be performed on integers, such as addition, subtraction, and multiplication. Colors, on the other hand, are represented by three bytes denoting the amounts each of red, green, and blue, and one string representing th', 'preet1006@gmail.com', '8985265314', '70c881d4a26984ddce795f6f71817c9cf4480e79', 'yes', 0, 0),
('Mr', '1008', 'SHRIKANTH', '', 'SIR', 'Computer Science and Engineering', 'Assistant Professor', 10, 6, 'Machine data types need to be exposed or made available in systems or low-level programming languages, allowing fine-grained control over hardware. The C programming language, for instance, supplies integer types of various widths, such as short and long. If a corresponding native type does not exist on the target platform, the compiler will break them down into code using types that do exist. For instan', 'Machine data types need to be exposed or made available in systems or low-level programming languages, allowing fine-grained control over hardware. The C programming language, for instance, supplies integer types of various widths, such as short and long. If a corresponding native type does not exist on the target platform, the compiler will break them down into code using types that do exist. For instan', 'shrikanth1008@gmail.com', '9852456587', '70c881d4a26984ddce795f6f71817c9cf4480e79', 'yes', 2, 0),
('Mr', '1009', 'QWERTYUIOPLKJHG', 'QWERTTYTHT', 'QWERTYUIJUYHNBG', 'Computer Science and Engineering', 'Professor', 5, 5, 'wazsexdcrftvgybhunjimkomiuytr4w3aq3wsedrftgyhuop', 'wexrctvybunimokj7ts4wasexrdcfgvhbjniu8y7t65resrdtcfgvhb', 'sanjbdsfw@gmail.com', '7894561236', '70c881d4a26984ddce795f6f71817c9cf4480e79', 'yes', 0, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `faculty_login`
-- (See below for the actual view)
--
CREATE TABLE `faculty_login` (
`username` varchar(10)
,`password` varchar(45)
);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_specialisation`
--

CREATE TABLE `faculty_specialisation` (
  `empid` varchar(15) NOT NULL,
  `specialisation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_specialisation`
--

INSERT INTO `faculty_specialisation` (`empid`, `specialisation`) VALUES
('1000', 'Web Technology'),
('1000', 'Algorithms & Computing Models'),
('1000', 'System & Core Computing'),
('1001', 'Data Science'),
('1001', 'Artificial Intelligence'),
('1001', 'Computer Network & Communications'),
('1002', 'Artificial Intelligence'),
('1002', 'System & Core Computing'),
('1003', 'Data Science'),
('1003', 'Algorithms & Computing Models'),
('1003', 'Artificial Intelligence'),
('1003', 'System & Core Computing'),
('1004', 'System & Core Computing'),
('1004', 'Computer Network & Communications'),
('1005', 'Web Technology'),
('1005', 'Data Science'),
('1005', 'Algorithms & Computing Models'),
('1005', 'Artificial Intelligence'),
('1005', 'System & Core Computing'),
('1005', 'Computer Network & Communications'),
('1007', 'Data Science'),
('1007', 'Algorithms & Computing Models'),
('1008', 'Web Technology'),
('1008', 'Data Science'),
('1008', 'Artificial Intelligence'),
('1008', 'System & Core Computing'),
('1008', 'Computer Network & Communications'),
('1009', 'Web Technology'),
('1009', 'Data Science'),
('1009', 'Algorithms & Computing Models'),
('1009', 'Artificial Intelligence'),
('1009', 'System & Core Computing'),
('1009', 'Computer Network & Communications');

-- --------------------------------------------------------

--
-- Stand-in structure for view `marks_view`
-- (See below for the actual view)
--
CREATE TABLE `marks_view` (
`project_id` varchar(20)
,`student_id` varchar(15)
,`fname` varchar(35)
,`mname` varchar(20)
,`lname` varchar(20)
,`fn` varchar(30)
,`fm` varchar(20)
,`fl` varchar(20)
,`name` varchar(100)
,`e1` int(2)
,`e2` int(2)
,`e3` int(2)
,`e4` int(2)
,`e5` float
);

-- --------------------------------------------------------

--
-- Table structure for table `panel`
--

CREATE TABLE `panel` (
  `panel_id` int(2) NOT NULL,
  `area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panel`
--

INSERT INTO `panel` (`panel_id`, `area`) VALUES
(1, 'System & Core Computing'),
(2, 'Web Technology');

-- --------------------------------------------------------

--
-- Stand-in structure for view `panel_assign`
-- (See below for the actual view)
--
CREATE TABLE `panel_assign` (
`id` varchar(20)
,`panel_id` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `panel_members`
--

CREATE TABLE `panel_members` (
  `panel_id` int(2) NOT NULL,
  `empid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panel_members`
--

INSERT INTO `panel_members` (`panel_id`, `empid`) VALUES
(1, '1002'),
(1, '1003'),
(1, '1009'),
(2, '1000'),
(2, '1001'),
(2, '1005'),
(2, '1008');

-- --------------------------------------------------------

--
-- Stand-in structure for view `panel_view`
-- (See below for the actual view)
--
CREATE TABLE `panel_view` (
`srn` varchar(12)
,`fname` varchar(35)
,`mname` varchar(20)
,`lname` varchar(20)
,`id` varchar(20)
,`name` varchar(100)
,`project_area` varchar(50)
,`fs` varchar(30)
,`fm` varchar(20)
,`fl` varchar(20)
,`panel_id` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `guide_id` varchar(10) NOT NULL,
  `project_area` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `date` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `code_upload` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `guide_id`, `project_area`, `description`, `remarks`, `date`, `status`, `code_upload`) VALUES
('2018CS001', 'wsedrtyui', '1000', 'Web Technology', 'exrctvybuhnjikml,', 'ertgyui', '24-05-2018', 'pending', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `project_1phase`
--

CREATE TABLE `project_1phase` (
  `project_id` varchar(9) NOT NULL,
  `file` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_1phase`
--

INSERT INTO `project_1phase` (`project_id`, `file`, `date`) VALUES
('2017CS001', 'userfile', '2017-10-12'),
('2017CS001', 'userfile', '2017-10-12'),
('2017CS001', 'userfile', '2017-10-12'),
('2017CS001', 'userfile', '2017-10-12'),
('2017CS001', 'userfile', '2017-10-12'),
('2017CS001', 'userfile', '2017-10-12'),
('2017CS001', 'userfile', '2017-10-13'),
('2018CS003', 'userfile', '2018-01-17'),
('2018CS001', 'userfile', '2018-01-31'),
('2018CS001', 'userfile', '2018-01-31'),
('2018CS009', 'userfile', '2018-03-06'),
('2018CS009', 'userfile', '2018-03-06'),
('2018CS002', 'userfile', '2018-03-23'),
('2018CS002', 'userfile', '2018-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `max_students` int(2) NOT NULL,
  `max_faculty` int(2) NOT NULL,
  `no_students` int(3) NOT NULL,
  `no_faculty` int(3) NOT NULL,
  `start_date` varchar(12) NOT NULL,
  `end_date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`max_students`, `max_faculty`, `no_students`, `no_faculty`, `start_date`, `end_date`) VALUES
(3, 3, 400, 52, '2017-09-28', '2017-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `project_team`
--

CREATE TABLE `project_team` (
  `project_id` varchar(20) NOT NULL,
  `student_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_team`
--

INSERT INTO `project_team` (`project_id`, `student_id`) VALUES
('2018CS001', '01fb15ecs249'),
('2018CS001', '01FB15ECS265');

-- --------------------------------------------------------

--
-- Stand-in structure for view `project_view`
-- (See below for the actual view)
--
CREATE TABLE `project_view` (
`srn` varchar(12)
,`fname` varchar(35)
,`mname` varchar(20)
,`lname` varchar(20)
,`id` varchar(20)
,`name` varchar(100)
,`project_area` varchar(50)
,`fm` varchar(30)
,`fn` varchar(20)
,`fl` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `program` varchar(20) NOT NULL DEFAULT 'B.Tech',
  `srn` varchar(12) NOT NULL,
  `fname` varchar(35) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `year` varchar(10) NOT NULL,
  `sem` int(1) NOT NULL,
  `section` varchar(1) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phoneno` varchar(13) DEFAULT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`program`, `srn`, `fname`, `mname`, `lname`, `branch`, `year`, `sem`, `section`, `email`, `phoneno`, `password`) VALUES
('B.Tech', '01FB15ECS223', 'RAVI ', 'MARUTI', 'KHOT', 'CSE', '2017-2018', 6, 'D', 'ravikhot210@gmail.com', '8965896589', '70c881d4a26984ddce795f6f71817c9cf4480e79'),
('B.Tech', '01FB15ECS248', 'RUTHWIK', '', 'G', 'CSE', '2018-2019', 7, 'E', 'ruthwik@gmail.com', '8888888888', '70c881d4a26984ddce795f6f71817c9cf4480e79'),
('B.Tech', '01fb15ecs249', 'RAJESH', '', 'S', 'CSE', '2018-2019', 7, 'E', 'rajesh.pesu@gmail.com', '8431655328', '70c881d4a26984ddce795f6f71817c9cf4480e79'),
('B.Tech', '01FB15ECS265', 'SANJAY', 'RAJENDRA', 'AWATE', 'CSE', '17-18', 5, 'E', 'sanjayawate37@gmail.com', '8762464337', '70c881d4a26984ddce795f6f71817c9cf4480e79'),
('B.Tech', '01FB15ECS317', 'SURESH', '', 'YADAHALLI', 'CSE', '17-18', 5, 'F', 'sureshsy1997@gmail.com', '7760498300', '70c881d4a26984ddce795f6f71817c9cf4480e79'),
('B.Tech', '01fb15ecs722', 'SANDEEP', 'S', 'BIRADAR', 'CSE', '2017-2018', 7, 'F', 'sanjusrn37@gmail.com', '8123456789', '70c881d4a26984ddce795f6f71817c9cf4480e79'),
('B.Tech', '01fb15ecs907', 'NANDITA', '', 'B G', 'CSE', '2017-2018', 6, 'E', 'nanditanaidu01@gmail.com', '9632372319', '70c881d4a26984ddce795f6f71817c9cf4480e79'),
('M.Tech', '01FB16ECS723', 'SHIVANAND', 'V', 'KANAMADI', 'CSE', '17-18', 5, 'D', 'shivakanamadi@gmail.com', '9591473758', '70c881d4a26984ddce795f6f71817c9cf4480e79');

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_login`
-- (See below for the actual view)
--
CREATE TABLE `student_login` (
`username` varchar(12)
,`password` varchar(45)
);

-- --------------------------------------------------------

--
-- Structure for view `faculty_login`
--
DROP TABLE IF EXISTS `faculty_login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `faculty_login`  AS  select `faculty`.`empid` AS `username`,`faculty`.`password` AS `password` from `faculty` ;

-- --------------------------------------------------------

--
-- Structure for view `marks_view`
--
DROP TABLE IF EXISTS `marks_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `marks_view`  AS  select `pt`.`project_id` AS `project_id`,`pt`.`student_id` AS `student_id`,`student`.`fname` AS `fname`,`student`.`mname` AS `mname`,`student`.`lname` AS `lname`,`faculty`.`name` AS `fn`,`faculty`.`mname` AS `fm`,`faculty`.`lname` AS `fl`,`project`.`name` AS `name`,`e1`.`total` AS `e1`,`e2`.`total` AS `e2`,`e3`.`total` AS `e3`,`e4`.`total` AS `e4`,`e5`.`total` AS `e5` from ((`project` join `faculty`) join ((((((`project_team` `pt` left join `evaluation1` `e1` on((`e1`.`student_srn` = `pt`.`student_id`))) left join `evaluation2` `e2` on((`e2`.`student_srn` = `pt`.`student_id`))) left join `evaluation3` `e3` on((`e3`.`student_srn` = `pt`.`student_id`))) left join `evaluation4` `e4` on((`e4`.`student_srn` = `pt`.`student_id`))) left join `evaluation5` `e5` on((`e5`.`student_srn` = `pt`.`student_id`))) left join `student` on((`pt`.`student_id` = `student`.`srn`)))) where ((`project`.`id` = `pt`.`project_id`) and (`faculty`.`empid` = `project`.`guide_id`) and (`project`.`status` = 'approved_admin')) ;

-- --------------------------------------------------------

--
-- Structure for view `panel_assign`
--
DROP TABLE IF EXISTS `panel_assign`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `panel_assign`  AS  select `project`.`id` AS `id`,`panel_members`.`panel_id` AS `panel_id` from (`project` join `panel_members`) where (`project`.`guide_id` = `panel_members`.`empid`) ;

-- --------------------------------------------------------

--
-- Structure for view `panel_view`
--
DROP TABLE IF EXISTS `panel_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `panel_view`  AS  select `student`.`srn` AS `srn`,`student`.`fname` AS `fname`,`student`.`mname` AS `mname`,`student`.`lname` AS `lname`,`project`.`id` AS `id`,`project`.`name` AS `name`,`project`.`project_area` AS `project_area`,`faculty`.`name` AS `fs`,`faculty`.`mname` AS `fm`,`faculty`.`lname` AS `fl`,`panel_members`.`panel_id` AS `panel_id` from ((((`student` join `faculty`) join `project`) join `project_team`) join `panel_members`) where ((`project_team`.`project_id` = `project`.`id`) and (`project`.`guide_id` = `faculty`.`empid`) and (`panel_members`.`empid` = `faculty`.`empid`) and (`student`.`srn` = `project_team`.`student_id`) and (`project`.`status` = 'approved_admin')) order by `project`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `project_view`
--
DROP TABLE IF EXISTS `project_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `project_view`  AS  select `student`.`srn` AS `srn`,`student`.`fname` AS `fname`,`student`.`mname` AS `mname`,`student`.`lname` AS `lname`,`project`.`id` AS `id`,`project`.`name` AS `name`,`project`.`project_area` AS `project_area`,`faculty`.`name` AS `fm`,`faculty`.`mname` AS `fn`,`faculty`.`lname` AS `fl` from (((`student` join `faculty`) join `project`) join `project_team`) where ((`project`.`guide_id` = `faculty`.`empid`) and (`student`.`srn` = `project_team`.`student_id`) and (`project_team`.`project_id` = `project`.`id`) and (`project`.`status` = 'approved_admin')) ;

-- --------------------------------------------------------

--
-- Structure for view `student_login`
--
DROP TABLE IF EXISTS `student_login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_login`  AS  select `student`.`srn` AS `username`,`student`.`password` AS `password` from `student` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `evaluation1`
--
ALTER TABLE `evaluation1`
  ADD UNIQUE KEY `student_srn` (`student_srn`);

--
-- Indexes for table `evaluation2`
--
ALTER TABLE `evaluation2`
  ADD UNIQUE KEY `student_srn` (`student_srn`);

--
-- Indexes for table `evaluation3`
--
ALTER TABLE `evaluation3`
  ADD UNIQUE KEY `student_srn` (`student_srn`);

--
-- Indexes for table `evaluation4`
--
ALTER TABLE `evaluation4`
  ADD UNIQUE KEY `student_srn` (`student_srn`);

--
-- Indexes for table `evaluation5`
--
ALTER TABLE `evaluation5`
  ADD UNIQUE KEY `student` (`student_srn`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `faculty_specialisation`
--
ALTER TABLE `faculty_specialisation`
  ADD KEY `empid` (`empid`);

--
-- Indexes for table `panel`
--
ALTER TABLE `panel`
  ADD PRIMARY KEY (`panel_id`);

--
-- Indexes for table `panel_members`
--
ALTER TABLE `panel_members`
  ADD PRIMARY KEY (`panel_id`,`empid`),
  ADD UNIQUE KEY `empid` (`empid`),
  ADD KEY `faculty_fk` (`empid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_team`
--
ALTER TABLE `project_team`
  ADD PRIMARY KEY (`project_id`,`student_id`),
  ADD KEY `project_team_fk3` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`srn`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evaluation1`
--
ALTER TABLE `evaluation1`
  ADD CONSTRAINT `evalsrn_fk` FOREIGN KEY (`student_srn`) REFERENCES `project_team` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evaluation2`
--
ALTER TABLE `evaluation2`
  ADD CONSTRAINT `srn_e2` FOREIGN KEY (`student_srn`) REFERENCES `project_team` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evaluation3`
--
ALTER TABLE `evaluation3`
  ADD CONSTRAINT `ev_3` FOREIGN KEY (`student_srn`) REFERENCES `project_team` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evaluation4`
--
ALTER TABLE `evaluation4`
  ADD CONSTRAINT `srn_e4` FOREIGN KEY (`student_srn`) REFERENCES `project_team` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_specialisation`
--
ALTER TABLE `faculty_specialisation`
  ADD CONSTRAINT `faculty_specialisation_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `faculty` (`empid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `panel_members`
--
ALTER TABLE `panel_members`
  ADD CONSTRAINT `faculty_fk` FOREIGN KEY (`empid`) REFERENCES `faculty` (`empid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_fk` FOREIGN KEY (`panel_id`) REFERENCES `panel` (`panel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_team`
--
ALTER TABLE `project_team`
  ADD CONSTRAINT `project_team_fk2` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_team_fk3` FOREIGN KEY (`student_id`) REFERENCES `student` (`srn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
