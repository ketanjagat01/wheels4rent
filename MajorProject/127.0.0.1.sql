-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 05:45 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carrent`
--
CREATE DATABASE IF NOT EXISTS `carrent` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `carrent`;

-- --------------------------------------------------------

--
-- Table structure for table `area_info`
--

CREATE TABLE IF NOT EXISTS `area_info` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(40) NOT NULL,
  `reg_date` datetime NOT NULL,
  `created_by` varchar(40) NOT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `area_info`
--

INSERT INTO `area_info` (`area_id`, `area_name`, `reg_date`, `created_by`) VALUES
(1, 'Durg', '2022-11-08 10:53:25', 'a'),
(2, 'Bhilai', '2022-11-08 10:53:31', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `booked_info`
--

CREATE TABLE IF NOT EXISTS `booked_info` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `booked_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `booking_close_status` int(11) NOT NULL,
  `reg_date` datetime NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `area_id` int(11) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `booked_info`
--

INSERT INTO `booked_info` (`book_id`, `cust_id`, `car_id`, `booked_date`, `start_date`, `end_date`, `booking_close_status`, `reg_date`, `created_by`, `area_id`) VALUES
(1, 2, 4, '2022-11-04', '2022-11-25', '2022-11-29', 0, '2022-11-04 00:00:00', 'mohan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `car_area_relation`
--

CREATE TABLE IF NOT EXISTS `car_area_relation` (
  `rel_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  PRIMARY KEY (`rel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `car_area_relation`
--

INSERT INTO `car_area_relation` (`rel_id`, `car_id`, `area_id`) VALUES
(1, 4, 2),
(2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `car_info`
--

CREATE TABLE IF NOT EXISTS `car_info` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_no` varchar(18) NOT NULL,
  `car_company_model` varchar(30) NOT NULL,
  `car_model_year` int(11) NOT NULL,
  `cat_type_id` int(11) NOT NULL,
  `image_path` text NOT NULL,
  `car_detail` text NOT NULL,
  `price_per_km` int(11) NOT NULL,
  `price_per_day` int(11) NOT NULL,
  `reg_date` datetime NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `car_priority` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `car_info`
--

INSERT INTO `car_info` (`car_id`, `car_no`, `car_company_model`, `car_model_year`, `cat_type_id`, `image_path`, `car_detail`, `price_per_km`, `price_per_day`, `reg_date`, `created_by`, `car_priority`) VALUES
(1, 'cg 07 la 1234', 'Tata Sumo', 2012, 2, 'car3.jpg', '7 seater with carrier, AC and NON Ac Mode available, Diesel Car , Extra Driver Charge 500/-', 18, 2500, '2022-11-11 08:52:53', 'mohan', 0),
(3, 'cg 07 xy  3322', 'Maruti Swift RXT', 2019, 3, 'car2.jpg', '4+1 seater without carrier, AC + NON AC', 14, 2000, '2022-11-11 08:56:20', 'mohan', 0),
(4, 'cg 04 gg 8765', 'Maruti S Cross- rxz', 2022, 3, 'car1.jpg', '4+1 seater ,ac car', 15, 2200, '2022-11-11 09:27:54', 'mohan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_info`
--

CREATE TABLE IF NOT EXISTS `category_info` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(40) NOT NULL,
  `reg_date` datetime NOT NULL,
  `created_by` varchar(30) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category_info`
--

INSERT INTO `category_info` (`cat_id`, `cat_name`, `reg_date`, `created_by`) VALUES
(1, 'Sedan', '2022-11-08 10:47:31', 'a'),
(2, 'SUV', '2022-11-08 10:48:13', 'a'),
(3, 'Hatch back', '2022-11-08 10:49:16', 'a'),
(4, 'Mini Van', '2022-11-08 10:49:31', 'a'),
(5, 'Mini Bus', '2022-11-08 10:49:41', 'a'),
(6, 'Bus', '2022-11-08 10:49:51', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(30) NOT NULL,
  `cust_email` varchar(30) NOT NULL,
  `cust_mobile` varchar(25) NOT NULL,
  `cust_address` text NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(15) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `reg_date` date NOT NULL,
  `connect_status` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `cust_name`, `cust_email`, `cust_mobile`, `cust_address`, `user_name`, `user_pass`, `user_type`, `reg_date`, `connect_status`) VALUES
(1, 'Ram Kumar Sharma', 'ram12@gmail.com', '999887766', 'ganj para,\r\nRaipur', 'ram', 'r', 'Customer', '2022-11-02', 1),
(2, 'Mohan Sharma', 'mohan@gmail.com', '974584585', 'gandhi chowk, durg', 'mohan', 'm', 'Vendor', '2022-11-03', 1),
(3, 'sonu', 'sonu@gmail.com', '989893483', 'bhilai', 'sonu', 's', 'Customer', '2022-11-03', 1),
(4, 'Shivam Tiwari', 'shiv233@gmail.com', '9998889999', 'Sector -6\r\nBhilai', 'a', 'a', 'Admin', '2022-10-13', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
