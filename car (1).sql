-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2016 at 07:17 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE `tempahan` (
  `_id` int(11) NOT NULL,
  `vehicle_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `start_order` varchar(255) NOT NULL,
  `end_order` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`_id`, `vehicle_id`, `user_id`, `start_order`, `end_order`, `note`) VALUES
(1, 7, 1, '05/04/2016', '05/27/2016', 'asdsa'),
(2, 7, 1, '05/04/2016', '05/27/2016', 'dfsf'),
(3, 7, 1, '05/03/2016', '05/27/2016', 'dasd'),
(4, 7, 1, '05/03/2016', '05/10/2016', 'sdad');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_roles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_roles`) VALUES
(1, 'farid.developer.1992@gmail.com', 'e99a18c428cb38d5f260853678922e03', '03'),
(2, 'alangfc09@gmail.com', 'e99a18c428cb38d5f260853678922e03', '01'),
(3, 'dkrb3096@yahoo.com', 'e99a18c428cb38d5f260853678922e03', '02'),
(4, 'farid.developer.1992@gmail.com', 'e99a18c428cb38d5f260853678922e03', '02'),
(5, 'alangfc00019@yahoo.com', 'e99a18c428cb38d5f260853678922e03', '02'),
(6, 'alangfc00091@yahoo.com', 'e99a18c428cb38d5f260853678922e03', '02'),
(7, '', 'd41d8cd98f00b204e9800998ecf8427e', '03');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `_id` bigint(20) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `carry` varchar(255) NOT NULL,
  `type_vehicle` varchar(255) NOT NULL,
  `registration_no` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL,
  `measure_km` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`_id`, `designation`, `carry`, `type_vehicle`, `registration_no`, `date_created`, `measure_km`, `price`, `publish`) VALUES
(7, 'asd', '34', '324', '234', '05/25/2016', '234', '2343', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tempahan`
--
ALTER TABLE `tempahan`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
