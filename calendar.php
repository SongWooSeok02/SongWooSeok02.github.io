<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>달력 출력</title>
    <style>
        table { border-collapse: collapse; width: 50%; text-align: center; }
        th, td { border: 1px solid black; padding: 10px; }
        th { background-color: pink; }
    </style>
</head>
<body>

<?php
$y = $_POST["year"];
$m = $_POST["month"];
$d = cal_days_in_month(CAL_GREGORIAN, $m, $y);
$firstDay = date("w", strtotime("$y-$m-01"));

echo "<h2>$y 년 $m 월 달력</h2>";
echo "<table>";
echo "<tr><th>일</th><th>월</th><th>화</th><th>수</th><th>목</th><th>금</th><th>토</th></tr><tr>";

for ($i = 0; $i < $firstDay; $i++) echo "<td></td>";

for ($day = 1; $day <= $d; $day++) {
    echo "<td>$day</td>";
    if (($day + $firstDay) % 7 == 0) echo "</tr><tr>";
}

echo "</tr></table>";
?>

</body>
</html>