<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Odkaz pro QR kód
$qr_code_url = "http://s-coufal2-24.dev.spsejecna.net/QR-Code/index.php?user=" . urlencode($_SESSION['username']);
$expiry_time = time() + 300; // 5 minut platnost
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR kód</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <h1>QR kód pro přihlášení</h1>
    <p>Naskenujte tento QR kód pro přihlášení:</p>
    <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo urlencode($qr_code_url); ?>&size=200x200" alt="QR kód">
    <p id="timer">QR kód vyprší za: <span id="countdown">300</span> sekund</p>
    <script>
        let countdown = 300; // 5 minut
        const timerElement = document.getElementById('countdown');

        const interval = setInterval(() => {
            countdown--;
            timerElement.textContent = countdown;

            if (countdown <= 0) {
                clearInterval(interval);
                alert("QR kód vypršel.");
            }
        }, 1000);
    </script>
</body>
</html>

