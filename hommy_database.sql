-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 09:40 AM
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

--
-- Dumping data for table `chuduan`
--

INSERT INTO `chuduan` (`maChuDuAn`, `tenCDA`, `soDT`, `email`, `diaChi`, `maTK`) VALUES
(7, 'Nguyễn Trọng Phú', '0869761738', 'dsdsdsdsds', 'sdsdsds', 2);

-- --------------------------------------------------------

--
-- Table structure for table `chungcu`
--

CREATE TABLE `chungcu` (
  `maCC` int(11) NOT NULL,
  `maCan` varchar(1000) NOT NULL,
  `soPhongNgu` varchar(1000) NOT NULL,
  `soNhaVS` varchar(1000) NOT NULL,
  `phapLy` varchar(1000) NOT NULL,
  `maDA` int(11) NOT NULL,
  `block` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `chungcu`
--

INSERT INTO `chungcu` (`maCC`, `maCan`, `soPhongNgu`, `soNhaVS`, `phapLy`, `maDA`, `block`) VALUES
(4, '123', '2', '2', 'Giấy chứng nhận quyền sở hữu nhà', 148, '2');

-- --------------------------------------------------------

--
-- Table structure for table `danhsachduanyeuthich`
--

CREATE TABLE `danhsachduanyeuthich` (
  `STT` int(11) NOT NULL,
  `maKH` int(11) DEFAULT NULL,
  `maDuAn` int(11) DEFAULT NULL,
  `tenDA` varchar(1000) DEFAULT NULL,
  `diaChiDA` varchar(1000) DEFAULT NULL,
  `giaThue` varchar(1000) DEFAULT NULL,
  `maLoaiDA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `duan`
--

CREATE TABLE `duan` (
  `maDA` int(11) NOT NULL,
  `tenDA` varchar(1000) NOT NULL,
  `diaChiDA` varchar(1000) NOT NULL,
  `giaThue` varchar(1000) NOT NULL,
  `hoaHong` varchar(1000) NOT NULL,
  `ngayTao` datetime NOT NULL,
  `ngayXacThuc` datetime DEFAULT NULL,
  `maChuDuAn` int(11) NOT NULL,
  `tienCoc` varchar(100) NOT NULL,
  `maLoaiDA` int(11) NOT NULL,
  `hinhAnh` varchar(1000) NOT NULL,
  `trangThaiDuyet` int(11) NOT NULL,
  `trangThaiThue` int(11) NOT NULL,
  `dienTich` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `duan`
--

INSERT INTO `duan` (`maDA`, `tenDA`, `diaChiDA`, `giaThue`, `hoaHong`, `ngayTao`, `ngayXacThuc`, `maChuDuAn`, `tienCoc`, `maLoaiDA`, `hinhAnh`, `trangThaiDuyet`, `trangThaiThue`, `dienTich`) VALUES
(148, 'ecopack111', '456/67, Lê Văn Sĩ, Phường 10, Quận Bình Thạnh, Hồ Chí Minh', '12', '50%', '2024-11-22 18:49:06', '2024-11-22 18:49:06', 7, '12', 3, '165_Screenshot 2024-11-05 114401.png', 1, 1, '123'),
(149, 'Lalaland-Ocean111-111', '456/67331, Lê Văn Sĩ vvv111, Phường 10, Quận 6, Hà Nội', '1200000000001', '40%', '2024-11-22 18:52:41', '2024-11-22 18:52:41', 7, '1200000000001', 1, '806_Screenshot 2024-11-05 112316.png', 1, 1, '1231'),
(150, 'Plalace kim', '456/6733, Hồ Huy, Phường 7, Quận 3, Bình Dương', '1200000044', '50%', '2024-11-22 18:55:54', '2024-11-22 18:55:54', 7, '1200000044', 2, '883_Screenshot 2024-11-11 151714.png', 1, 1, '1234'),
(151, 'lanmak8111', '456/67, Lê Văn Sĩ, Phường 12, Quận Bình Thạnh, Hồ Chí Minh', '12000000', '40%', '2024-11-22 19:14:44', '2024-11-22 19:14:44', 7, '12000000', 2, '620_cach-ve-ngoi-nha-dep-cho-be-lop-6.jpg', 1, 1, '123'),
(152, 'lanmak8111111', '456/67, Lê Văn Sĩ, Phường 2, Quận Phú Nhuận, Hồ Chí Minh', '12000000', '30%', '2024-11-22 19:21:40', '2024-11-22 19:21:40', 7, '12000000', 2, '341_cach-ve-ngoi-nha-dep-cho-be-lop-6.jpg', 1, 2, '123'),
(153, 'lanmak8111111fffff', '456/67, Lê Văn Sĩ, Phường 8, Quận Bình Thạnh, Hồ Chí Minh', '12000000', '30%', '2024-11-22 19:21:59', '2024-11-22 19:21:59', 7, '12000000', 2, '771_cach-ve-ngoi-nha-dep-cho-be-lop-6.jpg', 3, 1, '123'),
(154, 'lanmak8111111fffff111', '456/67, Lê Văn Sĩ, Phường 9, Quận Gò Vấp, Hồ Chí Minh', '12000000', '30%', '2024-11-22 19:22:16', '2024-11-22 19:22:16', 7, '12000000', 2, '555_cach-ve-ngoi-nha-dep-cho-be-lop-6.jpg', 2, 1, '123'),
(155, 'lanmak8-Cao oc', '456/67, Lê Văn Sĩ, Phường 10, Quận Bình Thạnh, Hồ Chí Minh', '12000000', '30%', '2024-11-23 15:45:38', '2024-11-23 15:45:38', 7, '12000000', 2, '742_cach-ve-ngoi-nha-dep-cho-be-lop-6.jpg', 1, 1, '222');

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
-- Table structure for table `loaiduan`
--

CREATE TABLE `loaiduan` (
  `maLoaiDA` int(11) NOT NULL,
  `tenLoai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `loaiduan`
--

INSERT INTO `loaiduan` (`maLoaiDA`, `tenLoai`) VALUES
(1, 'Nhà ở'),
(2, 'Phòng Trọ'),
(3, 'Chung cư');

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
-- Table structure for table `nhao`
--

CREATE TABLE `nhao` (
  `maNO` int(11) NOT NULL,
  `loaiNha` varchar(1000) NOT NULL,
  `soPhongNgu` varchar(1000) NOT NULL,
  `soNhaVS` varchar(1000) NOT NULL,
  `huongCua` varchar(100) NOT NULL,
  `phapLy` varchar(100) NOT NULL,
  `maDA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `nhao`
--

INSERT INTO `nhao` (`maNO`, `loaiNha`, `soPhongNgu`, `soNhaVS`, `huongCua`, `phapLy`, `maDA`) VALUES
(9, 'Biệt thự', '21', '21', 'Bắc', 'Giấy phép xây dựng', 149);

-- --------------------------------------------------------

--
-- Table structure for table `phongtro`
--

CREATE TABLE `phongtro` (
  `maPhongTro` int(11) NOT NULL,
  `noiThat` varchar(1000) NOT NULL,
  `maDA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `phongtro`
--

INSERT INTO `phongtro` (`maPhongTro`, `noiThat`, `maDA`) VALUES
(27, 'Đầy đủ nội thất', 146),
(28, 'Phòng trống', 150),
(29, 'Phòng trống', 151),
(30, 'Đầy đủ nội thất', 152),
(31, 'Đầy đủ nội thất', 153),
(32, 'Đầy đủ nội thất', 154),
(33, 'Phòng trống', 155);

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
  `maGoi` int(11) DEFAULT NULL,
  `maLoai` int(11) NOT NULL,
  `ngayTao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`maTK`, `tenTK`, `matKhau`, `maGoi`, `maLoai`, `ngayTao`) VALUES
(2, 'nguyentrongphu@gmail.com', '123456', NULL, 2, '2024-11-21');

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
-- Indexes for table `chungcu`
--
ALTER TABLE `chungcu`
  ADD PRIMARY KEY (`maCC`),
  ADD KEY `maDA` (`maDA`);

--
-- Indexes for table `danhsachduanyeuthich`
--
ALTER TABLE `danhsachduanyeuthich`
  ADD PRIMARY KEY (`STT`);

--
-- Indexes for table `duan`
--
ALTER TABLE `duan`
  ADD PRIMARY KEY (`maDA`),
  ADD KEY `maCDA` (`maChuDuAn`),
  ADD KEY `maLoaiDA` (`maLoaiDA`);

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
-- Indexes for table `loaiduan`
--
ALTER TABLE `loaiduan`
  ADD PRIMARY KEY (`maLoaiDA`);

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
-- Indexes for table `nhao`
--
ALTER TABLE `nhao`
  ADD PRIMARY KEY (`maNO`),
  ADD KEY `maDA` (`maDA`);

--
-- Indexes for table `phongtro`
--
ALTER TABLE `phongtro`
  ADD PRIMARY KEY (`maPhongTro`),
  ADD KEY `maDA` (`maDA`);

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
  MODIFY `maChuDuAn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chungcu`
--
ALTER TABLE `chungcu`
  MODIFY `maCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `danhsachduanyeuthich`
--
ALTER TABLE `danhsachduanyeuthich`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `duan`
--
ALTER TABLE `duan`
  MODIFY `maDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

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
-- AUTO_INCREMENT for table `loaiduan`
--
ALTER TABLE `loaiduan`
  MODIFY `maLoaiDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `nhao`
--
ALTER TABLE `nhao`
  MODIFY `maNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `phongtro`
--
ALTER TABLE `phongtro`
  MODIFY `maPhongTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `quantrihethong`
--
ALTER TABLE `quantrihethong`
  MODIFY `maAdmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `maTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chuduan`
--
ALTER TABLE `chuduan`
  ADD CONSTRAINT `chuduan_ibfk_1` FOREIGN KEY (`maTK`) REFERENCES `taikhoan` (`maTK`);

--
-- Constraints for table `chungcu`
--
ALTER TABLE `chungcu`
  ADD CONSTRAINT `chungcu_ibfk_1` FOREIGN KEY (`maDA`) REFERENCES `duan` (`maDA`);

--
-- Constraints for table `duan`
--
ALTER TABLE `duan`
  ADD CONSTRAINT `duan_ibfk_1` FOREIGN KEY (`maChuDuAn`) REFERENCES `chuduan` (`maChuDuAn`),
  ADD CONSTRAINT `duan_ibfk_2` FOREIGN KEY (`maLoaiDA`) REFERENCES `loaiduan` (`maLoaiDA`);

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
-- Constraints for table `nhao`
--
ALTER TABLE `nhao`
  ADD CONSTRAINT `nhao_ibfk_1` FOREIGN KEY (`maDA`) REFERENCES `duan` (`maDA`);

--
-- Constraints for table `quantrihethong`
--
ALTER TABLE `quantrihethong`
  ADD CONSTRAINT `quantrihethong_ibfk_1` FOREIGN KEY (`maTK`) REFERENCES `taikhoan` (`maTK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
