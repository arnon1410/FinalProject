-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 04:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` enum('M','F') COLLATE utf8_unicode_ci NOT NULL,
  `CustomerType` enum('Member','VIP','Other') COLLATE utf8_unicode_ci NOT NULL,
  `CustomerTelNo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `CustomerName`, `Gender`, `CustomerType`, `CustomerTelNo`) VALUES
(1000, 'Kim Namjoon', 'M', 'Member', '0034215674'),
(1001, 'Kim Seokjin', 'M', 'Member', '0957648314'),
(1002, 'Min Yoongi', 'M', 'VIP', '0023233345'),
(1003, 'Jung Hoseok', 'M', 'Member', '0868576754'),
(1004, 'Park Jimin', 'M', 'VIP', '0960796859'),
(1005, 'Kim Taehyung', 'M', 'Member', '0055434687'),
(1006, 'Joen Jungkook', 'M', 'VIP', '0967775539');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `gender` enum('M','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `username`, `password`, `name`, `level`, `gender`) VALUES
(61401, 'C61401', '1111', 'เจน', 'staff', 'F'),
(61402, 'C61402', '2222', 'นุ่น', 'staff', 'F'),
(61403, 'C61403', '3333', 'โบว์', 'admin', 'F'),
(61404, 'C61404', '4444', 'มาร์ค', 'manager', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `productname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `productdetail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productname`, `price`, `productdetail`) VALUES
(1, 'เอสเปรสโซ่', 55, ''),
(2, 'แบล็คคอฟฟี่', 50, ''),
(3, 'คาปูชิโน่', 60, ''),
(4, 'ลาเต้', 65, ''),
(5, 'มอคค่า', 70, ''),
(6, 'ไวท์ช็อค', 75, ''),
(7, 'ชาเขียว', 55, ''),
(8, 'ชานม', 50, ''),
(9, 'ชามะนาว', 45, ''),
(10, 'ชาดำ', 35, ''),
(11, 'มัทฉะถั่วแดง', 65, ''),
(12, 'ดาร์คช็อกโกแลต', 55, ''),
(13, 'นมสด', 50, ''),
(14, 'ช็อกโกแลต', 55, ''),
(15, 'สตรอเบอร์รี่ชีสเค้ก', 70, ''),
(16, 'น้ำลิ้นจี่', 45, ''),
(17, 'น้ำสตรอเบอร์รี่ปั่น', 55, ''),
(18, 'น้ำกีวี', 55, ''),
(19, 'น้ำมิกซ์เบอร์รี่', 55, ''),
(20, 'โยเกิร์ตสมูทตี้', 65, ''),
(21, 'นมเย็น', 25, '');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SaleID` int(11) NOT NULL,
  `SaleDate` date NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `GrandTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SaleID`, `SaleDate`, `username`, `GrandTotal`) VALUES
(1, '2020-05-02', 'C61401', 50),
(2, '2020-05-02', 'C61401', 70),
(3, '2020-05-02', 'C61402', 60);

-- --------------------------------------------------------

--
-- Table structure for table `sale_details`
--

CREATE TABLE `sale_details` (
  `SaleID` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `price` float NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sale_details`
--

INSERT INTO `sale_details` (`SaleID`, `productid`, `price`, `Quantity`) VALUES
(1, 2, 50, 1),
(2, 5, 70, 1),
(3, 3, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SaleID`);

--
-- Indexes for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`SaleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61412;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SaleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `SaleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
