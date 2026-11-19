<?php
require_once __DIR__ . '/connect.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id || $id <= 0) {
    die("ID sản phẩm không hợp lệ.");
}

$stmt = $pdo->prepare("SELECT * FROM san_pham WHERE id_san_pham = :id");
$stmt->execute([':id' => $id]);
$sp = $stmt->fetch();

if (!$sp) {
    die("Không tìm thấy sản phẩm có mã = " . htmlspecialchars((string)$id));
}

$errors        = [];
$ten_san_pham  = $sp['ten_san_pham'];
$loai_nong_san = $sp['loai_nong_san'];
$don_vi_tinh   = $sp['don_vi_tinh'];
$mo_ta         = $sp['mo_ta'];
$trang_thai    = (int)$sp['trang_thai'];

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
        $sql = "UPDATE san_pham
                SET ten_san_pham  = :ten_san_pham,
                    loai_nong_san = :loai_nong_san,
                    don_vi_tinh   = :don_vi_tinh,
                    mo_ta         = :mo_ta,
                    trang_thai    = :trang_thai
                WHERE id_san_pham = :id_san_pham";

        $updateStmt = $pdo->prepare($sql);
        $updateStmt->execute([
            ':ten_san_pham'  => $ten_san_pham,
            ':loai_nong_san' => $loai_nong_san,
            ':don_vi_tinh'   => $don_vi_tinh,
            ':mo_ta'         => $mo_ta,
            ':trang_thai'    => $trang_thai,
            ':id_san_pham'   => $id,
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
    <title>Cập nhật Sản phẩm</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <div class="form-box">
        <h2>Cập nhật Sản phẩm (Mã SP: <?= htmlspecialchars((string)$id) ?>)</h2>

        <?php if (!empty($errors)): ?>
        <div class="errors">
            <ul>
                <?php foreach ($errors as $err): ?>
                <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <form method="POST" action="update.php?id=<?= urlencode((string)$id) ?>">
            <div class="row">
                <label>Tên sản phẩm (*)</label>
                <input type="text" name="ten_san_pham" value="<?= htmlspecialchars($ten_san_pham) ?>">
            </div>

            <div class="row">
                <label>Loại nông sản (*)</label>
                <input type="text" name="loai_nong_san" value="<?= htmlspecialchars($loai_nong_san) ?>">
            </div>

            <div class="row">
                <label>Đơn vị tính (*)</label>
                <input type="text" name="don_vi_tinh" value="<?= htmlspecialchars($don_vi_tinh) ?>">
            </div>

            <div class="row">
                <label>Mô tả (*)</label>
                <textarea name="mo_ta" rows="3"><?= htmlspecialchars($mo_ta) ?></textarea>
            </div>

            <div class="row">
                <label>Trạng thái (*)</label>
                <select name="trang_thai">
                    <option value="1" <?= $trang_thai === 1 ? 'selected' : '' ?>>1 - Đang hiển thị</option>
                    <option value="0" <?= $trang_thai === 0 ? 'selected' : '' ?>>0 - Ngừng hiển thị</option>
                </select>
            </div>

            <button type="submit" class="btn-update">Cập nhật thay đổi</button>
            <a href="index.php" class="btn-back">Quay lại</a>
        </form>
    </div>
</body>

</html>