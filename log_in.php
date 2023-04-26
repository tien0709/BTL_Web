<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Đăng nhập</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="icon" href="./img/ltnn.png">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <style>
    .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }

    #register:hover {
      cursor: pointer;
    }

    .h-custom {
      height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
      .h-custom {
        height: 100%;
      }
    }
  </style>
</head>

<body>
  <?php
  session_start();
  if (isset($_SESSION['email'])) {
    header("location: index.php");
    exit;
  }
  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $email = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $email);
    $password = $_POST['password'];
    $password = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $password);
    $db = mysqli_connect('localhost', 'root', '', 'webbanlap');
    $sql = " SELECT * FROM account ";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($result)) {


      // Kiểm tra thông tin đăng nhập
      if ($row['email'] == $email && $row['password'] == $password) {
        // Lưu thông tin người dùng vào session
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $row['username'];
        $_SESSION['image'] = $row['image'];
        $_SESSION['password'] = $password;

        // Chuyển hướng người dùng đến trang info.php
        header("Location: index.php");
        exit; //dung chuong trinh
      }
    }

    // Thông báo lỗi nếu thông tin đăng nhập không hợp lệ
    $error = "Email hoặc mật khẩu không đúng";
  }
  ?>
  <script>
    // Kiểm tra xem cookie đã được lưu trữ hay chưa
    if (document.cookie.includes("email") && document.cookie.includes("password")) {
      // Nếu có, đổ dữ liệu vào form đăng nhập và tích vào checkbox
      let email = getCookie("email");
      let password = getCookie("password");
      console.log(document.getElementById("IDremember"));
      document.getElementById("IDremember").checked = true;
      document.getElementById("IDemail").value = email;
      document.getElementById("IDpassword").value = password;
    }

    function getCookie(name) {
      var value = "; " + document.cookie;
      var parts = value.split("; " + name + "=");
      if (parts.length == 2) return parts.pop().split(";").shift();
    }
  </script>
  <section class="vh-100">
    <div class="container h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100 py-4">
        <p class="h1">Đăng Nhập</p>
      </div>
      <div class="row d-flex justify-content-center align-items-center h-100 py-4">
        <div class="col-lg-8 col-md-6">
          <img src="./img/draw2.webp" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-lg-4 col-md-6">
          <form method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="email">Địa chỉ Email</label>
              <input type="email" id="IDemail" class="form-control form-control-lg" placeholder="" name="email" required>

            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="form-label" for="password">Mật khẩu</label>
              <input type="password" id="IDpassword" class="form-control form-control-lg" placeholder="" name="password" required>

            </div>
            <?php
            // hiển thị thông báo lỗi nếu có
            if (isset($error)) {
              echo "<p style='color: red;'>$error</p>";
            }
            ?>

            <div class="d-flex justify-content-between align-items-center">
              <div><a href="#" class="text-body" id="forget">Quên mật khẩu?</a></div>
            </div>
            <div id="forget-msg" style="color:red;"></div>
            <script>
              document.getElementById("forget").addEventListener("click", function(event) {
                event.preventDefault();
                document.getElementById("forget-msg").innerHTML = "Mật khẩu đăng nhập đã được gửi đến địa chỉ Email của bạn";
              });
            </script>
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" name="submit">Đăng nhập</button>
              <p class="small fw-bold mt-2 pt-1 mb-0" style="font-size: 14px;">Bạn chưa có tài khoản? <a class="text-danger pe-auto" href="register.php" id="register">
                  Đăng ký ngay
                </a></p>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
</body>

</html>