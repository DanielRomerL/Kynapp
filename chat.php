<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    header('Location: login.php');
    exit();
}

$user_name = $_SESSION['nombre'];

$mensaje = 'Lo sentimos, pero en este momento Kynap está pasando por problemas. Lo solucionaremos rapidamente 😉';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat de Nutrición</title>
    <link rel="stylesheet" href="chat_styles.css">
</head>
<body>
    <div class="chat-container">
        <div class="chat-box" id="chat-box">
        <div class="chat-message ai-message"><strong>Kynap AI:</strong> <span id="kynap_mensaje"></span></div>
        </div>
        <div class="input-container">
            <button class="back-button" onclick="backToDashboard()">Volver</button>
        </div>
    </div>

    <script>

        const kynap_mensaje = sessionStorage.getItem('kynap_mensaje');

         document.getElementById('kynap_mensaje').innerText = kynap_mensaje || 'Lo sentimos, pero en este momento Kynap no quiere responder. Lo solucionaremos rapidamente 😉';

        function backToDashboard() { 
            sessionStorage.removeItem('kynap_mensaje');
            window.location.href = 'dashboard.php'; 
        }

    </script>
</body>
</html>
