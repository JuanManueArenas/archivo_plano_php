<?php
// Inicializar mensaje de estado
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    
    if (!empty($nombre)) {
        // Guardar el nombre en el archivo estudiantes.txt
        $resultado = file_put_contents('estudiantes.txt', $nombre . PHP_EOL, FILE_APPEND | LOCK_EX);
        
        if ($resultado === false) {
            $mensaje = "Error al guardar el estudiante.";
        } else {
            $mensaje = "Estudiante registrado: " . htmlspecialchars($nombre);
        }
    } else {
        $mensaje = "Por favor, ingresa un nombre.";
    }
}
?>

