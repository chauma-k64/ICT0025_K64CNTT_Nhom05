# Nhóm 5
## 1. Phân công nhiệm vụ thành viên
- **Anai Tông Dia Va:** Xây dựng khối xử lý nhãn trạng thái (sử dụng cấu trúc switch-case).
- **Lò Tuấn Anh:** Xây dựng khối vòng lặp (sử dụng vòng lặp for - while).
- **Mùa A Chạu:** Xây dựng khối xử lý nhãn trạng thái (sử dụng cấu trúc if-else).
- **Tòng Thị Thanh Ngọc:** Thiết kế các ca kiểm thử, chạy kiểm thử các trường hợp biên và ghi chép tệp PROGRESS.md.
  
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

Qua bài tập, em đã hiểu cách sử dụng hai loại vòng lặp và cách kiểm soát số lần lặp trong PHP.

### 5. Kết luận

Đã hoàn thành nhiệm vụ 3, tạo được hai file PHP riêng biệt sử dụng vòng lặp `for` và `while`, đồng thời kiểm thử với ba trường hợp theo yêu cầu.
