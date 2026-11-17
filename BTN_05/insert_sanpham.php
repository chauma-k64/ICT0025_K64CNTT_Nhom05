<?php
require_once 'connect.php';

$ten_san_pham = '';
$loai_nong_san = '';
$don_vi_tinh = '';
$mo_ta = '';
$trang_thai = '1';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten_san_pham  = trim($_POST['ten_san_pham'] ?? '');
    $loai_nong_san = trim($_POST['loai_nong_san'] ?? '');
    $don_vi_tinh   = trim($_POST['don_vi_tinh'] ?? '');
    $mo_ta         = trim($_POST['mo_ta'] ?? '');
    $trang_thai    = $_POST['trang_thai'] ?? '';

    // Dùng hàm empty() để kiểm tra các trường bắt buộc
    if (empty($ten_san_pham)) {
        $errors[] = 'Vui lòng nhập tên nông sản.';
    }
    if (empty($loai_nong_san)) {
        $errors[] = 'Vui lòng nhập loại nông sản.';
    }
    if (empty($don_vi_tinh)) {
        $errors[] = 'Vui lòng nhập đơn vị tính.';
    }
    if (empty ($mo_ta)) {
        $errors[] = 'Vui lòng nhập mô tả.';
    }
    if (!in_array($trang_thai, ['0', '1'], true)) {
        $errors[] = 'Trạng thái không hợp lệ.';
    }

    // Dùng empty($errors) để kiểm tra xem có lỗi nào không
    if (empty($errors)) {
        $sql = "INSERT INTO san_pham (ten_san_pham, loai_nong_san, don_vi_tinh, mo_ta, trang_thai) 
                VALUES (:ten, :loai, :dvt, :mota, :trangthai)";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':ten'       => $ten_san_pham,
            ':loai'      => !empty($loai_nong_san) ? $loai_nong_san : null,
            ':dvt'       => $don_vi_tinh,
            ':mota'      => !empty($mo_ta) ? $mo_ta : null,
            ':trangthai' => (int)$trang_thai
        ]);

        // Thêm xong chuyển hướng về trang danh sách
        header("Location: select_sanpham.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thêm Nông sản</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Thêm Nông sản mới</h2>

    <?php if (!empty($errors)): ?>
    <ul class="validation-errors" style="color: red;">
        <?php foreach ($errors as $error): ?>
        <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <form method="POST" action="" novalidate>
        <p>
            <label>Tên nông sản (*):</label><br>
            <input type="text" name="ten_san_pham" value="<?= htmlspecialchars($ten_san_pham, ENT_QUOTES, 'UTF-8') ?>">
        </p>
        <p>
            <label>Loại nông sản (*):</label><br>
            <input type="text" name="loai_nong_san" placeholder="VD: Cây ăn quả, Cây công nghiệp..."
                value="<?= htmlspecialchars($loai_nong_san, ENT_QUOTES, 'UTF-8') ?>">
        </p>
        <p>
            <label>Đơn vị tính (*):</label><br>
            <input type="text" name="don_vi_tinh" placeholder="VD: Kg, Tấn, Quả..."
                value="<?= htmlspecialchars($don_vi_tinh, ENT_QUOTES, 'UTF-8') ?>">
        </p>
        <p>
            <label>Mô tả (*):</label><br>
            <textarea name="mo_ta" rows="4"><?= htmlspecialchars($mo_ta, ENT_QUOTES, 'UTF-8') ?></textarea>
        </p>
        <p>
            <label>Trạng thái (*):</label><br>
            <select name="trang_thai">
                <option value="1" <?= $trang_thai === '1' ? 'selected' : '' ?>>1 - Đang hiển thị</option>
                <option value="0" <?= $trang_thai === '0' ? 'selected' : '' ?>>0 - Ngừng hiển thị</option>
            </select>
        </p>
        <button type="submit" class="btn-save">Lưu nông sản</button>
        <a href="select_sanpham.php" class="back-link">Quay lại</a>
    </form>
</body>

</html>