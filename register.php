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
