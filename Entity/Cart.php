<?php

class Cart {

    private $items = [];

    public function addItem($item) {
        $this->items[] = $item;
        return $this;
    }

    //TODO
    public function removeItem() {}

    public function &getItemByProduct($product) {
        foreach ($this->items as &$item) {
            if ($item->getProduct() == $product) {
                return $item;
            }
        }

        return null;
    }

    public function getItems() {
        return $this->items;
    }

    public function getPrice() {
        $totalPrice = 0;

        foreach ($this->items as $item) {
            $totalPrice += $item->getPrice();
        }

        return $totalPrice;
    }


}