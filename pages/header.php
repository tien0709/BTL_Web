<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-control" action="" method="post" enctype="multipart/form-data">
                    <h3>Chọn ảnh để tải lên:</h3>
                    <input type="file" name="fileToUpload" id="fileToUpload" value="Chọn hình ảnh tải lên">
                    <input class="btn btn-light btn-outline-dark" type="submit" value="Tải lên hình ảnh" name="submitUpLoad" id="buttonToUpload">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
session_start();
$cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
$cart = json_decode($cart);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submitUpLoad'])) {
        if (isset($_SESSION['email'])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . uniqid() . '.' . pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "<script>" . "alert(' ảnh đã tồn tại');" . "</script>";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "<script>" . "alert(' kích thước ảnh phải nhỏ hơn 500MB.');" . "</script>";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "<script>" . "alert(' ảnh phải có định dạng jpg, png, gif hoặc jpeg');" . "</script>";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {

                echo "<script>" . "alert(' thay đổi ảnh không thành công');" . "</script>";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                    echo "<script>" . "alert('file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã được upload.');" . "</script>";
                    // Lưu tên file vào cột avatar trong bảng account
                    $new_name = basename($target_file);
                    $sql = "UPDATE account SET image='$new_name' WHERE email = '{$_SESSION['email']}' "; // Thay đổi id tương ứng với tài khoản cần lưu avatar
                    $db = mysqli_connect('localhost', 'root', '', 'webbanlap');
                    mysqli_query($db, $sql);
                } else {
                    echo "<script>" . "alert('có Lỗi khi upload file của bạn.');" . "</script>";
                }
            }
        } else {

            echo "<script>" . "alert('Bạn phải đăng nhập để có thể thay đổi ảnh đại diện!');" . "</script>";
        }
    }
}
?>
<!-- modal change password -->
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-control" action="" method="post">
                    <h3>Thay đổi mật khẩu:</h3>
                    <label class="form-label" for="old_password">Mật khẩu hiện tại: </label>
                    <input type="password" class="border border-dark" name="old_password" id="old_password" value="">
                    <label class="form-label" for="new_password">Mật khẩu mới: </label>
                    <input type="password" class="border border-dark" name="new_password" id="new_password" value="">
                    <label class="form-label" for="new_password">Nhập lại mật khẩu mới: </label>
                    <input type="password" class="border border-dark" name="re_new_password" id="re_new_password" value="">
                    <input class="btn btn-light btn-outline-dark" type="submit" value="Thay đổi" name="submitChange" id="buttonToChange">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submitChange'])) {
        if (isset($_SESSION['email'])) {
            if ($_POST['old_password'] != $_SESSION['password']) echo "<script>" . "alert('Mật khẩu không chính xác!');" . "</script>";
            else if ($_POST['new_password'] != $_POST['re_new_password']) echo "<script>" . "alert('Mật khẩu mới nhập lại khác mật khẩu mới!');" . "</script>";
            else {

                $db = mysqli_connect('localhost', 'root', '', 'webbanlap');
                $password = $_POST['new_password'];
                $password = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $password);
                $email = $_SESSION['email'];

                if (mysqli_query($db, "UPDATE account SET password = '$password' WHERE email = '$email'")) {
                    echo "<script> 
                alert('Thay đổi mật khẩu thành công!');
                window.location.href = 'log_out.php';
                </script>"; //lam nhu nay de khac phuc loi "Cannot modify header information - headers already sent" xuất hiện khi trước khi gọi hàm header() để điều hướng trang, trang đã có output gửi về trình duyệt
                } else echo "<script>" . "alert('Không thể thay đổi mật khẩu !');" . "</script>";
            }
        } else {

            echo "<script>" . "alert('Bạn phải đăng nhập để có thể thay đổi mật khẩu!');" . "</script>";
        }
    }
}
?>
<header class="header">
    <div class="container">
        <div class="header-wrap fl">
            <div class="header-bar">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="over_lay"></div>
            <div class="navbar__mb">
                <ul class="navbar__mb-list">
                    <li> <img src="./uploads/avatar.jpg" class="avatar-bar" alt="no image">
                        <?php
                        if (isset($_SESSION['email'])) {
                            $db = mysqli_connect('localhost', 'root', '', 'webbanlap');
                            $sql = " SELECT * FROM account ";
                            $result = mysqli_query($db, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Kiểm tra thông tin đăng nhập
                                if ($row['email'] == $_SESSION['email']) {
                                    echo '<script>document.getElementsByClassName("avatar-bar")[0].setAttribute("src", "./uploads/' . $row['image'] . '?' . time() . '");</script>';
                                    echo "<p class='h3 pl-1' style='display:inline-block;'> " . $_SESSION['username'] . "</p>";
                                }
                            }
                        }
                        ?>
                    </li>
                    <?php
                    if (!isset($_SESSION['email'])) { ?>
                        <li>
                            <a href="log_in.php" class="navbar__mb-link">
                                <i class="fa-solid fa-right-to-bracket min_width25px"></i>
                                Đăng nhập
                            </a>
                        </li>
                        <li>
                            <a href="../cart.php" class="navbar__mb-link">
                                <i class="fa-solid fa-right-to-bracket min_width25px"></i>
                                Giỏ hàng
                            </a>
                        </li>
                        <li>
                            <a href="search_order.php" class="navbar__mb-link">
                                <i class="fa-solid fa-right-to-bracket min_width25px"></i>
                                Tra cứu đơn hàng
                            </a>
                        </li>

                    <?php
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['email'])) { ?>
                        <?php
                        if ($_SESSION['username'] == 'Admin') { ?>
                            <li>
                                <a href="./admin/quanli.php" class="navbar__mb-link">
                                    <i class="fa-solid fa-lock min_width25px"></i>
                                    Quản lí
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                        <li>
                            <a href="#" class="navbar__mb-link" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa-solid fa-cloud-upload min_width25px"></i>
                                Thay ảnh đại diện
                            </a>
                        </li>
                        <li>
                            <a href="" class="navbar__mb-link" data-toggle="modal" data-target="#passwordModal">
                                <i class="fa-solid  fa-key min_width25px"></i>
                                Đổi mật khẩu
                            </a>
                        </li>
                        <li>
                            <a href="../cart.php" class="navbar__mb-link">
                                <i class="fa-solid fa-cart-shopping min_width25px"></i>
                                Giỏ hàng
                            </a>
                        </li>
                        <li>
                            <a href="search_order.php" class="navbar__mb-link">
                                <i class="fa-solid fa-right-to-bracket min_width25px"></i>
                                Tra cứu đơn hàng
                            </a>
                        </li>

                        <li>
                            <a href="log_out.php" class="navbar__mb-link">
                                <i class="fa-solid fa-right-to-bracket min_width25px"></i>
                                Đăng xuất
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <ul class="navbar__mb-list ">
                    <li>
                        <a href="index.php" class="navbar__mb-link">
                            <i class="fa-solid fa-house min_width25px"></i>
                            Trang chủ
                        </a>
                    </li>
                    <li> <a href="intro.php" class="navbar__mb-link">
                            <i class="fa-solid fa-circle-info min_width25px"></i>
                            Giới thiệu
                        </a>
                    </li>
                    <li>
                        <a href="blog_list.php" class="navbar__mb-link">
                            <i class="fa-solid fa-newspaper min_width25px"></i>
                            Tin tức
                        </a>
                    </li>
                </ul>
            </div>
            <div class="header_left fl">
                <div class="header__logo">
                    <a href="index.php">
                        <img src="./img/ltnn.png" alt="" class="logo-img">
                    </a>
                </div>
                <ul class="header__list">
                    <li class="header__item"><a href="index.php" class="header__item-link">Trang chủ</a></li>
                    <li class="header__item"><a href="intro.php" class="header__item-link">Giới thiệu</a></li>
                    <li class="header__item"><a href="blog_list.php" class="header__item-link">Tin tức</a></li>
                </ul>
            </div>
            <div class="header_right fl">
                <div class="header__search">
                    <form action="" class="search-bar">
                        <input type="search" name="search" class="header__search-input" placeholder="Nhập tên sản phẩm..." onkeyup="showResult(this.value)">
                        <span class="search-btn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                    </form>
                    <div class="over_lay"></div>

                    <div id="search-suggestions"></div>
                    <script>
                        function showResult(str) {
                            if (str.length == 0) {
                                document.getElementById("search-suggestions").innerHTML = "";
                                document.getElementById("search-suggestions").style.border = "0.5em";
                                return;
                            }
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("search-suggestions").innerHTML = this.responseText;
                                    document.getElementById("search-suggestions").style.border = "1px solid #A5ACB2";
                                    document.getElementById("search-suggestions").style.display = "block";
                                }
                            }
                            xmlhttp.open("GET", "livesearch.php?q=" + str, true);
                            xmlhttp.send();
                        }
                    </script>
                </div>
                <div class="header__notification">
                    <i class="fa-solid fa-bell"></i>
                </div>
                <div class="header__shoppingCard">
                <a href="./cart.php" target="_blank" style="background: black;" type="submit"><i class="fa-solid fa-cart-shopping header__shoppingCard-icon" style="position: relative;"><span id="quantity" style="font-size: 15px; color: red; border-radius: 100%; position: absolute; right: -5px; bottom: -5px;"><?php if(isset($_COOKIE["cart"])){echo "•";}else{echo "";}?></span></i></a>
                </div>
                <div class="header__user">
                    <img src="./uploads/avatar.jpg" class="avatar" alt="no image">
                    <div class="header__user-log">
                        <ul class="user-log-list">
                            <?php
                            if (isset($_SESSION['email'])) {
                                $db = mysqli_connect('localhost', 'root', '', 'webbanlap');
                                $sql = " SELECT * FROM account ";
                                $result = mysqli_query($db, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Kiểm tra thông tin đăng nhập
                                    if ($row['email'] == $_SESSION['email']) {
                                        echo '<script>document.getElementsByClassName("avatar")[0].setAttribute("src", "./uploads/' . $row['image'] . '?' . time() . '");</script>';
                                        echo "<li class='user-log-item h3 border_tb'>" . $_SESSION['username'] . "</li>";
                                    }
                                }
                            }
                            ?>
                            <?php
                            if (!isset($_SESSION['email'])) { ?>
                                <li class="user-log-item border_tb"><a href="log_in.php" class="text-dark">Đăng nhập</a></li>
                                <li class="user-log-item border_tb"><a href="register.php" class="text-dark">Đăng ký</a></li>
                            <?php
                            }
                            ?>


                            <?php
                            if (isset($_SESSION['email'])) { ?>
                                <?php
                                if ($_SESSION['username'] == 'Admin') { ?>
                                    <li class="user-log-item border_tb">
                                        <a id="admin" href="./admin/quanli.php" class=" pe-auto min_width25px text-dark">
                                            Quản lí
                                        </a>
                                    </li>
                                <?php
                                }
                                ?>
                                <li class="user-log-item border_tb">
                                    <a id="select" class=" pe-auto min_width25px" data-toggle="modal" data-target="#exampleModal">
                                        Thay ảnh đại diện
                                    </a>
                                </li>
                                <li class="user-log-item border_tb">
                                    <a id="changepw" class=" pe-auto min_width25px" data-toggle="modal" data-target="#passwordModal">
                                        Đổi mật khẩu
                                    </a>
                                </li>
                                <li class="user-log-item border_tb"><a href="log_out.php" class="text-dark">Đăng xuất</a> </li>
                            <?php
                            }
                            ?>
                            <li class="user-log-item border_tb"><a href="search_order.php" class="text-dark">Tra cứu đơn hàng</a></li>

                        </ul>
                    </div>
                </div>
                <div class="header-searchMobile">
                    <i class="header-searchMobile__icon fa-solid fa-magnifying-glass"></i>
                </div>
                <form action="">
                    <input type="text" placeholder="Tìm kiếm" class="searchMobile" onkeyup="showResult_mb(this.value)">
                </form>
                <div id="search-suggestions_mb"></div>
            </div>
        </div>
    </div>
</header>

<script>
    function showResult_mb(str) {
        if (str.length == 0) {
            document.getElementById("search-suggestions_mb").innerHTML = "";
            document.getElementById("search-suggestions_mb").style.border = "0px";
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("search-suggestions_mb").innerHTML = this.responseText;
                document.getElementById("search-suggestions_mb").style.border = "1px solid #A5ACB2";
                document.getElementById("search-suggestions_mb").style.display = "block";
            }
        }
        xmlhttp.open("GET", "livesearch.php?q=" + str, true);
        xmlhttp.send();
    }
    document.querySelector('.over_lay').addEventListener("click", closebcc);
    function closebcc() {
        document.getElementById("search-suggestions_mb").style.display = 'none';
    }
</script>