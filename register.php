<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Uložení uživatelského jména a hesla do souboru
    $userData = "$username:$password\n";
    file_put_contents('users.txt', $userData, FILE_APPEND);

    // Uložení uživatelského jména a hesla do session pro generování QR kódu
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password; // Uložení hesla do session

    // Přesměrování na generaci QR kódu
    header('Location: generate_qr.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, content="initial-scale=1.0">
    <title>Přihlášení</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Přihlášení</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="Uživatelské jméno" required>
        <input type="password" name="password" placeholder="Heslo" required>
        <button type="submit">Přihlásit se</button>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </form>
    <p>Nemáte účet? <a href="register.php">Zaregistrujte se</a></p>
</body>
</html>
