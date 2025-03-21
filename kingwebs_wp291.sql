-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2022 at 03:12 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17750631_kingproteas`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_list`
--

CREATE TABLE `email_list` (
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs_in`
--

CREATE TABLE `logs_in` (
  `id` varchar(200) DEFAULT NULL,
  `device` varchar(200) DEFAULT NULL,
  `ip` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs_in`
--

INSERT INTO `logs_in` (`id`, `device`, `ip`, `email`, `date`) VALUES
('29273', '1', '192.143.28.145', 'alecshelembe@gmail.com', '2022-03-02 21:10:47'),
('86447', '0', '192.143.28.145', 'alecshelembe@gmail.com', '2022-03-03 16:55:08'),
('54090', '1', '192.143.28.145', 'alecshelembe@gmail.com', '2022-03-03 17:38:34'),
('98830', '0', '192.143.28.145', 'alecshelembe@gmail.com', '2022-03-03 19:59:59'),
('85983', '1', '192.143.28.145', 'alecshelembe@gmail.com', '2022-03-04 01:45:03'),
('11420', '1', '192.143.28.145', 'alecshelembe@gmail.com', '2022-03-04 21:15:30'),
('27859', '0', '192.143.28.145', 'alecshelembe@gmail.com', '2022-03-05 01:55:10'),
('51686', '0', '192.143.28.145', 'alecshelembe@gmail.com', '2022-03-05 13:12:14'),
('44753', '0', '192.143.28.145', 'alecshelembe@gmail.com', '2022-03-05 14:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '1234',
  `email` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `number` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `total` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `list_code` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `address_2` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `payment_status` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT 'NOT PAID',
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `list` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `ip` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `notice` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '1234',
  `store_id` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `group` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `price` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT 'defualt.png',
  `image_2` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT 'defualt.png',
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT 'green',
  `rank` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `store_id`, `group`, `email`, `name`, `price`, `description`, `image`, `image_2`, `date`, `status`, `rank`) VALUES
('5444', '41460', 'Delivery', 'alecshelembe@gmail.com', 'Delivery', '10', 'Delivery Walkerville area', '1216-41460.png', '7730-41460.png', '2022-03-02 21:04:24', 'green', '1');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `message` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `stars` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT 'green',
  `date` datetime DEFAULT current_timestamp(),
  `rank` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT '1',
  `ip` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `message`, `stars`, `status`, `date`, `rank`, `ip`) VALUES
('71235', 'Alec Shelembe ', 'Wow, the food is great thanks', '5', 'green', '2022-02-14 17:19:32', '1', '192.143.98.251'),
('88020', 'Modiehi', 'The service is awesome and the App is user friend I will surely recommend it to other people ðŸ˜‰ly', '5', 'green', '2022-03-05 19:08:31', '1', '41.113.89.155');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` varchar(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `number` varchar(200) DEFAULT NULL,
  `street` varchar(200) DEFAULT NULL,
  `street_2` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `zip` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `delivery` varchar(200) DEFAULT NULL,
  `open_hours` varchar(200) DEFAULT NULL,
  `payment_method` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT 'defualt.png',
  `date` datetime DEFAULT current_timestamp(),
  `rank` varchar(200) DEFAULT '1',
  `active` varchar(200) DEFAULT 'yes',
  `status` varchar(200) NOT NULL DEFAULT 'offline',
  `map` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `email`, `description`, `number`, `street`, `street_2`, `city`, `state`, `zip`, `country`, `delivery`, `open_hours`, `payment_method`, `image`, `date`, `rank`, `active`, `status`, `map`) VALUES
('41460', 'Your Store', 'admin@kingwebsites.co.za', 'We love #foodies ', '+27 72 723 7808', '...', '...', '...', '...', '...', 'South Africa', 'Yes', '09:00am - 18:00pm Monday - Saturday', 'Cash, Card, Payfast', '2411-41460.png', '2022-01-09 00:37:51', '1', 'yes', 'Open', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3904.380887974318!2d27.95674716139953!3d-26.417496594852103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e9500eeffffffff%3A0x46365104aa67f762!2sSPAR%20Walkerville!5e1!3m2!1sen!2sza!4v1643231629167!5m2!1sen!2sza\" max-width=\"100%\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(200) NOT NULL DEFAULT '1234',
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `code` varchar(200) DEFAULT NULL,
  `verified` varchar(200) DEFAULT 'yes',
  `location` varchar(200) DEFAULT NULL,
  `ip` varchar(200) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `active` varchar(200) NOT NULL DEFAULT 'yes',
  `status` varchar(200) DEFAULT 'user',
  `email_list` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `code`, `verified`, `location`, `ip`, `date`, `active`, `status`, `email_list`) VALUES
('21994', NULL, 'alecshelembe@gmail.com', '$2y$10$BTRxqfqm6DVpk8ZDnc6OFeLzDPGzWhVSA7kMQ6Ygc60jW.eybYxHe', '9379', 'yes', NULL, '192.143.20.166', '2022-01-08 22:02:23', 'yes', 'store', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_list`
--
ALTER TABLE `email_list`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
