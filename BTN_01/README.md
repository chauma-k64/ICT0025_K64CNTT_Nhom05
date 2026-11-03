# BÁO CÁO BÀI TẬP NHÓM

- Nhóm: 05

---

## 1. Cách chạy chương trình

1. Cài đặt XAMPP và khởi động Apache.
2. Đặt thư mục bài tập vào `C:/xampp/htdocs/`.
3. Mở trình duyệt web và truy cập các tệp theo đường dẫn: `http://localhost/Nhom_05/[ten-tep].php`.

---

## 2. Báo cáo chi tiết từng tệp

### 01_cu_phap.php

- **Nội dung:**
  - Nhúng mã PHP vào khung HTML, in tiêu đề và lời chào, có kèm chú thích.
  - Tích hợp biểu mẫu HTML sử dụng phương thức `GET` với ô nhập `hoVaTen` và nút bấm "Gửi".
  - Dùng hàm `isset()` kiểm tra sự kiện gửi dữ liệu, nhận giá trị người dùng nhập vào biến `$hoVaTen` và xuất lời chào cá nhân hóa trực tiếp lên giao diện.
- **Trả lời câu hỏi:**
  - _PHP thực thi ở đâu?_ PHP được thực thi trên máy chủ dịch vụ web (Web Server) trước khi gửi kết quả về máy khách.
  - _Trình duyệt nhận được gì?_ Trình duyệt chỉ nhận về mã HTML/CSS thuần do máy chủ trả về, hoàn toàn không thấy mã nguồn PHP gốc.

### 02_bien.php

- **Nội dung:** Khai báo biến tên hàng, số lượng, đơn giá; hiển thị và đổi số lượng; sử dụng toán tử nối chuỗi `.`.
- **Trả lời câu hỏi:**
  - _Quy tắc ký hiệu `$`:_ Tên biến trong PHP bắt buộc bắt đầu bằng dấu `$`, theo sau là chữ cái hoặc dấu gạch dưới `_`, phân biệt chữ hoa và chữ thường.
  - _Tên biến hợp lệ:_ `$soLuong`, `$don_gia_hang`.
  - _Tên biến không hợp lệ:_ `$1soLuong` (bắt đầu bằng chữ số), `$don-gia` (chứa dấu gạch ngang).
  - _So sánh:_ Giống C++/Java ở quy tắc đặt tên chữ và số; khác ở chỗ PHP bắt buộc có dấu `$` ở đầu và không cần khai báo kiểu dữ liệu tường minh.

### 03_hang.php

- **Nội dung:** Khai báo hằng `DON_VI_TIEN` bằng `define()` và `TY_LE_THUE` bằng `const`, kết hợp hằng với biến để tính thuế.
- **Trả lời câu hỏi:**
  - _Sự khác nhau giữa biến và hằng:_ Biến có tiền tố `$`, giá trị có thể thay đổi trong quá trình chạy. Hằng không có tiền tố `$`, giá trị không thể thay đổi hay định nghĩa lại sau khi đã gán.

### 04_kieu_du_lieu.php

- **Nội dung:** Sử dụng `var_dump()` để kiểm tra các kiểu dữ liệu và ép kiểu chuỗi số `"12"` sang số nguyên.
- **Kết quả quan sát:**
  - `string(13) "Mùa A Chạu"`
  - `int(22)`
  - `float(56.5)`
  - `bool(true)`
  - `NULL`
  - Chuỗi `"12"` sau khi ép kiểu: `int(12)`.
- **Điều rút ra:** PHP tự động gán kiểu dữ liệu phù hợp với ngữ cảnh giá trị, nhưng vẫn cho phép ép kiểu tường minh qua cú pháp `(kiểu_du_lieu)$bien`.

### 05_toan_tu.php

- **Nội dung:** Thực hiện các phép tính cộng, trừ, nhân, chia, chia lấy dư, gán kết hợp `+=`, toán tử logic `&&` và so sánh.
- **Kết quả quan sát & Giải thích:**
  - `5 == "5"` cho ra `bool(true)`: Toán tử `==` chỉ so sánh giá trị sau khi tự động ép kiểu dữ liệu.
  - `5 === "5"` cho ra `bool(false)`: Toán tử `===` so sánh tuyệt đối cả giá trị lẫn kiểu dữ liệu (số nguyên `int` khác chuỗi `string`).

### 06_van_dung.php

- **Bộ dữ liệu 1 (Dữ liệu chuẩn đối chiếu theo đề bài):**
  - Tên nông sản: Gạo ST25
  - Đầu vào: Số lượng = 3 kg, Đơn giá = 25.000 VNĐ, Tỷ lệ phí = 5% (hằng số)
  - Biểu thức tính:
    - Tiền hàng = (3 \* 25.000) = 75.000 VNĐ
    - Tiền phí = (75.000 \* 0.05) = 3.750 VNĐ
    - Tổng tiền = (75.000 + 3.750) = 78.750 VNĐ
  - Kết quả hiển thị: 78.750 VNĐ (Khớp đúng số mẫu đề bài yêu cầu).

- **Mô tả:** Ứng dụng biến, hằng và biểu thức có ngoặc để tính tiền xuất kho nông sản kèm phí vận chuyển/bảo quản.
- **Bộ dữ liệu 1 (Dữ liệu chuẩn đối chiếu theo đề bài):**
  - Tên nông sản: Táo mèo
  - Đầu vào: Số lượng = 100 kg, Đơn giá = 8.000 VNĐ, Tỷ lệ phí = 5% (hằng số)
  - Biểu thức tính:
    - Tiền hàng = (100 \* 8.000) = 800.000 VNĐ
    - Tiền phí = (800.000 \* 0.05) = 40.000 VNĐ
    - Tổng tiền = (800.000 + 40.000) = 840.000 VNĐ
  - Kết quả hiển thị: 840.000 VNĐ
