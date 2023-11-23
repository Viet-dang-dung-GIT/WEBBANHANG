<?php
    session_start();
    $cart = $_SESSION['cart'] ?? [];
    $id = $_GET['id'];
    for($i = 0; $i < count($cart); $i++) {
        if($cart[$i]['id'] == $id) {
            array_splice($cart, $i, 1);
            break;
        }
    }
    $_SESSION['cart'] = $cart;
    header('location: ./cart.php');
?>