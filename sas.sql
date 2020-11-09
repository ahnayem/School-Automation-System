-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2019 at 08:36 PM
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
-- Database: `sas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(55) NOT NULL,
  `admin_email` varchar(55) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_token` varchar(65) NOT NULL,
  `admin_status` tinyint(4) NOT NULL DEFAULT '0',
  `admin_profile_picture` text,
  `admin_date_of_birth` date DEFAULT NULL,
  `admin_role` int(11) NOT NULL DEFAULT '2',
  `forgot_password_status` tinyint(4) NOT NULL DEFAULT '0',
  `forgot_password_token` text NOT NULL,
  `forgot_password_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_registration_date`, `admin_token`, `admin_status`, `admin_profile_picture`, `admin_date_of_birth`, `admin_role`, `forgot_password_status`, `forgot_password_token`, `forgot_password_date`) VALUES
(3, 'Nayem', 'nayemcse111@gmail.com', '$2y$10$.co1Ort2o47GbL59ljDDI.Q5/Nj/yA6AV8ZL4tE.p/gRk5Kb/8rde', '2018-10-03 08:32:18', '471287713c84c05d04ea36588ef65ede738cf39fa233ddc554bfe6d66a1622ee', 1, '9a2f733ff7c165323600061026bd10e38090e68a10794ae295720f09a9c03c2f.PNG', NULL, 2, 0, '', '2018-10-03 08:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `subject`, `message`, `date`) VALUES
(1, 'Nayem', 'nayemcse111@gmail.com', 'demo', 'this is a demo message.', '2018-12-07 16:57:44'),
(2, 'Shahidul', 'Shahidul@gmail.com', 'result publish date', 'what is the approximate date on result published.', '2018-12-07 16:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `pdf_file_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `pdf_file_name`, `date`) VALUES
(1, 'Hello world', 'Hi everyone', '', '2018-10-16 14:21:19'),
(2, 'Mid term exam date', 'Mid term exam will be start on 25.10.18', '', '2018-10-16 14:23:38'),
(3, 'Result class 6', '', 'result_class_6.pdf', '2018-10-18 13:48:02'),
(15, 'Class 6 Final Result', '', 'result_class_6.pdf.pdf', '2018-10-19 13:50:56'),
(17, 'Final result of class 6 (2018)', '', 'result_class_6 .pdf.pdf', '2018-11-04 15:41:33'),
(18, 'exampl', '', 'doc-74653431.pdf.pdf', '2018-11-04 15:45:59'),
(20, 'Demo pdf', '', 'demo.pdf', '2018-11-04 15:53:47'),
(21, 'Final result of class 6 (2018)', 'Here is the final result of class 6. Every passing student need not to register for the new class, it will be automatic by system.', 'result_class_6.pdf', '2018-11-04 16:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `remember_login`
--

CREATE TABLE `remember_login` (
  `token_hash` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `result_archive`
--

CREATE TABLE `result_archive` (
  `id` int(11) NOT NULL,
  `result_6` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result_class_6`
--

CREATE TABLE `result_class_6` (
  `id` int(11) NOT NULL,
  `sub1` int(11) NOT NULL DEFAULT '0',
  `sub2` int(11) NOT NULL DEFAULT '0',
  `sub3` int(11) NOT NULL DEFAULT '0',
  `sub4` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL,
  `roll` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_class_6`
--

INSERT INTO `result_class_6` (`id`, `sub1`, `sub2`, `sub3`, `sub4`, `total`, `roll`, `status`) VALUES
(1805001, 78, 82, 80, 60, 300, 2, 1),
(1805002, 80, 95, 95, 55, 325, 1, 1),
(1805003, 65, 10, 90, 50, 215, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `result_class_7`
--

CREATE TABLE `result_class_7` (
  `id` int(11) NOT NULL,
  `sub1` int(11) NOT NULL DEFAULT '0',
  `sub2` int(11) NOT NULL DEFAULT '0',
  `sub3` int(11) NOT NULL DEFAULT '0',
  `sub4` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result_class_8`
--

CREATE TABLE `result_class_8` (
  `id` int(11) NOT NULL,
  `sub1` int(11) NOT NULL DEFAULT '0',
  `sub2` int(11) NOT NULL DEFAULT '0',
  `sub3` int(11) NOT NULL DEFAULT '0',
  `sub4` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result_class_9`
--

CREATE TABLE `result_class_9` (
  `id` int(11) NOT NULL,
  `sub1` int(11) NOT NULL DEFAULT '0',
  `sub2` int(11) NOT NULL DEFAULT '0',
  `sub3` int(11) NOT NULL DEFAULT '0',
  `sub4` int(11) NOT NULL DEFAULT '0',
  `sub4_practical` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_class_9`
--

INSERT INTO `result_class_9` (`id`, `sub1`, `sub2`, `sub3`, `sub4`, `sub4_practical`, `total`, `roll`, `status`) VALUES
(1802001, 85, 90, 87, 65, 25, 352, 1, 1),
(1802002, 80, 90, 80, 70, 24, 344, 2, 1),
(1802003, 90, 70, 90, 55, 25, 330, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `result_class_10`
--

CREATE TABLE `result_class_10` (
  `id` int(11) NOT NULL,
  `sub1` int(11) NOT NULL DEFAULT '0',
  `sub2` int(11) NOT NULL DEFAULT '0',
  `sub3` int(11) NOT NULL DEFAULT '0',
  `sub4` int(11) NOT NULL DEFAULT '0',
  `sub4_practical` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `father_name` varchar(55) NOT NULL,
  `current_class` varchar(55) NOT NULL,
  `batch` varchar(55) NOT NULL,
  `current_roll` varchar(55) DEFAULT NULL,
  `student_group` varchar(55) NOT NULL,
  `mobile` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(65) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `profile_picture` text,
  `result_6` varchar(255) DEFAULT NULL,
  `result_7` varchar(255) DEFAULT NULL,
  `result_8` varchar(255) DEFAULT NULL,
  `result_9` varchar(255) DEFAULT NULL,
  `result_10` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `father_name`, `current_class`, `batch`, `current_roll`, `student_group`, `mobile`, `email`, `gender`, `blood_group`, `password`, `registration_date`, `token`, `status`, `profile_picture`, `result_6`, `result_7`, `result_8`, `result_9`, `result_10`) VALUES
(1802001, 'Rahim', 'Rahman', '10', '2', '1', 'Science', '01700000000', 'rahim@gmail.com', 'male', 'A+', '$2y$10$nHtFMc076dKN5SgascGam.T155Pkh6pDPLnQ.9BUvruxziREqfBCi', '2018-10-30 14:27:17', '08529984e5d2cad3d4955ea09a9e0ee5fcd4a387ba6ed47d1f8e3ef09fc151da', 1, NULL, NULL, NULL, NULL, '85,90,87,65,25,352', NULL),
(1802002, 'Karim', 'Kamal', '10', '2', '2', 'Science', '01700000001', 'karim@gmail.com', 'male', 'A+', '$2y$10$xX5dwaKQovum/ZmT6OU2VeSIrs4C8OmyXByIb5R002jHOn80MgIGC', '2018-10-30 14:28:17', '461a4d1e0573f150b98d0a895a273d8e85862f7c9c061510d7c90f6dc7350a2d', 1, NULL, NULL, NULL, NULL, '80,90,80,70,24,344', NULL),
(1802003, 'Raju', 'Rajib', '10', '2', '3', 'Science', '01700000002', 'raju@gmail.com', 'male', 'A+', '$2y$10$F3//RJHU6B1v5oV7iSlaM.dGNcKb9hrl0HeRVkwMt1UZaXxDx.HjS', '2018-10-30 14:29:15', 'f864387df370b9ea3f964ed3626e65c723c66a3432835ebd8398d3f437e6f749', 1, NULL, NULL, NULL, NULL, '90,70,90,55,25,330', NULL),
(1805001, 'Abu Hasan Nayem', 'Nazmul', '7', '5', '2', 'General', '01750000000', 'nayemcse111@gmail.com', 'male', 'A+', '$2y$10$hz.5lTgXWC4dfdoYZGZ/3OWBPx5ZzfSBxPs0CBj4dzA7qZXenxp/m', '2018-11-08 12:32:26', '75e7b003c256450a0d75f9a71868f4fe82a34fa4a8209178a70c062b8f2bf40a', 1, '8cd9c891668bd57a99c9eeb9be17fb8f1ce849ed82394cd44ae0110f6a0fbac4.PNG', '78,82,80,60,300', NULL, NULL, NULL, NULL),
(1805002, 'Rahim', 'Razzak', '7', '5', '1', 'General', '01712345678', 'rahim@gmail.com', 'male', 'A+', '$2y$10$d/swG5oB9mVxcK3w0e9zReXQjou62UW8cpJ/zErQQ1ENIFOfaDbyG', '2018-10-02 15:55:03', 'afd4daeb42999ec45462ac051496ac315d07d12b0c0716fe335edad30b49e8c4', 1, NULL, '80,95,95,55,325', NULL, NULL, NULL, NULL),
(1805003, 'Karim', 'kamrul', '6', '5', '0', 'General', '01712345678', 'kahim@gmail.com', 'male', 'A+', '$2y$10$QbY3xseS6YsFkktrI4RgIeNFhhtEh7RI9rVLRDluAWieoFMD3K5sC', '2018-10-02 15:56:43', 'd7f72b5febc8bbd3a3c141f853e6a2e365a655f14dccc23856b3c8a5fc29d3f1', 1, NULL, '65,10,90,50,215', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stuff`
--

CREATE TABLE `stuff` (
  `stuff_id` int(11) NOT NULL,
  `stuff_name` varchar(55) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `stuff_email` varchar(55) NOT NULL,
  `stuff_gender` varchar(10) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `stuff_password` varchar(255) NOT NULL,
  `stuff_registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stuff_token` varchar(65) NOT NULL,
  `stuff_status` tinyint(4) NOT NULL DEFAULT '1',
  `stuff_profile_picture` text,
  `forgot_password_status` tinyint(4) NOT NULL DEFAULT '0',
  `forgot_password_token` text NOT NULL,
  `forgot_password_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stuff`
--

INSERT INTO `stuff` (`stuff_id`, `stuff_name`, `mobile`, `stuff_email`, `stuff_gender`, `blood_group`, `stuff_password`, `stuff_registration_date`, `stuff_token`, `stuff_status`, `stuff_profile_picture`, `forgot_password_status`, `forgot_password_token`, `forgot_password_date`) VALUES
(1, 'Rahim', '01700000111', 'rahim@gmail.com', 'male', 'A+', '$2y$10$23zt9ohlKrUisNXtOTdKG.2aevzD3BiQzltLPpXRbftAJAYdgt/qG', '2018-10-01 14:20:34', '06f1464a058c0f724f7acd56e2162e09dd57f35a451532ce95d04dc389f9841e', 1, NULL, 0, '', '2018-10-01 14:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(55) NOT NULL,
  `teacher_designation` varchar(55) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `teacher_email` varchar(55) NOT NULL,
  `teacher_gender` varchar(10) NOT NULL,
  `blood_group` varchar(20) NOT NULL,
  `teacher_password` varchar(255) NOT NULL,
  `teacher_registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `teacher_token` varchar(65) NOT NULL,
  `teacher_status` tinyint(4) NOT NULL DEFAULT '0',
  `teacher_profile_picture` text,
  `forgot_password_status` tinyint(4) NOT NULL DEFAULT '0',
  `forgot_password_token` text NOT NULL,
  `forgot_password_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_designation`, `mobile`, `teacher_email`, `teacher_gender`, `blood_group`, `teacher_password`, `teacher_registration_date`, `teacher_token`, `teacher_status`, `teacher_profile_picture`, `forgot_password_status`, `forgot_password_token`, `forgot_password_date`) VALUES
(101, 'Nazmul Haque', 'Head Teacher', '01700000000', 'nazmul@gmail.com', 'male', 'A+', '$2y$10$IrIL9V32RgHxQncUotdzoO6aGdiVcoA0nvILDbUGhlmuAVNLvpOh6', '2018-10-01 13:57:36', 'e52638a2174bf6457137a951a5f5fdcc628cddc1bd96eb8a8901722ccb2c346d', 1, '1ec617b1738d32d975aaa1ad066766bfd81079d7635267729b7d490673be9c0d.PNG', 0, '', '2018-10-01 13:57:36'),
(102, 'Md. Sajedur Rahman', 'Ass. Head Teacher', '01700000001', 'sajedur@gmail.com', 'male', 'AB+', '$2y$10$.21htDvrL2gXuCnSS2Vf8uOnUjHUgLG62ozfUdOSRy0dvgUyrcJke', '2018-10-01 13:59:57', '9c20b60fa2b66f87c9a2d2f494918ab61b75bcaa277ddefa4df3e54b6aac5f39', 1, '', 0, '', '2018-10-01 13:59:57'),
(103, 'Md. Mokbul Islam', 'Teacher', '01700000002', 'mokbul@gmail.com', 'male', 'A+', '$2y$10$XwJQYq1L8qfkY/AU6c92t.nOLiY/ZdxxE9jPf.KwrwPquj9tXdT2O', '2018-10-01 14:01:30', '4a48e99ed1c6bb5e81ee04545b19e9af1d39e5b0922fd2d635c1c9811a3e111c', 1, '', 0, '', '2018-10-01 14:01:30'),
(106, 'Most. Firoza Shahin', 'Teacher', '01700000003', 'firoza@gmail.com', 'female', 'B+', '$2y$10$2fwk67h8K9LBHamCDYOOFuV8O9fSruGZMA8QqHTuvWpH9bPs3E6aC', '2018-10-03 12:38:29', '3ad928e680eb8616caca6132a42fb5c7b6350ea1394691f29f07a9a8147c5bb0', 1, '', 0, '', '2018-10-03 12:38:29'),
(107, 'Hosne Ara Khatun', 'Teacher', '01700000004', 'hosne@gmail.com', 'female', 'AB+', '$2y$10$giOwEBeaWjscSHDhf4c1QO3FsLNev11358K1geoS2j.zOS4/n4Jwq', '2018-10-03 14:29:24', '01ac8c957430c947e97485a47d03af1566cf17481c622c846b09e58f616eafbb', 1, 'd494c76ef469ea8560dbf4626b835dce365fdeead7b85842d76953835fdc68a5.PNG', 0, '', '2018-10-03 14:29:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remember_login`
--
ALTER TABLE `remember_login`
  ADD PRIMARY KEY (`token_hash`),
  ADD KEY `token_hash` (`token_hash`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `result_archive`
--
ALTER TABLE `result_archive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `result_class_6`
--
ALTER TABLE `result_class_6`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `result_class_7`
--
ALTER TABLE `result_class_7`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `result_class_8`
--
ALTER TABLE `result_class_8`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `result_class_9`
--
ALTER TABLE `result_class_9`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stuff`
--
ALTER TABLE `stuff`
  ADD PRIMARY KEY (`stuff_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `stuff`
--
ALTER TABLE `stuff`
  MODIFY `stuff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
