<?php

$product_ID = $_POST["products_id"];
$quantity = $_POST["quantity"];

$cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
$cart = json_decode($cart);



foreach ($cart as $c)
{
    if ($c->product_ID == $product_ID)
    {
        $c->quantity = $quantity;
    }
}

setcookie("cart", json_encode($cart), time() + (60 * 15), "/");
header("Location: cart.php");