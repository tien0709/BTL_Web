<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra cứu đơn hàng</title>
    <meta name="description" content="Trang web bán laptop chất lượng với giá cả hợp lý.">
    <meta name="keywords" content="laptop, mua laptop, giá laptop">
    <link rel="icon" href="./img/ltnn.png">
    <link rel="stylesheet" href="./icon/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/e26d989c97.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
       
    </style>
</head>

<body>
    <div class="app">
        <?php
        include("pages/header.php")
        ?>
        <div class="main">
            <div class="breadcrumb-wrap">
                <div class="container">
                    <div class="row">
                        <ul class="breadcrumb">
                            <?php
                            $breadcrumbs = array(
                                'Trang chủ' => 'index.php',
                                'Tra cứu đơn hàng' => '#'
                            );

                            foreach ($breadcrumbs as $title => $link) {
                                if ($link === '#') {
                                    echo '<li class="breadcrumb-item">' . $title . '</li>';
                                } else {
                                    echo '<li class="breadcrumb-item"><a href="' . $link . '">' . $title . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row product-section" style="min-height:450px;justify-content: center;">
                    <form method="get" action="" class="row form-searchOrder">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-6">
                            <div class="row" style="justify-content: center;">
                                <div class="col-lg-8 col-md-5 col-sm-5 mt-bottom20">
                                    <input type="number" name="phone" class="form-control form-control-lg form-searchOrder__input" placeholder="Nhập số điện thoại của bạn">
                                </div>
                                <div class="col-lg-4 col-md-3 col-sm-3" style="text-align: center;">
                                    <button type="submit" class="btn btn-primary btn-lg form-searchOrder__btn">Search</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                        </div>
                    </form>
                    <div class="row justify-content-center">
                        <div class="col-lg-10" style="text-align: center;">
                            <?php
                            require_once "./Connect.php";

                            if (isset($_GET["phone"])) {
                                $phone = $_GET["phone"];
                                $stmt = $conn->prepare("SELECT * FROM user_order WHERE phone = :phone");
                                $stmt->bindParam(':phone', $phone);
                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                $stmt->execute();
                                $query = $stmt->fetchAll();
                                if ($stmt->rowCount() == 0) {
                                    echo "Không có dữ liệu";
                                } else {
                            ?>
                                    <div class="table-responsive-lg table-responsive-sm table-responsive-md " style="overflow: auto;">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="max-width: 120px" scope="col">Tên</th>
                                                    <th style="max-width: 120px" scope="col">SĐT</th>
                                                    <th style="max-width: 250px" scope="col">Địa chỉ</th>
                                                    <th style="max-width: 250px" scope="col">Nội dung đơn hàng</th>
                                                    <th style="max-width: 120px" scope="col">Tổng tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($query as $q) { ?>
                                                    <tr>
                                                        <td style="max-width: 120px" scope="row"><?php echo $q["name"] ?></td>
                                                        <td style="max-width: 120px"><?php echo $q["phone"] ?></td>
                                                        <td style="max-width: 250px"><?php echo $q["address"] ?></td>
                                                        <td style="max-width: 250px"><?php echo $q["order_content"] ?></td>
                                                        <td style="max-width: 120px"><?php echo $q["total_price"]?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include("pages/footer.php")
        ?>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>