<!DOCTYPE html5>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    table {
      margin: 1em;
    }
    table td{
      margin: 2em;
      padding: 2em;
      border: solid black 0.5em;
    }
    .btn:hover {
      cursor: pointer;
    }
  </style>
</head>
<body>
<div class="container w-50 bg-secondary">
<form action="" method="post">
  <h2 class="mb-4 pt-4">Đăng kí</h2>

  <div class="input-group mb-3" >
      <div class="input-group-prepend">
          <span class="input-group-text">Tên tài khoản</span>
      </div>
      <input type="text" class="form-control"  placeholder="7-30 kí tự thuộc a-z hoặc A-Z" name="username" minlength="7" maxlength="30" required>
  </div>
  <div class="input-group mb-3">
    <div class="input-group-append">
      <span class="input-group-text">Email</span>
    </div>
      <input type="email" class="form-control" placeholder="???@???.com" name="email" required>
  </div>

  <div class="input-group mb-3 ">
    <div class="input-group-append">
      <span class="input-group-text">Mật khẩu</span>
    </div>
      <input type="password" class="form-control"  name="password" placeholder="7-30 kí tự" required>
  </div>

  <div class="input-group mb-3 ">
    <div class="input-group-append">
      <span class="input-group-text">Nhập lại Mật Khẩu</span>
    </div>
      <input type="password" class="form-control" placeholder="7-30 kí tự" name="repassword" required>
  </div>
  <div class="input-group mb-3 ">
      <input type="submit" class=" btn form-control" value="Đăng kí" name="register">
  </div>
  <?php
    
    // xử lí đầu vào
	function test_input($data) {
            $data = trim($data);// loai bo khoang trang dau va cuoi chuoi
            $data = stripslashes($data);// loai bo cac dau gach cheo co the duoc them vao de danh dau ki tu dac biet
            $data = htmlspecialchars($data);// chuyen doi cac ki tu dac biet thanh cac the html tuong ung
            return $data;
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = test_input($_POST["username"]);
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);
        $repassword = test_input($_POST["repassword"]);

        // Kiểm tra lỗi đầu vào
	    $errors = array();

	    if (!preg_match("/^[a-zA-Z\s]{7,30}$/", $username)) {
		    $errors[] = "Tên tài khoản phải từ 7-30 kí tự thuộc a-z hoặc A-Z.";
	    }

	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		    $errors[] = "Email không hợp lệ.";
	    }

	    if (strlen($password)<2||strlen($password)>30) {
		    $errors[] = "Mật khẩu phải chứa từ 7 đến 30 kí tự";
	    }

	    // Hiển thị thông báo lỗi nếu có
	    if (!empty($errors)) {
		    echo "<ul>";
		    foreach ($errors as $error) {
			    echo "<li>$error</li>";
		    }
		    echo "</ul>";
	    } 
        $db = mysqli_connect('localhost','pttien','73258436','shop');
        $sql = " SELECT * FROM account ";
        $result = mysqli_query($db,$sql);
        $check_fault=0;
        while($row = mysqli_fetch_assoc($result)){
   // Kiểm tra thông tin đăng nhập
  // Trong ví dụ này, ta sẽ sử dụng username làm mật khẩu
           if($row['email']== $_POST['email']){
              echo "<p style='color: red;'> Email đã tồn tại</p>";
              $check_fault=1;
           }
           if($row['username']== $_POST['username']){
            echo "<p style='color: red;'> Username đã tồn tại</p>";
            $check_fault=1;
           }
        }
        if($_POST['password']!=$_POST['repassword']){
              echo "<p style='color: red;'> Nhập lại mật khẩu không trùng khớp</p>";
              $check_fault=1;
        }
        if(!$check_fault){
        $new_sql = "INSERT INTO account(username, password, email) VALUES ('" . $_POST['username'] . "', '" . $_POST['password'] . "', '" . $_POST['email'] . "')"; 
        mysqli_query($db,$new_sql);
        echo "<p style='color: red;'> Đăng kí thành công</p>";
        }
    }
?>
  <a  class="btn btn-primary btn-back" href="log_in.php">Trở về trang Đăng Nhập</a>
   
  </form>
  <div class="input-group mb-3 ">
  
  <div class="">
          <img src="draw2.webp"
            class="img-fluid" alt="Sample image">
  </div> 
</div>

</body>
</html>