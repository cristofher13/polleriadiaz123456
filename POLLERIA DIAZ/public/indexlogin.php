
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    
    if ($email == 'usuario@example.com' && $password == 'contraseña') {
        echo "Inicio de sesion exitoso";
        
    } else {
        echo "Credenciales incorrectas";
    }
}
?>