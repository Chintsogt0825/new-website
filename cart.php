<?php
session_start();
$total_all = 0;

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $arr_id = array_keys($_SESSION['cart']);

    include_once('connect.php');
    $str_id = implode(',', $arr_id);
    $sql = "SELECT * FROM product WHERE product_id IN ($str_id) ORDER BY product_id ASC";
    $query = $db_connect->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Shopping Cart</title>
    <style>
        table { width: 80%; margin: auto; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        a.del { background: #dc3545; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; }
        button { padding: 10px 20px; margin-top: 10px; }
    </style>
</head> 
<body>

<h2 style="text-align:center;">Your Cart</h2>

<form method="post" action="update_cart.php">
<table>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Image</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>Delete</th>
    </tr>

<?php while ($row = $query->fetch_array(MYSQLI_ASSOC)) { 
    $product_id = $row['product_id'];
    $cart_item = $_SESSION['cart'][$product_id];

    $quantity = is_array($cart_item) ? $cart_item['quantity'] : $cart_item;
    $subtotal = $row['product_price'] * $quantity;
    $total_all += $subtotal;
?>
    <tr>
        <td><?php echo htmlspecialchars($row['product_name']); ?></td>
        <td>$<?php echo $row['product_price']; ?></td>
        <td><?php echo htmlspecialchars($row['category']); ?></td>
        <td><img src="images/img-thumb.jpg" width="50" /></td>
        <td>
            <input type="number" name="num[<?php echo $product_id; ?>]" value="<?php echo $quantity; ?>" min="1" />
        </td>
        <td>$<?php echo $subtotal; ?></td>
        <td>
            <a class="del" href="delcart.php?id=<?php echo $product_id; ?>">Delete</a>
        </td>
    </tr>
<?php } ?>

    <tr>
        <td colspan="5" align="right"><strong>Total:</strong></td>
        <td colspan="2">$<?php echo $total_all; ?></td>
    </tr>
</table>

<div style="text-align:center; margin:20px;">
    <button type="submit">Update Cart</button>
    <a href="index_cart.php" style="margin-left:20px;">Continue Shopping</a>
    <a href="checkout.php" style="margin-left:20px; padding: 8px 15px; background: #28a745; color: white; text-decoration: none; border-radius: 4px;">Checkout</a>
</div>

</form>

</body>
</html>

<?php 
} else {
    echo "<h3 style='text-align:center;'>Your cart is empty. <a href='index_cart.php'>Shop now</a></h3>";
}
?>
