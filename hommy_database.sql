-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 04:24 AM
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

--
-- Dumping data for table `chuduan`
--

INSERT INTO `chuduan` (`maChuDuAn`, `tenCDA`, `soDT`, `email`, `diaChi`, `maTK`) VALUES
(7, 'Nguyễn Trọng Phú', '0869761738', 'dsdsdsdsds', 'sdsdsds', 2),
(9, 'Bùi Việt Nam', '086976134', 'buivietnam@gmail.com', 'Ấp Bưng Thuốc', 5),
(10, 'Phạm Tiến Chung', '0869761738', 'phamtienchung@gmail.com', 'Ấp Bưng Thuốc', 6);

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
(5, '213', '2', '2', 'Giấy chứng nhận quyền sử dụng đất', 167, 'A'),
(6, '213', '2', '2', 'Sổ đỏ', 168, 'A'),
(7, '213', '2', '2', 'Sổ hồng', 169, 'A'),
(8, '213', '2', '2', 'Sổ đỏ', 170, 'A'),
(9, '213', '2', '2', 'Sổ đỏ', 171, 'A'),
(10, '213', '2', '2', 'Sổ đỏ', 172, 'A'),
(11, '213', '2', '2', 'Sổ đỏ', 173, 'A'),
(12, '213', '2', '2', 'Sổ đỏ', 174, 'A'),
(13, '213', '2', '2', 'Sổ đỏ', 175, 'A'),
(14, '213', '2', '2', 'Sổ đỏ', 176, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `cuochen`
--

CREATE TABLE `cuochen` (
  `maCuocHen` int(11) NOT NULL,
  `thoiGian` time NOT NULL,
  `ngayDienRa` date NOT NULL,
  `maKH` int(11) NOT NULL,
  `maDA` int(11) NOT NULL,
  `maNhanVienMG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `cuochen`
--

INSERT INTO `cuochen` (`maCuocHen`, `thoiGian`, `ngayDienRa`, `maKH`, `maDA`, `maNhanVienMG`) VALUES
(1, '25:58:13', '2024-12-25', 0, 0, NULL),
(2, '15:07:39', '2024-12-10', 0, 0, NULL),
(4, '15:07:39', '2024-12-10', 0, 0, NULL),
(5, '15:07:39', '2024-12-10', 0, 0, NULL),
(6, '25:58:13', '2024-12-25', 0, 0, NULL),
(7, '25:58:13', '2024-12-25', 0, 0, NULL);

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

--
-- Dumping data for table `danhsachduanyeuthich`
--

INSERT INTO `danhsachduanyeuthich` (`STT`, `maKH`, `maDuAn`, `tenDA`, `diaChiDA`, `giaThue`, `maLoaiDA`) VALUES
(0, 0, 157, 'Phòng Trọ Hòa Bình - Căn Hộ Mini An Cư Hòa Mạng', '456/673, Lê Văn Sĩ, Phường 3, Quận Phú Nhuận, Hồ Chí Minh', '5000000', '2');

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
(159, 'Phòng Trọ Cao Cấp Quận 1 - Chỗ Ở Sang Trọng Giữa Lòng Thành Phố', '456/67, Lê Duẩn, Phường 1, Quận 1, Hồ Chí Minh', '5000000', '30%', '2024-12-11 06:33:09', '2024-12-11 06:33:09', 7, '5000000', 2, '124_e4e550a847e2dcbe21838e478abcdb56.jpg', 3, 1, '8'),
(161, 'Khu Phòng Trọ Dịch Vụ Chợ Lớn - An Cư Tiện Lợi, Giá Cả Hợp Lý', '123, Lê Đức Thọ, Phường 5, Quận Gò Vấp, Hồ Chí Minh', '4000000', '30%', '2024-12-11 06:46:37', '2024-12-11 06:46:37', 9, '4000000', 2, '291_2f84f521469c92dbece6d55158fa7e0d.jpg', 1, 1, '8'),
(162, 'Phòng Trọ Green Living Quận 3 - Sống Xanh, Không Gian Tươi Mới', '123, Lê Đức Thọ, Phường 12, Quận 3, Hồ Chí Minh', '4000000', '40%', '2024-12-11 06:47:08', '2024-12-11 06:47:08', 9, '4000000', 2, '111_789f9b9231a67cc10d9bfde1e89cdb92.jpg', 1, 1, '8'),
(163, 'Khu Phòng Trọ Tiện Nghi Quận 5 - Căn Hộ Mini, Tiện Ích Tối Ưu', '123, Hồng Hà, Phường 7, Quận 5, Hồ Chí Minh', '4000000', '40%', '2024-12-11 06:48:25', '2024-12-11 06:48:25', 9, '4000000', 2, '645_d6065dc49e7a11c9c51a322089ee81f1.jpg', 1, 1, '8'),
(164, 'Phòng Trọ An Cư Quận 10 - Nơi Khởi Đầu Mới, Sống Bình Yên, vui vẽ', '456, Sư Vạn Hạnh, Phường 6, Quận 10, Hồ Chí Minh', '4000000', '30%', '2024-12-11 06:53:03', '2024-12-11 06:53:03', 10, '4000000', 2, '479_OIP (2).jpg', 3, 1, '8'),
(165, 'Phòng Trọ Diamond Residence Quận 4 - Đẳng Cấp Sống Xanh Bên Sông', '456, Sư Vạn Hạnh, Phường 7, Quận 4, Hồ Chí Minh', '4000000', '30%', '2024-12-11 06:53:32', '2024-12-11 06:53:32', 10, '4000000', 2, '600_R.jpg', 2, 1, '8'),
(166, 'Phòng Trọ Eco Life Quận 3 - Căn Hộ Tiện Ích, Môi Trường Xanh Sạch', '456, Sư Vạn Hạnh, Phường 3, Quận 3, Hồ Chí Minh', '4000000', '40%', '2024-12-11 06:54:37', '2024-12-11 06:54:37', 10, '4000000', 2, '230_OIP.jpg', 2, 1, '8'),
(167, 'Chung Cư Royal Heights - Tầm Nhìn Vươn Xa', '456/67, Lê Văn Sĩ, Phường 9, Quận Gò Vấp, Hồ Chí Minh', '12000000', '30%', '2024-12-11 07:00:38', '2024-12-11 07:00:38', 10, '12000000', 3, '549_3978-Interior-Living-Kitchenroom-Scene-Sketchup-Model-By-DieuLinh-4-768x470.jpg', 2, 1, '20'),
(168, 'Căn Hộ The Green City - Sống Xanh, Cuộc Sống Tươi Đẹp', '456/67, Lê Văn Sĩ, Phường 7, Quận 7, Hồ Chí Minh', '12000000', '30%', '2024-12-11 07:01:32', '2024-12-11 07:01:32', 10, '12000000', 3, '491_a1c9be163539149.Y3JvcCwyNjIyLDIwNTEsMTg4LDA.jpg', 2, 1, '20'),
(169, 'Chung Cư Sky Residence - Nâng Tầm Cuộc Sống', '456/67, Lê Văn Sĩ, Phường 10, Quận Tân Phú, Hồ Chí Minh', '14000000', '30%', '2024-12-11 07:02:05', '2024-12-11 07:02:05', 10, '14000000', 3, '374_hinh-anh-can-ho-chung-cu-dep-3.jpg', 2, 1, '20'),
(170, 'The Lotus Tower - Đỉnh Cao Cuộc Sống Thượng Lưu', '456/67, Lê Văn Sĩ, Phường 8, Quận 2, Hồ Chí Minh', '14000000', '30%', '2024-12-11 07:03:51', '2024-12-11 07:03:51', 10, '14000000', 3, '488_hinh-anh-can-ho-chung-cu-dep-5.jpg', 2, 1, '20'),
(171, 'Chung Cư The Garden View - Môi Trường Xanh, Không Gian Lý Tưởng', '456/67, Lê Văn Sĩ, Phường 7, Quận Gò Vấp, Hồ Chí Minh', '14000000', '30%', '2024-12-11 07:05:06', '2024-12-11 07:05:06', 9, '14000000', 3, '808_hinh-anh-can-ho-chung-cu-dep-6.jpg', 2, 1, '20'),
(172, 'Căn Hộ Golden Palace - Sang Trọng Và Tiện Nghi', '456/67, Lê Văn Sĩ, Phường 1, Quận Gò Vấp, Hồ Chí Minh', '14000000', '30%', '2024-12-11 07:05:38', '2024-12-11 07:05:38', 9, '14000000', 3, '861_hinh-anh-can-ho-chung-cu-dep-7.jpg', 2, 1, '20'),
(173, 'Chung Cư Sapphire Tower - Chạm Tới Đẳng Cấp', '456/67, Lê Văn Sĩ, Phường 5, Quận Phú Nhuận, Hồ Chí Minh', '14000000', '30%', '2024-12-11 07:06:06', '2024-12-11 07:06:06', 9, '14000000', 3, '216_hinh-anh-can-ho-chung-cu-dep-13.jpg', 2, 1, '20'),
(174, 'Căn Hộ EcoPark View - Sống Xanh, Tận Hưởng Cuộc Sống', '456/67, Lê Văn Sĩ, Phường 9, Quận 10, Hồ Chí Minh', '14000000', '30%', '2024-12-11 07:07:26', '2024-12-11 07:07:26', 7, '14000000', 3, '407_OIP (3).jpg', 2, 1, '20'),
(175, 'Chung Cư Diamond City - Thành Phố Của Những Ước Mơ', '456/67, Lê Văn Sĩ, Phường 6, Quận 4, Hồ Chí Minh', '14000000', '30%', '2024-12-11 07:07:55', '2024-12-11 07:07:55', 7, '14000000', 3, '521_OIP.jpg', 2, 1, '20'),
(176, 'The Horizon Residence - Vượt Ra Biên Giới Cuộc Sống', '456/67, Lê Văn Sĩ, Phường 8, Quận Tân Phú, Hồ Chí Minh', '14000000', '30%', '2024-12-11 07:08:19', '2024-12-11 07:08:19', 7, '14000000', 3, '817_thiet-ke-noi-that-chung-cu7.jpg', 2, 1, '20'),
(177, 'Khu Nhà Ở Vịnh Xanh - An Cư Lạc Nghiệp', '456/6733, Hồ Huy, Phường 10, Quận Gò Vấp, Hồ Chí Minh', '20000000', '30%', '2024-12-11 07:13:54', '2024-12-11 07:13:54', 7, '20000000', 1, '870_4bc9dc5f23be53163ccd87a75f13d46f.jpg', 2, 1, '56'),
(178, 'Dự Án Home Paradise - Nơi Cuộc Sống Mới Bắt Đầu', '456/6733, Hồ Huy, Phường 7, Quận 10, Hồ Chí Minh', '20000000', '30%', '2024-12-11 07:14:23', '2024-12-11 07:14:23', 7, '20000000', 1, '441_4083-v3-800x538.jpg', 2, 1, '56'),
(179, 'Khu Dân Cư An Bình - Nhà Ở Tiện Nghi, Giá Cả Hợp Lý', '456/6733, Hồ Huy, Phường 4, Quận 6, Hồ Chí Minh', '20000000', '30%', '2024-12-11 07:14:57', '2024-12-11 07:14:57', 7, '20000000', 1, '362_biet-thu-1-1.jpg', 2, 1, '56'),
(180, 'Nhà Ở Eco Living - Sống Xanh, Sống Khỏe', '456/6733, Hồ Huy, Phường 5, Quận Tân Phú, Hồ Chí Minh', '20000000', '30%', '2024-12-11 07:15:51', '2024-12-11 07:15:51', 9, '20000000', 1, '481_biet-thu-san-vuon-mai-thai-binh-duong.jpg', 2, 1, '56'),
(181, 'Khu Nhà Ở Golden Gate - Cánh Cửa Tới Cuộc Sống Thịnh Vượng', '456/6733, Hồ Huy, Phường 4, Quận Gò Vấp, Hồ Chí Minh', '20000000', '30%', '2024-12-11 07:17:02', '2024-12-11 07:17:02', 9, '20000000', 1, '726_Luxury-House-Plans-12x8-Meters-40x26-Feet-3-Beds-3-scaled.webp', 2, 1, '56'),
(182, 'Dự Án Harmony Home - Cân Bằng Cuộc Sống và Công Việc', '456/6733, Hồ Huy, Phường 1, Quận Gò Vấp, Hồ Chí Minh', '20000000', '30%', '2024-12-11 07:18:15', '2024-12-11 07:18:15', 9, '20000000', 1, '287_Mau-biet-thu-3-tang-tan-co-dien-dep-tai-hai-duong-achi-31305-01.jpg', 2, 1, '56'),
(183, 'Nhà Ở Riverside Villas - Mái Ấm Bên Dòng Sông', '456/6733, Hồ Huy, Phường 8, Quận Gò Vấp, Hồ Chí Minh', '20000000', '40%', '2024-12-11 07:18:45', '2024-12-11 07:18:45', 9, '20000000', 1, '729_MOYO_Photo-192-1.jpg', 2, 1, '56'),
(184, 'Khu Dân Cư Sunshine Park - Sống Giữa Không Gian Tươi Mới', '456/6733, Hồ Huy, Phường 6, Quận Gò Vấp, Hồ Chí Minh', '20000000', '30%', '2024-12-11 07:21:33', '2024-12-11 07:21:33', 10, '20000000', 1, '527_OIP (1).jpg', 2, 1, '56'),
(185, 'Dự Án Trường An - Mái Nhà Bình Yên', '456/6733, Hồ Huy, Phường 5, Quận Gò Vấp, Hồ Chí Minh', '20000000', '30%', '2024-12-11 07:22:11', '2024-12-11 07:22:11', 10, '20000000', 1, '710_OIP (2).jpg', 2, 1, '56'),
(186, 'Khu Nhà Ở Phúc Lộc - An Cư Lạc Nghiệp, Gia Đình Hạnh Phúc', '456/6733, Hồ Huy, Phường 1, Quận 10, Hồ Chí Minh', '20000000', '30%', '2024-12-11 07:22:42', '2024-12-11 07:22:42', 10, '20000000', 1, '905_OIP.jpg', 2, 1, '56');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `goithanhvien`
--

INSERT INTO `goithanhvien` (`maGoi`, `tenGoi`, `cacTinhNang`, `gia`, `moTa`) VALUES
(1, 'VIP 1', 'Gói VIP1', 199, 'Truy cập không giới hạn\r\nƯu đãi đặc biệt hàng thán'),
(2, 'VIP 2', 'VIP 2', 399, 'Truy cập không giới hạn\r\nƯu đãi đặc biệt hàng tuần'),
(3, 'VIP 3', 'VIP 3', 599, 'Truy cập không giới hạn\r\nƯu đãi đặc biệt hàng ngày');

-- --------------------------------------------------------

--
-- Table structure for table `hanhdongtaikhoan`
--

CREATE TABLE `hanhdongtaikhoan` (
  `maHanhDong` varchar(50) NOT NULL,
  `loai` varchar(50) NOT NULL,
  `ngayThucHien` date NOT NULL,
  `maTK` int(11) DEFAULT NULL,
  `liDo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
-- Table structure for table `lichlamviec`
--

CREATE TABLE `lichlamviec` (
  `STT` int(11) NOT NULL,
  `maNhanVienMoiGioi` int(11) DEFAULT NULL,
  `ngayDangKy` date NOT NULL,
  `gioBatDau` time NOT NULL,
  `gioKetThuc` time NOT NULL,
  `trangThaiLichLamViec` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lichlamviec`
--

INSERT INTO `lichlamviec` (`STT`, `maNhanVienMoiGioi`, `ngayDangKy`, `gioBatDau`, `gioKetThuc`, `trangThaiLichLamViec`) VALUES
(0, NULL, '2024-12-25', '25:58:13', '41:58:13', '0'),
(0, NULL, '2024-12-10', '08:00:00', '12:00:00', ''),
(0, NULL, '2024-12-10', '13:00:00', '17:00:00', ''),
(0, NULL, '2024-12-11', '08:00:00', '12:00:00', ''),
(0, NULL, '2024-12-11', '13:00:00', '17:00:00', ''),
(0, NULL, '2024-12-12', '08:00:00', '12:00:00', ''),
(0, NULL, '2024-12-12', '13:00:00', '17:00:00', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(10, 'Nhà cấp 4', '2', '2', 'Đông', 'Sổ đỏ', 177),
(11, 'Nhà cấp 4', '2', '2', 'Đông', 'Sổ đỏ', 178),
(12, 'Biệt thự', '2', '2', 'Tây', 'Sổ hồng', 179),
(13, 'Biệt thự', '2', '2', 'Tây', 'Sổ hồng', 180),
(14, 'Nhà cấp 4', '2', '2', 'Đông', 'Sổ đỏ', 181),
(15, 'Biệt thự', '2', '2', 'Đông', 'Sổ đỏ', 182),
(16, 'Nhà cấp 4', '2', '2', 'Đông', 'Sổ đỏ', 183),
(17, 'Nhà cấp 4', '2', '2', 'Đông', 'Sổ hồng', 184),
(18, 'Biệt thự', '2', '2', 'Đông', 'Sổ đỏ', 185),
(19, 'Nhà cấp 4', '2', '2', 'Tây', 'Sổ hồng', 186);

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
(36, 'Đầy đủ nội thất', 158),
(37, 'Đầy đủ nội thất', 159),
(39, 'Đầy đủ nội thất', 161),
(40, 'Đầy đủ nội thất', 162),
(41, 'Đầy đủ nội thất', 163),
(42, 'Đầy đủ nội thất', 164),
(43, 'Phòng trống', 165),
(44, 'Đầy đủ nội thất', 166);

-- --------------------------------------------------------

--
-- Table structure for table `quantrihethong`
--

CREATE TABLE `quantrihethong` (
  `maAdmin` int(11) NOT NULL,
  `tenAdmin` varchar(50) NOT NULL,
  `soDT` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diaChi` text NOT NULL,
  `khuVuc` varchar(50) NOT NULL,
  `maTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `quantrihethong`
--

INSERT INTO `quantrihethong` (`maAdmin`, `tenAdmin`, `soDT`, `email`, `diaChi`, `khuVuc`, `maTK`) VALUES
(1, 'Võ Nguyễn Hoành Hợp', '0911576456', 'hopboy553@gmail.com', '', 'Nam', 3),
(7, 'bennis@gmail.com', '0911576456', 'hopboy553@gmail.com', 'Gò Vấp', 'Bắc', 33);

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
  `ngayTao` date NOT NULL,
  `trangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`maTK`, `tenTK`, `matKhau`, `maGoi`, `maLoai`, `ngayTao`, `trangThai`) VALUES
(2, 'nguyentrongphu', 'e10adc3949ba59abbe56e057f20f883e', NULL, 2, '2024-11-21', 1),
(3, 'hopboy553', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 5, '2024-12-10', 1),
(5, 'buivietnam', 'e10adc3949ba59abbe56e057f20f883e', NULL, 2, '2024-12-11', 1),
(6, 'phamtienchung', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, '2024-12-11', 1),
(33, 'bennnisdsadas', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 5, '2024-12-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thaotacduan`
--

CREATE TABLE `thaotacduan` (
  `maThaoTac` varchar(50) NOT NULL,
  `loai` varchar(50) NOT NULL,
  `ngayThucHien` date NOT NULL,
  `maDA` int(11) DEFAULT NULL,
  `liDo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `thaotacduan`
--

INSERT INTO `thaotacduan` (`maThaoTac`, `loai`, `ngayThucHien`, `maDA`, `liDo`) VALUES
('091624dc-b89a-11ef-bede-a0e70bae56f9', 'Xóa', '2024-12-12', 157, 'xấu'),
('1714e824-b89b-11ef-bede-a0e70bae56f9', 'Xóa tạm', '2024-12-12', 160, 'xấu'),
('3e0a8e74-b89a-11ef-bede-a0e70bae56f9', 'Xóa', '2024-12-12', 157, 'xấu'),
('73776e09-b89b-11ef-bede-a0e70bae56f9', 'Xóa', '2024-12-12', 160, 'xấu'),
('7d9fe2f7-b901-11ef-8c42-a0e70bae56f9', 'Xóa tạm', '2024-12-13', 159, 'xấu vl'),
('8dbb8705-b900-11ef-8c42-a0e70bae56f9', 'Duyệt', '2024-12-13', 159, ''),
('a6e1d3c8-b89a-11ef-bede-a0e70bae56f9', 'Xóa', '2024-12-12', 158, 'xấu');

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
-- Indexes for table `cuochen`
--
ALTER TABLE `cuochen`
  ADD PRIMARY KEY (`maCuocHen`),
  ADD KEY `maDA` (`maDA`),
  ADD KEY `maKH` (`maKH`),
  ADD KEY `maNhanVienMG` (`maNhanVienMG`);

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
-- Indexes for table `hanhdongtaikhoan`
--
ALTER TABLE `hanhdongtaikhoan`
  ADD PRIMARY KEY (`maHanhDong`),
  ADD KEY `maTK` (`maTK`);

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
  ADD PRIMARY KEY (`maTK`);

--
-- Indexes for table `thaotacduan`
--
ALTER TABLE `thaotacduan`
  ADD PRIMARY KEY (`maThaoTac`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuochen`
--
ALTER TABLE `cuochen`
  MODIFY `maCuocHen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quantrihethong`
--
ALTER TABLE `quantrihethong`
  MODIFY `maAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `maTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hanhdongtaikhoan`
--
ALTER TABLE `hanhdongtaikhoan`
  ADD CONSTRAINT `hanhdongtaikhoan_ibfk_1` FOREIGN KEY (`maTK`) REFERENCES `taikhoan` (`maTK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
