# BÁO CÁO THẢO LUẬN 2: API

## 1. API là gì?

**API** (_Application Programming Interface_) là **người trung gian vận chuyển dữ liệu** giữa các phần mềm với nhau.

### Hãy tưởng tượng bạn đi ăn ở nhà hàng:

- **Bạn (Khách hàng)** = Giao diện trang web hoặc App trên điện thoại (**Frontend**).
- **Nhà bếp** = Máy chủ và Cơ sở dữ liệu nơi chứa thông tin (**Backend & MySQL**).
- Bạn không thể tự chạy thẳng vào bếp lục tủ lạnh để lấy đồ ăn. Thay vào đó, **người phục vụ chính là API**:
  1. Bạn gọi món $\rightarrow$ Người phục vụ ghi lại (**Request**).
  2. Người phục vụ mang phiếu vào bếp cho đầu bếp nấu (**Server xử lý**).
  3. Đầu bếp nấu xong $\rightarrow$ Người phục vụ bưng đĩa thức ăn ra bàn cho bạn (**Response**).

**Tóm lại:** Nhờ có API, phần giao diện (Web, App Android, App iOS) chỉ cần gọi tới một địa chỉ API duy nhất là lấy được dữ liệu từ Database mà không cần quan tâm bên trong Server viết bằng PHP hay ngôn ngữ gì.

---

## 2. Cách API giao tiếp trên Web (RESTful API)

Ngày nay, các trang web thường dùng chuẩn **RESTful API** với 3 quy tắc cực kỳ dễ nhớ:

### Quy tắc 1: Giao tiếp bằng chữ (Định dạng JSON)

Thay vì trả về cả trang web HTML đầy thẻ `<div>`, `<table>` nặng nề, API chỉ trả về **dữ liệu thô dạng văn bản JSON** (nhìn giống hệt mảng kết hợp trong PHP) để máy móc đọc cho nhanh:

```json
{
  "trang_thai": "thanh_cong",
  "du_lieu": [
    { "id": 1, "ho_ten": "Nguyễn Văn An", "lop": "K64-CNTT" },
    { "id": 2, "ho_ten": "Trần Thị Bình", "lop": "K64-CNTT" }
  ]
}
```

### Quy tắc 2: Dùng đúng hành động (HTTP Method)

- Muốn **xem** dữ liệu $\rightarrow$ Dùng `GET` (VD: `GET /api/sinhvien.php`)
- Muốn **thêm** dữ liệu $\rightarrow$ Dùng `POST` (VD: `POST /api/sinhvien.php`)
- Muốn **sửa** dữ liệu $\rightarrow$ Dùng `PUT`
- Muốn **xóa** dữ liệu $\rightarrow$ Dùng `DELETE`

### Quy tắc 3: Báo kết quả bằng mã số (Status Code)

Khi API trả lời, nó luôn kèm theo một con số 3 chữ số để báo tình hình:

- **`200`**: Thành công mỹ mãn!
- **`400`**: Bạn gửi thiếu hoặc sai dữ liệu rồi (lỗi phía người dùng).
- **`404`**: Không tìm thấy đường dẫn API hoặc không có sinh viên này.
- **`500`**: Máy chủ bị lỗi code hoặc sập kết nối Database.

---

## 3. Ví dụ tự viết 1 file API đơn giản bằng PHP

Thay vì dùng `echo "<table>..."` như bình thường, bạn chỉ cần thêm dòng báo định dạng JSON và dùng hàm `json_encode()` của PHP là đã có ngay một API:

```php
<?php
// Bước 1: Báo cho trình duyệt biết file này chỉ trả về dữ liệu JSON
header("Content-Type: application/json; charset=UTF-8");

// Bước 2: Lấy dữ liệu từ MySQL như bình thường
$pdo = new PDO("mysql:host=localhost;dbname=ql_sinhvien;charset=utf8mb4", "root", "");
$stmt = $pdo->query("SELECT id, ho_ten, lop FROM sinh_vien");
$danh_sach = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Bước 3: Biến mảng PHP thành chuỗi JSON và gửi đi
echo json_encode([
    "status" => "success",
    "data" => $danh_sach
], JSON_UNESCAPED_UNICODE);
?>
```
