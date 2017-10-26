-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 11:56 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `category_details` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`category_id`, `category_name`, `category_details`) VALUES
(1, 'Men', 'Men Shirt'),
(2, 'Women', 'Women Shirt'),
(3, 'Kids', 'Kids Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id`, `user_id`, `trans_id`, `product_id`, `qty`) VALUES
(1, 3, 1, 4, 1),
(2, 3, 1, 4, 2),
(3, 3, 1, 1, 2),
(4, 5, 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_image` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_size` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`product_id`, `product_name`, `product_price`, `product_qty`, `product_image`, `category_id`, `product_size`) VALUES
(1, 'Pour Favor', 100, 5, '../img/shirts/men/mshirt1.jpg', 1, 'S'),
(7, 'Falling Home', 150, 5, '../img/shirts/women/wshirt1.jpg', 2, 'S'),
(10, 'Skate or DIY', 90, 2, '../img/shirts/men/mshirt2.jpg', 1, 'S'),
(4, 'Dont Grow Up Its a Trap', 200, -5, '../img/shirts/kids/kshirt1.jpg', 3, 'S'),
(2, 'Pour Favor', 100, 4, '../img/shirts/men/mshirt1.jpg', 1, 'M'),
(3, 'Pour Favor', 100, 3, '../img/shirts/men/mshirt1.jpg', 1, 'L'),
(5, 'Dont Grow Up Its a Trap', 200, 4, '../img/shirts/kids/kshirt1.jpg', 3, 'M'),
(6, 'Dont Grow Up Its a Trap', 200, 3, '../img/shirts/kids/kshirt1.jpg', 3, 'L'),
(8, 'Falling Home', 150, 4, '../img/shirts/women/wshirt1.jpg', 2, 'M'),
(9, 'Falling Home', 150, 3, '../img/shirts/women/wshirt1.jpg', 2, 'L'),
(11, 'Skate or DIY', 90, 4, '../img/shirts/men/mshirt2.jpg', 1, 'M'),
(12, 'Skate or DIY', 90, 3, '../img/shirts/men/mshirt2.jpg', 1, 'L'),
(14, 'Bear Mountain', 150, 5, '../img/shirts/women/wshirt2.jpg', 2, 'S'),
(15, 'Baby Wack', 250, 5, '../img/shirts/kids/kshirt2.jpg', 3, 'S'),
(16, 'Baby Beast', 200, 5, '../img/shirts/kids/kshirt3.jpg', 3, 'S'),
(17, 'Bear Arms', 200, 4, '../img/shirts/women/wshirt3.jpg', 2, 'S'),
(18, 'Skate Otter', 200, 5, '../img/shirts/men/mshirt6.jpg', 1, 'S'),
(19, 'Good Vibes', 200, 5, '../img/shirts/women/wshirt6.jpg', 2, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `status_table`
--

CREATE TABLE `status_table` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_table`
--

INSERT INTO `status_table` (`status_id`, `status_name`) VALUES
(1, 'pending'),
(2, 'processing'),
(3, 'delivered'),
(4, 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_table`
--

CREATE TABLE `transaction_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `paymentmethod` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL,
  `date_updated` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_table`
--

INSERT INTO `transaction_table` (`id`, `user_id`, `firstname`, `lastname`, `address`, `barangay`, `municipality`, `province`, `mobile`, `email`, `paymentmethod`, `total_price`, `status`, `date_created`, `date_updated`) VALUES
(1, 3, 'user', 'user', '49 Quezon Boulevard 1100', 'Sta. Ana', 'Taytay', 'Rizal', 9257124860, 'user@gmail.com', 'cash', 200, 'processing', '2017-04-22 14:35:36', '2017-04-22 14:35:36'),
(2, 3, 'user', 'user', '49 Quezon Boulevard 1100', 'Sta. Ana', 'Taytay', 'Rizal', 9257124860, '', 'cash', 400, 'processing', '2017-04-22 15:04:49', '2017-04-22 15:04:49'),
(3, 3, 'user', 'user', '49 Quezon Boulevard 1100', 'Sta. Ana', 'Taytay', 'Rizal', 9257124860, '', 'cash', 200, 'pending', '2017-04-24 07:03:31', '2017-04-24 07:03:31'),
(4, 5, 'demo', 'demo', '36 fih', 'Sta. Ana', 'Taytay', 'Rizal', 9257124860, '', 'cash', 100, 'pending', '2017-04-24 07:06:40', '2017-04-24 07:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_information_table`
--

CREATE TABLE `user_information_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  `municipality` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `mobile` bigint(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information_table`
--

INSERT INTO `user_information_table` (`id`, `user_id`, `firstname`, `lastname`, `address`, `barangay`, `municipality`, `province`, `mobile`, `email`) VALUES
(1, 3, 'user', 'user', '49 Quezon Boulevard 1100', 'Sta. Ana', 'Taytay', 'Rizal', 9257124860, 'user@gmail.com'),
(2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'demo@gmail.com'),
(3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'demo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `user_type` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `password`, `email`, `user_type`) VALUES
(1, NULL, 'admin', 'admin@gmail.com', 1),
(2, NULL, NULL, 'guest@gmail.com', 3),
(3, NULL, 'user', 'user@gmail.com', 2),
(5, NULL, 'demo', 'demo@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type`, `type_id`) VALUES
(1, 'admin', 1),
(2, 'user', 2),
(3, 'guest', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indexes for table `status_table`
--
ALTER TABLE `status_table`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `transaction_table`
--
ALTER TABLE `transaction_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_information_table`
--
ALTER TABLE `user_information_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `status_table`
--
ALTER TABLE `status_table`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaction_table`
--
ALTER TABLE `transaction_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_information_table`
--
ALTER TABLE `user_information_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
