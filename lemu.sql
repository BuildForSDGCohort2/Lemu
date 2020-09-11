-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 11, 2020 at 10:56 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lemu`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `validation_code` text NOT NULL,
  `register_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Banner_ad`
--

CREATE TABLE `Banner_ad` (
  `banner_id` int(11) NOT NULL,
  `banner_img` varchar(250) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Banner_ad1`
--

CREATE TABLE `Banner_ad1` (
  `banner_id` int(11) NOT NULL,
  `banner_img` varchar(250) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Banner_ad2`
--

CREATE TABLE `Banner_ad2` (
  `banner_id` int(11) NOT NULL,
  `banner_img` varchar(250) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `item_id` int(11) NOT NULL,
  `categoy` varchar(250) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_brand` varchar(250) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime NOT NULL,
  `item_description` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Daily`
--

CREATE TABLE `Daily` (
  `item_id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `item_brand` varchar(250) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_description` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `item_register` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Daily`
--

INSERT INTO `Daily` (`item_id`, `category`, `item_name`, `item_brand`, `item_price`, `item_image`, `item_description`, `admin_id`, `item_register`) VALUES
(1, 'Fashion', 'T-shirt', 'Fashion', 10.00, './assets/products/3.jpg', 'thanks', 1, '2020-09-04 16:45:30'),
(2, 'Phone', 'Samsung', 'Samsung', 155.00, './assets/products/1.png', 'Samsung', 1, '2020-09-04 16:45:30'),
(3, 'Home', 'Blander', 'Blander', 30.00, './assets/products/1.jpg', 'blender', 1, '2020-09-04 16:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `Latest`
--

CREATE TABLE `Latest` (
  `item_id` int(11) NOT NULL,
  `categoy` varchar(250) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_brand` varchar(250) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_description` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `item_register` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Latest`
--

INSERT INTO `Latest` (`item_id`, `categoy`, `item_name`, `item_brand`, `item_price`, `item_image`, `item_description`, `admin_id`, `item_register`) VALUES
(1, 'Watch', 'Watch', 'Watch', 15.00, './assets/products/2.jpg', 'yes', 1, '2020-09-04 16:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `Popular`
--

CREATE TABLE `Popular` (
  `item_id` int(11) NOT NULL,
  `categoy` varchar(250) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_brand` varchar(250) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_description` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `item_register` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Popular`
--

INSERT INTO `Popular` (`item_id`, `categoy`, `item_name`, `item_brand`, `item_price`, `item_image`, `item_description`, `admin_id`, `item_register`) VALUES
(1, 'Smart Phones', 'Samung', 'samsung', 150.00, './assets/products/1.png', 'all good', 1, '2020-09-04 11:08:57'),
(2, 'Smart phone', 'samung', 'samsung', 155.00, './assets/products/1.png', 'all', 1, '2020-09-04 14:27:37'),
(3, 'smart phones', 'samsung', 'samsung', 150.00, './assets/products/1.png', 'hello', 1, '2020-09-04 14:35:24'),
(4, 'smart', 'samsung', 'samsung', 155.00, './assets/products/1.png', 'welcome', 1, '2020-09-04 14:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Id` int(11) NOT NULL,
  `FirstName` varchar(250) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Username` varchar(250) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Password` text NOT NULL,
  `Validation_Code` text NOT NULL,
  `Active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `FirstName`, `LastName`, `Username`, `Email`, `Password`, `Validation_Code`, `Active`) VALUES
(1, 'Leonard', 'fghjk', 'dfghj', 'dfghj', '123456', '', 0),
(2, 'Leonard', 'Musonda', 'mcmusonda', 'mcmusonda@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'de4b4b120f531ef21056f71662a2ecb5', 0),
(3, 'leo', 'muzo', 'leomuzo', 'mcmu@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'ed160f82ef18e1a0f761d0b77329bb30', 1),
(4, 'joe', 'banda', 'joebanda', 'joe@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '85d0b787af1c5c622f74cd49d41dc1d6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `valification_code` text NOT NULL,
  `register_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`user_id`, `first_name`, `last_name`, `email`, `location`, `password`, `valification_code`, `register_date`) VALUES
(1, 'Leonard ', 'Musonda', 'mcmusonda@gmail.com', 'Bugema', '12345678', '123456', '2020-09-06 20:59:13');

-- --------------------------------------------------------

--
-- Table structure for table `Wishlist`
--

CREATE TABLE `Wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `Banner_ad`
--
ALTER TABLE `Banner_ad`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `Banner_ad1`
--
ALTER TABLE `Banner_ad1`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `Banner_ad2`
--
ALTER TABLE `Banner_ad2`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `Daily`
--
ALTER TABLE `Daily`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `Latest`
--
ALTER TABLE `Latest`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `Popular`
--
ALTER TABLE `Popular`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `Wishlist`
--
ALTER TABLE `Wishlist`
  ADD PRIMARY KEY (`cart_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Banner_ad`
--
ALTER TABLE `Banner_ad`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Banner_ad1`
--
ALTER TABLE `Banner_ad1`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Banner_ad2`
--
ALTER TABLE `Banner_ad2`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Cart`
--
ALTER TABLE `Cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Daily`
--
ALTER TABLE `Daily`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Latest`
--
ALTER TABLE `Latest`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Popular`
--
ALTER TABLE `Popular`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Wishlist`
--
ALTER TABLE `Wishlist`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
