<form method="POST" action="submit_order.php">
    고객성명: <input type="text" name="customer_name" required><br><br>
    <table border="1">
        <tr>
            <th>구분</th>
            <th>어린이</th>
            <th>어른</th>
        </tr>
        <?php
        $tickets = [
            ["입장권", 7000, 10000],
            ["BIG3", 12000, 18000],
            ["자유이용권", 21000, 28000],
            ["연간이용권", 70000, 90000],
        ];

        foreach ($tickets as $i => $ticket) {
            echo "<tr>
                    <td>{$ticket[0]}</td>
                    <td><input type='number' name='child_qty[$i]' value='0' min='0'></td>
                    <td><input type='number' name='adult_qty[$i]' value='0' min='0'></td>
                    <input type='hidden' name='ticket_type[$i]' value='{$ticket[0]}'>
                    <input type='hidden' name='child_price[$i]' value='{$ticket[1]}'>
                    <input type='hidden' name='adult_price[$i]' value='{$ticket[2]}'>
                  </tr>";
        }
        ?>
    </table>
    <br>
    <button type="submit">주문하기</button>
</form>
