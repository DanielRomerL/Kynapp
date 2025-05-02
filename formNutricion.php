<?php
session_start(); 

if (!isset($_SESSION['nombre'])) {
    header('Location: login.php'); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Nutricional</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #0056b3;
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
            color: white;
            position: relative;
            top: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-style {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
            font-weight: bold;
        }
        input, select {
            padding: 10px;
            margin-top: 5px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        button {
            background-color: #ffcc00;
            color: black;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s ease;
        }
        button:hover {
            background-color: #e6b800;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Información Nutricional</h2>
        <form action="formulario_registro.php" method="POST" class="form-style">
            <label for="peso">Peso (kg):</label>
            <input type="number" id="peso" name="peso" step="0.1" required>

            <label for="altura">Altura (cm):</label>
            <input type="number" id="altura" name="altura" step="0.1" required>

            <label for="objetivo">Objetivo:</label>
            <select id="objetivo" name="objetivo" required>
                <option value="" disabled selected>Seleccione su objetivo</option>
                <option value="perder_peso">Perder peso</option>
                <option value="mantener_peso">Mantener peso</option>
                <option value="ganar_musculo">Ganar masa muscular</option>
            </select>

            <label for="nivel_actividad">Nivel de Actividad Física:</label>
            <select id="nivel_actividad" name="nivel_actividad" required>
                <option value="" disabled selected>Seleccione su nivel</option>
                <option value="sedentario">Sedentario</option>
                <option value="ligero">Ligero (1-3 veces por semana)</option>
                <option value="moderado">Moderado (4-5 veces por semana)</option>
                <option value="activo">Activo (Diariamente)</option>
            </select>

            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="" disabled selected>Seleccione su sexo</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select>

            <label>Condiciones Médicas:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="condiciones[]" value="diabetes"> Diabetes</label>
                <label><input type="checkbox" name="condiciones[]" value="hipertension"> Hipertensión</label>
                <label><input type="checkbox" name="condiciones[]" value="colesterol"> Colesterol alto</label>
            </div>

            <label for="alergias">Alergias Alimentarias:</label>
            <input type="text" id="alergias" name="alergias" placeholder="Ej: Maní, Mariscos, Lácteos">

            <label for="preferencia">Preferencias Alimentarias:</label>
            <select id="preferencia" name="preferencia">
                <option value="cualquierCosa">Cualquier Cosa</option>
                <option value="vegetariano">Vegetariano</option>
                <option value="vegano">Vegano</option>
            </select>

            <label for="agua">¿Cuánta agua bebes al día? (litros)</label>
            <input type="number" id="agua" name="agua" step="0.1">

            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
