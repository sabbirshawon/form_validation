-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 03:19 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_info`
--

CREATE TABLE `tbl_item_info` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `task_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item_info`
--

INSERT INTO `tbl_item_info` (`item_id`, `item_name`, `task_id`) VALUES
(1, 'php', 1),
(2, 'codeigniter', 1),
(3, 'laravel', 1),
(4, 'nodejs', 1),
(5, 'reactjs', 1),
(6, 'mongodb', 1),
(7, 'wordpress', 2),
(8, 'vuejs', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task_table`
--

CREATE TABLE `tbl_task_table` (
  `id` bigint(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `receipt_id` varchar(20) NOT NULL,
  `buyer_email` varchar(50) NOT NULL,
  `buyer_ip` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `hash_key` varchar(255) NOT NULL,
  `entry_at` date NOT NULL,
  `entry_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_task_table`
--

INSERT INTO `tbl_task_table` (`id`, `amount`, `buyer`, `receipt_id`, `buyer_email`, `buyer_ip`, `note`, `city`, `phone`, `hash_key`, `entry_at`, `entry_by`) VALUES
(1, 80000, 'Sabbir', 'Sabbir', 'sabbir@gmail.com', '::1', 'Test', 'Sylhet', '8801712345678', '1ea1923c67868af977ebc85ed42a4e6f61c7882f3d5d1f7fbe7921953adbcc997775695ee6c31e58d5b4de8aa42b4076890f8240b76f3de3a0a89270a0f2d28b', '2021-10-06', 99),
(2, 50000, 'Shawon', 'Shawon', 'shawon@gmail.com', '::1', 'Test', 'Dhaka', '8801712345678', 'e0497dc940be8eaece43470c69373fff8f25a78f0ceb6268bdd98999b84afe775168e5d90a74fbc34917216c126362b9df5d4dc1130f664a4e9e055660c5328a', '2021-10-06', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_item_info`
--
ALTER TABLE `tbl_item_info`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_task_table`
--
ALTER TABLE `tbl_task_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_item_info`
--
ALTER TABLE `tbl_item_info`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_task_table`
--
ALTER TABLE `tbl_task_table`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
