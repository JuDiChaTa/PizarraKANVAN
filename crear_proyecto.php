<?php
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

// Obtener datos del formulario
$email = $conn->real_escape_string($_POST['email']);
$nombre_proyecto = $conn->real_escape_string($_POST['nombre_proyecto']);
$numero_tareas = $conn->real_escape_string($_POST['numero_tareas']);

// Insertar datos en la base de datos
$sql = "INSERT INTO datos (email, nombre_proyecto, numero_tareas) VALUES ('$email', '$nombre_proyecto', '$numero_tareas')";

if ($conn->query($sql) === TRUE) {
    echo "Proyecto creado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
