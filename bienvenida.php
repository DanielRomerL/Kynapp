<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Kynap</title>
    <link rel="stylesheet" href="public/style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: white;
            width: 90%;
            max-width: 500px;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .btn {
            display: inline-block;
            text-decoration: none;
            color: black;
            background: #ffcc00;
            padding: 12px;
            font-size: 1.2em;
            font-weight: bold;
            border-radius: 8px;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: #e6b800;
        }
        @media (min-width: 600px) {
            .buttons {
                flex-direction: row;
                justify-content: center;
            }
            .btn {
                width: 45%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido a Kynap</h1>
        <p>Tu asesor personal de nutrición con inteligencia artificial</p>
        <div class="buttons">
            <a href="registro.php" class="btn">Registrarse</a>
            <a href="login.php" class="btn">Iniciar sesión</a>
        </div>
    </div>
</body>
</html>
