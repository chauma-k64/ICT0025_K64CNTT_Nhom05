<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>06. Vận dụng</title>
</head>
<body>
    <?php
    // Khai báo hằng số: Tỷ lệ phí bảo quản/vận chuyển nông sản (5%)
    define("TY_LE_PHI", 0.05);

    // Khai báo biến cho nông sản
    $tenNongSan = "Táo mèo";
    $soLuong = 100;         // Đơn vị: kg 
    $donGia =8000;      // Đơn vị: VNĐ/kg

    // Tính toán 
    $tienHang = ($soLuong * $donGia);
    $tienPhi = ($tienHang * TY_LE_PHI);
    $tongTien = ($tienHang + $tienPhi);

    // Hiển thị kết quả 
    echo "----HỆ THỐNG QUẢN LÝ NÔNG SẢN----<br>";
    echo "Tên mặt hàng: " . $tenNongSan . "<br>";
    echo "Số lượng: " . $soLuong . " kg<br>";
    echo "Đơn giá: " . number_format($donGia, 0, ',', '.') . " VNĐ/kg<br>";
    echo "Tiền hàng: " . number_format($tienHang, 0, ',', '.') . " VNĐ<br>";
    echo "Phí bảo quản/vận chuyển (5%): " . number_format($tienPhi, 0, ',', '.') . " VNĐ<br>";
    echo "Tổng tiền thanh toán: " . number_format($tongTien, 0, ',', '.') . " VNĐ</>";
    ?>  
</body>
</html>