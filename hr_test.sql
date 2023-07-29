-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2022 at 05:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `name`) VALUES
(1, 'full Access'),
(2, 'View Attendance'),
(3, 'Gateway');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `emp_id`, `state`, `date`, `time`) VALUES
(323, 1, 0, '2022-10-01', '08:00:00'),
(324, 1, 1, '2022-10-01', '20:00:00'),
(325, 2, 0, '2022-10-01', '08:00:00'),
(326, 2, 1, '2022-10-01', '13:00:00'),
(327, 3, 0, '2022-10-01', '08:00:00'),
(328, 3, 1, '2022-10-01', '16:00:00'),
(329, 4, 0, '2022-10-01', '10:00:00'),
(330, 4, 1, '2022-10-01', '16:00:00'),
(331, 5, 0, '2022-10-01', '08:00:00'),
(332, 5, 1, '2022-10-01', '20:00:00'),
(333, 1, 0, '2022-10-02', '08:00:00'),
(334, 1, 1, '2022-10-02', '16:00:00'),
(335, 1, 0, '2022-10-03', '08:00:00'),
(336, 1, 1, '2022-10-03', '16:00:00'),
(337, 1, 0, '2022-10-04', '08:00:00'),
(338, 1, 1, '2022-10-04', '16:00:00'),
(339, 1, 0, '2022-10-05', '08:00:00'),
(340, 1, 1, '2022-10-05', '16:00:00'),
(341, 1, 0, '2022-10-06', '08:00:00'),
(342, 1, 1, '2022-10-06', '16:00:00'),
(343, 1, 0, '2022-10-07', '08:00:00'),
(344, 1, 1, '2022-10-07', '16:00:00'),
(345, 1, 0, '2022-10-08', '08:00:00'),
(346, 1, 1, '2022-10-08', '16:00:00'),
(347, 1, 0, '2022-10-09', '08:00:00'),
(348, 1, 1, '2022-10-09', '16:00:00'),
(349, 1, 0, '2022-10-10', '08:00:00'),
(350, 1, 1, '2022-10-10', '16:00:00'),
(351, 1, 0, '2022-10-11', '08:00:00'),
(352, 1, 1, '2022-10-11', '16:00:00'),
(353, 1, 0, '2022-10-12', '08:00:00'),
(354, 1, 1, '2022-10-12', '16:00:00'),
(355, 1, 0, '2022-10-13', '08:00:00'),
(356, 1, 1, '2022-10-13', '16:00:00'),
(357, 1, 0, '2022-10-14', '08:00:00'),
(358, 1, 1, '2022-10-14', '16:00:00'),
(359, 1, 0, '2022-10-15', '08:00:00'),
(360, 1, 1, '2022-10-15', '16:00:00'),
(361, 1, 0, '2022-10-16', '08:00:00'),
(362, 1, 1, '2022-10-16', '16:00:00'),
(363, 1, 0, '2022-10-17', '08:00:00'),
(364, 1, 1, '2022-10-17', '16:00:00'),
(365, 1, 0, '2022-10-18', '08:00:00'),
(366, 1, 1, '2022-10-18', '16:00:00'),
(367, 1, 0, '2022-10-19', '08:00:00'),
(368, 1, 1, '2022-10-19', '16:00:00'),
(369, 1, 0, '2022-10-20', '08:00:00'),
(370, 1, 1, '2022-10-20', '16:00:00'),
(371, 1, 0, '2022-10-21', '08:00:00'),
(372, 1, 1, '2022-10-21', '16:00:00'),
(373, 1, 0, '2022-10-22', '08:00:00'),
(374, 1, 1, '2022-10-22', '16:00:00'),
(375, 1, 0, '2022-10-23', '08:00:00'),
(376, 1, 1, '2022-10-23', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_salary`
--

CREATE TABLE `borrow_salary` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `amount` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow_salary`
--

INSERT INTO `borrow_salary` (`id`, `date`, `emp_id`, `amount`) VALUES
(6, '2022-09-06', 2, 100),
(7, '2022-09-14', 1, 100),
(8, '2022-09-22', 2, 100),
(9, '2022-09-23', 1, 100),
(10, '2022-09-28', 2, 100),
(11, '2022-09-14', 1, 100),
(12, '2022-09-22', 2, 100);

-- --------------------------------------------------------

--
-- Table structure for table `day_off`
--

CREATE TABLE `day_off` (
  `id` bigint(20) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `is_annual_holiday` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `day_off`
--

INSERT INTO `day_off` (`id`, `emp_id`, `date`, `is_annual_holiday`) VALUES
(39, 1, '2022-10-02', 1),
(40, 2, '2022-10-02', 1),
(41, 3, '2022-10-02', 1),
(42, 4, '2022-10-02', 1),
(43, 5, '2022-10-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dep_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dep_name`) VALUES
(1, 'HR'),
(2, 'IT'),
(3, 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_card` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `salary_month` double(12,2) NOT NULL,
  `salary_day` double(12,2) NOT NULL,
  `depart_id` int(11) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `plus_incentive` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `id_card`, `role`, `password`, `salary_month`, `salary_day`, `depart_id`, `job_title`, `plus_incentive`) VALUES
(1, 'Ahmed Mohamed Amin', '000000', 0, '', 4000.00, 153.84, 1, 'Test Data', 2),
(2, 'Mostafa Mohamed Ali', '000000', 0, '', 4000.00, 153.84, 1, 'Test Data', 0),
(3, 'Ayman Farouk Lawendy', '000000', 0, '', 4000.00, 153.84, 1, 'Test Data', 2),
(4, 'Hassan Mohamed Kamel', '000000', 0, '', 4000.00, 153.84, 1, 'Test Data', 0),
(5, 'Nabil Samir Shokry', '000000', 0, NULL, 4000.00, 153.85, 3, 'Test Data', 2);

-- --------------------------------------------------------

--
-- Table structure for table `emp_data`
--

CREATE TABLE `emp_data` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `Qualifications` int(11) NOT NULL COMMENT 'المؤهلات',
  `army` int(11) NOT NULL DEFAULT 0 COMMENT 'الجيش ',
  `birth_certificate` int(11) NOT NULL DEFAULT 0 COMMENT 'شهادة الميلاد',
  `fishe` int(11) NOT NULL DEFAULT 0 COMMENT 'الفيش ',
  `health_certificate` int(11) NOT NULL DEFAULT 0 COMMENT 'الشهادة الصحية',
  `work_stub` int(11) NOT NULL DEFAULT 0 COMMENT 'كعب العمل',
  `form_111` int(11) NOT NULL DEFAULT 0 COMMENT 'استمارة 111',
  `personal_id` int(11) NOT NULL DEFAULT 0 COMMENT 'صور البطاقة الشخصية',
  `personal_photos` int(11) NOT NULL DEFAULT 0 COMMENT 'الصور الشخصية',
  `vacation_balance` int(11) NOT NULL DEFAULT 0 COMMENT 'رصيد الاجازات',
  `job_request` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'طلب الوظيفة',
  `paper_qualification` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'شهادة المؤهل',
  `driving_license` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'صورة رخصة القيادة'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_data`
--

INSERT INTO `emp_data` (`id`, `emp_id`, `Qualifications`, `army`, `birth_certificate`, `fishe`, `health_certificate`, `work_stub`, `form_111`, `personal_id`, `personal_photos`, `vacation_balance`, `job_request`, `paper_qualification`, `driving_license`) VALUES
(17, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 10, 0, 0, 2),
(18, 2, 1, 1, 1, 1, 1, 1, 0, 0, 0, 12, 0, 0, 3),
(19, 3, 1, 1, 1, 1, 1, 1, 0, 0, 0, 7, 0, 0, 4),
(20, 4, 1, 1, 1, 1, 1, 1, 0, 0, 0, 13, 0, 0, 5),
(21, 5, 1, 1, 1, 1, 1, 1, 0, 0, 0, 26, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gateway`
--

CREATE TABLE `gateway` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `in` tinyint(1) NOT NULL DEFAULT 0,
  `out` tinyint(1) NOT NULL DEFAULT 0,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gateway`
--

INSERT INTO `gateway` (`id`, `emp_id`, `date`, `time`, `in`, `out`, `notes`) VALUES
(32, 2, '2022-10-14', '23:39:00', 1, 0, ' '),
(33, 1, '2022-10-14', '23:39:00', 0, 1, ' '),
(34, 1, '2022-10-14', '23:39:00', 1, 0, ' '),
(35, 2, '2022-10-14', '23:39:00', 0, 1, ' '),
(141, 1, '2022-10-07', '13:00:00', 0, 1, 'qqqqqqqq'),
(142, 4, '2022-10-12', '16:01:00', 1, 0, 'qqqqqqqqq'),
(143, 2, '2022-10-13', '16:02:00', 0, 1, 'qq'),
(144, 1, '2022-09-30', '17:05:00', 0, 1, 'qqq'),
(145, 3, '2022-10-20', '13:07:00', 1, 0, ' '),
(146, 5, '2022-02-20', '01:01:01', 0, 0, 'Test Using Zkteco Function'),
(147, 5, '2022-02-20', '01:01:01', 0, 0, 'Test Using Zkteco Function');

-- --------------------------------------------------------

--
-- Table structure for table `machine_config`
--

CREATE TABLE `machine_config` (
  `id` int(11) NOT NULL,
  `machin_name` varchar(255) DEFAULT NULL,
  `machin_ip` varchar(15) NOT NULL,
  `machin_port` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine_config`
--

INSERT INTO `machine_config` (`id`, `machin_name`, `machin_ip`, `machin_port`) VALUES
(4, NULL, '172.16.3.125', '123');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `name`) VALUES
(1, 'MBA'),
(2, 'DevOps'),
(3, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `salary_deduction_reward`
--

CREATE TABLE `salary_deduction_reward` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `count_days` float NOT NULL,
  `Salary_Deduction` tinyint(1) NOT NULL DEFAULT 0,
  `Salary_reward` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_deduction_reward`
--

INSERT INTO `salary_deduction_reward` (`id`, `date`, `emp_id`, `count_days`, `Salary_Deduction`, `Salary_reward`) VALUES
(12, '2022-10-05', 2, 2, 1, 0),
(13, '2022-10-06', 3, 6, 0, 1),
(14, '2022-10-07', 2, 4, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shift_time`
--

CREATE TABLE `shift_time` (
  `id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `in_from` time NOT NULL,
  `in_to` time NOT NULL,
  `default_in` time NOT NULL,
  `out_from` time NOT NULL,
  `out_to` time NOT NULL,
  `default_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shift_time`
--

INSERT INTO `shift_time` (`id`, `shift_id`, `in_from`, `in_to`, `default_in`, `out_from`, `out_to`, `default_out`) VALUES
(1, 1, '08:01:01', '08:20:01', '08:02:01', '15:45:01', '16:00:01', '16:02:01'),
(2, 2, '17:01:00', '16:20:00', '15:59:00', '23:45:00', '23:59:00', '23:59:00'),
(3, 3, '00:01:00', '00:20:00', '00:00:00', '07:45:00', '08:00:00', '08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `access_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `access_id`, `created_at`, `updated_at`) VALUES
(2, 'Beshoy', 'beshoy@gmail.com', '2022-07-13 04:59:27', '$2y$10$Uya6WKiRTCL9FxlVGA/wxO2SlkzrQWfRlr4ZxcESN0QvPxIY9WsBu', '', 1, '2022-07-13 04:59:27', '2022-07-13 04:59:27'),
(3, 'Nover', 'Nover@gmail.com', '2022-07-13 04:59:27', '$2y$10$Uya6WKiRTCL9FxlVGA/wxO2SlkzrQWfRlr4ZxcESN0QvPxIY9WsBu', '', 2, '2022-07-13 04:59:27', '2022-07-13 04:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `work_out`
--

CREATE TABLE `work_out` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `cost_plus` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_out`
--

INSERT INTO `work_out` (`id`, `emp_id`, `date`, `cost_plus`) VALUES
(1, 1, '2022-10-08', 120),
(2, 2, '2022-10-01', 120),
(3, 1, '2022-10-05', 380);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow_salary`
--
ALTER TABLE `borrow_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_off`
--
ALTER TABLE `day_off`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_data`
--
ALTER TABLE `emp_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `gateway`
--
ALTER TABLE `gateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine_config`
--
ALTER TABLE `machine_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_deduction_reward`
--
ALTER TABLE `salary_deduction_reward`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shift_time`
--
ALTER TABLE `shift_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_out`
--
ALTER TABLE `work_out`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

--
-- AUTO_INCREMENT for table `borrow_salary`
--
ALTER TABLE `borrow_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `day_off`
--
ALTER TABLE `day_off`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `emp_data`
--
ALTER TABLE `emp_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `gateway`
--
ALTER TABLE `gateway`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `machine_config`
--
ALTER TABLE `machine_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salary_deduction_reward`
--
ALTER TABLE `salary_deduction_reward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shift_time`
--
ALTER TABLE `shift_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `work_out`
--
ALTER TABLE `work_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emp_data`
--
ALTER TABLE `emp_data`
  ADD CONSTRAINT `emp_data_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
