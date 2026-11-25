# THÔNG TIN DỰ ÁN

- **Tên nhóm:** [Nhóm 05 (Mafia)]
- **Đề tài:** Quản lý Nông sản địa phương

## Danh sách thành viên

| STT | Họ và tên           | Mã sinh viên |
| :-- | :------------------ | :----------- |
| 1   | Mùa A Chạu          | 2023A0840    |
| 2   | Lò Tuấn Anh         | 2023A0834       |
| 3   | Tòng Thị Thanh Ngọc | 2023A0906    |
| 4   | Anai Tông Dia Va    | 2023AN046       |

## Cách tạo/chọn CSDL và Import SQL

1. Khởi động dịch vụ **Apache** và **MySQL** trên XAMPP (hoặc Laragon).
2. Mở trình duyệt và truy cập vào **phpMyAdmin** tại địa chỉ: `http://localhost/phpmyadmin`
3. Chọn mục **Cơ sở dữ liệu (Databases)** ở thanh trên cùng.
4. Tại ô **Tên cơ sở dữ liệu (Database name)**, nhập `ql_nong_san`, chọn bảng mã `utf8mb4_unicode_ci` rồi nhấn nút **Tạo (Create)**.
5. Nhấn chọn vào cơ sở dữ liệu `ql_nong_san` vừa tạo ở danh sách bên trái.
6. Chuyển sang thẻ **Nhập (Import)** ở thanh trên cùng.
7. Nhấn **Chọn tệp (Choose File)**, tìm chọn tệp `database.sql` trong thư mục mã nguồn của dự án.
8. Cuộn xuống cuối trang và nhấn nút **Nhập (Import)** để hoàn tất.

---

## Cấu trúc thư mục nộp bài (`ThietKe`)

```text
ThietKe/
├── ThietKe.pdf               # Báo cáo thiết kế hệ thống và cơ sở dữ liệu hoàn chỉnh
├── database.sql              # Tệp SQL khởi tạo 7 bảng CSDL và dữ liệu giả lập kiểm thử
├── README.md                 # Hướng dẫn cài đặt, import CSDL và cấu hình kết nối PHP
├── PHAN_CONG.md              # Bảng phân công nhiệm vụ và kế hoạch kiểm tra chéo
├── DONG_GOP.md               # Báo cáo đóng góp thực tế của thành viên và khai báo AI
└── nguon_so_do/              # Thư mục chứa mã nguồn PlantUML (.txt / .puml) của các sơ đồ
    ├── usecase_nongsan_uml_chuan.txt
    ├── deployment_nongsan.txt
    └── ...
```

---
## Cách để có thể chỉnh sửa sơ đồ

- Truy cấp `https://www.planttext.com/` sau đó dán tệp `.puml` ở thư mục `Mã nguồn sơ đồ uml` rồi chạy để ra sơ đồ
