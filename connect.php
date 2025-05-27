<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appleshop";

// Create connection
$db_connect = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db_connect->connect_error) {
    die("Connection failed: " . $db_connect->connect_error);
}
?>
