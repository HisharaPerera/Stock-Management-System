<?php
$conn = new mysqli("mysql.hostinger.in", "u663784695_hish", "hish@123", "u663784695_print");
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}
?>