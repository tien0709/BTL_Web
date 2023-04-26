<?php

require_once "./Connect.php";
$cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
$cart = json_decode($cart);

$name = $_POST["name"];
$address = $_POST["address"];
$order = $_POST["order"];
$email = $_POST["email"];
$total_price = $_POST["total_price"];  

$error = array();



if (isset($_POST["phone"])) {
    $phone = $_POST["phone"];
    if ((strlen($phone) != 10)) {
        $error["phone"] = "Số điện thoại không hợp lệ";
    }
}

if (sizeof($error)) {
    require_once './cart.php';
} else {
    $sql = 'INSERT INTO user_order (name,email, phone,address,order_content,total_price) VALUE ("'.$name.'","'.$email.'","'.$phone.'","'.$address.'","'.$order.'","'.$total_price.'")';
    $conn->exec($sql);

    setcookie("cart", "", time() + (60 * 15), "/");


    header("Location: ./index.php");
}




