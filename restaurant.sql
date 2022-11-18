-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 01:17 AM
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
  `emp_phone_no` text NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `d_o_a` date NOT NULL,
  `d_o_t` date NOT NULL,
  `salary` text NOT NULL,
  `supervisor_id` varchar(20) NOT NULL DEFAULT 'E001'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_address`, `emp_phone_no`, `emp_email`, `d_o_a`, `d_o_t`, `salary`, `supervisor_id`) VALUES
('E001', 'Dulara Akalanka', 'No. 79/B/1, Katuwapitiya, Negombo.', '0764934341', 'dulara@gmail.com', '2022-11-18', '0000-00-00', '15000', 'E001'),
('E002', 'Ishama Payoe', 'Negombo', '0312236762', 'ishama@gmail.com', '2022-11-06', '0000-00-00', '15000', 'E001'),
('E003', 'Himaya Fernando', 'Kochchikade', '0778524561', 'himaya@gmail.com', '2022-11-09', '0000-00-00', '12000', 'E001'),
('E004', 'Sanduni Nethranjali', 'Chillaw', '0759517638', 'sanduni@gmal.com', '2022-11-05', '0000-00-00', '15000', 'E001');

-- --------------------------------------------------------

--
-- Table structure for table `emp_role`
--

CREATE TABLE `emp_role` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'none',
  `emp_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_role`
--

INSERT INTO `emp_role` (`id`, `username`, `password`, `user_type`, `emp_id`) VALUES
(1, 'admin', 'admin123', 'admin', 'E001'),
(3, 'ishama', 'ishama123', 'cashier', 'E002');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` varchar(20) NOT NULL,
  `total` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `emp_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item`
--

CREATE TABLE `invoice_item` (
  `invoice_no` varchar(20) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `total` text NOT NULL,
  `emp_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` varchar(20) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `quantity` text NOT NULL,
  `unit_price` text NOT NULL,
  `d_o_m` date NOT NULL,
  `d_o_e` date NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `supplier_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `brand`, `quantity`, `unit_price`, `d_o_m`, `d_o_e`, `emp_id`, `supplier_id`) VALUES
('P001', 'Rolls', '', '20', '100', '2022-11-01', '0000-00-00', 'E001', 'S001'),
('P002', 'Pizza', 'Pizza Hut', '10', '400', '0000-00-00', '0000-00-00', 'E001', 'S002');

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
('S001', 'Kasun Madawa', 'No. 25, Lake Rd, Colombo', '0778524567', '2022-11-10', '36000'),
('S002', 'Mathew Vihaga', 'no. 1 Secon Rd, Gamapaha', '0741853625', '2022-11-09', '9000');

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
  ADD PRIMARY KEY (`invoice_no`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `invoice_item`
--
ALTER TABLE `invoice_item`
  ADD PRIMARY KEY (`invoice_no`);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `invoice` (`invoice_no`) ON DELETE CASCADE ON UPDATE CASCADE;

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
