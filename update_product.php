<?php
include_once('connect.php');

// Get product ID from URL
$product_id = $_GET['id'];

if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $category = $_POST['category'];

    // Update product in database
    $sql = "UPDATE product SET product_name='$product_name', product_price='$product_price', category='$category' WHERE Product_ID='$product_id'";
    if ($db_connect->query($sql)) {
        echo "<script>alert('Product updated successfully!'); window.location.href='product_list.php';</script>";
    } else {
        echo "<script>alert('Error updating product.');</script>";
    }
}

// Fetch product data to pre-fill the form
$sql = "SELECT * FROM product WHERE Product_ID='$product_id'";
$query = $db_connect->query($sql);
$product = $query->fetch_array(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
</head>
<body>

<h2>Update Product</h2>

<form method="post">
    <label for="product_name">Product Name:</label><br>
    <input type="text" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>" required><br><br>

    <label for="product_price">Price:</label><br>
    <input type="text" id="product_price" name="product_price" value="<?php echo $product['product_price']; ?>" required><br><br>

    <label for="category">Category:</label><br>
    <input type="text" id="category" name="category" value="<?php echo $product['category']; ?>" required><br><br>

    <input type="submit" name="submit" value="Update Product">
</form>

</body>
</html>
