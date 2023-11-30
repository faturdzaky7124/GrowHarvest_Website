<?php
$db_host = "localhost";
$db_user = "growharv_db";
$db_password = "growrajawali";
$db_name = "growharv_db";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
