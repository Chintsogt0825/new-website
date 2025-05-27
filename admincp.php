<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user"]) || !isset($_SESSION["pass"])) {
    // If not logged in, redirect to login page
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control Panel</title>
    <link rel="stylesheet" type="text/css" href="admincp.css" />
</head>

<body>

    <div class="wrapper">
        <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
            <!-- Header -->
            <tr>
                <td colspan="2" id="header">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td rowspan="2"><img src="images/admincp-logo.png" alt="Admin Logo" /></td>
                            <td><img src="images/admincp-banner.png" alt="Admin Banner" /></td>
                        </tr>
                        <tr>
                            <td height="30px" id="navbar">
                                <table height="30px" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td><a href="#">Home</a></td>
                                        <td><a href="#">Introduction</a></td>
                                        <td><a href="#">Contact</a></td>
                                        <td><a href="#">Confirm</a></td>
                                        <td><a href="#">Help</a></td>
                                        <td><a href="#">Overview</a></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr height="31px">
                            <td colspan="2" id="line-header"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- End Header -->

            <!-- Body -->
            <tr id="body">
                <td align="left" valign="top" width="250px">
                    <!-- Left Menu -->
                    <table width="250px" class="left-menu" border="0" cellpadding="0" cellspacing="0">
                        <tr class="bg-leftbar" height="36px">
                            <td>Menu</td>
                        </tr>
                        <tr class="menu-item" height="30px">
                            <td><a href="#">Home</a></td>
                        </tr>
                        <tr class="menu-item" height="30px">
                            <td><a href="#">Main Category Control</a></td>
                        </tr>
                        <tr class="menu-item" height="30px">
                            <td><a href="#">Subcategory Control</a></td>
                        </tr>
                        <tr class="menu-item" height="30px">
                            <td><a href="product_list.php" target="content-frame">Product Control</a></td>
                        </tr>
                        <tr class="menu-item" height="30px">
                            <td><a href="#">User Control</a></td>
                        </tr>
                        <tr height="30px">
                            <td></td>
                        </tr>
                    </table>
                    <!-- End Left Menu -->

                    <!-- User -->
                    <table width="250px" class="left-menu" border="0" cellpadding="0" cellspacing="0">
                        <tr class="bg-leftbar" height="36px">
                            <td>Login Information</td>
                        </tr>
                        <tr height="30px">
                            <td id="user-info">Hello <b><?php echo $_SESSION["user"]; ?></b>, successfully logged in to the Administration Panel!</td>
                        </tr>
                        <tr height="30px">
                            <td id="logout" align="right"><a href="dangxuat.php">Logout</a></td>
                        </tr>
                    </table>
                    <!-- End User -->
                </td>

                <td align="left" valign="top" width="650px">
                    <!-- Main Content -->
                    <table width="640px" id="main-content" border="0" cellpadding="0" cellspacing="0">
                        <tr id="main-navbar" height="36px">
                            <td colspan="6">Introduction</td>   
                        </tr>
                        <tr>
                            <td align="justify" id="info">Welcome to the Control Panel.</td>
                        </tr>
                    </table>
                    <!-- End Main Content -->
                </td>
            </tr>
            <!-- End Body -->
        </table>

        <!-- Footer -->
        <footer>
            <p>Web-based programming example 2024. All rights reserved.</p>
        </footer>
        <!-- End Footer -->
    </div>

</body>

</html>
