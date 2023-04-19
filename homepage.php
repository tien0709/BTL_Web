<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LNTT laptop - "Vua" Laptop</title>
	<meta name="description" content="Trang web bán laptop chất lượng với giá cả hợp lý.">
	<meta name="keywords" content="laptop, mua laptop, giá laptop">
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
<!-- modal upload -->
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
          <input class="btn btn-light btn-outline-dark" type="submit" value="Tải lên hình ảnh"  name="submitUpLoad" id="buttonToUpload">
        </form>
      </div>
    </div>
  </div>
</div>
<?php 
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['submitUpLoad'])){
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
}
?>
<!-- modal change password -->
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-control" action="" method="post">
          <h3>Thay đổi mật khẩu:</h3>
          <label class="form-label" for="old_password">Mật khẩu hiện tại: </label>
          <input type="password" class="border border-dark" name="old_password" id="old_password" value="" >
          <label class="form-label" for="new_password">Mật khẩu mới: </label>
          <input type="password" class="border border-dark" name="new_password" id="new_password" value="" >
          <label class="form-label" for="new_password">Nhập lại mật khẩu mới: </label>
          <input type="password" class="border border-dark" name="re_new_password" id="re_new_password" value="" >
          <input class="btn btn-light btn-outline-dark" type="submit" value="Thay đổi"  name="submitChange" id="buttonToChange">
        </form>
      </div>
    </div>
  </div>
</div>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  if(isset($_POST['submitChange'])){
    if(isset($_SESSION['email'])){
        if($_POST['old_password']!=$_SESSION['password']) echo "<script>" . "alert('Mật khẩu không chính xác!');". "</script>";
        else if($_POST['new_password']!=$_POST['re_new_password']) echo "<script>" . "alert('Mật khẩu mới nhập lại khác mật khẩu mới!');". "</script>";
        else{

            $db = mysqli_connect('localhost','root','','shop');
            $password = $_POST['new_password'];
            $password = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $password);
            $email = $_SESSION['email'];

            if(mysqli_query($db, "UPDATE account SET password = '$password' WHERE email = '$email'")){
                echo "<script> 
                alert('Thay đổi mật khẩu thành công!');
                window.location.href = 'log_out.php';
                </script>";//lam nhu nay de khac phuc loi "Cannot modify header information - headers already sent" xuất hiện khi trước khi gọi hàm header() để điều hướng trang, trang đã có output gửi về trình duyệt
            }
            else echo "<script>" . "alert('Không thể thay đổi mật khẩu !');". "</script>";
        }
    } 
    else {
        
        echo "<script>" . "alert('Bạn phải đăng nhập để có thể thay đổi mật khẩu!');". "</script>";
    }
  }
}
?>
<!------------------------------------------>
    <div class="main">
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
                                          echo "<p class='h3 pl-1' style='display:inline-block;'> " . $_SESSION['username'] . "</p>";
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
                                    Đăng xuất
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
                                    <i class="fa-solid  fa-newspaper minwidth25px"></i>
                                    Tin tức
                                </a>
                            </li>
                            <li> 
                                <a href="#" class="navbar__mb-link" data-toggle="modal" data-target="#exampleModal">
                                   <i class="fa-solid fa-cloud-upload minwidth25px"></i>
                                    Thay ảnh đại diện
                                </a>
                            </li>
                            <li> 
                                <a href="" class="navbar__mb-link" data-toggle="modal" data-target="#passwordModal">
                                    <i class="fa-solid  fa-key minwidth25px"></i>
                                    Đổi mật khẩu
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="header_left fl">
                        <div class="header__logo">
                            <img src="./img/lntt.png" alt="LNTT laptop" class="logo-img">
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
                                    <li class="user-log-item border_tb"><a id="changepw" class=" pe-auto minwidth25px" data-toggle="modal" data-target="#passwordModal">
                                        Đổi mật khẩu
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
        <div class="list-product__respon-wrap">
            <ul class="list-product__respon">
                <li class="item-product__respon">
                    <a href="" class="item-product__respon-link">Lenovo</a>
                </li>
                <li class="item-product__respon">
                    <a href="" class="item-product__respon-link">Asus</a>
                </li>
                <li class="item-product__respon">
                    <a href="" class="item-product__respon-link">Macbook</a>
                </li>
                <li class="item-product__respon">
                    <a href="" class="item-product__respon-link">HP</a>
                </li>
                <li class="item-product__respon">
                    <a href="" class="item-product__respon-link">MSI</a>
                </li>
            </ul>
        </div>
        <div class="slider">
            <div class="slider-item"> 
                <div class="slider-img">
                    <a href="#"><img src="./img/Slider/banner 8.webp" alt="no image"></a>
                </div>
            </div>
            <div class="slider-item"> 
                <div class="slider-img">
                    <a href="#"><img src="./img/Slider/banner ipad gen 9 PC-2.webp" alt="no image"></a>
                </div>
            </div>
            <div class="slider-item"> 
                <div class="slider-img">
                    <a href="#"><img src="./img/Slider/Banner PC.webp" alt="no image"></a>
                </div>
            </div>
        </div>
        <div class="slider slider_mb">
            <div class="slider-item"> 
                <div class="slider-img">
                    <a href="#"><img src="./img/Slider/0012058_Banner MB (3).webp" alt="no image"></a>
                </div>
            </div>
            <div class="slider-item"> 
                <div class="slider-img">
                    <a href="#"><img src="./img/Slider/Banner MB.webp" alt="no image"></a>
                </div>
            </div>
            <div class="slider-item"> 
                <div class="slider-img">
                    <a href="#"><img src="./img/Slider/0012077_banner 8.webp" alt="no image"></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="products-list fl spbw">
                <span class="products-list__name"><a href=""><img src="./img/Products/637340494668267616_Lenovo@2x.webp" alt="lenovo"></a></span>
                <span class="products-list__name"><a href=""><img src="./img/Products/637340493755614653_MSI@2x.webp" alt="msi"></a></span>
                <span class="products-list__name"><a href=""><img src="./img/Products/637619564183327279_HP@2x.webp" alt="hp"></a></span>
                <span class="products-list__name"><a href=""><img src="./img/Products/637732077455069770_Asus@2x.webp" alt="asus"></a></span>
                <span class="products-list__name"><a href=""><img src="./img/Products/637340494666704995_Acer@2x.webp" alt="acer"></a></span>
                <span class="products-list__name"><a href=""><img src="./img/Products/637340494666861275_Dell@2x.webp" alt="dell"></a></span>
                <span class="products-list__name"><a href=""><img src="./img/Products/637769104385571970_Macbook-Apple@2x.webp" alt="macbook"></a></span>
            </div>
            <div class="products">
                    <div class="products-wrap"  data-aos="fade-right"
                    data-aos-offset="300"
                    data-aos-easing="ease-in-sine">
                        <div>
                            <h1 class="product-title">Sản phẩm bán chạy</h1>
                        </div>
                        <div class="row mt-top25">
                            <div class="col-lg-3 col-md-6 col-sm-6 ">
                                <div class="product-item">
                                    <span class="tra-gop mt-bottom25">Trả góp 0%</span>
                                    <a href="">
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="lenovo-ideapad-3-15iau7" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h2 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h2>
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
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="lenovo-ideapad-3-15iau7" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h2 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h2>
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
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="lenovo-ideapad-3-15iau7" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h2 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h2>
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
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="lenovo-ideapad-3-15iau7" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h2 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h2>
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
                    <div class="products-wrap"  data-aos="fade-right"
                    data-aos-offset="300"
                    data-aos-easing="ease-in-sine">
                        <div>
                            <h1 class="product-title">Sản phẩm bán chạy</h1>
                        </div>
                        <div class="row mt-top25">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="product-item">
                                    <span class="tra-gop mt-bottom25">Trả góp 0%</span>
                                    <a href="">
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="lenovo-ideapad-3-15iau7" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h2 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h2>
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
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="lenovo-ideapad-3-15iau7" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h2 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h2>
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
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="lenovo-ideapad-3-15iau7" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h2 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h2>
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
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="lenovo-ideapad-3-15iau7" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h2 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h2>
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
                    <div class="products-wrap">
                        <div>
                            <h1 class="product-title">Sản phẩm bán chạy</h1>
                        </div>
                        <div class="row mt-top25">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="product-item">
                                    <span class="tra-gop mt-bottom25">Trả góp 0%</span>
                                    <a href="">
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="lenovo-ideapad-3-15iau7" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h2 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h2>
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
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="lenovo-ideapad-3-15iau7" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h2 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h2>
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
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="lenovo-ideapad-3-15iau7" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h2 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h2>
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
                                        <img src="./img/Products/lenovo-ideapad-3-15iau7-i3-82rk005lvn-(12).jpg" alt="lenovo-ideapad-3-15iau7" class="product-item__img pd-bottom25">
                                    </a>
                                    <div class="rate fl">
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <a href="">
                                        <h2 class="product-item__name">
                                            Lenovo Ideapad 3 15IAU7 i3 1215U (82RK005LVN)
                                        </h2>
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
        </div>
        <footer>
            <div class="newsletter">
                <h2 class="newsletter__heading">Đăng ký nhận tin từ ...</h2>
                <p class="newsletter__desc">Thông tin sản phẩm mới nhất và chương trình khuyến mãi</p>
                <div class="newsletter__email fl">
                    <div class="newsletter__email-wrap fl spbw">
                        <input type="email" placeholder="Email của bạn" class="newsletter__input">
                    <button class="newsletter__btn" >Đăng ký</button>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="container text-center">
                    <div class="row pd-bottom32">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <h2 class="footer__heading ">Chăm sóc khách hàng</h2>
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
                            <h2 class="footer__heading">Giới thiệu</h2>
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
                            <h2 class="footer__heading">Chính sách</h2>
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
                            <h2 class="footer__heading">Theo dõi</h2>
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
    ></scri>
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











