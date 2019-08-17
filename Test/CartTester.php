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
$cart->addItem((new CartItem())->setProduct($products[0])->setQuantity(0));
$cart->addItem((new CartItem())->setProduct($products[1])->setQuantity(0));
$cart->addItem((new CartItem())->setProduct($products[2])->setQuantity(0));
$cart->addItem((new CartItem())->setProduct($products[3])->setQuantity(0));
var_dump($cart);

$cart->getItemByProduct($products[0])->setQuantity(2);
$cart->getItemByProduct($products[1])->setQuantity(7);
$cart->getItemByProduct($products[2])->setQuantity(3);
$cart->getItemByProduct($products[3])->setQuantity(4);
var_dump($cart);