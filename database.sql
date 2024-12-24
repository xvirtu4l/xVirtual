-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2024 at 07:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `idpro`, `iduser`, `noidung`, `ngaybinhluan`) VALUES
(1, 2, 1, 'test binh luan', '2024-01-05'),
(6, 4, 1, 'dùng rất thích ạ', '2024-01-11'),
(8, 3, 1, 'iphone rất đẹp cho chị em', '2024-01-11'),
(9, 6, 1, 'code sinh động', '2024-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_var` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `ship` int(11) NOT NULL,
  `tien_phai_tra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_var`, `soluong`, `tong_tien`, `ship`, `tien_phai_tra`) VALUES
(53, 6, 11, 2, 4000000, 2000, 4002000),
(54, 6, 4, 2, 16000000, 4000, 16004000),
(79, 9, 11, 3, 7900000, 20000, 7920000),
(80, 9, 4, 1, 8000000, 2000, 8002000),
(81, 9, 6, 1, 10000000, 2000, 10002000),
(84, 8, 6, 2, 20000000, 4000, 20004000);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`, `slug`) VALUES
(5, 'Điện thoại', 'dien-thoai'),
(6, 'Laptop', 'laptop'),
(7, 'Phụ kiện', 'phu-kien');

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
  `id_cart` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id_checkout`, `id_variant`, `first_name`, `last_name`, `email`, `address`, `phone`, `tien_hang`, `phi_ship`, `tong_tien`, `phuong_thuc`, `id_cart`, `status`, `created_at`, `updated_at`) VALUES
(33, 6, 'hien', 'bui', 'bui@mail.com', '22 xa dan', 999989888, 5555, 33, 5588, 'online', 81, 0, '2024-04-14 10:59:58', '2024-04-14 10:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `donhang_chi_tiet`
--

CREATE TABLE `donhang_chi_tiet` (
  `id_donhang_chi_tiet` int(11) NOT NULL,
  `id_donhang` int(11) DEFAULT NULL,
  `id_cart` int(11) DEFAULT NULL,
  `id_variant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `mota`, `luotxem`, `iddm`) VALUES
(3, 'Iphone 13 ', 10000000, 'iphone13.jpg', 'Điện thoại iPhone 13 128GB VN/A Pink thu hút với kiểu thiết kế ngôn ngữ phẳng hiện đại, nguyên khối vuông vức, tinh tế đến từng chi tiết. Điện thoại trang bị khung nhôm, mặt sau và trước bằng kính cường lực cao cấp toát lên vẻ ngoài sang chảnh, thời thượng và đảm bảo độ bền bỉ cao. Mặt trước của iPhone 13 được phủ lớp kính Ceramic Shield cứng cáp, sáng bóng, thanh lịch, bền đẹp, hạn chế xước vỡ. Phía ngoài màn hình còn được phủ lớp oleophobic hạn chế tình trạng bám bụi bẩn và mồ hôi giữ màn hình luôn sạch sẽ', 0, 5),
(4, 'Oppo A18', 4000000, 'oppo.jpg', 'Điện thoại OPPO A18 4GB/128GB Xanh sở hữu thiết kế với độ mỏng chỉ 8,16mm vô cùng gọn nhẹ tạo cảm giác thoải mái khi cầm trên tay. Các góc cạnh được bo cong mềm mại, hai bên vát cong nhẹ nhàng việc cầm nắm sẽ trở nên dễ dàng, chắc chắn hơn.', 0, 5),
(5, 'Laptop HP', 8000000, 'laptop_HP.jpg', 'HP 15 da0048TU là chiếc laptop Pentium thuộc phân khúc tầm trung của HP được trang bị cấu hình khá với Chíp vi xử lý Intel Pentium N5000, 4 GB RAM, ổ cứng HDD 500 GB và Card đồ họa tích hợp Intel HD Graphics. Sản phẩm đáp ứng tốt hầu hết các tác vụ đơn giản của người dùng hằng ngày như làm việc văn phòng, giải trí cơ bản, chơi game nhẹ nhàng hay người cần một chiếc laptop để học tập.', 0, 6),
(6, 'Laptop Acer', 8500000, 'laptop_acer.jpg', 'Laptop Acer As A315 có thiết kế khá bắt mắt với mặt lưng giả kim loại được phủ 1 lớp phay xước giúp máy trông cá tính và hạn chế bụi bẩn hơn. Mặc dù có kích thước lớn nhưng bốn góc của máy được bo cong giúp cho việc cầm nắm thoải mái, tạo cảm giác chắc chắn hơn.', 0, 6),
(7, 'Tai nghe blutooth', 1500000, 'tai_nghe.jpg', 'Tai nghe Bluetooth WIWU Airbuds SE Chuẩn kết nối: Bluetooth 5.1 Là tai nghe kiểu earbuds có đuôi thuôn dài hỗ trợ micro để đàm thoại một cách tốt hơn Thời lượng pin có thể nghe liên tục trong vòng 5 tiếng với âm lượng phù hợp.', 0, 7),
(20, 'Apple MacBook Air M1 256GB 2020 I Chính hãng Apple Việt Nam', 18690000, '661945c67462b.webp', 'Phù hợp cho lập trình viên, thiết kế đồ họa 2D, dân văn phòng Hiệu năng vượt trội - Cân mọi tác vụ từ word, exel đến chỉnh sửa ảnh trên các phần mềm như AI, PTS Đa nhiệm mượt mà - Ram 8GB cho phép vừa mở trình duyệt để tra cứu thông tin, vừa làm việc trên phần mềm Trang bị SSD 256GB - Cho thời gian khởi động nhanh chóng, tối ưu hoá thời gian load ứng dụng Chất lượng hình ảnh sắc nét - Màn hình Retina cao cấp cùng công nghệ TrueTone cân bằng màu sắc Thiết kế sang trọng - Nặng chỉ 1.29KG, độ dày 16.1mm. Tiện lợi mang theo mọi nơi', 1, 6),
(21, 'Macbook Air M3 13 inch 2024 8GB - 256GB | Chính hãng Apple Việt Nam', 27990000, '6619461c6588e.webp', 'Sức mạnh xử lý hàng đầu trên chip Apple M3 - Cân tốt mọi tác vụ từ đồ hoạ đến lập trình Màn hình Liquid Retina 13,6 inch - Màu sắc hiển thị rực rỡ, sắc nét Camera FaceTime HD 1080p - Đàm thoại, hội họp mọi lúc mọi nơi Hỗ trợ sạc 30W - Nhanh chóng nạp đầy pin khi bạn cần', 1, 6),
(22, 'Miếng Dán PPF Full Viền Mặt sau cho iPhone 11 Pro Max', 135000, '6619470aab99a.webp', 'Dán mặt sau điện thoại giúp tránh trầy xước, phai màu sơn, bụi bẩn và dấu vân tay Miếng dán mặt sau là một phụ kiện bảo vệ tốt cho điện thoại của bạn. Không chỉ nên dùng ốp lưng để bảo vệ điện thoại của mình mà bạn nên dán mặt sau điện thoại trước khi sử dụng ốp. Ốp chỉ có thể bảo vệ các tác nhân bên ngoài một cách gián tiếp, nhưng miếng dán màn hình sẽ bảo vệ trực tiếp điện thoại của bạn.', 1, 7),
(23, 'Samsung Galaxy A15 LTE 8GB 128GB', 4790000, '661947d9cb361.webp', 'Giải trí đa nội dung - Màn hình lớn 6.5inch với công nghệ Super AMOLED cho hình ảnh sắc nét Dễ dàng xử lí mọi tác vụ - Chip MediaTek Helio G99 cùng RAM 8GB cực chiến Thoải mái sử dụng cả ngày - Pin 5000mAh với công nghệ sạc nhanh 25W Quay chụp chuẩn điện ảnh - Cụm 3 camera sau lên đến 50MP cho hình ảnh chất lượng', 1, 5),
(24, 'Sạc nhanh 20W Apple MHJE3ZA | Chính hãng Apple Việt Nam', 450000, '6619482dacce8.webp', 'Công nghệ PD sạc cho các sản phẩm Apple nhanh chóng Cổng Type-C công suất 20W giúp tiết kiệm nhiều thời gian Thiết kế chuẩn thương hiệu Apple nhỏ gọn và sang trọng Bảo vệ quá dòng, tránh hiện tượng chập mạch, quá nhiệt', 1, 7),
(25, 'Pin sạc dự phòng Innostyle PowerGo Smart Ai 10000mAh', 450000, '66194866b1a92.webp', 'Công nghệ Smart AI có khả năng điều chỉnh công suất sạc phù hợp Thiết kế vỏ ngoài dạng vân sọc giúp hạn chế trầy xước khi bị va đập Trang bị hai cổng sạc ra USB-A 10 W giúp đảm bảo tối ưu tốc độ sạc Viên pin đến 10.000 mAh đáp ứng tốt nhu cầu sạc pin cho các thiết bị', 1, 7),
(26, 'Tai nghe Bluetooth Apple AirPods Pro 2 2023 USB-C | Chính hãng Apple Việt Nam', 5690000, '6619489522e45.webp', 'Tích hợp chip Apple H2 mang đến chất âm sống động cùng khả năng tái tạo âm thanh 3 chiều vượt trội Công nghệ Bluetooth 5.3 kết nối ổn định, mượt mà, tiêu thụ năng lượng thấp, giúp tiết kiệm pin đáng kể Chống ồn chủ động loại bỏ tiếng ồn hiệu quả gấp đôi thế hệ trước, giúp nâng cao trải nghiệm nghe nhạc Chống nước chuẩn IP54 trên tai nghe và hộp sạc, giúp bạn thỏa sức tập luyện không cần lo thấm mồ hôi', 1, 7),
(27, 'Pin sạc dự phòng Energizer 20.000mAh UE20012PQ', 690000, '661948ed59560.webp', 'Tổng công suất đầu ra lên đến 22.5W hỗ trợ sạc nhanh cho mọi thiết bị điện tử Cổng đầu ra USB-A tích hợp công nghệ sạc nhanh đa nền tảng QC/VOOC/SCP Dung lượng pin lên đến 20.000 hỗ trợ sạc lại từ 4-6 lần cho điện thoại tiêu chuẩn Kiểu dáng hiện đại, kích thước nhỏ gọn giúp dễ dàng bỏ túi mang theo bên cạnh', 1, 7),
(28, 'Phone 11 64GB | Chính hãng VN/A', 8890000, '66194961aa413.webp', 'ĐẶC ĐIỂM NỔI BẬT Màu sắc phù hợp cá tính - 6 màu sắc bắt mắt để lựa chọn Hiệu năng mượt mà, ổn định - Chip A13, RAM 4GB Bắt trọn khung hình - Camera kép hỗ trợ góc rộng, chế độ Night Mode Yên tâm sử dụng - Kháng nước, kháng bụi IP68, kính cường lực Gorilla', 1, 5),
(29, 'iPhone 15 Pro Max 256GB | Chính hãng VN/A', 29790000, '6619498d4ed0e.webp', 'Thiết kế khung viền từ titan chuẩn hàng không vũ trụ - Cực nhẹ, bền cùng viền cạnh mỏng cầm nắm thoải mái Hiệu năng Pro chiến game thả ga - Chip A17 Pro mang lại hiệu năng đồ họa vô cùng sống động và chân thực Thoả sức sáng tạo và quay phim chuyên nghiệp - Cụm 3 camera sau đến 48MP và nhiều chế độ tiên tiến Nút tác vụ mới giúp nhanh chóng kích hoạt tính năng yêu thích của bạn', 1, 5),
(30, 'Ốp lưng iPhone 14 Pro Max UAG Pathfinder hỗ trợ sạc Magsafe', 1120000, '661949b600914.webp', 'Thiết kế nhựa cứng chống sốc an toàn khi thả rơi từ 5.5m theo nhà sản xuất Hỗ trợ sạc không dây chuẩn MagSafe dành cho các Apple Với 8 màu sắc trung tính phù hợp cho đại đa số người dùng, thoải mái thể hiện cá tính', 1, 7),
(31, 'Ốp lưng iPhone 15 Pro Max Silicone Trong Suốt Hỗ Trợ Magsafe', 1050000, '661949dce0221.webp', 'Ốp lưng iPhone 15 Pro Max hỗ trợ sạc Magsafe - Bảo vệ bền bỉ dưới mọi tác động Ốp lưng iPhone 15 Pro Max hỗ trợ sạc Magsafe là sản phẩm chính hãng đến từ Apple dành riêng cho iPhone 15 Pro Max. Do đó, ốp được hoàn thiện tỉ mỉ mang tới vẻ ngoài đẹp, bảo vệ toàn diện góc cạnh và có hỗ trợ sạc MagSafe tiện lợi.', 1, 7),
(32, 'Ốp lưng iPhone 15 Pro Max Silicone hỗ trợ sạc Magsafe', 1050000, '661949fc17311.webp', 'Ốp lưng iPhone 15 Pro Max Silicone hỗ trợ sạc Magsafe - Bảo vệ bền bỉ dưới mọi tác động Ốp lưng iPhone 15 Pro Max Silicone hỗ trợ sạc Magsafe là sản phẩm chính hãng đến từ Apple dành riêng cho iPhone 15 Pro Max. Do đó, ốp được hoàn thiện tỉ mỉ mang tới vẻ ngoài đẹp, bảo vệ toàn diện góc cạnh và có hỗ trợ sạc MagSafe tiện lợi.  Đa dạng màu sắc cùng sạc không dây hiện đại Ốp lưng iPhone 15 Pro Max Silicone hỗ trợ sạc Magsafe được làm theo phong cách tinh giản đặc trưng của Apple. Bên ngoài sẽ có thêm lớp phủ chống trầy nên nhìn khá sáng bóng và tôn lên trọn vẹn vẻ đẹp nguyên bản của chiếc iPhone cao cấp.', 1, 7),
(33, 'OPPO Reno11 F 5G 8GB 256GB', 8390000, '66194a2807074.webp', 'Thoải mái sáng tạo nhiếp ảnh - Với cụm 3 camera lên đến 64MP đi kèm nhiều tính năng chỉnh sửa thú vị Rực rỡ mọi góc nhìn - Màn hình AMOLED 120Hz, cùng khả năng hiển thị trên 1 tỉ màu Giải trí mượt mà, đa dạng tác vụ - Chip xử lí mạnh mẽ Dimensity 7050 5G cùng RAM 8GB Năng lượng bền bỉ cả ngày dài - Pin lớn 5.000mAh cùng chế độ sạc nhanh 67W', 1, 5),
(34, 'Pin sạc dự phòng Baseus Airpow Fast Charge 20000mAh 20W', 420000, '66194a53ebe54.webp', 'Được trang bị 3 cổng sạc: Type-C, USB-A và Micro, có thể tối đa 2 thiết bị cùng lúc Sạc nhanh PD hai chiều với cả cổng Type-C và Micro, công suất sạc tối đa là 20W Nổi bật với 9 biện pháp bảo vệ an toàn và có chip kiểm soát nhiệt độ Baseus NTC Dung lượng pin 20.000mAh cung cấp đủ năng lượng cho sạc pin nhiều giờ liên tục', 1, 7),
(35, 'Samsung Galaxy S23 FE 5G 8GB 128GB', 11790000, '66194a88a5694.webp', 'Galaxy AI tiện ích - Khoanh vùng search đa năng, là trợ lý chỉnh ảnh, chat thông minh, phiên dịch trực tiếp Giải trí với khung hình và âm thanh sống động - Màn hình Dynamic AMOLED 2X, 120Hz cùng công nghệ âm thanh nổi Chụp ảnh chuyên nghiệp trong bất kì hoàn cảnh nào - Camera 50MP chụp đêm sống động và ổn định Hiệu suất cải tiến vượt bậc - Vi xử lý Exynos 2200 tiến trình 4nm mạnh mẽ Năng lượng cho cả ngày - Viên pin 4500mAh cùng sạc nhanh đến 25W thần tốc', 1, 5),
(36, 'Samsung Galaxy Z Fold5 12GB 512GB', 29990000, '66194ab79a9e2.webp', 'Galaxy AI tiện ích - Khoanh vùng search đa năng, là trợ lý chỉnh ảnh, trợ lý note thông minh, phiên dịch trực tiếp Thiết kế tinh tế với nếp gấp vô hình - Cải tiến nếp gấp thẩm mĩ hơn và gập không kẽ hở Bền bỉ bất chấp mọi tình huống - Đạt chuẩn kháng bụi và nước IPX8 cùng chất liệu nhôm Armor Aluminum giúp hạn chế cong và xước Mở ra không gian giải trí cực đại với màn hình trong 7.6\"\" cùng bản lề Flex dẫn đầu công nghệ Thoải mái sáng tạo mọi lúc - Bút Spen tiện dụng giúp bạn phác hoạ và ghi chép không cần đến sổ tay Hiệu năng cân mọi tác vụ - Snapdragon® 8 Gen 2 for Galaxy xử lí mượt mà, đa nhiệm mượt mà', 1, 5),
(37, 'Samsung Galaxy S24 Ultra 12GB 512GB', 30990000, '66194ae050a5b.webp', 'Mở khoá giới hạn tiềm năng với AI - Hỗ trợ phiên dịch cuộc gọi, khoanh vùng tìm kiếm, Trợ lí Note và chình sửa anh Tuyệt tác thiết kế bền bỉ và hoàn hảo - Vỏ ngoài bằng titan mới cùng màu sắc lấy cảm hứng từ chất liệu đá tự nhiên Tích hợp S-Pen cực nhạy - Thoải mát viết, chạm thật chính xác trên màn hình cùng nhiều tính năng tiện ích Nắm trong tay trọn bộ chi tiết chân thực nhất - Camera 200MP hỗ trợ khả năng xử lý AI cải thiện độ nét và tông màu', 1, 5),
(38, 'Laptop ASUS Zenbook 14 OLED UM3402YA-KM405W', 20490000, '66194b0a57717.webp', 'CPU AMD Ryzen 5 7530U xử lý nhanh chóng mọi tác vụ học tập, văn phòng. Màn hình 14 inch OLED 2.8K cho màu sắc hiển thị rực rỡ, chân thực cùng công nghệ lọc ánh sáng xanh lên đến 70%. Đồ họa AMD Radeon Graphics dễ dàng chỉnh sửa hình ảnh cơ bản hay chơi các tựa game nhẹ. Bộ nhớ RAM 16GB LPDDR4X chạy nhiều ứng dụng cùng lúc mà không lo lag giật. Ổ cứng SSD 512GB cho tốc độc truy cập dữ liệu nhanh chóng. Lớp vỏ được làm từ kim loại cao cấp, khối lượng gọn nhẹ chỉ 1.39 kg.', 1, 6),
(39, 'Laptop ASUS VivoBook 15 OLED A1505VA-L1114W', 17290000, '66194b3910582.webp', 'Màn hình 15.6 inch tấm nền OLED cho khả năng tái tạo hoàn hảo CPU Intel Core i5-13500H mạnh mẽ có thể xử lý mượt mà mọi tác vụ Card Intel Iris XE cho trải nghiệm giải trí cao RAM 16 GB chạy đa ứng dụng mượt mà không lo giật, lag Ổ cứng SSD 512 GB cho tốc độ truy xuất dữ liệu nhanh, không gian lưu trữ đủ lớn', 1, 6),
(40, 'Laptop Lenovo Ideapad Slim 5 14IAH8 83BF002NVN', 14990000, '66194b6da0477.webp', 'Sở hữu thiết kế tinh tế với lớp vỏ nhôm sáng bóng, sang trọng Màn hình 14 inch WUXGA cực sắc nét, hỗ trợ làm việc, giải trí dễ dàng CPU Intel Core i5-12450H mạnh mẽ, giải quyết nhanh mọi tác vụ học tập, văn phòng RAM 16GB cùng ổ cứng 512GB SSD đa nhiệm, mở máy, mở ứng dụng cực nhanh Độ sáng lên đến 300nits hỗ trợ làm việc ở nơi có ánh sáng yếu', 1, 6),
(41, 'Laptop ASUS TUF Gaming F15 FX507ZC4-HN074W', 19490000, '66194b93b393a.webp', 'CPU Intel Core i5 12500H dễ dàng xử lý các tác vụ nặng và chơi game AAA cấu hình cao Card NVIDIA GeForce RTX 3050 cải thiện hiệu suất xử lý đồ họa và đảm bảo trải nghiệm chơi game tuyệt vời Màn hình 15.6 inch Full HD cùng tần số quét 144 Hz hỗ trợ chơi game sống động với tốc độ cực nhanh RAM 8GB cùng ổ cứng 512 GB SSD rút ngắn thời gian mở máy, khởi động ứng dụng Bàn phím 1-Zone RGB cùng TUF Aura Core để bạn có thể thể hiện phong cách độc đáo của riêng mình', 1, 6),
(42, 'Laptop ASUS TUF GAMING F15 FX506HF-HN014W', 16290000, '66194bd987d9a.webp', 'Thiết kế laptop sang trọng thích hợp giúp bạn bỏ vào balo mang theo bên mình CPU Intel Core i5-11400H cho phép bạn thỏa thích chiến các tựa game nặng Ổ cứng SSD 512GB giúp bạn lưu trữ nhiều thông tin, dữ liệu mà không cần sao chép quá USB Màn hình 15.6 inch cùng tính năng chống lóa sẽ bảo vệ mắt của bạn trong quá trình chơi game Trang bị nhiều cổng kết nối giúp quá trình nhận và chia sẻ dữ liệu trở nên dễ dàng, thuận tiện', 1, 6),
(43, 'Laptop Lenovo LOQ 15IAX9 83GS000FVN', 17490000, '66194c09b3858.webp', 'Trang bị bộ vi xử lý Intel Core I5-12450HX cân mọi tác vụ từ văn phòng cho đến chơi game. Card đồ họa RTX 2050 hỗ trợ chỉnh sửa ảnh, video 3D, chơi game mượt mà. RAM 8GB DDR5-4800 SO-DIMM cùng ổ cứng 512GB SSD cho không gian lưu trữ rộng rãi, hỗ trợ mở ứng dụng, tài liệu nhanh chóng. Màn hình 15.6 inch FHD cùng tần số quét 144Hz cho bạn thoải mái chơi game, bắt kịp mọi thao tác của đối thủ.', 1, 6),
(44, 'Xiaomi Redmi Note 13 6GB 128GB', 4690000, '66194d0b83c97.webp', 'Bắt trọn khoảnh khắc - Cụm camera đến 108MP mạnh mẽ cùng khả năng thu phóng 3x Màn hình đẳng cấp - Kích thước lớn 6.67\" AMOLED 120hz cuộn lướt mượt mà Hiệu suất ổn định, đa nhiệm dễ dàng - Snapdragon 685 8 nhân cùng RAM 6GB Trải nghiệm cả ngày không lo lắng - pin 5000mAh cùng sạc nhanh 33W', 1, 5);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '', '', 1),
(8, 'xxx', '123456789', 'xxx@mail.com', 'xxx', '09999999999999', 1),
(9, 'test', '123456789', 'test@mail.com', '444 hn', '556765756', 0);

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `var_id` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `storage` text NOT NULL,
  `color` text NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `variant`
--

INSERT INTO `variant` (`var_id`, `id_pro`, `storage`, `color`, `price`, `quantity`) VALUES
(1, 3, '4GB/128GB', 'black', 10000000, 0),
(2, 3, '4GB/256GB', 'white', 10000000, 0),
(3, 3, '4GB/512GB', 'pink', 10000000, 0),
(4, 5, '12GB/256GB', 'black', 10000000, 88),
(5, 3, '4GB/128GB', 'white', 10000000, 0),
(6, 3, '4GB/256GB', 'black', 10000000, 10),
(7, 3, '4GB/512GB', 'white', 10000000, 10),
(8, 3, '4GB/512GB', 'black', 10000000, 0),
(9, 3, '4GB/128GB', 'pink', 10000000, 10),
(10, 3, '4GB/256GB', 'pink', 10000000, 0),
(11, 4, '222GB', 'red', 4000000, 66);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount_value` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `start_date`, `end_date`, `quantity`, `discount_value`) VALUES
(1, '123', '2024-04-01 23:44:20', '2024-04-12 04:44:20', 9, 0.05);

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
-- Indexes for table `donhang_chi_tiet`
--
ALTER TABLE `donhang_chi_tiet`
  ADD PRIMARY KEY (`id_donhang_chi_tiet`),
  ADD KEY `id_donhang` (`id_donhang`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `id_variant` (`id_variant`);

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
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

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
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `donhang_chi_tiet`
--
ALTER TABLE `donhang_chi_tiet`
  MODIFY `id_donhang_chi_tiet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `var_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_var`) REFERENCES `variant` (`var_id`);

--
-- Constraints for table `donhang_chi_tiet`
--
ALTER TABLE `donhang_chi_tiet`
  ADD CONSTRAINT `donhang_chi_tiet_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id_checkout`),
  ADD CONSTRAINT `donhang_chi_tiet_ibfk_2` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`),
  ADD CONSTRAINT `donhang_chi_tiet_ibfk_3` FOREIGN KEY (`id_variant`) REFERENCES `variant` (`var_id`);

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
