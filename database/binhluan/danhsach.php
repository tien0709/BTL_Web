<?php
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webbanlap";

// Tạo kết nối đến cơ sở dữ liệu
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bình luận
    </title>
</head>

<body>
    <h1>Danh sách bình luận</h1>
    <ul>
        <?php

        $sql = "SELECT products_name, products_id FROM products";
        $result_sql = $conn->query($sql);
        if (!$result_sql) {
            die("Lỗi truy vấn: " . $conn->error);
        }
        while ($row = $result_sql->fetch_assoc()) {
        ?>
            <li>
                <a href="list_cmt.php?id=<?php echo $row['products_id'] ?>"><?php echo $row['products_name'] ?>;</a>
            </li>
        <?php
        } ?>
    </ul>
</body>

</html>