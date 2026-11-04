<?php
require 'db.php';

$stmt = $conn->query("SELECT * FROM students");

header('Content-Type: text/csv');

header('Content-Disposition: attachment; filename="students.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, ['ID', 'Name', 'Email', 'Enrollment Date']);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    fputcsv($output, $row);

}

fclose($output);

exit;
?>