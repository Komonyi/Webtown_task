<?php

include_once("../Database/Loader.php");
include_once("../Entity/Cart.php");
include_once("../Entity/CartItem.php");
include_once("../Entity/Product.php");
include_once("../Entity/DiscountInterface.php");
include_once("../Entity/DiscountMegapack.php");
include_once("../Entity/DiscountPayxReceiveY.php");

$products = loadProducts("../Database/Products.json");
var_dump($products);

$cart = new Cart();
$cart->addItem((new CartItem())->setProduct($products[0])->setQuantity(12));
$cart->addItem((new CartItem())->setProduct($products[1])->setQuantity(25));
$cart->addItem((new CartItem())->setProduct($products[2])->setQuantity(12));
$cart->addItem((new CartItem())->setProduct($products[3])->setQuantity(25));
var_dump($cart);

$discounts = [];
$discounts[] = new DiscountMegapack(6000, 12);
$discounts[] = new DiscountPayxReceiveY(2, 3);

var_dump($discounts[0]->calculateDiscount($cart));
var_dump($discounts[1]->calculateDiscount($cart));