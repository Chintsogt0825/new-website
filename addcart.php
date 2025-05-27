<?php
session_start();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    // Invalid product id, redirect or show error
    header('Location: index_cart.php');
    exit;
}

$id = (int)$_GET['id'];

include_once('connect.php');

// Use prepared statement to avoid SQL injection
$stmt = $db_connect->prepare("SELECT product_name, product_price FROM product WHERE product_id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($product = $result->fetch_assoc()) {
    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = [
            'name' => $product['product_name'],
            'price' => $product['product_price'],
            'quantity' => 1
        ];
    } else {
        $_SESSION['cart'][$id]['quantity']++;
    }
}

$stmt->close();
header('Location: cart.php');
exit;
?>
