-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2019 at 01:48 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrentaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `blog` varchar(500) NOT NULL,
  `date` varchar(20) NOT NULL,
  `cus_id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `blog`, `date`, `cus_id`, `name`) VALUES
(1, 'a', 'b', '20-Jul-2019', 643873, 'shakil'),
(2, 'Nissan Plugs in for Formula E Electric Car Racing', 'At the seasons last race in Red Hook, Brooklyn the first Japanese manufacturers team to compete takes third place on the podium', '20-Jul-2019', 643873, 'shakil');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `comment_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment` varchar(150) NOT NULL,
  `date` varchar(20) NOT NULL,
  `cus_name` varchar(20) NOT NULL,
  `cus_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`comment_id`, `blog_id`, `comment`, `date`, `cus_name`, `cus_id`) VALUES
(1, 2, 'Next year, BMW and Mercedes-Benz join the fray', '20-Jul-2019', 'shakil', 643873);

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `booking_id` varchar(20) NOT NULL,
  `car_id` int(20) NOT NULL,
  `pick_date` varchar(20) NOT NULL,
  `return_date` varchar(20) NOT NULL,
  `total_day` int(5) NOT NULL,
  `total_bill` float(10,2) NOT NULL,
  `price` float(10,2) NOT NULL,
  `pickup_location` varchar(20) NOT NULL,
  `booking_date` varchar(20) NOT NULL,
  `cus_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`booking_id`, `car_id`, `pick_date`, `return_date`, `total_day`, `total_bill`, `price`, `pickup_location`, `booking_date`, `cus_id`) VALUES
('058274', 41668, '07/23/2019', '07/23/2019', 1, 2500.00, 2500.00, 'Mohammodpur', '07/20/2019', 643873);

-- --------------------------------------------------------

--
-- Table structure for table `car_details`
--

CREATE TABLE `car_details` (
  `car_id` int(20) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `price` float(10,2) NOT NULL,
  `car_details` varchar(1000) NOT NULL,
  `class` varchar(20) NOT NULL,
  `fuel` varchar(20) NOT NULL,
  `door` varchar(20) NOT NULL,
  `gearbox` varchar(20) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `driver_phone` varchar(15) NOT NULL,
  `img1` varchar(250) NOT NULL,
  `renter_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_details`
--

INSERT INTO `car_details` (`car_id`, `car_name`, `price`, `car_details`, `class`, `fuel`, `door`, `gearbox`, `driver_name`, `driver_phone`, `img1`, `renter_id`) VALUES
(41668, 'Toyota', 2500.00, 'back camera Options- Excellent Air Conditioner,Push Start, Sun Roof, Cruise Control,DVD player, Back Camera Navigation, Projection Head light,Fog Light, Leather Interior, Power steering, Disk Brake, Power windows & mirror, 4abs, Air bag, Center , Tempered glass, Alloy Wheels, All power, All papers are up to date.', 'Compact', 'Petrol', '1', 'Automatic', 'Mikel', '0123654789', '20190720013441_20190324104846_car-6.jpg', 15432);

-- --------------------------------------------------------

--
-- Table structure for table `renter_details`
--

CREATE TABLE `renter_details` (
  `renter_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renter_details`
--

INSERT INTO `renter_details` (`renter_id`, `name`, `email`, `phone`, `password`, `role`) VALUES
(15432, 'X', 'x@g.com', '1823665656', '123', 1),
(17582, 'ss', 't@j.com', '456', '456', 0),
(351077, 'a', 'a@gmail.com', '016825852', '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale_car_details`
--

CREATE TABLE `sale_car_details` (
  `car_id` int(20) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `price` float(10,2) NOT NULL,
  `car_details` varchar(1000) NOT NULL,
  `class` varchar(20) NOT NULL,
  `fuel` varchar(20) NOT NULL,
  `door` varchar(20) NOT NULL,
  `gearbox` varchar(20) NOT NULL,
  `kilo` int(50) NOT NULL,
  `reg_date` varchar(15) NOT NULL,
  `img1` varchar(250) NOT NULL,
  `renter_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_car_details`
--

INSERT INTO `sale_car_details` (`car_id`, `car_name`, `price`, `car_details`, `class`, `fuel`, `door`, `gearbox`, `kilo`, `reg_date`, `img1`, `renter_id`) VALUES
(665389, 'Prado Land Cruiser', 3000000.00, 'back camera Options- Excellent Air Conditioner,Push Start, Sun Roof, Cruise Control,DVD player, Back Camera Navigation, Projection Head light,Fog Light, Leather Interior, Power steering, Disk Brake, Power windows & mirror, 4abs, Air bag, Center , Tempered glass, Alloy Wheels, All power, All papers are up to date.', 'Compact', 'Petrol', '1', 'Automatic', 2344, '2019-07-08', '20190720013205_pexels-photo-112460.jpeg', 351077);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(255) NOT NULL,
  `cus_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `cus_id`, `name`, `email`, `phone`, `address`, `password`) VALUES
(1, 643873, 'shakil', 'shakil@gmail.com', '01265895', 'dhaka', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `renter_details`
--
ALTER TABLE `renter_details`
  ADD PRIMARY KEY (`renter_id`);

--
-- Indexes for table `sale_car_details`
--
ALTER TABLE `sale_car_details`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
