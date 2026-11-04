<?php

echo "<h2>Server Information</h2>";

echo "Server Name: " . $_SERVER['SERVER_NAME'] . "<br>";

echo "Server Software: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";

echo "Server Port: " . $_SERVER['SERVER_PORT'] . "<br>";

echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "<br>";

echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

echo "PHP Version: " . phpversion();

?>