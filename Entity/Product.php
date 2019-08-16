<?php

class Product {

    private $id;
    private $name;
    private $price;
    private $megapack;

    public function __construct($id, $name, $price, $megapack) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->megapack = $megapack;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    public function getMegapack() {
        return $this->megapack;
    }

    public function setMegapack($megapack) {
        $this->megapack = $megapack;
        return $this;
    }

}

?>