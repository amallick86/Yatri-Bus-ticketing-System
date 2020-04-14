-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 09:27 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yatri_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `admin_id` int(225) NOT NULL,
  `cmp_name` varchar(50) NOT NULL,
  `cmp_add` varchar(100) NOT NULL,
  `cmp_num` bigint(10) NOT NULL,
  `cmp_pan` bigint(20) NOT NULL,
  `admin_uname` varchar(15) NOT NULL,
  `admin_pass` varchar(40) NOT NULL,
  `admin_cpass` varchar(40) NOT NULL,
  `cmp_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`admin_id`, `cmp_name`, `cmp_add`, `cmp_num`, `cmp_pan`, `admin_uname`, `admin_pass`, `admin_cpass`, `cmp_amount`) VALUES
(1, 'Agni', 'fdfsdfds', 51815, 345465, 'agni', 'e10adc3949ba59abbe56e057f20f883e', '123456', '15100.00');

-- --------------------------------------------------------

--
-- Table structure for table `bus_detail`
--

CREATE TABLE `bus_detail` (
  `bus_id` bigint(225) NOT NULL,
  `bus_num` varchar(50) NOT NULL,
  `cmp_name` varchar(7) NOT NULL,
  `bus_from` varchar(50) NOT NULL,
  `bus_to` varchar(50) NOT NULL,
  `bus_date` date NOT NULL,
  `bus_time` varchar(6) NOT NULL,
  `bus_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_detail`
--

INSERT INTO `bus_detail` (`bus_id`, `bus_num`, `cmp_name`, `bus_from`, `bus_to`, `bus_date`, `bus_time`, `bus_price`) VALUES
(6, 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', '2019-10-22', '15:01', '700.00');

-- --------------------------------------------------------

--
-- Table structure for table `bus_seats`
--

CREATE TABLE `bus_seats` (
  `seat_id` int(255) NOT NULL,
  `seat_date` date NOT NULL,
  `bus_num` varchar(10) NOT NULL,
  `cmp_name` varchar(50) NOT NULL,
  `bus_from` varchar(20) NOT NULL,
  `bus_to` varchar(20) NOT NULL,
  `seat_name` varchar(20) NOT NULL,
  `seat_uname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `bus_time` time NOT NULL,
  `status` int(11) NOT NULL,
  `seat_num` varchar(5) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_seats`
--

INSERT INTO `bus_seats` (`seat_id`, `seat_date`, `bus_num`, `cmp_name`, `bus_from`, `bus_to`, `seat_name`, `seat_uname`, `username`, `total_price`, `bus_time`, `status`, `seat_num`, `timestamp`, `phone`) VALUES
(1, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'C1', 'Aashish Mallick', 'amallick86', '700.00', '15:01:00', 1, '1', '2019-10-22 16:06:04', 0),
(2, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'C2', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(3, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'C3', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(4, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'C4', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(5, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'C5', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(6, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'S1', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(7, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'S2', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(8, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'A1W', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(9, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'A2', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(10, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'B1', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(11, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'B2W', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(12, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'A3W', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(13, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'A4', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(14, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'B3', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(15, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'B4W', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(16, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'A5W', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(17, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'A6', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(18, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'B5', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(19, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'B6W', 'Aashish Mallick', 'amallick86', '700.00', '15:01:00', 1, '1', '2019-10-22 18:23:16', 9844329569),
(20, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'A7W', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(21, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'A8', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(22, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'B7', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(23, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'B8W', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(24, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'A9W', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(25, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'A10', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(26, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'B9', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(27, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'B10W', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(28, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'A11W', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(29, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'A12', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(30, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'B11', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(31, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'B12W', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(32, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'A13W', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(33, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'A14', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(34, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'A15', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(35, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'B13', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0),
(36, '2019-10-22', 'JN4568', 'Agni', 'Kathmandu', 'Janakpur', 'B14W', '0', '0', '0.00', '15:01:00', 0, '0', '2019-10-22 15:46:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(225) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_add` varchar(50) NOT NULL,
  `user_phn` bigint(10) NOT NULL,
  `user_dob` date NOT NULL,
  `user_uname` varchar(20) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_cpass` varchar(50) NOT NULL,
  `user_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `user_fname`, `user_lname`, `user_add`, `user_phn`, `user_dob`, `user_uname`, `user_pass`, `user_cpass`, `user_amount`) VALUES
(1, 'madhav', 'bhandari', 'palpa', 9845698258, '1976-03-31', 'madhav', 'e10adc3949ba59abbe56e057f20f883e', '123456', '17901.69'),
(2, 'Aashish', 'Mallick', 'Talchhikhel,Satdobato,Lalitpur,Nepal', 9844329569, '2019-09-17', 'amallick86', 'e10adc3949ba59abbe56e057f20f883e', '123456', '8300.00'),
(4, 'ravi', 'pau', 'ban', 15446848165, '2019-09-12', 'ravi', 'e10adc3949ba59abbe56e057f20f883e', '123456', '17901.69');

-- --------------------------------------------------------

--
-- Table structure for table `user_transection_details`
--

CREATE TABLE `user_transection_details` (
  `tran_id` bigint(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `cmp_name` varchar(50) NOT NULL,
  `admin_uname` varchar(50) NOT NULL,
  `bus_num` varchar(10) NOT NULL,
  `seat` varchar(5) NOT NULL,
  `status` varchar(10) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_transection_details`
--

INSERT INTO `user_transection_details` (`tran_id`, `username`, `name`, `date`, `cmp_name`, `admin_uname`, `bus_num`, `seat`, `status`, `credit`, `timestamp`) VALUES
(1, 'amallick86', 'Aashish Mallick', '2019-10-22', 'Agni', 'agni', 'JN4568 ', 'B6W', 'Paid', '700.00', '2019-10-22 18:23:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_uname` (`admin_uname`);

--
-- Indexes for table `bus_detail`
--
ALTER TABLE `bus_detail`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `bus_seats`
--
ALTER TABLE `bus_seats`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_uname` (`user_uname`),
  ADD UNIQUE KEY `user_phn` (`user_phn`);

--
-- Indexes for table `user_transection_details`
--
ALTER TABLE `user_transection_details`
  ADD PRIMARY KEY (`tran_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `admin_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bus_detail`
--
ALTER TABLE `bus_detail`
  MODIFY `bus_id` bigint(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bus_seats`
--
ALTER TABLE `bus_seats`
  MODIFY `seat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_transection_details`
--
ALTER TABLE `user_transection_details`
  MODIFY `tran_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
