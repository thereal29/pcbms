-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 11:20 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `firstname`, `lastname`, `phone_number`) VALUES
(1, 'DARYL', 'PIAMONTE', '09123871293');

-- --------------------------------------------------------

--
-- Table structure for table `dtr`
--

CREATE TABLE `dtr` (
  `dtr_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtr`
--

INSERT INTO `dtr` (`dtr_id`, `user_id`, `username`, `purpose`, `datetime`) VALUES
(1, 4, 'admin', 'Admin admin logout', '2022-04-01 16:25:18'),
(2, 1, 'admin', 'Admin admin login', '2022-04-01 16:25:22'),
(3, 1, 'admin', 'Admin admin logout', '2022-04-01 16:25:31'),
(4, 2, 'manager', 'Manager manager login', '2022-04-01 16:25:37'),
(5, 2, 'manager', 'Manager manager logout', '2022-04-01 16:25:42'),
(6, 1, 'admin', 'Admin admin login', '2022-04-01 16:25:50'),
(7, 1, 'admin', 'Admin admin logout', '2022-04-01 16:27:27'),
(8, 3, 'cashier', 'User cashier login', '2022-04-01 16:27:42'),
(9, 3, 'cashier', 'User cashier logout', '2022-04-01 16:28:20'),
(10, 1, 'admin', 'Admin admin login', '2022-04-01 16:28:25'),
(11, 1, 'admin', 'Admin admin switch to POS', '2022-04-01 17:18:03'),
(12, 1, 'admin', 'Admin admin switch to Administration', '2022-04-01 17:18:31'),
(13, 1, 'admin', 'Admin admin logout', '2022-04-01 17:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `hired_date` varchar(50) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `firstname`, `middlename`, `lastname`, `gender`, `email`, `phone_number`, `job_id`, `hired_date`, `location_id`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'Male', 'admin@sample.com', '09123123123', 3, '2022-04-01', 1),
(2, 'Manager', 'Manager', 'Manager', 'Male', 'manager@sample.com', '09617053870', 1, '2022-04-01', 2),
(3, 'Cashier', 'Cashier', 'Cashier', 'Male', 'cashier@sample.com', '09123123822', 2, '2022-04-01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_title`) VALUES
(1, 'Manager'),
(2, 'Cashier'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `province` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `province`, `city`) VALUES
(1, 'Southern Leyte', 'San Juan'),
(2, 'Southern Leyte', 'San Juan'),
(3, 'Southern Leyte', 'San Juan');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `logs_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `user_id`, `username`, `purpose`, `logs_datetime`) VALUES
(1, 4, 'admin', 'Added Admin, Admin as Employee', '2022-04-01 16:22:55'),
(2, 4, 'admin', 'Added Manager, Manager as Employee', '2022-04-01 16:23:42'),
(3, 4, 'admin', 'Added Cashier, Cashier as Employee', '2022-04-01 16:24:17'),
(4, 4, 'admin', 'Updated the account of Admin, Admin', '2022-04-01 16:24:42'),
(5, 4, 'manager', 'Updated the account of Manager, Manager', '2022-04-01 16:24:59'),
(6, 4, 'cashier', 'Updated the account of Cashier, Cashier', '2022-04-01 16:25:12'),
(7, 1, 'admin', 'Ordered 100 Pack of Potato Chips product', '2022-04-01 16:26:34'),
(8, 1, 'admin', 'Updated the product delivery of Potato Chips into On Delivery', '2022-04-01 16:26:42'),
(9, 1, 'admin', 'Updated the product delivery of Potato Chips into Delivered ', '2022-04-01 16:26:44'),
(10, 0, 'cashier', 'Product sold of 10 stocks with barcode 02394802 ', '2022-04-01 16:28:14'),
(11, 0, 'admin', 'Product sold of 20 stocks with barcode 02394802 ', '2022-04-01 17:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `percentage` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `unit`, `percentage`) VALUES
(1, 'Potato Chips', 'Pack', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_delivery`
--

CREATE TABLE `product_delivery` (
  `d_code` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `del_date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_delivery`
--

INSERT INTO `product_delivery` (`d_code`, `supplier_id`, `del_date`, `status`) VALUES
(1, 1, '2022-04-01', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `item_id` int(100) NOT NULL,
  `d_code` int(100) NOT NULL,
  `product_code` varchar(30) DEFAULT NULL,
  `product_id` int(100) NOT NULL,
  `purchase_unit_price` varchar(50) NOT NULL,
  `selling_unit_price` varchar(20) DEFAULT NULL,
  `expiry_date` varchar(50) NOT NULL,
  `quantity_stock` int(100) NOT NULL,
  `date_stock_in` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`item_id`, `d_code`, `product_code`, `product_id`, `purchase_unit_price`, `selling_unit_price`, `expiry_date`, `quantity_stock`, `date_stock_in`) VALUES
(1, 1, '02394802', 1, '50', '60', '2022-05-01', 70, '2022-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `receipt_no` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `employee_id` int(20) NOT NULL,
  `discount` int(20) NOT NULL,
  `total` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`receipt_no`, `cust_id`, `employee_id`, `discount`, `total`, `date`) VALUES
(1, 1, 3, 20, '480', '2022-04-01 16:28:14'),
(2, 1, 1, 0, '1200', '2022-04-01 17:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `sales_product`
--

CREATE TABLE `sales_product` (
  `receipt_no` int(20) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `qty` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_product`
--

INSERT INTO `sales_product` (`receipt_no`, `product_code`, `price`, `qty`) VALUES
(1, '2394802', '60.00', 10),
(2, '2394802', '60.00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `location_id` int(11) NOT NULL,
  `phone_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `company_name`, `location_id`, `phone_number`) VALUES
(1, 'Prince Hypermart', 3, '09123123123');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `employee_id`, `username`, `password`, `job_id`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 3),
(2, 2, 'manager', '1d0258c2440a8d19e716292b231e3190', 1),
(3, 3, 'cashier', '6ac2470ed8ccf204fd5ff89b32a355cf', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `dtr`
--
ALTER TABLE `dtr`
  ADD PRIMARY KEY (`dtr_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_delivery`
--
ALTER TABLE `product_delivery`
  ADD PRIMARY KEY (`d_code`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `d_code` (`d_code`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`receipt_no`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `sales_product`
--
ALTER TABLE `sales_product`
  ADD KEY `receipt_no` (`receipt_no`),
  ADD KEY `product_id` (`product_code`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `type_id` (`job_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `dtr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_delivery`
--
ALTER TABLE `product_delivery`
  MODIFY `d_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `item_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `receipt_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
