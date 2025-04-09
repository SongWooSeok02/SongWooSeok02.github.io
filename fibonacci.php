<?php
$n = intval($_POST['n']);
$f = [1, 1];

for ($i = 2; $i < $n; $i++) {
  $f[$i] = $f[$i - 1] + $f[$i - 2];
}

echo "<h2>Fibonacci 수열 결과</h2>";
echo "<table border='1'>";
echo "<tr><th>i</th><th>fi</th><th>fi+1 / fi</th></tr>";

for ($i = 0; $i < $n; $i++) {
  echo "<tr><td>".($i+1)."</td><td>$f[$i]</td>";
  echo $i > 0 ? "<td>".round($f[$i] / $f[$i - 1], 6)."</td>" : "<td></td>";
  echo "</tr>";
}

echo "</table>";
?>