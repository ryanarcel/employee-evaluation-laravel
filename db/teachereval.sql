-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 07:41 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `evaluees`
--

CREATE TABLE `evaluees` (
  `id` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `office` varchar(20) NOT NULL,
  `position` varchar(20) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluees`
--

INSERT INTO `evaluees` (`id`, `fname`, `lname`, `office`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Ryan Arcel', 'Galendez', 'ICTC', 'DPO', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'Chadd', 'Boseman', 'Wakanda', 'King', '2019-11-07 10:17:43.203558', '2019-11-07 02:17:43.203193'),
(3, 'Kill', 'Monger', 'CIA', 'Assassin', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, 'Manny', 'Pacquiao', 'Senate', 'Senator', '2019-11-07 10:17:28.261673', '2019-11-07 02:17:28.261067'),
(5, 'Eric Junior', 'Moralez', 'Boxing', 'Fighter', '2019-11-11 02:16:11.795663', '2019-11-10 18:16:11.797208');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `id` int(5) NOT NULL,
  `toolname` varchar(50) NOT NULL,
  `feather_data` varchar(20) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `toolname`, `feather_data`, `created_at`, `updated_at`) VALUES
(1, 'Teacher Evaluation Tool', 'user-check', '2019-11-10 00:06:14.824051', '0000-00-00 00:00:00.000000'),
(2, 'Employee Evaluation Tool', 'check-square', '2019-11-10 00:06:29.364656', '0000-00-00 00:00:00.000000'),
(3, 'Office Evaluation Tool', 'check-circle', '2019-11-10 00:09:24.539890', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tool_items`
--

CREATE TABLE `tool_items` (
  `id` int(6) NOT NULL,
  `tool_id` int(10) NOT NULL,
  `statement` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
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
(45, 1, 'Informs the students of their performance  and progress.', '2019-11-10 03:40:04.196423', '2019-11-10 03:40:04.196423'),
(46, 1, 'Observes the school’s dress code.', '2019-11-10 03:41:25.885295', '2019-11-10 03:41:25.885295'),
(47, 1, 'Models propriety and decorum (i.e avoids use of gadgets/phones while in the classroom; profanities or foul language, etc.)', '2019-11-10 16:23:36.166308', '2019-11-10 16:23:36.166308'),
(48, 1, 'Shows self-confidence, enthusiasm and dynamism in teaching (avoids sitting down while teaching, etc.)', '2019-11-12 06:35:31.025262', '2019-11-11 22:35:31.024273'),
(52, 2, 'test Employee 1', '2019-11-11 16:38:12.789489', '2019-11-11 16:38:12.789489');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evaluees`
--
ALTER TABLE `evaluees`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluees`
--
ALTER TABLE `evaluees`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tool_items`
--
ALTER TABLE `tool_items`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
