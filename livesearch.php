<?php
$conn = mysqli_connect("localhost", "root", "", "webbanlap");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Lấy từ khóa tìm kiếm từ phương thức GET
$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';
$searchTerm = str_replace(' ', '', $searchTerm);
$sql = "SELECT * FROM products WHERE LOWER(REPLACE(products_name, ' ', '')) LIKE LOWER('%$searchTerm%')";
$result =  mysqli_query($conn, $sql);
echo "<div class='search-suggestions-wrap'>";
echo "<h3>". "Sản phẩm gợi ý" . "</h3>";
// Hiển thị kết quả
echo "<div class = goiy>";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <li class="d-flex">
            <a href="productdetail.php?id=<?= $row["products_id"] ?>">
                <img class="search-suggestions-img" src="<?= $row["image"] ?>" alt="<?= $row["products_name"] ?>">
            </a>
            <div class="search-suggestions-info">
                <a href="productdetail.php?id=<?= $row["products_id"] ?>">
                    <h4 class="search-suggestions-name"><?= $row["products_name"] ?></h4>
                </a>
                <p class="search-suggestions-price"><?= $row["price"] ?> ₫</p>
            </div>
        </li>
<?php
    }
} else {
    echo "Không tìm thấy sản phẩm nào";
}
echo "</div>";

// Đóng kết nối
mysqli_close($conn);
?>