-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 08:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hims_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `created_at`) VALUES
(1, 1, '2022-05-22 23:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `branch` varchar(100) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `basic_salary` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `user_id`, `branch`, `rank`, `basic_salary`, `created_at`) VALUES
(1, 2, 'galle', 'senior', 35000, '2022-05-22 23:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `buy_policy`
--

CREATE TABLE `buy_policy` (
  `client_id` int(11) UNSIGNED NOT NULL,
  `policy_id` int(11) UNSIGNED NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `agent_id` int(11) UNSIGNED DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `marital_state` enum('single','married','divorced') DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `registered_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `user_id`, `agent_id`, `state`, `city`, `street`, `postal_code`, `dob`, `marital_state`, `gender`, `registered_at`) VALUES
(1, 4, 1, 'galle', 'galle', 'galle Rd', '80000', '1998-04-09', 'single', 'male', '2022-05-22 23:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `feedback` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `coverage` int(10) UNSIGNED DEFAULT NULL,
  `age_min` int(10) UNSIGNED DEFAULT NULL,
  `age_max` int(10) UNSIGNED DEFAULT NULL,
  `benefit` varchar(255) DEFAULT NULL,
  `per_month` float UNSIGNED DEFAULT NULL,
  `term` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `title`, `coverage`, `age_min`, `age_max`, `benefit`, `per_month`, `term`, `created_at`, `updated_at`) VALUES
(1, 'Health Insurance for Individuals 🤍', 100, 18, 60, 'These essential health benefits include at least the following items and services, These essential health benefits include at least the following items and services.', 5000, '10 Years', '2022-05-22 04:04:06', '2022-05-22 04:04:06'),
(2, 'Health Insurance for Families 🤍', 100, 1, 75, 'These essential health benefits include at least the following items and services, These essential health benefits include at least the following items and services.', 8000, '20 Years', '2022-05-22 04:04:06', '2022-05-22 04:04:06'),
(3, 'Health Insurance for Children 🤍', 100, 1, 18, 'These essential health benefits include at least the following items and services, These essential health benefits include at least the following items and services.', 4500, '10 Years', '2022-05-22 04:04:06', '2022-05-22 04:04:06'),
(4, 'Dental Insurance 🤍', 75, 21, 35, 'These essential health benefits include at least the following items and services, These essential health benefits include at least the following items and services.', 3000, '5 Years', '2022-05-22 04:04:06', '2022-05-22 04:04:06'),
(5, 'Vision Insurance 🤍', 50, 45, 80, 'These essential health benefits include at least the following items and services, These essential health benefits include at least the following items and services.', 4000, '15 Years', '2022-05-22 04:04:06', '2022-05-22 04:04:06'),
(6, 'Medicare 🤍', 100, 1, 45, 'These essential health benefits include at least the following items and services, These essential health benefits include at least the following items and services.', 2000, '10 Years', '2022-05-22 04:04:06', '2022-05-22 04:04:06'),
(7, 'International Health Insurance 🤍', 50, 18, 35, 'These essential health benefits include at least the following items and services, These essential health benefits include at least the following items and services.', 8500, '5 Years', '2022-05-22 04:04:06', '2022-05-22 04:04:06'),
(8, 'Other Supplemental Insurance 🤍', 25, 16, 55, 'These essential health benefits include at least the following items and services, These essential health benefits include at least the following items and services.', 6000, '5 Years', '2022-05-22 04:04:06', '2022-05-22 04:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `answer` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `agent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `user_id`, `subject`, `title`, `status`, `answer`, `description`, `created_at`, `agent_id`) VALUES
(1, 3, 'PROFILE VARIFICATION', 'How to verify email', 0, NULL, 'I need to verify my email address', '2022-05-22 23:33:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nic` varchar(12) DEFAULT NULL,
  `profile_photo` varchar(150) DEFAULT NULL,
  `user_type` enum('user','admin','client','agent') NOT NULL DEFAULT 'user',
  `email_verified` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = not - verified/ 1 = verified',
  `email_verify_code` varchar(8) DEFAULT NULL,
  `password_reset_code` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `nic`, `profile_photo`, `user_type`, `email_verified`, `email_verify_code`, `password_reset_code`, `created_at`) VALUES
(1, 'Admin', 'admin@hims.lk', '$2y$10$ZvJK7epTSqEYKDEdHsnaQeLyu16W3/FnBsaU2uUMbT0nRPgXXyWy2', NULL, NULL, 'admin', 0, NULL, NULL, '2022-05-22 23:19:45'),
(2, 'Agent', 'agent@hims.lk', '$2y$10$oU6aOBMrWUe.ZEebFBnFvOtjo5T91PCO5arp7WCDwjY3s68eA2t6.', NULL, NULL, 'agent', 0, NULL, NULL, '2022-05-22 23:20:08'),
(3, 'Navod', 'hansajith18@gmail.com', '$2y$10$mUDpsLc0dotNimOxfbvMx.J.4e/Dj5xNzNMLEz3pNJc9zZd0VM83S', NULL, NULL, 'user', 0, NULL, NULL, '2022-05-22 23:20:46'),
(4, 'Hansajith', 'hansajith23@gmail.com', '$2y$10$Dtx.BbTsqIHPF60F5fL2muQkT2ATL4ebnHf0bTnIRmXIWqnUnsYZW', NULL, NULL, 'client', 0, NULL, NULL, '2022-05-22 23:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_contact`
--

CREATE TABLE `user_contact` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_users_fk` (`user_id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `buy_policy`
--
ALTER TABLE `buy_policy`
  ADD PRIMARY KEY (`client_id`,`policy_id`),
  ADD KEY `buy_policy_policy_fk` (`policy_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_users_fk` (`user_id`),
  ADD KEY `client_agent_fk` (`agent_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nic` (`nic`);

--
-- Indexes for table `user_contact`
--
ALTER TABLE `user_contact`
  ADD PRIMARY KEY (`user_id`,`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buy_policy`
--
ALTER TABLE `buy_policy`
  ADD CONSTRAINT `buy_policy_client_fk` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buy_policy_policy_fk` FOREIGN KEY (`policy_id`) REFERENCES `policy` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_agent_fk` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `client_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_contact`
--
ALTER TABLE `user_contact`
  ADD CONSTRAINT `user_contact_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
