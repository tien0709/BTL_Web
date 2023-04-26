<?php
require_once "./Connect.php";

$stmt = $conn->prepare('SELECT * FROM blog');
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$blog = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Thêm tệp CSS của Bootstrap -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1 style="text-align: center;">Danh sách bài viết</h1>
    <div class="container mt-5">
        <div class="wrap d-flex justify-content-between">
            <a href="../quanli.php" class="btn btn-primary">Trở về trang chủ</a>
            <a href="blogWriter.php" class="btn btn-primary">Thêm bài viết</a>
        </div>
        <br>
        <table id="myTable" class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Blog Title</th>
                    <th>Blog Tag</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($blog as $b) { ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $b["blog_title"] ?></td>
                        <td><?php echo $b["blog_tag"] ?></td>
                        <td><?php echo $b["date"] ?></td>
                        <td>
                            <a href="blogRewrite.php?blog_id=<?php echo $b["blog_id"] ?>" class="btn btn-primary">Edit</a>
                            <a href="deleteBlog.php?blog_id=<?php echo $b["blog_id"] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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