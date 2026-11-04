<?php
require 'db.php';

try {

    $conn->beginTransaction();

    // Insert student
    $stmt = $conn->prepare(
        "INSERT INTO students (name, email, enrollment_date)
         VALUES (?, ?, ?)"
    );

    $stmt->execute([
        'Rahul',
        'rahul@gmail.com',
        date('Y-m-d')
    ]);

    $student_id = $conn->lastInsertId();

    // Insert payment
    $stmt = $conn->prepare(
        "INSERT INTO payments (student_id, amount)
         VALUES (?, ?)"
    );

    $stmt->execute([$student_id, 5000]);

    $conn->commit();

    echo "Transaction Completed Successfully!";

} catch (Exception $e) {

    if ($conn->inTransaction()) {
        $conn->rollBack();
    }

    echo "Transaction Failed: " . $e->getMessage();

}

?>