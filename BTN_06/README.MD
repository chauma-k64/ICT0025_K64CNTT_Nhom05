# BÁO CÁO THỰC HÀNH NHÓM – BTN_05

- **Nhóm thực hiện:** Nhóm 05
- **Đề tài:** Quản lý nông sản địa phương
- **Bảng dữ liệu thực hành:** `SAN_PHAM`
- **Mục tiêu:** Thực hành kết nối CSDL bằng PDO, kiểm tra dữ liệu đầu vào (Validation), thêm dữ liệu an toàn bằng câu lệnh `PREPARE` (`INSERT`), truy vấn hiển thị bằng `SELECT` + vòng lặp `foreach`, và mã hóa đầu ra với `htmlspecialchars()`.

---

## 1. Phân công nhiệm vụ

|  STT  | Thành viên                        | Vai trò & Nhiệm vụ chính                                                                                                                                                                                                      | Phần giải thích luồng xử lý                                                                                                                   |
| :---: | :-------------------------------- | :---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | :-------------------------------------------------------------------------------------------------------------------------------------------- |
| **1** | **Mùa A Chạu**<br>_(Nhóm trưởng)_ | • Thiết lập CSDL trống, import tệp `.sql` và viết tệp kết nối `ketnoi.php` (PDO).<br>• Kiểm tra chéo code, tổng hợp tệp `Nhom05_BTN_05.zip`, đẩy code lên thư mục `BTN_05` trên GitHub và nộp bài lên LMS. Soft Delete        | Giải thích cấu hình kết nối **PDO** (`ketnoi.php`) và cơ chế truyền dữ liệu từ **Form HTML (`POST`)** sang PHP.                               |
| **2** | **Lò Tuấn Anh**                   | • Thiết kế giao diện Form thêm nông sản (gồm các trường: `ten_san_pham`, `don_vi_tinh`, `mo_ta`).<br>• Viết đoạn xử lý kiểm tra tính hợp lệ dữ liệu (`Validation` bằng `if`) không cho lưu nếu thiếu dữ liệu bắt buộc. Update | Giải thích luồng **Validation** (kiểm tra rỗng với `trim()`, `if`) và xử lý thông báo lỗi khi người dùng nhập thiếu.                          |
| **3** | **Tòng Thị Thanh Ngọc**           | • Viết câu lệnh `PREPARE` và thực thi `execute()` để `INSERT` dữ liệu mới vào bảng `SAN_PHAM` trong MySQL.<br>• Chạy thử và ghi nhận kết quả **Test Case 1** (nhập hợp lệ) và **Test Case 2** (nhập thiếu dữ liệu).           | Giải thích tác dụng và cách hoạt động của câu lệnh **`PREPARE` với tham số** (`:ten`, `:dvt`, `:mota`) khi lưu vào MySQL.                     |
| **4** | **Anai Tông Dia Va**              | • Viết truy vấn `SELECT` lấy danh sách nông sản từ bảng `SAN_PHAM`, dùng vòng lặp `foreach` và `htmlspecialchars()` để hiển thị ra bảng HTML.<br>• Chạy thử và ghi nhận kết quả **Test Case 3** (danh sách rỗng). Delele      | Giải thích luồng đọc dữ liệu từ **MySQL $\rightarrow$ PHP (`fetchAll`) $\rightarrow$ Bảng kết quả HTML** và vai trò của `htmlspecialchars()`. |
