<?php
require_once __DIR__ . '/connect.php';

$errors        = [];
$ten_san_pham  = '';
$loai_nong_san = '';
$don_vi_tinh   = 'Kg';
$mo_ta         = '';
$trang_thai    = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten_san_pham  = trim($_POST['ten_san_pham'] ?? '');
    $loai_nong_san = trim($_POST['loai_nong_san'] ?? '');
    $don_vi_tinh   = trim($_POST['don_vi_tinh'] ?? '');
    $mo_ta         = trim($_POST['mo_ta'] ?? '');
    $trang_thai    = isset($_POST['trang_thai']) ? (int)$_POST['trang_thai'] : 1;

    if ($ten_san_pham === '') {
        $errors[] = "Tên sản phẩm không được để trống.";
    }
    if ($loai_nong_san === '') {
        $errors[] = "Loại nông sản không được để trống.";
    }
    if ($don_vi_tinh === '') {
        $errors[] = "Đơn vị tính không được để trống.";
    }
    if ($mo_ta === '') {
        $errors[] = "Mô tả sản phẩm không được để trống.";
    }
    if (!in_array($trang_thai, [0, 1], true)) {
        $errors[] = "Trạng thái không hợp lệ.";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO san_pham (ten_san_pham, loai_nong_san, don_vi_tinh, mo_ta, trang_thai)
                VALUES (:ten_san_pham, :loai_nong_san, :don_vi_tinh, :mo_ta, :trang_thai)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':ten_san_pham'  => $ten_san_pham,
            ':loai_nong_san' => $loai_nong_san,
            ':don_vi_tinh'   => $don_vi_tinh,
            ':mo_ta'         => $mo_ta,
            ':trang_thai'    => $trang_thai,
        ]);

        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thêm Sản phẩm Mới</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <div class="form-box">
        <h2>Thêm Sản phẩm Nông sản Mới</h2>

        <?php if (!empty($errors)): ?>
        <div class="errors">
            <ul>
                <?php foreach ($errors as $err): ?>
                <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <form method="POST" action="insert.php">
            <div class="row">
                <label>Tên sản phẩm (*)</label>
                <input type="text" name="ten_san_pham" placeholder="Ví dụ: Xoài tròn Yên Châu"
                    value="<?= htmlspecialchars($ten_san_pham) ?>">
            </div>

            <div class="row">
                <label>Loại nông sản (*)</label>
                <input type="text" name="loai_nong_san" placeholder="Ví dụ: Cây ăn quả / Cây công nghiệp"
                    value="<?= htmlspecialchars($loai_nong_san) ?>">
            </div>

            <div class="row">
                <label>Đơn vị tính (*)</label>
                <input type="text" name="don_vi_tinh" placeholder="Ví dụ: Kg, Tấn"
                    value="<?= htmlspecialchars($don_vi_tinh) ?>">
            </div>

            <div class="row">
                <label>Mô tả (*)</label>
                <textarea name="mo_ta" rows="3"
                    placeholder="Mô tả đặc điểm nông sản..."><?= htmlspecialchars($mo_ta) ?></textarea>
            </div>

            <div class="row">
                <label>Trạng thái (*)</label>
                <select name="trang_thai">
                    <option value="1" <?= $trang_thai === 1 ? 'selected' : '' ?>>1 - Đang hiển thị</option>
                    <option value="0" <?= $trang_thai === 0 ? 'selected' : '' ?>>0 - Ngừng hiển thị</option>
                </select>
            </div>

            <button type="submit" class="btn-save">Lưu sản phẩm</button>
            <a href="index.php" class="btn-back">Quay lại</a>
        </form>
    </div>
</body>

</html>