<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $trangThai = 1;
    if ($trangThai == 1) {
        echo "Mới tạo";
    } 
    else if ($trangThai == 2) {
        echo "Đang xử lý";
    }else{                                                                                                                     
        echo "Không xác định";
    }
    ?>
</body>
</html>