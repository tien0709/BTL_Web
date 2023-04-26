<?php
    // Lấy danh sách thương hiệu
    $brand_query = mysqli_query($mysqli, "SELECT * FROM brands");

    if(isset($_POST['add_product'])) {
        $product_name = $_POST['products_name'];
        $product_image = $_POST['image'];
        $product_image_desc_1 = $_POST['image_desc_1'];
        $product_image_desc_2 = $_POST['image_desc_2'];
        $product_image_desc_3 = $_POST['image_desc_3'];
        $product_price = $_POST['price'];
        $product_discount = $_POST['discount'];
        $product_description = $_POST['description'];
        $brand_id = $_POST['brand_id'];
        $rating_tb = $_POST['rating_tb'];
        // Thực hiện thêm sản phẩm vào cơ sở dữ liệu
        $add_query = mysqli_query($mysqli, "INSERT INTO products (products_name, image, price, description, brand_id, discount,image_desc_1,image_desc_2,image_desc_3,rating_tb) VALUES ('$product_name', '$product_image', '$product_price', '$product_description', '$brand_id' ,' $product_discount','$product_image_desc_1','$product_image_desc_2','$product_image_desc_3','$rating_tb')");

        if($add_query) {
            echo "Thêm sản phẩm thành công!";
            header('location: sanpham.php?page_layout=list');
        }
        else {
            echo "Thêm sản phẩm thất bại!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h1 style="text-align:center">Thêm sản phẩm mới</h1>
    <form method="post">
        <div class="form-group">
            <label for="product_name">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="products_name" required>
        </div>
        <div class="form-group">
            <label for="product_image">Ảnh sản phẩm:</label>
            <input type="text" class="form-control" name="image" required>
        </div>
        <div class="form-group">
            <label for="product_image_desc_1">Ảnh mô tả 1:</label>
            <input type="text" class="form-control" name="image_desc_1" required>
        </div>
        <div class="form-group">
            <label for="product_image_desc_2">Ảnh mô tả 2:</label>
            <input type="text" class="form-control" name="image_desc_2" required>
        </div>
        <div class="form-group">
            <label for="product_image_desc_3">Ảnh mô tả 3:</label>
            <input type="text" class="form-control" name="image_desc_3" required>
        </div>
        <div class="form-group">
            <label for="product_price">Giá sản phẩm:</label>
            <input type="text" class="form-control" name="price" required>
        </div>
        <div class="form-group">
            <label for="product_discount">Giá khuyến mãi:</label>
            <input type="text" class="form-control" name="discount" required>
        </div>
        <div class="form-group">
            <label for="product_description">Mô tả sản phẩm:</label>
            <textarea class="form-control" name="description" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="brand_id">Thương hiệu:</label>
            <select class="form-control" name="brand_id" required>
                <option value="">-- Chọn thương hiệu --</option>
                <?php while ($brand_row = mysqli_fetch_assoc($brand_query)) { ?>
                    <option value="<?php echo $brand_row['brand_id']; ?>"><?php echo $brand_row['brand_name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="rating_tb">Sao trung bình:</label>
            <input type="text" class="form-control" name="rating_tb" value="0">
        </div>
        <button type="submit" name="add_product" class="btn btn-primary">Thêm sản phẩm</button>
    </form>
</div>
</body>
</html>