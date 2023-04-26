<?php
$cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
$cart = json_decode($cart);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <link rel="stylesheet" type="text/css" href="./css/UI__styles.css"> 
    <link rel="stylesheet" type="text/css" href="./css/UI__mb.css"> 
    <link rel="stylesheet" type="text/css" href="./css/globals.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tin tức</title>
    <link rel="icon" href="./img/ltnn.png">
    <link rel="stylesheet" href="./icon/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://kit.fontawesome.com/e26d989c97.js" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/responsive.css">
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
                                'Tin tức' => '#',
                            );

                            foreach ($breadcrumbs as $title => $link) {
                                if ($link === '#') {
                                    echo '<li class="breadcrumb-item">' . $title . '</li>';
                                } else {
                                    echo '<li class="breadcrumb-item"><a href="' . $link . '">' . $title . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="body__content">
                    <div class="container">
                        <div class="body__content--menu">
                        </div>
                        <div class="body__content--blog">
                            <div class="body__content--blog__articles">
                                <div class="row">
                                <?php
                                // Import the file where we defined the connection to Database.     
                                require_once "Connect.php";

                                $per_page_record = 4;  // Number of entries to show in a page.   
                                // Look for a GET variable page if not found default is 1.        
                                if (isset($_GET["page"])) {
                                    $page  = $_GET["page"];
                                } else {
                                    $page = 1;
                                }

                                $start_from = ($page - 1) * $per_page_record;

                                // $query = "SELECT * FROM blog LIMIT $start_from, $per_page_record";     
                                // $rs_result = mysqli_query ($conn, $query);
                                $stmt = $conn->prepare("SELECT * FROM blog LIMIT $start_from, $per_page_record");
                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                $stmt->execute();
                                $blog = $stmt->fetchAll();
                                ?>
                                <?php
                                foreach ($blog as $b) {
                                    // Display each field of the records.    
                                ?>
                                    <div class="col-md-6  mt-bottom20">
                                        <article class="blog__article">
                                            <a href="blog.php?blog_id=<?php echo $b["blog_id"]; ?>&tag=<?php echo $b["blog_tag"]; ?>" class="of-hidden"><img src="admin/blog/<?php echo $b['blog_img']; ?>" alt="no image"></a>
                                            <a class="blog__article--button" href="blog_category.php?blog_tag=<?php echo $b["blog_tag"] ?>"><span><?php echo $b["blog_tag"]; ?></span></a>
                                            <label class="label--1"><?php echo $b["date"]; ?></label>
                                            <h6><a href="blog.php?blog_id=<?php echo $b["blog_id"]; ?>&tag=<?php echo $b["blog_tag"]; ?>"><span style="color: black;"><?php echo $b["blog_title"]; ?></a></h6>
                                        </article>
                                    </div>
                                <?php
                                };
                                ?>
                                <div class="blog_pagination">
                                    <?php
                                    $stmt = $conn->prepare("SELECT * FROM blog");
                                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                    $stmt->execute();
                                    $blog = $stmt->fetchAll();

                                    $count = $stmt->rowCount();

                                    $total_records = (int)$count;

                                    echo "</br>";
                                    // Number of pages required.   
                                    $total_pages = ceil($total_records / $per_page_record);
                                    $pagLink = "";

                                    if ($page >= 2) {
                                        echo "<a href='blog_list.php?page=" . ($page - 1) . "'>  ❮ </a>";
                                    }

                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        if ($i == $page) {
                                            $pagLink .= "<a class = 'active' href='blog_list.php?page="
                                                . $i . "'>" . $i . " </a>";
                                        } else {
                                            $pagLink .= "<a href='blog_list.php?page=" . $i . "'>   
                                                                        " . $i . " </a>";
                                        }
                                    };
                                    echo $pagLink;

                                    if ($page < $total_pages) {
                                        echo "<a href='blog_list.php?page=" . ($page + 1) . "'>  ❯ </a>";
                                    }
                                    ?>
                                </div>
                            </div>
                            </div>
                            <div class="body__content--blog__nav">
                                <div class="poll">
                                    <div class="p-15" >
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
                                            <a class="poll__tag--grp" href="blog_category.php?blog_tag=<?php echo $t["tag_name"] ?>"><?php echo $t["tag_name"] ?></a>
                                        <?php } ?>
                                    </div>
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
</body>
<script>
    function topFunction() {
        var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
        if (currentScroll > 0) {
            window.requestAnimationFrame(topFunction);
            window.scrollTo(0, currentScroll - (currentScroll / 100));
        }
    }
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="./js/main.js"></script>

</html>