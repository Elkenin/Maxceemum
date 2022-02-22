-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2021 at 01:47 PM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u220639402_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `position` varchar(255) NOT NULL DEFAULT 'staff',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `branch`, `position`, `username`, `password`, `email`) VALUES
(3, 'SEMITECH', 'Morong', 'admin', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'semitech@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `agent-id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `agent-id`, `fullname`, `position`, `email`) VALUES
(1, '123', 'adas', 'barker', ''),
(2, '456', 'barabas', 'fishball', 'tae@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `id` int(11) NOT NULL,
  `beneficiary_id` varchar(255) NOT NULL,
  `beneficiary_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`id`, `beneficiary_id`, `beneficiary_type`, `name`, `relationship`, `age`, `birthday`, `date`) VALUES
(85, 'FFPI-M20000', 'Primary', 'michael', '9898', 123, '2021-11-10', '11/20/2021'),
(86, 'FFPI-M20000', 'Contingent', 'michael 12312 michael', '123', 9898, '2021-11-24', '11/20/2021');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `manager` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch`, `manager`) VALUES
(1, 'Morong', 'Michael Ferrer'),
(2, 'Tanay', 'Kervy');

-- --------------------------------------------------------

--
-- Table structure for table `collectors`
--

CREATE TABLE `collectors` (
  `id` int(11) NOT NULL,
  `collector_id` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL DEFAULT 'None',
  `address` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `civilstatus` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contactnumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `areas_covered` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collectors`
--

INSERT INTO `collectors` (`id`, `collector_id`, `branch`, `date`, `fullname`, `suffix`, `address`, `birthday`, `age`, `civilstatus`, `gender`, `contactnumber`, `email`, `areas_covered`) VALUES
(1, 'FFPI-C20000', 'Morong', '10/16/2021', 'michael adaasda Ferrer', '', '753 t.claudio street    1960', '2021-10-18', 99, 'Married', 'Male', '1234567890', 'mf102798@gmail.com', 'asdas'),
(2, 'FFPI-C20001', 'Morong', '10/16/2021', 'michael adaasda Ferrer', '', '753 t.claudio street    1960', '2021-10-18', 99, 'Married', 'Male', '1234567890', 'mf102798@gmail.com', 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `dropdown_list`
--

CREATE TABLE `dropdown_list` (
  `id` int(11) NOT NULL,
  `civil_status_list` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dropdown_list`
--

INSERT INTO `dropdown_list` (`id`, `civil_status_list`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Widowed'),
(4, 'Divorced'),
(5, 'Annuled');

-- --------------------------------------------------------

--
-- Table structure for table `gender_list`
--

CREATE TABLE `gender_list` (
  `id` int(11) NOT NULL,
  `LIST` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender_list`
--

INSERT INTO `gender_list` (`id`, `LIST`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `health_status`
--

CREATE TABLE `health_status` (
  `id` int(11) NOT NULL,
  `planholderid` varchar(255) NOT NULL,
  `Q1` tinyint(1) NOT NULL,
  `Q2` tinyint(1) NOT NULL,
  `Q3` tinyint(1) NOT NULL,
  `Q4` tinyint(1) NOT NULL,
  `Q5` tinyint(1) NOT NULL,
  `Q6` tinyint(1) NOT NULL,
  `Q7` tinyint(1) NOT NULL,
  `Q8` tinyint(1) NOT NULL,
  `Q9` tinyint(1) NOT NULL,
  `Q10` tinyint(1) NOT NULL,
  `Q11` tinyint(1) NOT NULL,
  `Q12` tinyint(1) NOT NULL,
  `Q13` tinyint(1) NOT NULL,
  `Q14` tinyint(1) NOT NULL,
  `Q15` tinyint(1) NOT NULL,
  `Q16` tinyint(1) NOT NULL,
  `Q17` tinyint(1) NOT NULL,
  `Q18` tinyint(1) NOT NULL,
  `Q19` tinyint(1) NOT NULL,
  `Others` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `health_status`
--

INSERT INTO `health_status` (`id`, `planholderid`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`, `Q11`, `Q12`, `Q13`, `Q14`, `Q15`, `Q16`, `Q17`, `Q18`, `Q19`, `Others`) VALUES
(43, 'FFPI-M20000', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'tulo');

-- --------------------------------------------------------

--
-- Table structure for table `member_payment_history`
--

CREATE TABLE `member_payment_history` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_or` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `paid_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mode_of_payment_list`
--

CREATE TABLE `mode_of_payment_list` (
  `id` int(11) NOT NULL,
  `LIST` varchar(255) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mode_of_payment_list`
--

INSERT INTO `mode_of_payment_list` (`id`, `LIST`, `number`) VALUES
(1, 'Monthly/1 month', 60),
(2, 'Quarterly/3 months', 20),
(3, 'Semi-Annual/6 months', 10),
(4, 'Annually/12 months', 5),
(5, 'One Time Payment', 1);

-- --------------------------------------------------------

--
-- Table structure for table `planholders`
--

CREATE TABLE `planholders` (
  `id` int(11) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `date_registered` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `contract_no` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL DEFAULT 'None',
  `address` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `height` varchar(5) NOT NULL,
  `weight` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `planholders`
--

INSERT INTO `planholders` (`id`, `branch`, `date_registered`, `member_id`, `contract_no`, `full_name`, `first_name`, `middle_name`, `last_name`, `suffix`, `address`, `province`, `city`, `barangay`, `zipcode`, `birthday`, `age`, `birthplace`, `gender`, `civil_status`, `contact`, `email`, `height`, `weight`) VALUES
(43, 'Morong', '11/20/2021', 'FFPI-M20000', 'asdasd', 'michael 12312 Ferrer ', 'michael', '12312', 'Ferrer', '', '753 t.claudio street', 'BOHOL', 'CORELLA', 'Cancatac', 1960, '2021-11-24', 22, 'morong', 'Female', 'Single', 2147483647, 'mf102798@gmail.com', '1', '123');

-- --------------------------------------------------------

--
-- Table structure for table `planholders_plan`
--

CREATE TABLE `planholders_plan` (
  `id` int(11) NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `member_status` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `plan_type` varchar(50) NOT NULL,
  `mode_of_payment` varchar(50) NOT NULL,
  `monthly` varchar(50) NOT NULL,
  `number_of_payment_to_pay` int(11) NOT NULL,
  `amount_per_pay` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `number_of_paid` int(11) NOT NULL,
  `total_paid` int(11) NOT NULL,
  `remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `planholders_plan`
--

INSERT INTO `planholders_plan` (`id`, `member_id`, `member_status`, `full_name`, `plan_type`, `mode_of_payment`, `monthly`, `number_of_payment_to_pay`, `amount_per_pay`, `total`, `number_of_paid`, `total_paid`, `remaining`) VALUES
(42, 'FFPI-M20000', 'new', 'michael 12312 Ferrer ', 'FREEDOM GOLD', 'Quarterly/3 months', '300', 20, 900, 18000, 0, 0, 18000);

-- --------------------------------------------------------

--
-- Table structure for table `plan_type_list`
--

CREATE TABLE `plan_type_list` (
  `id` int(11) NOT NULL,
  `LIST` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `monthly` int(11) NOT NULL,
  `quarterly` int(11) NOT NULL,
  `semi-annual` int(11) NOT NULL,
  `annual` int(11) NOT NULL,
  `onetime` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan_type_list`
--

INSERT INTO `plan_type_list` (`id`, `LIST`, `amount`, `monthly`, `quarterly`, `semi-annual`, `annual`, `onetime`, `total_amount`) VALUES
(1, 'FREEDOM GOLD', 300, 300, 900, 1800, 3600, 18000, 18000),
(2, 'FREEDOM GOLD PLUS', 600, 600, 9000, 3600, 7200, 36000, 36000);

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `referral_id` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `referred_to` varchar(255) NOT NULL,
  `plan_type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `full_name`, `referral_id`, `position`, `referred_to`, `plan_type`, `date`) VALUES
(43, 'adas', '123', 'barker', 'FFPI-M20000', 'FREEDOM GOLD', '11/20/2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collectors`
--
ALTER TABLE `collectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dropdown_list`
--
ALTER TABLE `dropdown_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender_list`
--
ALTER TABLE `gender_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_status`
--
ALTER TABLE `health_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_payment_history`
--
ALTER TABLE `member_payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mode_of_payment_list`
--
ALTER TABLE `mode_of_payment_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planholders`
--
ALTER TABLE `planholders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planholders_plan`
--
ALTER TABLE `planholders_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_type_list`
--
ALTER TABLE `plan_type_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `collectors`
--
ALTER TABLE `collectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dropdown_list`
--
ALTER TABLE `dropdown_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gender_list`
--
ALTER TABLE `gender_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `health_status`
--
ALTER TABLE `health_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `member_payment_history`
--
ALTER TABLE `member_payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mode_of_payment_list`
--
ALTER TABLE `mode_of_payment_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `planholders`
--
ALTER TABLE `planholders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `planholders_plan`
--
ALTER TABLE `planholders_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `plan_type_list`
--
ALTER TABLE `plan_type_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
