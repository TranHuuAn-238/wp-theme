<?php
class WP_Cart {
    public function __construct() {
        add_action('init', [$this, 'myStartSession']);
    }

    public function myStartSession() {
        if (!session_id()) {
            session_start();
        }
    }

    public function getCart() {
        return $_SESSION['cart'];
    }

    public function getFragments() {
        $cart = $_SESSION['cart'];
        return [
            'cart_count' => count($cart),
            'cart_total' => array_sum($cart),
        ];
    }

    public function addToCart($product_id, $quantity) {
        $cart = $_SESSION['cart'];
        if (isset($cart[$product_id])) {
            $cart[$product_id] = $cart[$product_id] + $quantity;
        } else {
            $cart[$product_id] = $quantity;
        }
        $_SESSION['cart'] = $cart;
    }

    public function removeProductFromCart($product_id) {
        $cart = $_SESSION['cart'];
        unset($cart[$product_id]);
        $_SESSION['cart'] = $cart;
    }
}

global $cart;
$cart = new WP_Cart();