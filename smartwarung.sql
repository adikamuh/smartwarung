-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 11:19 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartwarung`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `username`) VALUES
('cart5e954667e6f6a', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id` varchar(255) NOT NULL,
  `item` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`id`, `item`, `quantity`) VALUES
('cart5e954667e6f6a', 9, 6),
('cart5e954667e6f6a', 8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Kebersihan'),
(2, 'Makanan'),
(3, 'Laundry'),
(4, 'Kamar Mandi'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `warung` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `origin_id` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `destination_id` varchar(255) NOT NULL,
  `distance` float NOT NULL,
  `delivery_fee` int(11) NOT NULL,
  `billing` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('Menunggu proses penjual','Sedang dikirim','Sudah diterima','Dibatalkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `user`, `warung`, `origin`, `origin_id`, `destination`, `destination_id`, `distance`, `delivery_fee`, `billing`, `total`, `status`) VALUES
('invoice5e96ff3770461', 'abcd', 'kerabat', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'ChIJF6V9W1wo1i0RlY84avKFRIY', 'Sukapura, Bandung, West Java, Indonesia', 'ChIJQXjDl6zpaC4RuiyZXIf658I', 0.5, 1250, 39048, 40298, 'Sudah diterima'),
('invoice5e974f6fcf5d9', 'abcd', 'kerabat', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'ChIJF6V9W1wo1i0RlY84avKFRIY', 'Institut Teknologi Bandung, Jl. Ganesha, Lebak Siliwangi, Bandung City, West Java, Indonesia', 'ChIJg7HJZ1fmaC4RYXnj3NzjeCQ', 12.8, 32000, 15012, 47012, 'Dibatalkan'),
('invoice5e9d8d550bba9', 'abcd', 'kerabat', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'ChIJF6V9W1wo1i0RlY84avKFRIY', 'Metro Indah Mall, Kawasan Niaga, Soekarno-Hatta Street Jalan MTC Barat, Sekejati, Bandung City, West Java, Indonesia', 'ChIJk6KqSfHpaC4RVGGFKsMMLto', 10.2, 25500, 45000, 70500, 'Dibatalkan'),
('invoice5e9dafbdd7896', 'abcd', 'rajawali', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJhYoXcKXpaC4RtsIsukYN274', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', 0.1, 250, 12399, 12649, 'Dibatalkan'),
('invoice5e9db8c5a55ed', 'abcd', 'kerabat', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'ChIJF6V9W1wo1i0RlY84avKFRIY', 'IFI Futsal, Jalan Sukabirus, Citeureup, Bandung City, West Java, Indonesia', 'ChIJgRwceq_paC4Rwjqb_J8qFFQ', 4.3, 10750, 165000, 175750, 'Sudah diterima'),
('invoice5e9dc92c3e69a', 'abcd', 'kerabat', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'ChIJF6V9W1wo1i0RlY84avKFRIY', 'Daging sapi lokal, Baleendah, Bandung, West Java, Indonesia', 'ChIJS3eHMXPpaC4RjJCCh6K3rsk', 4.8, 12000, 18000, 30000, 'Dibatalkan');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` varchar(255) NOT NULL,
  `item` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `item`, `quantity`, `price`) VALUES
('invoice5e96ff3770461', 8, 2, 10000),
('invoice5e96ff3770461', 9, 3, 3000),
('invoice5e974f6fcf5d9', 8, 1, 10000),
('invoice5e974f6fcf5d9', 9, 1, 3000),
('invoice5e9d8d550bba9', 8, 1, 15000),
('invoice5e9d8d550bba9', 9, 10, 3000),
('invoice5e9dafbdd7896', 12, 1, 12399),
('invoice5e9db8c5a55ed', 8, 10, 15000),
('invoice5e9db8c5a55ed', 9, 5, 3000),
('invoice5e9dc92c3e69a', 9, 6, 3000);

--
-- Triggers `invoice_details`
--
DELIMITER $$
CREATE TRIGGER `after_buy_products` AFTER INSERT ON `invoice_details` FOR EACH ROW BEGIN
	UPDATE items
    SET items.stock = items.stock-NEW.quantity
    WHERE items.id = NEW.item;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `username`, `name`, `category`, `stock`, `price`, `description`, `photo`) VALUES
(8, 'kerabat', 'Vixal', 1, 89, 15000, 'Bersih mengkilap, pembersih lantai', '2598bbcb533db9058ba43648ba8ac0fa.png'),
(9, 'kerabat', 'Sabun', 4, 6, 3000, 'Wangi', 'd14b89596d482122d6e37429d53c44cc.png'),
(12, 'rajawali', 'Apaja', 2, 123, 12399, 'asdfadsf', '1f34fe68c8542c3592a2cd4e163ed056.jpg'),
(16, 'kerabat', 'Sunlight', 1, 123, 3000, 'Jeruk nipis', '82ef105b29d0e65342b398a7680c2780.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `photo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `username`, `password`, `phone`, `email`, `role`, `photo`) VALUES
('Ulalalalala', 'abcd', 'e2fc714c4727ee9395f324cd2e7f331f', '08123', 'a@b.c', 0, NULL),
('admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '1', 99, NULL),
('gallery', 'gallery', 'e2fc714c4727ee9395f324cd2e7f331f', '123', '1@s.c', 1, '7d6019698936a373c869ee6de7ed275e.jpg'),
('Warung Kerabat', 'kerabat', 'e2fc714c4727ee9395f324cd2e7f331f', '0812', 'a@b.c', 1, '17cf68a4ff5b1c1f1fe2eb39373d3cfa.jpg'),
('Rajawali', 'rajawali', 'e2fc714c4727ee9395f324cd2e7f331f', '0812', 'a@b.cd', 1, '2557a0a8a0e7856fe8b6c5f4908229c8.png'),
('sukapura', 'sukapura', 'e2fc714c4727ee9395f324cd2e7f331f', '08122222', 'adika@b.c', 1, '61f19a0afedc177bb403276b484e5a11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `warungs`
--

CREATE TABLE `warungs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `place_id` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` enum('Belum diverifikasi','Sudah diverifikasi','Verifikasi tidak disetujui','') NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warungs`
--

INSERT INTO `warungs` (`id`, `username`, `place_id`, `lat`, `lng`, `address`, `status`, `updated_at`) VALUES
(10, 'kerabat', 'ChIJF6V9W1wo1i0RlY84avKFRIY', '-6.9766033', '107.6285002', 'Telkom University, Jalan Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Bandung, West Java, Indonesia', 'Sudah diverifikasi', '2020-04-01'),
(11, 'rajawali', 'ChIJhYoXcKXpaC4RtsIsukYN274', '-6.9796277', '107.6289723', 'Pondok Rajawali 12, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'Sudah diverifikasi', '2020-04-20'),
(14, 'gallery', 'ChIJ4XzVX6XpaC4RG0c8UhI-qnc', '-6.978006', '107.631006', 'D\' Gallery Futsal, Jalan Sukabirus, Citeureup, Bandung, West Java, Indonesia', 'Sudah diverifikasi', '2020-04-20'),
(15, 'sukapura', 'ChIJQXjDl6zpaC4RuiyZXIf658I', '-6.9699811', '107.6289307', 'Sukapura, Bandung, West Java, Indonesia', 'Belum diverifikasi', '2020-04-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD KEY `to_cart` (`id`),
  ADD KEY `to_items` (`item`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`,`warung`),
  ADD KEY `user_2` (`user`,`warung`),
  ADD KEY `warung` (`warung`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD KEY `id` (`id`,`item`),
  ADD KEY `invoice_details_ibfk_2` (`item`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `users_foods_fk1` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `warungs`
--
ALTER TABLE `warungs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to_user` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `warungs`
--
ALTER TABLE `warungs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `to_cart` FOREIGN KEY (`id`) REFERENCES `carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `to_items` FOREIGN KEY (`item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`warung`) REFERENCES `users` (`username`);

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_details_ibfk_2` FOREIGN KEY (`item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `users_foods_fk1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warungs`
--
ALTER TABLE `warungs`
  ADD CONSTRAINT `to_user` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
