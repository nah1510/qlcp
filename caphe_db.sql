-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 23, 2019 lúc 01:05 PM
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
  `info` varchar(100) NOT NULL,
  `bonus` int(1) NOT NULL,
  `staff` int(11) NOT NULL,
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
  `sanpham` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `ct_hoadon`
--

INSERT INTO `ct_hoadon` (`id`, `hoadon`, `sanpham`, `unit_price`, `amount`, `price`, `updated_at`, `created_at`) VALUES
(3, 35, 4, 123213, 2, 246426, '2019-12-12 13:48:18', '2019-12-12 13:48:18'),
(4, 36, 4, 123213, 4, 492852, '2019-12-12 13:48:21', '2019-12-12 13:48:21'),
(5, 37, 7, 500000, 2, 1000000, '2019-12-12 13:49:04', '2019-12-12 13:49:04'),
(6, 38, 2, 500000, 1, 500000, '2019-12-12 15:16:25', '2019-12-12 15:16:25'),
(7, 38, 3, 123, 1, 123, '2019-12-12 15:16:25', '2019-12-12 15:16:25'),
(8, 38, 4, 123213, 1, 123213, '2019-12-12 15:16:25', '2019-12-12 15:16:25'),
(9, 39, 2, 500000, 6, 3000000, '2019-12-12 15:17:25', '2019-12-12 15:17:25'),
(10, 39, 4, 123213, 3, 369639, '2019-12-12 15:17:25', '2019-12-12 15:17:25'),
(11, 40, 2, 500000, 2, 1000000, '2019-12-12 15:19:45', '2019-12-12 15:19:45'),
(12, 41, 1, 500000, 3, 1500000, '2019-12-12 15:19:57', '2019-12-12 15:19:57'),
(13, 42, 1, 500000, 2, 1000000, '2019-12-12 15:23:29', '2019-12-12 15:23:29'),
(14, 42, 2, 500000, 3, 1500000, '2019-12-12 15:23:29', '2019-12-12 15:23:29'),
(15, 42, 3, 123, 1, 123, '2019-12-12 15:23:29', '2019-12-12 15:23:29'),
(16, 43, 6, 123123, 1, 123123, '2019-12-12 15:26:35', '2019-12-12 15:26:35'),
(17, 44, 6, 123123, 3, 369369, '2019-12-12 15:27:50', '2019-12-12 15:27:50'),
(18, 45, 1, 500000, 3, 1500000, '2019-12-12 15:28:31', '2019-12-12 15:28:31'),
(19, 46, 4, 123213, 2, 246426, '2019-12-12 15:38:19', '2019-12-12 15:38:19'),
(20, 46, 7, 500000, 3, 1500000, '2019-12-12 15:38:19', '2019-12-12 15:38:19'),
(21, 47, 4, 123213, 1, 123213, '2019-12-12 15:38:23', '2019-12-12 15:38:23'),
(22, 47, 3, 123, 1, 123, '2019-12-12 15:38:23', '2019-12-12 15:38:23'),
(23, 48, 2, 500000, 2, 1000000, '2019-12-12 15:47:06', '2019-12-12 15:47:06'),
(24, 48, 3, 123, 1, 123, '2019-12-12 15:47:06', '2019-12-12 15:47:06'),
(25, 48, 4, 123213, 1, 123213, '2019-12-12 15:47:06', '2019-12-12 15:47:06'),
(26, 48, 11, 123123, 1, 123123, '2019-12-12 15:47:06', '2019-12-12 15:47:06'),
(27, 49, 4, 123213, 3, 369639, '2019-12-12 15:47:13', '2019-12-12 15:47:13'),
(28, 49, 3, 123, 1, 123, '2019-12-12 15:47:13', '2019-12-12 15:47:13'),
(29, 49, 11, 123123, 1, 123123, '2019-12-12 15:47:13', '2019-12-12 15:47:13'),
(30, 50, 3, 123, 2, 246, '2019-12-12 15:54:22', '2019-12-12 15:54:22'),
(31, 51, 4, 123213, 2, 246426, '2019-12-12 15:55:08', '2019-12-12 15:55:08'),
(32, 52, 4, 123213, 3, 369639, '2019-12-12 15:56:20', '2019-12-12 15:56:20'),
(33, 53, 3, 123, 7, 861, '2019-12-13 02:49:48', '2019-12-13 02:49:48'),
(34, 53, 4, 123213, 5, 616065, '2019-12-13 02:49:48', '2019-12-13 02:49:48'),
(35, 53, 11, 123123, 2, 246246, '2019-12-13 02:49:48', '2019-12-13 02:49:48'),
(36, 53, 10, 213213, 1, 213213, '2019-12-13 02:49:48', '2019-12-13 02:49:48'),
(37, 54, 3, 123, 3, 369, '2019-12-13 08:27:13', '2019-12-13 08:27:13'),
(38, 54, 4, 123213, 3, 369639, '2019-12-13 08:27:13', '2019-12-13 08:27:13'),
(39, 55, 2, 500000, 2, 1000000, '2019-12-13 09:40:57', '2019-12-13 09:40:57'),
(40, 56, 2, 500000, 4, 2000000, '2019-12-13 09:41:14', '2019-12-13 09:41:14'),
(41, 57, 2, 500000, 6, 3000000, '2019-12-13 09:42:29', '2019-12-13 09:42:29'),
(42, 57, 3, 123, 1, 123, '2019-12-13 09:42:29', '2019-12-13 09:42:29'),
(43, 57, 4, 123213, 1, 123213, '2019-12-13 09:42:29', '2019-12-13 09:42:29'),
(44, 58, 2, 500000, 2, 1000000, '2019-12-13 09:43:10', '2019-12-13 09:43:10'),
(45, 59, 2, 500000, 3, 1500000, '2019-12-13 09:43:44', '2019-12-13 09:43:44'),
(46, 60, 2, 500000, 2, 1000000, '2019-12-13 09:44:04', '2019-12-13 09:44:04'),
(47, 61, 4, 123213, 3, 369639, '2019-12-18 06:59:47', '2019-12-18 06:59:47'),
(48, 62, 4, 123213, 6, 739278, '2019-12-18 06:59:47', '2019-12-18 06:59:47'),
(49, 61, 3, 123, 2, 246, '2019-12-18 06:59:47', '2019-12-18 06:59:47'),
(50, 62, 3, 123, 2, 246, '2019-12-18 06:59:47', '2019-12-18 06:59:47'),
(51, 63, 4, 123213, 6, 739278, '2019-12-18 06:59:57', '2019-12-18 06:59:57'),
(52, 64, 4, 123213, 4, 492852, '2019-12-19 20:11:44', '2019-12-19 20:11:44'),
(53, 65, 3, 123, 2, 246, '2019-12-19 20:33:32', '2019-12-19 20:33:32'),
(54, 65, 8, 500000, 2, 1000000, '2019-12-19 20:33:32', '2019-12-19 20:33:32'),
(55, 65, 7, 500000, 1, 500000, '2019-12-19 20:33:32', '2019-12-19 20:33:32'),
(56, 65, 4, 123213, 1, 123213, '2019-12-19 20:33:32', '2019-12-19 20:33:32'),
(57, 66, 4, 123213, 4, 492852, '2019-12-21 18:26:55', '2019-12-21 18:26:55'),
(58, 66, 3, 123, 3, 369, '2019-12-21 18:26:55', '2019-12-21 18:26:55'),
(59, 66, 2, 500000, 1, 500000, '2019-12-21 18:26:55', '2019-12-21 18:26:55'),
(60, 67, 3, 123, 2, 246, '2019-12-21 18:27:28', '2019-12-21 18:27:28'),
(61, 67, 4, 123213, 2, 246426, '2019-12-21 18:27:29', '2019-12-21 18:27:29'),
(62, 67, 7, 500000, 1, 500000, '2019-12-21 18:27:29', '2019-12-21 18:27:29'),
(63, 67, 6, 123123, 1, 123123, '2019-12-21 18:27:29', '2019-12-21 18:27:29'),
(64, 67, 8, 500000, 2, 1000000, '2019-12-21 18:27:29', '2019-12-21 18:27:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `khachhang` int(11) DEFAULT NULL,
  `nhanvien` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `khachhang`, `nhanvien`, `price`, `updated_at`, `created_at`) VALUES
(35, NULL, 2, 246426, '2019-12-19 20:22:13', '2019-12-12 13:48:18'),
(36, NULL, 2, 492852, '2019-12-19 20:22:13', '2019-12-12 13:48:21'),
(37, NULL, 2, 1000000, '2019-12-19 20:22:13', '2019-12-12 13:49:04'),
(38, NULL, 2, 623336, '2019-12-19 20:22:13', '2019-12-12 15:16:25'),
(39, NULL, 2, 3369639, '2019-12-19 20:22:13', '2019-12-12 15:17:25'),
(40, NULL, 2, 1000000, '2019-12-19 20:22:13', '2019-12-12 15:19:45'),
(41, NULL, 2, 1500000, '2019-12-19 20:22:13', '2019-12-12 15:19:57'),
(42, NULL, 2, 2500123, '2019-12-19 20:22:13', '2019-12-12 15:23:29'),
(43, NULL, 2, 123123, '2019-12-19 20:22:13', '2019-12-12 15:26:34'),
(44, NULL, 2, 369369, '2019-12-19 20:22:13', '2019-12-12 15:27:50'),
(45, NULL, 2, 1500000, '2019-12-19 20:22:13', '2019-12-12 15:28:31'),
(46, NULL, 2, 1746426, '2019-12-19 20:22:13', '2019-12-12 15:38:19'),
(47, NULL, 2, 123336, '2019-12-19 20:22:13', '2019-12-12 15:38:23'),
(48, NULL, 2, 1246459, '2019-12-19 20:22:13', '2019-12-12 15:47:06'),
(49, NULL, 2, 492885, '2019-12-19 20:22:13', '2019-12-12 15:47:12'),
(50, NULL, 2, 246, '2019-12-19 20:22:13', '2019-12-12 15:54:22'),
(51, NULL, 2, 246426, '2019-12-19 20:22:13', '2019-12-12 15:55:08'),
(52, NULL, 2, 369639, '2019-12-19 20:22:13', '2019-12-12 15:56:20'),
(53, NULL, 2, 1076385, '2019-12-19 20:22:13', '2019-12-13 02:49:48'),
(54, NULL, 2, 370008, '2019-12-19 20:22:13', '2019-12-13 08:27:12'),
(55, 1, 2, 1000000, '2019-12-19 20:22:13', '2019-12-13 09:40:57'),
(56, NULL, 2, 2000000, '2019-12-19 20:22:13', '2019-12-13 09:41:14'),
(57, NULL, 2, 3123336, '2019-12-19 20:22:13', '2019-12-13 09:42:29'),
(58, NULL, 2, 1000000, '2019-12-19 20:22:13', '2019-12-13 09:43:10'),
(59, NULL, 2, 1500000, '2019-12-19 20:22:13', '2019-12-13 09:43:44'),
(60, 1, 2, 1000000, '2019-12-19 20:22:13', '2019-12-13 09:44:04'),
(61, NULL, 2, 369885, '2019-12-19 20:22:13', '2019-12-18 06:59:47'),
(62, NULL, 2, 739524, '2019-12-19 20:22:13', '2019-12-18 06:59:47'),
(63, NULL, 2, 739278, '2019-12-19 20:22:13', '2019-12-18 06:59:57'),
(64, NULL, 2, 492852, '2019-12-19 20:22:13', '2019-12-19 20:11:43'),
(65, NULL, 3, 1623459, '2019-12-19 20:33:32', '2019-12-19 20:33:32'),
(66, 1, 3, 993221, '2019-12-21 18:26:55', '2019-12-21 18:26:55'),
(67, 1, 3, 1869795, '2019-12-21 18:27:28', '2019-12-21 18:27:28');

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
(1, 'Phạm Bảo Hân', '1', 'test@gmail.com', 18698, '2019-12-21 18:27:28', '2019-12-09 02:07:26');

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
(1, 'Cà phê ', '2019-12-10 12:05:46', '2019-12-08 14:27:45'),
(2, 'Sinh tố', '2019-12-08 23:10:24', '2019-12-08 14:35:02'),
(5, 'Nước ép', '2019-12-10 12:05:53', '2019-12-09 02:36:31'),
(6, 'Nước Giải Khát', '2019-12-10 12:06:03', '2019-12-09 02:38:02');

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
(1, '123213', '1', 222, 1, 2323, 1, '2019-12-21 22:30:07', '2019-12-21 21:58:42');

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
(63, '2019-12-17', '12-2019', 2, '2019-12-23 10:26:57', '2019-12-23 10:26:57'),
(64, '2019-12-18', '12-2019', 3, '2019-12-23 10:37:37', '2019-12-23 10:26:57'),
(65, '2019-12-19', '12-2019', 2, '2019-12-23 10:26:57', '2019-12-23 10:26:57');

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
(2, 'Hân', 'nah151098@mailinator.com', '', '', '$2y$12$CVBg9NHnzQD71tloQ4i0I.HLFrMJtvOCVL8T4QH0pyfUcFAeTnFxe', '123', 'MZQ9S0xhrDDVVyslkCCn', 'admin', 0, '2019-12-22 21:53:54', '2019-11-12 13:04:00'),
(3, 'Hân', 'nah1510@mailinator.com', '', 'MBnb_Hân.jpg', '$2y$10$uQirrJgiokoA88tDMcE7kua3.Fx9g9wNsyTg0yjyULhLKbxNTtUFC', '123', 'SOTCaY985dOkUUwNeLCQ', 'cashier', 0, '2019-12-22 23:31:36', '2019-11-12 13:04:03');

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
(1, '16520337', 500000, 1, 6, '1380_123.jpg', '2019-12-23 09:12:55', '2019-12-10 16:17:28'),
(2, '16520337', 500000, 1, 1, '1380_123.jpg', '2019-12-12 10:34:26', '2019-12-10 16:18:48'),
(3, '123', 123, 1, 1, '1380_123.jpg', '2019-12-11 08:45:17', '2019-12-10 16:29:33'),
(4, '12312', 123213, 1, 6, '1380_123.jpg', '2019-12-12 14:10:24', '2019-12-10 16:29:39'),
(5, '123213', 123123, 1, 1, '1380_123.jpg', '2019-12-12 10:34:26', '2019-12-10 16:29:45'),
(6, '123213', 123123, 1, 5, '1380_123.jpg', '2019-12-12 14:10:20', '2019-12-10 16:29:52'),
(7, '16520337', 500000, 1, 2, '1380_123.jpg', '2019-12-12 10:34:26', '2019-12-11 08:14:03'),
(8, '123', 500000, 1, 1, '1380_123.jpg', '2019-12-12 10:34:26', '2019-12-11 08:15:38'),
(9, '123', 123123, 1, 1, '1380_123.jpg', '2019-12-12 10:34:26', '2019-12-11 08:15:44'),
(10, '123', 213213, 1, 1, '1380_123.jpg', '2019-12-12 10:34:26', '2019-12-11 08:15:50'),
(11, '16520337', 123123, 1, 1, '1380_123.jpg', '2019-12-12 10:34:26', '2019-12-11 08:15:58');

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
  ADD KEY `hoadon` (`hoadon`),
  ADD KEY `sanpham` (`sanpham`);

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
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `ngaynghi`
--
ALTER TABLE `ngaynghi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  ADD CONSTRAINT `ct_hoadon_ibfk_1` FOREIGN KEY (`hoadon`) REFERENCES `hoadon` (`id`),
  ADD CONSTRAINT `ct_hoadon_ibfk_2` FOREIGN KEY (`sanpham`) REFERENCES `sanpham` (`id`);

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
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`category`) REFERENCES `loaisanpham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
