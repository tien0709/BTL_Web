<?php
    $id = $_GET['id'];
    // Lấy danh sách thương hiệu
    $brand_query = mysqli_query($mysqli, "SELECT * FROM brands");
    $query_up = mysqli_query($mysqli, "SELECT * FROM products where products_id =$id");
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['update_product'])) {
        $product_name = $_POST['products_name'];
        $product_image = $_POST['image'];
        $product_image_desc_1 = $_POST['product_image_desc_1'];
        $product_image_desc_2 = $_POST['product_image_desc_2'];
        $product_image_desc_3 = $_POST['product_image_desc_3'];
        $product_price = $_POST['price'];
        $product_discount = $_POST['discount'];
        $product_description = $_POST['description'];
        $brand_id = $_POST['brand_id'];

        // Thực hiện cập nhật sản phẩm vào cơ sở dữ liệu
        $update_query = mysqli_query($mysqli, "UPDATE products SET products_name='$product_name', image='$product_image', image_desc_1= '$product_image_desc_1', image_desc_2= '$product_image_desc_2', image_desc_3= '$product_image_desc_3', price='$product_price', discount =' $product_discount' , description='$product_description', brand_id='$brand_id' WHERE products_id=$id");

        if($update_query) {
            echo "Cập nhật sản phẩm thành công!";
            header('location: sanpham.php?page_layout=list');
        }
        else {
            echo "Cập nhật sản phẩm thất bại!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 style="text-align:center">Chỉnh sửa sản phẩm</h1>
    <form method="post">
        <div class="form-group">
            <label for="product_name">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="products_name" value="<?php echo $row_up['products_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="product_image">Ảnh sản phẩm:</label>
            <input type="text" class="form-control" name="image" value="<?php echo $row_up['image']; ?>" required>
        </div>
        <div class="form-group">
            <label for="product_image_desc_1">Ảnh mô tả 1:</label>
            <input type="text" class="form-control" name="product_image_desc_1" value="<?php echo $row_up['image_desc_1']; ?>" required>
        </div>
        <div class="form-group">
            <label for="product_image_desc_2">Ảnh mô tả 2:</label>
            <input type="text" class="form-control" name="product_image_desc_2" value="<?php echo $row_up['image_desc_2']; ?>" required>
        </div>
        <div class="form-group">
            <label for="product_image_desc_3">Ảnh mô tả 3:</label>
            <input type="text" class="form-control" name="product_image_desc_3" value="<?php echo $row_up['image_desc_3']; ?>" required>
        </div>
        <div class="form-group">
            <label for="product_price">Giá sản phẩm:</label>
            <input type="text" class="form-control" name="price" value="<?php echo $row_up['price']; ?>" required>
        </div>
        <div class="form-group">
            <label for="product_discount">Giá ban đầu:</label>
            <input type="text" class="form-control" name="discount" value="<?php echo $row_up['discount']; ?>" required>
        </div>
        <div class="form-group">
            <label for="product_description">Mô tả sản phẩm:</label>
            <textarea class="form-control" name="description" rows="5" required><?php echo $row_up['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="brand_id">Thương hiệu:</label>
            <select class="form-control" name="brand_id" required>
                <option value="">-- Chọn thương hiệu --</option>
                <?php while ($brand_row = mysqli_fetch_assoc($brand_query)) { ?>
                    <option value="<?php echo $brand_row['brand_id']; ?>" <?php if($brand_row['brand_id'] == $row_up['brand_id']) { echo "selected"; } ?>><?php echo $brand_row['brand_name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <br>
        <button type="submit" name="update_product" class="btn btn-primary">Cập nhật sản phẩm</button>
    </form>
</div>
</body>
</html>

