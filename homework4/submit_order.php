<?php
$conn = new mysqli("localhost", "root", "", "ticket_orders");
$conn->set_charset("utf8mb4");
if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}

$customer = $_POST['customer_name'];
$ticket_types = $_POST['ticket_type'];
$child_qtys = $_POST['child_qty'];
$adult_qtys = $_POST['adult_qty'];
$child_prices = $_POST['child_price'];
$adult_prices = $_POST['adult_price'];

for ($i = 0; $i < count($ticket_types); $i++) {
    $ticket = $ticket_types[$i];
    $child_qty = (int)$child_qtys[$i];
    $adult_qty = (int)$adult_qtys[$i];
    $child_total = $child_qty * (int)$child_prices[$i];
    $adult_total = $adult_qty * (int)$adult_prices[$i];
    $total_price = $child_total + $adult_total;

    // 수량 0이면 저장 안 함
    if ($child_qty == 0 && $adult_qty == 0) continue;

    $stmt = $conn->prepare("INSERT INTO orders (customer, ticket, child_qty, adult_qty, total_price) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}
    $stmt->bind_param("ssiii", $customer, $ticket, $child_qty, $adult_qty, $total_price);
    $stmt->execute();
}

echo "주문이 성공적으로 접수되었습니다.";
?>
