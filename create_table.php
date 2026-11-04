<?php
require 'db.php';

$sql = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    enrollment_date DATE NOT NULL
)";

$conn->exec($sql);

echo "<h2>Students Table Created Successfully!</h2>";
?>