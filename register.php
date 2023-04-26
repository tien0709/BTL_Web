<!DOCTYPE html>
<html lang="vi">

<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký</title>
  <link rel="icon" href="./img/ltnn.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <div class="d-flex justify-content-center align-items-center py-4">
    <p class="h1">Đăng ký</p>
  </div>
  <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-6">
          <img src="./img/draw2.webp" alt="No image" style="width:100%">
        </div>
        <div class="col-lg-4 col-md-6">
          <form action="" method="post">
            <div class="form-outline">
              <label class="form-label" for="name">Tên tài khoản:</label>
              <input type="text" class="form-control form-control-lg" placeholder="7-30 kí tự thuộc a-z hoặc A-Z" name="username" minlength="7" maxlength="30" required>
            </div>
            <div class="form-outline">
              <label class="form-label" for="email">Email:</label>
              <input type="email" class="form-control form-control-lg" placeholder="???@???.com" name="email" required>
            </div>

            <div class="form-outline">
              <label class="form-label" for="password">Mật khẩu:</label>
              <input type="password" class="form-control form-control-lg" name="password" placeholder="7-30 kí tự" required>
            </div>

            <div class="form-outline">
              <label class="form-label" for="password">Nhập lại mật khẩu:</label>
              <input type="password" class="form-control form-control-lg" placeholder="7-30 kí tự" name="repassword" required>
            </div>
            <br>
            <div class="form-outline" style="text-align: center;">
              <input type="submit" class=" btn btn-primary form-control" style="width: 50%;" value="Đăng ký" name="register">
            </div>
            <?php

            // xử lí đầu vào
            function test_input($data)
            {
              $data = trim($data); // loai bo khoang trang dau va cuoi chuoi
              $data = stripslashes($data); // loai bo cac dau gach cheo co the duoc them vao de danh dau ki tu dac biet
              $data = htmlspecialchars($data); // chuyen doi cac ki tu dac biet thanh cac the html tuong ung
              return $data;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $username = test_input($_POST["username"]);
              $email = test_input($_POST["email"]);
              $password = test_input($_POST["password"]);
              $repassword = test_input($_POST["repassword"]);

              // Kiểm tra lỗi đầu vào
              $errors = array();

              if (!preg_match("/^.{7,30}$/", $username)){
                $errors[] = "Tên tài khoản phải từ 7-30 kí tự";
              }

              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email không hợp lệ.";
              }

              // Hiển thị thông báo lỗi nếu có
              if (!empty($errors)) {
                echo "<ul>";
                foreach ($errors as $error) {
                  echo "<li>$error</li>";
                }
                echo "</ul>";
              }
              $db = mysqli_connect('localhost', 'root', '', 'webbanlap');
              $sql = " SELECT * FROM account ";
              $result = mysqli_query($db, $sql);
              $check_fault = 0;
              while ($row = mysqli_fetch_assoc($result)) {
                // Kiểm tra thông tin đăng nhập
                // Trong ví dụ này, ta sẽ sử dụng username làm mật khẩu
                if ($row['email'] == $_POST['email']) {
                  echo "<p style='color: red;'> Email đã tồn tại</p>";
                  $check_fault = 1;
                }
                if ($row['username'] == $_POST['username']) {
                  echo "<p style='color: red;'> Username đã tồn tại</p>";
                  $check_fault = 1;
                }
              }
              if ($_POST['password'] != $_POST['repassword']) {
                echo "<p style='color: red;'> Nhập lại mật khẩu không trùng khớp</p>";
                $check_fault = 1;
              }
              if (!$check_fault&&!count($errors)) {
                $new_sql = "INSERT INTO account(username, password, email, image) VALUES ('" . $_POST['username'] . "', '" . $_POST['password'] . "', '" . $_POST['email'] . "','avatar.jpg')";
                mysqli_query($db, $new_sql);
                echo "<p style='color: green; font-size: 16px'> Đăng ký thành công</p>";
              }
            }
            ?>
            <div class="text-center text-lg-start mt-4 pt-2">
            <p class="small fw-bold mt-2 pt-1 mb-0" style="font-size: 14px;"><a class="text-danger pe-auto" href="log_in.php">
                Trở về trang đăng nhập
              </a>
            </p>
            </div>
          </form>
        </div>
      </div>
  </div>
</body>

</html>