<?php
$conn = mysqli_connect("localhost", "root", "", "shop");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Lấy từ khóa tìm kiếm từ phương thức GET
$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';
$searchTerm = str_replace(' ', '', $searchTerm);
$sql = "SELECT * FROM products WHERE LOWER(REPLACE(products_name, ' ', '')) LIKE LOWER('%$searchTerm%')";
$result =  mysqli_query($conn,$sql);
echo "<li>";
echo "<p class='bg-light h3'>" ."Sản phẩm gợi ý" . "</p>";
echo "</li>";
// Hiển thị kết quả
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo "<img  class='w-75' src='" . $row["image"] . "' alt='" . $row["products_name"] . "'>";
        echo "<h3>" . $row["products_name"] . "</h3>";
        echo "<p>" . $row["description"] . "</p>";
        echo "<p>Price: " . $row["price"] . "</p>";
        echo "</li>";
    }
} else {
    echo "Không tìm thấy sản phẩm nào";
}

// Đóng kết nối
mysqli_close($conn);
?>




