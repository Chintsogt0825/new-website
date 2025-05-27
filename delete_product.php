<?php
include_once('connect.php');

// Get product ID from URL
$product_id = $_GET['id'];

// Delete product from database
$sql = "DELETE FROM product WHERE Product_ID='$product_id'";
if ($db_connect->query($sql)) {
    echo "<script>alert('Product deleted successfully!'); window.location.href='product_list.php';</script>";
} else {
    echo "<script>alert('Error deleting product.');</script>";
}
?>
