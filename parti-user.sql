-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2018 at 03:32 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `party`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prt_admin_users`
--

CREATE TABLE `tbl_prt_admin_users` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `profile_pic` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) UNSIGNED NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) UNSIGNED DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prt_admin_users`
--

INSERT INTO `tbl_prt_admin_users` (`admin_id`, `user_id`, `first_name`, `last_name`, `phone`, `extension`, `mobile`, `profile_pic`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 1, 'Admin', 'user', NULL, NULL, NULL, NULL, 1, 1, '2018-06-05 21:47:04', NULL, '2018-06-05 16:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prt_lookup_name`
--

CREATE TABLE `tbl_prt_lookup_name` (
  `type_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prt_lookup_options`
--

CREATE TABLE `tbl_prt_lookup_options` (
  `option_id` int(11) UNSIGNED NOT NULL,
  `option_type` int(11) NOT NULL,
  `option_value` varchar(50) NOT NULL,
  `option_status` tinyint(1) NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) UNSIGNED DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prt_users`
--

CREATE TABLE `tbl_prt_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `authkey` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `accessToken` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `usertype` tinyint(4) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` timestamp NULL DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prt_users`
--

INSERT INTO `tbl_prt_users` (`user_id`, `username`, `password`, `authkey`, `password_reset_token`, `accessToken`, `usertype`, `is_verified`, `is_active`, `last_login`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 'admin@prt.com', '$2y$13$hQhym6DYtk3c8NTAjUMiPu.s4/moh/WjLGRFTEG5NjmBZZO3XOUs2', NULL, NULL, NULL, 1, 1, 1, '2018-06-05 14:48:58', '2018-06-05 20:18:58', 1, '2018-06-05 14:48:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_prt_admin_users`
--
ALTER TABLE `tbl_prt_admin_users`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `fk_admin_users_user_id` (`user_id`);

--
-- Indexes for table `tbl_prt_lookup_name`
--
ALTER TABLE `tbl_prt_lookup_name`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_prt_lookup_options`
--
ALTER TABLE `tbl_prt_lookup_options`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `FK_option_type` (`option_type`);

--
-- Indexes for table `tbl_prt_users`
--
ALTER TABLE `tbl_prt_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_prt_admin_users`
--
ALTER TABLE `tbl_prt_admin_users`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_prt_lookup_name`
--
ALTER TABLE `tbl_prt_lookup_name`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_prt_lookup_options`
--
ALTER TABLE `tbl_prt_lookup_options`
  MODIFY `option_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_prt_users`
--
ALTER TABLE `tbl_prt_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_prt_admin_users`
--
ALTER TABLE `tbl_prt_admin_users`
  ADD CONSTRAINT `fk_admin_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_prt_users` (`user_id`);

--
-- Constraints for table `tbl_prt_lookup_options`
--
ALTER TABLE `tbl_prt_lookup_options`
  ADD CONSTRAINT `FK_option_type` FOREIGN KEY (`option_type`) REFERENCES `tbl_prt_lookup_name` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
