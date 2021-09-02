-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2019 at 09:22 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sumal`
--
CREATE DATABASE IF NOT EXISTS `sumal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sumal`;

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

DROP TABLE IF EXISTS `buy`;
CREATE TABLE `buy` (
  `id` int(11) NOT NULL,
  `syskey` bigint(20) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `createdUser` bigint(20) NOT NULL,
  `modifiedUser` bigint(20) NOT NULL,
  `voucherDate` datetime NOT NULL,
  `voucherNo` varchar(20) NOT NULL,
  `customerId` bigint(20) NOT NULL,
  `locationId` bigint(20) NOT NULL,
  `totalQty` int(11) NOT NULL,
  `totalAmount` decimal(10,0) NOT NULL,
  `n1` int(11) NOT NULL,
  `n2` int(11) NOT NULL,
  `n3` int(11) NOT NULL,
  `t1` varchar(100) NOT NULL,
  `t2` varchar(100) NOT NULL,
  `t3` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buydetail`
--

DROP TABLE IF EXISTS `buydetail`;
CREATE TABLE `buydetail` (
  `id` int(11) NOT NULL,
  `syskey` bigint(20) NOT NULL,
  `hsyskey` bigint(20) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `createdUser` bigint(20) NOT NULL,
  `modifiedUser` bigint(20) NOT NULL,
  `no` int(11) NOT NULL,
  `times` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `ratio` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `totalamount` decimal(10,0) NOT NULL,
  `n1` int(11) NOT NULL,
  `n2` int(11) NOT NULL,
  `t1` varchar(100) NOT NULL,
  `t2` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyserial`
--

DROP TABLE IF EXISTS `buyserial`;
CREATE TABLE `buyserial` (
  `id` int(11) NOT NULL,
  `hsyskey` bigint(20) NOT NULL,
  `dsyskey` bigint(20) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdUser` bigint(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `alpha` varchar(10) NOT NULL,
  `number` varchar(10) NOT NULL,
  `n1` int(11) NOT NULL,
  `n2` int(11) NOT NULL,
  `t1` varchar(100) NOT NULL,
  `t2` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `syskey` bigint(20) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `createdUser` bigint(20) NOT NULL,
  `modifiedUser` bigint(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `engName` varchar(100) NOT NULL,
  `mmName` varchar(100) NOT NULL,
  `nrc` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `n1` int(11) NOT NULL,
  `n2` int(11) NOT NULL,
  `t1` varchar(100) NOT NULL,
  `t2` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lotteryprize`
--

DROP TABLE IF EXISTS `lotteryprize`;
CREATE TABLE `lotteryprize` (
  `id` int(11) NOT NULL,
  `syskey` bigint(20) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `createdUser` bigint(20) NOT NULL,
  `modifiedUser` bigint(20) NOT NULL,
  `lotteryDate` datetime NOT NULL,
  `formNo` varchar(20) NOT NULL,
  `times` int(11) NOT NULL,
  `n1` int(11) NOT NULL,
  `n2` int(11) NOT NULL,
  `n3` int(11) NOT NULL,
  `t1` varchar(100) NOT NULL,
  `t2` varchar(100) NOT NULL,
  `t3` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lotteryprizedetail`
--

DROP TABLE IF EXISTS `lotteryprizedetail`;
CREATE TABLE `lotteryprizedetail` (
  `id` int(11) NOT NULL,
  `syskey` bigint(20) NOT NULL,
  `hsyskey` bigint(20) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `createdUser` bigint(20) NOT NULL,
  `modifiedUser` bigint(20) NOT NULL,
  `no` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `n1` int(11) NOT NULL,
  `n2` int(11) NOT NULL,
  `t1` varchar(100) NOT NULL,
  `t2` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prizeserial`
--

DROP TABLE IF EXISTS `prizeserial`;
CREATE TABLE `prizeserial` (
  `id` int(11) NOT NULL,
  `hsyskey` bigint(20) NOT NULL,
  `dsyskey` bigint(20) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdUser` bigint(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `alpha` varchar(10) NOT NULL,
  `number` varchar(10) NOT NULL,
  `n1` int(11) NOT NULL,
  `n2` int(11) NOT NULL,
  `t1` varchar(100) NOT NULL,
  `t2` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prizetype`
--

DROP TABLE IF EXISTS `prizetype`;
CREATE TABLE `prizetype` (
  `id` int(11) NOT NULL,
  `syskey` bigint(20) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `createdUser` bigint(20) NOT NULL,
  `modifiedUser` bigint(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `n1` int(11) NOT NULL,
  `n2` int(11) NOT NULL,
  `t1` varchar(100) NOT NULL,
  `t2` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `syskey` bigint(20) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `createdUser` bigint(20) NOT NULL,
  `modifiedUser` bigint(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `engName` varchar(100) NOT NULL,
  `mmName` varchar(100) NOT NULL,
  `nrc` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `n1` int(11) NOT NULL,
  `n2` int(11) NOT NULL,
  `t1` varchar(100) NOT NULL,
  `t2` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `syskey` (`syskey`);

--
-- Indexes for table `buydetail`
--
ALTER TABLE `buydetail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `syskey` (`syskey`);

--
-- Indexes for table `buyserial`
--
ALTER TABLE `buyserial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `syskey` (`syskey`);

--
-- Indexes for table `lotteryprize`
--
ALTER TABLE `lotteryprize`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `syskey` (`syskey`);

--
-- Indexes for table `lotteryprizedetail`
--
ALTER TABLE `lotteryprizedetail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `syskey` (`syskey`);

--
-- Indexes for table `prizeserial`
--
ALTER TABLE `prizeserial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prizetype`
--
ALTER TABLE `prizetype`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `syskey` (`syskey`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `syskey` (`syskey`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buydetail`
--
ALTER TABLE `buydetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyserial`
--
ALTER TABLE `buyserial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lotteryprize`
--
ALTER TABLE `lotteryprize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lotteryprizedetail`
--
ALTER TABLE `lotteryprizedetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prizeserial`
--
ALTER TABLE `prizeserial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prizetype`
--
ALTER TABLE `prizetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
