<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="icon" href="./img/ltnn.png">
    <link rel="stylesheet" href="./icon/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/main_1.css">
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
</head>
<body>
    <div class="app">
    <?php
    include("pages/header.php")
    ?>
        <div class="main">
            <div class="breadcrumb-wrap">
                <div class="container">
                   <div class="row gx-5">
                    <div class="col-lg-2">
                    </div>
                      <ul class="breadcrumb col-lg-8">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Giỏ hàng</a></li>
                    </ul>  
                    <div class="col-lg-2">
                    </div>
                   </div>
                </div>
            </div>  
            <div class="container">
                <div class="order mt-top25">
                   <div class="row gx-5 ">
                    <div class="col-lg-2 col-md-0 col-sm-0 col-xs-0 ">
                    </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <?php
                            $cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
                            $cart = json_decode($cart);


                            $total = 0;

                            foreach ($cart as $c)
                            {
                                $intPrice = intval(str_replace('.','',$c->product->price));
                                $total += $intPrice * $c->quantity;
                                ?>
                                <div class="row order-product">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 order-product__img">
                                    <img src="<?php echo $c->product->image;?>" alt="no image"></a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 order-product__name">
                                    <a href=""><?php echo $c->product->products_name;?></a>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 order-product__wrap">
                                    <div class="order-product__price">
                                        <p><?php echo $c->product->price;?> đ</p>
                                    </div>
                                    <form action="updateQ.php" method="post">
                                        <label for="">Số lượng:</label>
                                        <input type="number" name="quantity" value="<?php echo $c->quantity;?>">
                                        <input type="hidden" name="products_id" value="<?php echo $c->product_ID; ?>">
                                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                                    </form>
                                </div>
                                <form action="deleteOrder.php" method="post" class="col-lg-1 col-md-1 col-sm-1 col-xs-1 order-product__delete">
                                    <input type="hidden" name="products_id" value="<?php echo $c->product_ID; ?>">
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </div>

                                <?php
                            }
                            ?>
                            <div class="row order_info">
                                <h2 class="mt-bottom25">Thông tin thanh toán</h2>
                                <form action="saveOrder.php" method="post">
                                    <input type="text" id="name" name="name" placeholder="Họ và tên" required><br><br>

                                    <input type="email" id="email" name="email" placeholder="Email" required><br><br>
                                    <input type="tel" id="phone" name="phone" placeholder="Số điện thoại" required><?php if (isset($error["phone"])) { ?>
                                    <p style="color: red;"><?php echo $error["phone"]; ?></p>
                                    <?php } ?><br><br>
                                    <textarea id="address" name="address" placeholder="Địa chỉ" rows="4" cols="50" required></textarea>
                                    <input id="order" name="order" type="hidden" value="<?php
                                        foreach ($cart as $c){
                                            echo $c -> product ->products_name;
                                            echo "(".$c->product_ID.")";
                                            echo "x";
                                            echo $c -> quantity;
                                            echo ": ";
                                            echo $c -> quantity * $intPrice;
                                            echo "đ";
                                            echo ", ";
                                        }
                                        ?>">
                                
                            </div>
                            <div class=" row order-total">
                                <div class="row gx-5">
                                    <div class="col-lg-2">
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="order-price__wrap d-flex">
                                            <span>Tổng tiền:</span>
                                            <span style="font-size: 2rem;" class="red_text"><?php echo number_format($total,0,'','.');?> đ</span>
                                            <input type="hidden" name="total_price" value="<?php echo number_format($total,0,'','.');?> đ"></input>
                                        </div>
                                        <div class="product-item__buy order-btn_wrap">
                                            <button class="Btn order-btn btn-grad">ĐẶT HÀNG</button>                                
                                        </div>
                                        <p style="margin-top: 8px; font-size: 1.5rem;" class="red_text">(*) Phí phụ thu sẽ được tính khi bạn tiến hành thanh toán.</p>
                                    </div>
                                    <div class="col-lg-2">
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                   </div>
                    <div class="col-lg-2 col-md-0 col-sm-0 col-xs-0">
                    </div>
                </div>
            </div>
        
        </div>


    <?php
    include("pages/footer.php")
    ?>
    </div>
    <script
    type="text/javascript"
    src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
    type="text/javascript"
    src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
    type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <script src="./js/main.js"></script>
</body>
    
</html>
