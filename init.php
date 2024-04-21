<?php
// Configuración de la sesión
session_start();

// Incluimos el archivo de configuración de la conexión
require_once('includes/conexion.php');

// Incluir los modelos y controladores
require_once 'models/User.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/DashboardController.php';
?>
