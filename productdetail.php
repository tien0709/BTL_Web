<?php
$conn = new mysqli("localhost", "root", "", "webbanlap");



if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}
$id = isset($_GET['id']) ? $_GET['id'] : '';
$id_cmt = $id;
$sql = "SELECT brand_id, products_name, image_desc_1,image_desc_2, image_desc_3, price, discount FROM products WHERE products_id = $id";
$result_sql = $conn->query($sql);

if (!$result_sql) {
  die("Lỗi truy vấn: " . $conn->error);
}

$row_name = $result_sql->fetch_assoc();
$brand_id = $row_name['brand_id'];

$sql_brand_name = "SELECT brand_name FROM brands WHERE brand_id = $brand_id";
$result_sql_brand_name = $conn->query($sql_brand_name);

if (!$result_sql_brand_name) {
  die("Lỗi truy vấn: " . $conn->error);
}

$row_brand_name = $result_sql_brand_name->fetch_assoc();
?>

<?php
$sql_rating_avg = "SELECT AVG(rating) AS rating_avg FROM reviews WHERE pr_id = $id";
$result_rating_avg = $conn->query($sql_rating_avg);
if ($result_rating_avg && $result_rating_avg->num_rows > 0) {
  $row_rating_avg = $result_rating_avg->fetch_assoc();
  $rating_avg = round($row_rating_avg['rating_avg'], 1);
  $sql_update_rating = "UPDATE products SET rating_tb = $rating_avg WHERE products_id = $id";
  $result_update_rating = $conn->query($sql_update_rating);
} else {
  echo "Không tìm thấy đánh giá nào.";
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $row_name['products_name'] ?></title>
  <meta name="description" content="Trang web bán laptop <?php echo $row_name['products_name'] ?> chất lượng với giá cả hợp lý.">
  <meta name="keywords" content="laptop, mua laptop <?php echo $row_name['products_name'] ?>, giá laptop <?php echo $row_name['products_name'] ?>">
  <link rel="stylesheet" href="./icon/fontawesome-free-6.2.0-web/css/all.min.css">
  <link rel="icon" href="./img/ltnn.png">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="./css/base.css">
  <link rel="stylesheet" href="./css/responsive.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/e26d989c97.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
  <div class="app">
    <?php
    include("pages/header.php")
    ?>
    <!-- Category -->
    <div class="category">
      <div class="main">
        <div class="breadcrumb-wrap">
          <div class="container">
            <div class="row">
              <ul class="breadcrumb">
                <?php
                $breadcrumbs = array(
                  'Trang chủ' => 'index.php',
                  $row_brand_name['brand_name'] => "productpage.php?id={$row_name['brand_id']}",
                );
                foreach ($breadcrumbs as $title => $link) {
                  echo '<li class="breadcrumb-item "><a class="b" href="' . $link . '">' . $title . '</a></li>';
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="container" style="padding: 0 10px;">
          <!-- Products info -->
          <div class="row gx-5 product_info product-section">
            <div class="col-lg-6 col-md-12  rounded product_info_left">
              <div class="">
                <div class="laptop">
                  <div id="carouselExampleIndicators" class=" carousel carousel-dark slide slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                      <div class="clear"></div>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active" data-bs-interval="3000">
                        <img src="<?php echo $row_name['image_desc_1'] ?>" class="d-block" alt="No image">
                      </div>
                      <div class="carousel-item" data-bs-interval="3000">
                        <img src="<?php echo $row_name['image_desc_2'] ?>" class="d-block" alt="No image">
                      </div>
                      <div class="carousel-item" data-bs-interval="3000">
                        <img src="<?php echo $row_name['image_desc_3'] ?>" class="d-block" alt="No image">
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
                  Bộ sản phẩm gồm: Dây nguồn, Sách hướng dẫn, Thùng máy, Sạc Laptop
                </li>
                <li class="list-group-item p-3">
                  <span>
                    <i class="fa-solid fa-tag "></i>
                  </span>
                  Hư gì đổi nấy <b>12 tháng</b> (miễn phí tháng đầu)
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
              <p class="product_info_name"><?php echo $row_name['products_name'] ?></p>
              <div class="rate d-flex product_info-rate">
                <?php
                $rating_avg1 = round($rating_avg);
                for ($i = 0; $i < $rating_avg1; $i++) { ?>
                  <span><i class="fa-solid fa-star fa-starActive"></i></span>
                <?php
                }
                for ($i = $rating_avg1; $i < 5; $i++) { ?>
                  <span><i class="fa-solid fa-star"></i></span>
                <?php
                }
                ?>
              </div>
              <div class="product_info_price d-flex align-items-center">
                <span class="price-final"><?php echo $row_name['price'] ?> ₫</span>
                <span class="price-real"><?php echo $row_name['discount'] ?> ₫</span>
              </div>
              <div class="product_info_promotion">
                <h4 class="product_info_promotion-title">ƯU ĐÃI ĐI KÈM</h4>
                <ul>
                  <li class="text-success d-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                      <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                    </svg>
                    <p class="text-dark">Giảm 50% phần mềm diệt virus, bảo vệ thanh toán F-secure.</p>
                  </li>
                  <li class="text-success d-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                      <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                    </svg>
                    <p class="text-dark">Ưu đãi giảm 50% (Trên giá NY) các linh kiện RAM, ổ cứng Laptop tùy chọn.</p>
                  </li>
                  <li class="text-success d-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                      <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                    </svg>
                    <p class="text-dark">Ưu đãi giảm thêm 100.000đ khi mua Microsoft Office kèm Laptop.</p>
                  </li>
                  <li class="text-success d-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                      <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
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
                <form action="buynow.php" method="post" class="product-item__buy product_info__buy">
                  <input type="hidden" name="quantity" value="1">
                  <input type="hidden" name="products_id" value="<?php echo $id ?>">
                  <button type="submit" class="Btn Btn-lg btn-grad">MUA NGAY</button>
                </form>
                <form action="updateCart.php" method="post" class="product-item__buy product_info__buy">
                  <input type="hidden" name="quantity" value="1">
                  <input type="hidden" name="products_id" value="<?php echo $id ?>">
                  <button type="submit" class="Btn Btn-lg btn-grad">CHO VÀO GIỎ</button>
                </form>
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
                <button type="button" class="Btn product-detail__btn" data-bs-toggle="modal" data-bs-target="#myModal">
                  Xem cấu hình chi tiết
                </button>
              </div>
              <!-- The Modal -->
              <div class="modal fade " id="myModal">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable ">
                  <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Thông số kỹ thuật PC HP AIO 22-df1043d i5-1135G7/8GB/256GB/Win11 (601L9PA)</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <ul class="list-group">
                        <li class="list-group-item list-group-item-secondary">
                          <h5>Bộ xử lí</h5>
                        </li>
                        <li class="list-group-item list-group-item-light"><b>Công nghệ CPU:</b> Intel Core i5 Tiger Lake - 11400H</li>
                        <li class="list-group-item list-group-item-light"><b>Số nhân</b>: 6</li>
                        <li class="list-group-item list-group-item-light"><b>Số luồng</b>: 12</li>
                        <li class="list-group-item list-group-item-light"><b>Tốc độ CPU</b>: 2.70 GHz</li>
                        <li class="list-group-item list-group-item-light"><b>Turbo Boost:</b> 4.5 GHz</li>
                        <li class="list-group-item list-group-item-light"><b>Bộ nhớ đệm:</b> 12 MB</li>
                        <li class="list-group-item list-group-item-secondary">
                          <h5>Bộ nhớ RAM, Ổ cứng</h5>
                        </li>
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
                        <li class="list-group-item list-group-item-secondary">
                          <h5>Màn hình</h5>
                        </li>
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
                        <li class="list-group-item list-group-item-secondary">
                          <h5>Đồ họa và Âm thanh</h5>
                        </li>
                        <li class="list-group-item list-group-item-light"><b>Card màn hình:</b> Card rời - NVIDIA GeForce GTX 1650 4 GB</li>
                        <li class="list-group-item list-group-item-light"><b>Công nghệ âm thanh:</b> Acer TrueHarmonyDTS X:Ultra Audio</li>
                        <li class="list-group-item list-group-item-secondary">
                          <h5>Cổng kết nối & tính năng mở rộng</h5>
                        </li>
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
                        <li class="list-group-item list-group-item-secondary">
                          <h5>Kích thước & khối lượng</h5>
                        </li>
                        <li class="list-group-item list-group-item-light"><b>Kích thước, khối lượng:</b> Dài 363.4 mm - Rộng 255 mm - Dày 23.9 mm - Nặng 2.2 kg</li>
                        <li class="list-group-item list-group-item-light"><b>Chất liệu:</b> Vỏ nhựa</li>
                        <li class="list-group-item list-group-item-secondary">
                          <h5>Thông tin khác</h5>
                        </li>
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
              <?php
              $sql_products_random = "SELECT products_id, products_name, price, discount, image FROM products ORDER BY RAND() LIMIT 6";
              $result_sql_products_random = $conn->query($sql_products_random);
              if (!$result_sql_brand_name) {
                die("Lỗi truy vấn: " . $conn->error);
              }
              while ($row_products_random = $result_sql_products_random->fetch_assoc()) { ?>
                <div class="product-item product-suggestions-item">
                  <span class="tra-gop mt-bottom25">Trả góp 0%</span>
                  <a href="productdetail.php?id=<?php echo $$row_products_random['products_id']; ?>">
                    <img src="<?php echo $row_products_random['image'] ?>" alt="no image" class="product-item__img pd-bottom25" style="margin:0 auto;">
                  </a>
                  <div class="rate fl">
                    <?php
                    $sql_rating_avg_random = "SELECT AVG(rating) AS rating_avg FROM reviews WHERE pr_id = $row_products_random[products_id]";
                    $result_rating_avg_random = $conn->query($sql_rating_avg_random);
                    if ($result_rating_avg_random && $result_rating_avg_random->num_rows > 0) {
                      $row_rating_avg_random = $result_rating_avg_random->fetch_assoc();
                      $rating_avg_random = round($row_rating_avg_random['rating_avg']);
                    } else {
                      echo "Không tìm thấy đánh giá nào.";
                    }
                    $rating_avg_random = round($rating_avg_random);
                    for ($i = 0; $i < $rating_avg_random; $i++) { ?>
                      <span><i class="fa-solid fa-star fa-starActive"></i></span>
                    <?php
                    }
                    for ($i = $rating_avg_random; $i < 5; $i++) { ?>
                      <span><i class="fa-solid fa-star"></i></span>
                    <?php
                    }
                    ?>
                  </div>
                  <a href="productdetail.php?id=<?php echo $row_products_random['products_id']; ?>">
                    <h3 class="product-item__name">
                      <?php echo $row_products_random['products_name']; ?>
                    </h3>
                  </a>
                  <div>
                    <span class="product-item__desc">RAM 8GB</span>
                    <span class="product-item__desc">SSD 256GB</span>
                  </div>
                  <div class="fl spbw product-item__price-wrap">
                    <span class="product-item__price"><?php echo $row_products_random['price'] ?> ₫</span>
                    <span class="product-item__price-old"><?php echo $row_products_random['discount'] ?> ₫</span>
                  </div>
                </div>

              <?php
              }
              ?>
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
                    <p>
                      <?php echo "$rating_avg"; ?>/5
                    </p>
                    <div class="rate d-flex justify-content-center">
                      <?php
                      $rating_avg = round($rating_avg);
                      for ($i = 0; $i < $rating_avg; $i++) { ?>
                        <span><i class="fa-solid fa-star fa-starActive"></i></span>
                      <?php
                      }
                      for ($i = $rating_avg; $i < 5; $i++) { ?>
                        <span><i class="fa-solid fa-star"></i></span>
                      <?php
                      }
                      ?>
                    </div>
                    <span>
                      <?php
                      $sql_count_cmt = "SELECT COUNT(*) AS total FROM reviews WHERE pr_id = $id";
                      $result_count_cmt = $conn->query($sql_count_cmt);
                      if ($result_count_cmt && $result_count_cmt->num_rows > 0) {
                        $row_count_cmt = $result_count_cmt->fetch_assoc();
                        $total_cmt = $row_count_cmt['total'];
                        echo $total_cmt; ?> đánh giá
                      <?php
                      } else {
                        echo "Không tìm thấy bình luận nào.";
                      }
                      ?>
                    </span>
                  </div>
                </div>
                <div class="col-lg-6 d-flex flex-column justify-content-between line-block">
                  <?php
                  $sql_rating_count = "SELECT rating, COUNT(*) AS count FROM reviews WHERE pr_id = $id GROUP BY rating ORDER BY rating DESC";
                  $result_rating_count = $conn->query($sql_rating_count);

                  // Tính tổng số lượng đánh giá
                  $total_count = 0;
                  while ($row = $result_rating_count->fetch_assoc()) {
                    $total_count += $row['count'];
                  }

                  // Tính phần trăm của từng rating và lưu vào mảng $percentages
                  $percentages = array();
                  $result_rating_count->data_seek(0);
                  while ($row = $result_rating_count->fetch_assoc()) {
                    $percentage = ($row['count'] / $total_count) * 100;
                    $percentages[$row['rating']] = $percentage;
                  }

                  // Hiển thị phần trăm của từng rating
                  for ($i = 5; $i >= 1; $i--) {
                    $percentage = isset($percentages[$i]) ? $percentages[$i] : 0;
                    echo '<div class="line-number d-flex align-items-center justify-content-center">';
                    echo '<span class="d-flex align-items-center">' . $i . ' <i class="fa-solid fa-star fa-starActive"></i></span>';
                    echo '<div class="line-block__bar"><div class="line-block__bar-percent" style="width: ' . $percentage . '%;"></div></div>';
                    echo '</div>';
                  }
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="product-reviews-vote">
                  <h3>Viết đánh giá riêng của bạn</h3>
                  <form action="" method="POST" id="myForm">
                    <input type="hidden" name="product_id" value="<?php echo $id ?>" required>
                    <div class="product-reviews-vote__star d-flex align-items-center mt-bottom10">
                      <span>Chất lượng*: </span>
                      <div class="rate justify-content-center">
                        <span class="star" onclick="setRating(1)"><i class="fa-solid fa-star "></i></span>
                        <span class="star" onclick="setRating(2)"><i class="fa-solid fa-star"></i></span>
                        <span class="star" onclick="setRating(3)"><i class="fa-solid fa-star"></i></span>
                        <span class="star" onclick="setRating(4)"><i class="fa-solid fa-star"></i></span>
                        <span class="star" onclick="setRating(5)"><i class="fa-solid fa-star"></i></span>
                      </div>
                    </div>
                </div>
                <input type="hidden" name="rating" id="rating" value="0">
                <div class="product-reviews-vote__textarea mt-bottom10">
                  <p>Đánh giá của bạn về sản phẩm:</p>
                  <textarea name="comment" id="" cols="30" rows="5" required></textarea>
                </div>
                <div class="">
                  <input type="submit" class="Btn product-reviews-vote__btn" value="Gửi" id="submit-btn"></input>
                </div>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  if (isset($_SESSION['email'])) {
                    // Lấy dữ liệu đánh giá từ biến $_POST
                    $name = $_SESSION['username'];
                    $comment = $_POST['comment'];
                    $comment = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $comment);
                    $rating = $_POST['rating'];
                    $id = $_POST['product_id'];
                    // Thực hiện truy vấn để thêm dữ liệu vào bảng
                    $sql = "INSERT INTO reviews (name, comment, rating, pr_id, time) VALUES ('$name', '$comment', '$rating','$id', NOW())";
                    if (mysqli_query($conn, $sql)) {
                      echo "<script>" .
                        "alert('Cảm ơn bạn đã gửi đánh giá');" .
                        "document.getElementById('myForm').reset();" .
                        "window.location.href = window.location.href;" .
                        "</script>";
                    } else {
                      echo "Lỗi: " . mysqli_error($conn);
                    }
                  } else {
                    echo "<script>" .
                      "alert('Bạn phải đăng nhập');" .
                      "document.getElementById('myForm').reset();" .
                      "window.location.href = window.location.href;" .
                      "</script>";
                  }
                }
                ?>
              </div>
            </div>
            <div class="col-lg-6 product_review_cmt_list">
              <div id="product-review-list">
                <?php
                $limit = 4; // Số lượng bình luận trên mỗi trang
                $page = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại
                $start = ($page - 1) * $limit; // Bắt đầu lấy dữ liệu từ bản ghi thứ $start

                // Truy vấn lấy tổng số bình luận của sản phẩm
                $sql_count = "SELECT COUNT(*) AS total FROM reviews WHERE pr_id = $id";
                $result_count = $conn->query($sql_count);
                $row_count = $result_count->fetch_assoc();
                $total_records = $row_count['total']; // Tổng số bình luận

                // Tính tổng số trang
                $total_pages = ceil($total_records / $limit);

                // Truy vấn lấy danh sách bình luận theo trang
                $sql_cmt = "SELECT name, time, rating, comment FROM reviews WHERE pr_id = $id_cmt ORDER BY time DESC LIMIT $start, $limit";
                $result_cmt = $conn->query($sql_cmt);

                if ($result_cmt && $result_cmt->num_rows > 0) {
                  while ($row = $result_cmt->fetch_assoc()) { ?>
                    <div class="product_review_cmt_item ">
                      <div class="product_review_cmt-title">
                        <div class="product_review_cmt-title-wrap d-flex align-items-center">
                          <img src="./img/category/24-248253_user-profile-default-image-png-clipart-png-download.png" alt="no image" class="avt-review">
                          <p class="name-review"><?php echo $row['name']; ?></p>
                          <div class="date-review"> - <?php echo $row['time']; ?></div>
                        </div>
                        <div class="rate d-flex">
                          <?php
                          for ($i = 0; $i < $row['rating']; $i++) { ?>
                            <span><i class="fa-solid fa-star fa-starActive"></i></span>
                          <?php
                          }
                          for ($i = $row['rating']; $i < 5; $i++) { ?>
                            <span><i class="fa-solid fa-star"></i></span>
                          <?php
                          }
                          ?>
                        </div>
                        <p class="review-for-item">
                          <?php echo $row['comment']; ?>
                        </p>
                      </div>
                    </div>
                <?php
                  }
                } else {
                  echo "Không tìm thấy đánh giá nào.";
                }
                ?>
              </div>
              <!-- Hiển thị phân trang -->
              <?php if ($total_pages > 1) { ?>
                <ul class="pagination justify-content-center mt-4 " id="pagination">
                  <?php if ($page > 1) { ?>
                    <li class="page-item">
                      <a class="page-link" href="productdetail.php?id=<?php echo $id_cmt ?>&page=<?php echo $page - 1; ?>"><i class="fa-solid fa-chevron-left"></i></a>
                    </li>
                  <?php } ?>
                  <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                    <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                      <a class="page-link" href="productdetail.php?id=<?php echo $id_cmt ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                  <?php } ?>
                  <?php if ($page < $total_pages) { ?>
                    <li class="page-item">
                      <a class="page-link" href="productdetail.php?id=<?php echo $id_cmt ?>&page=<?php echo $page + 1; ?>"><i class="fa-solid fa-chevron-right"></i></a>
                    </li>
                  <?php } ?>
                </ul>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
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