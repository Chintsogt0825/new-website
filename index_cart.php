<?php
session_start();
include_once('connect.php');

$sql = "SELECT * FROM product";
$query = $db_connect->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shop - Product List</title>
    <style>
        table { width: 80%; margin: auto; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        a.add { background: #28a745; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; }
        img {height: 50px; width: auto;}
    </style>
</head>
<body>

<h2 style="text-align:center;">Available Products</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Image</th>
        <th>Buy</th>
    </tr>

    <?php while ($row = $query->fetch_array(MYSQLI_ASSOC)) { ?>
    <tr>
        <td><?php echo $row['product_name']; ?></td>
        <td>$<?php echo $row['product_price']; ?></td>
        <td><?php echo $row['category']; ?></td>
        <td><img src="images/img-thumb.jpg" alt="" /></td>
        <td><a class="add" href="addcart.php?id=<?php echo $row['product_id']; ?>">Add to Cart</a></td>
    </tr>
    <?php } ?>

</table>
<div style="text-align:center; margin: 20px;">
    <a href="product_list.php" style="text-decoration:none; background:#007bff; color:white; padding:10px 20px; border-radius:5px;">Go Back</a>
</div>


</body>
</html>
