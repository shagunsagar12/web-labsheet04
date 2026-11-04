<?php
require 'db.php';

$message = "";

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password
    $hashedPassword = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    $stmt = $conn->prepare(
        "INSERT INTO secure_users (username, password)
         VALUES (?, ?)"
    );

    try {

        $stmt->execute([$username, $hashedPassword]);

        $message = "Registration Successful!";

    } catch (PDOException $e) {

        $message = "Registration Failed! Username may already exist.";

    }
}

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare(
        "SELECT password FROM secure_users WHERE username = ?"
    );

    $stmt->execute([$username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

        $message = "Login Successful!";

    } else {

        $message = "Invalid Username or Password!";

    }
}

?>

<h2>Secure User Authentication</h2>

<h3>Register</h3>

<form method="POST">

    Username:
    <input type="text" name="username" required><br><br>

    Password:
    <input type="password" name="password" required><br><br>

    <button type="submit" name="register">Register</button>

</form>

<hr>

<h3>Login</h3>

<form method="POST">

    Username:
    <input type="text" name="username" required><br><br>

    Password:
    <input type="password" name="password" required><br><br>

    <button type="submit" name="login">Login</button>

</form>

<h3><?= htmlspecialchars($message) ?></h3>