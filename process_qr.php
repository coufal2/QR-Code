<?php
session_start();
if (isset($_GET['username']) && isset($_GET['password'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];

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
    header('Location: login.php?error=Nesprávné uživatelské jméno nebo heslo.');
    exit();
}
?>
