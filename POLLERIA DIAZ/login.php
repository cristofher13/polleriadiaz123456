<?php
// Configuración de la base de datos
$servername = "localhost"; // Cambia esto según tu configuración
$username = "root"; // Cambia esto según tu configuración
$password = ""; // Cambia esto según tu configuración
$dbname = "mi_base_de_datos"; // Cambia esto según tu configuración

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Consultar en la base de datos
$sql = "SELECT * FROM usuarios WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password); // "ss" significa que ambos parámetros son strings
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Usuario encontrado
    echo "Inicio de sesión exitoso!";
    // Redirigir al usuario a la página principal o al panel de usuario
    header("Location: pagina_principal.php");
} else {
    // Usuario no encontrado
    echo "Correo o contraseña incorrectos.";
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
