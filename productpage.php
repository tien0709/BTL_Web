<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mac</title>
    <link rel="stylesheet" href="./icon/fontawesome-free-6.2.0-web/css/all.min.css">
    <link
    rel="stylesheet"
    type="text/css"
    href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
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
</head>
<body>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-control" action="" method="post" enctype="multipart/form-data">
          <h3>Chọn ảnh để tải lên:</h3>
          <input type="file" name="fileToUpload" id="fileToUpload" value="Chọn hình ảnh tải lên">
          <input class="btn btn-light btn-outline-dark" type="submit" value="Tải lên hình ảnh"  name="submit" id="buttonToUpload">
        </form>
      </div>
    </div>
  </div>
</div>
<?php 
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
if(isset($_SESSION['email'])){
$target_dir = "uploads/";
$target_file = $target_dir . uniqid() . '.' . pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
  echo "<script>" . "alert(' ảnh đã tồn tại');". "</script>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "<script>" . "alert(' kích thước ảnh phải nhỏ hơn 500MB.');". "</script>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "<script>" . "alert(' ảnh phải có định dạng jpg, png, gif hoặc jpeg');". "</script>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

  echo "<script>" . "alert(' thay đổi ảnh không thành công');". "</script>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

    echo "<script>" . "alert('file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " đã được upload.');". "</script>";
        // Lưu tên file vào cột avatar trong bảng account
        $new_name = basename($target_file);
        $sql = "UPDATE account SET image='$new_name' WHERE email = '{$_SESSION['email']}' "; // Thay đổi id tương ứng với tài khoản cần lưu avatar
        $db = mysqli_connect('localhost','root','','shop');
        mysqli_query($db, $sql);
  } else {
    echo "<script>" . "alert('có Lỗi khi upload file của bạn.');". "</script>";
  }
}
}
else {
    
    echo "<script>" . "alert('Bạn phải đăng nhập để có thể thay đổi ảnh đại diện!');". "</script>";
}
}
?>
    <div class="app">
        <header class="header">
            <div class="container">
                <div class="header-wrap fl">
                    <div class="header-bar">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <div class="over_lay"></div>
                    <div class="navbar__mb">
                        <ul class="navbar__mb-list">
                            <li> <img src="./uploads/avatar.jpg" class="avatar-bar" alt="no image">
                                <?php 
                                if(isset($_SESSION['email'])){
                                    $db = mysqli_connect('localhost','root','','shop');
                                    $sql = " SELECT * FROM account ";
                                    $result = mysqli_query($db,$sql);
                                    while($row = mysqli_fetch_assoc($result)){  
                                    // Kiểm tra thông tin đăng nhập
                                        if($row['email']== $_SESSION['email']){
                                          echo '<script>document.getElementsByClassName("avatar-bar")[0].setAttribute("src", "./uploads/'.$row['image'].'?'.time().'");</script>';
                                          echo "<p class='h4 pl-1' style='display:inline-block;'> " . $_SESSION['username'] . "</p>";
                                        }
                                    }
                                }
                                ?>
                            </li>
                            <li> 
                                <a href="log_in.php" class="navbar__mb-link">
                                    <i class="fa-solid fa-right-to-bracket minwidth25px"></i>
                                    Đăng nhập
                                </a>
                            </li>
                            <li> 
                                <a href="log_out.php" class="navbar__mb-link">
                                    <i class="fa-solid fa-right-to-bracket minwidth25px"></i>
                                    Đăng xuát
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar__mb-list ">
                            <li> 
                                <a href="" class="navbar__mb-link">
                                    <i class="fa-solid fa-house minwidth25px"></i>                                
                                    Trang chủ
                                </a>
                            </li>
                            <li> <a href="" class="navbar__mb-link">
                                <i class="fa-solid fa-circle-info minwidth25px"></i>
                                Giới thiệu
                            </a>
                            </li>
                            <li> 
                                <a href="" class="navbar__mb-link">
                                    <i class="fa-solid fa-shop minwidth25px"></i>
                                    Cửa hàng
                                </a>
                            </li>
                            <li> 
                                <a href="" class="navbar__mb-link">
                                    <i class="fa-solid fa-newspaper minwidth25px"></i>
                                    Tin tức
                                </a>
                            </li>
                            <li> 
                                <a href="#" class="navbar__mb-link" data-toggle="modal" data-target="#exampleModal">
                                   <i class="fa-solid fa-cloud-upload minwidth25px"></i>
                                    Thay ảnh đại diện
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="header_left fl">
                        <div class="header__logo">
                            <img src="./img/lntt.png" alt="" class="logo-img">
                        </div>
                        <ul class="header__list">
                            <li class="header__item"><a href="" class="header__item-link">Trang chủ</a></li>
                            <li class="header__item"><a href="" class="header__item-link">Giới thiệu</a></li>
                            <li class="header__item"><a href="" class="header__item-link">Cửa hàng</a></li>
                            <li class="header__item"><a href="" class="header__item-link">Tin tức</a></li>
                        </ul>
                    </div>
                   <div class="header_right fl">
                        <div class="header__search">
                            <form action="" class="search-bar">
                                <input type="search" name="search" class="header__search-input" placeholder="Nhập tên sản phẩm..." onkeyup="showResult(this.value)">
                                <span class="search-btn">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                            </form>
                            <ul id="search-suggestions"></ul>
                            <script>
                            function showResult(str) {
                                if (str.length==0) {
                                    document.getElementById("search-suggestions").innerHTML="";
                                    document.getElementById("search-suggestions").style.border="0px";
                                    return;
                                }
                                var xmlhttp=new XMLHttpRequest();
                                xmlhttp.onreadystatechange=function() {
                                    if (this.readyState==4 && this.status==200) {
                                        document.getElementById("search-suggestions").innerHTML=this.responseText;
                                        document.getElementById("search-suggestions").style.border="1px solid #A5ACB2";
                                        document.getElementById("search-suggestions").style.display="block";
                                    }
                                }
                                xmlhttp.open("GET", "livesearch.php?q=" + str, true);
                                xmlhttp.send();
                            }
                            </script>
                        </div>
                        <div class="header__notification">
                            <i class="fa-solid fa-bell"></i>
                        </div>
                        <div class="header__shoppingCard">
                            <i class="fa-solid fa-cart-shopping header__shoppingCard-icon"></i>
                        </div>
                        <div class="header__user">
                            <img src="./uploads/avatar.jpg" class="avatar" alt="no image">
                            <div class="header__user-log">
                                <ul class="user-log-list">
                                <?php 
                                if(isset($_SESSION['email'])){
                                    $db = mysqli_connect('localhost','root','','shop');
                                    $sql = " SELECT * FROM account ";
                                    $result = mysqli_query($db,$sql);
                                    while($row = mysqli_fetch_assoc($result)){  
                                    // Kiểm tra thông tin đăng nhập
                                        if($row['email']== $_SESSION['email']){
                                          echo '<script>document.getElementsByClassName("avatar")[0].setAttribute("src", "./uploads/'.$row['image'].'?'.time().'");</script>';
                                          echo "<li class='user-log-item h3'>". $_SESSION['username'] ."</li>";
                                        }
                                    }
                                }
                                ?>
                                    <li class="user-log-item border_tb"><a href="log_in.php" class="text-dark">Đăng nhập</a></li>
                                    <li class="user-log-item"><a href="log_out.php" class="text-dark">Đăng xuất</a> </li>
                                    <li class="user-log-item border_tb"><a id="select" class=" pe-auto minwidth25px" data-toggle="modal" data-target="#exampleModal">
                                        Thay ảnh đại diện
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="header-searchMobile">
                            <i class="header-searchMobile__icon fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                    
                </div>
            </div>
        </header>
        <div class="main">
            <div class="breadcrumb-wrap">
                <div class="container">
                   <div class="row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Macbook</a></li>
                    </ul>  
                   </div>
                </div>
            </div>  
            <div class="container">
                <div class="products">
                    <div class="products-wrap">
                        <h2 class="product-title productpage-title">Macbook</h2>
                        <div class="row gx-5 mt-top25">
                            <div class="col-lg-3 col-md-6 col-sm-6 ">
                                <div class="product-item">
                                    <span class="tra-gop mt-bottom25">Trả góp 0%</span>
                                    <a href="">
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h3 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h3>
                                    </a>
                                    <div>
                                        <span class="product-item__desc">RAM 8GB</span> 
                                    <span class="product-item__desc">SSD 256GB</span>
                                    </div>
                                    <div class="fl spbw product-item__price-wrap">
                                        <span class="product-item__price">10.990.000 ₫</span>
                                        <span class="product-item__price-old">10.990.000 ₫</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="product-item">
                                    <span class="tra-gop mt-bottom25">Trả góp 0%</span>
                                    <a href="">
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h3 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h3>
                                    </a>
                                    <div>
                                        <span class="product-item__desc">RAM 8GB</span> 
                                    <span class="product-item__desc">SSD 256GB</span>
                                    </div>
                                    <div class="fl spbw product-item__price-wrap">
                                        <span class="product-item__price">10.990.000 ₫</span>
                                        <span class="product-item__price-old">10.990.000 ₫</span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="product-item">
                                    <span class="tra-gop mt-bottom25">Trả góp 0%</span>
                                    <a href="">
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h3 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h3>
                                    </a>
                                    <div>
                                        <span class="product-item__desc">RAM 8GB</span> 
                                    <span class="product-item__desc">SSD 256GB</span>
                                    </div>
                                    <div class="fl spbw product-item__price-wrap">
                                        <span class="product-item__price">10.990.000 ₫</span>
                                        <span class="product-item__price-old">10.990.000 ₫</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="product-item">
                                    <span class="tra-gop mt-bottom25">Trả góp 0%</span>
                                    <a href="">
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h3 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h3>
                                    </a>
                                    <div>
                                        <span class="product-item__desc">RAM 8GB</span> 
                                    <span class="product-item__desc">SSD 256GB</span>
                                    </div>
                                    <div class="fl spbw product-item__price-wrap">
                                        <span class="product-item__price">10.990.000 ₫</span>
                                        <span class="product-item__price-old">10.990.000 ₫</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 ">
                                <div class="product-item">
                                    <span class="tra-gop mt-bottom25">Trả góp 0%</span>
                                    <a href="">
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h3 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h3>
                                    </a>
                                    <div>
                                        <span class="product-item__desc">RAM 8GB</span> 
                                    <span class="product-item__desc">SSD 256GB</span>
                                    </div>
                                    <div class="fl spbw product-item__price-wrap">
                                        <span class="product-item__price">10.990.000 ₫</span>
                                        <span class="product-item__price-old">10.990.000 ₫</span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 ">
                                <div class="product-item">
                                    <span class="tra-gop mt-bottom25">Trả góp 0%</span>
                                    <a href="">
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h3 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h3>
                                    </a>
                                    <div>
                                        <span class="product-item__desc">RAM 8GB</span> 
                                    <span class="product-item__desc">SSD 256GB</span>
                                    </div>
                                    <div class="fl spbw product-item__price-wrap">
                                        <span class="product-item__price">10.990.000 ₫</span>
                                        <span class="product-item__price-old">10.990.000 ₫</span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 ">
                                <div class="product-item">
                                    <span class="tra-gop mt-bottom25">Trả góp 0%</span>
                                    <a href="">
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h3 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h3>
                                    </a>
                                    <div>
                                        <span class="product-item__desc">RAM 8GB</span> 
                                    <span class="product-item__desc">SSD 256GB</span>
                                    </div>
                                    <div class="fl spbw product-item__price-wrap">
                                        <span class="product-item__price">10.990.000 ₫</span>
                                        <span class="product-item__price-old">10.990.000 ₫</span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 ">
                                <div class="product-item">
                                    <span class="tra-gop mt-bottom25">Trả góp 0%</span>
                                    <a href="">
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h3 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h3>
                                    </a>
                                    <div>
                                        <span class="product-item__desc">RAM 8GB</span> 
                                    <span class="product-item__desc">SSD 256GB</span>
                                    </div>
                                    <div class="fl spbw product-item__price-wrap">
                                        <span class="product-item__price">10.990.000 ₫</span>
                                        <span class="product-item__price-old">10.990.000 ₫</span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>       
                </div>
                <div class=" row gx-5 category-description">
                    <h3>Mua MacBook giá rẻ chính hãng tại LNTT</h3>
                    <p>Apple từ trước tới nay có lẽ đã là một thương hiệu không còn quá xa lạ đối với nhiều người tiêu dùng hiện nay. Song hành với iPhone, MacBook hiện đang là một trong hai dòng sản phẩm mang tính biểu tượng của nhà Táo kể từ khi ra mắt cho đến hiện tại. Vậy dòng laptop này của Apple có gì đặc biệt mà lại được nhiều người dùng quan tâm và săn đón đến như vậy?</p>
                    <h4>Những lý do nên lựa chọn MacBook</h4>
                    <p>Apple hiện đang có 2 dòng MacBook chính là MacBook Air và MacBook Pro. Bên cạnh đó, trong những năm gần đây Apple còn cho ra mắt thêm dòng MacBook M series sử dụng con chip Apple Silicon M do chính công ty nghiên cứu và sản xuất.</p>
                    <h5>Thiết kế hiện đại, sang trọng</h5>
                    <p>So với những dòng sản phẩm laptop đến từ các thương hiệu khác, dòng MacBook của Apple sở hữu một ngôn ngữ thiết kế đẹp và bóng bẩy mà khi nhìn vào sản phẩm, người dùng sẽ thấy ngay được cảm giác cao cấp và sang trọng. Đối với nhiều dòng MacBook, phần logo quả táo ở nắp máy còn có thể sáng lên. Và đây cũng chính là những đặc điểm nhận diện thương hiệu vô cùng đặc biệt, giúp các mẫu Apple MacBook khác biệt hoàn toàn so với những chiếc máy tính xách tay tới từ các hãng khác.</p>
                    <p>Ở các dòng MacBook, người dùng sẽ không thể tìm thấy bất cứ một mẫu máy nào có thiết kế cồng kềnh. Mọi sản phẩm MacBook đều mang kích thước vô cùng mỏng gọn cùng trọng lượng siêu nhẹ, chỉ rơi vào khoảng từ 1 đến 1.5kg. Ngoài ra, mọi chi tiết dù là nhỏ nhất trên máy cũng đều được hoàn thiện vô cùng tỉ mỉ và liền mạch. Bạn sẽ khó có thể tìm thấy một chi tiết thừa, hay bộ khung bị ọp ẹp trên các mẫu MacBook. Quả thật, sản phẩm do Apple làm ra luôn mang một chất lượng và đẳng cấp khác biệt so với phần còn lại của thế giới công nghệ.</p>                 
                    <h5>Màn hình sắc nét, màu sắc cực chuẩn</h5>
                    <p>Những mẫu sản phẩm MacBook luôn được Apple trang bị màn hình với độ phân giải cao, khả năng hiển thị vô cùng sắc nét cùng màu sắc tái hiện cực chuẩn. Đây chính là một trong nhiều ưu điểm của dòng máy tính xách tay tới từ nhà Táo. Nếu như bạn là một người làm những công việc có liên quan tới đồ họa, lập trình hay sáng tạo nội dung thì các thiết bị MacBook sẽ là sản phẩm vô cùng thích hợp với bạn.</p>
                    <p>Với MacBook, bạn hoàn toàn có thể yên tâm sử dụng mà không sợ gặp phải những tình trạng sai màu, hình ảnh bị nhòe, không rõ nét, từ đó tăng hiệu quả và chất lượng trong công việc.</p>
                    <h5>Hiệu năng khủng, đáp ứng mượt mà mọi tác vụ</h5>
                    <p>Hầu hết những mẫu MacBook mới hiện nay đều sử dụng bộ vi xử lý “cây nhà lá vườn” Apple M series (mới đây nhất là Apple M2). Đây là những bộ vi xử lý do chính Apple nghiên cứu và sản xuất, có hiệu năng siêu khủng, giúp người dùng thực hiện mọi tác vụ công việc, giải trí một cách mượt mà và nhanh chóng hơn bao giờ hết.</p>
                    <h5>Pin bền bỉ, sử dụng lâu dài</h5>
                    <p>Tùy từng dòng sản phẩm mà chúng có thể có thời lượng pin và thời gian sử dụng khác nhau, nhưng nhìn chung, hầu hết các sản phẩm MacBook đều được trang bị pin có khả năng sử dụng bền bỉ và lâu dài. Trung bình nếu người dùng chỉ lướt web bằng kết nối Wi-Fi khi màn hình được thiết lập ở độ sáng 50%, máy sẽ trụ được khoảng hơn 9 tiếng liên tục. Con số này vượt qua mức 7 tiếng của XPS 13 và 7 tiếng 30 phút của Surface Pro 7, trong khi đó với những mẫu laptop HP Envy, thời gian sử dụng trung bình chỉ rơi vào khoảng hơn 6 tiếng.</p>
                    <h5>Mức độ bảo mật cao</h5>
                    <p>Đây cũng chính là niềm tự hào của những người dùng sử dụng MacBook. Windows mặc dù hiện đang là hệ điều hành được sử dụng nhiều nhất trên thế giới, tuy nhiên do tính chất là một hệ điều hành mở, cộng thêm việc nó quá phổ biến khiến cho mức độ bảo mật không cao. Trong khi đó một chiếc MacBook chạy macOS dù cho không cần cài đặt quá nhiều phần mềm chống virus nhưng chắc chắn là sẽ ít có nguy cơ bị lây nhiễm và bị tấn công hơn máy tính Windows.</p>
                
                
                </div>
            </div>
        </div>
        <footer>
            <div class="footer">
                <div class="container text-center">
                    <div class="row pd-bottom32">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <h3 class="footer__heading ">Chăm sóc khách hàng</h3>
                            <ul class="footer__list">
                                <li class="footer__list-item">
                                    <a href="" class="footer__list-item-link">Trung tâm trợ giúp</a>
                                </li>
                                <li class="footer__list-item">
                                    <a href="" class="footer__list-item-link">Hướng dẫn mua hàng</a>
                                </li>
                                <li class="footer__list-item">
                                    <a href="" class="footer__list-item-link">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <h3 class="footer__heading">Giới thiệu</h3>
                            <ul class="footer__list">
                                <li class="footer__list-item">
                                    <a href="" class="footer__list-item-link">Giới thiệu</a>
                                </li>
                                <li class="footer__list-item">
                                    <a href="" class="footer__list-item-link">Tuyển dụng</a>
                                </li>
                                <li class="footer__list-item">
                                    <a href="" class="footer__list-item-link">Điều khoản</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <h3 class="footer__heading">Chính sách</h3>
                            <ul class="footer__list">
                                <li class="footer__list-item">
                                    <a href="" class="footer__list-item-link">Đổi trả</a>
                                </li>
                                <li class="footer__list-item">
                                    <a href="" class="footer__list-item-link">Giao hàng</a>
                                </li>
                                <li class="footer__list-item">
                                    <a href="" class="footer__list-item-link">Thu cũ đổi mới</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <h3 class="footer__heading">Theo dõi</h3>
                            <ul class="footer__list">
                                <li class="footer__list-item">
                                    <a href="" class="footer__list-item-link">
                                        <i class="fa-brands fa-facebook"></i>
                                        Facebook
                                    </a>
                                </li>
                                <li class="footer__list-item">
                                    <a href="" class="footer__list-item-link">
                                        <i class="fa-brands fa-instagram"></i>
                                        Instagram
                                    </a>
                                </li>
                                <li class="footer__list-item">
                                    <a href="" class="footer__list-item-link">
                                        <i class="fa-brands fa-twitter"></i>
                                        Twitter
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer__bottom">
                    <p class="footer__bottom-text">
                        Bản quyền thuộc ...
                    </p>
                </div>
            </div>
        </footer>
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
    <!-- <script>
    AOS.init();
  </script> -->
</html>











