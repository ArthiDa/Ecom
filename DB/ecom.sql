-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2022 at 11:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `catagoryID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `ImgName` varchar(100) DEFAULT NULL,
  `ImgBanner` varchar(100) NOT NULL,
  `Quotes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catagoryID`, `Name`, `ImgName`, `ImgBanner`, `Quotes`) VALUES
(1, 'Smartphones', 'smartphones.jpg', 'smartphonesbanner.png', 'The world is in your pocket.'),
(2, 'Laptops', 'laptops.jpg', 'laptopsbanner.jpg', 'Once you get to naming your laptop, you know that you\'re really having a deep relationship with it.'),
(3, 'Gaming Consoles', 'consoles.jpg', 'consolesbanner.png', 'I\'m the hero of a thousand stories.'),
(4, 'Cameras', 'cameras.jpg', 'camerasbanner.jpg', 'Taking an image, freezing a moment, reveals how rich reality truly is.');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Passwords` varchar(200) NOT NULL,
  `Dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `Email`, `Name`, `Address`, `Country`, `Passwords`, `Dates`) VALUES
(1, 'arthi@gmail.com', 'Arthi Barua', 'Chandgaon, Chittagong', 'Bangladesh', '202cb962ac59075b964b07152d234b70', '2022-04-28'),
(2, 'busyqe@mailinator.com', 'Iola Sims', 'Amet et dignissimos', 'Aut magna aut deleni', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2022-04-28'),
(3, 'jituaurab78@gmail.com', 'Jitu ', 'Chandgaon, Chittagong', 'Bangladesh', '827ccb0eea8a706c4c34a16891f84e7b', '2022-04-29'),
(4, 'tapu@gmail.com', 'Tasmi Khair', 'Muradpur, Chittagong', 'Bangladesh', '827ccb0eea8a706c4c34a16891f84e7b', '2022-04-29'),
(5, 'tapubarman@gmail.com', 'Tapu Barman', 'Chittagong', 'Bangladesh', '827ccb0eea8a706c4c34a16891f84e7b', '2022-04-30'),
(8, 'turjo@gmail.com', 'Turjo', 'Chittagong', 'Bangladesh', '827ccb0eea8a706c4c34a16891f84e7b', '2022-05-01'),
(25, 'hisyhabu@mailinator.com', 'Jameson Farley', 'Et dolore cumque cor', 'Velit adipisci dolor', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2022-05-10'),
(26, 'shuvo@gmail.com', 'Shuvo Baidy', 'Chittagong', 'Bangladesh', '827ccb0eea8a706c4c34a16891f84e7b', '2022-05-12'),
(28, 'vehyk@mailinator.com', 'Hunter Nunez', 'Nesciunt consequatu', 'Voluptate sit odit e', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2022-05-13'),
(29, 'arrahman@gmail.com', 'AR Rahman', 'Delhi', 'India', 'f90b2b6ba6fce2888ad2094d5848192b', '2022-05-14'),
(30, 'niloy@gmail.com', 'SD Niloy', 'Muradpur, Chittagong', 'Bangladesh', '827ccb0eea8a706c4c34a16891f84e7b', '2022-05-14'),
(32, 'arijit@gmail.com', 'Arijit Singh', 'Mumbai', 'India', 'f0d24e1caed491e2e3990942c870ae8e', '2022-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `productID`, `Quantity`, `Dates`) VALUES
(1, 1, 1, 2, '2022-04-30'),
(2, 3, 1, 2, '2022-04-30'),
(3, 3, 2, 2, '2022-04-30'),
(4, 3, 4, 1, '2022-04-30'),
(5, 3, 3, 2, '2022-04-30'),
(8, 1, 2, 1, '2022-05-12'),
(9, 1, 4, 1, '2022-05-12'),
(11, 26, 4, 1, '2022-05-13'),
(13, 4, 1, 2, '2022-05-13'),
(15, 30, 3, 1, '2022-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `catagoryID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `ImgName` varchar(100) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Des` varchar(200) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `catagoryID`, `Title`, `ImgName`, `Price`, `Des`, `Status`) VALUES
(1, 1, 'Apple iPhone 13 Pro Max', 'Iphone-13.jpg', '1000.00', 'Apple iPhone 13 Pro Max smartphone. Announced Sep 2021. Features 6.7″ display, Apple A15 Bionic chipset, 4352 mAh battery, 1024 GB storage, 6 GB RAM', 0),
(2, 1, 'SAMSUNG Galaxy F22', 'Samsung-Galaxy.jpg', '256.00', 'Samsung Galaxy F22 Android smartphone. Announced Jul 2021. Features 6.4″ display, MT6769V chipset, 6000 mAh battery, 128 GB storage, 6 GB RAM.', 1),
(3, 1, 'Oppo F21 Pro 5G', 'oppo-f21-pro-5g.jpg', '449.90', 'Oppo F21 Pro Android smartphone. Announced Apr 2022. Features 6.43″ display, Snapdragon 680 4G chipset, 4500 mAh battery, 128 GB storage, 8 GB RAM', 1),
(4, 1, 'Vivo iQOO 9', 'vivo-iqoo-9.jpg', '635.00', 'vivo iQOO 9 Android smartphone. Announced Feb 2022. Features 6.56″ display, Snapdragon 888+ 5G chipset, 4350 mAh battery, 256 GB storage, 12 GB RAM', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catagoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `fk_orders` (`customerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `fk_product` (`catagoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catagoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`catagoryID`) REFERENCES `catagory` (`catagoryID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
