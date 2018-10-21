-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2018 at 10:07 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lv_huy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_pass`, `admin_name`) VALUES
('admin001', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Hoàng Huy');

-- --------------------------------------------------------

--
-- Table structure for table `coquan`
--

CREATE TABLE `coquan` (
  `cq_id` int(255) NOT NULL,
  `cq_ten` varchar(255) NOT NULL,
  `cq_username` varchar(255) NOT NULL,
  `cq_password` varchar(255) NOT NULL,
  `cq_diachi` varchar(255) NOT NULL,
  `cq_sdt` int(255) NOT NULL,
  `cq_email` varchar(255) NOT NULL,
  `cq_masothue` int(255) NOT NULL,
  `cq_trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coquan`
--

INSERT INTO `coquan` (`cq_id`, `cq_ten`, `cq_username`, `cq_password`, `cq_diachi`, `cq_sdt`, `cq_email`, `cq_masothue`, `cq_trangthai`) VALUES
(2, 'FPT Software', 'fpt', 'e42d2ffb9097703605c32e83ea1ac20a', '28 Hùng Vương, Ninh Kiều, TP. Cần Thơ', 2147483647, 'fpt@gmail.com', 123123123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hockynamhoc`
--

CREATE TABLE `hockynamhoc` (
  `hk_id` int(255) NOT NULL,
  `hk_hocky` int(255) NOT NULL,
  `hk_namhoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hockynamhoc`
--

INSERT INTO `hockynamhoc` (`hk_id`, `hk_hocky`, `hk_namhoc`) VALUES
(1, 1, '2017-2018'),
(2, 2, '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `nganh`
--

CREATE TABLE `nganh` (
  `manganh` varchar(255) NOT NULL,
  `tennganh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nganh`
--

INSERT INTO `nganh` (`manganh`, `tennganh`) VALUES
('HTTT', 'Hệ thống thông tin'),
('KHMT', 'Khoa học máy tính ');

-- --------------------------------------------------------

--
-- Table structure for table `nguoihuongdan`
--

CREATE TABLE `nguoihuongdan` (
  `nhd_id` int(255) NOT NULL,
  `nhd_username` varchar(255) NOT NULL,
  `nhd_password` varchar(255) NOT NULL,
  `nhd_hoten` varchar(255) NOT NULL,
  `nhd_gioitinh` int(255) NOT NULL,
  `nhd_hocvi` varchar(255) NOT NULL,
  `nhd_sdt` int(255) NOT NULL,
  `nhd_email` varchar(255) NOT NULL,
  `cq_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nguoihuongdan`
--

INSERT INTO `nguoihuongdan` (`nhd_id`, `nhd_username`, `nhd_password`, `nhd_hoten`, `nhd_gioitinh`, `nhd_hocvi`, `nhd_sdt`, `nhd_email`, `cq_id`) VALUES
(3, 'fpt_lethi', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Thi', 0, 'ThS', 939888999, 'fpt_lethi@gmail.com', 2),
(4, 'fpt_lehao', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Hào', 1, 'ThS', 939777666, 'fpt_lehao@gmail.com', 2),
(5, 'fpt_nguyenhai', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Ngọc Hải', 1, 'ThS', 913999999, 'fpt_nguyenhai@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `noidungthuctap`
--

CREATE TABLE `noidungthuctap` (
  `nd_id` int(255) NOT NULL,
  `nd_mota` varchar(2000) NOT NULL,
  `nd_yeucau` varchar(2000) NOT NULL,
  `nd_soluong` int(255) NOT NULL,
  `nd_tinhtrang` int(255) NOT NULL,
  `nd_sobuoimoituan` int(255) NOT NULL,
  `nd_cophonglamviec` int(255) NOT NULL,
  `nd_duoccapmaytinh` int(255) NOT NULL,
  `nd_ngaybatdau` datetime NOT NULL,
  `nd_ngayketthuc` int(11) NOT NULL,
  `hk_id` int(255) NOT NULL,
  `manganh` varchar(255) NOT NULL,
  `nguoihuongdan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noidungthuctap`
--

INSERT INTO `noidungthuctap` (`nd_id`, `nd_mota`, `nd_yeucau`, `nd_soluong`, `nd_tinhtrang`, `nd_sobuoimoituan`, `nd_cophonglamviec`, `nd_duoccapmaytinh`, `nd_ngaybatdau`, `nd_ngayketthuc`, `hk_id`, `manganh`, `nguoihuongdan`) VALUES
(1, 'Xay dựng hẹ thống quản lí bệnh viện', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.  The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 5, 0, 5, 1, 0, '2018-10-02 00:00:00', 2018, 2, '', 'fpt_nguyenhai');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `sv_mssv` varchar(255) NOT NULL,
  `sv_password` varchar(255) NOT NULL,
  `sv_hoten` varchar(255) NOT NULL,
  `sv_gioitinh` int(255) NOT NULL,
  `sv_ngaysinh` datetime NOT NULL,
  `sv_email` varchar(255) NOT NULL,
  `sv_diachi` varchar(255) NOT NULL,
  `sv_manganh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`sv_mssv`, `sv_password`, `sv_hoten`, `sv_gioitinh`, `sv_ngaysinh`, `sv_email`, `sv_diachi`, `sv_manganh`) VALUES
('sinhvien001', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Hoàng Huy', 1, '0000-00-00 00:00:00', 'huy@student.ctu.edu.vn', '01 Hoa Bình', 'HTTT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `coquan`
--
ALTER TABLE `coquan`
  ADD PRIMARY KEY (`cq_id`);

--
-- Indexes for table `hockynamhoc`
--
ALTER TABLE `hockynamhoc`
  ADD PRIMARY KEY (`hk_id`);

--
-- Indexes for table `nganh`
--
ALTER TABLE `nganh`
  ADD PRIMARY KEY (`manganh`);

--
-- Indexes for table `nguoihuongdan`
--
ALTER TABLE `nguoihuongdan`
  ADD PRIMARY KEY (`nhd_id`),
  ADD KEY `cq_id` (`cq_id`);

--
-- Indexes for table `noidungthuctap`
--
ALTER TABLE `noidungthuctap`
  ADD PRIMARY KEY (`nd_id`),
  ADD KEY `hk_id` (`hk_id`),
  ADD KEY `manganh` (`manganh`),
  ADD KEY `nguoihuongdan` (`nguoihuongdan`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`sv_mssv`),
  ADD KEY `sv_malop` (`sv_manganh`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coquan`
--
ALTER TABLE `coquan`
  MODIFY `cq_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hockynamhoc`
--
ALTER TABLE `hockynamhoc`
  MODIFY `hk_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nguoihuongdan`
--
ALTER TABLE `nguoihuongdan`
  MODIFY `nhd_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `noidungthuctap`
--
ALTER TABLE `noidungthuctap`
  MODIFY `nd_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nguoihuongdan`
--
ALTER TABLE `nguoihuongdan`
  ADD CONSTRAINT `nguoihuongdan_ibfk_1` FOREIGN KEY (`cq_id`) REFERENCES `coquan` (`cq_id`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`sv_manganh`) REFERENCES `nganh` (`manganh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
