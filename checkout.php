<?php
session_start();

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<h3 style='text-align:center;'>Your cart is empty. <a href='index_cart.php'>Shop now</a></h3>";
    exit;
}

$total_all = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <style>
        table { width: 80%; margin: auto; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        form { width: 50%; margin: 20px auto; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="email"], textarea {
            width: 100%; padding: 8px; margin-top: 5px;
            box-sizing: border-box;
        }
        button {
            margin-top: 15px; padding: 10px 20px; background: #28a745; color: white;
            border: none; cursor: pointer; border-radius: 4px;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Checkout</h2>

<table>
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>
    <?php foreach ($_SESSION['cart'] as $id => $item): 
        $subtotal = $item['price'] * $item['quantity'];
        $total_all += $subtotal;
    ?>
    <tr>
        <td><?php echo htmlspecialchars($item['name']); ?></td>
        <td>$<?php echo number_format($item['price'], 2); ?></td>
        <td><?php echo $item['quantity']; ?></td>
        <td>$<?php echo number_format($subtotal, 2); ?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="3" style="text-align:right;"><strong>Total:</strong></td>
        <td><strong>$<?php echo number_format($total_all, 2); ?></strong></td>
    </tr>
</table>

<form action="process_checkout.php" method="post">
    <h3>Your Information</h3>
    <label for="name">Full Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Email Address:</label>
    <input type="email" name="email" id="email" required>

    <label for="address">Shipping Address:</label>
    <textarea name="address" id="address" rows="4" required></textarea>

    <button type="submit">Place Order</button>
</form>

</body>
</html>
