-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2022 at 03:38 PM
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
-- Database: `nhom_predator`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `category_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `category_slug`) VALUES
(13, 'Đàn Guitar Martin', 1, 'dan-guitar-martin1647281597'),
(14, 'Đàn Guitar Taylor', 1, 'dan-guitar-taylor1647281609'),
(15, 'Đàn Guitar Cordoba', 1, ''),
(16, 'Đàn Guitar Washburn', 1, ''),
(17, 'Đàn Guitar BA ĐỜN', 1, ''),
(20, 'Đàn Guitar Takamine', 1, ''),
(32, '123213 2313', 1, '123213-23131649086430'),
(33, 'tho category', 1, 'tho-category1649096094'),
(34, '23131 313', 1, '23131-3131649087237'),
(36, '3213 232', 0, '3213-2321649087253'),
(37, '123 23123', 0, '123-231231649087712'),
(38, '3213 32132', 0, '3213-321321649087716'),
(39, '2122 222', 0, '2122-2221649087722');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `create_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `status`, `create_at`) VALUES
(66, 3, 383700000, 0, '2022-03-28'),
(67, 24, 172000000, 1, '2022-04-05'),
(68, 24, 5000000, 0, '2022-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `product_name`, `product_image`, `price`, `amount`, `total`, `order_id`) VALUES
(23, 'Đàn Guitar Martin D16RGT Danh Giá', 'image1.3.1.jpg', 43000000, 6, 258000000, 66),
(24, 'Đàn Guitar Acoustic Martin D16GT', 'image1.5.1.jpg', 41900000, 3, 125700000, 66),
(25, 'Đàn Guitar Martin D16RGT Danh Giá', 'image1.3.1.jpg', 43000000, 93, 2147483647, 67),
(26, 'Đàn Guitar Washburn Bella Tono Vite S9V EQ', 'Image4.3.1.jpg', 5000000, 100, 500000000, 68);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `originalprice` decimal(10,0) NOT NULL,
  `promotionalprice` decimal(10,0) NOT NULL,
  `amount` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `view_count` int(11) NOT NULL,
  `create_at` date DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `image`, `image1`, `image2`, `content`, `originalprice`, `promotionalprice`, `amount`, `sold`, `status`, `product_slug`, `view_count`, `create_at`, `user_id`, `category_id`) VALUES
(12, 'Đàn Guitar Acoustic Martin DXMAE', 'image1.2.1.jpg', 'image1.2.2.jpg', 'image1.2.3.jpg', '<p>Martin DXMAE với mặt top gỗ HPL c&ocirc;ng nghệ độc quyền của h&atilde;ng, d&aacute;ng D do ch&iacute;nh Martin s&aacute;ng tạo ra, EQ Fishman chất lượng cao. Với &acirc;m thanh chất lượng cao v&agrave; mức gi&aacute; vừa phải, DXMAE rất tốt cho người ', '13000000', '12100000', -1, 0, 1, 'dan-guitar-acoustic-martin-dxmae1649095643', 32, '2022-03-15', 24, 13),
(13, 'Đàn Guitar Martin D16RGT Danh Giá', 'image1.3.1.jpg', 'image1.3.2.jpg', 'image1.3.3.jpg', '<p>Martin D16RGT l&agrave; model chuẩn mực, mang đầy đủ c&aacute;c yếu tố đặc trưng nhất l&agrave;m n&ecirc;n t&ecirc;n tuổi của h&atilde;ng. Model n&agrave;y c&oacute; bề ngo&agrave;i truyền thống v&agrave; &acirc;m thanh cực kỳ nội lực, c&aacute;c dải b', '46000000', '43000000', 93, 0, 1, 'dan-guitar-martin-d16rgt-danh-gia1649095668', 12, '2022-03-15', 24, 13),
(14, 'Đàn Guitar Acoustic Martin DX1AE', 'image1.4.1.jpg', 'image1.4.2.jpg', 'image1.4.3.jpg', '<p>Đ&agrave;n Guitar Martin DX1AE l&agrave; model b&aacute;n chạy nhất của Martin năm 2017 nhờ mức gi&aacute; cực kỳ vừa phải m&agrave; vẫn c&oacute; được chất &acirc;m đặc trưng của h&atilde;ng. Trước đ&acirc;y, sở hữu một c&acirc;y đ&agrave;n Guitar Mar', '19000000', '17000000', 100, 0, 1, 'dan-guitar-acoustic-martin-dx1ae1649095674', 22, '2022-03-15', 24, 13),
(15, 'Đàn Guitar Acoustic Martin D16GT', 'image1.5.1.jpg', 'image1.5.2.jpg', 'image1.5.3.jpg', '<p>Đ&agrave;n Guitar Martin D-16GT thuộc series 16 danh gi&aacute;, d&agrave;nh cho ai muốn c&oacute; c&acirc;y đ&agrave;n chuy&ecirc;n nghiệp cho việc biểu diễn, thu &acirc;m. Series 16 của Martin d&agrave;nh cho những ai t&igrave;m kiếm chất &acirc;m ha', '43000000', '41900000', 98, 0, 1, 'dan-guitar-acoustic-martin-d16gt1649095678', 52, '2022-03-15', 24, 13),
(16, 'Đàn Guitar Acoustic Taylor 314CE', 'Image2.1.1.jpg', 'Image2.1.2.jpg', 'Image2.1.3.jpg', '<p>Nằm trong series 300, Đ&agrave;n Guitar Taylor 314CE c&oacute; chất &acirc;m đặc trưng, l&agrave;m n&ecirc;n thương hiệu Taylor với đầy đủ những đặc điểm nổi bật nhất như d&aacute;ng Grand Auditorium, gỗ thịt Spruce v&agrave; Sapele cũng như EQ độc quy', '54000000', '52900000', 99, 0, 1, 'dan-guitar-acoustic-taylor-314ce1649095697', 43, '2022-03-15', 24, 14),
(17, 'Đàn Guitar Acoustic Taylor GS Mini-e Koa', 'Image2.2.1.jpg', 'Image2.2.2.jpg', 'Image2.2.3.jpg', 'Đàn guitar Taylor GS Mini-e Koa: Phiên bản cao cấp của cây guitar Taylor GS Mini được trang bị cho những buổi biểu diễn với việc bổ sung thêm hệ thống pickup EB-S , bao gồm các nút xoay điều chỉnh tone và âm lượng. Là sự kết hợp giữa kích thước nhỏ gọn và', '23000000', '21100000', 100, 0, 1, '', 42, '2022-03-15', 4, 14),
(18, 'Đàn Guitar Acoustic Taylor GS MiniE LTD Ovangkol', 'Image2.3.1.jpg', 'Image2.3.2.jpg', 'Image2.3.3.jpg', 'Taylor GS Mini-e LTD Ovangkol là phiên bản giới hạn của hãng với loại gỗ quý Ovangkol. Loại gỗ này chỉ xuất hiện ở những model Taylor Series 4. Với model phiên bản giới hạn này, bạn đã có thể sở hữu loại gỗ quý hiếm này với mức giá rất phải chăng.', '21000000', '19000000', 100, 0, 1, '', 75, '2022-03-15', 4, 14),
(19, 'Đàn Guitar Big Baby Taylor BBT', 'Image2.4.1.jpg', 'Image2.4.2.jpg', 'Image2.4.3.jpg', '<p>Discover the Difference a Taylor Guitar Can Make! The three-fourths-size Baby Taylor, with either solid spruce or solid mahogany top, makes a great-sounding traveling companion. The larger Big Baby (15/16 of full-size) has a spruce top and plays like a', '12500000', '12000000', 100, 0, 1, 'dan-guitar-big-baby-taylor-bbt1649095715', 42, '2022-03-15', 24, 14),
(20, 'Đàn Guitar Taylor Academy A12N', 'Image2.5.1.jpg', 'Image2.5.2.jpg', 'Image2.5.3.jpg', 'Taylor Academy A12N Nylon This acoustic/electric nylon-string Grand Concert from our Academy Series may be the best nylon-string guitar you’ll find for the money. The underlying design goal of the series is to make the acoustic guitar accessible to more p', '16000000', '14900000', 100, 0, 1, '', 83, '2022-03-15', 4, 14),
(21, 'Taylor Academy A12N Nylon', 'Image3.1.1.jpg', 'Image3.1.2.jpg', 'Image3.1.3.jpg', '<p>Đ&agrave;n guitar Classic Cordoba C7 CD - L&agrave; sự lựa chọn tuyệt vời cho người chơi mới chơi guitar hay l&agrave; người chơi ở dạng b&aacute;n chuy&ecirc;n nghiệp. Model Cordoba C7 CD l&agrave; bản n&acirc;ng cấp từ model C5 CD, sự kh&aacute;c nha', '1800000', '16900000', 100, 0, 1, 'taylor-academy-a12n-nylon1647286823', 32, '2022-03-15', 4, 15),
(22, 'Đàn Guitar Cordoba CE Custom Master Series Classical Electric', 'Image3.2.1.jpg', 'Image3.2.2.jpg', 'Image3.2.3.jpg', 'Cordoba CE Custom với các thông số gỗ cao cấp, hoàn toàn bằng gỗ thịt (all-solid). Mặt top là gỗ thịt Tuyết Tùng Đỏ (solid western red cedar); lưng và hông là gỗ thịt Cẩm Ấn (solid Indian Rosewood). Cần đàn mỏng hình chữ C (C-shape) bằng gỗ Tuyết Tùng tạo', '15300000', '14000000', 100, 0, 1, '', 39, '2022-03-15', 4, 15),
(23, 'Đàn Guitar Classic Cordoba GK Pro Negra', 'Image3.3.1.jpg', 'Image3.3.2.jpg', 'Image3.3.3.jpg', '3	Đàn Guitar Classic Cordoba GK Pro Negra	60.000.000	57.000.000	Image3.3.1.jpg\r\nImage3.3.2.jpg\r\nImage3.3.3.jpg\r\nImage3.3.4.jpg	Phong ( người tạo )	02-03-2022 ( ngày tạo )  	1 ( loại sản phẩm )	100	Đàn guitar Cordoba GK Pro là phiên bản guitar classic được', '60000000', '57000000', 100, 0, 1, '', 72, '2022-03-15', 4, 15),
(24, 'Đàn Guitar Classic Cordoba C5-CD', 'Image3.4.1.jpg', 'Image3.4.2.jpg', 'Image3.4.3.jpg', 'Cordoba C5-CD gây ấn tượng với những loại gỗ giá trị nhất của một cây đàn guitar: mặt là gỗ thịt Cedar Canada, lưng và hông gỗ Mahogany và bàn phím là Rosewood. Gỗ Cedar (Tuyết Tùng) là loại gỗ lý tưởng cho một người nghệ sỹ biểu diễn trên sân khấu mà âm ', '6400000', '6000000', 100, 0, 1, '', 22, '2022-03-15', 4, 15),
(25, 'Đàn Guitar Classic Cordoba Fusion 5 Limited Edition, Sonatar Burst', 'Image3.5.1.jpg', 'Image3.5.2.jpg', 'Image3.5.3.jpg', 'Một cây đàn guitar Classic mang phong cách Acoustic quen thuộc.\r\nModel Cordoba Fusion 5 Limited Edition (LE) là sự lựa chọn hoàn hảo cho người chơi guitar phong cách Acoustic trên cây đàn Classic, hay nói đơn giản bạn muốn trải nghiệm một cây đàn dây sắt ', '11300000', '10300000', 100, 0, 1, '', 74, '2022-03-15', 4, 15),
(26, 'Đàn Guitar Acoustic Washburn Elegante BTS24S', 'Image4.1.1.jpg', 'Image4.1.2.jpg', 'Image4.1.3.jpg', 'Đàn được thiết kế với mặt Top bằng Gỗ Vân sam Spruce, một loại gỗ truyền thống để tạo ra những cây đàn cho chất lượng âm thanh ở mức tuyệt vời nhất. Sự kết hợp với mặt sau bằng gỗ Pau Ferro tuyệt đẹp tạo điểm nhấn khác lạ cho cây đàn này.\r\n\r\nMặt Soundboar', '8000000', '6900000', 100, 0, 1, '', 82, '2022-03-15', 4, 16),
(27, 'Đàn Guitar Washburn SC56SCE', 'Image4.2.1.jpg', 'Image4.2.2.jpg', 'Image4.2.3.jpg', 'Đây là model cao cấp nhất trong dòng Bella Tono của Washburn. Với mặt top là gỗ thịt Vân Sam (solid Spruce) và lưng hông là gỗ Acacia cao cấp, mang lại âm thanh cực kỳ trầm ầm mà không bị nặng nề, âm treble vang sáng, mượt mà. Dải âm bass treble cực kỳ hà', '10000000', '9100000', 100, 10, 1, '', 67, '2022-03-15', 4, 16),
(28, 'Đàn Guitar Washburn Bella Tono Vite S9V EQ', 'Image4.3.1.jpg', 'Image4.3.2.jpg', 'Image4.3.3.jpg', 'Vẻ ngoài đen mượt sang trọng phù hợp với âm thanh mềm mại, ngọt ngào, Bella Tono Vite S9V là cây đàn cực đỉnh trong tầm giá dưới 6 triệu. Kiểu dáng thiết kế mang phong cách dùng trong studio, cây đàn giúp người chơi cảm giác nhỏ gọn, thoải mái mà vẫn giữ ', '6000000', '5000000', 100, 5, 1, '', 42, '2022-03-15', 4, 16),
(29, 'Đàn Guitar Washburn BTS9 CHD (Bella Tono Novo S9)', 'Image4.4.1.jpg', 'Image4.4.2.jpg', 'Image4.4.3.jpg', 'Đàn guitar Washburn BTS9 CHD (Bella Tono Novo S9) cuốn hút người dùng với mặt top gỗ Vân Sam sơn đen bóng rất đẹp và lưng hông là gỗ Óc Chó (Walnut)\r\n\r\nModel này mang lại cảm giác cực kỳ thoải mái khi chơi, bàn phím bấm êm, cảm giác ngón tay mượt mà, nhẹ ', '3900000', '3600000', 100, 0, 1, '', 93, '2022-03-15', 4, 16),
(30, 'Đàn Guitar Acoustic Ba Đờn T420', 'Image5.1.1.jpg', 'Image5.1.2.jpg', 'Image5.1.3.jpg', 'Đàn Guitar Acoustic Ba Đờn T420\r\n- Dáng Orchestra Model cho âm Treble sáng và vang rất phù hợp để chơi các bản Fingerstyle. Nếu cùng thông số gỗ và cỡ dây, đàn dáng Orchestra Model sẽ cho âm treble sáng hơn so với các dáng đàn còn lại.\r\n- Mặt Top: gỗ Thôn', '5000000', '4600000', 100, 0, 1, '', 27, '2022-03-15', 4, 17),
(31, 'Đàn Guitar Acoustic Ba Đờn VE70', 'Image5.2.1.jpg', 'Image5.2.2.jpg', 'Image5.2.3.jpg', 'Ba Đờn VE70 có dáng đàn nhỏ nhắn, khi chơi sẽ thoải mái không gây mỏi tay phải vì quá vòng tay quá rộng, cây đàn này cũng rất phù hợp với những bạn hay di chuyển vì sự nhỏ gọn của đàn. Một điều khác biệt nữa là VE70 được làm khuyết ở ngăn thứ 14 giúp cho ', '1500000', '1250000', 100, 2, 1, '', 82, '2022-03-15', 4, 17),
(32, 'Đàn Guitar Acoustic Ba Đờn J150D', 'Image5.3.1.jpg', 'Image5.3.2.jpg', 'Image5.3.3.jpg', 'Đàn Guitar Acoustic Ba Đờn J150D Đàn Guitar Acoustic Ba Đờn J150D Thông Số Đàn Guitar Acoustic Ba Đờn J150D\r\nMặt Top : gỗ Thông Sitka.\r\nLưng Hồng: gỗ Hồng Đào cao cấp\r\nCần: gỗ thao lao, có ty chống cong cần 2 chiều\r\nMặt phím: gỗ đen\r\nNgựa: gỗ đen\r\nDây: al', '2500000', '2000000', 100, 0, 1, '', 82, '2022-03-15', 4, 17),
(33, 'Đàn Guitar Acoustic Ba Đờn T700Đàn Guitar Acoustic Ba Đờn T700Đàn Guitar Acoustic Ba Đờn T700', 'Image5.4.1.jpg', 'Image5.4.2.jpg', 'Image5.4.3.jpg', '<p>Đ&agrave;n Guitar Acoustic Ba Đờn T700 Đ&agrave;n Guitar Acoustic Ba Đờn T700 Th&ocirc;ng Số Đ&agrave;n Guitar Acoustic Ba Đờn T700 Top: gỗ Th&ocirc;ng Solid nguy&ecirc;n tấm Lưng v&agrave; h&ocirc;ng: gỗ C&ograve;ng Cần đ&agrave;n: gỗ Gi&aacute; Ti C&', '8400000', '7200000', 100, 0, 0, 'dan-guitar-acoustic-ba-don-t700dan-guitar-acoustic-ba-don-t700dan-guitar-acoustic-ba-don-t7001649096568', 72, '2022-03-15', 24, 17),
(34, 'Đàn Guitar Classic Ba Đờn C550 Điệp', 'Image5.5.1.jpg', 'Image5.5.2.jpg', 'Image5.5.3.jpg', '<p>Đ&agrave;n Guitar Classic Ba Đờn C550 Điệp - Mặt Top: gỗ Th&ocirc;ng Solid ( c&ograve;n gọi l&agrave; gỗ Pinaceae Solid ). D&ograve;ng gỗ thường được c&aacute;c nghệ nh&acirc;n sử dụng tr&ecirc;n những c&acirc;y đ&agrave;n ở ph&acirc;n kh&uacute;c tầm ', '7000000', '6300000', 100, 0, 0, 'dan-guitar-classic-ba-don-c550-diep1649095710', 26, '2022-03-15', 24, 17),
(50, '213', 'nenfb.jpg', 'nencv.jpg', 'nencv.jpg', '<p>23123</p>\r\n', '9999999999', '12211', 12, 0, 1, '2131649096740', 0, '2022-04-05', 24, 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `sdt` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `image`, `status`, `sdt`, `address`, `role_id`) VALUES
(3, 'số 3', 'vobachtho@gmail.com', '1', 'nen4.jpg', 1, 1211, '21121', 1),
(8, 'số 8', 'tho@gmail.com', '1', '', 1, 312, '32131', 2),
(24, 'admin', 'admin@gmail.com', '1', '', 1, 213123, '2133', 0),
(25, '2131', 'lengocha12k@gmail.com', '1', 'ly.jpg', 1, 31, '321', 0),
(26, '312313', 'lengo2cha2k@gmail.com', '1', 'nenfb.jpg', 1, 21312, '31231', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_ibfk_1` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_ibfk_1` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
