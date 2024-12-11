<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";  // Usuario preestablecido de fábrica
$password = "";      // Contraseña preestablecida de fábrica
$dbname = "crear_proyecto";  // Nombre de la base de datos ajustado

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se recibió el correo electrónico
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);

    // Consultar proyectos del email especificado
    $sql = "SELECT * FROM datos WHERE email = '$email'";
    $result = $conn->query($sql);
} else {
    $result = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
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
        <h2>Lista de Proyectos para <?php echo htmlspecialchars($email); ?></h2>
        <?php
        
       echo "<ul>";
       while($row = $result->fetch_assoc()) {
           echo "<li>" . htmlspecialchars($row["nombre_proyecto"]) . " - Tareas: " . htmlspecialchars($row["numero_tareas"]) . "</li>";
       }
       echo "</ul>";

        $conn->close();
        ?>
    </div>
</body>
</html>


