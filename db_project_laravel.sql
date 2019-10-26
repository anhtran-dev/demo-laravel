-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2019 lúc 01:54 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_project_laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `alias`, `order`, `parent_id`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(9, 'Quần', 'quan', 30, 0, 'quan', 'Quần cao cấp', '2019-10-18 04:52:13', '2019-10-20 21:26:14'),
(10, 'Áo', 'ao', 34, 0, NULL, 'Áo đẹp', '2019-10-18 04:52:20', '2019-10-20 21:26:33'),
(11, 'Quần thun', 'quan-thun', 10, 9, 'quần thun', 'quần thun  cao cấp', '2019-10-19 02:03:34', '2019-10-19 02:03:34'),
(12, 'Quần Ka ki', 'quan-ka-ki', 20, 9, 'quần , quần kaki', 'Quần kaki', '2019-10-19 02:05:24', '2019-10-22 07:00:29'),
(13, 'quần Jean', 'quan-jean', 30, 9, 'Quần Jean', 'Quần Jean', '2019-10-19 02:41:38', '2019-10-22 06:57:39'),
(14, 'Áo thun', 'ao-thun', 4, 10, 'Áo 1', 'Áo 1', '2019-10-21 20:22:56', '2019-10-22 07:01:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2019_10_17_094843_create_users_table', 1),
(7, '2019_10_17_100434_create_category_table', 1),
(8, '2019_10_17_101427_create_products_table', 1),
(9, '2019_10_17_102315_create_product_images_table', 1),
(10, '2019_10_17_135541_change_datatype_password_users_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `alias`, `price`, `intro`, `content`, `image`, `keywords`, `description`, `user_id`, `cate_id`, `created_at`, `updated_at`) VALUES
(39, 'Quần sooc nữ ống rộng giả', 'quan-sooc-nu-ong-rong-gia', 50, '<p>Quần sooc nữ ống rộng giả&nbsp;</p>', '<p>Quần sooc nữ ống rộng giả&nbsp;</p>', '6-1475570027959-crop-1475570071266-15390667492351950968172.jpg', 'Quần sooc nữ ống rộng giả', '<p>Quần sooc nữ ống rộng giả&nbsp;</p>', 3, 9, '2019-10-24 07:32:07', '2019-10-24 07:44:55'),
(40, 'Áo thun nam k1', 'ao-thun-nam-k1', 50, '<p>&Aacute;o thun nam k1</p>', '<p>&Aacute;o thun nam k1</p>', '20160718-125058-6876622eko_600x398.jpg', 'Áo thun nam k1', '<p>&Aacute;o thun nam k1</p>', 3, 14, '2019-10-24 07:33:10', '2019-10-24 07:33:10'),
(41, 'Quần thun trẻ em 123', 'quan-thun-tre-em-123', 10, '<p>Quần thun trẻ em 123</p>', '<p>Quần thun trẻ em 123</p>', 'anh-anime-buon-nhat2.png', 'Quần thun trẻ em 123', '<p>Quần thun trẻ em 123</p>', 3, 11, '2019-10-24 07:34:21', '2019-10-24 07:34:21'),
(42, 'Quần kaki nam 01', 'quan-kaki-nam-01', 20, '<p>Quần kaki nam 01</p>', '<p>Quần kaki nam 01</p>', 'screenshot (1).png', 'Quần kaki nam 01', '<p>Quần kaki nam 01</p>', 3, 12, '2019-10-24 08:03:00', '2019-10-24 08:03:00'),
(43, 'Quần thun dành cho trẻ em', 'quan-thun-danh-cho-tre-em', 3, '<p>Quần thun d&agrave;nh cho trẻ em</p>', '<p>Quần thun d&agrave;nh cho trẻ em</p>', 'ceb817dc0b656f98da175af1f22b75f4.jpg', 'Quần thun dành cho trẻ em', '<p>Quần thun d&agrave;nh cho trẻ em</p>', 3, 11, '2019-10-24 08:13:09', '2019-10-24 08:13:09'),
(44, 'Áo sơ mi L2', 'ao-so-mi-l2', 4, '<p>&Aacute;o sơ mi L2</p>', '<p>&Aacute;o sơ mi L2</p>', '328429721789273562770417996336881530830848n-1539067364913629812346.jpg', 'Áo sơ mi L2', '<p>&Aacute;o sơ mi L2</p>', 3, 10, '2019-10-24 08:13:49', '2019-10-24 08:13:49'),
(45, 'Áo thun da L1', 'ao-thun-da-l1', 5, '<p>&Aacute;o thun da L1</p>', '<p>&Aacute;o thun da L1</p>', 'anh-anime-phong-canh-buon_112649105.jpg', 'Áo thun da L1', '<p>&Aacute;o thun da L1</p>', 3, 14, '2019-10-24 08:15:53', '2019-10-24 08:15:53'),
(46, 'Áo thun da L2', 'ao-thun-da-l2', 5, '<p>&Aacute;o thun da L1</p>', '<p>&Aacute;o thun da L1</p>', 'swamp-fever-the-swamp-left-4-dead-2-38780450-1024-576-1472113571710.jpg', 'Áo thun da L1', '<p>&Aacute;o thun da L1</p>', 3, 14, '2019-10-24 08:17:54', '2019-10-24 08:17:54'),
(47, 'Quần kaki nam L20', 'quan-kaki-nam-l20', 7, '<p>Quần kaki nam L20</p>', '<p>Quần kaki nam L20</p>', 'photo-1-1503895654232.jpg', 'Quần kaki nam L20', '<p>Quần kaki nam L20</p>', 3, 12, '2019-10-24 08:19:05', '2019-10-24 08:19:05'),
(48, 'Quần kaki phướt L50', 'quan-kaki-phuot-l50', 12, '<p>Quần kaki phướt L50</p>', '<p>Quần kaki phướt L50</p>', 'anh-anime-buon-nhat2.png', 'Quần kaki phướt L50', '<p>Quần kaki phướt L50</p>', 3, 12, '2019-10-24 08:19:39', '2019-10-24 08:19:39'),
(49, 'Quần thun dạo phố L20', 'quan-thun-dao-pho-l20', 8, '<p>Quần thun dạo phố L20</p>', '<p>Quần thun dạo phố L20</p>', 'anh-anime-buon-nhat2.png', 'Quần thun dạo phố L20', '<p>Quần thun dạo phố L20</p>', 3, 11, '2019-10-24 08:25:07', '2019-10-24 08:25:07'),
(50, 'Quần thun dạo phố L22', 'quan-thun-dao-pho-l22', 8, '<p>Quần thun dạo phố L20</p>', '<p>Quần thun dạo phố L20</p>', 'Screenshot (41).png', 'Quần thun dạo phố L20', '<p>Quần thun dạo phố L20</p>', 3, 11, '2019-10-24 08:29:10', '2019-10-24 08:29:10'),
(51, 'Quần thun nam L99', 'quan-thun-nam-l99', 9, '<p>Quần thun nam L99</p>', '<p>Quần thun nam L99</p>', 'IMG_1310.JPG', 'Quần thun nam L99', '<p>Quần thun nam L99</p>', 3, 11, '2019-10-24 08:29:49', '2019-10-24 08:29:49'),
(52, 'Quần thun nam L80', 'quan-thun-nam-l80', 90, '<p>Quần thun nam L80</p>', '<p>Quần thun nam L80</p>', 'IMG_1319.JPG', 'Quần thun nam L80', '<p>Quần thun nam L80</p>', 3, 11, '2019-10-24 08:30:19', '2019-10-24 08:30:19'),
(53, 'Quần thun trẻ em L00', 'quan-thun-tre-em-l00', 3, '<p>Quần thun trẻ em L00</p>', '<p>Quần thun trẻ em L00</p>', '328429721789273562770417996336881530830848n-1539067364913629812346.jpg', 'Quần thun trẻ em L00', '<p>Quần thun trẻ em L00</p>', 3, 11, '2019-10-24 08:34:51', '2019-10-24 08:34:51'),
(54, 'Quần Jean nữ L0', 'quan-jean-nu-l0', 5, '<p>Quần Jean nữ L0</p>', '<p>Quần Jean nữ L0</p>', 'swamp-fever-the-swamp-left-4-dead-2-38780450-1024-576-1472113571710.jpg', 'Quần Jean nữ L0', '<p>Quần Jean nữ L0</p>', 4, 13, '2019-10-24 17:54:15', '2019-10-24 17:54:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(12, 'anh-anime-phong-canh-buon_112649105.jpg', 39, '2019-10-24 07:44:55', '2019-10-24 07:44:55'),
(13, '5fedcc818ebe2517461c3bf7e19d8723.jpg', 39, '2019-10-24 07:45:19', '2019-10-24 07:45:19'),
(14, '1-1475569645529-crop-1475569759438-15390667492271836143399.jpg', 53, '2019-10-24 08:34:51', '2019-10-24 08:34:51'),
(15, 'hinh-anh-phong-canh-anime-dep-nhat-2.jpg', 54, '2019-10-24 17:54:16', '2019-10-24 17:54:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'anhtran', 'anhtran@gmail.com', '$2y$10$xmf0JTmKMibA11RpoMzsCudmsYI1PIvu0V50TQVwZzrLh6svTTqNa', 1, NULL, NULL, NULL),
(4, 'admin', 'admin@gmail.com', '$2y$10$pEM.Q9gWx.RJ6ZhbO1IPF.8XkelgLBI33iI2pBx6W0CIZQgYPOMy2', 1, NULL, NULL, NULL),
(5, 'hoangnguyen', 'hoangg@gmail.com', '$2y$10$pq9Ds5A0fTCQ531rQgsiZeTDBz7RFR5rIOK1Dhly4e48UAorhbBmy', 0, 'W6F4OMFVKvMwo0sQh11AtNvQc3HCTTSAz9HvvHq2', NULL, '2019-10-24 17:52:51'),
(6, 'xuantran', 'xuan@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0, NULL, NULL, NULL),
(8, 'phong', 'phong@gmail.com', '$2y$10$.x1RxkrvZysK0H9IPAlJ/.qctCVua0fxCg0KhqpgCnD1RtLYJv/ye', 0, NULL, '2019-10-24 07:10:56', '2019-10-24 07:10:56'),
(9, 'minh', 'minh@gmail.com', '$2y$10$Qyq.6ZRFGfOHI5/pJo6hBegeRghA.0fI.rJhMb96XWHcu7J8QqHYG', 1, NULL, '2019-10-24 07:12:59', '2019-10-24 07:12:59'),
(10, 'hien', 'hien@gmail.com', '$2y$10$igQ4Rp/WQObs1TvzcQTG5OLxuOEwoh7HGQwRABGkAUpQD8uyyNegG', 1, 'U3ldVKTx4lhCG0EC7tAkrxGu4GPpu3u39Ekt0lwX', '2019-10-24 10:13:51', '2019-10-24 10:13:51');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
