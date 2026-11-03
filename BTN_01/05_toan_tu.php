<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>05. Toán tử</title>
</head>
<body>
    <?php
    $soA = 12;
    $soB = 5;
    echo "$soA + $soB = ".($soA + $soB)."<br>";
    echo "$soA - $soB = ".($soA - $soB)."<br>";
    echo "$soA x $soB = ".($soA * $soB)."<br>";
    echo "$soA / $soB = ".($soA / $soB)."<br>";
    echo "$soA % $soB = ".($soA % $soB)."<br>";
    echo "---------------- <br>";
    //Toán tử gán kết hợp
    $soA += 5;
    echo "Giá trị sau khi thực hiện $soA += 5 là: " . $soA . "<br>";
    //So sánh 5 với '5'
    echo "---------------- <br>";
    echo "So sánh 5 == '5': "; var_dump(5 == "5"); echo "<br>";
    echo "So sánh 5 === '5': "; var_dump(5 === "5"); echo "<br>";
    //Toán tử logic:
    echo "-----------------<br>";
    $x = 10;
    echo "Biểu thức ($x > 5) && ($x < 20): "; 
    var_dump(($x > 5) && ($x < 20)); echo "<br>";
    ?>
    ?>
</body>
</html>