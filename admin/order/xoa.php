<?php
    $id = $_GET['id'];
    $mysqli = new mysqli("localhost","root","","webbanlap");
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    $sql = "DELETE FROM user_order where order_id = $id";
    $query = mysqli_query($mysqli, $sql);
    if (!$query) {
        die('Error executing query: ' . mysqli_error($mysqli));
    }
    mysqli_close($mysqli);
    header('Location: donhang.php?page_order=danhsach');
?>
