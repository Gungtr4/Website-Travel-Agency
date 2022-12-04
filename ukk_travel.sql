-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2018 at 06:22 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ukk_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `airplane`
--

CREATE TABLE IF NOT EXISTS `airplane` (
  `id_airplane` varchar(10) NOT NULL,
  `airplane_name` varchar(50) NOT NULL,
  `type` varchar(25) NOT NULL,
  `eco_seat` int(10) NOT NULL,
  `business_seat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airplane`
--

INSERT INTO `airplane` (`id_airplane`, `airplane_name`, `type`, `eco_seat`, `business_seat`) VALUES
('APN00001', 'Lion Air', 'Boeing77', 100, 80);

--
-- Triggers `airplane`
--
DELIMITER //
CREATE TRIGGER `hapus_airplane_ke_flight` AFTER DELETE ON `airplane`
 FOR EACH ROW delete from flight where id_airplane=old.id_airplane
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE IF NOT EXISTS `airport` (
  `id_airport` varchar(10) NOT NULL,
  `airport_name` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`id_airport`, `airport_name`, `city`) VALUES
('APT00001', 'Ngurah Rai Airport', 'Denpasar'),
('APT00002', 'Soekarno-Hata Airport', 'Jakarta'),
('APT00003', 'Halim Perdana Kusuma', 'Jakarta');

--
-- Triggers `airport`
--
DELIMITER //
CREATE TRIGGER `hapus_airport_ke_flight` AFTER DELETE ON `airport`
 FOR EACH ROW delete from flight where depart=old.id_airport or arrive=old.id_airport
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE IF NOT EXISTS `flight` (
  `flight_no` varchar(10) NOT NULL,
  `depart` varchar(10) NOT NULL,
  `arrive` varchar(10) NOT NULL,
  `depart_date` date NOT NULL,
  `depart_time` time NOT NULL,
  `arrive_date` date NOT NULL,
  `arrive_time` time NOT NULL,
  `id_airplane` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flight_no`, `depart`, `arrive`, `depart_date`, `depart_time`, `arrive_date`, `arrive_time`, `id_airplane`) VALUES
('FLN00001', 'APT00001', 'APT00003', '2018-02-10', '13:00:00', '2018-02-10', '13:45:00', 'APN00001');

--
-- Triggers `flight`
--
DELIMITER //
CREATE TRIGGER `hapus_flight_ke_flight_booking_ke_flight_fare` AFTER DELETE ON `flight`
 FOR EACH ROW delete from flight_fare where flight_no=old.flight_no
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `flight_booking`
--

CREATE TABLE IF NOT EXISTS `flight_booking` (
  `id_flight_booking` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_fare_flight` varchar(10) NOT NULL,
  `passenger_total` int(11) NOT NULL,
  `date` date NOT NULL,
  `payment` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `flight_booking`
--
DELIMITER //
CREATE TRIGGER `hapus_flight_booking_ke_flight_passenger` AFTER DELETE ON `flight_booking`
 FOR EACH ROW delete from flight_passenger where flight_booking.id_flight_booking=old.id_flight_booking
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `flight_fare`
--

CREATE TABLE IF NOT EXISTS `flight_fare` (
  `id_fare_flight` varchar(10) NOT NULL,
  `flight_no` varchar(10) NOT NULL,
  `class` varchar(25) NOT NULL,
  `fare` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_fare`
--

INSERT INTO `flight_fare` (`id_fare_flight`, `flight_no`, `class`, `fare`) VALUES
('IFR00001', 'FLN00001', 'Economy', 500000),
('IFR00002', 'FLN00001', 'Business', 800000);

-- --------------------------------------------------------

--
-- Table structure for table `flight_passenger`
--

CREATE TABLE IF NOT EXISTS `flight_passenger` (
  `id_flight_passenger` varchar(10) NOT NULL,
  `id_flight_booking` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_number` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `id_station` varchar(10) NOT NULL,
  `city` varchar(25) NOT NULL,
  `station_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`id_station`, `city`, `station_name`) VALUES
('STN00001', 'Bandung', 'Station Banjaran'),
('STN00002', 'West Java', 'Babakan'),
('STN00003', 'East Java', 'Babat');

--
-- Triggers `station`
--
DELIMITER //
CREATE TRIGGER `hapus_station_ke_train_route_depart` AFTER DELETE ON `station`
 FOR EACH ROW delete from train_route where depart=old.id_station or arrive=old.id_station
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE IF NOT EXISTS `train` (
  `id_train` varchar(10) NOT NULL,
  `train_name` varchar(25) NOT NULL,
  `eco_seat` int(10) NOT NULL,
  `business_seat` int(10) NOT NULL,
  `exec_seat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`id_train`, `train_name`, `eco_seat`, `business_seat`, `exec_seat`) VALUES
('IT00001', 'New Argo Jati', 600, 50, 60),
('IT00002', 'Argo Bromo Anggrek', 60, 50, 50);

--
-- Triggers `train`
--
DELIMITER //
CREATE TRIGGER `Hapus_train_ke_train_route` AFTER DELETE ON `train`
 FOR EACH ROW delete from train_route where id_train=old.id_train
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `train_booking`
--

CREATE TABLE IF NOT EXISTS `train_booking` (
  `id_train_booking` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_fare_train` varchar(10) NOT NULL,
  `passenger_total` int(11) NOT NULL,
  `date` date NOT NULL,
  `payment` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `train_booking`
--
DELIMITER //
CREATE TRIGGER `Hapus_train_booking_ke_train_passenger` AFTER DELETE ON `train_booking`
 FOR EACH ROW delete from train_passenger where train_booking.id_train_booking=old.id_train_booking
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `train_fare`
--

CREATE TABLE IF NOT EXISTS `train_fare` (
  `id_fare_train` varchar(10) NOT NULL,
  `id_route` varchar(10) NOT NULL,
  `class` varchar(25) NOT NULL,
  `fare` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_fare`
--

INSERT INTO `train_fare` (`id_fare_train`, `id_route`, `class`, `fare`) VALUES
('IFR00001', 'TRO00001', 'Economy', 80000),
('IFR00002', 'TRO00001', 'Business', 130000),
('IFR00003', 'TRO00001', 'Executive', 190000);

-- --------------------------------------------------------

--
-- Table structure for table `train_passenger`
--

CREATE TABLE IF NOT EXISTS `train_passenger` (
  `id_train_passenger` varchar(10) NOT NULL,
  `id_train_booking` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_number` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `train_route`
--

CREATE TABLE IF NOT EXISTS `train_route` (
  `id_route` varchar(10) NOT NULL,
  `depart` varchar(10) NOT NULL,
  `arrive` varchar(10) NOT NULL,
  `depart_date` date NOT NULL,
  `depart_time` time NOT NULL,
  `arrive_date` date NOT NULL,
  `arrive_time` time NOT NULL,
  `id_train` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_route`
--

INSERT INTO `train_route` (`id_route`, `depart`, `arrive`, `depart_date`, `depart_time`, `arrive_date`, `arrive_time`, `id_train`) VALUES
('TRO00001', 'STN00001', 'STN00002', '2018-02-10', '13:30:00', '2018-02-10', '14:00:00', 'IT00002');

--
-- Triggers `train_route`
--
DELIMITER //
CREATE TRIGGER `Hapus_train_route_ke_train_booking_ke_train_fare` AFTER DELETE ON `train_route`
 FOR EACH ROW delete from train_fare where id_route=old.id_route
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(35) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `level` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `username`, `pass`, `city`, `country`, `level`) VALUES
('USR00001', 'administrator', 'admin@yahoo.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Denpasar', 'Indonesia', 'Admin');

--
-- Triggers `user`
--
DELIMITER //
CREATE TRIGGER `Hapus_user_ke_train_booking_ke_flight_booking` AFTER DELETE ON `user`
 FOR EACH ROW delete a.*,b.* from train_booking a , flight_booking b where
a.id_user=b.id_user=old.id_user
//
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airplane`
--
ALTER TABLE `airplane`
 ADD PRIMARY KEY (`id_airplane`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
 ADD PRIMARY KEY (`id_airport`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
 ADD PRIMARY KEY (`flight_no`), ADD KEY `id_airplane` (`id_airplane`), ADD KEY `depart` (`depart`), ADD KEY `arrive` (`arrive`);

--
-- Indexes for table `flight_booking`
--
ALTER TABLE `flight_booking`
 ADD PRIMARY KEY (`id_flight_booking`), ADD KEY `id_user` (`id_user`), ADD KEY `flight_no` (`id_fare_flight`), ADD KEY `id_fare_flight` (`id_fare_flight`);

--
-- Indexes for table `flight_fare`
--
ALTER TABLE `flight_fare`
 ADD PRIMARY KEY (`id_fare_flight`), ADD KEY `flight_no` (`flight_no`);

--
-- Indexes for table `flight_passenger`
--
ALTER TABLE `flight_passenger`
 ADD PRIMARY KEY (`id_flight_passenger`), ADD KEY `id_no` (`id_number`), ADD KEY `id_flight_booking` (`id_flight_booking`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
 ADD PRIMARY KEY (`id_station`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
 ADD PRIMARY KEY (`id_train`);

--
-- Indexes for table `train_booking`
--
ALTER TABLE `train_booking`
 ADD PRIMARY KEY (`id_train_booking`), ADD KEY `id_user` (`id_user`), ADD KEY `id_route` (`id_fare_train`), ADD KEY `id_fare_train` (`id_fare_train`);

--
-- Indexes for table `train_fare`
--
ALTER TABLE `train_fare`
 ADD PRIMARY KEY (`id_fare_train`), ADD KEY `id_route` (`id_route`);

--
-- Indexes for table `train_passenger`
--
ALTER TABLE `train_passenger`
 ADD PRIMARY KEY (`id_train_passenger`), ADD KEY `id_no` (`id_number`), ADD KEY `id_train_booking` (`id_train_booking`);

--
-- Indexes for table `train_route`
--
ALTER TABLE `train_route`
 ADD PRIMARY KEY (`id_route`), ADD KEY `id_train` (`id_train`), ADD KEY `depart` (`depart`), ADD KEY `arrive` (`arrive`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`id_airplane`) REFERENCES `airplane` (`id_airplane`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `flight_ibfk_2` FOREIGN KEY (`depart`) REFERENCES `airport` (`id_airport`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `flight_ibfk_3` FOREIGN KEY (`arrive`) REFERENCES `airport` (`id_airport`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flight_booking`
--
ALTER TABLE `flight_booking`
ADD CONSTRAINT `flight_booking_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `flight_booking_ibfk_2` FOREIGN KEY (`id_fare_flight`) REFERENCES `flight_fare` (`id_fare_flight`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flight_fare`
--
ALTER TABLE `flight_fare`
ADD CONSTRAINT `flight_fare_ibfk_1` FOREIGN KEY (`flight_no`) REFERENCES `flight` (`flight_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flight_passenger`
--
ALTER TABLE `flight_passenger`
ADD CONSTRAINT `flight_passenger_ibfk_1` FOREIGN KEY (`id_flight_booking`) REFERENCES `flight_booking` (`id_flight_booking`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `train_booking`
--
ALTER TABLE `train_booking`
ADD CONSTRAINT `train_booking_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `train_booking_ibfk_2` FOREIGN KEY (`id_fare_train`) REFERENCES `train_fare` (`id_fare_train`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `train_fare`
--
ALTER TABLE `train_fare`
ADD CONSTRAINT `train_fare_ibfk_1` FOREIGN KEY (`id_route`) REFERENCES `train_route` (`id_route`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `train_passenger`
--
ALTER TABLE `train_passenger`
ADD CONSTRAINT `train_passenger_ibfk_1` FOREIGN KEY (`id_train_booking`) REFERENCES `train_booking` (`id_train_booking`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `train_route`
--
ALTER TABLE `train_route`
ADD CONSTRAINT `train_route_ibfk_1` FOREIGN KEY (`id_train`) REFERENCES `train` (`id_train`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `train_route_ibfk_2` FOREIGN KEY (`depart`) REFERENCES `station` (`id_station`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `train_route_ibfk_3` FOREIGN KEY (`arrive`) REFERENCES `station` (`id_station`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
