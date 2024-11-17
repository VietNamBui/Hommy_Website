-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 08:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `chuduan`
--

CREATE TABLE `chuduan` (
  `maChuDuAn` int(11) NOT NULL,
  `tenCDA` varchar(50) NOT NULL,
  `soDT` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `maTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `duan`
--

CREATE TABLE `duan` (
  `maDA` int(11) NOT NULL,
  `tenDA` varchar(50) NOT NULL,
  `diaChiDA` varchar(50) NOT NULL,
  `giaThue` varchar(100) NOT NULL,
  `hoaHong` varchar(100) NOT NULL,
  `ngayTao` date NOT NULL,
  `ngayXacThuc` date DEFAULT NULL,
  `maChuDuAn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goithanhvien`
--

CREATE TABLE `goithanhvien` (
  `maGoi` int(11) NOT NULL,
  `tenGoi` varchar(50) NOT NULL,
  `cacTinhNang` varchar(50) NOT NULL,
  `gia` float NOT NULL,
  `moTa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `goithanhvien`
--

INSERT INTO `goithanhvien` (`maGoi`, `tenGoi`, `cacTinhNang`, `gia`, `moTa`) VALUES
(1, 'VIP 1', 'Gói VIP1', 199, 'Truy cập không giới hạn\r\nƯu đãi đặc biệt hàng thán'),
(2, 'VIP 2', 'VIP 2', 399, 'Truy cập không giới hạn\r\nƯu đãi đặc biệt hàng tuần'),
(3, 'VIP 3', 'VIP 3', 599, 'Truy cập không giới hạn\r\nƯu đãi đặc biệt hàng ngày');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `maKH` int(11) NOT NULL,
  `tenKH` varchar(20) NOT NULL,
  `soDT` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `maTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaitk`
--

CREATE TABLE `loaitk` (
  `maLoai` int(11) NOT NULL,
  `Loai` varchar(50) NOT NULL,
  `Mota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `loaitk`
--

INSERT INTO `loaitk` (`maLoai`, `Loai`, `Mota`) VALUES
(1, 'Khách hàng', ''),
(2, 'Chủ dự án', ''),
(3, 'Nhân viên môi giới', ''),
(4, 'Nhân viên điều hành', ''),
(5, 'Quản trị hệ thống', '');

-- --------------------------------------------------------

--
-- Table structure for table `nhanviendieuhanh`
--

CREATE TABLE `nhanviendieuhanh` (
  `maNVDH` int(11) NOT NULL,
  `tenNVDH` varchar(50) NOT NULL,
  `soDT` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `maTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvienmoigioi`
--

CREATE TABLE `nhanvienmoigioi` (
  `maNVMG` int(11) NOT NULL,
  `tenNVMG` varchar(50) NOT NULL,
  `soDT` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `maTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quantrihethong`
--

CREATE TABLE `quantrihethong` (
  `maAdmin` int(11) NOT NULL,
  `tenAdmin` varchar(50) NOT NULL,
  `soDT` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `maTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `maTK` int(11) NOT NULL,
  `tenTK` varchar(50) NOT NULL,
  `matKhau` varchar(50) NOT NULL,
  `maGoi` int(11) NOT NULL,
  `maLoai` int(11) NOT NULL,
  `ngayTao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chuduan`
--
ALTER TABLE `chuduan`
  ADD PRIMARY KEY (`maChuDuAn`),
  ADD KEY `maTK` (`maTK`);

--
-- Indexes for table `duan`
--
ALTER TABLE `duan`
  ADD PRIMARY KEY (`maDA`),
  ADD KEY `maCDA` (`maChuDuAn`);

--
-- Indexes for table `goithanhvien`
--
ALTER TABLE `goithanhvien`
  ADD PRIMARY KEY (`maGoi`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`maKH`),
  ADD KEY `maTK` (`maTK`);

--
-- Indexes for table `loaitk`
--
ALTER TABLE `loaitk`
  ADD PRIMARY KEY (`maLoai`);

--
-- Indexes for table `nhanviendieuhanh`
--
ALTER TABLE `nhanviendieuhanh`
  ADD PRIMARY KEY (`maNVDH`),
  ADD KEY `maTK` (`maTK`);

--
-- Indexes for table `nhanvienmoigioi`
--
ALTER TABLE `nhanvienmoigioi`
  ADD PRIMARY KEY (`maNVMG`),
  ADD KEY `maTK` (`maTK`);

--
-- Indexes for table `quantrihethong`
--
ALTER TABLE `quantrihethong`
  ADD PRIMARY KEY (`maAdmin`),
  ADD KEY `maTK` (`maTK`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`maTK`),
  ADD KEY `maGoi` (`maGoi`),
  ADD KEY `loaiTK` (`maLoai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chuduan`
--
ALTER TABLE `chuduan`
  MODIFY `maChuDuAn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `duan`
--
ALTER TABLE `duan`
  MODIFY `maDA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goithanhvien`
--
ALTER TABLE `goithanhvien`
  MODIFY `maGoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `maKH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaitk`
--
ALTER TABLE `loaitk`
  MODIFY `maLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nhanviendieuhanh`
--
ALTER TABLE `nhanviendieuhanh`
  MODIFY `maNVDH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhanvienmoigioi`
--
ALTER TABLE `nhanvienmoigioi`
  MODIFY `maNVMG` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quantrihethong`
--
ALTER TABLE `quantrihethong`
  MODIFY `maAdmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `maTK` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chuduan`
--
ALTER TABLE `chuduan`
  ADD CONSTRAINT `chuduan_ibfk_1` FOREIGN KEY (`maTK`) REFERENCES `taikhoan` (`maTK`);

--
-- Constraints for table `duan`
--
ALTER TABLE `duan`
  ADD CONSTRAINT `duan_ibfk_1` FOREIGN KEY (`maChuDuAn`) REFERENCES `chuduan` (`maChuDuAn`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`maTK`) REFERENCES `taikhoan` (`maTK`);

--
-- Constraints for table `nhanviendieuhanh`
--
ALTER TABLE `nhanviendieuhanh`
  ADD CONSTRAINT `nhanviendieuhanh_ibfk_1` FOREIGN KEY (`maTK`) REFERENCES `taikhoan` (`maTK`);

--
-- Constraints for table `nhanvienmoigioi`
--
ALTER TABLE `nhanvienmoigioi`
  ADD CONSTRAINT `nhanvienmoigioi_ibfk_1` FOREIGN KEY (`maTK`) REFERENCES `taikhoan` (`maTK`);

--
-- Constraints for table `quantrihethong`
--
ALTER TABLE `quantrihethong`
  ADD CONSTRAINT `quantrihethong_ibfk_1` FOREIGN KEY (`maTK`) REFERENCES `taikhoan` (`maTK`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`maGoi`) REFERENCES `goithanhvien` (`maGoi`),
  ADD CONSTRAINT `taikhoan_ibfk_2` FOREIGN KEY (`maLoai`) REFERENCES `loaitk` (`maLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;