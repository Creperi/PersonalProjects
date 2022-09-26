<?php
$host = "localhost:3308";
$username = "root";
$password = "";
$database = "bookshop";
$mysqli = new mysqli($host, $username, $password, $database);
if (!$mysqli) {
    die('Could not connect: ' . $mysqli->connect_error);
}
echo 'Connected successfully';
?>
