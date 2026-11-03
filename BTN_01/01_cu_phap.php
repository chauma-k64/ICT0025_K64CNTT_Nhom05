<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>01. Cú Pháp</title>
</head>
<body style="background-color:aquamarine">
    <h3>Bài 1: Cú pháp và lời chào</h3>
    <form method="get" action="">
        Nhập họ tên: <input type="text" name="hoVaTen">
        <input type="submit" value="Gửi">
    </form>
    <?php
    if (isset($_GET['hoVaTen'])){
        $hoVaTen = $_GET['hoVaTen'];
        echo "<h3>Xin chào $hoVaTen</h3> ";
    }
    ?>

</body>
</html>