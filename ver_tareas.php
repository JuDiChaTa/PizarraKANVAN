<?php
$servername = "localhost";
$username = "root";  // Usuario preestablecido de fábrica
$password = "";      // Contraseña preestablecida de fábrica
$dbname = "register";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar proyectos
$sql = "SELECT * FROM registro";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Tareas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="menu.html">Menú</a></li>
                <li><a href="crear_proyectos.html">Crear Proyectos</a></li>
                <li><a href="proyectos.html">Proyectos</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="container">
        <h2>Lista de Proyectos</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<ul>";
            while($row = $result->fetch_assoc()) {
                echo "<li>" . $row["nombre_proyecto"] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No hay proyectos disponibles.";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
