<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Generování QR kódu
$qr_code_url = "ssh -p 20283 " . $_SESSION['username'] . "@dev.spsejecna.net";
$expiry_time = time() + 300; // 5 minut platnost
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
</body>
</html>
