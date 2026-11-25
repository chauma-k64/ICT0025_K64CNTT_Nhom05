# BÁO CÁO ĐÓNG GÓP THÀNH VIÊN & SỬ DỤNG AI

- **Nhóm thực hiện:** Nhóm 05
- **Đề tài:** Quản lý nông sản địa phương
- **Lưu ý:** Tệp này ghi nhận công việc **thực tế đã hoàn thành**, kết quả **kiểm tra chéo** bài của thành viên khác và **khai báo trung thực việc sử dụng công cụ AI** của từng thành viên.

---

## 1. Ghi nhận đóng góp thực tế & Kiểm tra chéo

### 1.1. Mùa A Chạu (Nhóm trưởng)

- **Phần việc thực tế đã hoàn thành:**
  - Viết phần mô tả tổng quan hệ thống, xác định 3 nhóm tác nhân (_Người dân/Khách_, _Nhân viên HTX_, _Quản trị viên_) và đặc tả chi tiết 3 chức năng chính (_Thêm mới/Quản lý Nông sản_, _Cập nhật Giá nông sản_, _Tra cứu thông tin nông sản_).
  - Vẽ Sơ đồ Ca sử dụng (Use Case Diagram) và Sơ đồ Triển khai (Deployment Diagram).
  - Tổng hợp nội dung xuất thành tệp `ThietKe.pdf`, soạn thảo `README.md`, `PHAN_CONG.md`, rà soát và đóng gói tệp `Nhom05_ThietKe.zip` đẩy lên GitHub.
- **Bảng dữ liệu chính:** `DAU_MOI`
- **Phần của thành viên khác đã kiểm tra:** Kiểm tra thiết kế chi tiết 7 bảng CSDL và chạy thử import tệp `database.sql` do **Lò Tuấn Anh** thực hiện.
- **Kết quả kiểm tra:** Tệp `database.sql` import thành công vào một CSDL trống trên phpMyAdmin (MySQL/MariaDB, engine `InnoDB`, bảng mã `utf8mb4`), không chứa lệnh xóa CSDL, tạo đủ 7 bảng, các khóa chính, khóa ngoại, ràng buộc `UNIQUE` và dữ liệu mẫu chạy ổn định.

---

### 1.2. Lò Tuấn Anh

- **Phần việc thực tế đã hoàn thành:**
  - Thiết kế sơ đồ quan hệ giữa 7 bảng (`SAN_PHAM`, `VUNG_TRONG`, `SAN_PHAM_VUNG_TRONG`, `HO_KINH_DOANH`, `GIA_NONG_SAN`, `DAU_MOI`, `TAI_KHOAN`), lập bảng mô tả chi tiết kiểu dữ liệu, ràng buộc.
  - Viết mã SQL tạo bảng và tạo bộ dữ liệu giả lập trong tệp `database.sql`.
- **Bảng dữ liệu liên quan chính:** Tất cả 7 bảng trong cơ sở dữ liệu `QL_NONG_SAN` (trọng tâm bài cá nhân: `SAN_PHAM`).
- **Phần của thành viên khác đã kiểm tra:** Kiểm tra Sơ đồ Lớp (Class Diagram) và Sơ đồ Trạng thái (State Diagram) do **Tòng Thị Thanh Ngọc** thực hiện.
- **Kết quả kiểm tra:** Tên các lớp, kiểu dữ liệu thuộc tính và mối quan hệ trong Sơ đồ Lớp khớp với 7 bảng trong CSDL; Sơ đồ Trạng thái thể hiện rõ các trạng thái chuyển đổi hợp lệ của đối tượng sản phẩm (`Xoa` $\leftrightarrow$ `Khoiphuc`).

---

### 1.3. Tòng Thị Thanh Ngọc

- **Phần việc thực tế đã hoàn thành:**
  - Xây dựng Sơ đồ Lớp (Class Diagram) bao gồm các thuộc tính, phương thức nghiệp vụ chính và mối quan hệ đối chiếu với thiết kế CSDL.
  - Xây dựng Sơ đồ Trạng thái (State Diagram) mô tả vòng đời xóa - khôi phục của nông sản (`trang_thai = 1` và `trang_thai = 0`).
- **Bảng dữ liệu liên quan chính:** Đối chiếu toàn bộ 7 bảng dữ liệu (trọng tâm bài cá nhân: `VUNG_TRONG`).
- **Phần của thành viên khác đã kiểm tra:** Kiểm tra Sơ đồ Hoạt động (Activity Diagram) và Sơ đồ Tuần tự (Sequence Diagram) do **Anai Tông Dia Va** thực hiện.
- **Kết quả kiểm tra:** Sơ đồ Hoạt động có đầy đủ điểm bắt đầu, kết thúc và nhánh rẽ xử lý khi dữ liệu nhập sai/thiếu; Sơ đồ Tuần tự thể hiện đúng thứ tự tương tác giữa _Người dùng $\rightarrow$ Giao diện $\rightarrow$ Bộ xử lý PHP $\rightarrow$ MySQL_ và có luồng trả kết quả về giao diện.

---

### 1.4. Anai Tông Dia Va

- **Phần việc thực tế đã hoàn thành:**
  - Vẽ Sơ đồ Hoạt động (Activity Diagram) cho chức năng `Thêm nông sản mới`, bao gồm các bước kiểm tra tính hợp lệ (Validation) và nhánh thông báo lỗi.
  - Vẽ Sơ đồ Tuần tự (Sequence Diagram) cho chức năng `Đăng nhập ` và ` Thêm nông sản mới` mô tả luồng trao đổi thông tin từ lúc người dùng gửi biểu mẫu đến khi lưu vào MySQL và trả kết quả hiển thị.
- **Bảng dữ liệu chính:** (trọng tâm bài cá nhân: `HO_KINH_DOANH`).
- **Phần của thành viên khác đã kiểm tra:** Kiểm tra phần Mô tả hệ thống, Sơ đồ Use Case và Sơ đồ Triển khai (Deployment Diagram) do **Mùa A Chạu** thực hiện.
- **Kết quả kiểm tra:** Mô tả hệ thống rõ ràng, đúng phạm vi; Sơ đồ Use Case đủ ranh giới hệ thống, 3 tác nhân và các chức năng chính; Sơ đồ Triển khai thể hiện đúng kiến trúc _Trình duyệt $\rightarrow$ Web Server (Apache/PHP) $\rightarrow$ MySQL Server_. Các tệp nguồn sơ đồ đều mở và chỉnh sửa được.

---

## 2. Khai báo sử dụng công cụ AI

_(Ghi chú: Từng thành viên khai báo đúng với quá trình thực hiện thực tế của mình; nếu thành viên nào không dùng AI thì ghi "Không sử dụng AI".)_

| Thành viên              | Công cụ AI đã dùng | Câu hỏi / Yêu cầu chính                                                                                                                                 | Phần đã giữ nguyên                                                                       | Phần đã tự chỉnh sửa & Cách kiểm tra                                                                                                                                                                                                                                |
| :---------------------- | :----------------- | :------------------------------------------------------------------------------------------------------------------------------------------------------ | :--------------------------------------------------------------------------------------- | :------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| **Mùa A Chạu**          | Google Gemini      | • Tóm tắt yêu cầu thiết kế hệ thống.<br>•Tạo mã code vẽ sơ đồ uml<br>• Gợi ý cấu trúc mô tả 3 chức năng chính và mẫu tệp `PHAN_CONG.md`, `DONG_GOP.md`. | Bố cục khung tài liệu Markdown và các đề mục mô tả chức năng.                            | • Tự điều chỉnh lại phạm vi hệ thống, phân nhóm tác nhân và tên thật các thành viên.<br>• Tự chỉnh lại các mã code để vẽ sơ đồ phù hợp với chức năng<br>• Kiểm tra bằng cách đối chiếu trực tiếp với đề bài giảng viên và rà soát từng tệp trong thư mục `ThietKe`. |
| **Lò Tuấn Anh**         | ChatGPT                | • Hỗ trợ rà soát chuẩn hóa 7 bảng CSDL và sinh cú pháp `CREATE TABLE`, `INSERT INTO` theo chuẩn `utf8mb4`, `InnoDB`.                                    | Cú pháp SQL chuẩn của MySQL và cấu trúc ràng buộc khóa ngoại.                            | • Tự chỉnh sửa bỏ cột `huyen` ở `VUNG_TRONG`, bỏ `don_vi_tinh` ở `GIA_NONG_SAN`, thêm `UNIQUE` tổ hợp và điều chỉnh dữ liệu mẫu đặc sản Sơn La.<br>• Kiểm tra bằng cách import trực tiếp `database.sql` vào một CSDL trống trên phpMyAdmin.                         |
| **Tòng Thị Thanh Ngọc** | Google Gemini      | • Tham khảo cú pháp PlantUML để dựng khung Sơ đồ Lớp (Class) và Sơ đồ Trạng thái (State).                                                               | Cấu trúc khai báo lớp và ký hiệu quan hệ trong PlantUML.                                 | • Tự cập nhật lại tên các thuộc tính, kiểu dữ liệu cho khớp 100% với bản thiết kế CSDL 7 bảng mới nhất của nhóm.<br>• Kiểm tra bằng cách biên dịch mã nguồn ra ảnh sơ đồ và đối chiếu từng cột với `database.sql`.                                                  |
| **Anai Tông Dia Va**    | chat gpt,              | • Tham khảo cấu trúc luồng xử lý của Sơ đồ Hoạt động (Activity) và Sơ đồ Tuần tự (Sequence) trong PlantUML.                                             | Khung các thành phần tham gia (_Người dùng, Giao diện, PHP, MySQL_) trong sơ đồ tuần tự. | • Tự bổ sung nhánh rẽ kiểm tra dữ liệu không hợp lệ (Validation) và điều chỉnh thông báo trả về theo đúng nghiệp vụ nông sản.<br>• Kiểm tra bằng cách đối chiếu từng bước với phần mô tả chức năng trong `ThietKe.pdf`.                                             |
