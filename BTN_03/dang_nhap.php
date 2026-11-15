<?php
// 1. Khai báo biến ban đầu
$email = "";
$masv = "";
$mat_khau = "";
$loi = [];             // Mảng chứa các lỗi
$thanh_cong = false;

// 2. Nếu người dùng bấm nút "Đăng nhập" (form gửi bằng POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $email = trim($_POST["email"]);
    $masv = trim($_POST["masv"]);
    $mat_khau = $_POST["mat_khau"];

    // Kiểm tra email
    if ($email == "") {
        $loi["email"] = "Vui lòng nhập email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $loi["email"] = "Email không đúng định dạng.";
    }

    // Kiểm tra mã sinh viên
    if ($masv == "") {
        $loi["masv"] = "Vui lòng nhập mã sinh viên.";
    }

    // Kiểm tra mật khẩu
    if ($mat_khau == "") {
        $loi["mat_khau"] = "Vui lòng nhập mật khẩu.";
    }

    // Không có lỗi nào => thành công
    if (count($loi) == 0) {
        $thanh_cong = true;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="khung">

        <?php if ($thanh_cong) { ?>
        <!-- 3a. Hiện kết quả khi đăng nhập thành công -->
        <h1>Đăng nhập thành công</h1>
        <p class="thong-bao-dung">Bạn đã nhập các thông tin sau:</p>
        <table>
            <tr>
                <th>Email</th>
                <td><?php echo htmlspecialchars($email); ?></td>
            </tr>
            <tr>
                <th>Mật khẩu</th>
                <td><?php echo strlen($mat_khau); ?> ký tự</td>
            </tr>
        </table>
        <a class="nut" href="dang_nhap.php">Quay lại</a>

        <?php } else { ?>
        <!-- 3b. Hiện form (lần đầu vào trang hoặc khi có lỗi) -->
        <h1>Đăng nhập</h1>

        <form method="POST" action="">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <?php if (isset($loi["email"])) { ?>
            <p class="loi"><?php echo $loi["email"]; ?></p>
            <?php } ?>
            <label for="masv">Mã sinh viên</label>
            <input type="text" id="masv" name="masv" value="<?php echo htmlspecialchars($masv); ?>">
            <?php if (isset($loi["masv"])) { ?>
            <p class="loi"><?php echo $loi["masv"]; ?></p>
            <?php } ?>
            <label for="mat_khau">Mật khẩu</label>
            <input type="password" id="mat_khau" name="mat_khau">
            <?php if (isset($loi["mat_khau"])) { ?>
            <p class="loi"><?php echo $loi["mat_khau"]; ?></p>
            <?php } ?>

            <button type="submit" class="nut">Đăng nhập</button>
        </form>

        <p class="chuyen-trang">Chưa có tài khoản? <a href="dang_ky.php">Đăng ký</a></p>
        <?php } ?>

        <p class="chuyen-trang"><a href="index.php">← Trang chủ</a></p>
    </div>
</body>

</html>