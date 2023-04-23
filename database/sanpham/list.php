<?php
    $sql ="SELECT * FROM products inner join brands on products.brand_id = brands.brand_id";
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

</head>
<body>
    <div class="container">
        <h1>Danh sách sản phẩm</h1>
        <div class="table-responsive-sm">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Giảm giá</th>
                <th>Mô tả</th>
                <th>Thương hiệu</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            <?php 
            $i=1;
            while ($row = mysqli_fetch_assoc($query)) { ?>
                <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['products_name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['discount']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['brand_name']; ?></td>
                <td><a href="sanpham.php?page_layout=edit&id=<?php echo $row['products_id'] ?>" class="btn btn-warning">Sửa</a></td>
                <td><a onclick="return Del('<?php echo $row['products_name'] ?>')" href="sanpham.php?page_layout=remove&id=<?php echo $row['products_id'] ?>" class="btn btn-danger">Xóa</a></td>
                </tr>
            <?php } ?>
        </table>
        </div>
        <a class="btn btn-primary" href="sanpham.php?page_layout=add"> Thêm mới</a>
    </div>
    <script>
        function Del(name) {
            return confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");
        }
    </script>
</body>
</html>