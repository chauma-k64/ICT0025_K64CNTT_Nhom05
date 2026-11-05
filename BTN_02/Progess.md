# Nhóm 5

## 1. Phân công nhiệm vụ thành viên

- **Anai Tông Dia Va:** Xây dựng khối xử lý nhãn trạng thái (sử dụng cấu trúc switch-case).
- **Lò Tuấn Anh:** Xây dựng khối vòng lặp (sử dụng vòng lặp for - while).
- **Mùa A Chạu:** Xây dựng khối xử lý nhãn trạng thái (sử dụng cấu trúc if-else).
- **Tòng Thị Thanh Ngọc:** Thiết kế các ca kiểm thử, chạy kiểm thử các trường hợp biên và ghi chép tệp PROGRESS.md.

## Nhiệm vụ 1:

1.  Phần điều kiện (Ví dụ A & B)
    *Ví dụ A (if/elseif/else):
    `$diem = 5`: In "Cần cố gắng".
    `$diem = 6.5`: In "Khá" (Do $6.5 < 8$ nên bỏ qua nhánh Giỏi, kiểm tra điều kiện tiếp theo đúng nên vào nhánh Khá).
    `$diem = 8`: In "Giỏi" (Do thỏa mãn ngay điều kiện đầu tiên ).
    *Ví dụ B (switch/case)
    Trạng thái 1 in "Mới tạo", 2 in "Đang xử lý", 9 in "Không xác định".

- Vai trò của `default`: Xử lý các giá trị không nằm trong case.
- Nếu bỏ `break` sau case 2: sẽ không dừng lại dẫn đến in ra chuỗi`Đang xử lýKhông xác định`.

2.  Phần vòng lặp (Ví dụ C & D)
    *Ví dụ C (vòng lặp for):
    `$i <= 5`: In `1 2 3 4 5 `, lặp 5 lần, giá trị `$i` sau khi kết thúc vòng lặp là `6`.
    `$i < 5`: In `1 2 3 4 `, lặp 4 lần, giá trị `$i` sau khi kết thúc vòng lặp là `5`.
    *Ví dụ D (vòng lặp while):

- Trường hợp gốc (`$n = $n - 3`): In `10 7 4 1 `, lặp 4 lần, dừng lại khi giá trị `$n` giảm xuống thành `-2` (do $-2 > 0$ là `false`).
- Đổi thành phép cộng (`$n = $n + 3`): Vòng lặp rơi vào trạng thái lặp vô tận do giá trị `$n` liên tục tăng $10  làm điều kiện `$n > 0` luôn đúng.

## Nhiệm vụ 2

1. if_else.php
   $trangThai = 1 in ra Mới tạo
   $trang Thai = 2 in ra Đang xử lý
   $trang Thai = 9 in ra Không xác định
   2.Swich_case.php
   $trangThai = 1 in ra Mới tạo
   $trang Thai = 2 in ra Đang xử lý
   $trang Thai = 9 in ra Không xác định
   -- Vai trò của break: Nếu điều kiện đã đúng thì dừng lại chương trình, không kiểm tra tiếp những nhánh sau đó

## Nhiệm vụ 3: Bài tập danh sách đánh số

### 1. Nội dung thực hiện

- Tạo biến nguyên không âm `$soLuong` để xác định số lượng công việc cần hiển thị.
- Sử dụng vòng lặp `for` để in danh sách công việc theo thứ tự từ 1 đến `$soLuong`.
- Tạo file PHP riêng sử dụng vòng lặp `while` để thực hiện yêu cầu tương tự.
- Thực hiện kiểm thử với các giá trị `$soLuong` bằng 0, 1 và 5.

### 2. Kết quả kiểm thử

| Giá trị `$soLuong` | Kết quả vòng lặp `for`  | Kết quả vòng lặp `while` |
| ------------------ | ----------------------- | ------------------------ |
| 0                  | Không in dòng nào       | Không in dòng nào        |
| 1                  | Công việc 1             | Công việc 1              |
| 5                  | Công việc 1, 2, 3, 4, 5 | Công việc 1, 2, 3, 4, 5  |

### 3. Giải thích vòng lặp while

- Giá trị khởi tạo: `$i = 1`.
- Điều kiện tiếp tục: `$i <= $soLuong`.
- Bước tăng: `$i++`.
- Vòng lặp dừng khi `$i > $soLuong`.

### 4. Nhận xét và so sánh

Cả hai vòng lặp `for` và `while` đều cho kết quả giống nhau khi thực hiện chương trình.
Vòng lặp `for` có cách viết ngắn gọn, phần khởi tạo, điều kiện và bước tăng được đặt chung trong một câu lệnh. Vòng lặp `while` cần khởi tạo biến trước và thực hiện tăng biến bên trong vòng lặp.

# Khó khăn gặp phải: Nhóm gặp trường hợp để trùng tên file nên bị xung đột cả nhóm bị lỗi github mà phải xóa foder làm lại từ đầu

