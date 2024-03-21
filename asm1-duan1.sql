-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 11:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `ngaybinhluan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `idpro`, `iduser`, `noidung`, `ngaybinhluan`) VALUES
(1, 2, 1, 'test binh luan', '2024-01-05'),
(2, 4, 4, 'sản phẩm tốt', '2024-01-11'),
(3, 5, 4, 'dùng rất bền ', '2024-01-11'),
(4, 8, 4, 'nghe rất thích nha', '2024-01-11'),
(5, 7, 4, 'sản phẩm rẻ và tốt', '2024-01-11'),
(6, 4, 1, 'dùng rất thích ạ', '2024-01-11'),
(8, 3, 1, 'iphone rất đẹp cho chị em', '2024-01-11'),
(9, 6, 1, 'code sinh động', '2024-01-11'),
(10, 6, 4, 'sản phẩm tốt', '2024-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_var` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `ship` int(11) NOT NULL,
  `tien_phai_tra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(5, 'Điện thoại'),
(6, 'Laptop'),
(7, 'Phụ kiện'),
(8, 'Iphone');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id_checkout` int(11) NOT NULL,
  `id_variant` int(11) NOT NULL,
  `first_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `last_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `tien_hang` int(11) NOT NULL,
  `phi_ship` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `phuong_thuc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_cart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `mota` text NOT NULL,
  `luotxem` int(11) NOT NULL,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `mota`, `luotxem`, `iddm`) VALUES
(3, 'Iphone 13 ', 0, 'iphone13.jpg', 'Điện thoại iPhone 13 128GB VN/A Pink thu hút với kiểu thiết kế ngôn ngữ phẳng hiện đại, nguyên khối vuông vức, tinh tế đến từng chi tiết. Điện thoại trang bị khung nhôm, mặt sau và trước bằng kính cường lực cao cấp toát lên vẻ ngoài sang chảnh, thời thượng và đảm bảo độ bền bỉ cao. Mặt trước của iPhone 13 được phủ lớp kính Ceramic Shield cứng cáp, sáng bóng, thanh lịch, bền đẹp, hạn chế xước vỡ. Phía ngoài màn hình còn được phủ lớp oleophobic hạn chế tình trạng bám bụi bẩn và mồ hôi giữ màn hình luôn sạch sẽ', 0, 5),
(4, 'Oppo A18', 0, 'oppo.jpg', 'Điện thoại OPPO A18 4GB/128GB Xanh sở hữu thiết kế với độ mỏng chỉ 8,16mm vô cùng gọn nhẹ tạo cảm giác thoải mái khi cầm trên tay. Các góc cạnh được bo cong mềm mại, hai bên vát cong nhẹ nhàng việc cầm nắm sẽ trở nên dễ dàng, chắc chắn hơn.', 0, 5),
(5, 'Laptop HP', 0, 'laptop_HP.jpg', 'HP 15 da0048TU là chiếc laptop Pentium thuộc phân khúc tầm trung của HP được trang bị cấu hình khá với Chíp vi xử lý Intel Pentium N5000, 4 GB RAM, ổ cứng HDD 500 GB và Card đồ họa tích hợp Intel HD Graphics. Sản phẩm đáp ứng tốt hầu hết các tác vụ đơn giản của người dùng hằng ngày như làm việc văn phòng, giải trí cơ bản, chơi game nhẹ nhàng hay người cần một chiếc laptop để học tập.', 0, 6),
(6, 'Laptop Acer', 0, 'laptop_acer.jpg', 'Laptop Acer As A315 có thiết kế khá bắt mắt với mặt lưng giả kim loại được phủ 1 lớp phay xước giúp máy trông cá tính và hạn chế bụi bẩn hơn. Mặc dù có kích thước lớn nhưng bốn góc của máy được bo cong giúp cho việc cầm nắm thoải mái, tạo cảm giác chắc chắn hơn.', 0, 6),
(7, 'Tai nghe blutooth', 0, 'tai_nghe.jpg', 'Tai nghe Bluetooth WIWU Airbuds SE Chuẩn kết nối: Bluetooth 5.1 Là tai nghe kiểu earbuds có đuôi thuôn dài hỗ trợ micro để đàm thoại một cách tốt hơn Thời lượng pin có thể nghe liên tục trong vòng 5 tiếng với âm lượng phù hợp.', 0, 7),
(8, 'Loa di động', 0, 'loa_didong.jpg', 'Thiết kế di động đẹp mắt, dễ dàng mang theo. Hỗ trợ Bluetooth 5.3 cho tốc độ kết nối nhanh hơn, phạm vi kết nối xa hơn và tiết kiệm Pin hơn. Pin dùng 12h với tính năng sạc ngược tiện lợi Hiệu ứng đèn Led nhiều màu sắc phát sáng nhấp nháy chuyển nhịp theo tiếng nhạc.', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(1, 'admin', 'admin', '', '', '', 1),
(4, 'someone', '123456', 'bruhph22222@fpt.edu.vn', '', '', 0),
(5, 'someon', '123123', 'blqph00123@fpt.edu.vn', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `var_id` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `size` text NOT NULL,
  `color` text NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `cart_ibfk_1` (`id_var`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_checkout`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `donhang_ibfk_1` (`id_variant`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_danhmuc_sanpham` (`iddm`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`var_id`),
  ADD KEY `id_pro` (`id_pro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `var_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_var`) REFERENCES `variant` (`var_id`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_variant`) REFERENCES `variant` (`var_id`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_danhmuc_sanpham` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);

--
-- Constraints for table `variant`
--
ALTER TABLE `variant`
  ADD CONSTRAINT `variant_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `sanpham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
