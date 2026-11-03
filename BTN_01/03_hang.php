<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>03. Hằng</title>
</head>
<body>
    <?php 
    //Khai báo hằng số
    define("DON_VI_TIEN","VNĐ");
    const TY_LE_THUE =  0.08;

    $giaGoc = 500000;
    $tienThue = $giaGoc*TY_LE_THUE  ;
    echo "Giá gốc: " . $giaGoc . " " . DON_VI_TIEN . "<br>";
    echo "Tỷ lệ thuế áp dụng: " . (TY_LE_THUE * 100) . "%<br>";
    echo "Tiền thuế: " . $tienThue . " " . DON_VI_TIEN . "<br>";
    ?>
</body>
</html>