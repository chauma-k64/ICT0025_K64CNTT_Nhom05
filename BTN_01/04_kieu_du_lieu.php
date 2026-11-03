<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>04. Kiểu dữ liệu</title>
</head>
<body>
   <?php 
   // Các biến và gắn
   $hoVaTen = "Mùa A Chạu";
   $tuoi = 22;
   $canNang = 56.5;
   $gioiTinh = true;
   $null = null;
    //Kiểm tra kiểu dữ liệu
   echo "Kiểm tra các kiểu dữ liêu: <br>";
   echo "Chuỗi: ";var_dump($hoVaTen);
   echo "<br>";
   echo "Tuổi: ";var_dump($tuoi);
   echo "<br>";
   echo "Cân nặng: ";var_dump($canNang);
   echo "<br>";
   echo "Giới tính: ";var_dump($gioiTinh);
   echo "<br>";
   echo "Giái trị rỗng: ";var_dump($null);
   echo "<br>";
    //Ép dữ liệu
    $chuoiSo = "12";
    $soEpKieu = (int)$chuoiSo;
    echo "Trước khi ép kiểu: ";var_dump($chuoiSo);
    echo "<br>";
    echo "Sau khi ép kiểu: ";var_dump($soEpKieu);
   ?> 
</body>
</html>