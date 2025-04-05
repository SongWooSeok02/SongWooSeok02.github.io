<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>결과</title></head>
<body>

<?php
$s = $_POST["s"];
$w = $_POST["w"] ?? 0;
$h = $_POST["h"] ?? 0;
$l = $_POST["l"] ?? 0;
$r = $_POST["r"] ?? 0;
$p = pi();

if ($s == "t") echo "삼각형: " . ($w * $h / 2);
elseif ($s == "r") echo "직사각형: " . ($w * $h);
elseif ($s == "c") echo "원: " . ($p * $r * $r);
elseif ($s == "cb") echo "직육면체: " . ($w * $l * $h);
elseif ($s == "cy") echo "원통: " . ($p * $r * $r * $h);
elseif ($s == "sp") echo "구: " . ((4/3) * $p * $r ** 3);
else echo "잘못된 입력";
?>

</body>
</html>