<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    // Zde můžete přidat validaci a ukládání uživatelského jména do databáze
    $_SESSION['username'] = $username;
    header('Location: generate_qr.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Registrace</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="Zvolte uživatelské jméno" required>
        <button type="submit">Registrovat</button>
    </form>
</body>
</html>
