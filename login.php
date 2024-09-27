<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Načtení uživatelských dat ze souboru
    $users = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($users as $user) {
        list($storedUsername, $storedPassword) = explode(':', $user);
        if ($username === $storedUsername && $password === $storedPassword) {
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit();
        }
    }
    $error = "Nesprávné uživatelské jméno nebo heslo.";
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
