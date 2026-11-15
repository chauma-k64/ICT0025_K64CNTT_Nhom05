CREATE DATABASE QL_NONG_SAN
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE QL_NONG_SAN;

-- 3.1. Bảng SAN_PHAM
CREATE TABLE SAN_PHAM (
    id_san_pham INT AUTO_INCREMENT PRIMARY KEY,
    ten_san_pham VARCHAR(150) NOT NULL,
    loai_nong_san VARCHAR(100),
    don_vi_tinh VARCHAR(30) NOT NULL,
    mo_ta TEXT,
    trang_thai TINYINT DEFAULT 1
);

-- 3.2. Bảng VUNG_TRONG
CREATE TABLE VUNG_TRONG (
    id_vung_trong INT AUTO_INCREMENT PRIMARY KEY,
    ten_vung_trong VARCHAR(150) NOT NULL,
    xa VARCHAR(100) NOT NULL,
    ban VARCHAR(100),
    huyen VARCHAR(100) NOT NULL,
    tinh VARCHAR(100) NOT NULL,
    mo_ta TEXT
);

-- 3.3. Bảng SAN_PHAM_VUNG_TRONG
CREATE TABLE SAN_PHAM_VUNG_TRONG (
    id_sp_vung_trong INT AUTO_INCREMENT PRIMARY KEY,
    id_san_pham INT NOT NULL,
    id_vung_trong INT NOT NULL,
    mua_vu VARCHAR(100),
    san_luong_du_kien DECIMAL(12,2),
    ghi_chu TEXT,
    FOREIGN KEY (id_san_pham) REFERENCES SAN_PHAM(id_san_pham),
    FOREIGN KEY (id_vung_trong) REFERENCES VUNG_TRONG(id_vung_trong)
);

-- 3.4. Bảng HO_KINH_DOANH
CREATE TABLE HO_KINH_DOANH (
    id_ho INT AUTO_INCREMENT PRIMARY KEY,
    ten_ho VARCHAR(150) NOT NULL,
    ten_chu_ho VARCHAR(100) NOT NULL,
    so_dien_thoai VARCHAR(20),
    dia_chi_chi_tiet VARCHAR(255),
    id_vung_trong INT NOT NULL,
    ngay_tham_gia DATE,
    trang_thai TINYINT DEFAULT 1,
    FOREIGN KEY (id_vung_trong) REFERENCES VUNG_TRONG(id_vung_trong)
);

-- 3.7. Bảng TAI_KHOAN (Tạo trước để GIA_NONG_SAN tham chiếu khóa ngoại)
CREATE TABLE TAI_KHOAN (
    id_tai_khoan INT AUTO_INCREMENT PRIMARY KEY,
    ten_dang_nhap VARCHAR(50) NOT NULL UNIQUE,
    mat_khau VARCHAR(255) NOT NULL,
    ho_ten VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    so_dien_thoai VARCHAR(20),
    vai_tro VARCHAR(30) NOT NULL,
    trang_thai TINYINT DEFAULT 1
);

-- 3.5. Bảng GIA_NONG_SAN
CREATE TABLE GIA_NONG_SAN (
    id_gia INT AUTO_INCREMENT PRIMARY KEY,
    id_san_pham INT NOT NULL,
    loai_gia ENUM('MUA','BAN') NOT NULL,
    gia DECIMAL(12,2) NOT NULL,
    don_vi_tinh VARCHAR(30) NOT NULL,
    ngay_ap_dung DATE NOT NULL,
    ngay_ket_thuc DATE,
    id_tai_khoan INT,
    ghi_chu TEXT,
    FOREIGN KEY (id_san_pham) REFERENCES SAN_PHAM(id_san_pham),
    FOREIGN KEY (id_tai_khoan) REFERENCES TAI_KHOAN(id_tai_khoan)
);

-- 3.6. Bảng DAU_MOI
CREATE TABLE DAU_MOI (
    id_dau_moi INT AUTO_INCREMENT PRIMARY KEY,
    ten_dau_moi VARCHAR(150) NOT NULL,
    loai_dau_moi ENUM('THU_MUA','TIEU_THU') NOT NULL,
    nguoi_lien_he VARCHAR(100),
    so_dien_thoai VARCHAR(20),
    dia_chi VARCHAR(255),
    id_san_pham INT,
    ghi_chu TEXT,
    FOREIGN KEY (id_san_pham) REFERENCES SAN_PHAM(id_san_pham)
);