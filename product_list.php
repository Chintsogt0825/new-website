<?php
include_once('connect.php');

// Check $_GET['page']
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

// Set the maximum number of records per page
$max_result = 5;

// Find the index of the first record
$index_row = ($page - 1) * $max_result;

// List data
$sql = "SELECT * FROM product LIMIT $index_row, $max_result";
$query = $db_connect->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Product List</title>
    <link rel="stylesheet" href="product_list.css">

</head>
<body>

<a href="index_cart.php" style="display:inline-block; padding:10px 20px; background:#28a745; color:#fff; text-decoration:none; margin:10px 0; border-radius:4px;">Go to Customer View</a>

<!-- Back to AdminCP Button -->
<a href="admincp.php"><button>Back to AdminCP</button></a>

<!-- Add More Product Button -->
<a href="add_product.php"><button>Add More Product</button></a>

<!-- Product List Table -->
<table width="640px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">


    <tr id="main-navbar" height="36px">
        <th colspan="6"><p>PRODUCT LIST</p></th>
    </tr>

    <!-- Product Column Header -->
    <tr height="30px" id="navbar-title">
        <td width="30%">Product Name</td>
        <td width="15%">Price</td>
        <td width="20%">Category</td>
        <td width="25%">Image</td>
        <td width="5%">Update</td>
        <td width="5%">Delete</td>
    </tr>

    <!-- Product Items -->
    <?php
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
    ?>
    <tr class="product-item">
        <td class="text"><?php echo $row['product_name']; ?></td>
        <td class="red text"><?php echo $row['product_price']; ?></td>
        <td class="text"><?php echo $row['category']; ?></td>
        <td class="img"><img src="images/img-thumb.jpg" /></td>
        <td class="link"><a href="update_product.php?id=<?php echo $row['product_id']; ?>">Update</a></td>
        <td class="link"><a href="delete_product.php?id=<?php echo $row['product_id']; ?>" class="red">Delete</a></td>
    </tr>
    <?php
    }

    // Pagination Logic
    $total_row = $db_connect->query("SELECT * FROM product")->num_rows;
    $total_page = ceil($total_row / $max_result);

   $list_page = '';

   // Prev button
   $prev = $page - 1;
   if ($page > 1) {
      $list_page .= "<a class='page-btn' href='".$_SERVER['PHP_SELF']."?page=$prev'>Previous</a>";
   }

   // Page numbers
   for ($i = 1; $i <= $total_page; $i++) {
      if ($page == $i) {
         $list_page .= "<b class='current-page'>$i</b>";
      } else {
         $list_page .= "<a class='page-btn' href='".$_SERVER['PHP_SELF']."?page=$i'>$i</a>";
      }
   }

   // Next button
   $next = $page + 1;
   if ($page < $total_page) {
      $list_page .= "<a class='page-btn' href='".$_SERVER['PHP_SELF']."?page=$next'>Next</a>";
   }

    ?>

</table>
<!-- Pagination below table -->
   <div class="pagination">
      <?php echo $list_page; ?>
   </div>
</body>
</html>
