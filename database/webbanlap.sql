-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 26, 2023 lúc 02:44 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanlap`
--
CREATE DATABASE IF NOT EXISTS `webbanlap` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `webbanlap`;
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `image`) VALUES
(1, 'Admin', '12345', 'admin@gmail.com', '6443bb42e44e1.png'),
(9, 'chuloicvl', 'cvlcvlcvl', 'chuloicvl190302@gmail.com', 'avatar.jpg'),
(10, 'Chu Lợi', 'cvlcvlcvl', 'chuloicvlcvl190302@gmail.com', 'avatar.jpg'),
(13, 'Chu Văn Lợi', 'cvlcvlcvl', 'dhznsq21631@dcctb.com', 'avatar.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` text NOT NULL,
  `blog_tag` text NOT NULL,
  `blog_img` text NOT NULL,
  `blog_content` text NOT NULL,
  `view_count` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_tag`, `blog_img`, `blog_content`, `view_count`, `date`) VALUES
(1, 'OPPO A98 5G lộ sạch cấu hình, có phải là phiên bản đổi tên của mẫu điện thoại này?', 'Tin công nghệ', './thumbnail/oppo-reno8-84-240423-022730-800-resize.jpg', '<p>OPPO&nbsp;được cho l&agrave; đang ph&aacute;t triển một chiếc điện thoại tầm trung mới với t&ecirc;n gọi l&agrave;&nbsp;OPPO A98 5G&nbsp;(số model CPH2529). Trước đ&oacute;, thiết bị đ&atilde; được ph&aacute;t hiện tr&ecirc;n nhiều trang web chứng nhận như CQC,&nbsp;TKDN,&nbsp;NBTC,&nbsp;HTML5 Test v&agrave;&nbsp;Geekbench.&nbsp;Trong một b&aacute;o c&aacute;o gần đ&acirc;y, Appuals đ&atilde; tiết lộ to&agrave;n bộ th&ocirc;ng số kỹ thuật v&agrave; h&igrave;nh ảnh render của chiếc&nbsp;smartphone&nbsp;n&agrave;y.</p>\r\n<p>Theo b&aacute;o c&aacute;o, OPPO A98 5G c&oacute; m&agrave;n h&igrave;nh LCD LTPS k&iacute;ch thước 6.7 inch, độ ph&acirc;n giải Full HD+ (1.080 x 2.400 pixel), tỷ lệ khung h&igrave;nh 20:9, mật độ điểm ảnh 391 ppi v&agrave; tốc độ l&agrave;m mới l&ecirc;n tới 120 Hz. Tấm nền của thiết bị được bảo vệ bởi lớp k&iacute;nh Panda Glass si&ecirc;u bền bỉ.</p>\r\n<p>Sản phẩm dự kiến được trang bị chip Snapdragon 695 đi k&egrave;m với bộ nhớ RAM 8 GB LPDDR4x v&agrave; 256 GB bộ nhớ trong cho bạn thoải m&aacute;i lưu trữ m&agrave; kh&ocirc;ng lo bị đầy bộ nhớ. Hơn nữa, OPPO A98 5G c&ograve;n được cung cấp vi&ecirc;n pin 5.000 mAh, hỗ trợ sạc nhanh 67 W th&ocirc;ng qua cổng USB-C v&agrave; một cảm biến&nbsp;v&acirc;n tay ở mặt b&ecirc;n.</p>', 169, '2023-04-25'),
(16, 'Đánh giá hiệu năng OPPO Reno8 sau 6 tháng: Snapdragon 680 vẫn mang lại hiệu năng tốt, chiến game mượt mà', 'Tin công nghệ', './thumbnail/oppo-reno8-84-240423-022730-800-resize.jpg', '<p>OPPO&nbsp;được cho l&agrave; đang ph&aacute;t triển một chiếc điện thoại tầm trung mới với t&ecirc;n gọi l&agrave;&nbsp;OPPO A98 5G&nbsp;(số model CPH2529). Trước đ&oacute;, thiết bị đ&atilde; được ph&aacute;t hiện tr&ecirc;n nhiều trang web chứng nhận như CQC,&nbsp;TKDN,&nbsp;NBTC,&nbsp;HTML5 Test v&agrave;&nbsp;Geekbench.&nbsp;Trong một b&aacute;o c&aacute;o gần đ&acirc;y, Appuals đ&atilde; tiết lộ to&agrave;n bộ th&ocirc;ng số kỹ thuật v&agrave; h&igrave;nh ảnh render của chiếc&nbsp;smartphone&nbsp;n&agrave;y.</p>\r\n<p>Theo b&aacute;o c&aacute;o, OPPO A98 5G c&oacute; m&agrave;n h&igrave;nh LCD LTPS k&iacute;ch thước 6.7 inch, độ ph&acirc;n giải Full HD+ (1.080 x 2.400 pixel), tỷ lệ khung h&igrave;nh 20:9, mật độ điểm ảnh 391 ppi v&agrave; tốc độ l&agrave;m mới l&ecirc;n tới 120 Hz. Tấm nền của thiết bị được bảo vệ bởi lớp k&iacute;nh Panda Glass si&ecirc;u bền bỉ.</p>\r\n<p>Sản phẩm dự kiến được trang bị chip Snapdragon 695 đi k&egrave;m với bộ nhớ RAM 8 GB LPDDR4x v&agrave; 256 GB bộ nhớ trong cho bạn thoải m&aacute;i lưu trữ m&agrave; kh&ocirc;ng lo bị đầy bộ nhớ. Hơn nữa, OPPO A98 5G c&ograve;n được cung cấp vi&ecirc;n pin 5.000 mAh, hỗ trợ sạc nhanh 67 W th&ocirc;ng qua cổng USB-C v&agrave; một cảm biến&nbsp;v&acirc;n tay ở mặt b&ecirc;n.</p>', 5, '2023-04-25'),
(17, 'Khám phá loạt những mẫu màn hình bén như \'cái chén\' đang có doanh số \'khủng\' tại TGDĐ', 'Tin công nghệ', './thumbnail/1-200423-140848-800-resize.jpg', '<p>Mở đầu trong danh s&aacute;ch TOP những chiếc m&agrave;n h&igrave;nh b&aacute;n chạy nhất tại Thế Giới Di Động, m&igrave;nh sẽ giới thiệu đến mẫu m&agrave;n h&igrave;nh VZ27EHE-R 27 inch đến từ nh&agrave; Asus. C&aacute;c bạn c&oacute; thể nhận ra rằng thiết kế của Asus VZ27EHE-R 27 inch kh&aacute; đơn giản v&agrave; thanh lịch với bề mặt h&igrave;nh viền si&ecirc;u mỏng gi&uacute;p tạo ra một c&aacute;i nh&igrave;n thật gọn g&agrave;ng v&agrave; hiện đại.<br>Tuy nhi&ecirc;n, sự đơn giản n&agrave;y lại \'ẩn giấu\' những c&ocirc;ng nghệ cực xịn x&ograve; đ&oacute;! &nbsp;Asus VZ27EHE-R mang đến sự chất lượng đến từ tấm m&agrave;n c&oacute; độ ph&acirc;n giải Full HD 27 inch c&ugrave;ng tốc độ l&agrave;m mới 75 Hz, nhờ đ&oacute; c&oacute; thể hiển thị h&igrave;nh ảnh với độ tương phản cao, chi tiết r&otilde; n&eacute;t v&agrave; độ mượt m&agrave; tối ưu, cải thiện trải nghiệm sử dụng của người d&ugrave;ng khi xem phim, chơi game hoặc l&agrave;m việc đều rất tuyệt vời.</p>\r\n<p>Kh&ocirc;ng dừng lại ở đ&oacute;, Asus VZ27EHE-R c&ograve;n c&oacute; những t&iacute;nh năng đ&aacute;ng kinh ngạc. Điều đầu ti&ecirc;n m&igrave;nh muốn nhắc đến l&agrave; t&iacute;nh năng Blue Light Filter của tấm m&agrave;n. Với t&iacute;nh năng n&agrave;y, m&agrave;n h&igrave;nh sẽ giảm thiểu &aacute;nh s&aacute;ng xanh nhấp nh&aacute;y g&acirc;y hại cho mắt khi bạn sử dụng m&aacute;y t&iacute;nh trong thời gian d&agrave;i. Điều n&agrave;y thật sự l&agrave; một điểm cộng lớn d&agrave;nh cho những bạn hay d&ugrave;ng m&aacute;y t&iacute;nh nhiều như m&igrave;nh.</p>', 1, '2023-04-25'),
(18, 'ARM đang phát triển một mẫu chip đặc biệt nhằm phô diễn công nghệ tiên tiến', 'Tin công nghệ', './thumbnail/arm_3-240423-102218-800-resize.jpg', '<p>ARM được cho l&agrave; đang ph&aacute;t triển mẫu chip của ri&ecirc;ng m&igrave;nh. Theo Financial Times, c&ocirc;ng ty đ&atilde; th&agrave;nh lập nh&oacute;m &ldquo;kỹ thuật giải ph&aacute;p&rdquo; mới, do cựu gi&aacute;m đốc điều h&agrave;nh Qualcomm v&agrave; nh&agrave; thiết kế Snapdragon Kevork Kechichian dẫn đầu, sản xuất một chất b&aacute;n dẫn để giới thiệu khả năng của c&aacute;c sản phẩm của m&igrave;nh.<br>Mục ti&ecirc;u r&otilde; r&agrave;ng của ARM với dự &aacute;n lần n&agrave;y l&agrave; thu h&uacute;t kh&aacute;ch h&agrave;ng mới trước đợt ch&agrave;o b&aacute;n c&ocirc;ng khai ban đầu rất được mong đợi v&agrave;o cuối năm nay.</p>\r\n<p>Tờ The Times b&aacute;o c&aacute;o rằng c&ocirc;ng ty đ&atilde; bắt đầu l&agrave;m việc tr&ecirc;n nguy&ecirc;n mẫu khoảng s&aacute;u th&aacute;ng trước. Nhiều gi&aacute;m đốc điều h&agrave;nh trong ng&agrave;nh tiết lộ rằng th&agrave;nh quả thiết kế &ldquo;ti&ecirc;n tiến hơn&rdquo; so với bất kỳ bộ vi xử l&yacute; n&agrave;o được sản xuất trước đ&acirc;y. Thực tế l&agrave; nhiều nguồn b&ecirc;n ngo&agrave;i ARM đ&atilde; tiết lộ cho The Times về chip nội bộ cho thấy nguy&ecirc;n mẫu l&agrave; một b&iacute; mật mở trong ng&agrave;nh c&ocirc;ng nghiệp chip.</p>\r\n<p>ARM đ&atilde; từ chối b&igrave;nh luận. Theo The Times, c&ocirc;ng ty kh&ocirc;ng c&oacute; kế hoạch b&aacute;n hoặc cấp ph&eacute;p thiết kế nguy&ecirc;n mẫu cho c&aacute;c c&ocirc;ng ty kh&aacute;c. M&ocirc; h&igrave;nh kinh doanh của c&ocirc;ng ty được x&acirc;y dựng xung quanh việc cấp ph&eacute;p kiến ​​tr&uacute;c cho c&aacute;c c&ocirc;ng ty kh&aacute;c. Hơn 500 c&ocirc;ng ty, bao gồm Apple, MediaTek v&agrave; Qualcomm, sử dụng c&aacute;c th&agrave;nh phần do ARM thiết kế trong bộ vi xử l&yacute; của họ.</p>\r\n<p>Vẫn c&oacute; những phần thị trường m&agrave; ARM c&oacute; thể x&acirc;m nhập. V&iacute; dụ, với PC, c&aacute;c kiến tr&uacute;c ARM rất hiếm ngo&agrave;i c&aacute;c mẫu Mac chạy chip Apple M gần đ&acirc;y.</p>', 0, '2023-04-25'),
(19, 'Thêm một nhà cung cấp linh kiện cho MacBook đặt nhà máy tại Việt Nam', 'Tin công nghệ', './thumbnail/appledangcokehoachchuyendaychuyensanxuatmacbookprotutrungquocsangvietnam1-230423-100020-800-resize.jpg', '<p>Mới đ&acirc;y, Quanta đ&atilde; trở th&agrave;nh nh&agrave; cung cấp linh kiện cho Apple tiếp theo đầu tư nh&agrave; m&aacute;y sản xuất tại Việt Nam. Quanta đ&atilde; k&yacute; kết một thoả thuận với ch&iacute;nh quyền tỉnh Nam Định về việc x&acirc;y dựng một nh&agrave; m&aacute;y tại Việt Nam với mức gi&aacute; trị đầu tư l&ecirc;n đến 120 triệu USD.<br>V&agrave;o th&aacute;ng 12 năm ngo&aacute;i, c&aacute;c b&aacute;o c&aacute;o đ&atilde; tiết lộ về việc Apple đang c&oacute; kế hoạch chuyển d&acirc;y chuyền sản xuất MacBook Pro sang Việt Nam. Sau những động th&aacute;i chuyển nh&agrave; m&aacute;y sản xuất của Foxconn v&agrave; BOE sang Việt Nam, c&oacute; vẻ như Quanta cũng đ&atilde; bắt đầu tham gia v&agrave;o việc \"chuyển m&igrave;nh\" n&agrave;y.</p>\r\n<p>Theo Reuters, Quanta đ&atilde; k&yacute; một thỏa thuận với ch&iacute;nh quyền tỉnh Nam Định v&agrave;o thứ 6 vừa qua để th&agrave;nh lập một nh&agrave; m&aacute;y ở miền Bắc Việt Nam. Dự &aacute;n được cho l&agrave; c&oacute; tổng mức đầu tư l&ecirc;n đến 120 triệu USD v&agrave; sẽ được x&acirc;y dựng tr&ecirc;n khu đất 22.5 Ha tại khu c&ocirc;ng nghiệp Mỹ Thuận.<br>Th&ocirc;ng tin chi tiết về thời điểm nh&agrave; m&aacute;y đi v&agrave;o hoạt động cũng như c&aacute;c d&acirc;y chuyền sản xuất vẫn chưa được h&eacute; lộ. X&eacute;t theo mong muốn mở rộng sản xuất nh&agrave; m&aacute;y tại Việt Nam của Apple, c&oacute; thể nh&agrave; m&aacute;y mới n&agrave;y sẽ được sử dụng để sản xuất linh kiện cho Apple.</p>\r\n<p>Trước đ&oacute;, Foxconn đ&atilde; đầu tư x&acirc;y dựng nh&agrave; m&aacute;y tại Việt Nam với tổng mức gi&aacute; trị l&ecirc;n đến 300 triệu USD v&agrave;o th&aacute;ng 8/2022. V&agrave;o th&aacute;ng 2/2023, Foxconn đ&atilde; k&yacute; tiếp 1 thoả thuận thu&ecirc; một khu đất rộng khoảng 449 ngh&igrave;n m&eacute;t vu&ocirc;ng đến năm 2057 với mức gi&aacute; trị khoảng 62.5 triệu USD. BOE cũng đ&atilde; thu&ecirc; h&agrave;ng chục Ha đất tại Việt Nam để x&acirc;y dựng nh&agrave; m&aacute;y với khoản đầu tư 400 triệu USD.</p>', 3, '2023-04-25'),
(20, 'Tải Kiếm Thế Origin | Bản Sắc Kiếm Thế - Xưng Đế Mobile', 'Ứng dụng mới nhất', './thumbnail/kto_11-060323-164919-800-resize.jpg', '<p>Kiếm Thế Origin l&agrave; một game với bối cảnh pha trộn giữa thời cuộc loạn lạc v&agrave; ch&iacute;nh chiến chốn v&otilde; l&acirc;m. C&acirc;u chuyện game xoay quanh việc t&igrave;m kiếm mảnh ngọc qu&yacute; gi&aacute; Du Long Gi&aacute;c, một bảo vật c&oacute; sức mạnh v&ocirc; bi&ecirc;n v&agrave; được cho l&agrave; c&oacute; thể xoay chuyển c&agrave;n kh&ocirc;n.<br>Người sở hữu Du Long Gi&aacute;c sẽ trở th&agrave;nh ch&iacute; t&ocirc;n thi&ecirc;n hạ. Tuy nhi&ecirc;n, sau khi Tống Th&aacute;i Tổ qua đời, bảo vật n&agrave;y đ&atilde; biến mất. Cho đến một ng&agrave;y, tin tức Du Long Gi&aacute;c t&aacute;i xuất bỗng nhi&ecirc;n trỗi dậy, v&agrave; c&aacute;c thế lực hắc &aacute;m trỗi dậy l&agrave;m thi&ecirc;n hạ đại loạn. Bạn sẽ trở th&agrave;nh anh h&ugrave;ng để trải nghiệm bằng những cuộc khi&ecirc;u chiến đầy kịch t&iacute;nh b&ugrave;ng nổ tại Kiếm Thế Origin<br>Kiếm Thế Origin l&agrave; game nhập vai tr&ecirc;n mobile với hệ thống m&ocirc;n ph&aacute;i quen thuộc gồm 20 hệ ph&aacute;i v&agrave; hệ thống ngũ h&agrave;nh tương sinh, tương khắc. Người chơi cần t&iacute;nh to&aacute;n mặc set trang bị sao cho ph&ugrave; hợp với m&ocirc;n ph&aacute;i của m&igrave;nh. Game được thiết kế để hồi tưởng k&yacute; ức của thế hệ 8x, 9x v&agrave; ph&ugrave; hợp với thế hệ gen Z.</p>', 1, '2023-04-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_tag`
--

CREATE TABLE `blog_tag` (
  `tag_id` int(11) NOT NULL,
  `tag_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_tag`
--

INSERT INTO `blog_tag` (`tag_id`, `tag_name`) VALUES
(1, 'Tin công nghệ'),
(2, 'Sản phẩm mới'),
(3, 'Khuyến mãi'),
(4, 'Ứng dụng mới nhất');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(5) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_image`) VALUES
(1, 'Asus', 'https://images.fpt.shop/unsafe/fit-in/108x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/22/637732077455069770_Asus@2x.jpg'),
(2, 'Lenovo', 'https://images.fpt.shop/unsafe/fit-in/108x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/8/26/637340494668267616_Lenovo@2x.jpg'),
(3, 'Acer', 'https://images.fpt.shop/unsafe/fit-in/108x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/8/26/637340494666704995_Acer@2x.jpg'),
(4, 'Macbook', 'https://images.fpt.shop/unsafe/fit-in/108x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/1/4/637769104385571970_Macbook-Apple@2x.jpg'),
(10, 'MSI', 'https://images.fpt.shop/unsafe/fit-in/108x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/8/26/637340493755614653_MSI@2x.jpg'),
(11, 'GiGaByte', 'https://images.fpt.shop/unsafe/fit-in/108x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/16/637674058450623615_Gigabyte@2x.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `products_id` int(5) NOT NULL,
  `products_name` varchar(255) NOT NULL,
  `image` char(255) NOT NULL,
  `image_desc_1` varchar(255) NOT NULL,
  `image_desc_2` varchar(255) NOT NULL,
  `image_desc_3` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `brand_id` int(5) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `rating_tb` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`products_id`, `products_name`, `image`, `image_desc_1`, `image_desc_2`, `image_desc_3`, `price`, `description`, `brand_id`, `discount`, `rating_tb`) VALUES
(14, 'Laptop Asus TUF Gaming FX506HF-HN017W i5 11400H/16GB/512GB/GeForce RTX 2050 4GB/Win11', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/4/4/638162268368080598_asus-tuf-gaming-fx506hf-den-dd.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/4/4/638162268369378408_asus-tuf-gaming-fx506hf-den-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/4/4/638162268366935435_asus-tuf-gaming-fx506hf-den-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/4/4/638162268367298642_asus-tuf-gaming-fx506hf-den-4.jpg', '21.290.000', 'Không', 1, '  22.990.000', '4.7'),
(16, 'Laptop Asus Vivobook E1404FA-NK186W R5-7520U/16GB/512GB/14\" FHD/Win11', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/4/19/638175171985162982_asus-vivobook-e1404fa-nk186w-r5-7520u-den-dd-moi.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/4/11/638168280594574722_asus-vivobook-e1404fa-nk186w-r5-7520u-den-5.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/4/11/638168280594574722_asus-vivobook-e1404fa-nk186w-r5-7520u-den-4.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/4/11/638168280594574722_asus-vivobook-e1404fa-nk186w-r5-7520u-den-1.jpg', '13.490.000', 'Không', 1, '  14.990.000', '5'),
(17, 'Laptop Asus Vivobook M3500QC-L1516W R9 5900HX/16GB/512GB/RTX3050 4GB/15.6\" OLED/Win11', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/2/24/637812970373765290_asus-vivobook-pro-m3500qc-bac-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/2/24/637812970373765290_asus-vivobook-pro-m3500qc-bac-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/2/24/637812970373608729_asus-vivobook-pro-m3500qc-bac-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/2/24/637812970372983864_asus-vivobook-pro-m3500qc-bac-3.jpg', '26.990.000', 'Không', 1, '  29.990.000', '0'),
(18, 'Laptop Asus Vivobook Pro N7401ZE-M9028W i7 12700H/16GB/512GB/14.5/GeForce RTX 3050 Ti 4GB/Win11', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/9/19/637991793849686768_asus-vivobook-pro-14x-n74xx-bac-dd.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/9/19/637991827125876844_asus-vivobook-pro-14x-n74xx-bac-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/9/19/637991827125408214_asus-vivobook-pro-14x-n74xx-bac-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/9/19/637991827124783120_asus-vivobook-pro-14x-n74xx-bac-3.jpg', '33.990.000', 'Không', 1, '  37.990.000', '0'),
(19, 'Laptop Asus Zenbook UX3402ZA-KM221W i7 1260P/16GB/512GB/14\" OLED 2.8K/Win 11', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/6/27/637919255450978130_asus-zenbook-ux3402-xanh-dd.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/6/27/637919255355664010_asus-zenbook-ux3402-xanh-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/6/27/637919255355507776_asus-zenbook-ux3402-xanh-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/6/27/637919255355664010_asus-zenbook-ux3402-xanh-3.jpg', '28.490.000', 'Khong', 1, ' 31.990.000', '0'),
(20, 'Laptop Asus TUF Gaming FX517ZC-HN077W i5 12450H/8GB/512GB/15.6\"FHD/GeForce RTX 3050 4GB/Win 11', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/3/10/638140638161724111_asus-tuf-gaming-fx517-den-dd-rtx-3050-dd.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/3/22/637835764419854570_asus-tuf-gaming-fx517-den-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/3/22/637835764411260620_asus-tuf-gaming-fx517-den-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/3/22/637835764410323413_asus-tuf-gaming-fx517-den-3.jpg', '21.990.000', 'Không', 1, ' 28.990.000', '0'),
(21, 'Laptop Asus ROG Strix Gaming G513IE-HN246W R7 4800H/8GB/512GB/15.6FHD/GeForce RTX 3050 Ti 4GB/Win 11', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/9/30/638001227463678942_asus-gaming-zephyrus-g513-xam-led-4zone-dd.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2021/8/26/637655727924518755_asus-rog-gaming-g513-rgb4-xam-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2021/8/26/637655727926706226_asus-rog-gaming-g513-rgb4-xam-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2021/8/26/637655727922487554_asus-rog-gaming-g513-rgb4-xam-3.jpg', '22.990.000', 'Không', 1, ' 26.990.000', '0'),
(22, 'Laptop Asus Vivobook Pro M3401QA-KM025W R7 5800H/8GB/512GB SSD/14\" 2.8K OLED/Win11', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/3/10/638140651212606754_asus-vivobook-pro-m3401qa-bac-dd.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2021/12/30/637764585584576434_asus-vivobook-pro-m3401qa-bac-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2021/12/30/637764585583951463_asus-vivobook-pro-m3401qa-bac-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2021/12/30/637764585587232674_asus-vivobook-pro-m3401qa-bac-3.jpg', '18.990.000', 'Không', 1, ' 20.990.000', '0'),
(24, 'Laptop Lenovo Gaming Legion 5 15IAH7H i7 12700H/16GB/512GB/15.6 15IAH7H i7 12700H/16GB/512GB/15.6', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/3/23/638151643297943497_lenovo-gaming-legion-5-15iah7h-xam-dam-dd.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/3/23/638151671900654404_lenovo-gaming-legion-5-15iah7h-xam-dam-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/2/2/638109273683768082_lenovo-gaming-legion-5-15iah7h-i7-12700h-4.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/2/2/638109273684237034_lenovo-gaming-legion-5-15iah7h-i7-12700h-2.jpg', '33.990.000', 'Không', 2, '   45.990.000', '0'),
(28, 'Laptop Lenovo IdeaPad 1 15AMN7 R5 7520U/8GB/512GB/15.6 1155G7/8Gb/256Gb/15.6\"FHD/Win 11', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/4/11/638168337649091937_lenovo-ideapad-3-15itl6-i5-1155g7-xam-dd.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/11/29/638053327833014914_lenovo-ideapad-1-15amn7-xam-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/11/29/638053327833171258_lenovo-ideapad-1-15amn7-xam-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/11/29/638053327832233628_lenovo-ideapad-1-15amn7-xam-3.jpg', '11.490.000', 'k', 2, '  13.490.000', '0'),
(29, 'Laptop Lenovo IdeaPad 3 14IAU7 i5-1235U/8GB/512GB/14 1155G7/8Gb/256Gb/15.6\"FHD/Win 11', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/10/7/638007503320711896_lenovo-ideapad-3-14iau7-xanh-dd.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/10/7/638007503321192049_lenovo-ideapad-3-14iau7-xanh-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/10/7/638007503321111909_lenovo-ideapad-3-14iau7-xanh-3.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/10/7/638007504715222370_lenovo-ideapad-3-14iau7-xanh-1.jpg', '14.790.000', 'k', 2, '  17.790.000', '0'),
(30, 'Laptop Lenovo Ideapad 3 15ITL6 i5 1155G7/ 8Gb/256Gb/15.6/8Gb/256Gb/15.6', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/4/11/638168337649091937_lenovo-ideapad-3-15itl6-i5-1155g7-xam-dd.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/4/11/638168334502914355_lenovo-ideapad-3-15itl6-i5-1155g7-xam-3.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/4/11/638168334503017882_lenovo-ideapad-3-15itl6-i5-1155g7-xam-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/4/11/638168334503121129_lenovo-ideapad-3-15itl6-i5-1155g7-xam-5.jpg', '12.990.000', 'k', 2, '  13.690.000', '2.5'),
(31, 'Laptop Acer Swift 3 SF314-511-55QE i5 1135G7/16GB/512GB SSD/Win11 16GB/512GB SSD/Win11', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/1/22/637784626016113737_acer-swift-3-sf314-511-bac-dd.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/1/22/637784648681916953_acer-swift-3-sf314-511-bac-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/1/22/637784648681448154_acer-swift-3-sf314-511-bac-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/1/22/637784648681448154_acer-swift-3-sf314-511-bac-3.jpg', '17.690.000', 'k', 3, '  22.990.000', '0'),
(32, 'Laptop Acer Swift 3 SF314-43-R4X3 R5 5500U/16GB/512GB SSD/Win115500U/16GB/512GB SSD/Win11', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/18/637728602789371579_acer-swift-3-sf314-43-r4x3-r5-5500u-bac-dd.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2021/11/18/637728602870778442_acer-swift-3-sf314-43-r4x3-r5-5500u-bac-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2021/11/18/637728602878903567_acer-swift-3-sf314-43-r4x3-r5-5500u-bac-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2021/11/18/637728602845934423_acer-swift-3-sf314-43-r4x3-r5-5500u-bac-3.jpg', '16.990.000', 'l', 3, ' 20.990.000', '0'),
(33, 'Laptop Acer Swift X SFX16-51G-516Q i5 11320H/16GB/512GB/16.1\'FHD/GeForce RTX 3050 4GB/Win11', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/1/22/637784605210241029_acer-swift-x-sfx16-51g-xam-dd.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/1/22/637784613352577988_acer-swift-x-sfx16-51g-xam-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/1/22/637784613352265503_acer-swift-x-sfx16-51g-xam-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/1/22/637784613352265503_acer-swift-x-sfx16-51g-xam-3.jpg', '22.990.000', 'k', 3, '  28.990.000', '0'),
(34, 'Laptop Acer Nitro Gaming AN515-58-52SP i5 12500H/8GB/512GB/15.6\"FHD/GeForce RTX 3050 4GB/Win11', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/3/10/638140612136202106_acer-nitro-gaming-an515-58-dd.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/3/1/637817435466475076_acer-nitro-gaming-an515-58-den-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/3/1/637817435459912672_acer-nitro-gaming-an515-58-den-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/3/1/637817435465226004_acer-nitro-gaming-an515-58-den-3.jpg', '24.990.000', 'Không', 3, ' 27.990.000', '0'),
(35, 'MacBook Air 13\" 2020 M1 256GB MacBook Air 13\" 2020 M1 256GB MacBook Air 13\" 2020 M1 256GB', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/11/12/637407970062806725_mba-2020-gold-dd.png', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2020/11/12/637407982638531818_mba-2020-gray-1.png', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2020/11/12/637407982638531818_mba-2020-gray-2.png', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2020/11/12/637407982637907068_mba-2020-gray-3.png', '18.599.000', 'Không', 4, ' 26.999.000', '0'),
(36, 'MacBook Air M2 2022 13 inch 8CPU 8GPU 8GB 256GB MacBook Air M2 2022 13 inch 8CPU 8GPU 8GB 256GB', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/6/7/637901915720184032_macbook-air-m2-2022-den-dd.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/6/7/637902004646934076_macbook-air-m2-2022-xam-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/6/7/637902004645058985_macbook-air-m2-2022-xam-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/6/7/637902004647090217_macbook-air-m2-2022-xam-3.jpg', '25.790.000', 'Không', 4, ' 32.990.000', '0'),
(37, 'MacBook Pro 14 2023 M2 Pro 10CPU 16GPU 16GB/512GB MacBook Pro 14 2023 M2 Pro 10CPU 16GPU 16GB/512GB', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/1/18/638096308244034700_macbook-pro-14-2023-m2-pro-10cpu-16gpu-bac-dd.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/1/18/638096308248534090_macbook-pro-14-2023-m2-pro-10cpu-16gpu-bac-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/1/18/638096308247491998_macbook-pro-14-2023-m2-pro-10cpu-16gpu-bac-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/1/18/638096308245908475_macbook-pro-14-2023-m2-pro-10cpu-16gpu-bac-3.jpg', '48.290.000', 'Kohng', 4, ' 52.990.000', '0'),
(38, 'MacBook Air 13\" 2020 M1 16GB/256GB  MacBook Air 13\" 2020 M1 16GB/256GB MacBook Air 13\" 2020 M1 16GB/256GB ', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/11/12/637407970062806725_mba-2020-gold-dd.png', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2020/11/12/637407967465471535_mba-2020-gold-1.png', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2020/11/12/637407967465627818_mba-2020-gold-2.png', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2020/11/12/637407967465159041_mba-2020-gold-5.png', '26.499.000', 'K', 4, ' 33.999.000', '0'),
(39, 'Laptop MSI Modern 15 B13M-297VN i7 1355U/16GB/512GB/15.61355U/16GB/512GB/15.6 Win 11', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/3/9/638139833422255293_msi-modern-15-b13m-den-dd-icon.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/3/9/638139833422414375_msi-modern-15-b13m-den-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/3/9/638139833422414375_msi-modern-15-b13m-den-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/3/9/638139833421474178_msi-modern-15-b13m-den-3.jpg', '21.290.000', 'k', 10, '   21.990.000', '0'),
(40, 'Laptop Gigabyte Gaming G5 GE-51VN263SH i5 12500H/8GB/512GB/15.6\"FHD/GeForce RTX3050 4GB/Win11', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/4/25/638180152235601309_gigabyte-gaming-g5-ge-i5-12500h-rtx3050-dd-bh.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/10/5/638005617517738074_gigabyte-gaming-g5-ge-i5-12500h-rtx3050-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/10/5/638005617517738074_gigabyte-gaming-g5-ge-i5-12500h-rtx3050-2.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/10/5/638005617517020818_gigabyte-gaming-g5-ge-i5-12500h-rtx3050-3.jpg', '19.990.000', 'k', 11, ' 23.990.000', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `cmt_id` int(10) NOT NULL,
  `pr_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` int(10) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`cmt_id`, `pr_id`, `name`, `rating`, `comment`, `time`) VALUES
(127, 14, 'Admin', 5, 'Ổn', '2023-04-25 16:51:29'),
(128, 14, 'Admin', 5, 'Tốt', '2023-04-25 16:53:09'),
(129, 14, 'Chu Lợi', 4, 'Xấu', '2023-04-25 16:55:39'),
(130, 16, 'Admin', 5, 'Tốt', '2023-04-26 07:37:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slider_img` varchar(255) NOT NULL,
  `slider_img_mb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `order_content` text NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_order`
--

INSERT INTO `user_order` (`order_id`, `name`, `email`, `phone`, `address`, `order_content`, `total_price`) VALUES
(17, 'Chu Lợi', 'chuloicvlcvl190302@gmail.com', '0834051226', 'Ổ cứng: 512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB) Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1 TB)Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2 TB)', 'Laptop Asus Vivobook E1404FA-NK186W R5-7520U/16GB/512GB/14', '13.490.000 đ'),
(20, 'Chu Lợi', 'chuloicvlcvl190302@gmail.com', '0834051226', 'Ổ cứng: 512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB) Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1 TB)Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2 TB)', 'Laptop Asus Vivobook E1404FA-NK186W R5-7520U/16GB/512GB/14', '13.490.000 đ'),
(21, 'Chu Lợi', 'chuloicvlcvl190302@gmail.com', '0834051226', 'Ổ cứng: 512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB) Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1 TB)Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2 TB)', 'Laptop Asus Vivobook Pro N7401ZE-M9028W i7 12700H/16GB/512GB/14.5/GeForce RTX 3050 Ti 4GB/Win11(18)', '33.990.000 đ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Chỉ mục cho bảng `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_order`
--
ALTER TABLE `user_order`
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `blog_tag`
--
ALTER TABLE `blog_tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `cmt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
