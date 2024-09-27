<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Odkaz pro QR kód
$username = $_SESSION['username'];
$password = $_POST['password'] ?? ''; // Získání hesla, pokud je k dispozici
$qr_code_url = "http://s-coufal2-24.dev.spsejecna.net/QR-Code/index.php?username=" . urlencode($username) . "&password=" . urlencode($password);
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR kód</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>QR kód pro přihlášení</h1>
    <p>Naskenujte tento QR kód pro přihlášení:</p>
    <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo urlencode($qr_code_url); ?>&size=200x200" alt="QR kód">
    <p>QR kód vyprší za 5 minut.</p>
</body>
</html>
