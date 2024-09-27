<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Úvodní stránka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="welcome">
        <h1>Vítejte, <?php echo $_SESSION['username']; ?>!</h1>
        <a href="logout.php">Odhlásit se</a>
    </div>
</body>
</html>
