<?php

include_once("../Entity/Product.php");

$prod = new Product(12, "Esernyo", 57347, true);

if ($prod->getId() != 12) exit(1);
if ($prod->getName() != "Esernyo") exit(1);
if ($prod->getPrice() != 57347) exit(1);
if ($prod->getMegapack() != true) exit(1);

$prod->setId(23);
$prod->setName("Sajt");
$prod->setPrice(8563);
$prod->setMegapack(false);

if ($prod->getId() != 23) exit(1);
if ($prod->getName() != "Sajt") exit(1);
if ($prod->getPrice() != 8563) exit(1);
if ($prod->getMegapack() != false) exit(1);

echo "Entity:Product test done, no error";