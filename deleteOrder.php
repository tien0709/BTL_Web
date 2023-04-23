<?php

$product_ID = $_POST["products_id"];

$cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
$cart = json_decode($cart);

$new_cart = array();
foreach ($cart as $c)
{
    if ($c->product_ID != $product_ID)
    {
        array_push($new_cart, $c);
    }
}

if (empty($new_cart)){
    setcookie("cart", "", time() + (60 * 15), "/");
    header("Location: cart.php");
} else{
    setcookie("cart", json_encode($new_cart), time() + (60 * 15), "/");
    header("Location: cart.php");
}



?>