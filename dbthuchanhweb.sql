-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 22, 2023 lúc 04:57 PM
-- Phiên bản máy phục vụ: 5.7.44
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbthuchanhweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondathang`
--

DROP TABLE IF EXISTS `dondathang`;
CREATE TABLE IF NOT EXISTS `dondathang` (
  `maddh` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `makh` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `tongtienhang` varchar(1000) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `pttt` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ngaydh` datetime DEFAULT NULL,
  `trangthai` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`maddh`),
  KEY `FK_makh` (`makh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dondathang`
--

INSERT INTO `dondathang` (`maddh`, `makh`, `tongtienhang`, `pttt`, `ngaydh`, `trangthai`) VALUES
('ddh1703192599', '15', '240000', 'Thanh toán khi nhận hàng', '2023-12-21 21:03:19', 'Đã giao'),
('ddh1703193422', '15', '270000', 'Thanh toán khi nhận hàng', '2023-12-21 21:17:02', 'Đã giao'),
('ddh1703196216', '15', '120000', 'Thanh toán khi nhận hàng', '2023-12-21 22:03:36', 'Chưa xử lý'),
('ddh1703197927', '15', '120000', 'Thanh toán khi nhận hàng', '2023-12-21 22:32:07', 'Chưa xử lý'),
('ddh1703198039', '15', '120000', 'Thanh toán khi nhận hàng', '2023-12-21 22:33:59', 'Chưa xử lý'),
('ddh1703198238', '15', '1020000', 'Thanh toán khi nhận hàng', '2023-12-21 22:37:18', 'Chưa xử lý'),
('ddh1703198371', '15', '240000', 'Thanh toán khi nhận hàng', '2023-12-21 22:39:31', 'Chưa xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanhsanpham`
--

DROP TABLE IF EXISTS `hinhanhsanpham`;
CREATE TABLE IF NOT EXISTS `hinhanhsanpham` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `masp` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `hinhanh` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `masp` (`masp`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanhsanpham`
--

INSERT INTO `hinhanhsanpham` (`id`, `masp`, `hinhanh`) VALUES
(1, 'SP1', 'product-1-1.jpg'),
(2, 'SP1', 'product-1-2.jpg'),
(6, 'SP1', 'product-1-3.jpg'),
(7, 'SP1', 'product-1-4.jpg'),
(8, 'SP2', 'product-2-1.jpg'),
(9, 'SP2', 'product-2-2.jpg'),
(12, 'SP2', 'product-2-3.jpg'),
(13, 'SP2', 'product-2-4.jpg'),
(14, 'SP2', 'product-2-3.jpg'),
(15, 'SP2', 'product-2-4.jpg'),
(16, 'SP3', 'product-3-1.jpg'),
(17, 'SP3', 'product-3-2.jpg'),
(18, 'SP3', 'product-3-3.jpg'),
(19, 'SP3', 'product-3-4.jpg'),
(20, 'SP4', 'product-4-1.jpg'),
(21, 'SP4', 'product-4-2.jpg'),
(22, 'SP4', 'product-4-3.jpg'),
(23, 'SP4', 'product-4-4.jpg'),
(24, 'SP5', 'product-5-1.jpg'),
(25, 'SP5', 'product-5-2.jpg'),
(26, 'SP5', 'product-5-3.jpg'),
(27, 'SP5', 'product-5-4.jpg'),
(28, 'SP6', 'product-6-1.jpg'),
(29, 'SP6', 'product-6-2.jpg'),
(30, 'SP6', 'product-6-3.jpg'),
(31, 'SP6', 'product-6-4.jpg'),
(32, 'SP6', 'product-6-4.jpg'),
(37, 'SP7', 'product-7-1.jpg'),
(38, 'SP7', 'product-7-2.jpg'),
(39, 'SP7', 'product-7-3.jpg'),
(40, 'SP7', 'product-7-4.jpg'),
(41, 'SP8', 'product-8-1.jpg'),
(42, 'SP8', 'product-8-2.jpg'),
(43, 'SP8', 'product-8-3.jpg'),
(44, 'SP8', 'product-8-4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `makh` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `tenkh` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `diachi` varchar(1000) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `sdt` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`makh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `diachi`, `sdt`) VALUES
('15', 'Trần Thắng', 'Nha Trang', '0866085276');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

DROP TABLE IF EXISTS `loaisanpham`;
CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `tenloai`) VALUES
(1, 'Túi'),
(2, 'Hộp bút');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `masp` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `tensp` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) DEFAULT '0',
  `thongtin` varchar(10000) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `tinhtrang` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `size` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `loaisanpham_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`masp`),
  KEY `loaisanpham_id` (`loaisanpham_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `gia`, `soluong`, `thongtin`, `tinhtrang`, `size`, `loaisanpham_id`) VALUES
('SP1', 'Hạ vào lòng em \'s ', 220000, 9, '- Cổ tên Hạ\n- Số đo 2 vòng 49x35cm\n- Đựng cả thế giới, chỉ tiếc là thế giới không có em\n(Chưa kèm phụ kiện)', 'Yêu thích', '49x35', 1),
('SP2', 'Út nhất trong nhà', 220000, 2, '- Cổ là em Út\n- Phiên bản giới hạn\n- Số đo 2 vòng 49x35cm\n- Có dây kéo tiện lợi\n- Đựng cả thế giới, đựng luôn cả em\n(Chưa kèm phụ kiện)', 'Nổi bật', '49x35', 1),
('SP3', 'Đông kiếm em', 220000, 13, '- Cổ tên Đông\n- Lá cứ đến gần Đông là rụng, em cứ đến gần anh là rung là động\n- Số đo 2 vòng 49x35cm\n- Đựng cả thế giới khi mùa đông về\n(Chưa kèm phụ kiện)', 'Yêu thích', '49x35', 1),
('SP4', 'Yêu là tha Thu', 220000, 12, '- Cổ tên Thu\n- Số đo 2 vòng 49x35cm\n- Đựng cả thế giới, đựng cả lời xin lỗi tới người yêu cũ\n(Chưa kèm phụ kiện)', 'Nổi bật', '49x35', 1),
('SP5', 'Chị Ba Lai', 220000, 0, '- Cổ tên Ba Lai\n- Số đo 2 vòng 49x35cm\n- Đựng cả thế giới là đơn giản với chị\n(Chưa kèm phụ kiện)', 'Mới nổi', '49x35', 1),
('SP6', 'Coban là coban', 210000, 28, '- Cổ tên Coban\n- Số đo 2 vòng 31x28cm\n- Có quai xách và quai đeo\n(Chưa kèm phụ kiện)', 'Nổi bật', '31x28', 1),
('SP7', 'Hường Hoa', 250000, 291, '- Cổ tên Hường Hoa\n- Móc khoá hoa: 20k/em (chuỷ bán kèm với túi của sốp hem bán lẻ)\n- Túi mini : 100k/em (có bán lẻ)\n- Mua combo: 350k hen', 'Nổi bật', '40x29', 1),
('SP8', 'Hộp bút nè', 100000, 30, '- Cổ là Hộp Bút\n- Không bao giờ lo mất bút khi sử dụng', 'Mới nổi', '20x10', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ho` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ten` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `sdt` char(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `ho`, `ten`, `sdt`, `username`, `password`, `email`, `diachi`) VALUES
(15, 'Trần', 'Thắng', '0866085276', 'quocthang', '$2y$10$s9W6PL6JCDitkoxx6IMnZOiiEVa5h95M7bngbKfkUd1HPZWYWknUG', 'comehere.thang@gmail.com', 'Nha Trang'),
(16, 'Lại', 'Toàn', '0913323418', 'vantoan', '$2y$10$UGU.g0McwqTPzG2GSKec/u2BEvfGcOLST17XZhlNsznLH8lcKg0WS', NULL, 'Huế');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `FK_makh` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`);

--
-- Các ràng buộc cho bảng `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  ADD CONSTRAINT `hinhanhsanpham_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`loaisanpham_id`) REFERENCES `loaisanpham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
