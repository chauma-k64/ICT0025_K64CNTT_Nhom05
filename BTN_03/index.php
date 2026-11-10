<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chủ - Demo PHP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="khung" style="text-align: center;">
        <div
            style="width: 70px; height: 70px; background: rgba(99, 102, 241, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
            <i class="fa-solid fa-rocket" style="font-size: 32px; color: #818cf8;"></i>
        </div>

        <h1>Xin Chào!</h1>
        <p class="mo-ta">Hệ thống Đăng nhập & Đăng ký giao diện hiện đại bằng PHP (Non-Database Demo).</p>

        <a class="nut" href="dang_nhap.php">
            <i class="fa-solid fa-right-to-bracket"></i> Đăng nhập ngay
        </a>
        <a class="nut nut-phu" href="dang_ky.php">
            <i class="fa-solid fa-user-plus"></i> Đăng ký tài khoản
        </a>

        <div
            style="margin-top: 30px; font-size: 13px; color: var(--text-muted); border-top: 1px solid var(--glass-border); padding-top: 16px;">
            <i class="fa-regular fa-calendar-days"></i> Hôm nay là: <b><?php echo date("d/m/Y"); ?></b>
        </div>
    </div>
</body>

</html>