<?php
require_once __DIR__ . '/connect.php';

// 1. Xử lý Khôi phục sản phẩm (chuyển trang_thai từ 0 về 1)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['restore_id'])) {
    $restore_id = filter_input(INPUT_POST, 'restore_id', FILTER_VALIDATE_INT);
    if ($restore_id && $restore_id > 0) {
        $stmt = $pdo->prepare("UPDATE san_pham SET trang_thai = 1 WHERE id_san_pham = :id");
        $stmt->execute([':id' => $restore_id]);
    }
    header("Location: thung_rac.php");
    exit;
}

// 2. Xử lý Xóa vĩnh viễn khỏi CSDL
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['force_delete_id'])) {
    $force_id = filter_input(INPUT_POST, 'force_delete_id', FILTER_VALIDATE_INT);
    if ($force_id && $force_id > 0) {
        try {
            $stmt = $pdo->prepare("DELETE FROM san_pham WHERE id_san_pham = :id");
            $stmt->execute([':id' => $force_id]);
        } catch (PDOException $e) {
            die("Không thể xóa vĩnh viễn sản phẩm này vì đang có dữ liệu liên kết ở bảng vùng trồng, giá nông sản hoặc đầu mối! <a href='thung_rac.php'>Quay lại Thùng rác</a>");
        }
    }
    header("Location: thung_rac.php");
    exit;
}

// 3. Lấy danh sách các sản phẩm đang nằm trong thùng rác (trang_thai = 0)
$sql = "SELECT * FROM san_pham WHERE trang_thai = 0 ORDER BY id_san_pham DESC";
$stmt = $pdo->query($sql);
$ds_thung_rac = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thùng rác - Sản phẩm ngừng hiển thị</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 24px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 14px;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 8px 10px;
        text-align: left;
    }

    th {
        background-color: #fbe9e7;
    }

    .btn-back {
        display: inline-block;
        padding: 8px 14px;
        background: #6c757d;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
    }

    .empty {
        padding: 14px;
        background: #e8f5e9;
        border: 1px solid #c8e6c9;
        margin-top: 14px;
    }

    .btn-restore {
        color: #2e7d32;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-delete {
        color: #d32f2f;
        cursor: pointer;
        margin-left: 6px;
    }
    </style>
</head>

<body>

    <h2>Thùng rác (Sản phẩm đang ẩn - trang_thai = 0)</h2>
    <a href="index.php" class="btn-back">← Quay lại Danh sách chính</a>

    <?php if (count($ds_thung_rac) === 0): ?>
    <div class="empty">Thùng rác hiện đang trống.</div>
    <?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Mã SP</th>
                <th>Tên sản phẩm</th>
                <th>Loại nông sản</th>
                <th>Đơn vị tính</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ds_thung_rac as $sp): ?>
            <tr>
                <td><?= htmlspecialchars((string)$sp['id_san_pham']) ?></td>
                <td><?= htmlspecialchars($sp['ten_san_pham']) ?></td>
                <td><?= htmlspecialchars($sp['loai_nong_san']) ?></td>
                <td><?= htmlspecialchars($sp['don_vi_tinh']) ?></td>
                <td><?= htmlspecialchars($sp['mo_ta']) ?></td>
                <td>
                    <!-- Form Khôi phục -->
                    <form method="POST" action="thung_rac.php" style="display:inline;">
                        <input type="hidden" name="restore_id"
                            value="<?= htmlspecialchars((string)$sp['id_san_pham']) ?>">
                        <button type="submit" class="btn-restore">Khôi phục</button>
                    </form>

                    <!-- Form Xóa vĩnh viễn -->
                    <form method="POST" action="thung_rac.php" style="display:inline;"
                        onsubmit="return confirm('Xóa vĩnh viễn sẽ không thể khôi phục. Bạn chắc chắn chứ?');">
                        <input type="hidden" name="force_delete_id"
                            value="<?= htmlspecialchars((string)$sp['id_san_pham']) ?>">
                        <button type="submit" class="btn-delete">Xóa vĩnh viễn</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>

</body>

</html>