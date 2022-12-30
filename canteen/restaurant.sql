-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2022 at 02:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` varchar(20) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `emp_address` varchar(50) NOT NULL,
  `emp_phone_no` int(11) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `d_o_a` date NOT NULL,
  `d_o_t` date NOT NULL,
  `salary` int(11) NOT NULL,
  `supervisor_id` varchar(20) NOT NULL DEFAULT 'E001',
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_address`, `emp_phone_no`, `emp_email`, `d_o_a`, `d_o_t`, `salary`, `supervisor_id`, `deleted`) VALUES
('', '', '', 0, '', '0000-00-00', '0000-00-00', 0, 'E001', 1),
('anoj', 'saf', 'asf', 0, 'awdqwdqw@sadfasf.asdfa', '0000-00-00', '0000-00-00', 0, 'E001', 1),
('dgkduk', 'herhh', 'efhehe', 0, 'admin@phpzag.com', '2022-12-08', '0000-00-00', 0, 'E001', 0),
('E001', 'nadunqqqqq', 'seeduwa', 1234567890, 'admin@phpzag.com', '2022-11-30', '0000-00-00', 12000, 'E001', 1),
('E002', 'aloka', 'katuwapitiya', 1234567890, 'admin@phpzag.com', '2022-12-17', '0000-00-00', 0, 'E001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `emp_role`
--

CREATE TABLE `emp_role` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'cashier',
  `emp_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_role`
--

INSERT INTO `emp_role` (`id`, `username`, `password`, `user_type`, `emp_id`) VALUES
(11, 'admin', 'admin123', 'admin', 'E001'),
(12, 'cashier', 'cashier123', 'cashier', 'E001'),
(14, '', '', '', 'anoj'),
(16, '', '', '', ''),
(17, '', '', '', ''),
(18, '', '', '', 'dgkduk'),
(19, '', '', '', 'E002');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `order_total_before_tax` decimal(10,0) NOT NULL,
  `order_total_tax` decimal(10,0) NOT NULL,
  `order_total_after_tax` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `customer_name`, `order_total_before_tax`, `order_total_tax`, `order_total_after_tax`) VALUES
(67, 'eee', '1568', '0', '1568'),
(69, '', '1270', '0', '1270'),
(70, '', '500', '0', '500'),
(71, '', '468', '0', '468'),
(72, '', '234', '0', '234'),
(73, '', '234', '0', '234'),
(74, '', '234', '0', '234'),
(75, '', '500', '0', '500'),
(76, '', '0', '0', '0'),
(77, '', '0', '0', '0'),
(78, '', '234', '0', '234'),
(79, '', '234', '0', '234'),
(80, '', '234', '0', '234');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item`
--

CREATE TABLE `invoice_item` (
  `invoice_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `order_item_quantity` int(11) NOT NULL,
  `order_item_price` decimal(10,0) NOT NULL,
  `order_item_final_amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_item`
--

INSERT INTO `invoice_item` (`invoice_id`, `item_id`, `item_name`, `order_item_quantity`, `order_item_price`, `order_item_final_amount`) VALUES
(67, 31, 'burger', 11, '100', '1100'),
(67, 32, 'biscut', 2, '234', '468'),
(69, 34, 'biscut', 3, '234', '702'),
(69, 35, 'biscut', 2, '234', '468'),
(69, 36, 'burger', 1, '100', '100'),
(70, 37, 'burger', 5, '100', '500'),
(71, 38, 'biscut', 2, '234', '468'),
(72, 39, 'biscut', 1, '234', '234'),
(73, 40, 'biscut', 1, '234', '234'),
(74, 41, 'biscut', 1, '234', '234'),
(75, 42, 'burger', 5, '100', '500'),
(76, 43, 'burger', 0, '0', '0'),
(77, 44, 'burger', 0, '0', '0'),
(78, 45, 'biscut', 1, '234', '234'),
(79, 46, 'biscut', 0, '234', '234'),
(80, 47, 'biscut', 0, '234', '234');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_no` varchar(20) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,0) NOT NULL,
  `d_o_m` date NOT NULL,
  `d_o_e` date NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `supplier_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` varchar(20) NOT NULL,
  `sup_name` varchar(50) NOT NULL,
  `sup_address` varchar(50) NOT NULL,
  `sup_phone_no` text NOT NULL,
  `supply_date` date NOT NULL,
  `sup_payment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`, `sup_address`, `sup_phone_no`, `supply_date`, `sup_payment`) VALUES
('S001', 'Kasun Perera', 'Chillaw', '0764934341', '2022-12-28', '5000'),
('S002', 'Thisara Fernando', 'Seeduwa', '0759517638', '2022-12-24', '9000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `emp_role`
--
ALTER TABLE `emp_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoice_item`
--
ALTER TABLE `invoice_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_role`
--
ALTER TABLE `emp_role`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `invoice_item`
--
ALTER TABLE `invoice_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emp_role`
--
ALTER TABLE `emp_role`
  ADD CONSTRAINT `emp_role_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
