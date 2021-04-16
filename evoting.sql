-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2017 at 05:10 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `email_id`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_candidate`
--

CREATE TABLE IF NOT EXISTS `tbl_candidate` (
  `candidate_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` bigint(20) NOT NULL,
  `candidate_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`candidate_id`),
  KEY `position_id` (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_candidate`
--

INSERT INTO `tbl_candidate` (`candidate_id`, `position_id`, `candidate_name`, `status`, `created_at`) VALUES
(1, 14, 'Pankaj', 1, '2017-02-02 07:36:46'),
(2, 12, 'Anil', 1, '2017-01-21 04:50:11'),
(6, 11, 'Amit', 1, '2017-01-21 04:50:21'),
(7, 11, 'Sandeep', 1, '2017-01-21 04:50:36'),
(8, 1, 'test', 1, '2017-01-22 05:38:22'),
(9, 7, 'hello', 1, '2017-01-22 05:38:32'),
(10, 13, 'yyyy', 1, '2017-02-01 04:38:12'),
(11, 13, 'uuuuuu', 1, '2017-02-01 04:38:23'),
(12, 14, 'gggg', 1, '2017-02-01 04:39:56'),
(13, 15, 'srdtfyguhikjhg', 1, '2017-02-09 04:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manage_user_question`
--

CREATE TABLE IF NOT EXISTS `tbl_manage_user_question` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `question_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_manage_user_question`
--

INSERT INTO `tbl_manage_user_question` (`id`, `user_id`, `question_id`) VALUES
(1, 5, '15'),
(2, 5, '16'),
(3, 5, '17'),
(4, 5, '18'),
(5, 5, '19'),
(6, 5, '20'),
(7, 5, '21'),
(8, 2, '15'),
(9, 2, '16'),
(10, 2, '19'),
(11, 2, '20'),
(12, 2, '21'),
(13, 6, '15'),
(14, 6, '16'),
(15, 6, '19'),
(16, 6, '20'),
(17, 6, '21'),
(18, 7, '15'),
(19, 7, '16'),
(20, 7, '19'),
(21, 7, '20'),
(22, 7, '21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manage_user_voting`
--

CREATE TABLE IF NOT EXISTS `tbl_manage_user_voting` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `position_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobile`
--

CREATE TABLE IF NOT EXISTS `tbl_mobile` (
  `mobile_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mobile_number` bigint(20) NOT NULL,
  `show_hide` bigint(20) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`mobile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_mobile`
--

INSERT INTO `tbl_mobile` (`mobile_id`, `mobile_number`, `show_hide`, `created_at`) VALUES
(1, 8081886632, 0, '2017-01-18 05:54:13'),
(2, 2345673334, 0, '2017-01-18 05:54:13'),
(5, 1234567891, 1, '2017-01-18 06:21:11'),
(9, 4444444444, 1, '2017-01-18 09:48:34'),
(10, 8373956021, 1, '2017-01-18 09:48:34'),
(11, 2462346236, 1, '2017-01-18 09:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE IF NOT EXISTS `tbl_position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`position_id`, `position_name`, `status`, `created_at`) VALUES
(1, 'MLA', 2, '2017-01-21 04:48:50'),
(7, 'MP', 1, '2017-01-21 04:48:57'),
(11, 'PM', 2, '2017-01-21 04:49:05'),
(12, 'President', 2, '2017-01-21 04:49:19'),
(13, 'vbbvb', 2, '2017-02-01 04:37:48'),
(14, 'gfhgvv', 2, '2017-02-01 04:37:55'),
(15, 'aaaaaaaaaaafgh', 2, '2017-02-09 04:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE IF NOT EXISTS `tbl_question` (
  `question_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `show_hide` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`question_id`, `question`, `show_hide`, `created_at`) VALUES
(15, 'Are you like to play football?', 1, '2017-01-27 06:11:29'),
(16, 'Are you belong to UP?', 1, '2017-01-27 06:11:29'),
(17, 'AAAAAAAAAAAAAAAAAAAAAAAAA', 2, '2017-01-27 07:05:05'),
(18, 'bbbbbbbbbbbbbbbbbbbbbbbbbb', 2, '2017-01-27 07:05:06'),
(19, 'fdgdgdg', 1, '2017-02-01 04:37:17'),
(20, 'yjhtujbhjkbhmbmh', 1, '2017-02-01 04:37:24'),
(21, 'yjhtujbhjkbhmbmh', 1, '2017-02-01 04:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registrationprocess`
--

CREATE TABLE IF NOT EXISTS `tbl_registrationprocess` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_registrationprocess`
--

INSERT INTO `tbl_registrationprocess` (`id`, `status`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uer_positionvoting`
--

CREATE TABLE IF NOT EXISTS `tbl_uer_positionvoting` (
  `positionvoting_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `position_id` bigint(20) NOT NULL,
  `candidate_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`positionvoting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `tbl_uer_positionvoting`
--

INSERT INTO `tbl_uer_positionvoting` (`positionvoting_id`, `user_id`, `position_id`, `candidate_id`, `created_at`) VALUES
(1, 234567, 12, 1, '2017-01-24 07:13:05'),
(2, 234567, 11, 6, '2017-01-24 07:13:05'),
(3, 234567, 1, 8, '2017-01-24 07:13:05'),
(4, 234567, 7, 9, '2017-01-24 07:13:05'),
(5, 34567, 12, 1, '2017-01-24 07:27:04'),
(6, 34567, 11, 6, '2017-01-24 07:27:04'),
(7, 34567, 1, 8, '2017-01-24 07:27:04'),
(8, 34567, 7, 9, '2017-01-24 07:27:04'),
(9, 5, 12, 1, '2017-01-26 10:16:07'),
(10, 5, 11, 6, '2017-01-26 10:16:07'),
(11, 5, 1, 8, '2017-01-26 10:16:07'),
(12, 5, 7, 9, '2017-01-26 10:16:07'),
(13, 14, 12, 2, '2017-01-26 10:18:04'),
(14, 14, 11, 7, '2017-01-26 10:18:04'),
(15, 14, 1, 8, '2017-01-26 10:18:04'),
(16, 14, 7, 9, '2017-01-26 10:18:04'),
(17, 15, 12, 2, '2017-01-26 10:26:40'),
(18, 15, 11, 6, '2017-01-26 10:26:40'),
(19, 15, 1, 8, '2017-01-26 10:26:40'),
(20, 15, 7, 9, '2017-01-26 10:26:40'),
(21, 17, 12, 1, '2017-01-26 10:29:47'),
(22, 17, 11, 6, '2017-01-26 10:29:47'),
(23, 17, 1, 8, '2017-01-26 10:29:47'),
(24, 17, 7, 9, '2017-01-26 10:29:47'),
(25, 21, 12, 2, '2017-01-26 04:09:29'),
(26, 21, 11, 6, '2017-01-26 04:09:29'),
(27, 21, 1, 8, '2017-01-26 04:09:29'),
(28, 21, 7, 9, '2017-01-26 04:09:29'),
(29, 22, 12, 1, '2017-01-26 04:11:24'),
(30, 22, 11, 6, '2017-01-26 04:11:25'),
(31, 22, 1, 8, '2017-01-26 04:11:25'),
(32, 22, 7, 9, '2017-01-26 04:11:25'),
(33, 23, 12, 1, '2017-01-27 07:09:13'),
(34, 23, 11, 6, '2017-01-27 07:09:13'),
(35, 23, 1, 8, '2017-01-27 07:09:13'),
(36, 23, 7, 9, '2017-01-27 07:09:13'),
(37, 25, 12, 1, '2017-01-27 08:25:24'),
(38, 25, 11, 7, '2017-01-27 08:25:24'),
(39, 25, 1, 8, '2017-01-27 08:25:24'),
(40, 25, 7, 9, '2017-01-27 08:25:24'),
(41, 27, 12, 1, '2017-01-27 09:07:51'),
(42, 27, 11, 7, '2017-01-27 09:07:51'),
(43, 27, 1, 8, '2017-01-27 09:07:51'),
(44, 28, 12, 2, '2017-01-27 09:09:35'),
(45, 28, 11, 7, '2017-01-27 09:09:35'),
(46, 28, 1, 8, '2017-01-27 09:09:36'),
(47, 5, 13, 10, '2017-02-01 04:42:47'),
(48, 5, 14, 12, '2017-02-01 04:42:47'),
(49, 2, 14, 12, '2017-02-09 04:21:04'),
(50, 2, 12, 2, '2017-02-09 04:21:05'),
(51, 2, 11, 7, '2017-02-09 04:21:05'),
(52, 2, 1, 8, '2017-02-09 04:21:05'),
(53, 2, 7, 9, '2017-02-09 04:21:05'),
(54, 2, 13, 10, '2017-02-09 04:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_answer`
--

CREATE TABLE IF NOT EXISTS `tbl_users_answer` (
  `users_answer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `answer` text NOT NULL,
  `other_description` text,
  `inserted_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`users_answer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_users_answer`
--

INSERT INTO `tbl_users_answer` (`users_answer_id`, `user_id`, `answer`, `other_description`, `inserted_on`) VALUES
(1, 234567, '11_0,12_1,13_0,14_0', NULL, '2017-01-24 23:41:23'),
(2, 34567, '11_others,12_others,13_0,14_0', NULL, '2017-01-24 23:56:50'),
(3, 5, '11_1,12_0,13_0,14_others', NULL, '2017-01-26 14:45:49'),
(4, 14, '11_1,12_0,13_0,14_0', NULL, '2017-01-26 14:47:51'),
(5, 15, '11_0,12_0,13_others,14_others', NULL, '2017-01-26 14:56:28'),
(6, 17, '11_0,12_others,13_others,14_1', NULL, '2017-01-26 14:59:36'),
(7, 21, '11_1,12_others,13_others,14_0', NULL, '2017-01-26 20:39:00'),
(8, 22, '11_1,12_others,13_0,14_1', NULL, '2017-01-26 20:41:15'),
(9, 23, '16_1,17_others', NULL, '2017-01-27 23:38:48'),
(10, 25, '15_1,16_1', NULL, '2017-01-28 00:54:52'),
(11, 26, '15_1,17_others', NULL, '2017-01-28 01:16:16'),
(12, 27, '15_1,17_0', NULL, '2017-01-28 01:37:41'),
(13, 28, '15_1,16_0', NULL, '2017-01-28 01:39:25'),
(14, 5, '15_others,16_0,17_0,18_0', NULL, '2017-02-01 00:51:35'),
(15, 5, '15_1,16_0,17_others,18_1', NULL, '2017-02-01 00:55:59'),
(16, 5, '19_1,20_0,21_others', NULL, '2017-02-01 09:09:25'),
(17, 2, '16_0', NULL, '2017-02-05 17:29:34'),
(18, 6, '15_0,16_1', NULL, '2017-02-12 10:26:56'),
(19, 7, '15_1,16_1,21_1', NULL, '2017-02-12 10:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_registration`
--

CREATE TABLE IF NOT EXISTS `tbl_user_registration` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile_number` bigint(20) NOT NULL,
  `otp` bigint(20) NOT NULL,
  `otp_status` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_check` int(11) NOT NULL COMMENT '1=>mobile,2=>email',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_user_registration`
--

INSERT INTO `tbl_user_registration` (`user_id`, `mobile_number`, `otp`, `otp_status`, `name`, `email`, `password`, `status_check`, `created_at`) VALUES
(2, 8081886632, 9800, 1, '', '', '', 1, '2017-01-30 06:55:19'),
(3, 1111111111, 1153, 1, '', '', '', 1, '2017-01-31 07:01:18'),
(5, 66666, 0, 0, '66666', '', '', 2, '2017-01-31 07:55:19'),
(6, 55555555555, 0, 0, 'ravi', '', '', 2, '2017-02-12 05:55:52'),
(7, 8373956021, 9381, 1, '', '', '', 1, '2017-02-12 05:57:52');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
