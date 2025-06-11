<?php
$conn = new mysqli("localhost", "root", "", "ticket_orders");
if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

$result = $conn->query("SELECT * FROM orders ORDER BY order_date DESC");

if (!$result) {
    die("쿼리 오류: " . $conn->error);
}

echo "<h2>주문 목록</h2>";
echo "<table border='1'>
<tr><th>고객명</th><th>티켓종류</th><th>어린이</th><th>어른</th><th>총액</th><th>주문시간</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['customer']}</td>
            <td>{$row['ticket']}</td>
            <td>{$row['child_qty']}</td>
            <td>{$row['adult_qty']}</td>
            <td>{$row['total_price']}</td>
            <td>{$row['order_date']}</td>
          </tr>";
}
echo "</table>";
?>
