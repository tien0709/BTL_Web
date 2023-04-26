<?php
$conn = new mysqli("localhost", "root", "", "webbanlap");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
// Sản phẩm
$sql_pr = "SELECT COUNT(*) as count FROM products";
$result_pr = $conn->query($sql_pr);

if ($result_pr ->num_rows > 0) {
    $row_pr = $result_pr ->fetch_assoc();
    $count_pr = $row_pr["count"];
} else {
    echo "Không có bản ghi nào trong bảng ";
}

// Đơn hàng
$sql_or = "SELECT COUNT(*) as count FROM user_order";
$result_or = $conn->query($sql_or);

if ($result_pr ->num_rows > 0) {
    $row_or = $result_or ->fetch_assoc();
    $count_or = $row_or["count"];
} else {
    echo "Không có bản ghi nào trong bảng ";
}

// Bình luận
$sql_re = "SELECT COUNT(*) as count FROM reviews";
$result_re = $conn->query($sql_re);

if ($result_pr ->num_rows > 0) {
    $row_re = $result_re ->fetch_assoc();
    $count_re = $row_re["count"];
} else {
    echo "Không có bản ghi nào trong bảng ";
}

// Người dùng
$sql_user = "SELECT COUNT(*) as count FROM account";
$result_user = $conn->query($sql_user);

if ($result_pr ->num_rows > 0) {
    $row_user = $result_user ->fetch_assoc();
    $count_user = $row_user["count"];
} else {
    echo "Không có bản ghi nào trong bảng ";
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../icon/fontawesome-free-6.2.0-web/css/all.min.css">
</head>

<body>
        <header>
            <div class="container" style="line-height: 74px;">
                <a href="../index.php"><img src="../img/ltnn.png" alt=""></a>
            </div>
        </header>
    <div class="main">
        <div class="container-fluid" style="height: 100%;">
            <div class="row " style="height: 100%;">
                <div class="col-lg-2 admin_nav">
                    <h2>Admin</h2>
                    <ul class="admin_nav-list">
                        <li class="admin_nav-item"><a href="./user/user.php"><i class="fa-solid fa-user"></i>  Người dùng</a></li>
                        <li class="admin_nav-item"><a href="./sanpham/sanpham.php"><i class="fa-brands fa-product-hunt"></i> Sản phẩm</a></li>
                        <li class="admin_nav-item"><a href="./binhluan/danhsach.php"><i class="fa-solid fa-comment"></i> Bình luận</a></li>
                        <li class="admin_nav-item"><a href="./order/donhang.php"><i class="fa-solid fa-cart-shopping"></i> Đơn hàng</a></li>
                        <li class="admin_nav-item"><a href="./blog/blogManage.php"><i class="fa-solid fa-newspaper"></i> Tin tức</a></li>
                    </ul>
                </div>
                <div class="col-lg-10">
                    <div class="row">
                        <h3 class="over-view">
                            Tổng quan
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 d-flex justify-content-center block">
                                <div class="block-wrap">
                                    <i class="fa-solid fa-user"></i> 
                                    <span><?php echo $count_user ?></span>
                                    <p>Người dùng</p>
                                </div>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-center block">
                                <div class="block-wrap">
                                    <i class="fa-solid fa-comment"></i>
                                    <span><?php echo $count_re ?></span>
                                    <p>Bình luận</p>
                                </div>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-center block">
                                <div class="block-wrap">
                                    <i class="fa-brands fa-product-hunt"></i>
                                    <span><?php echo $count_pr ?></span>
                                    <p>Sản phẩm</p>
                                </div>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-center block">
                                <div class="block-wrap">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span><?php echo $count_or ?></span>
                                    <p>Đơn hàng</p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>