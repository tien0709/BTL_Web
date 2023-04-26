<?php
$sql = "SELECT * FROM account";
$query = mysqli_query($mysqli, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí người dùng</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1 style="text-align: center">Danh sách người dùng</h1>
    <div class="container">
        <a href="../quanli.php" class="btn btn-primary">Trở về trang chủ</a>
        <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg mt-3">
            <table id="myTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['password'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td style="text-align: center;"><a href="xoa.php?page_layout=remove&id=<?php echo $row['id'] ?>" class="btn btn-danger">Xóa</a></td>
                        </tr>
                    <?php endwhile; ?>
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