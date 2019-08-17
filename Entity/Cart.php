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
}