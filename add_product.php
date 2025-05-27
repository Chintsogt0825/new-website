<?php
include_once('connect.php');

// Check if form is submitted
if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $category = $_POST['category'];

    // Insert product into database
    $sql = "INSERT INTO product (product_name, product_price, category) VALUES ('$product_name', '$product_price', '$category')";
    if ($db_connect->query($sql)) {
        echo "<script>alert('Product added successfully!'); window.location.href='product_list.php';</script>";
    } else {
        echo "<script>alert('Error adding product.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>

<h2>Add New Product</h2>

<form method="post">
    <label for="product_name">Product Name:</label><br>
    <input type="text" id="product_name" name="product_name" required><br><br>

    <label for="product_price">Price:</label><br>
    <input type="text" id="product_price" name="product_price" required><br><br>

    <label for="category">Category:</label><br>
    <input type="text" id="category" name="category" required><br><br>

    <input type="submit" name="submit" value="Add Product">
</form>

</body>
</html>
