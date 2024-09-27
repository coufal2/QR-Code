<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Uložení uživatelského jména a hesla do souboru
    $userData = "$username:$password\n";
    file_put_contents('users.txt', $userData, FILE_APPEND);

    // Uložení uživatelského jména do session pro generování QR kódu
    $_SESSION['username'] = $username;

    // Přesměrování na generaci QR kódu
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
        <input type="password" name="password" placeholder="Zvolte heslo" required>
        <button type="submit">Registrovat</button>
    </form>
    <p>Máte účet? <a href="login.php">Přihlaste se</a></p>
</body>
</html>
