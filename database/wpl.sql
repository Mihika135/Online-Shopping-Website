-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 01:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_Id` bigint(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_Id`, `username`, `password`) VALUES
(1, 'mihika', '1220'),
(2, 'mihika2', '322412'),
(3, 'mihika3', 'mihika'),
(4, 'mihika4', 'flowers'),
(5, 'mihika5', '1305');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` text NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `product_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_Id` bigint(20) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_Id`, `category_name`, `type`) VALUES
(111, 'Sports', 'Western'),
(123, 'Party', 'Western'),
(766, 'Casual', 'Western'),
(343, 'Kurta', 'Traditional'),
(222, 'Saree', 'Traditional'),
(675, 'Ghagra', 'Traditional');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `products` varchar(100) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `order_status` text NOT NULL DEFAULT 'Processing',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `username`, `email`, `phone`, `address`, `pmode`, `products`, `amount_paid`, `order_status`, `date_added`) VALUES
(1, 'Mihika Dakappagari ', 'Mihikaa', 'mihika@gmail.com', '9869749356', 'Dattaguru', 'cod', 'Purple Off Shoulder Dress(5), Blue Dress with Flare(2)', '21148', 'Processing', '2022-04-28 03:56:49'),
(2, 'Mihika Shrinivas', 'mihika135', 'mihikashrinivas@gmail.com', '9912003100', 'Chembur, Mumbai', 'cod', 'Red Dress with black and white patterns(1), Beige Sweater and Jeans(1), Dull Pink Workout Outfit(2),', '9897', 'Processing', '2022-04-28 05:11:59'),
(3, 'Mihika Shrinivas', 'mihika135', 'mihikashrinivas@gmail.com', '9912003100', 'Chembur, Mumbai', 'cod', 'Faded Blue Dress(1), Red Wrap-Around Top(2)', '4497', 'Processing', '2022-04-28 05:38:48'),
(4, 'Mihika Shrinivas', 'mihika135', 'mihikashrinivas@gmail.com', '9912003100', 'Chembur, Mumbai', 'cod', 'Blue Denim Jeans(1), Blue Dress with Flare(3)', '8866', 'Processing', '2022-04-28 08:35:20'),
(5, 'Khushi Jhaveri', 'k.j', 'khushi@gmail.com', '3453224555', 'South Bombay', 'cod', 'Black Kurta(2)', '3398', 'Processing', '2022-04-28 09:29:57'),
(6, 'Mihika Shrinivas', 'mihika135', 'mihikashrinivas@gmail.com', '9912003100', 'Chembur, Mumbai', 'cod', 'Purple Off Shoulder Dress(2), Black Kurta(1)', '7999', 'Processing', '2022-04-28 10:37:07'),
(7, 'Mihika Shrinivas', 'mihika135', 'mihikashrinivas@gmail.com', '9912003100', 'Chembur, Mumbai', 'netbanking', 'Red and White Striped Shirt(1), Cargo Pants(1), Light Pink Pants(2), Light Blue Skirt(3), Yellow Spo', '16939', 'Processing', '2022-04-29 15:31:04'),
(8, 'Mihika Shrinivas', 'mihika135', 'mihikashrinivas@gmail.com', '9912003100', 'Dattaguru', 'cod', 'Purple Off Shoulder Dress(5), Faded Blue Dress(5)', '24245', 'Processing', '2022-05-02 05:14:32'),
(9, 'Mihika Dakappagari ', 'Mihika_Heart', 'miki@gmail.com', '9869749356', 'Chembur, Mumbai', 'netbanking', 'Purple Saree(1), Light Pink Pants(2), Turquoise Yoga Pants(2)', '7197', 'Processing', '2022-05-02 05:25:13'),
(10, 'Mihika Dakappagari', 'Mihika_Heart', 'miki@gmail.com', '9869749356', 'Chembur', 'cards', 'Plain Off White Shirt(5)', '4495', 'Processing', '2022-05-02 05:27:55'),
(11, 'Mihika Dakappagari ', 'Mihika_Heart', 'miki@gmail.com', '9869749356', 'Chembur', 'cod', 'Blue Denim Jeans(5)', '3845', 'Processing', '2022-05-02 05:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_Id` bigint(20) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `category_Id` bigint(20) NOT NULL,
  `cart_Id` bigint(20) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `product_desc` varchar(300) NOT NULL,
  `product_image` text NOT NULL,
  `size` varchar(30) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `instock` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_Id`, `product_code`, `category_Id`, `cart_Id`, `product_name`, `price`, `product_desc`, `product_image`, `size`, `brand`, `instock`) VALUES
(100, 'p1000', 123, 2, 'Purple Off Shoulder Dress', 3150, 'lorem ipsum', 'product1.avif', 'S', '', 50),
(101, 'p1001', 123, 3, 'Blue Dress with Flare', 2699, 'lorem ipsum', 'product3.avif', 'XS', '', 50),
(102, 'p1002', 123, 7, 'Black Dress with Sequins', 3450, 'lorem ipsum', 'product7.avif', 'S', '', 50),
(103, 'p1003', 766, 4, 'Blue Denim Jeans', 769, 'lorem ipsum', 'product2.avif', 'S', '', 50),
(104, 'p1004', 766, 20, 'Faded Blue Dress', 1699, 'lorem ipsum', 'product5.avif', 'M', '', 50),
(105, 'p1005', 766, 10, 'White Mini Skirt', 1199, 'lorem ipsum', 'product6.avif', 'S', '', 50),
(106, 'p1006', 766, 18, 'Red Dress with black and white patterns', 2150, 'lorem ipsum', 'product8.avif', 'M', '', 50),
(107, 'p1007', 111, 6, 'Dull Pink Workout Outfit', 1299, 'lorem ipsum', 'product4.avif', 'S', '', 50),
(108, 'p1008', 111, 19, 'Turquoise Yoga Pants', 1350, 'lorem ipsum', 'product9.avif', 'S', '', 50),
(109, 'p1009', 766, 0, 'Plain Off White Shirt', 899, 'Lorem Ipsum', 'product10.avif', 'S', '', 50),
(110, 'p1010', 766, 0, 'Black Top with Stars', 899, 'Lorem Ipsum', 'product11.avif', 'S', '', 50),
(111, 'p1011', 766, 0, 'Beige Sweater and Jeans', 1699, 'Lorem Ipsum', 'product12.avif', 'S', '', 50),
(112, 'p1012', 123, 0, 'Blue Flared Top', 1299, 'Lorem Ipsum', 'product13.avif', 'S', '', 50),
(113, 'p1013', 766, 0, 'Red Wrap-Around Top', 1399, 'Lorem Ipsum', 'product14.avif', 'S', '', 50),
(114, 'p1014', 123, 0, 'Black with floral designs', 2399, 'Lorem Ipsum', 'product15.avif', 'S', '', 50),
(115, 'p1015', 766, 0, 'Red Jacket', 1399, 'Lorem Ipsum', 'product16.avif', 'S', '', 50),
(116, 'p1016', 766, 0, 'Simple Black Skirt', 899, 'Lorem Ipsum', 'product17.avif', 'S', '', 50),
(117, 'p1017', 766, 0, 'White Top with Stripes', 899, 'Lorem Ipsum', 'product18.avif', 'S', '', 50),
(118, 'p1018', 766, 0, 'Grey Pants', 899, 'Lorem Ipsum', 'product19.avif', 'S', '', 50),
(119, 'p1019', 766, 0, 'Simple Red Top', 899, 'Lorem Ipsum', 'product20.avif', 'S', '', 50),
(120, 'p1020', 766, 0, 'Pink Suit', 3499, 'Lorem Ipsum', 'product21.avif', 'S', '', 50),
(121, 'p1021', 766, 0, 'Light Blue Jeans', 1299, 'Lorem Ipsum', 'product22.avif', 'S', '', 50),
(122, 'p1022', 766, 0, 'Dark Jeans with Slits', 1399, 'Lorem Ipsum', 'product23.avif', 'S', '', 50),
(123, 'p1023', 766, 0, 'Black Trousers', 1099, 'Lorem Ipsum', 'product24.avif', 'S', '', 50),
(124, 'p1024', 766, 0, 'Cargo Pants', 1399, 'Lorem Ipsum', 'product25.jpg', 'S', '', 50),
(125, 'p1025', 766, 0, 'Green Pants', 1399, 'Lorem Ipsum', 'product26.avif', 'S', '', 50),
(126, 'p1026', 766, 0, 'Light Pink Pants', 1399, 'Lorem Ipsum', 'product27.avif', 'S', '', 50),
(127, 'p1027', 766, 0, 'Red and White Striped Shirt', 899, 'Lorem Ipsum', 'product28.avif', 'S', '', 50),
(128, 'p1028', 766, 0, 'Olive Green Skirt', 1099, 'Lorem Ipsum', 'product29.avif', 'S', '', 50),
(129, 'p1029', 766, 0, 'Light Blue Skirt', 1099, 'Lorem Ipsum', 'product30.avif', 'S', '', 50),
(130, 'p1030', 766, 0, 'Orange Skirt with Slit', 1299, 'Lorem Ipsum', 'product31.avif', 'S', '', 50),
(131, 'p1031', 766, 0, 'Yellow and White Checkered Skirt', 1599, 'Lorem Ipsum', 'product32.jpg', 'S', '', 50),
(132, 'p1032', 766, 0, 'Cream Skirt', 1299, 'Lorem Ipsum', 'product33.avif', 'S', '', 50),
(133, 'p1033', 111, 0, 'Blue and Pink Gym Outfit', 1599, 'Lorem Ipsum', 'product34.avif', 'S', '', 50),
(134, 'p1034', 111, 0, 'White Gym Top', 899, 'Lorem Ipsum', 'product35.avif', 'S', '', 50),
(135, 'p1035', 111, 0, 'Yellow Sports Bra', 1399, 'Lorem Ipsum', 'product36.avif', 'S', '', 50),
(136, 'p1036', 111, 0, 'Black Leggings', 899, 'Lorem Ipsum', 'product37.avif', 'S', '', 50),
(137, 'p1037', 343, 0, 'Black Kurta', 1699, 'Lorem Ipsum', 'product39.avif', 'S', '', 50),
(138, 'p1038', 343, 0, 'White Kurta', 1699, 'Lorem Ipsum', 'product40.avif', 'S', '', 50),
(139, 'p1039', 343, 0, 'Pink Kurta', 1699, 'Lorem Ipsum', 'product41.jpg', 'S', '', 50),
(140, 'p1040', 343, 0, 'Light Blue Kurta', 1699, 'Lorem Ipsum', 'product42.jpg', 'S', '', 50),
(141, 'p1041', 222, 0, 'Black and White Saree', 1699, 'Lorem Ipsum', 'product43.avif', 'S', '', 50),
(142, 'p1042', 343, 0, 'Green Kurta', 1399, 'Lorem Ipsum', 'product44.jpg', 'S', '', 50),
(143, 'p1043', 343, 0, 'Blue Kurta', 1699, 'Lorem Ipsum', 'product45.webp', 'S', '', 50),
(144, 'p1044', 343, 0, 'White Kurta', 1699, 'Lorem Ipsum', 'product46.jpg', 'S', '', 50),
(145, 'p1045', 222, 0, 'Purple Saree', 1699, 'Lorem Ipsum', 'product47.jpg', 'S', '', 50),
(146, 'p1046', 222, 0, 'Black and Pink Saree', 1699, 'Lorem Ipsum', 'product48.avif', 'S', '', 50),
(147, 'p1047', 222, 0, 'Peach Coloured Saree', 1699, 'Lorem Ipsum', 'product49.jpg', 'S', '', 50),
(148, 'p1048', 222, 0, 'Dark Blue Saree', 1699, 'Lorem Ipsum', 'product50.avif', 'S', '', 50),
(149, 'p1049', 343, 0, 'Colorful Kurta', 1599, 'Lorem Ipsum', 'product38.avif', 'S', '', 50);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `cust_Id` int(11) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pwd` varchar(60) NOT NULL,
  `mobilenumber` bigint(10) NOT NULL,
  `shipping_address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`cust_Id`, `fname`, `lname`, `username`, `email`, `pwd`, `mobilenumber`, `shipping_address`) VALUES
(1, 'mihika', 'shrinivas', 'mihika135', 'mihikashrinivas@gmail.com', '13052002', 9912003100, 'Chembur, Mumbai'),
(2, 'shruti', 'mungale', 'shrutss', 'shruti@somaiya.edu', '12345678', 9869749356, 'Pune'),
(7, 'Ruta', 'Kulkarni', 'ruta.k', 'rutak@somaiya.edu', '123dwdx', 2227779990, 'Thane'),
(8, 'bhavik', 'naik', 'bhavik.n', 'bhavik@somaiya.edu', 'segdwasa', 1233097786, 'Ghatkopar'),
(9, 'khushal', 'jhaveri', 'khushal.j', 'khushal@somaiya.edu', 'axbdwuk', 2221334556, 'South Bombay'),
(10, 'Megha', 'Pillai', 'meghs', 'meghs@gmail.com', '1234554', 4132676700, 'Diamond Garden'),
(13, 'xecww', 'qwgflxekv', 'dascea', 'abcdef@gmail.com', 'wxege', 1232243434, 'snnreb'),
(14, 'Mihika', 'Dakappagari', 'Mihika_Heart', 'miki@gmail.com', 'lovebts', 9869749356, 'Dattaguru, Chembur, Mumbai'),
(15, 'Mihir', 'Dakappagari ', 'Mihir0215', 'mihird@gmail.com', 'mihir', 8624946667, 'Chembur'),
(16, 'Parvathi', 'Tallam', 'Paru', 'parvathi@gmail.com', 'mihirmihika', 9969861697, 'Chembur'),
(17, 'Mihika', 'Dakappagari', 'Mk_D', 'mihika@gmail.com', 'mikilove', 9876789990, 'Chembur, Mumbai'),
(18, 'cgvct', 'cethg', '', 'zvxdf@gmail.com', 'ddgctr', 3252133425, 'crgtvh4y'),
(19, 'cfvbrtyv', 'fdverbgth', '', 'asdf@gmail.com', 'dfsds', 1232224434, 'bhgfy'),
(20, 'ddfhg', 'hjbdyugdg', '', 'ads@gmail.com', 'ferfe', 5472436732, 'hjvfghjsa'),
(21, 'Mihika', 'Dakappagari ', 'Mihikaa', 'mihika@gmail.com', '11111', 9869749356, 'Dattaguru'),
(22, 'Khushi', 'Jhaveri', 'k.j', 'khushi@gmail.com', 'khushi', 3453224555, 'South Bomboy'),
(23, 'a', 'a', 'a', 'a@gmail.com', 'aaaaa', 7662836637, 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_Id`);

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
  ADD PRIMARY KEY (`product_Id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`cust_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `cust_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
