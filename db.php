<?php
$servername = "127.0.0.1:3306"; 
$username = "root";       
$password = "mariadb"; 
$dbname = "beauty_bliss"; 

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>