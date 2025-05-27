<?php
error_reporting(0);
session_start();

// Handle login form submission
if (isset($_POST["submit_name"])) {
    if (!empty($_POST["user"]) && !empty($_POST["pass"])) {
        $user = $_POST["user"];
        $pass = $_POST["pass"];

        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "appleshop";

        // Connect to MySQL
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Correct SQL syntax (missing SELECT *)
        $sql = "SELECT * FROM member WHERE account = '$user' AND password = '$pass'";
        $query = $conn->query($sql);

        // Debug: Show result count (optional)
        // echo $query->num_rows;

        if ($query->num_rows > 0) {
            $_SESSION["user"] = $user;
            $_SESSION["pass"] = $pass;
            header("Location: admincp.php");
            exit();
        } else {
            echo "<script>alert('Invalid account!')</script>";
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

<?php
if (!isset($_SESSION["user"]) || !isset($_SESSION["pass"])) {
?>

<!-- Login Form -->
<form method="post" action="">
    <table id="login-main" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td id="login-navbar" height="36px" colspan="2">Administration Control Panel</td>
        </tr>
        <tr height="100px">
            <td id="login-key" rowspan="3" width="200px" align="center" valign="middle">
                <img src="images/login key.png" />
            </td>
            <td class="login-input">Account<br />
                <input type="text" name="user" required>
            </td>
        </tr>
        <tr height="50px">
            <td class="login-input">Password<br />
                <input type="password" name="pass" required>
            </td>
        </tr>
        <tr height="50px">
            <td id="login-button">
                <input type="submit" name="submit_name" value="Login">
                <input type="reset" value="Refresh">
            </td>
        </tr>
    </table>
</form>

<?php
} else {
    // Already logged in
    header("Location: admincp.php");
    exit();
}
?>

</body>
</html>
