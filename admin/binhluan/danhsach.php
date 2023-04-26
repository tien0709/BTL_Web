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
    <title>Danh sách bình luận</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        table th {
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Danh sách bình luận</h1>
    <div class="container">
        <a href="../quanli.php" class="btn btn-primary">Trở về trang chủ</a>
        <div class="row">
            <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg mt-3" style="overflow: auto;">
                <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">Tên sản phẩm</th>
                            <th style="text-align: center;">Số sao trung bình</th>
                            <th style="text-align: center;">Xem chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT products_name, products_id, rating_tb FROM products";
                        $result_sql = $conn->query($sql);
                        if (!$result_sql) {
                            die("Lỗi truy vấn: " . $conn->error);
                        }
                        $i = 0;
                        while ($row = $result_sql->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?= $row['products_name'] ?></td>
                                <td style="text-align: center;"><?= $row['rating_tb'] ?></td>
                                <td><a href="list_cmt.php?id=<?php echo $row['products_id'] ?>" class="btn btn-primary">Xem chi tiết</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable({
                "paging": true, // Bật tính năng phân trang
                "pageLength": 10, // Hiển thị 10 dòng trên mỗi trang
                "pagingType": "simple" // Sử dụng kiểu phân trang mặc định
            });
        });
    </script>
</body>

</html>