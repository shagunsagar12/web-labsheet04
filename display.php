<?php
require 'db.php';

$stmt = $conn->query("SELECT * FROM students");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Records</title>

<style>
table {
    border-collapse: collapse;
    width: 80%;
    margin: 30px auto;
}

th, td {
    border: 1px solid black;
    padding: 12px;
    text-align: center;
}

th {
    background-color: lightblue;
}
</style>
</head>

<body>

<h2 align="center">Student Records</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Enrollment Date</th>
</tr>

<?php foreach ($students as $row) { ?>

<tr>
    <td><?= htmlspecialchars($row['id']) ?></td>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= htmlspecialchars($row['email']) ?></td>
    <td><?= htmlspecialchars($row['enrollment_date']) ?></td>
</tr>

<?php } ?>

</table>
</body>
</html>