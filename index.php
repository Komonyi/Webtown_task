<?php

include_once("Database/Loader.php");
include_once("Entity/Cart.php");
include_once("Entity/CartItem.php");
include_once("Entity/Product.php");
include_once("Entity/DiscountInterface.php");
include_once("Entity/DiscountMegapack.php");
include_once("Entity/DiscountPayxReceiveY.php");
include_once("Form/CartForm.php");

$products = loadProducts("Database/Products.json");

$cart = new Cart();
$cart->addItem((new CartItem())->setProduct($products[0])->setQuantity(0));
$cart->addItem((new CartItem())->setProduct($products[1])->setQuantity(0));
$cart->addItem((new CartItem())->setProduct($products[2])->setQuantity(0));
$cart->addItem((new CartItem())->setProduct($products[3])->setQuantity(0));

$cartForm = new CartForm($cart);
$cartForm->handleRequest();
$cartForm->displayForm();

$discounts = [];
$discounts[] = new DiscountMegapack(6000, 12);
$discounts[] = new DiscountPayxReceiveY(2, 3);

$bestDiscount = null;
$bestDiscountPrice = 0;
foreach ($discounts as $discount) {
    $currentDiscountPrice = $discount->calculateDiscount($cart);

    if ($currentDiscountPrice > 0 && ($currentDiscountPrice > $bestDiscountPrice)) {
        $bestDiscount = $discount;
        $bestDiscountPrice = $currentDiscountPrice;
    }
}

echo "<p>Kosar eredeti ara: " . $cart->getPrice() . " Ft</p>";

if ($bestDiscount) {
    echo "<p>Kedvezmeny neve: " . $bestDiscount->getName() . "</p>";
    echo "<p>Kedvezmeny erteke: " . $bestDiscountPrice . " Ft</p>";
    echo "<p>Kosar vegso ara: " . ($cart->getPrice() - $bestDiscountPrice) . " Ft</p>";
} else {
    echo "<p>Nincs kedvezmeny</p>";
}