-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 20, 2024 lúc 09:52 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tangquangnghiadk12cntt2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(12) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `pttt` tinyint(1) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `name`, `address`, `tel`, `email`, `total`, `pttt`, `user`) VALUES
(11, 'admin', '123', '123', 'admin@gmail.com', 100000, 0, ''),
(12, 'admin', '123', '456', '123@gmail.com', 100000, 0, ''),
(15, '123', '123', '123', '123', 100000, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(12) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `dongia` int(12) NOT NULL,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(12) NOT NULL,
  `idbill` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `tensp`, `img`, `dongia`, `soluong`, `thanhtien`, `idbill`) VALUES
(11, 'Áo Khoác Mùa Đông Nam ', 'aokhoacmuadong.jpg', 300000, 8, 2400000, 10),
(12, 'Áo Sơ Mi Trắng Nữ ', 'short jean.jfif', 100000, 1, 100000, 11),
(13, 'Áo Sơ Mi Trắng Nữ ', 'short jean.jfif', 100000, 1, 100000, 12),
(14, 'Áo Sơ Mi Trắng Nữ ', 'short jean.jfif', 100000, 2, 200000, 13),
(15, 'Áo Sơ Mi Trắng Nữ ', 'short jean.jfif', 100000, 1, 100000, 14),
(16, 'Áo Sơ Mi Trắng Nữ  ', 'short jean.jfif', 100000, 1, 100000, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `hoten` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sdt` int(12) NOT NULL,
  `ghichu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`hoten`, `email`, `sdt`, `ghichu`) VALUES
('Nguyễn Văn A', 'a@gmail.com', 123, 'ádasdasdad');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(10) NOT NULL,
  `nhom_id` varchar(11) NOT NULL,
  `tensp` varchar(30) NOT NULL,
  `mota` text NOT NULL,
  `soluong` int(200) NOT NULL,
  `dongia` int(11) NOT NULL,
  `dongiaold` int(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `enable` tinyint(11) NOT NULL,
  `ghichu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `nhom_id`, `tensp`, `mota`, `soluong`, `dongia`, `dongiaold`, `img`, `enable`, `ghichu`) VALUES
(1, '1', 'Áo Khoác Mùa Đông Nam ', 'Áo Khoác Mùa Đông Xịn Xò Pro Vip   ', 10, 300000, 350000, 'aokhoacmuadong.jpg', 1, 'Áo Khoác Mùa Đông Xịn Xò Pro Vip   '),
(2, '2', 'Áo Sơ Mi Trắng Nữ  ', 'Áo Sơ Mi Trắng Nữ Pro Vip Max  ', 5, 100000, 120000, 'short jean.jfif', 1, 'Áo Sơ Mi Trắng Nữ Pro Vip Max  '),
(3, '2', 'Áo Thun Tay Ngắn  ', 'Áo Thun Tay Ngắn In Họa Tiết Thời Trang Cho Nữ  ', 100, 500000, 540000, 'c22601915838fce7af790bcbfc2716dd.jpg', 1, 'Áo Thun Tay Ngắn In Họa Tiết Thời Trang Cho Nữ  '),
(4, '1', 'Quần Jean Nam Xám Màu Nam ', 'Quần Jean Nam Xám Màu  ', 10, 250000, 300000, 'quanjeannam.jpg', 1, 'Quần Jean Nam Xám Màu  '),
(5, '1', 'Giày Adidas Ultra Boots ', 'Giày Adidas Ultra Boots ', 4, 400000, 520000, 'hihi.jpg', 1, 'Giày Adidas Ultra Boots '),
(6, '1', 'Áo Thun Nam ', 'Áo Thun Nam ', 30, 20000, 250000, 'aothunnam.jpg', 1, 'Áo Thun Nam ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham_nhom`
--

CREATE TABLE `sanpham_nhom` (
  `id` int(10) NOT NULL,
  `tennhom` varchar(30) NOT NULL,
  `ghichu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham_nhom`
--

INSERT INTO `sanpham_nhom` (`id`, `tennhom`, `ghichu`) VALUES
(1, 'Thời Trang Nam', 'Chuyên Bán Đồ Cho Nam Giới'),
(2, 'Thời Trang Nữ', 'Chuyên Bán Đồ Cho Nữ Giới.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `tendangnhap` varchar(30) NOT NULL,
  `matkhau` varchar(30) DEFAULT NULL,
  `hoten` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `enable` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`tendangnhap`, `matkhau`, `hoten`, `email`, `enable`) VALUES
('123', '123', '123', '123@gmail.com', 1),
('admin', '123 ', 'Nguyễn Văn A ', 'admin@gmail.com ', 1),
('anhA', '202cb962ac59075b964b07152d234b', 'Nguyễn Văn AB', '123@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `nhom_id` int(11) NOT NULL DEFAULT 0,
  `tentintuc` varchar(30) NOT NULL,
  `tennguoidang` varchar(30) NOT NULL,
  `ngaydang` int(11) NOT NULL,
  `mota` text NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `nhom_id`, `tentintuc`, `tennguoidang`, `ngaydang`, `mota`, `img`) VALUES
(8, 1, 'Phối đồ nam với chiếc măng tô', 'Quang Nghĩa', 1, 'Phối đồ mùa đông với chiếc áo khoác măng tô luôn là sự lựa chọn hàng đầu của các chàng trai. Đây chính là món đồ không thể nào thiếu trong tủ đồ của nam giới bởi vì sự sang trọng và tạo nên phong cách riêng của người mặc. Cách phối đồ này tuy đơn giản nhưng vô cùng lợi hại khi phối cùng các trang phục khác. Bạn có thể kết hợp với quần xắn ống gấu, giày da cổ điển để tạo nên phong cách thanh lịch nhưng không kém phần năng động. Mặc áo sơ mi ở bên trong và khoác áo măng tô ở bên ngoài dù dạo phố hay đi học đều tạo được phong cách lịch sự và chỉn chu', 'phoidonam3.jpg'),
(9, 1, 'Phối đồ nam với chiếc áo gile', 'Shoujo', 2, 'Áo gile là trang phục đi liền với sự đẳng cấp và thời thượng là kiểu trang phục được phái mạnh rất ưa chuộng mỗi khi mùa đông về bởi nó mang lại sự phóng khoáng và sang trọng khi kết hợp với các  trang phục khác', 'phoidogile.jpg'),
(10, 2, 'Mẹo phối đồ cho nam gầy', 'Sora', 3, 'Một nguyên tắc tối quan trọng đối với những bạn gầy đó chính là phải mặc đồ vừa vặn với cơ thể. Nhiều bạn thường hay hiểu lầm rằng, người gầy nên mặc quần áo rộng sẽ che đi khuyết điểm nhưng thực chất việc này chỉ khiến cho bạn trở nên gầy hơn mà thôi. Bạn lưu ý nên chọn những chiếc quần jeans vừa vặn với cơ thể, không quá bó sát cũng không quá rộng. Ngoài ra, bạn cũng có thể kết hợp chúng với chiếc áo sơ mi dài tay giúp che đi cánh gây gân guốc của mình.', 'meo1.jpg'),
(11, 2, 'Mẹo phối đồ cho nam béo', 'Sola', 5, 'Tương tự như những bạn gầy, những người mập cũng nên chọn cho mình những bộ trang phục vừa vặn với cơ thể là thích hợp nhất. Bạn có thể mặc một chiếc áo sơ mi, áo thun tùy thích miễn là nó vừa với cơ thể bạn. Ngoài ra, bạn cũng có thể thử kết hợp áo cổ chữ V với quần vải hoặc quần jeans ống suông. Lưu ý nên chọn quần tối màu sẽ giúp che đi khuyết điểm ở đôi chân to, thô của bạn. Nếu chọn quần đùi, bạn cũng nên lưu ý không chọn quần quá gối vì sẽ làm bạn trở nên lùn hơn.', 'meo2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc_nhom`
--

CREATE TABLE `tintuc_nhom` (
  `id` int(10) NOT NULL,
  `tennhom` varchar(30) NOT NULL,
  `ghichu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc_nhom`
--

INSERT INTO `tintuc_nhom` (`id`, `tennhom`, `ghichu`) VALUES
(1, 'Phối đồ thời trang nam', 'xịn xò '),
(2, 'Mẹo Vặt Hay', 'Mẹo đó'),
(3, 'Sự kiện và Triển lãm', 'Hí HÍ '),
(4, 'Nhãn hiệu và Thiết kế', 'perfect'),
(5, 'Chăm sóc và Phụ kiện', 'ninnin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`tendangnhap`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc_nhom`
--
ALTER TABLE `tintuc_nhom`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
