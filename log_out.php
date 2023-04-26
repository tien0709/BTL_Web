<script>
window.onload = function() {
    // Xóa bộ nhớ cache của trình duyệt
    window.location.reload(true);
}
</script>
<?php
$email=$_SESSION["email"];
setcookie('".$email."', '', time() - 3600, '/');
session_start();

// Xóa tất cả các biến phiên làm việc
session_unset();

// Hủy phiên làm việc
session_destroy();

// Chuyển hướng người dùng đến trang đăng nhập hoặc trang chính
header("Location: index.php");
exit;
?>