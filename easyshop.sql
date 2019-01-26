-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2019 at 06:27 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_info`
--

CREATE TABLE `address_info` (
  `email_id` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `area` varchar(256) NOT NULL,
  `road` varchar(256) NOT NULL,
  `house_no` varchar(256) NOT NULL,
  `flat_no` varchar(256) NOT NULL,
  `postal_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address_info`
--

INSERT INTO `address_info` (`email_id`, `city`, `area`, `road`, `house_no`, `flat_no`, `postal_code`) VALUES
('anik@gmail.com', 'Dhaka', 'Linkroad', '22', '102', '43', 704),
('hasan@gmail.com', 'Dhaka', 'nikanja', '15', '2', '5A', 5555),
('mushfik@gmail.com', 'Dhaka', 'Bashundhara Block C', '7', '194A', '52A', 88),
('raju@gmail.com', 'Chittagong', 'Bashundhara', '15', '194A', '502', 701);

-- --------------------------------------------------------

--
-- Table structure for table `brand_info`
--

CREATE TABLE `brand_info` (
  `product_id` int(11) NOT NULL,
  `brand_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand_info`
--

INSERT INTO `brand_info` (`product_id`, `brand_name`) VALUES
(0, 'samsung'),
(13, 'toyhouse'),
(16, 'samsung'),
(17, 'ASUS'),
(18, 'ASUS'),
(19, 'Microsoft Surface'),
(20, 'Dell'),
(21, 'samsung'),
(22, 'samsung'),
(23, 'Apple'),
(24, 'Adidas'),
(25, 'Bata'),
(26, 'Easy'),
(27, 'Yellow'),
(28, 'Yellow'),
(29, 'Yellow'),
(30, 'Fastrack'),
(31, 'Rolex'),
(32, 'LakeMeIts a good pr'),
(33, 'Yellow'),
(34, 'Yellow'),
(35, 'Yellow'),
(36, 'Ali'),
(37, 'car'),
(38, 'RFL'),
(39, 'Apple'),
(40, 'Apple'),
(41, 'Apple'),
(42, 'Yellow'),
(43, 'Yellow'),
(44, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `category_info`
--

CREATE TABLE `category_info` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_info`
--

INSERT INTO `category_info` (`cat_id`, `cat_name`) VALUES
(1, 'mobile'),
(2, 'laptop');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `order_id` int(11) NOT NULL,
  `customer_id` varchar(256) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`order_id`, `customer_id`, `product_id`, `quantity`) VALUES
(45, 'mushfik@gmail.com', 25, 3),
(46, 'mushfik@gmail.com', 24, 1),
(47, 'hasan@gmail.com', 43, 1),
(48, 'raju@gmail.com', 18, 7),
(49, 'anik@gmail.com', 28, 3),
(50, 'mushfik@gmail.com', 27, 1),
(51, 'hasan@gmail.com', 22, 2),
(52, 'hasan@gmail.com', 23, 1),
(53, 'mushfik@gmail.com', 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `phone_no` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`user_id`, `first_name`, `last_name`, `phone_no`) VALUES
(55, 'Kishor', 'pasha', '01739814778'),
(58, 'Rahman', 'Mushfik', '01739814778'),
(60, 'Komol', 'Hasan', '7455884432'),
(61, 'Raju', 'Monir', '0157489393'),
(62, 'Anik', 'Karkar', '0157489393');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` int(5) NOT NULL,
  `product_qty` int(5) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_qty`, `product_image`, `product_category`, `description`) VALUES
(18, 'Laptop', 76500, 18, 'uploads/5c14ecf3e8aef1.24220686.jpg', 'Gadgets', '																														ROG G703 is a beast of a gaming laptop that has the power to take on todayâ€™s gaming desktops, thanks to its factory-overclocked 8th Generation IntelÂ® Coreâ„¢ i9 processor and overclockable NVIDIAÂ® GeForceÂ® GTX 1080 graphics.																									'),
(19, 'Laptop', 70000, 20, 'uploads/5c14ee095877b9.90069681.jpg', 'Gadgets', '						Surface Book 2 is the most powerful Surface ever; built with power and versatility to be a laptop, tablet, and portable studio all-in-one.					'),
(20, 'Laptop', 55000, 20, 'uploads/5c14ee5f3efa56.27691056.png', 'Gadgets', 'Laptops and 2-in-1s with an elevated design and a variety of upgrade options for what matters most to you.'),
(21, 'Desktop', 35000, 15, 'uploads/5c14eee0bb7388.66236968.jpg', 'Gadgets', '						It contains the full set with core-i3 and 512 hard disk					'),
(22, 'Mobile', 60000, 18, 'uploads/5c14efc88cc225.01547912.jpg', 'Gadgets', '												The Galaxy S8 is one of the first smartphones to support Bluetooth 5, supporting new capabilities such as connecting two wireless headphones to the device at once.										'),
(23, 'Headphone', 2300, 18, 'uploads/5c14f1a6b11714.86033037.jpg', 'Gadgets', '												AirPods will forever change the way you use headphones. Whenever you pull your AirPods out of the charging case, they instantly turn on and connect to your iPhone, Apple Watch, iPad, or Mac.\r\nBest for cool users										'),
(24, 'Shoe', 5000, 20, 'uploads/5c14f336ed93c9.68261298.jpg', 'Mens Wear', '						Boost where it matters most. Our leading comfort technology is repurposed within a podular heel element, bringing the full Boost sensation to the most important part of your stride.					'),
(25, 'Shoe', 4000, 10, 'uploads/5c14f3bf7ff407.50974394.jpg', 'Mens Wear', 'Comfort from heel to toe. A high rebound EVA compound brings soft and responsive cushioning to the forefoot, extending comfort across the sole unit from heel to toe.'),
(26, 'Jacket', 2800, 20, 'uploads/5c14f4882684f6.47369813.jpg', 'Mens Wear', '																		A jacket is a mid-stomachâ€“length garment for the upper body. A jacket typically has sleeves, and fastens in the front or slightly on the side. A jacket is generally lighter, tighter-fitting, and less insulating than a coat, which is outerwear. 															'),
(27, 'Sweter', 4500, 20, 'uploads/5c14f4a4d9c604.09860752.jpg', 'Mens Wear', '																		A jacket is a mid-stomachâ€“length garment for the upper body. A jacket typically has sleeves, and fastens in the front or slightly on the side. A jacket is generally lighter, tighter-fitting, and less insulating than a coat, which is outerwear. 															'),
(28, 'Shirt', 1250, 18, 'uploads/5c14f5643c3cc6.05926786.jpg', 'Mens Wear', 'A perfect everyday wear for the gentlemen. Get this stylish blazer now available in-store and online.'),
(29, 'Shirt', 1300, 16, 'uploads/5c14f588b107f8.72098701.jpg', 'Mens Wear', 'A perfect everyday wear for the gentlemen. Get this stylish blazer now available in-store and online.'),
(30, 'Watch', 5500, 20, 'uploads/5c14f6f974a004.33910139.jpg', 'Mens Wear', '						Turn it up with your squad with this grey timepiece around your wrist. It takes functionality to a whole new level with a round dial that is encased in stainless steel.					'),
(33, 'Jacket women', 1750, 11, 'uploads/5c14f96f48f6f9.27623623.jpg', 'Womens Wear', 'Be sure to pack this cozy, chic layer for your next outdoor adventure: the hooded down-filled vest from 32 Degrees.'),
(34, 'Jacket women', 2150, 19, 'uploads/5c14f99079a309.12570353.jpg', 'Mens Wear', 'Be sure to pack this cozy, chic layer for your next outdoor adventure: the hooded down-filled vest from 32 Degrees.'),
(35, 'Jacket women', 3333, 10, 'uploads/5c14f9ca1690e8.28685839.jpg', 'Womens Wear', 'Applicable tax on the basis of exact location & discount will be charged at the time of checkout\r\n100% Original Products'),
(36, 'Toy', 550, 30, 'uploads/5c14fa0e181523.72383482.jpeg', 'Kids', 'Enjoy the toy'),
(37, 'Toy', 800, 12, 'uploads/5c14fa45479a09.66976511.jpeg', 'Kids', 'Make your child happy'),
(42, 'Hat', 200, 12, 'uploads/5c1727111c2789.80539791.jpg', 'Womens Wear', 'GREAT SUN HAT - The classic sun hat goes modern with the Victoria by Wallaroo Hat Company. With a 3.5\" shaped brim, internal drawstring, and a range of colors, you can add sun protection and style to every ensemble.'),
(43, 'tady bear', 340, 19, 'uploads/5c179c082c26e9.69069248.jpg', 'Mens Wear', '						After reading numerous reviews for \"Big Pink Teddy Bears\" I went with this one even though it was more expensive. It was a Christmas gift for our granddaughter. It could not have been more perfect. It comes in a vacuum sealed bag so the box size is deceiving. When we opened it, it fluffed right up and my granddaughter was thrilled. It is super soft, fully stuffed and about four feet tall.It looks like it was very well made. Everything was as promised. I would buy it again without any reser'),
(44, 'Hat', 340, 12, 'uploads/5c188815960524.48108749.jpg', 'Mens Wear', 'very cool product');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `pd_id` int(11) NOT NULL,
  `model` varchar(256) NOT NULL,
  `price` varchar(256) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`pd_id`, `model`, `price`, `cat_id`) VALUES
(1, 'S7', '70000', 1),
(2, 'iphone-5', '20000', 2),
(3, 'ACER-5', '50000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sign_in_info`
--

CREATE TABLE `sign_in_info` (
  `user_id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `pwd` varchar(256) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign_in_info`
--

INSERT INTO `sign_in_info` (`user_id`, `email`, `pwd`, `user_type`) VALUES
(55, 'ks@gmail.com', '$2y$10$BRUnqR9yjjMXWSfK9aKpH.TGf0J4gYEvOMVv7hD2FWZ4vKoLC6k6i', 'admin'),
(58, 'mushfik@gmail.com', '$2y$10$yNdivNVhmpBeme7dinkaw.PbvCfJFpJnkOsivWoAZ0jRvm3GLvCqm', 'normal'),
(60, 'hasan@gmail.com', '$2y$10$xH0T8UpOBuX6RH97BZ1XjO1RLk8JlNeJrU8MUg9EvoIbvVzUXeLZ.', 'normal'),
(61, 'raju@gmail.com', '$2y$10$eokf66hY.IsET1R5.6nYUeQJFXnDLkesJKm/RGeO0MCrSL36zBmke', 'normal'),
(62, 'anik@gmail.com', '$2y$10$zpNOOGQX31xeb9y7VvVqT./t21CVSV6XyOpYnNVoy..Yo.YbgamHK', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `user_personal_info`
--

CREATE TABLE `user_personal_info` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `phone_no` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_personal_info`
--

INSERT INTO `user_personal_info` (`user_id`, `first_name`, `last_name`, `phone_no`) VALUES
(1, 'Horten', 'Hoe', '017-110959'),
(2, 'Jack', 'Adams', '017-113959'),
(3, 'Dooms', 'Day', '010-910959'),
(4, 'Bruice', 'Waine', '010-910959');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_info`
--
ALTER TABLE `address_info`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `brand_info`
--
ALTER TABLE `brand_info`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `category_info`
--
ALTER TABLE `category_info`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `sign_in_info`
--
ALTER TABLE `sign_in_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_personal_info`
--
ALTER TABLE `user_personal_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_info`
--
ALTER TABLE `category_info`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sign_in_info`
--
ALTER TABLE `sign_in_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user_personal_info`
--
ALTER TABLE `user_personal_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
