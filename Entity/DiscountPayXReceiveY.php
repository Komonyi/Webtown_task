<?php

class DiscountPayXReceiveY implements DiscountInterface {

    private $payAmount;
    private $receiveAmount;

    public function __construct($payAmount, $receiveAmount) {
        $this->payAmount = $payAmount;
        $this->receiveAmount = $receiveAmount;
    }

    public function calculateDiscount($cart) {
        if ($this->receiveAmount == 0 || $this->receiveAmount < $this->payAmount) return 0;

        $totalDiscountAmount = 0;

        foreach ($cart->getItems() as $item) {
            $totalDiscountAmount += floor($item->getQuantity() / $this->receiveAmount) * $item->getProduct()->getPrice() * ($this->receiveAmount - $this->payAmount);
        }

        return $totalDiscountAmount;
    }
}