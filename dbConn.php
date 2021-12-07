<?php

$servername = "localhost";
$dbname = "bpt";
$conn;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", "root");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Database Connection failed: " . $e->getMessage();
}


?>