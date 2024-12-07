-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 06:23 AM
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
-- Database: `time_line`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `MaBinhLuan` int(11) NOT NULL,
  `NoiDung` text NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `NgayBinhLuan` datetime NOT NULL DEFAULT current_timestamp(),
  `Duyet` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`MaBinhLuan`, `NoiDung`, `MaKhachHang`, `MaSanPham`, `NgayBinhLuan`, `Duyet`) VALUES
(9, 'Hàng sài tốt', 1, 5, '2024-06-07 12:50:58', 0),
(11, 'Ổn', 1, 7, '2024-06-10 12:21:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaChiTietDH` int(11) NOT NULL,
  `MaDonHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaBan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaChiTietDH`, `MaDonHang`, `MaSanPham`, `SoLuong`, `GiaBan`) VALUES
(4, 18, 7, 1, 450000),
(5, 18, 6, 1, 330000),
(6, 19, 7, 1, 370000),
(7, 19, 7, 2, 450000),
(33, 39, 11, 2, 550000),
(34, 39, 8, 1, 350000),
(46, 816060034, 13, 1, 280000),
(47, 937657027, 9, 1, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(100) NOT NULL,
  `HinhAnh` text NOT NULL,
  `TrangThai` varchar(100) NOT NULL DEFAULT 'Đang hoạt động'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`MaDanhMuc`, `TenDanhMuc`, `HinhAnh`, `TrangThai`) VALUES
(1, 'Tai Nghe', 'c1.png', 'Đang hoạt động'),
(2, 'Bàn Phím', 'BP8.png', 'Đang hoạt động'),
(3, 'Chuột', 'c1.png', 'Đang hoạt động');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` int(11) NOT NULL,
  `NgayDatHang` datetime NOT NULL DEFAULT current_timestamp(),
  `MaKhachHang` int(11) NOT NULL,
  `TongTien` decimal(10,0) NOT NULL,
  `TrangThai` varchar(100) NOT NULL DEFAULT 'Đang chờ xử lý',
  `GhiChu` text DEFAULT NULL,
  `PhuongThucGiaoHang` int(11) DEFAULT NULL,
  `PhuongThucThanhToan` varchar(100) DEFAULT NULL,
  `ten` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `diachi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MaDonHang`, `NgayDatHang`, `MaKhachHang`, `TongTien`, `TrangThai`, `GhiChu`, `PhuongThucGiaoHang`, `PhuongThucThanhToan`, `ten`, `sdt`, `diachi`) VALUES
(18, '2023-07-01 09:06:26', 1, 780000, 'Đã giao hàng', '', 0, NULL, '', '', ''),
(19, '2023-08-10 14:32:09', 2, 1270000, 'Đang giao hàng', 'Nhớ chuyển trước 7h', 0, NULL, '', '', ''),
(37, '2023-09-28 23:44:42', 15, 2330000, 'Đã duyệt đơn hàng', '', 0, NULL, '', '', ''),
(39, '2023-10-02 07:47:14', 1, 1450000, 'Đang chờ xử lý', '', 0, NULL, '', '', ''),
(816060034, '2024-06-15 20:12:29', 16, 310000, 'Đang giao hàng', NULL, NULL, NULL, '', '', ''),
(937657027, '2024-06-16 10:47:31', 50, 230000, 'Đang chờ xử lý', NULL, NULL, NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `MatKhau` varchar(30) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `DiaChi` varchar(50) DEFAULT NULL,
  `SDT` varchar(12) DEFAULT NULL,
  `Admin` int(1) NOT NULL DEFAULT 0,
  `Anh` varchar(100) DEFAULT NULL,
  `TrangThai` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `Email`, `MatKhau`, `HoTen`, `DiaChi`, `SDT`, `Admin`, `Anh`, `TrangThai`) VALUES
(1, 'admin@gmail.com', '123', 'Nông Văn Hiếu', 'HCM', '0925701370', 1, 'WIN_20240617_10_35_24_Pro.jpg', 1),
(2, 'khachhang@gmail.com', '202cb962ac59075b964b07152d234b', 'Nguyễn Thị Hoa', 'Quận 12, HCM', '0987654321', 0, 'hoa.jpeg', 1),
(15, 'khachhang3@gmail.com', '123', 'Nguyễn Thị Huyền Trân', 'HCM', '0856387187', 0, 'anhkh3.jpeg', 1),
(16, 'khachhang4@gmail.com', '123', 'Nguyễn Thị Lan', 'Đà Nẵng', '9876543312', 0, 'hoa.jpeg', 1),
(50, 'tranbebi@gmail.com', '123', 'Lê thị trà xanh', 'Hà Nội', '0924159863', 0, 'anhdien.jpg', 1),
(55, 'hieumonki4@gmail.com', '123', 'NÔNG VĂN HIẾU', 'Thôn 3, Đường 10, Bù Đăng, Bình Phước', '12345', 0, '', 1),
(56, 'hieumonki4@gmail.com', '123', 'NÔNG VĂN HIẾU', 'Thôn 3, Đường 10, Bù Đăng, Bình Phước', '3333', 0, 'Screenshot 2023-10-24 135936.png', 1),
(57, 'hieumonki4@gmail.com', '123', 'NÔNG VĂN HIẾU', 'Thôn 3, Đường 10, Bù Đăng, Bình Phước', '23456', 0, '', 1),
(58, 'hieumonki4@gmail.com', '123', 'NÔNG VĂN HIẾU', 'Thôn 3, Đường 10, Bù Đăng, Bình Phước', '1234', 0, '', 1),
(59, 'hieumonki4@gmail.com', '123', 'NÔNG VĂN HIẾU', 'Thôn 3, Đường 10, Bù Đăng, Bình Phước', '2345', 0, 'Screenshot 2023-10-24 135936.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(10) NOT NULL,
  `TenSanPham` varchar(100) NOT NULL,
  `HinhAnh` text DEFAULT NULL,
  `Gia` int(10) DEFAULT NULL,
  `GiaKhuyenMai` int(10) DEFAULT NULL,
  `MaDanhMuc` int(10) NOT NULL,
  `SoLuong` int(10) DEFAULT NULL,
  `MoTa` text NOT NULL,
  `Hot` int(11) DEFAULT NULL,
  `TrangThai` varchar(100) NOT NULL DEFAULT 'Đang hoạt động'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `HinhAnh`, `Gia`, `GiaKhuyenMai`, `MaDanhMuc`, `SoLuong`, `MoTa`, `Hot`, `TrangThai`) VALUES
(5, 'Bàn Phím Cơ', 'BP1.png', 650000, 500000, 1, 80, '', 0, 'Đang hoạt động'),
(6, 'Bàn Phím Cơ', 'BP1.png', 450000, 400000, 1, 50, '', 1, 'Đang hoạt động'),
(7, 'Chuột gaming', 'C1.png', 550000, 450000, 1, 42, '', 1, 'Đang hoạt động'),
(8, 'Chuột gaming', 'C2.png', 400000, 350000, 1, 40, '', 0, 'Đang hoạt động'),
(9, 'Chuột gaming', 'C3.png', 280000, 200000, 2, 29, '', 0, 'Đang hoạt động'),
(10, 'Bàn phím cơ', 'BP3.png', 450000, 330000, 2, 30, '', 0, 'Đang hoạt động'),
(11, 'Bàn phím cơ', 'BP3.png', 600000, 550000, 2, 10, '', 1, 'Đang hoạt động'),
(13, 'Chuột gaming', 'C1.png', 300000, 280000, 3, 26, '', 0, 'Đang hoạt động'),
(14, 'Bàn phím cơ', 'BP2.png', 400000, 370000, 3, 39, '', 1, 'Đang hoạt động');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MaBinhLuan`),
  ADD KEY `MaKhachHang` (`MaKhachHang`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaChiTietDH`),
  ADD KEY `MaDonHang` (`MaDonHang`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDanhMuc`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`),
  ADD KEY `MaKhachHang` (`MaKhachHang`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `MaDanhMuc` (`MaDanhMuc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `MaBinhLuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaChiTietDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=976909181;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`MaDonHang`) REFERENCES `donhang` (`MaDonHang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaDanhMuc`) REFERENCES `danhmuc` (`MaDanhMuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
