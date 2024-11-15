-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 08:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hommy_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `goithanhvien`
--

CREATE TABLE `goithanhvien` (
  `maGoi` varchar(1000) NOT NULL,
  `tenGoi` varchar(1000) NOT NULL,
  `moTa` varchar(1000) NOT NULL,
  `gia` float NOT NULL,
  `cacTinhNang` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goithanhvien`
--

INSERT INTO `goithanhvien` (`maGoi`, `tenGoi`, `moTa`, `gia`, `cacTinhNang`) VALUES
('VIP1', 'VIP 1', 'Gói VIP1', 199, 'Truy cập không giới hạn\r\nƯu đãi đặc biệt hàng tháng\r\nHỗ trợ 24/7'),
('VIP2', 'VIP 2', 'VIP 2', 399, 'Truy cập không giới hạn\r\nƯu đãi đặc biệt hàng tuần\r\nHỗ trợ ưu tiên 24/7\r\nTặng quà sinh nhật'),
('VIP3', 'VIP 3', 'VIP 3', 599, 'Truy cập không giới hạn\r\nƯu đãi đặc biệt hàng ngày\r\nHỗ trợ VIP 24/7\r\nTặng quà sinh nhật & kỷ niệm\r\nTham gia sự kiện đặc biệt');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoannguoidung`
--

CREATE TABLE `taikhoannguoidung` (
  `maTaiKhoan` varchar(1000) NOT NULL,
  `tenTaiKhoan` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `trangThai` tinyint(1) NOT NULL,
  `maGoiThanhVien` varchar(1000) NOT NULL,
  `thoiGianSuDungGoi` date NOT NULL,
  `ngayTao` date NOT NULL,
  `ngayCapNhatGoi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
