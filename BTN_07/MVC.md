# BÁO CÁO THẢO LUẬN 3: MÔ HÌNH MVC

## 1. Tại sao lại sinh ra mô hình MVC?

Khi mới học PHP, chúng ta thường viết **tất cả mọi thứ vào chung 1 file** (ví dụ `danh_sach.php`):

- Phía trên file là code kết nối MySQL và câu lệnh `SELECT`.
- Ở giữa là code `if/else` kiểm tra điều kiện.
- Phía dưới là một đống thẻ HTML `<table>`, `<form>`, CSS.

**Hậu quả:** Khi trang web nhỏ thì chạy rất nhanh. Nhưng khi làm dự án lớn có 50 chức năng, file code dài hàng nghìn dòng sẽ biến thành "một bát mì trộn lẫn lộn" — người thiết kế giao diện sợ sửa nhầm vào code SQL, còn người viết SQL lại phải lội qua hàng trăm thẻ HTML để tìm lỗi.

**Giải pháp:** Chia code ra làm **3 thư mục riêng biệt**, mỗi nơi chỉ làm đúng 1 việc duy nhất. Cách chia này gọi là **MVC** (**M**odel — **V**iew — **C**ontroller).

---

## 2. Nhiệm vụ của 3 thành phần M - V - C

Hãy hình dung một công ty có 3 bộ phận phối hợp nhịp nhàng:

1. **M — Model (Thủ kho dữ liệu):**
   - **Việc duy nhất:** Chui vào Database (MySQL) để lấy dữ liệu, thêm, sửa, xóa.
   - **Nguyên tắc:** Model **không bao giờ** chứa thẻ HTML (`<div>`, `<table>`). Lấy xong dữ liệu là đưa ngay cho Controller.

2. **V — View (Bộ phận trưng bày / Giao diện):**
   - **Việc duy nhất:** Chứa HTML, CSS để vẽ bảng biểu, nút bấm, form nhập liệu cho đẹp mắt.
   - **Nguyên tắc:** View **không bao giờ** tự ý viết câu lệnh SQL. Controller đưa cho biến gì thì chỉ việc dùng vòng lặp `foreach` in biến đó ra màn hình.

3. **C — Controller (Người quản lý / Điều phối viên):**
   - **Việc duy nhất:** Đứng ở giữa nhận yêu cầu từ người dùng $\rightarrow$ Gọi **Model** lấy dữ liệu $\rightarrow$ Đẩy dữ liệu đó sang **View** để hiện lên màn hình.

---

## 3. Sơ đồ luồng chạy thực tế (Khi bấm xem Danh sách sinh viên)

```text
[Người dùng]
     │  (1) Bấm vào nút "Xem danh sách sinh viên"
     ▼
[Controller] ──(2) Nhờ lấy giúp danh sách──► [Model] ◄──► (MySQL)
     ▲                                          │
     │  (3) Trả về mảng danh sách sinh viên     │
     └──────────────────────────────────────────┘
     │
     ▼  (4) Gửi mảng danh sách sang giao diện
   [View] ────► (5) Hiện bảng HTML hoàn chỉnh lên màn hình cho Người dùng
```

---

## 4. Ví dụ minh họa chia 3 file đơn giản bằng PHP

Thay vì gộp chung 1 file, ta tách thành 3 file nhỏ cực kỳ sạch sẽ:

**1. File `SinhVienModel.php` (Chỉ làm việc với MySQL):**

```php
<?php
class SinhVienModel {
    public function layTatCaSinhVien($pdo) {
        $stmt = $pdo->query("SELECT * FROM sinh_vien");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
```

**2. File `SinhVienController.php` (Đứng giữa kết nối Model và View):**

```php
<?php
require_once 'SinhVienModel.php';

class SinhVienController {
    public function trangDanhSach($pdo) {
        // B1: Gọi Model lấy dữ liệu
        $model = new SinhVienModel();
        $danh_sach = $model->layTatCaSinhVien($pdo);

        // B2: Gửi biến $danh_sach sang cho View hiển thị
        require 'danh_sach_view.php';
    }
}
?>
```

**3. File `danh_sach_view.php` (Chỉ có HTML hiển thị):**

```html
<h2>Danh sách sinh viên</h2>
<table border="1">
  <tr>
    <th>Họ tên</th>
    <th>Lớp</th>
  </tr>
  <?php foreach ($danh_sach as $sv): ?>
  <tr>
    <td><?= htmlspecialchars($sv['ho_ten']) ?></td>
    <td><?= htmlspecialchars($sv['lop']) ?></td>
  </tr>
  <?php endforeach; ?>
</table>
```

---

## 5. Tóm tắt Ưu và Nhược điểm của MVC

- **Ưu điểm:**
  - **Dễ chia việc nhóm:** Bạn giỏi giao diện chỉ cần mở file **View** viết HTML/CSS; bạn giỏi logic chỉ cần mở **Model** và **Controller** viết PHP/SQL, không bao giờ giẫm chân lên nhau.
  - **Dễ sửa lỗi:** Hỏng giao diện tìm ở View, sai dữ liệu tìm ở Model.
  - Là nền tảng của hầu hết các bộ khung lập trình (Framework) nổi tiếng như **Laravel**, **CodeIgniter**.
- **Nhược điểm:**
  - Với các bài tập nhỏ chỉ có 1–2 trang đơn giản thì việc chia ra nhiều thư mục/file ban đầu sẽ mất công tạo file hơn một chút so với viết gộp.
