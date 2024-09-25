<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Paciente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
    // Incluir el archivo de conexión a la base de datos
    include("../modelo/conexion.php");

    // Obtener el número de identificación del paciente de la URL
    $numero_identificacion = isset($_GET['id_paciente']) ? $_GET['id_paciente'] : '';
    $numero_identificacion = $conexion->real_escape_string($numero_identificacion);

    // Consulta para obtener los datos del paciente
    $sql = "SELECT 
                p.numeroid, 
                CONCAT(p.apellido1, ' ', p.apellido2, ' ', p.nombre1, ' ', p.nombre2) AS nombre_completo,
                p.fechanac,
                p.direccion,
                p.tel_movil,
                p.email,
                t.valor AS tipo_identificacion,
                s.valor AS sexo_biologico
            FROM gen_m_persona p
            JOIN gen_p_listaopcion t ON p.id_tipoid = t.id AND t.variable = 'TipoIdentificacion'
            JOIN gen_p_listaopcion s ON p.id_sexobiologico = s.id AND s.variable = 'SexoBiologico'
            WHERE p.numeroid = '$numero_identificacion'";

    // Ejecutar la consulta
    $resultado = $conexion->query($sql);

    // Manejo de errores de la consulta
    if (!$resultado) {
        echo "Error en la consulta: " . $conexion->error;
        exit;
    }

    // Asegurarse de que las variables estén definidas
    $tipo_identificacion = '';
    $numero_identificacion = '';
    $nombre_completo = '';
    $fecha_nacimiento = '';
    $sexo_biologico = '';
    $direccion = '';
    $telefono = '';
    $email = '';

    // Verificar si se encontró el paciente
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $tipo_identificacion = $fila['tipo_identificacion'];
        $numero_identificacion = $fila['numeroid'];
        $nombre_completo = $fila['nombre_completo'];
        $fecha_nacimiento = $fila['fechanac'];
        $sexo_biologico = $fila['sexo_biologico'];
        $direccion = $fila['direccion'];
        $telefono = $fila['tel_movil'];
        $email = $fila['email'];
    } else {
        echo "No se encontró el paciente con el número de identificación proporcionado.";
        exit;
    }
    ?>

    <div class="container">
        <h1>Perfil del Paciente</h1>
        <form>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-id-card"></i> Tipo de identificación</label>
                <input type="text" class="form-control-plaintext" value="<?php echo $tipo_identificacion; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-hashtag"></i> Número de identificación</label>
                <input type="text" class="form-control-plaintext" value="<?php echo $numero_identificacion; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-user"></i> Nombre completo</label>
                <input type="text" class="form-control-plaintext" value="<?php echo $nombre_completo; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-calendar-alt"></i> Fecha de nacimiento</label>
                <input type="text" class="form-control-plaintext" value="<?php echo $fecha_nacimiento; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-venus-mars"></i> Sexo biológico</label>
                <input type="text" class="form-control-plaintext" value="<?php echo $sexo_biologico; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-map-marker-alt"></i> Dirección de residencia</label>
                <input type="text" class="form-control-plaintext" value="<?php echo $direccion; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-mobile-alt"></i> Número de celular</label>
                <input type="text" class="form-control-plaintext" value="<?php echo $telefono; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-envelope"></i> Correo electrónico</label>
                <input type="text" class="form-control-plaintext" value="<?php echo $email; ?>" readonly>
            </div>
        </form>
    </div>
</body>
</html>