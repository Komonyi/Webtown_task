<?php

class DiscountMegapack implements DiscountInterface {
    
    private $discountAmount;
    private $megapackAmount;

    function __construct($discountAmount, $megapackAmount) {
        $this->discountAmount = $discountAmount;
        $this->megapackAmount = $megapackAmount;
    }

    public function getName() {
        return "MegaPack kedvezmeny";
    }

    public function calculateDiscount($cart) {
        $totalDiscountAmount = 0;

        foreach ($cart->getItems() as $item) {
            if ($item->getProduct()->getMegapack()) {
                $totalDiscountAmount += floor($item->getQuantity() / $this->megapackAmount) * $this->discountAmount;
            }
        }

        return $totalDiscountAmount;
    }
}