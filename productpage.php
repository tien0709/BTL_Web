<?php
$conn = new mysqli("localhost", "root", "", "webbanlap");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$id = $_GET['id']; // lấy id từ url
$sql = "SELECT brand_name FROM brands WHERE brand_id = $id"; // lựa chọn sản phẩm có brand_id = id
$result_sql = $conn->query($sql);
$row_name = $result_sql->fetch_assoc();



$sql_prd_id = "SELECT brand_id FROM brands";
$result_sql_prd_id = $conn->query($sql_prd_id);
$row_prd_id = $result_sql->fetch_assoc();
?>
<?php
$conn = new mysqli("localhost", "root", "", "webbanlap");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row_name['brand_name']; ?></title>
    <meta name="description" content="Trang web bán laptop <?php echo $row_name['brand_name']; ?> chất lượng với giá cả hợp lý.">
    <meta name="keywords" content="laptop <?php echo $row_name['brand_name']; ?>, mua laptop <?php echo $row_name['brand_name']; ?>, giá laptop <?php echo $row_name['brand_name']; ?>">
    <link rel="stylesheet" href="./icon/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="icon" href="./img/ltnn.png">
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

</head>

<body>

    <div class="app">
        <?php
        include("pages/header.php")
        ?>
          <script>
             var thisId = "<?php echo $id; ?>";
             $(document).ready(function() {

// Khi select thay đổi giá trị
$('#sx').on('change', function() {
    // Gửi yêu cầu AJAX để lấy dữ liệu mới từ máy chủ
    $.ajax({
        url: 'sorting.php', // Đường dẫn đến file xử lý yêu cầu AJAX
        type: 'POST',
        data: {type: $(this).val(),
               id: thisId
        }, // Dữ liệu gửi đi (tuổi được chọn)
        success: function(data) {
            // Cập nhật nội dung của bảng với dữ liệu mới
            // Chuyển chuỗi JSON sang đối tượng JavaScript
var jsonData = JSON.parse(data);

// Tạo bảng và thêm tiêu đề
var div = $(' <div class="row sp-wrap" id="sp">');
if(!jsonData.length) div.append($('<p>').text('Không có sản phẩm nào'));
else{
// Lặp qua các phần tử trong đối tượng và thêm các hàng vào bảng
for (var i = 0; i < jsonData.length; i++) {
    var item = $(' <div class="product-item">');
    item.append($('<span class="tra-gop mt-bottom25">').text('Trả góp 0%'));
    var temp = $('<a class="d-flex justify-content-center" href="productdetail.php?id=' + jsonData[i].products_id + '">');
    temp.append($('<img src="'+ jsonData[i].image +'" width="255" height="195" alt="no image" class="product-item__img pd-bottom25">'))
    item.append(temp);
   
    var temp = $('<div class="rate fl">');
    for (var j = 0; j <  parseInt(jsonData[i].rating_tb); j++) { 
        temp.append($('<span>').append('<i class="fa-solid fa-star fa-starActive">'));
    }
    for (var j = parseInt(jsonData[i].rating_tb); j < 5; j++) { 
        temp.append($('<span>').append('<i class="fa-solid fa-star">'));
    }
    item.append(temp);

    //table.append(row);
    var temp = $('<a href="productdetail.php?id=' + jsonData[i].products_id + '"></a>');
    temp.append($('<h3 class="product-item__name">').text(jsonData[i].products_name));
    item.append(temp);

    var temp =$('<div>').append($('<span class="product-item__desc">').text('RAM 8GB'));
    temp.append($('<span class="product-item__desc">').text('SSD 256GB'));
    item.append(temp);

    var temp=$('<div class="fl spbw product-item__price-wrap">');
    temp.append($('<span class="product-item__price">').text(jsonData[i].price +  '₫'));
    temp.append($('<span class="product-item__price-old">').text(jsonData[i].discount +  '₫'));
    item.append(temp);

    var temp = $('<div class="col-lg-3 col-md-6 col-sm-6">');
    temp.append(item);
    div.append(temp);
}
}
// Gán bảng cho phần tử HTML
$('#ab').html(div);
        }
    });
});
});
        </script>

        <div class="main">
            <div class="breadcrumb-wrap">
                <div class="container">
                    <div class="row">
                        <ul class="breadcrumb " style="align-items: center;">
                            <?php
                            $breadcrumbs = array(
                                'Trang chủ' => 'index.php',
                                $row_name['brand_name'] => '#'
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
            <div class="container" style="padding: 0 10px;">
                <div class="products">
                    <div class="products-wrap">
                        <div class="sub-category d-flex spbw align-items-center">
                            <h2 class="product-title productpage-title">
                                <?php echo $row_name['brand_name']; ?>
                            </h2>
                            <div class="product-sorting">
                                <select name="" id="sx" >
                                    <option value="">Sắp xếp theo</option>
                                    <option value="des">Giá cao đến thấp</option>
                                    <option value="asc">Giá thấp đến cao</option>
                                </select>
                            </div>
                        </div>
                        <?php
                        $sql_product = "SELECT * FROM products WHERE brand_id = '$id'";
                        $result_product = $conn->query($sql_product);
                        if ($result_product === false) {
                            echo "Error executing query: " . $conn->error;
                        } else if ($result_product->num_rows > 0) {
                        ?>
                            <div class=" mt-top25" id="ab">
                               <div class="row sp-wrap" id="sp">
                               <?php
                                while ($row_product = $result_product->fetch_assoc()) {
                                ?>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="product-item">
                                            <span class="tra-gop mt-bottom25">Trả góp 0%</span>
                                            <a class="d-flex justify-content-center" href="productdetail.php?id=<?php echo $row_product['products_id']; ?>">
                                                <img src="<?php echo $row_product['image']; ?>" width="255" height="195" alt="no image" class="product-item__img pd-bottom25">
                                            </a>
                                            <div class="rate fl">
                                                <?php
                                                $sql_rating_avg = "SELECT AVG(rating) AS rating_avg FROM reviews WHERE pr_id = $row_product[products_id]";
                                                $result_rating_avg = $conn->query($sql_rating_avg);
                                                if ($result_rating_avg && $result_rating_avg->num_rows > 0) {
                                                    $row_rating_avg = $result_rating_avg->fetch_assoc();
                                                    $rating_avg = round($row_rating_avg['rating_avg'], 1);
                                                } else {
                                                    echo "Không tìm thấy đánh giá nào.";
                                                }
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
                                            <a href="productdetail.php?id=<?php echo $row_product['products_id']; ?>">
                                                <h3 class="product-item__name"><?php echo $row_product['products_name']; ?></h3>
                                            </a>
                                            <div>
                                                <span class="product-item__desc">RAM 8GB</span>
                                                <span class="product-item__desc">SSD 256GB</span>
                                            </div>
                                            <div class="fl spbw product-item__price-wrap">
                                                <span class="product-item__price"><?php echo $row_product['price']; ?> ₫</span>
                                                <span class="product-item__price-old"><?php echo $row_product['discount']; ?> ₫</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                               </div>
                            </div>
                        <?php
                        } else {
                            echo "Không có sản phẩm thuộc thương hiệu $id.";
                        }
                        ?>
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