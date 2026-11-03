<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>02. Bien</title>
</head>
<body>
    <?php
    //Khai bao bien
    $taiNghe = "Dép tổ Ong";
    $soLuong = 15;
    $donGia = 100000;
    // in giá trị
    echo "Sản phẩm: $taiNghe <br>";
    echo "Số lượng ban đầu: $soLuong <br>";
    echo "Đơn giá: $donGia VNĐ <br>";
    //Đổi số lượng
    $soLuong = 11;
    echo 'Số lượng sau khi thay đổi là: '.$soLuong;
    ?>
</body>
</html>