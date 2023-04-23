<?php
require_once "./Connect.php";
$phone = $_GET["phone"];

$stmt = $conn->prepare("SELECT * FROM user_order WHERE phone = $phone");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$query = $stmt->fetchAll();

?>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>Nội dung đơn hàng</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($query as $q){ ?>
            <tr>
            <td><?php echo $q["order_id"]?></td>
            <td><?php echo $q["name"]?></td>
            <td><?php echo $q["email"]?></td>
            <td><?php echo $q["phone"]?></td>
            <td><?php echo $q["address"]?></td>
            <td><?php echo $q["order_content"]?></td>
            <td><?php echo $q["total_price"]?></td>
            </tr>
            <?php } ?>
        </tbody>
        

    </table>

</body>

