<?php 
require_once "./Connect.php";
$blog_id = $_GET["blog_id"];

$stmt = $conn->prepare('DELETE FROM blog WHERE blog_id ="'.$blog_id.'"');
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
header("Location: ./blogManage.php");
?>