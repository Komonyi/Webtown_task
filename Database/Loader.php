<?php

include_once("Entity/Product.php");

function loadProducts() {
    $products = json_decode(file_get_contents("Database/Products.json"), true);

    foreach ($products as &$product) {
        $product = new Product($product["id"], $product["name"], $product["price"], $product["megapack"]);
    }

    return $products;
}