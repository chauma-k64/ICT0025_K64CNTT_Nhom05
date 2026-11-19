<?php
require_once __DIR__ . '/connect.php';

$sql  = "SELECT * FROM san_pham where trang_thai = 1 ORDER BY id_san_pham DESC";
$stmt = $pdo->query($sql); //Gửi thẳng câu lệnh SELECT cố định sang MySQL thực thi và trả về đối tượng kết quả $stmt
$ds_san_pham = $stmt->fetchAll();//Rút toàn bộ các dòng dữ liệu từ $stmt đổ vào một mảng 2 chiều ($ds_san_pham)
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý Sản phẩm Nông sản</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="list.css">
</head>

<body>

    <h2>Danh sách Sản phẩm Nông sản</h2>
    <a href="insert.php" class="btn-add">+ Thêm sản phẩm mới</a>
    <a href="thung_rac.php"
        style="display:inline-block; padding:8px 14px; background:#d84315; color:#fff; text-decoration:none; border-radius:4px; margin-left:6px;">Thùng
        rác</a>
    <?php if (count($ds_san_pham) === 0): ?>
    <div class="empty">Danh sách sản phẩm hiện đang rỗng.</div>
    <?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Mã SP</th>
                <th>Tên sản phẩm</th>
                <th>Loại nông sản</th>
                <th>Đơn vị tính</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ds_san_pham as $sp): ?>
            <tr>
                <td><?= htmlspecialchars((string)$sp['id_san_pham']) ?></td>
                <td><?= htmlspecialchars($sp['ten_san_pham']) ?></td>
                <td><?= htmlspecialchars($sp['loai_nong_san']) ?></td>
                <td><?= htmlspecialchars($sp['don_vi_tinh']) ?></td>
                <td><?= htmlspecialchars($sp['mo_ta']) ?></td>
                <td>
                    <?php if ((int)$sp['trang_thai'] === 1): ?>
                    <span class="badge-on">Đang hiển thị</span>
                    <?php else: ?>
                    <span class="badge-off">Ngừng hiển thị</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="update.php?id=<?= urlencode((string)$sp['id_san_pham']) ?>">Sửa</a>

                    <form method="POST" action="delete.php" class="delete-form"
                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');">
                        <input type="hidden" name="id_san_pham"
                            value="<?= htmlspecialchars((string)$sp['id_san_pham']) ?>">
                        <button type="submit" class="btn-delete">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>

</body>

</html>