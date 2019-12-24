-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 24, 2019 lúc 08:00 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `caphe_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bonus`
--

CREATE TABLE `bonus` (
  `id` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `info` varchar(100) CHARACTER SET ucs2 COLLATE ucs2_vietnamese_ci NOT NULL,
  `bonus` int(1) NOT NULL,
  `staff` int(11) NOT NULL,
  `month` varchar(7) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_hoadon`
--

CREATE TABLE `ct_hoadon` (
  `id` int(11) NOT NULL,
  `hoadon` int(11) NOT NULL,
  `sanpham` varchar(100) CHARACTER SET ucs2 COLLATE ucs2_vietnamese_ci NOT NULL,
  `unit_price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `khachhang` int(11) DEFAULT NULL,
  `nhanvien` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `initial_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET ucs2 COLLATE ucs2_vietnamese_ci NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `point` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `name`, `phone`, `email`, `point`, `updated_at`, `created_at`) VALUES
(1, 'Phạm Bảo Hân', '1', 'test@gmail.com', 18698, '2019-12-21 18:27:28', '2019-12-09 02:07:26'),
(2, 'Phạm Bảo Hân', '0965851500', 'test@gmail.com', 0, '2019-12-24 08:44:58', '2019-12-24 08:44:58'),
(8, 'Phạm Bảo Hân', '0965851500', 'hanpb@gmail.com', 0, '2019-12-24 18:41:07', '2019-12-24 12:36:28'),
(9, 'Nguyễn Dzoãn Hoàng Khánh Duy', '1665402785', 'nguyenduy51@gmail.com', 0, '2019-12-24 18:24:36', '2019-12-24 18:24:36'),
(10, 'Trần Ngọc Hải', '0969099901', 'haitn@gmai.com', 0, '2019-12-24 18:25:30', '2019-12-24 18:25:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf16 COLLATE utf16_vietnamese_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `name`, `updated_at`, `created_at`) VALUES
(7, 'CÀ PHÊ', '2019-12-24 17:40:17', '2019-12-24 17:40:17'),
(8, 'TRÀ & MACCHIATO', '2019-12-24 17:40:44', '2019-12-24 17:40:44'),
(9, 'THỨC UỐNG ĐÁ XAY', '2019-12-24 17:41:00', '2019-12-24 17:41:00'),
(10, 'THỨC UỐNG TRÁI CÂY', '2019-12-24 17:41:12', '2019-12-24 17:41:12'),
(11, 'BÁNH & SNACK', '2019-12-24 17:41:28', '2019-12-24 17:41:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `magiamgia`
--

CREATE TABLE `magiamgia` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `min_bill` int(11) DEFAULT NULL,
  `max_discount` int(11) DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `magiamgia`
--

INSERT INTO `magiamgia` (`id`, `code`, `type`, `min_bill`, `max_discount`, `discount`, `status`, `updated_at`, `created_at`) VALUES
(1, '1', '1', 222, 100000, 10, 1, '2019-12-24 12:10:05', '2019-12-21 21:58:42'),
(2, 'merrychristmas', '1', 300, 50000, 25, 1, '2019-12-24 18:22:43', '2019-12-24 18:22:43'),
(3, 'happybirthday', '1', 333, 400000, 5, 1, '2019-12-24 18:23:05', '2019-12-24 18:23:05'),
(4, 'blackfriday', '1', 0, 100000, 50, 1, '2019-12-24 18:23:43', '2019-12-24 18:23:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ngaynghi`
--

CREATE TABLE `ngaynghi` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `month` varchar(7) NOT NULL,
  `nhanvien` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `ngaynghi`
--

INSERT INTO `ngaynghi` (`id`, `date`, `month`, `nhanvien`, `updated_at`, `created_at`) VALUES
(98, '2019-12-17', '12-2019', 2, '2019-12-24 07:30:28', '2019-12-24 07:30:28'),
(99, '2019-12-18', '12-2019', 2, '2019-12-24 07:30:28', '2019-12-24 07:30:28'),
(100, '2019-12-19', '12-2019', 2, '2019-12-24 07:30:28', '2019-12-24 07:30:28'),
(101, '2019-12-20', '12-2019', 2, '2019-12-24 07:30:28', '2019-12-24 07:30:28'),
(102, '2019-12-21', '12-2019', 2, '2019-12-24 07:30:28', '2019-12-24 07:30:28'),
(103, '2019-12-22', '12-2019', 2, '2019-12-24 07:30:28', '2019-12-24 07:30:28'),
(104, '2019-12-23', '12-2019', 2, '2019-12-24 07:32:12', '2019-12-24 07:32:12'),
(105, '2019-12-24', '12-2019', 2, '2019-12-24 07:32:12', '2019-12-24 07:32:12'),
(106, '2019-12-25', '12-2019', 2, '2019-12-24 07:32:12', '2019-12-24 07:32:12'),
(107, '2019-12-26', '12-2019', 2, '2019-12-24 07:32:12', '2019-12-24 07:32:12'),
(108, '2019-12-27', '12-2019', 2, '2019-12-24 07:32:12', '2019-12-24 07:32:12'),
(109, '2019-12-28', '12-2019', 2, '2019-12-24 07:32:12', '2019-12-24 07:32:12'),
(110, '2019-12-29', '12-2019', 2, '2019-12-24 07:32:12', '2019-12-24 07:32:12'),
(111, '2019-12-30', '12-2019', 2, '2019-12-24 07:32:12', '2019-12-24 07:32:12'),
(112, '2019-12-03', '12-2019', 2, '2019-12-24 07:33:09', '2019-12-24 07:33:09'),
(113, '2019-12-04', '12-2019', 2, '2019-12-24 07:33:09', '2019-12-24 07:33:09'),
(114, '2019-12-05', '12-2019', 2, '2019-12-24 07:33:09', '2019-12-24 07:33:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyenlieu`
--

CREATE TABLE `nguyenlieu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET ucs2 COLLATE ucs2_vietnamese_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `calculation_unit` varchar(20) CHARACTER SET ucs2 COLLATE ucs2_vietnamese_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nguyenlieu`
--

INSERT INTO `nguyenlieu` (`id`, `name`, `amount`, `calculation_unit`, `updated_at`, `created_at`) VALUES
(1, '16520337', 10, '12', '2019-12-24 13:42:23', '2019-12-23 22:53:26'),
(5, 'Cà phê', 0, 'bịch', '2019-12-24 18:20:41', '2019-12-24 18:12:43'),
(6, 'Đường', 0, 'bịch', '2019-12-24 18:19:41', '2019-12-24 18:13:00'),
(7, 'Sữa', 0, 'hộp', '2019-12-24 18:19:51', '2019-12-24 18:13:09'),
(8, 'chocolate', 0, 'thanh', '2019-12-24 18:13:29', '2019-12-24 18:13:29'),
(9, 'cam', 0, 'quả', '2019-12-24 18:13:52', '2019-12-24 18:13:52'),
(10, 'cherry', 0, 'quả', '2019-12-24 18:14:21', '2019-12-24 18:14:21'),
(11, 'dâu', 0, 'quả', '2019-12-24 18:16:30', '2019-12-24 18:16:30'),
(12, 'xoài', 0, 'quả', '2019-12-24 18:16:39', '2019-12-24 18:16:39'),
(13, 'chanh', 0, 'quả', '2019-12-24 18:16:55', '2019-12-24 18:16:55'),
(14, 'đào', 0, 'quả', '2019-12-24 18:16:58', '2019-12-24 18:16:58'),
(15, 'việt quất', 0, 'quả', '2019-12-24 18:17:24', '2019-12-24 18:17:24'),
(16, 'trứng', 0, 'quả', '2019-12-24 18:17:44', '2019-12-24 18:17:44'),
(17, 'bột trà xanh', 0, 'bịch', '2019-12-24 18:21:04', '2019-12-24 18:18:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET ucs2 COLLATE ucs2_vietnamese_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `image` varchar(100) CHARACTER SET ucs2 COLLATE ucs2_vietnamese_ci DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `identity_card_number` varchar(11) NOT NULL,
  `code_reset` varchar(100) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `salary` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `name`, `email`, `phone`, `image`, `password`, `identity_card_number`, `code_reset`, `role`, `salary`, `updated_at`, `created_at`) VALUES
(2, 'Hân 11212123123', 'nah151098@mailinator.com', '123123', '', '$2y$12$CVBg9NHnzQD71tloQ4i0I.HLFrMJtvOCVL8T4QH0pyfUcFAeTnFxe', '123', 'MZQ9S0xhrDDVVyslkCCn', 'cashier', 0, '2019-12-24 07:32:59', '2019-11-12 13:04:00'),
(3, 'Hân', 'nah1510@mailinator.com', '123213213', 'mBKn_Hân.jpg', '$2y$10$I2KXis0rvBXOxJ3YMRu6J.IXcEwwwtFxTOuU133S9IL8yjo1xxrAW', '123', '4c849e6o4cAL5m3cInFn', 'admin', 0, '2019-12-24 12:55:55', '2019-11-12 13:04:03'),
(4, 'Pham', 'nah151098@gmail.com', '0965851500', NULL, '$2y$10$01B8adH1u3yOZ1lm1VhhJu44Vc/h3aoJEAl0hxvDRwyzxVcRWPbb6', '2323', NULL, 'cashier', 123213, '2019-12-24 08:46:32', '2019-12-24 08:26:33'),
(5, 'nguyen duy', 'duyndhk@gmail.com', '01669501787', NULL, '$2y$10$myRXOSVxslh.2CbnD4jVMeBjgnzEJCfRxb0D7eXKMLaaJwoHoOerK', '025916192', NULL, 'cashier', 100000000, '2019-12-24 18:28:11', '2019-12-24 18:28:11'),
(6, 'Trần Ngọc Hải', 'haitn@gmai.com', '01669501742', NULL, '$2y$10$EpbGee1.6BlK1LY5lfBbY.JiwwtidcP0d161.iuaOllclbefVL4Qe', '123456789', NULL, 'cashier', 90000000, '2019-12-24 18:30:40', '2019-12-24 18:30:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nk_nguyenlieu`
--

CREATE TABLE `nk_nguyenlieu` (
  `id` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  `nguyenlieu` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `change_amount` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET ucs2 COLLATE ucs2_vietnamese_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(256) CHARACTER SET ucs2 COLLATE ucs2_vietnamese_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `status`, `category`, `image`, `updated_at`, `created_at`) VALUES
(12, 'AMERICANO', 39000, 1, 7, 'Q_AMERICANO.webp', '2019-12-24 17:42:43', '2019-12-24 17:42:43'),
(13, 'BẠC XỈU', 29000, 1, 7, 'X_BẠC XỈU.webp', '2019-12-24 17:43:24', '2019-12-24 17:43:24'),
(14, 'CÀ PHÊ ĐEN', 29000, 1, 7, 'S_CÀ PHÊ ĐEN.webp', '2019-12-24 17:43:57', '2019-12-24 17:43:57'),
(15, 'COLD BREW CAM SẢ', 45000, 1, 7, 'M_COLD BREW CAM SẢ.webp', '2019-12-24 17:47:37', '2019-12-24 17:47:37'),
(16, 'COLD BREW PHÚC BỒN TỬ', 50000, 1, 7, 'o_COLD BREW PHÚC BỒN TỬ.webp', '2019-12-24 17:48:02', '2019-12-24 17:48:02'),
(17, 'COLD BREW SỮA TƯƠI', 50000, 1, 7, 'u_COLD BREW SỮA TƯƠI.webp', '2019-12-24 17:48:25', '2019-12-24 17:48:25'),
(18, 'COLD BREW TRUYỀN THỐNG', 45000, 1, 7, 'Y_COLD BREW TRUYỀN THỐNG.webp', '2019-12-24 17:49:51', '2019-12-24 17:49:51'),
(19, 'ESPRESSO', 35000, 1, 7, 'w_ESPRESSO.webp', '2019-12-24 17:50:07', '2019-12-24 17:50:07'),
(20, 'LATTE', 45000, 1, 7, 'R_LATTE.webp', '2019-12-24 17:51:38', '2019-12-24 17:51:38'),
(21, 'MOCHA', 49000, 1, 7, 'I_MOCHA.webp', '2019-12-24 17:51:52', '2019-12-24 17:51:52'),
(22, 'SÔ-CÔ-LA ĐÁ', 50000, 1, 7, 'x_SÔ-CÔ-LA ĐÁ.webp', '2019-12-24 17:52:13', '2019-12-24 17:52:13'),
(23, 'CHERRY MACCHIATO', 55000, 1, 8, 'c_CHERRY MACCHIATO.webp', '2019-12-24 17:55:44', '2019-12-24 17:55:44'),
(24, 'TRÀ ĐÀO CAM SẢ', 45000, 1, 8, 'E_TRÀ ĐÀO CAM SẢ.webp', '2019-12-24 18:09:11', '2019-12-24 17:56:01'),
(25, 'TRÀ ĐEN MACCHIATO', 42000, 1, 8, '3_TRÀ ĐEN MACCHIATO.webp', '2019-12-24 18:08:42', '2019-12-24 17:56:24'),
(26, 'TRÀ XOÀI MACCHIATO', 55000, 1, 8, 'G_TRÀ XOÀI MACCHIATO.jpg', '2019-12-24 17:57:18', '2019-12-24 17:57:18'),
(27, 'CHANH XẢ ĐÁ XAY', 45000, 1, 9, 'y_CHANH XẢ ĐÁ XAY.webp', '2019-12-24 17:59:03', '2019-12-24 17:59:03'),
(28, 'CHOCOLATE ĐÁ XAY', 50000, 1, 9, 'z_CHOCOLATE ĐÁ XAY.webp', '2019-12-24 18:01:27', '2019-12-24 17:59:23'),
(29, 'COOKIES ĐÁ XAY', 52000, 1, 9, '0_COOKIES ĐÁ XAY.webp', '2019-12-24 17:59:45', '2019-12-24 17:59:45'),
(30, 'MATCHA ĐÁ XAY', 42000, 1, 9, 'f_MATCHA ĐÁ XAY.webp', '2019-12-24 18:00:17', '2019-12-24 18:00:17'),
(31, 'SINH TỐ CAM XOÀI', 59000, 1, 10, '1_SINH TỐ CAM XOÀI.webp', '2019-12-24 18:03:04', '2019-12-24 18:03:04'),
(32, 'SINH TỐ VIỆT QUẤT', 59000, 1, 10, '6_SINH TỐ VIỆT QUẤT.webp', '2019-12-24 18:03:29', '2019-12-24 18:03:29'),
(33, 'BÁNH GẤU CHOCOLATE', 25000, 1, 11, 'E_BÁNH GẤU CHOCOLATE.webp', '2019-12-24 18:05:12', '2019-12-24 18:05:12'),
(34, 'BÁNH CHOCOLATE', 32000, 1, 11, 'M_BÁNH CHOCOLATE.webp', '2019-12-24 18:05:28', '2019-12-24 18:05:28'),
(35, 'BÁNH MATCHA', 28000, 1, 11, '4_BÁNH MATCHA.webp', '2019-12-24 18:05:45', '2019-12-24 18:05:45'),
(36, 'BÁNH TIRAMISU', 26000, 1, 11, 'Y_BÁNH TIRAMISU.webp', '2019-12-24 18:06:03', '2019-12-24 18:06:03'),
(37, 'TRÀ MATCHA LATTE', 54000, 1, 8, 'P_TRÀ MATCHA LATTE.webp', '2019-12-24 18:07:08', '2019-12-24 18:07:08'),
(38, 'TRÀ XOÀI MACCHIATO', 50000, 1, 8, '4_TRÀ XOÀI MACCHIATO.jpg', '2019-12-24 18:07:48', '2019-12-24 18:07:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(1) NOT NULL,
  `activation_key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `activation_key`) VALUES
(1, 'nah151098@gmail.com', '123', 1, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `TP_NV` (`staff`);

--
-- Chỉ mục cho bảng `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoadon` (`hoadon`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `HD_KH` (`khachhang`),
  ADD KEY `HD_NV` (`nhanvien`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `ngaynghi`
--
ALTER TABLE `ngaynghi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NN_NV` (`nhanvien`);

--
-- Chỉ mục cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `nk_nguyenlieu`
--
ALTER TABLE `nk_nguyenlieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NK_NL` (`nguyenlieu`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaisanpham_id` (`category`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ngaynghi`
--
ALTER TABLE `ngaynghi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nk_nguyenlieu`
--
ALTER TABLE `nk_nguyenlieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bonus`
--
ALTER TABLE `bonus`
  ADD CONSTRAINT `TP_NV` FOREIGN KEY (`staff`) REFERENCES `nhanvien` (`id`);

--
-- Các ràng buộc cho bảng `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  ADD CONSTRAINT `ct_hoadon_ibfk_1` FOREIGN KEY (`hoadon`) REFERENCES `hoadon` (`id`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `HD_KH` FOREIGN KEY (`khachhang`) REFERENCES `khachhang` (`id`),
  ADD CONSTRAINT `HD_NV` FOREIGN KEY (`nhanvien`) REFERENCES `nhanvien` (`id`);

--
-- Các ràng buộc cho bảng `ngaynghi`
--
ALTER TABLE `ngaynghi`
  ADD CONSTRAINT `NN_NV` FOREIGN KEY (`nhanvien`) REFERENCES `nhanvien` (`id`);

--
-- Các ràng buộc cho bảng `nk_nguyenlieu`
--
ALTER TABLE `nk_nguyenlieu`
  ADD CONSTRAINT `NK_NL` FOREIGN KEY (`nguyenlieu`) REFERENCES `nguyenlieu` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`category`) REFERENCES `loaisanpham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
