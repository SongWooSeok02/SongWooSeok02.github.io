<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"></head>
<body>

<?php
$n = (int)$_POST["n"];
if ($n < 1 || $n > 100) {
  echo "1~100 사이의 수를 입력하세요.";
  exit;
}

$f = [0, 1];
for ($i = 2; $i < $n; $i++) {
  $f[$i] = $f[$i-1] + $f[$i-2];
}

echo "<table border='1'><tr><th>i</th><th>값</th><th>비례</th></tr>";
for ($i = 0; $i < $n; $i++) {
  $r = $i == 0 ? "-" : round($f[$i] / $f[$i-1], 6);
  echo "<tr><td>".($i+1)."</td><td>$f[$i]</td><td>$r</td></tr>";
}
echo "</table>";
?>

</body>
</html>