<?php

class CartForm {

    private $cart;

    public function __construct(&$cart) {
        $this->cart = $cart;
    }

    public function handleRequest() {
        if (isset($_POST["cart-form-submit"])) {
            foreach ($this->cart->getItems() as $index => &$item) {
                if ((int)$_POST["item-" . $index] >= 0) {
                    $item->setQuantity($_POST["item-" . $index]);
                }
            }
        }
    }

    public function displayForm() {
        ?>
        <form method="post">
        <?php

        foreach ($this->cart->getItems() as $index => $item) {
            ?>
            <p>
                <span style="font-weight: bold;"><?php echo $item->getProduct()->getName() ?>:</span>
                <input type="number" name="item-<?php echo $index ?>" value="<?php echo $item->getQuantity() ?>" /> 
            </p>
            <?php
        }
        ?>
            <input type="submit" name="cart-form-submit" value="Kosar frissites" />
        </form>
        <?php
    }
}