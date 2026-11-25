# BẢNG PHÂN CÔNG NHIỆM VỤ NHÓM 05

- **Đề tài:** Quản lý nông sản địa phương
- **Giai đoạn:** Thiết kế hệ thống & Cơ sở dữ liệu

---

## 1. Bảng phân công nhiệm vụ chi tiết

| Thành viên                        | Việc thiết kế nhóm (Giai đoạn hiện tại)                                                                                                                                                                          | Phần dữ liệu làm bài cá nhân                                       | Sản phẩm đầu ra; Người phối hợp                                                                                                                            |
| :-------------------------------- | :--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | :----------------------------------------------------------------- | :--------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Mùa A Chạu**<br>_(Nhóm trưởng)_ | • Viết **Mô tả hệ thống** (bài toán, phạm vi, tác nhân) & mô tả chi tiết các chức năng chính.<br>• Vẽ **Sơ đồ Use Case** và **Sơ đồ Triển khai (Deployment)**.<br>                                               | **Quản lý Đầu mối thu mua / tiêu thụ**<br>_(Bảng `DAU_MOI`)_       | • Nội dung mô tả hệ thống, ảnh + file nguồn sơ đồ Use Case & Deployment.<br>• Phối hợp với cả nhóm để rà soát và kiểm tra chéo.                            |
| **Lò Tuấn Anh**                   | • Thiết kế chi tiết **Cơ sở dữ liệu 7 bảng** (mô tả thuộc tính/kiểu dữ liệu/ràng buộc).<br>• Viết tệp `database.sql` (MySQL, `utf8mb4`, `InnoDB`) kèm **dữ liệu giả** và chạy thử import trên CSDL trống.        | **Quản lý Nông sản**<br>_(Bảng `SAN_PHAM`)_                        | • Sơ đồ quan hệ bảng, bảng đặc tả CSDL và tệp `database.sql`.<br>• Phối hợp với **Tòng Thị Thanh Ngọc** để khớp thuộc tính của các bảng vào Sơ đồ Lớp.     |
| **Tòng Thị Thanh Ngọc**           | • Vẽ **Sơ đồ Lớp (Class Diagram)** đối chiếu với 7 bảng CSDL.<br>• Vẽ **Sơ đồ Trạng thái (State Diagram)** cho đối tượng Sản phẩm (`Xoa` $\leftrightarrow$ `Khoiphuc`).                                          | **Quản lý Vùng trồng**<br>_(Bảng `VUNG_TRONG`)_                    | • Ảnh + tệp nguồn chỉnh sửa được của Sơ đồ Lớp và Sơ đồ Trạng thái.<br>• Phối hợp với **Lò Tuấn Anh** để đảm bảo tên lớp và thuộc tính khớp 100% với CSDL. |
| **Anai Tông Dia Va**              | • Vẽ **Sơ đồ Hoạt động (Activity Diagram)** cho chức năng _Thêm sản phẩm mới_ (có nhánh rẽ kiểm tra dữ liệu sai).<br>• Vẽ **Sơ đồ Tuần tự (Sequence Diagram)** cho chức năng `Đăng nhập` và `Thêm nông sản mới`. | **Quản lý Hộ kinh doanh tham gia HTX**<br>_(Bảng `HO_KINH_DOANH`)_ | • Ảnh + tệp nguồn chỉnh sửa được của Sơ đồ Hoạt động và Sơ đồ Tuần tự.<br>• Phối hợp với **Mùa A Chạu** để khớp luồng xử lý với phần mô tả chức năng.      |

---
