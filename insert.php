<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];

    $sql = "INSERT INTO students
            (name, email, enrollment_date)
            VALUES (:name, :email, :date)";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':date' => $date
    ]);

    echo "Student Inserted Successfully!";
}
?>

<h2>Insert Student</h2>

<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Date: <input type="date" name="date" required><br><br>

    <button type="submit">Insert Student</button>
</form>