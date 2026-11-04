<?php

$host = "localhost";
$dbname = "college_db";
$username = "root";
$password = "";

try {

    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    echo "Database Connected Successfully!";

} catch(PDOException $e) {

    die("Connection Failed: " . $e->getMessage());

}
?>