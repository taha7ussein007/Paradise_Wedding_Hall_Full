-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2016 at 07:29 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paradise_wedding_hall`
--

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `hall_no` int(11) NOT NULL COMMENT 'Hall Number',
  `hall_name` varchar(30) NOT NULL COMMENT 'Hall Name'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`hall_no`, `hall_name`) VALUES
(5, 'paradise');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `reserv_id` int(11) NOT NULL COMMENT 'Reservation ID',
  `path` varchar(30) NOT NULL COMMENT 'Full Path',
  `type` tinyint(1) NOT NULL COMMENT 'Cash 0 Or Credit 1',
  `state` tinyint(1) NOT NULL COMMENT 'Pend 0 Or Paid 1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `reserv_id`, `path`, `type`, `state`) VALUES
(1, 1, '../User/invoices/invoice1.pdf', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `pack_id` int(11) NOT NULL,
  `pack_type` varchar(30) NOT NULL,
  `pack_price` double NOT NULL,
  `hall_no` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`pack_id`, `pack_type`, `pack_price`, `hall_no`, `state`) VALUES
(29, 'vip', 17000, 5, 0),
(30, 'lux', 13000, 5, 0),
(31, 'lux', 14185, 5, 1),
(32, 'lux', 14200, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_resources`
--

CREATE TABLE `package_resources` (
  `pack_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `res_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_resources`
--

INSERT INTO `package_resources` (`pack_id`, `res_id`, `res_quantity`) VALUES
(30, 5, 20),
(31, 5, 23),
(32, 5, 23),
(29, 5, 25),
(30, 6, 55),
(31, 6, 67),
(29, 6, 70),
(30, 4, 70),
(31, 4, 70),
(32, 4, 70),
(32, 6, 70),
(29, 4, 100);

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `rank_value` int(11) NOT NULL,
  `rank_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`rank_value`, `rank_name`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Financial'),
(4, 'Technical'),
(5, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `from_user` varchar(40) NOT NULL COMMENT 'email',
  `to_user` varchar(40) NOT NULL COMMENT 'email',
  `path` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_comments`
--

CREATE TABLE `reservation_comments` (
  `id` int(11) NOT NULL,
  `reserv_id` int(11) NOT NULL,
  `comment` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_comments`
--

INSERT INTO `reservation_comments` (`id`, `reserv_id`, `comment`) VALUES
(1, 1, 'need to reserve a outdoor hall plz');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_config`
--

CREATE TABLE `reservation_config` (
  `id` int(11) NOT NULL COMMENT 'Reservation ID',
  `u_id` int(11) NOT NULL COMMENT 'User ID',
  `pack_id` int(11) NOT NULL COMMENT 'Package ID',
  `payment_id` int(11) NOT NULL DEFAULT '0' COMMENT '0 if Cash',
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_config`
--

INSERT INTO `reservation_config` (`id`, `u_id`, `pack_id`, `payment_id`, `date`) VALUES
(1, 17, 31, 1, '30/12/2015');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `res_id` int(11) NOT NULL,
  `res_type` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_per_unit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`res_id`, `res_type`, `quantity`, `price_per_unit`) VALUES
(4, 'chaire', 100, 10),
(5, 'table', 25, 375),
(6, 'LEDs', 70, 5);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `e_id` int(11) NOT NULL COMMENT 'Employee ID',
  `salary` int(11) NOT NULL COMMENT 'Employee Salary'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Employees'' Salaries';

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`e_id`, `salary`) VALUES
(19, 5000),
(20, 1400),
(21, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE `urls` (
  `id` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `path` varchar(80) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Person ID',
  `name` varchar(60) NOT NULL COMMENT 'Full Name',
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `n_id` varchar(14) NOT NULL,
  `mob` varchar(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='All Users Table';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `n_id`, `mob`, `rank`, `state`) VALUES
(17, 'taha', 'taha@taha', 'taha', '12254', '112478', 5, 1),
(19, 'admin', 'admin@admin', 'admin', '123456', '1214744444', 1, 1),
(20, 'tech', 'tech@tech', 'tech', '14547855', '222548714', 4, 1),
(21, 'finan', 'finan@finan', 'finan', '114587777', '1111154877', 3, 1),
(22, 'user', 'user@user', 'user', '222514478', '33662255514', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE `user_payment` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `card_no` varchar(128) NOT NULL,
  `fname_on_card` varchar(30) NOT NULL,
  `lname_on_card` varchar(30) NOT NULL,
  `expiration_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_payment`
--

INSERT INTO `user_payment` (`id`, `u_id`, `address`, `card_no`, `fname_on_card`, `lname_on_card`, `expiration_date`) VALUES
(1, 17, '20 zaghloul st - Dokki, cairo, cairo, Egypt. Posta', 'jdkDb3f8zxsAVElBrwB1Jg==', 'Taha', 'Hussein', '13/12/2025');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`hall_no`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reserv_id` (`reserv_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`pack_id`),
  ADD KEY `hall_no` (`hall_no`);

--
-- Indexes for table `package_resources`
--
ALTER TABLE `package_resources`
  ADD PRIMARY KEY (`pack_id`,`res_id`),
  ADD KEY `pack_id` (`pack_id`,`res_id`),
  ADD KEY `pack_id_2` (`pack_id`),
  ADD KEY `res_id` (`res_id`),
  ADD KEY `res_quantity` (`res_quantity`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`rank_value`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_user` (`from_user`),
  ADD KEY `to_user` (`to_user`);

--
-- Indexes for table `reservation_comments`
--
ALTER TABLE `reservation_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reserv_id` (`reserv_id`);

--
-- Indexes for table `reservation_config`
--
ALTER TABLE `reservation_config`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `pack_id` (`pack_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`res_id`),
  ADD UNIQUE KEY `res_type` (`res_type`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD UNIQUE KEY `e_id` (`e_id`),
  ADD UNIQUE KEY `e_id_2` (`e_id`);

--
-- Indexes for table `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rank` (`rank`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`n_id`,`mob`),
  ADD KEY `fk_rank` (`rank`);

--
-- Indexes for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `hall_no` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Hall Number', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `rank_value` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservation_comments`
--
ALTER TABLE `reservation_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reservation_config`
--
ALTER TABLE `reservation_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Reservation ID', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Person ID', AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`reserv_id`) REFERENCES `reservation_config` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`hall_no`) REFERENCES `halls` (`hall_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package_resources`
--
ALTER TABLE `package_resources`
  ADD CONSTRAINT `package_resources_ibfk_1` FOREIGN KEY (`pack_id`) REFERENCES `packages` (`pack_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `package_resources_ibfk_2` FOREIGN KEY (`res_id`) REFERENCES `resources` (`res_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`from_user`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`to_user`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation_comments`
--
ALTER TABLE `reservation_comments`
  ADD CONSTRAINT `reservation_comments_ibfk_1` FOREIGN KEY (`reserv_id`) REFERENCES `reservation_config` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation_config`
--
ALTER TABLE `reservation_config`
  ADD CONSTRAINT `reservation_config_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_config_ibfk_2` FOREIGN KEY (`pack_id`) REFERENCES `packages` (`pack_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaryfk` FOREIGN KEY (`e_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `urls`
--
ALTER TABLE `urls`
  ADD CONSTRAINT `urls_ibfk_1` FOREIGN KEY (`rank`) REFERENCES `ranks` (`rank_value`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rank`) REFERENCES `ranks` (`rank_value`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD CONSTRAINT `user_payment_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
