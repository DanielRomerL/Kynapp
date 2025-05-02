<?php
session_start(); 

if (!isset($_SESSION['nombre'])) {
    header('Location: login.php'); 
    exit();
}

include('kynap_db.php');

if (isset($_SESSION['nombre'])) {
    $user_name = $_SESSION['nombre'];  

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];  

        $sql = "SELECT objetivo, nivel_actividad, agua, peso, altura FROM usuarios WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_objetivo = $row['objetivo'];  
            $user_nivel_actividad = $row['nivel_actividad'];  
            $user_agua = $row['agua'];  
            $user_peso = $row['peso'];  
            $user_altura = $row['altura'];  
        } else {
            $user_objetivo = 'No definido';
            $user_nivel_actividad = 'No definido';
            $user_agua = 'No definido';
            $user_peso = 'No definido';
            $user_altura = 'No definido';
        }
        $stmt->close(); 
    } else {
        $user_objetivo = 'No definido';
        $user_nivel_actividad = 'No definido';
        $user_agua = 'No definido';
        $user_peso = 'No definido';
        $user_altura = 'No definido';
    }
} else {
    $user_name = 'Usuario';  
    $user_objetivo = 'No definido';  
    $user_nivel_actividad = 'No definido';  
    $user_agua = 'No definido';  
    $user_peso = 'No definido';  
    $user_altura = 'No definido';  
}

?>







<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kynap AI Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.tidio.co/up3fvfkja1rpavebx3nopij4zeqjgfbo.js" async></script>
</head>
<body>
    <div class="sidebar">
        <h2 class="logo"><span class="kynap">Kynap</span> <span class="ai">AI</span></h2>
        <hr class="divider">
        <nav>
            <ul>
                <li class="active"><img src="iconos/home.svg" class="icon"> Inicio</li>
                <li><img src="iconos/dieta.svg" class="icon"> Mi Dieta</li>
                <li><img src="iconos/progreso.svg" class="icon"> Progresos</li>
                <hr class="divider">
                <li><img src="iconos/settings.svg" class="icon"> Configuración</li>

                <li class="logout-item">
                    <a href="logout.php" class="logout-link">
                        <img src="iconos/close.svg" class="icon"> Cerrar sesión
                    </a>
                </li>




            </ul>
        </nav>
    </div>

    <div class="main-content">
        <header>
            <input type="text" class="search-bar" placeholder="Buscar...">
            <div class="user-info">
                <span class="user-name"><?php echo htmlspecialchars($user_name); ?></span> 
                <img src="iconos/profile.svg" alt="Perfil" class="user-avatar">
            </div>
        </header>

        <section class="dashboard">
            <h1 class="welcome-text">Bienvenido, <span id="username"><?php echo htmlspecialchars($user_name); ?></span></h1>
            <div class="cards">
                 <div class="card">
                 <h3>Objetivo 🏆</h3>
                 <p class="value good"><span id="objetivo"><?php echo htmlspecialchars($user_objetivo); ?></span></p>
                 <button class="btn" onclick="getRecommendationsFromPanel('objetivo')">Ver recomendaciones</button>

                  </div>

                  <div class="card">
                   <h3>Nivel de actividad 💪</h3>
                   <p class="value"><?php echo htmlspecialchars($user_nivel_actividad); ?></p>
                   <button class="btn" onclick="getRecommendationsFromPanel('actividad')">Ver recomendaciones</button>
                   
                  </div>


               <div class="card">
                    <h3>Vasos de agua al dia (L) 💧</h3>
                    <p class="value"><?php echo htmlspecialchars($user_agua); ?> L</p>
                    <button class="btn" onclick="getRecommendationsFromPanel('agua')">Ver recomendaciones</button>
           </div>


                <div class="card">
                    <h3>Altura ↕📏</h3>
                    <p class="value"><?php echo htmlspecialchars($user_altura); ?> cm</p>
                    <button class="btn" onclick="getRecommendationsFromPanel('altura')">Ver recomendaciones</button>
                </div>
            </div>


            <div class="chart-container">
                <h2>Calorías Quemadas</h2>
                <canvas id="caloriesChart"></canvas>
            </div>

            
        </section>
    </div>
    
    <div id="userData" 
    data-objetivo="<?php echo htmlspecialchars($user_objetivo); ?>" 
    data-actividad="<?php echo htmlspecialchars($user_nivel_actividad); ?>" 
    data-agua="<?php echo htmlspecialchars($user_agua); ?>" 
    data-peso="<?php echo htmlspecialchars($user_peso); ?>" 
    data-altura="<?php echo htmlspecialchars($user_altura); ?>">
</div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation"></script>
    <script src="script.js"></script>
    <script src="objetivo_reco.js"></script>
</body>
</html>
