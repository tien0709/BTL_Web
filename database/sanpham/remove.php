<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM products where products_id = $id";
    $query = mysqli_query($mysqli, $sql);
    header('Location: sanpham.php?page_layout=list');
?>
