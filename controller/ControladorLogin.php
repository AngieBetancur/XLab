<?php
session_start();
include '../modelo/conexion.php';

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $identificacion = $_POST['identificacion'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    // Validaciones en el backend
    if (empty($tipo) || empty($identificacion) || empty($fecha_nacimiento)) {
        echo "Todos los campos son requeridos.";
        exit;
    }

    // Validación del tipo de identificación y número de identificación
    if (!is_string($tipo) || !is_string($identificacion) || strlen($identificacion) < 5) {
        echo "El tipo y el número de identificación deben ser válidos.";
        exit;
    }

    // Convertir la fecha al formato de la base de datos (Asumiendo que es YYYY-MM-DD)
    $fecha_nacimiento = date('Y-m-d', strtotime($fecha_nacimiento));


    // Consulta a la base de datos para verificar si el usuario existe
    $query = "SELECT * 
    FROM gen_m_persona p
    JOIN gen_p_listaopcion o ON p.id_tipoid = o.id
    WHERE o.variable = 'TipoIdentificacion'
    AND o.descripcion = ?
    AND p.numeroid = ?
    AND p.fechanac = ?";

    // Preparar la consulta
    if (!$stmt = $conexion->prepare($query)) {
        echo "Error al preparar la consulta: " . $conexion->error;
        exit;
    }

    $stmt->bind_param("sss", $tipo, $identificacion, $fecha_nacimiento);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Usuario encontrado, iniciar sesión y redirigir
            $_SESSION['usuario'] = $identificacion; // Almacenar información en sesión
            header("Location: ../archivo.html"); // Redirigir al HTML.  Usar Location para redirección HTTP
            exit(); // Asegurarse de que el script no siga ejecutándose
        } else {
            echo "Usuario no encontrado. Verifique los datos ingresados.";
        }
    } else {
        echo "Error en la ejecución de la consulta: " . $stmt->error;
    }

    // Cerrar el statement y la conexión
    $stmt->close();
    $conexion->close();
}
?>