<!DOCTYPE html>
<html lang="vi">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <script href="photoswipe-lightbox.esm.js"></script>
    <link rel="stylesheet" href="photoswipe.css">
    <link rel="stylesheet" type="text/css" href="./css/CSS_intro/globals.css">
    <link rel="stylesheet" type="text/css" href="./css/CSS_intro/UI__mb.css"> <!-- For PC & Tablet -->
    <link rel="stylesheet" type="text/css" href="./css/CSS_intro/UI__styles.css"> <!-- For mobiles -->
    <link rel="stylesheet" href="./icon/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="icon" href="./img/ltnn.png">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/e26d989c97.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Giới thiệu</title>
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
                        <ul class="breadcrumb " style="align-items: center;">
                            <?php
                            $breadcrumbs = array(
                                'Trang chủ' => 'index.php',
                                'Giới thiệu' => '#'
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

        <div class="body__activity " style="padding: 0 10px;">
            <div class="container">
                <div class="body__activity--banner">
                    <h2 class="title_section">Laptop LTNN</h2>
                    <p>Nếu những gì chúng tôi không có, nghĩa là bạn không cần</p>
                    <div class="activity--banner">
                        <div class="activity--info">
                            <h4>Lịch sử phát triển</h4>
                            <p>Công ty chúng tôi được thành lập vào năm 2005 với mục tiêu cung cấp các sản phẩm laptop chất lượng cao cho khách hàng tại địa phương. Ban đầu, chúng tôi chỉ có một cửa hàng nhỏ và cung cấp các sản phẩm của một vài thương hiệu nổi tiếng. Tuy nhiên, nhờ vào cam kết chất lượng và dịch vụ tốt, công ty chúng tôi đã nhanh chóng tạo dựng được uy tín trong ngành và thu hút được nhiều khách hàng tin cậy.</p>

                        </div>
                        <div class="activity--img">
                        <img src="https://th.bing.com/th/id/R.6ef633d2d090af82188ebf39944c8664?rik=U25ogNq78eo8fw&pid=ImgRaw&r=0" alt="no image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="pswp-gallery sp_bg" id="my-gallery" style="position: relative;">
                <div class="container activity_container">
                    <a href="https://th.bing.com/th/id/OIP.2VmZQKIaW80cp-ROJQfGygHaFL?pid=ImgDet&rs=1" data-pswp-width="960" data-pswp-height="676" target="_blank">
                        <div class="img-container">
                        <img src="https://th.bing.com/th/id/OIP.2VmZQKIaW80cp-ROJQfGygHaFL?pid=ImgDet&rs=1" alt="no image">
                            <div class="overlay">
                                <h5>Mục tiêu kinh doanh </h5>
                                <p>Mục tiêu của công ty chúng tôi là trở thành địa chỉ tin cậy của khách hàng khi họ có nhu cầu mua laptop cao cấp. Chúng tôi tập trung vào cung cấp những sản phẩm có chất lượng tốt nhất, với mức giá hợp lý và dịch vụ chăm sóc khách hàng chuyên nghiệp.</p>
                                <div class="text-on-hover" id="hover">
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://shopdunk.com/images/uploaded/Image%20(8).png" data-pswp-width="960" data-pswp-height="676" target="_blank">
                        <div class="img-container">
                        <img src="https://shopdunk.com/images/uploaded/Image%20(8).png" alt="no image">
                            <div class="overlay">
                                <h5>Sản phẩm và dịch vụ</h5>
                                <p>Công ty của chúng tôi cung cấp một loạt các sản phẩm  laptop của các thương hiệu nổi tiếng, dịch vụ sửa chữa, bảo hành, hoặc bán phụ kiện đi kèm. </p>
                                <div class="text-on-hover" id="hover">
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="https://gdata.com.vn/wp-content/uploads/2022/07/Cam-ket-chat-luong.png" data-pswp-width="960" data-pswp-height="676" target="_blank">
                        <div class="img-container">
                        <img src="https://gdata.com.vn/wp-content/uploads/2022/07/Cam-ket-chat-luong.png" alt="no image">
                            <div class="overlay">
                                <h5>Cam kết chất lượng</h5>
                                <p>Chúng tôi chỉ cung cấp những sản phẩm laptop chất lượng cao từ các thương hiệu uy tín và được kiểm định chất lượng trước khi đưa vào bán hàng. Tất cả các sản phẩm laptop được bán ra đều được bảo hành theo tiêu chuẩn của nhà sản xuất và được kiểm tra kỹ lưỡng trước khi giao hàng đến khách hàng.</p>
                                <div class="text-on-hover" id="hover">
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://haymora.com/upload/images/ban_le/fpt_retail/nhan-vien-fpt_nguon_fptshop_com_vn.jpg" data-pswp-width="960" data-pswp-height="676" target="_blank">
                        <div class="img-container">
                        <img src="https://haymora.com/upload/images/ban_le/fpt_retail/nhan-vien-fpt_nguon_fptshop_com_vn.jpg" alt="no image">
                            <div class="overlay">
                                <h5>Đội ngũ nhân viên chuyên nghiệp</h5>
                                <p>Công ty của chúng tôi có một đội ngũ nhân viên giàu kinh nghiệm và chuyên môn về laptop. Đội ngũ kỹ thuật của chúng tôi có trình độ chuyên môn cao và được đào tạo bài bản về sửa chữa, bảo trì laptop. Đội ngũ bán hàng của chúng tôi rất nhiệt tình và có kiến thức về sản phẩm laptop đầy đủ. </p>
                                <div class="text-on-hover" id="hover">
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
        </div>
        <?php
        include("pages/footer.php")
        ?>
    </div>


    <script type="Module">
        import PhotoSwipeLightbox from './photoswipe-lightbox.esm.js';
        const lightbox = new PhotoSwipeLightbox({
        gallery: '#my-gallery',
        children: 'a',
        pswpModule: () => import('./photoswipe.esm.js')
        });
        lightbox.init();
    </script>
    <script>
        const element = document.querySelectorAll('.overlay');
        const count = element.length;
        var x = window.matchMedia("(min-width: 1224px)");
        var y = window.matchMedia("(max-width: 1223px)");




        if (x.matches) {
            for (var i = 0; i <= count; i++) {
                const label = document.createElement('label');
                label.innerHTML = i + 1 + "/" + count;
                label.setAttribute("id", "label")
                element[i].appendChild(label);
            }
        } else if (y.matches) {
            for (var i = 0; i <= count; i++) {
                const label = document.createElement('label');
                label.innerHTML = "Click to see more >>";
                label.setAttribute("id", "label")
                element[i].appendChild(label);
            }
        }

        function topFunction() {
            var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
            if (currentScroll > 0) {
                window.requestAnimationFrame(topFunction);
                window.scrollTo(0, currentScroll - (currentScroll / 100));
            }
        }
    </script>
    <script src="./js/main.js"></script>    
</body>

</html>