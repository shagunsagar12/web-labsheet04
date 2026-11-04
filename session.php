<?php

session_start();

if (isset($_POST['login'])) {

    $_SESSION['username'] = $_POST['username'];

    echo "Session Created Successfully!";
}

if (isset($_GET['logout'])) {

    session_unset();
    session_destroy();

    header("Location: session.php");
    exit;
}

?>

<h2>Session Management</h2>

<?php if (isset($_SESSION['username'])) { ?>

    <h3>
        Welcome <?= htmlspecialchars($_SESSION['username']) ?>
    </h3>

    <a href="session.php?logout=1">Logout</a>

<?php } else { ?>

    <form method="POST">

        Username:
        <input type="text" name="username" required>

        <button type="submit" name="login">Login</button>

    </form>

<?php } ?>