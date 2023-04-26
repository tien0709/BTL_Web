<?php
require_once "./Connect.php";
$blog_id = $_GET["blog_id"];

$cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
$cart = json_decode($cart);

$stmt = $conn->prepare("SELECT * FROM blog where blog_id = $blog_id");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$blog = $stmt->fetchAll();


$count = $conn->prepare("UPDATE blog SET view_count= view_count+1 WHERE blog_id = $blog_id");
$count->execute();

$cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
$cart = json_decode($cart);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <?php
    foreach ($blog as $b) { ?>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
        <link rel="stylesheet" type="text/css" href="./css/UI__styles.css"> <!-- For PC & Tablet -->
    <link rel="stylesheet" type="text/css" href="./css/UI__mb.css"> <!-- For mobiles -->
    <link rel="stylesheet" type="text/css" href="./css/globals.css">
    <link rel="icon" href="./img/ltnn.png">

        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $b["blog_title"] ?></title>
        <link rel="stylesheet" href="./icon/fontawesome-free-6.2.0-web/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/e26d989c97.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./css/main.css">
        <link rel="stylesheet" href="./css/base.css">
        <link rel="stylesheet" href="./css/responsive.css">
    <?php } ?>

</head>

<body>
    <div class="app">
        <?php
        include("pages/header.php")
        ?>
        <div class="main">
            <div class="breadcrumb-wrap">
                <div class="container">
                    <div class="row">
                        <ul class="breadcrumb">
                            <?php
                            $breadcrumbs = array(
                                'Trang chủ' => 'index.php',
                                'Tin tức' => 'blog_list.php',
                            );
                            foreach ($breadcrumbs as $title => $link) {
                                echo '<li class="breadcrumb-item "><a href="' . $link . '">' . $title . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="post__content">
                <div class="container tablet-pl-18 tablet-pr-18">
                    <div class="body__content--blog">
                        <?php
                        foreach ($blog as $b) { ?>
                            <div class="body__content--blog__post">
                                <div class="post__detail">
                                    <a class="body__banner--info__link" href="blog_category.php?blog_tag=<?php echo $b["blog_tag"] ?>"><?php echo $b["blog_tag"] ?></a>
                                    <h1><?php echo $b["blog_title"]; ?></h1>
                                    <img src="admin/blog/<?php echo $b['blog_img']; ?>" alt="no image">
                                    <?php echo $b["blog_content"]; ?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="body__content--blog__nav  no-mr">
                            <div class="poll">
                                <div class="mt-25 ml-25">
                                    <label class="font-700 fszie-18">Tags</label>
                                </div>
                                <div class="poll__tag flex flex-wrap mt-12">
                                    <?php
                                    $stmt = $conn->prepare("SELECT * FROM blog_tag");
                                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                    $stmt->execute();
                                    $tag = $stmt->fetchAll();

                                    foreach ($tag as $t) {
                                    ?>
                                        <a class="poll__tag--grp" href="blog_category.php?blog_tag=<?php echo $b["blog_tag"] ?>"><?php echo $t["tag_name"] ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include("pages/footer.php")
        ?>
    </div>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            // spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                1224: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },

                768: {
                    slidesPerView: 2,

                }
            },
        });
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>