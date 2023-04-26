<?php 
require_once "./Connect.php";

if (isset($_POST["submit"])){
    $blog_title = $_POST["blog_title"];
    $blog_tag = $_POST["blog_tag"];
    $content = $_POST["content"];
    $time = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh') );
    $date = $time ->format('Y-m-d');
    $imgName = $_FILES["thumbnail"]["name"];
    $tmpname = $_FILES["thumbnail"]["tmp_name"];
    $des = "./thumbnail/".$imgName;
    move_uploaded_file($tmpname, $des);

    $query = 'INSERT INTO blog (blog_title, blog_tag, blog_img, blog_content, date) VALUES (:title, :tag, :img, :content, :date)';
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':title', $blog_title);
    $stmt->bindParam(':tag', $blog_tag);
    $stmt->bindParam(':img', $des);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':date', $date);

    if ($stmt->execute()) {
        header("Location: ./blogManage.php");
        exit;
    } else {
        // handle error
        echo "Error inserting blog post.";
    }
}
