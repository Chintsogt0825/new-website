<?php
session_start();

if (isset($_POST['num'])) {
    foreach ($_POST['num'] as $id => $qty) {
        if (isset($_SESSION['cart'][$id]) && is_array($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] = max(1, (int)$qty);
        }
    }
}

header('Location: cart.php');
?>
