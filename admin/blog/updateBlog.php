<?php 
require_once "./Connect.php";

if (isset($_POST["submit"])){
    $blog_id = $_POST["blog_id"];
    $blog_title = $_POST["blog_title"];
    $blog_tag = $_POST["blog_tag"];
    $content = $_POST["content"];
    $time = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh') );
    $date = $time ->format('Y-m-d');
    $imgName = $_FILES["thumbnail"]["name"];
    $tmpname = $_FILES["thumbnail"]["tmp_name"];
    $des = "./thumbnail/".$imgName;
    move_uploaded_file($tmpname, $des);

    $stmt = $conn->prepare('UPDATE blog SET blog_title= :blog_title, blog_tag= :blog_tag,  blog_img= :blog_img , blog_content= :blog_content, date= :date WHERE blog_id="'.$blog_id.'"');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute(array(
        "blog_title"=>$blog_title,
        "blog_tag"=>$blog_tag,
        "blog_img"=>$des,
        "blog_content"=>$content,
        "date"=>$date
    ));
    header("Location: ./blogManage.php");
    
}