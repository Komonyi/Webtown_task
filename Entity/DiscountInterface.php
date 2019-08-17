<?php

interface DiscountInterface {
    public function getName();
    public function calculateDiscount($cart);
}