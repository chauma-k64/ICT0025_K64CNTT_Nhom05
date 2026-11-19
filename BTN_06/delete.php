<?php
require_once __DIR__ . '/connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$id = filter_input(INPUT_POST, 'id_san_pham', FILTER_VALIDATE_INT);

if ($id && $id > 0) {
    try {
        $stmt = $pdo->prepare("UPDATE san_pham SET trang_thai = 0 WHERE id_san_pham = :id");
        $stmt->execute([':id' => $id]);
    } catch (PDOException $e) {
        die("Không thể xóa sản phẩm này vì đang có dữ liệu liên kết ở bảng vùng trồng, giá nông sản hoặc đầu mối! <a href='index.php'>Quay lại danh sách</a>");
    }
}

header("Location: index.php");
exit;