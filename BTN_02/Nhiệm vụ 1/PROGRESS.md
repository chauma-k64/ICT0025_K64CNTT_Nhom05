 NHIỆM VỤ 1: ÔN NỘI DUNG TỰ HỌC VÀ THẢO LUẬN

 1. Phần điều kiện (Ví dụ A & B)
 *Ví dụ A (if/elseif/else):
    `$diem = 5`: In "Cần cố gắng".
    `$diem = 6.5`: In "Khá" (Do $6.5 < 8$ nên bỏ qua nhánh Giỏi, kiểm tra điều kiện tiếp theo thấy $6.5 \ge 6.5$ đúng nên vào nhánh Khá).
    `$diem = 8`: In "Giỏi" (Do thỏa mãn ngay điều kiện đầu tiên $8 \ge 8$).
 *Ví dụ B (switch/case)
    Trạng thái 1 in "Mới tạo", 2 in "Đang xử lý", 9 in "Không xác định".
  - Vai trò của `default`: Xử lý các giá trị nằm ngoài các `case` đã liệt kê (ví dụ khi nhập giá trị 9).
  - Nếu bỏ `break` sau case 2: Khi `$trangThai = 2`, máy sẽ in "Đang xử lý" rồi tự động trôi tiếp xuống chạy nhánh `default`, làm kết quả bị dính liền thành:`Đang xử lýKhông xác định`.
  
 2. Phần vòng lặp (Ví dụ C & D)
 *Ví dụ C (vòng lặp for):
    `$i <= 5`: In `1 2 3 4 5 `, lặp 5 lần, giá trị `$i` sau khi kết thúc vòng lặp là `6`.
    `$i < 5`: In `1 2 3 4 `, lặp 4 lần, giá trị `$i` sau khi kết thúc vòng lặp là `5`.
*Ví dụ D (vòng lặp while):
  - Trường hợp gốc (`$n = $n - 3`): In `10 7 4 1 `, lặp 4 lần, dừng lại khi giá trị `$n` giảm xuống thành `-2` (do $-2 > 0$ là `false`).
  - Đổi thành phép cộng (`$n = $n + 3`): Vòng lặp rơi vào trạng thái lặp vô tận do giá trị `$n` liên tục tăng ($10 \rightarrow 13 \rightarrow 16 \dots$) làm điều kiện `$n > 0` luôn đúng.