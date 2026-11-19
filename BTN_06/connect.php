<?php
require_once 'config.php';

// 2. Ghép chuỗi DSN từ các hằng số đã định nghĩa
$conn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // 3. Truyền trực tiếp hằng số vào hàm tạo PDO
    $pdo = new PDO($conn, DB_USER, DB_PASS, $options); 
} catch (PDOException $e) {
    die("Lỗi kết nối: " . htmlspecialchars($e->getMessage()));
}