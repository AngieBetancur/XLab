 <?php
    $host = "localhost"; // o 127.0.0.1
    $usuario = "root"; // Usuario
    $contrasena = ""; // Contraseña, si está en blanco, déjalo vacío
    $bd = "lab"; // Nombre de la base de datos

    // Crear la conexión
    $conexion = new mysqli($host, $usuario, $contrasena, $bd);

    // Verificar si hay errores de conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }
?>