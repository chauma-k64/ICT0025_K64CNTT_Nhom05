<?php
require_once 'connect.php';

// Lấy toàn bộ danh sách sản phẩm, sắp xếp mới nhất lên đầu
$sql = "SELECT * FROM san_pham ORDER BY id_san_pham DESC";
$stmt = $conn->query($sql);
$dsSanPham = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý Nông sản</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Danh sách Nông sản Địa phương</h2>
    <a href="insert_sanpham.php" class="btn btn-add">+ Thêm nông sản mới</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên nông sản</th>
                <th>Loại nông sản</th>
                <th>Đơn vị tính</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>

            </tr>
        </thead>
        <tbody>
            <?php if (count($dsSanPham) > 0): ?>
            <?php foreach ($dsSanPham as $sp): ?>
            <tr>
                <td><?= htmlspecialchars((string)$sp['id_san_pham'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><strong><?= htmlspecialchars($sp['ten_san_pham'], ENT_QUOTES, 'UTF-8') ?></strong></td>
                <td><?= htmlspecialchars($sp['loai_nong_san'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($sp['don_vi_tinh'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($sp['mo_ta'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <?= $sp['trang_thai'] == 1 ? '<span class="status-active">Hiển thị</span>' : '<span class="status-inactive">Ngừng hiển thị</span>' ?>
                </td>

            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="7" class="empty-state">Chưa có dữ liệu nông sản nào.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>