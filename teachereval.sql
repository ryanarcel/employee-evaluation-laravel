-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 04:09 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teachereval`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(20) NOT NULL,
  `comment` longtext NOT NULL,
  `student_id` bigint(50) NOT NULL,
  `evaluation_id` int(50) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `student_id`, `evaluation_id`, `created_at`, `updated_at`) VALUES
(15, 'pangit!', 7153980624, 8, '2020-01-15 16:41:16.676000', '2020-01-15 16:41:16.676000'),
(16, 'hello', 7035649182, 9, '2020-02-25 22:04:56.431835', '2020-02-25 22:04:56.431835'),
(17, '', 5392764081, 8, '2020-02-28 00:06:59.856886', '2020-02-28 00:06:59.856886'),
(18, 'fv', 2870149356, 9, '2020-02-29 19:52:54.165138', '2020-02-29 19:52:54.165138');

-- --------------------------------------------------------

--
-- Table structure for table `defaultpass`
--

CREATE TABLE `defaultpass` (
  `id` int(6) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `defaultpass`
--

INSERT INTO `defaultpass` (`id`, `password`, `created_at`, `updated_at`) VALUES
(0, 'acdeval', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(30) NOT NULL,
  `tool_id` int(50) NOT NULL,
  `evaluee_id` int(50) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `session` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `course` varchar(20) NOT NULL,
  `yrlevel` int(2) NOT NULL,
  `SY_from` year(4) NOT NULL,
  `SY_to` year(4) NOT NULL,
  `semester` int(1) NOT NULL,
  `term` int(1) NOT NULL,
  `access_key` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `grant_access` tinyint(1) NOT NULL DEFAULT 0,
  `archived` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`id`, `tool_id`, `evaluee_id`, `subject`, `session`, `date`, `course`, `yrlevel`, `SY_from`, `SY_to`, `semester`, `term`, `access_key`, `status`, `grant_access`, `archived`, `created_at`, `updated_at`) VALUES
(8, 1, 43, 'NSTP', 'day', '2020-01-20', 'BSIT', 2, 2020, 2021, 2, 1, '5g8xoh', 1, 0, 0, '2020-03-01 09:38:50.521389', '2020-02-28 00:06:27.992275'),
(9, 1, 43, 'English', 'day', '2020-01-21', 'BSIT', 1, 2020, 2021, 1, 1, '36jo8q', 1, 0, 0, '2020-03-01 09:38:50.463422', '2020-02-27 00:08:31.431592');

-- --------------------------------------------------------

--
-- Table structure for table `evaluees`
--

CREATE TABLE `evaluees` (
  `id` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `office` varchar(20) NOT NULL,
  `position` varchar(20) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `teaching_dept` varchar(20) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluees`
--

INSERT INTO `evaluees` (`id`, `fname`, `lname`, `office`, `position`, `rank`, `teaching_dept`, `created_at`, `updated_at`) VALUES
(25, 'Jimuel', 'Sismar', 'BED', 'Teacher', 'Faculty', 'BED', '2020-05-13 05:28:16.509193', '2019-12-08 21:33:40.699978'),
(27, 'Ding', 'Baclay', 'BED', 'Teacher', 'Faculty', 'BED', '2020-05-13 06:27:53.301735', '2020-05-12 22:27:53.301789'),
(28, 'Jit', 'Sasil', 'College', 'Teacher', 'Faculty', 'College', '2020-05-13 05:28:16.665119', '2019-12-08 21:34:41.826776'),
(36, 'Rey', 'Gonzales', 'College', 'Teacher', 'Faculty', 'College', '2020-05-13 05:28:16.700101', '2019-12-08 21:42:27.464652'),
(39, 'Ryan Arcel', 'Galendez', 'College', 'Teacher', 'Faculty', 'College', '2020-05-13 06:04:50.924033', '2020-05-12 22:04:50.923992'),
(43, 'Jose', 'Rizal', 'BED', 'Teacher', 'Faculty', 'BED', '2020-05-13 05:28:16.777055', '2020-01-15 16:38:35.721549'),
(47, 'Vienna', 'Vallientis', 'College', 'Teacher', 'Faculty', 'College', '2020-05-12 22:06:53.676999', '2020-05-12 22:06:53.676999'),
(48, 'Cris', 'Mascardo', 'College', 'Teacher', 'Faculty', 'College', '2020-05-12 22:10:35.788552', '2020-05-12 22:10:35.788552'),
(49, 'Norie John', 'Canoy', 'College', 'Teacher', 'Faculty', 'College', '2020-05-12 22:13:06.883345', '2020-05-12 22:13:06.883345'),
(50, 'Cember', 'Catapang', 'College', 'Teacher', 'Faculty', 'College', '2020-05-13 06:15:22.337286', '2020-05-12 22:15:22.336686'),
(51, 'Ellaine', 'Tiin', 'College', 'Teacher', 'Faculty', 'College', '2020-05-12 22:21:52.406227', '2020-05-12 22:21:52.406227'),
(55, 'Giovanni', 'Montejo', 'Academic Affairs', 'Director', 'Administrator', 'N/A', '2020-05-13 07:00:27.515986', '2020-05-12 23:00:27.516070'),
(56, 'Jopriz', 'Bueno', 'Administration', 'Director', 'Administrator', 'N/A', '2020-05-12 23:00:56.033249', '2020-05-12 23:00:56.033249'),
(58, 'Rocky', 'Macatambad', 'Support Offices', 'In Charge', 'Supervisor', 'N/A', '2020-05-12 23:11:52.567421', '2020-05-12 23:11:52.567421'),
(59, 'Rey', 'Gonzales', 'ICTC', 'Head', 'Supervisor', 'N/A', '2020-05-12 23:15:03.661710', '2020-05-12 23:15:03.661710');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(20) NOT NULL,
  `evaluation_id` int(50) NOT NULL,
  `tool_id` int(50) NOT NULL,
  `student_id` bigint(50) NOT NULL,
  `item_id` int(50) NOT NULL,
  `score` int(10) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `evaluation_id`, `tool_id`, `student_id`, `item_id`, `score`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 4621589037, 1, 1, '2019-12-10 19:47:03.494420', '2019-12-10 19:47:03.494420'),
(2, 3, 1, 4621589037, 2, 2, '2019-12-10 19:47:03.525563', '2019-12-10 19:47:03.525563'),
(3, 3, 1, 4621589037, 3, 1, '2019-12-10 19:47:03.557151', '2019-12-10 19:47:03.557151'),
(4, 3, 1, 4621589037, 4, 1, '2019-12-10 19:47:03.603333', '2019-12-10 19:47:03.603333'),
(5, 3, 1, 4621589037, 39, 2, '2019-12-10 19:47:03.647770', '2019-12-10 19:47:03.647770'),
(6, 3, 1, 6214859037, 1, 1, '2019-12-11 03:06:55.495983', '2019-12-11 03:06:55.495983'),
(7, 3, 1, 6214859037, 2, 2, '2019-12-11 03:06:55.586833', '2019-12-11 03:06:55.586833'),
(8, 3, 1, 6214859037, 3, 1, '2019-12-11 03:06:55.653393', '2019-12-11 03:06:55.653393'),
(9, 3, 1, 6214859037, 4, 2, '2019-12-11 03:06:55.720179', '2019-12-11 03:06:55.720179'),
(10, 7, 1, 3491658270, 1, 4, '2020-01-12 00:16:38.799649', '2020-01-12 00:16:38.799649'),
(11, 7, 1, 3491658270, 2, 3, '2020-01-12 00:16:38.874478', '2020-01-12 00:16:38.874478'),
(12, 7, 1, 3491658270, 3, 3, '2020-01-12 00:16:38.908101', '2020-01-12 00:16:38.908101'),
(13, 7, 1, 3491658270, 4, 3, '2020-01-12 00:16:38.941218', '2020-01-12 00:16:38.941218'),
(14, 7, 1, 3491658270, 39, 2, '2020-01-12 00:16:38.996657', '2020-01-12 00:16:38.996657'),
(15, 8, 1, 7153980624, 1, 1, '2020-01-15 16:41:16.742405', '2020-01-15 16:41:16.742405'),
(16, 8, 1, 7153980624, 2, 1, '2020-01-15 16:41:16.775533', '2020-01-15 16:41:16.775533'),
(17, 8, 1, 7153980624, 3, 2, '2020-01-15 16:41:16.797235', '2020-01-15 16:41:16.797235'),
(18, 8, 1, 7153980624, 4, 1, '2020-01-15 16:41:16.819963', '2020-01-15 16:41:16.819963'),
(19, 8, 1, 7153980624, 40, 2, '2020-01-15 16:41:16.864427', '2020-01-15 16:41:16.864427'),
(20, 8, 1, 7153980624, 41, 3, '2020-01-15 16:41:16.908838', '2020-01-15 16:41:16.908838'),
(21, 8, 1, 7153980624, 42, 1, '2020-01-15 16:41:16.930416', '2020-01-15 16:41:16.930416'),
(22, 8, 1, 7153980624, 43, 2, '2020-01-15 16:41:16.953112', '2020-01-15 16:41:16.953112'),
(23, 8, 1, 7153980624, 44, 2, '2020-01-15 16:41:16.975175', '2020-01-15 16:41:16.975175'),
(24, 8, 1, 7153980624, 45, 2, '2020-01-15 16:41:16.997642', '2020-01-15 16:41:16.997642'),
(25, 8, 1, 7153980624, 46, 2, '2020-01-15 16:41:17.019499', '2020-01-15 16:41:17.019499'),
(26, 8, 1, 7153980624, 47, 2, '2020-01-15 16:41:17.042157', '2020-01-15 16:41:17.042157'),
(27, 8, 1, 7153980624, 48, 2, '2020-01-15 16:41:17.063818', '2020-01-15 16:41:17.063818'),
(28, 8, 1, 7153980624, 57, 2, '2020-01-15 16:41:17.086486', '2020-01-15 16:41:17.086486'),
(29, 8, 1, 7153980624, 58, 2, '2020-01-15 16:41:17.108333', '2020-01-15 16:41:17.108333'),
(30, 8, 1, 7153980624, 59, 2, '2020-01-15 16:41:17.130963', '2020-01-15 16:41:17.130963'),
(31, 8, 1, 7153980624, 60, 2, '2020-01-15 16:41:17.152827', '2020-01-15 16:41:17.152827'),
(32, 8, 1, 7153980624, 65, 1, '2020-01-15 16:41:17.175468', '2020-01-15 16:41:17.175468'),
(33, 8, 1, 7153980624, 66, 2, '2020-01-15 16:41:17.197151', '2020-01-15 16:41:17.197151'),
(34, 9, 1, 7035649182, 1, 1, '2020-02-25 22:04:56.458946', '2020-02-25 22:04:56.458946'),
(35, 9, 1, 7035649182, 2, 1, '2020-02-25 22:04:56.525135', '2020-02-25 22:04:56.525135'),
(36, 9, 1, 7035649182, 3, 2, '2020-02-25 22:04:56.569553', '2020-02-25 22:04:56.569553'),
(37, 9, 1, 7035649182, 4, 1, '2020-02-25 22:04:56.614315', '2020-02-25 22:04:56.614315'),
(38, 9, 1, 7035649182, 39, 2, '2020-02-25 22:04:56.658385', '2020-02-25 22:04:56.658385'),
(39, 9, 1, 7035649182, 40, 1, '2020-02-25 22:04:56.724973', '2020-02-25 22:04:56.724973'),
(40, 9, 1, 7035649182, 42, 1, '2020-02-25 22:04:56.858465', '2020-02-25 22:04:56.858465'),
(41, 9, 1, 7035649182, 43, 2, '2020-02-25 22:04:56.947470', '2020-02-25 22:04:56.947470'),
(42, 9, 1, 7035649182, 44, 2, '2020-02-25 22:04:56.991650', '2020-02-25 22:04:56.991650'),
(43, 9, 1, 7035649182, 45, 1, '2020-02-25 22:04:57.036262', '2020-02-25 22:04:57.036262'),
(44, 8, 1, 5392764081, 1, 1, '2020-02-28 00:06:59.919498', '2020-02-28 00:06:59.919498'),
(45, 8, 1, 5392764081, 2, 2, '2020-02-28 00:06:59.945201', '2020-02-28 00:06:59.945201'),
(46, 8, 1, 5392764081, 3, 2, '2020-02-28 00:06:59.966903', '2020-02-28 00:06:59.966903'),
(47, 8, 1, 5392764081, 4, 1, '2020-02-28 00:06:59.989604', '2020-02-28 00:06:59.989604'),
(48, 8, 1, 5392764081, 39, 1, '2020-02-28 00:07:00.011565', '2020-02-28 00:07:00.011565'),
(49, 8, 1, 5392764081, 40, 1, '2020-02-28 00:07:00.034287', '2020-02-28 00:07:00.034287'),
(50, 8, 1, 5392764081, 41, 2, '2020-02-28 00:07:00.081152', '2020-02-28 00:07:00.081152'),
(51, 9, 1, 2870149356, 1, 1, '2020-02-29 19:52:54.210098', '2020-02-29 19:52:54.210098'),
(52, 9, 1, 2870149356, 67, 1, '2020-02-29 19:52:54.310411', '2020-02-29 19:52:54.310411');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(30) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `evaluation_id` int(30) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `section`, `evaluation_id`, `created_at`, `updated_at`) VALUES
(782139645, 'Ryan', 'Pacquiao', 'BSIT1', 14, '2019-12-02 18:26:47.634081', '2019-12-02 18:26:47.634081'),
(1067359284, 'Manny', 'Pacquiao', 'BSIT1', 17, '2019-12-07 21:51:34.611151', '2019-12-07 21:51:34.611151'),
(1567843209, 'Ragnar', 'Lothbrok', 'BSIT4', 17, '2019-12-04 21:14:26.543275', '2019-12-04 21:14:26.543275'),
(2643197085, 'Adam', 'Lavigne', 'BSIT1', 14, '2019-12-02 18:21:09.835432', '2019-12-02 18:21:09.835432'),
(2870149356, '', '', '', 9, '2020-02-29 19:52:54.103386', '2020-02-29 19:52:54.103386'),
(3491658270, '', '', '', 7, '2020-01-12 00:16:38.643980', '2020-01-12 00:16:38.643980'),
(3984701652, 'Ryan Arcel', 'Galendez', 'BSIT1', 16, '2019-12-04 17:01:59.624528', '2019-12-04 17:01:59.624528'),
(4129780365, 'Jessa', 'Marie', 'BSIT1', 14, '2019-12-02 18:20:09.767433', '2019-12-02 18:20:09.767433'),
(4621589037, '', '', '', 3, '2019-12-10 19:47:03.338701', '2019-12-10 19:47:03.338701'),
(5392764081, '', '', '', 8, '2020-02-28 00:06:59.798361', '2020-02-28 00:06:59.798361'),
(6214859037, '', '', '', 3, '2019-12-11 03:06:55.341039', '2019-12-11 03:06:55.341039'),
(6591830742, 'Juan', 'Dela Torre', 'BSIT4', 18, '2019-12-04 17:55:03.260968', '2019-12-04 17:55:03.260968'),
(6852397401, 'Maria', 'Clara', 'BSIT1', 18, '2019-12-04 17:57:04.780178', '2019-12-04 17:57:04.780178'),
(7035649182, '', '', '', 9, '2020-02-25 22:04:56.265657', '2020-02-25 22:04:56.265657'),
(7153980624, '', '', '', 8, '2020-01-15 16:41:16.644089', '2020-01-15 16:41:16.644089');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `id` int(5) NOT NULL,
  `toolname` varchar(50) NOT NULL,
  `feather_data` varchar(20) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `toolname`, `feather_data`, `created_at`, `updated_at`) VALUES
(1, 'Teacher Evaluation Tool', 'user-check', '2019-11-10 00:06:14.824051', '0000-00-00 00:00:00.000000'),
(2, 'Administrator Evaluation Tool', 'check-square', '2020-05-12 06:06:04.901834', '0000-00-00 00:00:00.000000'),
(3, 'Supervisor Evaluation Tool', 'check-circle', '2020-05-12 06:06:21.586647', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tool_items`
--

CREATE TABLE `tool_items` (
  `id` int(6) NOT NULL,
  `tool_id` int(10) NOT NULL,
  `statement` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tool_items`
--

INSERT INTO `tool_items` (`id`, `tool_id`, `statement`, `created_at`, `updated_at`) VALUES
(1, 1, 'Starts and ends class on time.', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 1, 'Has mastery of the subject matter.', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, 1, 'Shows proficiency in the use of the medium of instruction.', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, 1, 'Monitors participation of students during classroom activities.', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(39, 1, 'Properly deals with students who show behavioral problem.', '2019-11-10 03:28:54.791063', '2019-11-10 03:28:54.791063'),
(40, 1, 'Integrates the values/characteristics of an Assumptionist in the lesson.', '2019-11-10 03:29:58.618072', '2019-11-10 03:29:58.618072'),
(41, 1, 'Asks appropriate questions that lead to discovery of concepts.', '2019-11-10 03:32:46.779532', '2019-11-10 03:32:46.779532'),
(42, 1, 'Connects the topic with social responsibility.', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(43, 1, 'Uses various assessment strategies.', '2019-11-10 03:36:29.191326', '2019-11-10 03:36:29.191326'),
(44, 1, 'Uses various teaching strategies.', '2019-11-10 03:37:15.118083', '2019-11-10 03:37:15.118083'),
(45, 1, 'Informs the students of their performance and progress.', '2019-11-12 10:52:57.097378', '2019-11-12 02:52:57.096586'),
(46, 1, 'Observes the school’s dress code.', '2019-11-10 03:41:25.885295', '2019-11-10 03:41:25.885295'),
(47, 1, 'Models propriety and decorum (i.e avoids use of gadgets/phones while in the classroom; profanities or foul language, etc.)', '2019-11-10 16:23:36.166308', '2019-11-10 16:23:36.166308'),
(48, 1, 'Shows self-confidence, enthusiasm and dynamism in teaching', '2019-11-12 11:01:38.656271', '2019-11-12 03:01:38.655873'),
(67, 1, 'Provides an atmosphere conducive for learning (which conscious of classroom cleanliness)', '2020-03-02 02:51:31.429095', '2020-03-01 18:51:31.428134'),
(68, 2, 'Establishes clear KRA and rubrics (standard) per department.', '2020-05-11 22:08:42.358081', '2020-05-11 22:08:42.358081'),
(69, 2, 'Communicates/shares the purpose of the VMG and leads people to that direction.', '2020-05-12 06:09:08.122616', '2020-05-11 22:09:08.122052'),
(70, 2, 'Constantly reviews, defines, redefines, the VMG, school manuals and policies/school practices with the changing times and need, orients and reorients the people - broth written and unwritten policies.', '2020-05-11 22:10:13.025159', '2020-05-11 22:10:13.025159'),
(71, 2, 'Consistently owns, lives out and witnesses the VMG in relationships and in the implementation of policies and systems.', '2020-05-11 22:10:42.730189', '2020-05-11 22:10:42.730189');

-- --------------------------------------------------------

--
-- Table structure for table `total_scores`
--

CREATE TABLE `total_scores` (
  `id` int(20) NOT NULL,
  `evaluation_id` int(10) NOT NULL,
  `item_id` int(15) NOT NULL,
  `total_score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `office` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `office`, `position`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Ethel Marie', 'Aguilar', 'HR', 'Head', 'acdhr', '$2y$10$Nb1B.0NUjrH3DloNXU7E3.3rnjJn1MZJEiqffkSngTVVFSQXE9.RC', '2021-12-07 03:08:28.353372', '0000-00-00 00:00:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `defaultpass`
--
ALTER TABLE `defaultpass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluees`
--
ALTER TABLE `evaluees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tool_items`
--
ALTER TABLE `tool_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_scores`
--
ALTER TABLE `total_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `evaluees`
--
ALTER TABLE `evaluees`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tool_items`
--
ALTER TABLE `tool_items`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `total_scores`
--
ALTER TABLE `total_scores`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
