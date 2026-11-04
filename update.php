<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $email = $_POST['email'];

    $sql = "UPDATE students SET email = :email WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':email' => $email,
        ':id' => $id
    ]);

    echo "Student Email Updated Successfully!";
}
?>

<h2>Update Student Email</h2>

<form method="POST">

    Student ID:
    <input type="number" name="id" required><br><br>

    New Email:
    <input type="email" name="email" required><br><br>

    <button type="submit">Update</button>

</form>