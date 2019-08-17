<?php

function loadProducts($path) {
    $products = json_decode(file_get_contents($path), true);

    foreach ($products as &$product) {
        $product = new Product($product["id"], $product["name"], $product["price"], $product["megapack"]);
    }

    return $products;
}