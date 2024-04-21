<?php
class DashboardController {
    public static function showDashboard() {
        // Verificar si el usuario está autenticado
        if (isset($_SESSION['usuario'])) {
            require_once '../views/dashboard.php';
        } else {
            // Si no está autenticado, redirigir al inicio de sesión
            header('Location: login');
            exit();
        }
    }
}
?>
