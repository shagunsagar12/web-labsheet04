<?php

if (isset($_POST['theme'])) {

    $theme = $_POST['theme'];

    setcookie(
        "theme",
        $theme,
        time() + (86400 * 30),
        "/"
    );

    header("Location: cookie.php");
    exit;
}

$theme = $_COOKIE['theme'] ?? 'white';

?>

<!DOCTYPE html>
<html>
<head>
<title>Cookie Management</title>
</head>

<body style="background-color: <?= htmlspecialchars($theme) ?>;">

<h2>Cookie Management</h2>

<form method="POST">

    Select Theme:

    <select name="theme">

        <option value="white">White</option>
        <option value="lightblue">Blue</option>
        <option value="lightpink">Pink</option>

    </select>

    <button type="submit">Save Theme</button>

</form>

<p>Saved Theme: <?= htmlspecialchars($theme) ?></p>

</body>
</html>