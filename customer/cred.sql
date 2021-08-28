-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 08:06 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cred`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `uid` int(10) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `password` varchar(22) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `payment method` varchar(20) NOT NULL,
  `payment no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`uid`, `uname`, `firstname`, `lastname`, `password`, `email`, `phone`, `type`, `payment method`, `payment no`) VALUES
(1, 'example', 'Example', 'Test', '123456', 'example@hotmail.com', '01765235487', 'customer', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `Flight ID` int(50) NOT NULL,
  `Source` varchar(50) NOT NULL,
  `Destination` varchar(50) NOT NULL,
  `Departure` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`Flight ID`, `Source`, `Destination`, `Departure`, `Date`, `Price`) VALUES
(1, 'ctg', 'dhaka', '8:00', '2010-10-19', 2500),
(2, 'Dhaka', 'ctg', '16:30', '2011-12-19', 1000),
(3, 'Dhaka', 'Syedpur', '9:30', '2019-12-01', 1500),
(4, 'Dhaka', 'Syedpur', '9:30', '2019-12-01', 1500),
(5, 'Dhaka', 'Coxs', '07:00', '2019-01-31', 3000),
(6, 'ctg', 'dhaka', '10', '2019-10-18', 3000),
(7, 'Dhaka', 'ctg', '', '2014-01-01', 0),
(8, 'Dhaka', 'ctg', '05:30', '2019-12-12', 5000),
(9, 'ctg', 'dhaka', '10:00', '2020-09-01', 2500),
(10, 'ctg', 'dhaka', '10:00', '2020-09-01', 2500),
(11, 'ctg', 'dhaka', '05:30', '0000-00-00', 25000),
(12, 'ctg', 'dhaka', '9:30', '2020-09-19', 25000),
(13, 'ctg', 'Coxs', '9:30', '2020-09-23', 3000),
(14, 'Dhaka', 'Sylhet', '10:50', '2020-09-18', 4000),
(15, 'Sylhet', 'Cox', '20:00', '2020-09-18', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `luggage`
--

CREATE TABLE `luggage` (
  `id` int(20) NOT NULL,
  `owner` varchar(256) NOT NULL,
  `token no` varchar(256) NOT NULL,
  `flight no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `managerinfo`
--

CREATE TABLE `managerinfo` (
  `fname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(20) NOT NULL,
  `area` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fathersName` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managerinfo`
--

INSERT INTO `managerinfo` (`fname`, `lname`, `username`, `password`, `email`, `phone`, `area`, `fathersName`, `nid`) VALUES
('Ashiqul Hoque', 'chowdhury', 'ashiq4321', 'ashiq4321', 'ashiqulhoque45@gmail.com', 1823828500, 'bashundhara', 'shafiqul hoque chowdhury', 1670464084);

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `role` varchar(256) NOT NULL,
  `location` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id`, `name`, `role`, `location`) VALUES
(1, 'first', 'maintenance', 'Dhaka'),
(2, 'second', 'operational', 'CTG');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `passenger_name` varchar(256) NOT NULL,
  `phone` int(11) NOT NULL,
  `source` varchar(256) NOT NULL,
  `destination` varchar(256) NOT NULL,
  `flight_no` varchar(256) NOT NULL,
  `seat_no` varchar(256) NOT NULL,
  `baggage_token` varchar(20) NOT NULL,
  `bill` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`passenger_name`, `phone`, `source`, `destination`, `flight_no`, `seat_no`, `baggage_token`, `bill`) VALUES
('', 0, '', '', '', '', '', 0),
('shihab', 1811111111, 'Dhaka', 'CTG', '', '', 'B-1236', 0),
('', 0, '', '', '', '', '', 0),
('', 0, '', '', '', '', '', 0),
('shihab', 1511111111, 'Dhaka', 'ctg', '10', '20A', 'B1234', 0),
('shihab', 1511111111, 'Dhaka', 'ctg', '10', '20A', 'B1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE `purchased` (
  `id` int(20) NOT NULL,
  `uname` varchar(256) NOT NULL,
  `source` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`id`, `uname`, `source`, `destination`, `date`, `amount`) VALUES
(1, 'rachel', 'Dhaka', 'CTG', '2020-12-01', 0),
(2, 'rachel', 'DHAKA', '5000', '2020-12-30', 0),
(3, 'rachel', 'DHAKA', '2500', '2020-12-30', 0),
(4, 'rachel', 'DHAKA', '2500', '2020-12-30', 0),
(5, 'test', '\"DHAKA', 'CTG', '2020-12-31', 3500),
(6, 'rachel', 'DHAKA', 'CTG', '2020-12-30', 2500),
(9, 'example', '', '', '2021-08-16', 0),
(10, 'example', 'sylhet', 'dhaka', '2021-08-16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE `reserved` (
  `Flight ID` int(50) NOT NULL,
  `uid` int(20) NOT NULL,
  `agent id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserved`
--

INSERT INTO `reserved` (`Flight ID`, `uid`, `agent id`, `date`) VALUES
(2, 2, 5, '2020-09-12'),
(2, 1, 5, '2020-09-12'),
(2, 2, 5, '2020-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(20) NOT NULL,
  `name` varchar(256) NOT NULL,
  `location` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `location`, `startdate`, `status`) VALUES
(1, 'staff1', 'Dhaka Airport', '2020-12-01', 'Training'),
(2, 'staff2', 'CTG Airport', '2020-12-02', 'Complete'),
(3, 'staff3', 'Dhaka Airport', '2020-12-31', 'Training');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `uid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`uid`, `firstname`, `lastname`, `uname`, `gender`, `password`, `email`, `contact`) VALUES
(1, 'Chandler', 'Bing', 'Chan', 'male', '202cb962ac59075b964b07152d234b70', 'cb@gmail.com', '01705719021'),
(2, 'Joey', 'Tribbiani', 'Joe', 'male', '1234', 'JT@gmail.com', '01836252698'),
(3, 'Joey', 'Tribbiani', 'Joe', 'male', '202cb962ac59075b964b07152d234b70', 'JT@gmail.com', '01836252698'),
(4, 'Joey', 'Tribbiani', 'Joe', 'male', '202cb962ac59075b964b07152d234b70', 'JT@gmail.com', '01836252698'),
(5, 'Joey', 'Tribbiani', 'Joe', 'male', '202cb962ac59075b964b07152d234b70', 'JT@gmail.com', '01836252698'),
(6, 'Musaddiq', 'karim', 'Musa1', 'male', '202cb962ac59075b964b07152d234b70', 'musaddiqmk19@gmail.com', '01705719021'),
(7, 'Chandler', 'Bing', 'chan1', 'male', '202cb962ac59075b964b07152d234b70', 'c@gmail.com', '01705719021'),
(8, 'Chandler', 'Bing', 'chan1', 'male', '202cb962ac59075b964b07152d234b70', 'c@gmail.com', '01705719021'),
(9, 'Chandler', 'Bing', 'chan1', 'male', '202cb962ac59075b964b07152d234b70', 'c@gmail.com', '01705719021'),
(10, 'Frank', 'Castle', 'Frank', 'male', '202cb962ac59075b964b07152d234b70', 'p@gmail.com', '01705719021'),
(11, 'Monica', 'Geller', 'monica', 'female', '202cb962ac59075b964b07152d234b70', 'm@gmail.com', '01705719021'),
(12, 'Musa', 'karim', 'mak01', 'male', '202cb962ac59075b964b07152d234b70', 'musaddiqmk19@gmail.com', '01705719021');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(10) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `payment method` varchar(20) NOT NULL,
  `payment no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `firstname`, `lastname`, `password`, `email`, `phone`, `type`, `payment method`, `payment no`) VALUES
(1, 'joey', 'xyz', 'qwe', '1234', 'a@gmail.com', '01111155874', 'admin', '', ''),
(2, 'mina', 'xyz', 'qwe', '1234', 'a@gmail.com', '01716409087', 'agent', '', ''),
(3, 'raju', 'xyz', 'qwe', '202cb962ac59075b964b07152d234b70', 'a@gmail.com', '01716409087', 'manager', '', ''),
(4, 'Musaddiq01', 'Musaddiq Al', 'Karim', 'cea8ce5bd901d2d44ffad2da8e49a6d9', 'musaddiqmk19@gmail.c', '01705719021', 'manager', '', ''),
(5, 'Rio', 'Rio', 'Denver', '12345', 'r@gmail.com', '45678912312', 'agent', '', ''),
(6, 'rachel', 'Rachel', 'Green', '12345', 'rg@gmail.com', '01705719021', 'customer', 'Bkash', '01712345678'),
(7, 'Sheldor', 'Sheldon', 'Cooper', '12345', 'sc@gmail.com', '01234567896', 'admin', '', ''),
(9, 'howo', 'Howard', 'Wolowitz', '1234', 'howo@gmail.com', '01323123456', 'admin', '', ''),
(10, 'agent1', 'agent1', 'one', '1234', 'agent1@gmail.com', '01811111111', 'agent', '', ''),
(11, 'agent1', 'agent1', 'one', '1234', 'agent1@gmail.com', '01811111111', 'agent', '', ''),
(12, 'manager1', 'manager1', 'one', '1234', 'manager1ch@example.c', '01111111111', 'manager', '', ''),
(13, 'LH111', 'Leonard', 'Hofstader', '1234', 'qq', '98765412301', 'admin', '', ''),
(14, 'new12', 'new12', 'new12', '1234', 'new', '78945612301', 'admin', '', ''),
(15, 'mm0011', 'Mak01', 'Mak91', '1234', 'aaa@g.com', '01705719021', 'admin', '', ''),
(16, 'customer1', 'Test1', 'customer', '12345', 'customer@example.com', '01620111111', 'admin', '', ''),
(17, 'customer1', 'Test1', 'customer', '123456', 'customer@example.com', '01620111111', 'customer', '', ''),
(18, 'customer2', 'Test2', 'customer', '123456', 'customer1ch@gmail.co', '01620111112', 'customer', '', ''),
(19, 'Agent1', 'Agent1', 'new', '1234', 'agent1@example.com', '01234567897', 'customer', '', ''),
(20, 'Agent2', 'Agent2', 'new', '123456', 'agent2ch@example.com', '01321456988', 'agent', '', ''),
(21, 'Agent2', 'Agent2', 'new', '123456', 'agent2ch@example.com', '01321456988', 'agent', '', ''),
(22, 'Agent3', 'agent3', 'new', '12345', 'agent3@example.com', '01411111111', 'agent', '', ''),
(23, 'manager2', 'manager2', 'new', '12345', 'manager2@example.com', '01311111111', 'manager', '', ''),
(24, 'manager2', 'manager2', 'new', '12345', 'manager2@example.com', '01311111111', 'agent', '', ''),
(25, 'newagent', 'new', 'agent', '1234', 'newagent@example.com', '01611111111', 'agent', '', ''),
(26, 'ssadik', 'shihab', 'sadik', '12345', 'shihab@exampl.com', '01411111111', 'customer', 'Visa', '45655456555'),
(32, 'aacfahim@gmail.com', 'Ashfaq', 'Chowdhury', 'aacfahim@gmail.com', 'aacfahim@gmail.com', '01815548625', 'customer', '', ''),
(33, 'aacfahim@gmail.com', 'Ashfaq', 'Chowdhury', 'aacfahim@gmail.com', 'aacfahim@gmail.com', '01563325658', 'customer', '', ''),
(34, 'asdf', 'XGvdfgbd', 'dfhgdfshbdf', 'aacfahim@hotmail.com', 'aacfahim@hotmail.com', '01795606454', 'customer', '', ''),
(35, '5165156', 'BIMAN', 'LONDON', '01453689562', 'aacfahim@yahoo.com', '01453689562', 'customer', '', ''),
(36, 'dfsaFsdf', 'fahim', 'adfsd', 'dfsaFsdf', 'aacfahim@lol.com', '01558958462', 'customer', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`Flight ID`),
  ADD UNIQUE KEY `Flight ID` (`Flight ID`);

--
-- Indexes for table `luggage`
--
ALTER TABLE `luggage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `Flight ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `luggage`
--
ALTER TABLE `luggage`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
