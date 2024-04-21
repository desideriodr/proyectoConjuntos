<?php
// Incluir el archivo init.php para inicializar la aplicación
require_once 'init.php';

//depurar
//echo $_SERVER['REQUEST_URI'];

// Enrutador básico
if ($_SERVER['REQUEST_URI'] === '/proyectoConjuntos/index.php') {
    // Si la URL es la raíz del proyecto o la raíz seguida de index.php, redirigir al controlador de autenticación
    header('Location: views/login.php');
    exit();
} elseif ($_SERVER['REQUEST_URI'] === '/proyectoConjuntos/views/login.php') {
    // Mostrar la vista de inicio de sesión
    AuthController::showLogin();
} elseif ($_SERVER['REQUEST_URI'] === '/proyectoConjuntos/views/dashboard.php') {
    // Mostrar el dashboard si el usuario está autenticado
    DashboardController::showDashboard();
} else {
    // Mostrar un error 404 si la ruta no coincide con ninguna ruta conocida
    http_response_code(404);
    echo 'Página no encontrada';
}
?>
