<?php

class CartItem {

    private $product;
    private $quantity;

    public function getProduct() {
        return $this->product;
    }

    public function setProduct($product) {
        $this->product = $product;
        return $this;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
        return $this;
    }

    public function getPrice() {
        return $this->product->getPrice() * $this->getQuantity();
    }
}