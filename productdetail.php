<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Macbook.com</title>
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
        <!-- Header -->
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
        <!-- Category -->
        <div class="category">
          <div class="main">
            <div class="breadcrumb-wrap">
              <div class="container">
                 <div class="row">
                    <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="homepage.html">Trang chủ</a></li>
                      <li class="breadcrumb-item"><a href="#">Macbook</a></li>
                  </ul>  
                 </div>
              </div>
          </div>  
            <div class="container">
              <!-- Products info -->
              <div class="row gx-5 product_info product-section">
                <div class="col-lg-6 col-md-12  rounded product_info_left">
                    <div class="">
                      <div class="laptop">
                        <div id="carouselExampleIndicators" class=" carousel slide carousel-fade" data-bs-ride="carousel">
                          <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <div class="clear"></div>
                          </div>
                          <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="5000">
                              <img src="./img/category/nitro5_1.jpg" class="d-block w-100" alt="No image">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                              <img src="./img/category/nitro5_2.jpg" class="d-block w-100" alt="No image">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                              <img src="./img/category/nitro5_3.png" class="d-block w-100" alt="No image">
                            </div>
                          </div>
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                        </div>
                      </div>
                    </div>
                      <ul class="list-group mb-3">
                        <li class="list-group-item p-3">
                          <span>
                            <i class="fa-solid fa-box "></i>  
                          </span>
                              Bộ sản phẩm gồm: Dây nguồn, Sách hướng dẫn, Thùng máy, Sạc Laptop Acer
                        </li>
                        <li class="list-group-item p-3">
                          <span>
                            <i class="fa-solid fa-tag "></i>
                          </span>
                            Hư gì đổi nấy <b>12 tháng</b>  (miễn phí tháng đầu)
                        </li>
                        <li class="list-group-item p-3">
                          <span>
                            <i class="fa-solid fa-shield"></i>
                          </span>
                            Bảo hành chính hãng laptop <b>1 năm</b> tại các trung tâm bảo hành hãng
                        </li>
                      </ul>  
                  </div>
                  <div class="col-lg-6 col-md-12 rounded product_info_right">
                    <p class="product_info_name">Laptop Acer Nitro Gaming AN515-57-5669 i5 11400H/8GB/512GB SSD/Nvidia GTX1650 4GB/Win11</p>
                    <div class="rate d-flex product_info-rate">
                      <span><i class="fa-solid fa-star fa-starActive"></i></span>
                      <span><i class="fa-solid fa-star fa-starActive"></i></span>
                      <span><i class="fa-solid fa-star fa-starActive"></i></span>
                      <span><i class="fa-solid fa-star fa-starActive"></i></span>
                      <span><i class="fa-solid fa-star"></i></span>
                  </div>
                  <div class="product_info_price d-flex align-items-center">
                    <span class="price-final">17.990.000đ</span>
                    <span class="price-real">19.290.000đ</span>
                  </div>
                  <div class="product_info_promotion">
                    <h4 class="product_info_promotion-title">ƯU ĐÃI ĐI KÈM</h4>
                    <ul>
                      <li class="text-success d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                        </svg>
                        <p class="text-dark">Giảm 50% phần mềm diệt virus, bảo vệ thanh toán F-secure.</p>
                      </li>
                      <li class="text-success d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                        </svg>
                        <p class="text-dark">Ưu đãi giảm 50% (Trên giá NY) các linh kiện RAM, ổ cứng Laptop tùy chọn.</p>
                      </li>
                      <li class="text-success d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                        </svg>
                        <p class="text-dark">Ưu đãi giảm thêm 100.000đ khi mua Microsoft Office kèm Laptop.</p>
                      </li>
                      <li class="text-success d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                        </svg>
                        <p class="text-dark">Tặng thêm Balo Gaming CAO CẤP Gaming Predator SUV trị giá 2 triệu đồng.</p>
                      </li>
                    </ul>
                  </div>
                    <div class="d-flex justify-content-center align-items-center product_info__freeship">
                      <span class="text-light ">            
                        <i class="fa-solid fa-truck-fast"></i> 
                        MIỄN PHÍ VẬN CHUYỂN
                      </span>
                    </div>
                    <div class="d-flex justify-content-between">
                      <div class="product-item__buy product_info__buy">
                        <button class="Btn Btn-lg btn-grad">MUA NGAY</button>                                
                      </div>
                      <div class="product-item__buy product_info__buy">
                        <button class="Btn Btn-lg btn-grad">CHO VÀO GIỎ</button>                                
                    </div>
                    </div>
                    
                  </div>  
              </div>
              <!-- Products details  -->
              <div class="row gx-5 product-detail product-section">
                <h3 class="product-detail__title">TÍNH NĂNG THÔNG SỐ KỸ THUẬT</h3>
                <div class="col-lg-6 rounded ">
                    <img src="./img/category/nitro5_detail.png" class="d-block w-100" alt="No image">
                </div>  
                <div class="col-lg-6 rounded ">
                  <h4 class="product-detail__name">Thông số kỹ thuật</h4>
                  <ul class="list-group product-detail__list">
                    <li class="list-group-item list-group-item-secondary pd10">CPU: i511400H2.7GHz</li>
                    <li class="list-group-item pd10">RAM: 8 GBDDR4 2 khe (1 khe 8 GB + 1 khe rời) 3200 MHz</li>
                    <li class="list-group-item list-group-item-secondary pd10">Ổ cứng: 512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB)
                      Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1 TB)Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2 TB)</li>
                    <li class="list-group-item pd10">Màn hình: 15.6"Full HD (1920 x 1080) 144Hz</li>
                    <li class="list-group-item list-group-item-secondary pd10">Card màn hình: Card rời GTX 1650 4GB</li>
                    <li class="list-group-item pd10">Hệ điều hành: Windows 11 Home SL</li>
                    <li class="list-group-item list-group-item-secondary pd10">Đặc biệt: Có đèn bàn phím</li>
                    <li class="list-group-item pd10">Kích thước, khối lượng: Dài 363.4 mm - Rộng 255 mm - Dày 23.9 mm - Nặng 2.2 kg</li>
                    <li class="list-group-item list-group-item-secondary pd10">Thời điểm ra mắt: 2021</li>
                  </ul>    
                  <!-- Button to Open the Modal -->
                    <div class="product-detail__btn-wrap">
                      <button type="button" class="Btn product-detail__btn"
                    data-bs-toggle="modal" data-bs-target="#myModal">
                      Xem cấu hình chi tiết
                    </button>
                    </div>
                  <!-- The Modal -->
                  <div class="modal fade " id="myModal">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
                      <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Thông số kỹ thuật PC HP AIO 22-df1043d i5-1135G7/8GB/256GB/Win11 (601L9PA)</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                  
                        <!-- Modal body -->
                        <div class="modal-body">
                          <ul class="list-group">
                            <li class="list-group-item list-group-item-secondary"><h5>Bộ xử lí</h5></li>
                            <li class="list-group-item list-group-item-light"><b>Công nghệ CPU:</b> Intel Core i5 Tiger Lake - 11400H</li>
                            <li class="list-group-item list-group-item-light"><b>Số nhân</b>: 6</li>
                            <li class="list-group-item list-group-item-light"><b>Số luồng</b>: 12</li>
                            <li class="list-group-item list-group-item-light"><b>Tốc độ CPU</b>: 2.70 GHz</li>
                            <li class="list-group-item list-group-item-light"><b>Turbo Boost:</b> 4.5 GHz</li>
                            <li class="list-group-item list-group-item-light"><b>Bộ nhớ đệm:</b> 12 MB</li>
                            <li class="list-group-item list-group-item-secondary"><h5>Bộ nhớ RAM, Ổ cứng</h5></li>
                            <li class="list-group-item list-group-item-light"><b>RAM:</b> 8 GB</li>
                            <li class="list-group-item list-group-item-light"><b>Loại RAM:</b> DDR4 2 khe (1 khe 8 GB + 1 khe rời)
                            <li class="list-group-item list-group-item-light"><b>Tốc độ Bus RAM:</b> 3200 MHz
                            <li class="list-group-item list-group-item-light"><b>Hỗ trợ RAM tối đa:</b> 32 GB
                            <li class="list-group-item list-group-item-light"><b>Ổ cứng:</b>
                              <ul>
                                <li>512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB)</li>
                                <li>Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2 TB)</li>
                                <li>Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1 TB)</li>
                              </ul>
                            </li> 
                            <li class="list-group-item list-group-item-secondary"><h5>Màn hình</h5></li>
                            <li class="list-group-item list-group-item-light"><b>Màn hình:</b> 15.6 inch</li>
                            <li class="list-group-item list-group-item-light"><b>Độ phân giải:</b> Full HD (1920 x 1080)</li>
                            <li class="list-group-item list-group-item-light"><b>Tần số quét:</b> 144 Hz</li>
                            <li class="list-group-item list-group-item-light"><b>Công nghệ màn hình:</b> 
                              <ul>
                                <li>512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB)</li>
                                <li>Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2 TB)</li>
                                <li>Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1 TB)</li>
                              </ul>
                            </li>
                            <li class="list-group-item list-group-item-secondary"><h5>Đồ họa và Âm thanh</h5></li>
                            <li class="list-group-item list-group-item-light"><b>Card màn hình:</b> Card rời - NVIDIA GeForce GTX 1650 4 GB</li>
                            <li class="list-group-item list-group-item-light"><b>Công nghệ âm thanh:</b> Acer TrueHarmonyDTS X:Ultra Audio</li>
                            <li class="list-group-item list-group-item-secondary"><h5>Cổng kết nối & tính năng mở rộng</h5></li>
                            <li class="list-group-item list-group-item-light"><b>Cổng giao tiếp:</b>
                              <ul>
                                <li>USB Type-C</li>
                                <li>Jack tai nghe 3.5 mm</li>
                                <li>3 x USB 3.2</li>
                                <li>HDMI</li>
                                <li>LAN (RJ45)</li>
                              </ul>
                            </li>
                            <li class="list-group-item list-group-item-light"><b>Kết nối không dây:</b> Wi-Fi 6 (802.11ax)Bluetooth 5.1</li>
                            <li class="list-group-item list-group-item-light"><b>Webcam:</b> HD webcam</li>
                            <li class="list-group-item list-group-item-light"><b>Tính năng khác:</b> Đèn bàn phím chuyển màu RGB</li>
                            <li class="list-group-item list-group-item-light"><b>Đèn bàn phím:</b> Có</li>
                            <li class="list-group-item list-group-item-secondary"><h5>Kích thước & khối lượng</h5></li>
                            <li class="list-group-item list-group-item-light"><b>Kích thước, khối lượng:</b> Dài 363.4 mm - Rộng 255 mm - Dày 23.9 mm - Nặng 2.2 kg</li>
                            <li class="list-group-item list-group-item-light"><b>Chất liệu:</b> Vỏ nhựa</li>
                            <li class="list-group-item list-group-item-secondary"><h5>Thông tin khác</h5></li>
                            <li class="list-group-item list-group-item-light"><b>Thông tin Pin:</b> 57 Wh Li-ion</li>
                            <li class="list-group-item list-group-item-light"><b>Hệ điều hành:</b> Windows 11 Home SL</li>
                            <li class="list-group-item list-group-item-light"><b>Thời điểm ra mắt:</b> 2021</li>
                          </ul>
                        </div>
                          
                        <!-- Modal footer -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Product suggestions  -->
              <div class="row gx-5 product-suggestions__wrap product-section">
                <h3 class="product-detail__title">SẢN PHẨM DÀNH RIÊNG CHO BẠN</h3>
                <div class="product-suggestions">
                    <div class="product-item product-suggestions-item">
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
                    <div class="product-item product-suggestions-item">
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
                    <div class="product-item product-suggestions-item">
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
                    <div class="product-item product-suggestions-item">
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
                    <div class="product-item product-suggestions-item">
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
                    <div class="product-item product-suggestions-item">
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
                    <div class="product-item product-suggestions-item">
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
                    <div class="product-item product-suggestions-item">
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
              <!--  Product reviews   -->
              <div class="row gx-5 border_top_radius6 product-reviews product-section">
                <h3 class="product-detail__title">ĐÁNH GIÁ SẢN PHẨM</h3>
                <div class="col-lg-6">
                  <div class="row pd-bottom25 product-reviews__list">
                    <div class="col-lg-6">
                      <div class="rating-list">
                        <h4>Đánh giá trung bình</h4>
                        <p>5/5</p>
                        <div class="rate d-flex justify-content-center">
                          <span><i class="fa-solid fa-star fa-starActive"></i></span>
                          <span><i class="fa-solid fa-star fa-starActive"></i></span>
                          <span><i class="fa-solid fa-star fa-starActive"></i></span>
                          <span><i class="fa-solid fa-star fa-starActive"></i></span>
                          <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <span>67 đánh giá</span>
                      </div>
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-between line-block">
                      <div class="line-number d-flex align-items-center justify-content-center">
                        <span class="d-flex align-items-center">5 <i class="fa-solid fa-star fa-starActive"></i></span>
                        <div class="line-block__bar">
                          <div class="line-block__bar-percent"></div>
                        </div>
                      </div>
                      <div class="line-number d-flex align-items-center justify-content-center">
                        <span class="d-flex align-items-center">4 <i class="fa-solid fa-star fa-starActive"></i></span>
                        <div class="line-block__bar">
                          <div class="line-block__bar-percent"></div>
                        </div>
                      </div>
                      <div class="line-number d-flex align-items-center justify-content-center">
                        <span class="d-flex align-items-center">3 <i class="fa-solid fa-star fa-starActive"></i></span>
                        <div class="line-block__bar">
                          <div class="line-block__bar-percent"></div>
                        </div>
                      </div>
                      <div class="line-number d-flex align-items-center justify-content-center">
                        <span class="d-flex align-items-center">2 <i class="fa-solid fa-star fa-starActive"></i></span>
                        <div class="line-block__bar">
                          <div class="line-block__bar-percent"></div>
                        </div>
                      </div>
                      <div class="line-number d-flex align-items-center justify-content-center">
                        <span class="d-flex align-items-center">1 <i class="fa-solid fa-star fa-starActive"></i></span>
                        <div class="line-block__bar">
                          <div class="line-block__bar-percent"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="product-reviews-vote">
                      <h3 >Viết đánh giá riêng của bạn</h3>
                      <div class="product-reviews-vote__star d-flex align-items-center mt-bottom10">
                        <span>Chất lượng*: </span>
                        <div class="rate justify-content-center">
                          <span class="star"><i class="fa-solid fa-star"></i></span>
                          <span class="star"><i class="fa-solid fa-star"></i></span>
                          <span class="star"><i class="fa-solid fa-star"></i></span>
                          <span class="star"><i class="fa-solid fa-star"></i></span>
                          <span class="star"><i class="fa-solid fa-star"></i></span>
                        </div>
                      </div>
                      <div class="product-reviews-vote__input mt-bottom10">
                        <p>Tên của bạn: </p>
                        <input type="text">
                      </div>
                      <div class="product-reviews-vote__textarea mt-bottom10">
                        <p>Đánh giá của bạn về sản phẩm:</p> 
                        <textarea name="" id="" cols="30" rows="5"></textarea>
                      </div>
                      <div class="">
                        <button class="Btn product-reviews-vote__btn">Gửi</button>                                
                      </div>
                  </div>
                  </div>
                </div>
                <div class="col-lg-6 product_review_cmt_list">
                  <div class="product_review_cmt_item ">
                    <div class="product_review_cmt-title">
                      <div class="product_review_cmt-title-wrap d-flex align-items-center">
                        <img src="./img/category/24-248253_user-profile-default-image-png-clipart-png-download.png" alt="" class="avt-review">
                        <p class="name-review">Chu Lợi</p>
                        <div class="date-review"> - 26/03/2023</div>
                      </div>
                      <div class="rate d-flex">
                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                      </div>
                      <p class="review-for-item">
                        Sản phẩm tốt, so với các shop khác giá ổn, chưa biết chính sách bảo hành như nào vì máy chưa hỏng...
                      </p>
                    </div>
                  </div>
                  <div class="product_review_cmt_item ">
                    <div class="product_review_cmt-title">
                      <div class="product_review_cmt-title-wrap d-flex align-items-center">
                        <img src="./img/category/24-248253_user-profile-default-image-png-clipart-png-download.png" alt="" class="avt-review">
                        <p class="name-review">Chu Lợi</p>
                        <div class="date-review"> - 26/03/2023</div>
                      </div>
                      <div class="rate d-flex">
                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                      </div>
                      <p class="review-for-item">
                        Sản phẩm tốt, so với các shop khác giá ổn, chưa biết chính sách bảo hành như nào vì máy chưa hỏng...
                      </p>
                    </div>
                  </div>
                  <div class="product_review_cmt_item ">
                    <div class="product_review_cmt-title">
                      <div class="product_review_cmt-title-wrap d-flex align-items-center">
                        <img src="./img/category/24-248253_user-profile-default-image-png-clipart-png-download.png" alt="" class="avt-review">
                        <p class="name-review">Chu Lợi</p>
                        <div class="date-review"> - 26/03/2023</div>
                      </div>
                      <div class="rate d-flex">
                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                      </div>
                      <p class="review-for-item">
                        Sản phẩm tốt, so với các shop khác giá ổn, chưa biết chính sách bảo hành như nào vì máy chưa hỏng...
                      </p>
                    </div>
                  </div>
                  
                </div>
              
              </div>  
            </div>    
          </div>
        </div>
          
        <!-- Footer -->
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
</html>