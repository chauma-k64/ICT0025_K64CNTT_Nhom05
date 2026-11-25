-- ==========================================================
-- TỆP KHỞI TẠO CƠ SỞ DỮ LIỆU: QL_NONG_SAN
-- Đề tài: Quản lý nông sản địa phương
-- Hệ quản trị: MySQL / MariaDB (Engine: InnoDB, Charset: utf8mb4)
-- Lưu ý: Import trực tiếp vào một CSDL trống
-- ==========================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";
SET NAMES utf8mb4;

-- --------------------------------------------------------
-- 1. Cấu trúc bảng `san_pham`
-- --------------------------------------------------------
CREATE TABLE `san_pham` (
  `id_san_pham` int(11) NOT NULL AUTO_INCREMENT,
  `ten_san_pham` varchar(150) NOT NULL,
  `loai_nong_san` varchar(100) NOT NULL,
  `don_vi_tinh` varchar(30) NOT NULL,
  `mo_ta` text NOT NULL,
  `trang_thai` tinyint(4) DEFAULT 1 COMMENT '1: đang hiển thị; 0: ngừng hiển thị',
  PRIMARY KEY (`id_san_pham`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `san_pham` (`id_san_pham`, `ten_san_pham`, `loai_nong_san`, `don_vi_tinh`, `mo_ta`, `trang_thai`) VALUES
(1, 'Xoài tròn Yên Châu', 'Cây ăn quả', 'Kg', 'Xoài đặc sản quả nhỏ, vị ngọt đậm, thơm đặc trưng vùng Yên Châu.', 1),
(2, 'Mận hậu Mộc Châu', 'Cây ăn quả', 'Kg', 'Mận hậu giòn, ngọt thanh, thu hoạch chính vụ từ tháng 5 đến tháng 6.', 1),
(3, 'Cà phê nhân Arabica', 'Cây công nghiệp', 'Tấn', 'Cà phê chè chất lượng cao trồng tại vùng cao Sơn La.', 1),
(4, 'Nhãn lồng Sông Mã', 'Cây ăn quả', 'Kg', 'Nhãn cùi dày, hạt nhỏ, đạt tiêu chuẩn VietGAP.', 1),
(5, 'Chè Shan tuyết Tà Xùa', 'Cây công nghiệp', 'Kg', 'Chè cổ thụ vùng cao, búp trắng tuyết, hương thơm tự nhiên.', 0);

-- --------------------------------------------------------
-- 2. Cấu trúc bảng `vung_trong` (Đã bỏ cột huyen)
-- --------------------------------------------------------
CREATE TABLE `vung_trong` (
  `id_vung_trong` int(11) NOT NULL AUTO_INCREMENT,
  `ten_vung_trong` varchar(150) NOT NULL,
  `ban` varchar(100) NOT NULL,
  `xa` varchar(100) NOT NULL,
  `tinh` varchar(100) NOT NULL,
  `mo_ta` text NOT NULL,
  PRIMARY KEY (`id_vung_trong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `vung_trong` (`id_vung_trong`, `ten_vung_trong`, `ban`, `xa`, `tinh`, `mo_ta`) VALUES
(1, 'Vùng chuyên canh Xoài Chiềng Pằn', 'Bản Khoóng', 'Chiềng Pằn', 'Sơn La', 'Vùng trồng xoài tròn lâu năm đạt chuẩn VietGAP.'),
(2, 'Vùng trồng Mận thung lũng Nà Ka', 'Tiểu khu Pa Khen', 'Tân Lập', 'Sơn La', 'Thung lũng trồng mận hậu tập trung quy mô lớn.'),
(3, 'Vùng cà phê Chiềng Ban', 'Bản Tòng', 'Chiềng Ban', 'Sơn La', 'Vùng nguyên liệu cà phê Arabica xuất khẩu.'),
(4, 'Vùng nhãn dọc sông Mã', 'Bản Hùn', 'Chiềng Khoong', 'Sơn La', 'Vùng trồng nhãn tập trung ven sông.');

-- --------------------------------------------------------
-- 3. Cấu trúc bảng `san_pham_vung_trong` (Có UNIQUE tổ hợp)
-- --------------------------------------------------------
CREATE TABLE `san_pham_vung_trong` (
  `id_sp_vung_trong` int(11) NOT NULL AUTO_INCREMENT,
  `id_san_pham` int(11) NOT NULL,
  `id_vung_trong` int(11) NOT NULL,
  `mua_vu` varchar(100) NOT NULL,
  `san_luong_du_kien` decimal(12,2) NOT NULL,
  `ghi_chu` text DEFAULT NULL,
  PRIMARY KEY (`id_sp_vung_trong`),
  UNIQUE KEY `uq_sp_vung_muavu` (`id_san_pham`, `id_vung_trong`, `mua_vu`),
  KEY `id_san_pham` (`id_san_pham`),
  KEY `id_vung_trong` (`id_vung_trong`),
  CONSTRAINT `san_pham_vung_trong_ibfk_1` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`),
  CONSTRAINT `san_pham_vung_trong_ibfk_2` FOREIGN KEY (`id_vung_trong`) REFERENCES `vung_trong` (`id_vung_trong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `san_pham_vung_trong` (`id_sp_vung_trong`, `id_san_pham`, `id_vung_trong`, `mua_vu`, `san_luong_du_kien`, `ghi_chu`) VALUES
(1, 1, 1, 'Vụ Hè (Tháng 5 - Tháng 7)', 450.50, 'Đạt chứng nhận mã số vùng trồng xuất khẩu'),
(2, 2, 2, 'Chính vụ (Tháng 5 - Tháng 6)', 1200.00, 'Sản lượng ổn định, phục vụ tiêu thụ nội địa và du lịch'),
(3, 3, 3, 'Vụ Thu Đông (Tháng 10 - Tháng 1)', 850.00, 'Thu hái quả chín đạt tỷ lệ trên 90%'),
(4, 4, 4, 'Vụ Hè Thu (Tháng 7 - Tháng 8)', 620.75, 'Đã ký bao tiêu một phần với doanh nghiệp');

-- --------------------------------------------------------
-- 4. Cấu trúc bảng `ho_kinh_doanh`
-- --------------------------------------------------------
CREATE TABLE `ho_kinh_doanh` (
  `id_ho` int(11) NOT NULL AUTO_INCREMENT,
  `ten_ho` varchar(150) NOT NULL,
  `ten_chu_ho` varchar(100) NOT NULL,
  `so_dien_thoai` varchar(20) NOT NULL,
  `dia_chi_chi_tiet` varchar(255) NOT NULL,
  `id_vung_trong` int(11) NOT NULL,
  `ngay_tham_gia` date NOT NULL,
  `trang_thai` tinyint(4) DEFAULT 1 COMMENT '1: đang tham gia; 0: ngừng tham gia',
  PRIMARY KEY (`id_ho`),
  KEY `id_vung_trong` (`id_vung_trong`),
  CONSTRAINT `ho_kinh_doanh_ibfk_1` FOREIGN KEY (`id_vung_trong`) REFERENCES `vung_trong` (`id_vung_trong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ho_kinh_doanh` (`id_ho`, `ten_ho`, `ten_chu_ho`, `so_dien_thoai`, `dia_chi_chi_tiet`, `id_vung_trong`, `ngay_tham_gia`, `trang_thai`) VALUES
(1, 'Hộ sản xuất Vì Văn Hùng', 'Vì Văn Hùng', '0356112233', 'Bản Khoóng, xã Chiềng Pằn', 1, '2023-03-15', 1),
(2, 'Hộ sản xuất Mùa A Sáng', 'Mùa A Sáng', '0389445566', 'Tiểu khu Pa Khen, xã Tân Lập', 2, '2022-11-20', 1),
(3, 'Hộ sản xuất Lò Văn Minh', 'Lò Văn Minh', '0966778899', 'Bản Tòng, xã Chiềng Ban', 3, '2024-01-10', 1),
(4, 'Hộ sản xuất Cầm Văn Toàn', 'Cầm Văn Toàn', '0944556677', 'Bản Hùn, xã Chiềng Khoong', 4, '2023-06-05', 0);

-- --------------------------------------------------------
-- 5. Cấu trúc bảng `tai_khoan`
-- --------------------------------------------------------
CREATE TABLE `tai_khoan` (
  `id_tai_khoan` int(11) NOT NULL AUTO_INCREMENT,
  `ten_dang_nhap` varchar(50) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `so_dien_thoai` varchar(20) NOT NULL,
  `vai_tro` varchar(30) NOT NULL,
  `trang_thai` tinyint(4) DEFAULT 1 COMMENT '1: hoạt động; 0: khóa',
  PRIMARY KEY (`id_tai_khoan`),
  UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tai_khoan` (`id_tai_khoan`, `ten_dang_nhap`, `mat_khau`, `ho_ten`, `email`, `so_dien_thoai`, `vai_tro`, `trang_thai`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Nguyễn Văn Quản Trị', 'admin@nongsan.vn', '0912345678', 'Admin', 1),
(2, 'nhanvien01', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Lò Thị Hoa', 'hoalt@nongsan.vn', '0987654321', 'NhanVien', 1),
(3, 'nhanvien02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Quàng Văn Nam', 'namqv@nongsan.vn', '0977112233', 'NhanVien', 0);

-- --------------------------------------------------------
-- 6. Cấu trúc bảng `gia_nong_san` (Đã bỏ don_vi_tinh, id_tai_khoan NOT NULL)
-- --------------------------------------------------------
CREATE TABLE `gia_nong_san` (
  `id_gia` int(11) NOT NULL AUTO_INCREMENT,
  `id_san_pham` int(11) NOT NULL,
  `loai_gia` enum('MUA','BAN') NOT NULL,
  `gia` decimal(12,2) NOT NULL,
  `ngay_ap_dung` date NOT NULL,
  `ngay_ket_thuc` date DEFAULT NULL,
  `id_tai_khoan` int(11) NOT NULL,
  `ghi_chu` text DEFAULT NULL,
  PRIMARY KEY (`id_gia`),
  KEY `id_san_pham` (`id_san_pham`),
  KEY `id_tai_khoan` (`id_tai_khoan`),
  CONSTRAINT `gia_nong_san_ibfk_1` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`),
  CONSTRAINT `gia_nong_san_ibfk_2` FOREIGN KEY (`id_tai_khoan`) REFERENCES `tai_khoan` (`id_tai_khoan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `gia_nong_san` (`id_gia`, `id_san_pham`, `loai_gia`, `gia`, `ngay_ap_dung`, `ngay_ket_thuc`, `id_tai_khoan`, `ghi_chu`) VALUES
(1, 1, 'MUA', 18000.00, '2026-05-01', '2026-05-31', 2, 'Giá thu mua tại vườn loại 1'),
(2, 1, 'BAN', 25000.00, '2026-05-01', '2026-05-31', 2, 'Giá bán sỉ tại kho HTX'),
(3, 2, 'MUA', 22000.00, '2026-05-10', NULL, 2, 'Giá đầu vụ, đang áp dụng'),
(4, 2, 'BAN', 32000.00, '2026-05-10', NULL, 2, 'Giá bán đóng hộp tiêu chuẩn'),
(5, 3, 'MUA', 115000000.00, '2026-11-01', NULL, 1, 'Giá thu mua cà phê nhân xô');

-- --------------------------------------------------------
-- 7. Cấu trúc bảng `dau_moi`
-- --------------------------------------------------------
CREATE TABLE `dau_moi` (
  `id_dau_moi` int(11) NOT NULL AUTO_INCREMENT,
  `ten_dau_moi` varchar(150) NOT NULL,
  `loai_dau_moi` enum('THU_MUA','TIEU_THU') NOT NULL,
  `nguoi_lien_he` varchar(100) NOT NULL,
  `so_dien_thoai` varchar(20) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `id_san_pham` int(11) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  PRIMARY KEY (`id_dau_moi`),
  KEY `id_san_pham` (`id_san_pham`),
  CONSTRAINT `dau_moi_ibfk_1` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `dau_moi` (`id_dau_moi`, `ten_dau_moi`, `loai_dau_moi`, `nguoi_lien_he`, `so_dien_thoai`, `dia_chi`, `id_san_pham`, `ghi_chu`) VALUES
(1, 'Công ty TNHH Xuất nhập khẩu Nông sản Tây Bắc', 'THU_MUA', 'Trần Minh Tuấn', '0901223344', 'TP. Sơn La, tỉnh Sơn La', 1, 'Thu mua xoài xuất khẩu số lượng lớn'),
(2, 'Hệ thống Siêu thị Nông sản Sạch Hà Nội', 'TIEU_THU', 'Lê Thu Trang', '0918998877', 'Quận Cầu Giấy, Hà Nội', 2, 'Nhập mận hậu đóng khay theo tuần'),
(3, 'Công ty Chế biến Cà phê Sơn La', 'THU_MUA', 'Phạm Hoàng Long', '0988123456', 'Huyện Mai Sơn, tỉnh Sơn La', 3, 'Thu mua cà phê nhân Arabica'),
(4, 'Thương lái tự do Nguyễn Văn Bình', 'THU_MUA', 'Nguyễn Văn Bình', '0377889900', 'Huyện Sông Mã, tỉnh Sơn La', 4, 'Thu mua nhãn tươi tại vườn');

COMMIT;
