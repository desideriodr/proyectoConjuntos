<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';
$usuario_db = 'root';
$contrasena_db = '';
$nombre_db = 'baseconjuntos';

// Conexión a la base de datos
$db = mysqli_connect($host, $usuario_db, $contrasena_db, $nombre_db);

// Verificar la conexión
if (!$db) {
    die("Error al conectar: " . mysqli_connect_error());
}
?>
