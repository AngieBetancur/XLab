<?php
// router.php

// Obtener la ruta de la URL
$ruta = $_SERVER['REQUEST_URI'];

// Eliminar la parte inicial de la ruta (ej: /xlab/)
$ruta = str_replace('/xlab/', '', $ruta);

// Definir las rutas
$rutas = [
    '/perfil-paciente' => 'views/perfil_paciente.php',
    // Agregar más rutas aquí...
];

// Encontrar la ruta correspondiente
if (isset($rutas[$ruta])) {
    // Incluir el archivo PHP correspondiente
    include($rutas[$ruta]);
} else {
    // Mostrar un mensaje de error o redirigir a una página de error
    http_response_code(404);
    echo "Ruta no encontrada";
    exit;
}
?>