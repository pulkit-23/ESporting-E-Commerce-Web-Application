-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2020 at 07:40 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esporting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstName` varchar(125) NOT NULL,
  `lastName` varchar(125) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstName`, `lastName`, `email`, `mobile`, `address`, `password`, `type`) VALUES
(6, 'Sarvesh', 'Kaushik', 'sarvesh@gmail.com', '9023720174', 'Punjab', 'abc@123', 'manager'),
(7, 'Pulkit', 'Gupta', 'pulkit@gmail.com', '9406542525', 'Bhopal', 'admin', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pname` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `fname` text NOT NULL,
  `oplace` text NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `uid`, `pid`, `pname`, `quantity`, `price`, `fname`, `oplace`, `mobile`) VALUES
(51, 15, 60, 'Helmet', 1, 800, 'Pulkit', 'Gulmohar', '9406543636'),
(52, 15, 61, 'Stumps', 2, 400, 'Pulkit', 'Jabalpur', '9023720480'),
(53, 16, 73, 'BasketBall', 1, 4899, 'Sarvesh', 'Punjab', '9023720480'),
(54, 15, 85, 'Swimming goggles', 1, 1299, 'Pulkit', 'Jabalpur', '9406542525');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pname` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `oplace` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `dstatus` varchar(10) NOT NULL DEFAULT 'no',
  `odate` date NOT NULL,
  `ddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `pid`, `pname`, `quantity`, `cost`, `oplace`, `mobile`, `dstatus`, `odate`, `ddate`) VALUES
(68, 15, 72, 'Exercise cycle', 1, 8499, 'Gulmohar', '9406542525', 'no', '2020-10-28', '2020-11-04'),
(69, 15, 68, 'Treadmill', 1, 31000, 'Kolar', '9023720174', 'no', '2020-10-28', '2020-11-04'),
(70, 15, 60, 'Helmet', 3, 2400, 'Gulmohar', '9406542525', 'no', '2020-10-28', '2020-11-04'),
(71, 15, 61, 'Stumps', 2, 800, 'Jabalpur', '9023720480', 'no', '2020-10-28', '2020-11-04'),
(72, 16, 73, 'BasketBall', 1, 4899, 'Punjab', '9023720480', 'no', '2020-10-28', '2020-11-04'),
(76, 15, 59, 'Cricket Ball', 5, 2500, 'Indore', '9406542525', 'Yes', '2020-10-28', '2020-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pName` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `available` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `item` varchar(100) NOT NULL,
  `pCode` varchar(20) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pName`, `price`, `description`, `available`, `category`, `type`, `item`, `pCode`, `picture`) VALUES
(58, 'Bat', 2600, 'Strong English Willow Bat', 15, 'Sports', 'sports', 'cricket', 'bat101', '1603793215.jpg'),
(59, 'Cricket Ball', 500, 'SG Seamer Leather Cricket Ball', 20, 'Sports', 'sports', 'cricket', 'ball102', '1603793473.jpg'),
(60, 'Helmet', 800, 'SG Optipro Cricket Helmet', 7, 'Sports', 'sports', 'cricket', 'helmet103', '1603793601.jpg'),
(61, 'Stumps', 400, 'Wooden Strong Cricket Stumps with Bails', 4, 'Sports', 'sports', 'cricket', 'stump104', '1603794843.jpg'),
(62, 'Gloves', 2300, 'White Original Adidas Cricket Batting Gloves', 11, 'Sports', 'sports', 'cricket', 'gloves105', '1603795035.jpg'),
(63, 'Scrabble', 600, 'Scrabble Board Game English Crossword Spelling Game For Kids', 8, 'Sports', 'sports', 'indoor', 'scrabble101', '1603796142.jpg'),
(64, 'Chess', 700, 'Premium Quality Wooden Foldable Chess Board with wooden pieces', 9, 'Sports', 'sports', 'indoor', 'chess102', '1603796429.jpg'),
(65, 'Uno Playing Cards', 115, 'High quality plastic playing cards', 28, 'Sports', 'sports', 'indoor', 'uno103', '1603796515.jpg'),
(66, 'Ludo', 425, 'Ludo Board game with plastic coating for durability', 13, 'Sports', 'sports', 'indoor', 'ludo104', '1603796653.png'),
(67, 'Carrom Board', 1170, 'Wooden 5x5 Carrom with 1 year warranty', 3, 'Sports', 'sports', 'indoor', 'carrom105', '1603796769.jpg'),
(68, 'Treadmill', 31000, 'Motorized Treadmill', 8, 'Sports', 'sports', 'gym', 'treadmill101', '1603797064.jpg'),
(69, 'Dumbbell', 1100, 'Metal 7.5 kgs dumbbell set', 3, 'Sports', 'sports', 'gym', 'dumbbell102', '1603797278.jpg'),
(70, 'Eliptical machine', 16999, 'Stationary exercise machine designed to simulate stair climbing', 7, 'Sports', 'sports', 'gym', 'eliptical103', '1603797442.png'),
(71, 'Bench Press', 9999, 'Multipurpose Bench Press for strength training', 10, 'Sports', 'sports', 'gym', 'benchpress104', '1603797631.jpg'),
(72, 'Exercise cycle', 8499, 'Air Bike Body Gym Exercise Cycle for Home Gym ', 14, 'Sports', 'sports', 'gym', 'cycle105', '1603797803.jpg'),
(73, 'BasketBall', 4899, 'Spalding NBA official game ball', 17, 'Sports', 'sports', 'basketball', 'basketball101', '1603798027.jpg'),
(74, 'Basket ball stand', 6300, 'Basketball System Basketball Hoop & Goal Basketball Equipment with Height Adjustable with Big Backboard & Wheels for Youth Kids Indoor Outdoor', 4, 'Sports', 'sports', 'basketball', 'stand102', '1603798164.jpg'),
(75, 'Jersey', 799, 'Lakers Basket Ball Jersey', 45, 'Sports', 'sports', 'basketball', 'basketjersey103', '1603798285.jpg'),
(76, 'Badminton Racket', 2399, 'Light weight strong professional badminton racket', 15, 'Sports', 'sports', 'badminton', 'racket101', '1603898689.jpg'),
(77, 'Shuttle cock', 90, 'Durable white feather shuttle cock', 50, 'Sports', 'sports', 'badminton', 'shuttle102', '1603898793.jpg'),
(78, 'Badminton Racket Cover', 200, 'leather waterproof cover for badminton racket', 20, 'Sports', 'sports', 'badminton', 'cover103', '1603898869.jpg'),
(79, 'Shoes for Badminton', 1999, 'Strong grip badminton red shoes', 12, 'Sports', 'sports', 'badminton', 'badmintonshoes104', '1603898985.jpg'),
(80, 'Football', 2400, 'Nike black n white football', 20, 'Sports', 'sports', 'football', 'football101', '1603899254.jpg'),
(81, 'Football shoes', 4999, 'Adidas orange studs', 10, 'Sports', 'sports', 'football', 'stud102', '1603899449.jpg'),
(82, 'Football Goal keeper gloves', 900, 'Stylish gloves for Goal keeper', 25, 'Sports', 'sports', 'football', 'footballgloves103', '1603899586.jpg'),
(83, 'Football socks', 300, 'Red long socks for football', 30, 'Sports', 'sports', 'football', 'footballsocks104', '1603899662.jpg'),
(84, 'Swimming safety Tube', 499, 'Flotable swimming tube with maximum safety', 35, 'Sports', 'sports', 'swim', 'tube101', '1603899819.jpg'),
(85, 'Swimming goggles', 1299, 'Blue swimming goggles with tight grip', 20, 'Sports', 'sports', 'swim', 'swimgoggle102', '1603899939.jpg'),
(86, 'Swimming ear plugs', 80, 'Comfortable ear plugs to protect ears from water', 60, 'Sports', 'sports', 'swim', 'earplug103', '1603900004.jpg'),
(87, 'Hockey stick', 2999, 'Strong hockey design with flawless design', 17, 'Sports', 'sports', 'hockey', 'stick101', '1603900174.jpg'),
(88, 'Hockey ball', 200, 'White hockey ball', 10, 'Sports', 'sports', 'hockey', 'hockeyball102', '1603900238.jpg'),
(89, 'Hockey helmet', 1500, 'Strong red Helmet with maximum safety', 5, 'Sports', 'sports', 'hockey', 'hockeyhelmet103', '1603900316.jpg'),
(90, 'Swimming cap', 400, 'Speedo black rubber swimming cap for head ', 10, 'Sports', 'sports', 'swim', 'cap104', '1603900429.jpg'),
(91, 'Hockey Jersey', 1300, 'India team hockey jersey blue colour', 18, 'Sports', 'sports', 'hockey', 'jersey104', '1603900613.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(120) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `mobile`, `address`, `password`) VALUES
(14, 'Shivam', 'Anand', 'shivam@gmail.com', '9023720174', 'Ranchi', 'abc123'),
(15, 'Pulkit', 'Gupta', 'pulkit@gmail.com', '9023720174', 'Bhopal', 'admin99'),
(16, 'Sarvesh', 'Kaushik', 'sarvesh@gmail.com', '9023720174', 'Punjab', 'abc@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
