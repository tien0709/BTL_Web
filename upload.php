<?php 
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
if(isset($_SESSION['email'])){
  $target_dir = "uploads/";
  $target_file = $target_dir . $_FILES["fileToUpload"]["name"];
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
        $db = mysqli_connect('localhost','root','','webbanlap');
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