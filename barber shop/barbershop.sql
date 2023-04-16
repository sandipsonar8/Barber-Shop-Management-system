-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2023 at 03:03 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barbershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'pass@admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(255) NOT NULL,
  `uid` int(50) NOT NULL,
  `pid` int(50) NOT NULL,
  `hour` int(50) NOT NULL,
  `min` varchar(50) NOT NULL,
  `ampm` text NOT NULL,
  `status` text NOT NULL,
  `reason` varchar(200) NOT NULL,
  `doa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `uid`, `pid`, `hour`, `min`, `ampm`, `status`, `reason`, `doa`) VALUES
(1, 1, 2, 1, '00', 'AM', 'accepted', '', NULL),
(2, 1, 2, 1, '00', 'PM', 'rejected', 'shop is closed today', NULL),
(3, 1, 2, 6, '00', 'PM', 'pending', '', NULL),
(4, 1, 8, 6, '15', 'AM', 'pending', '', '0000-00-00'),
(5, 1, 8, 8, '18', 'AM', 'pending', '', '1970-01-01'),
(6, 1, 8, 12, '18', 'AM', 'pending', '', '0000-00-00'),
(7, 1, 8, 11, '17', 'AM', 'pending', '', '0000-00-00'),
(8, 1, 2, 9, '16', 'PM', 'pending', '', '0000-00-00'),
(9, 1, 2, 8, '17', 'PM', 'pending', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(255) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `pimage` mediumtext NOT NULL,
  `price` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `pimage`, `price`, `type`, `gender`) VALUES
(1, 'simple shave', '../productimages/pexels-cottonbro-studio-3998429.jpg', '400', 'shave', 'boys'),
(2, 'Pomp cut', '../productimages/istockphoto-640274128-612x612.jpg', '400', 'haircut', 'boys'),
(3, 'Straightening', '../productimages/hair-str.jpg', '500', 'hairstraightening', 'girls'),
(5, 'facial', '../productimages/40147940_2-garnier-men-hair-colour-color-naturals-for-men.webp', '1000', 'facial', 'both'),
(6, 'full', '../productimages/istockphoto-872361244-612x612.jpg', '400', 'shave', 'boys'),
(7, 'yever yuth face wash', '../productimages/Everyuth Orange Peel Off-750x750.jpg', '100', 'facial', 'girls'),
(8, 'short', '../productimages/pexels-adrian-agpasa-11419398.jpg', '400', 'haircut', 'girls'),
(9, 'pomp', '../productimages/pexels-jonathan-nenemann-4952625.jpg', '500', 'haircut', 'boys'),
(10, 'casual cut', '../productimages/pexels-valeria-boltneva-696285.jpg', '400', 'haircut', 'girls'),
(11, 'one side', '../productimages/pexels-thgusstavo-santana-2040189.jpg', '450', 'haircut', 'boys'),
(12, 'gold wash', '../productimages/shopping.webp', '500', 'spa', 'girls'),
(13, 'Hair Washing', '../productimages/pexels-cottonbro-studio-3993461.jpg', '600', 'hairstraightening', 'girls'),
(14, 'Straight cut', '../productimages/phillips-hair-straighteners-hair-styling-tool.jpg', '450', 'haircut', 'girls'),
(15, 'bleech normal', '../productimages/44.1-richfeel-Luxury-Gold-Bleach-Kit-28g.jpg', '400', 'bleech', 'girls');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(255) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `fname`, `lname`, `mobile`, `password`) VALUES
(1, 'sham', 'soni', '1234567890', 'pass@admin'),
(2, 'ajay', 'deshamukh', '9090090900', 'pass@admin'),
(3, 'John', 'Doe', '1234567891', '1111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
