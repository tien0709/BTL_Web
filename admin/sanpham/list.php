<?php
$sql = "SELECT * FROM products inner join brands on products.brand_id = brands.brand_id";
$query = mysqli_query($mysqli, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css" />

    <style>
        table th {
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <h1 style="text-align:center">Danh sách sản phẩm</h1>
    <div class="container">
        <a class="btn btn-primary" href="sanpham.php?page_layout=add"> Thêm mới</a>

        <a href="../quanli.php" class="btn btn-primary">Trở về trang chủ</a>
        <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg mt-3" style="overflow: auto;">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Giá ban đầu</th>
                        <th>Thương hiệu</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['products_name']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['discount']; ?></td>
                        <td><?php echo $row['brand_name']; ?></td>
                        <td><a href="sanpham.php?page_layout=edit&id=<?php echo $row['products_id'] ?>" class="btn btn-warning">Sửa</a></td>
                        <td><a href="sanpham.php?page_layout=remove&id=<?php echo $row['products_id'] ?>" class="btn btn-danger">Xóa</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
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