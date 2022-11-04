-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 09:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `costumers`
--

CREATE TABLE `costumers` (
  `id` int(200) NOT NULL,
  `name` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `addres` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `phone1` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `phone2` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `phone3` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `location` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `district` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `region` varchar(200) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `costumers`
--

INSERT INTO `costumers` (`id`, `name`, `email`, `addres`, `phone1`, `phone2`, `phone3`, `location`, `district`, `region`) VALUES
(1, 'ayubu matayo', 'ayubu@gmail.com', 'kimara', '078987876', '', '', 'kimara', 'ubungo', 'Dar-es-Salaam'),
(2, 'Saitel Mlay', 'saitel@gmail.com', 'sinza', '0645432311', '0767564534', '', 'sinza', 'kinondoni', 'Dar-es-Salaam');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(200) NOT NULL,
  `name` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `password` varchar(200) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`) VALUES
(10, 'samInterprises', 'sam@gmail.com', '123456789'),
(11, 'HABBY COLLECTION', 'habby@gmail.com', 'qqqqqqqqq'),
(12, 'InventorySystem', 'emerchriss@gmail.com', 'emerchriss');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(200) NOT NULL,
  `product_id` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `product_name` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `quantity` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `brand` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `color` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `price` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `deyi` datetime(6) NOT NULL,
  `costumer` varchar(200) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `product_name`, `quantity`, `brand`, `color`, `price`, `deyi`, `costumer`) VALUES
(22, '3', 'milkshake', '1', 'Asas', 'white', '2000', '2022-08-22 14:03:00.000000', 'ayubu matayo'),
(23, '3', 'milkshake', '1', 'Asas', 'white', '2000', '2022-08-22 14:10:00.000000', 'ayubu matayo'),
(24, '3', 'milkshake', '1', 'Asas', 'white', '2000', '2022-08-22 14:10:00.000000', 'ayubu matayo'),
(25, '3', 'milkshake', '2', 'Asas', 'white', '2000', '2022-08-22 14:17:00.000000', 'ayubu matayo'),
(26, '3', 'milkshake', '2', 'Asas', 'white', '4000', '2022-08-22 14:50:00.000000', 'ayubu matayo'),
(28, '3', 'milkshake', '2', 'Asas', 'white', '4000', '2022-08-22 16:51:00.000000', 'ayubu matayo'),
(29, '3', 'milkshake', '2', 'Asas', 'white', '4000', '2022-08-22 16:51:00.000000', 'ayubu matayo'),
(30, '5', 'monitor', '5', 'hp', 'black', '500000', '2022-08-22 17:16:00.000000', 'ayubu matayo'),
(31, '3', 'milkshake', '2', 'Asas', 'white', '4000', '2022-08-25 03:31:00.000000', 'ayubu matayo'),
(33, '3', 'milkshake', '5', 'Asas', 'white', '10000', '2022-08-31 06:47:00.000000', 'ayubu matayo'),
(34, '3', 'milkshake', '3', 'Asas', 'white', '6000', '2022-08-31 06:51:00.000000', 'Saitel Mlay');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(200) NOT NULL,
  `product_id` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `product_name` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `buying_price` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `quantity` int(200) NOT NULL,
  `brand` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `color` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `price` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `deyi` datetime(6) NOT NULL,
  `expire` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `vendor` varchar(200) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_id`, `product_name`, `buying_price`, `quantity`, `brand`, `color`, `price`, `deyi`, `expire`, `vendor`) VALUES
(15, '1', 'yoghurt', '', 50, 'Asas', 'white', '1200', '2022-08-25 05:48:00.000000', '12/9/2023', 'Asas'),
(16, '2', 'afya', '', 2, 'Afya', 'white', '500', '2022-08-18 04:17:00.000000', '', 'AfyaCom'),
(17, '3', 'milkshake', '', 37, 'Asas', 'white', '2000', '2022-08-31 06:45:00.000000', '31/08/2023', 'Asas'),
(19, '5', 'chocolate', '', 50, 'Asas', 'brown', '3000', '2022-08-25 04:12:00.000000', '12/9/2023', 'Asas'),
(23, '7', 'candy', '', 50, 'Asas', 'brown', '200', '2022-08-31 03:54:00.000000', '12/9/2023', 'Asas'),
(24, '8', 'whitedent', '90,000', 50, 'whitedent', 'white', '2500', '2022-08-31 07:41:00.000000', '12/08/2023', 'whitedent'),
(25, '9', 'colgate', '100,000', 50, 'whitedent', 'white-red', '3000', '2022-08-31 07:50:00.000000', '12/08/2023', 'whitedent');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(200) NOT NULL,
  `name` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `addres` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `phone1` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `phone2` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `phone3` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `location` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `district` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `region` varchar(200) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `email`, `addres`, `phone1`, `phone2`, `phone3`, `location`, `district`, `region`) VALUES
(1, 'hewletPackard', 'hewlet@gmail.com', 'mlimaniCity', '0655675434', '', '', 'sinza', 'kinondoni', 'Dar-es-Salaam'),
(2, 'hewletPackard', 'hewlet@gmail.com', 'mlimaniCity', '0655675434', '', '', 'sinza', 'kinondoni', 'Dar-es-Salaam'),
(3, 'Asas', 'Asas@gmail.com', '12kb area C', '067765666', '078988888', '', 'Area C', 'bunge', 'Dodoma'),
(4, 'AfyaCom', 'afya@gmail.com', 'mlalakua', '0768909090', '0677777000', '', 'ilala', 'ilala', 'Dar-es-Salaam'),
(5, 'whitedent', 'whitedentSales@gmail.com', 'Afrikana', '064667755', '0767564888', '', 'Afrikana-near Bus station', 'kinondoni', 'Dar-es-Salaam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `costumers`
--
ALTER TABLE `costumers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `costumers`
--
ALTER TABLE `costumers`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
