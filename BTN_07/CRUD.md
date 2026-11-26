# BÁO CÁO THẢO LUẬN 1: CRUD

## 1. Tóm tắt nhanh CRUD là gì?

**CRUD** đơn giản là tên gọi tắt của 4 hành động cơ bản nhất mà bất kỳ trang web quản lý nào cũng phải có khi làm việc với dữ liệu:

- **C (Create) — Thêm mới:** Tạo thêm dữ liệu mới (VD: Thêm một sinh viên mới vào danh sách).
- **R (Read) — Đọc / Xem:** Lấy dữ liệu ra hiển thị (VD: Xem danh sách sinh viên, tìm kiếm).
- **U (Update) — Sửa:** Cập nhật lại thông tin cũ (VD: Đổi số điện thoại hoặc địa chỉ của sinh viên).
- **D (Delete) — Xóa:** Loại bỏ dữ liệu không dùng nữa (VD: Xóa một sinh viên khỏi danh sách).

### Bảng quy đổi nhanh sang SQL và Web:

| Chữ cái | Ý nghĩa | Lệnh trong MySQL               | Cách làm trên Web                  |
| :------ | :------ | :----------------------------- | :--------------------------------- |
| **C**   | Thêm    | `INSERT INTO ...`              | Điền Form và bấm nút **Lưu**       |
| **R**   | Xem     | `SELECT ... FROM ...`          | Đổ dữ liệu ra bảng `<table>`       |
| **U**   | Sửa     | `UPDATE ... SET ... WHERE ...` | Mở Form có sẵn dữ liệu cũ để sửa   |
| **D**   | Xóa     | `DELETE FROM ... WHERE ...`    | Bấm nút **Xóa** (kèm hỏi xác nhận) |

---

## 2. Mẫu code PHP chuẩn cho 4 thao tác CRUD

Dưới đây là mẫu code ngắn gọn dùng **PDO** (an toàn, chống hack SQL Injection) trên bảng `sinh_vien(id, ho_ten, lop)`:

```php
<?php
// Kết nối Database
$pdo = new PDO("mysql:host=localhost;dbname=ql_sinhvien;charset=utf8mb4", "root", "");

// 1. CREATE (Thêm mới)
$stmt = $pdo->prepare("INSERT INTO sinh_vien (ho_ten, lop) VALUES (?, ?)");
$stmt->execute(["Nguyễn Văn An", "K64-CNTT"]);

// 2. READ (Lấy danh sách để hiển thị)
$stmt = $pdo->query("SELECT * FROM sinh_vien");
$ds_sinhvien = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 3. UPDATE (Sửa lớp cho sinh viên có id = 1)
$stmt = $pdo->prepare("UPDATE sinh_vien SET lop = ? WHERE id = ?");
$stmt->execute(["K64-KTPM", 1]);

// 4. DELETE (Xóa sinh viên có id = 1)
$stmt = $pdo->prepare("DELETE FROM sinh_vien WHERE id = ?");
$stmt->execute([1]);
?>
```

> **Khi làm thực tế:** Với lệnh `UPDATE` và `DELETE`, **không bao giờ được quên `WHERE id = ?`**, nếu quên sẽ bị sửa hoặc xóa sạch toàn bộ dữ liệu trong bảng!
