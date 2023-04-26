<?php
    $id = $_GET['id'];
    $mysqli = new mysqli("localhost","root","","webbanlap");
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    $sql = "DELETE FROM account where id = $id";
    $query = mysqli_query($mysqli, $sql);
    if (!$query) {
        die('Error executing query: ' . mysqli_error($mysqli));
    }
    mysqli_close($mysqli);
    header('Location: user.php?page_user=danhsach');
?>
