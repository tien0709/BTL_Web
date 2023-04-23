<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webbanlap";

    // Tạo kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    $id = $_GET['id'];

    // Lấy id của sản phẩm để chuyển hướng sau khi xóa bình luận
    $sql_id = "SELECT pr_id FROM reviews WHERE cmt_id = $id";
    $result_sql_id = $conn->query($sql_id);

    if (!$result_sql_id) {
        die("Lỗi truy vấn: " . $conn->error);
    }

    $row = $result_sql_id->fetch_assoc();
    $id_cmt = $row['pr_id'];

    $sql = "DELETE FROM reviews WHERE cmt_id = $id";
    $query = mysqli_query($conn, $sql);

    header("Location: list_cmt.php?id=$id_cmt");
?>
