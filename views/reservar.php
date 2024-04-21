<?php
// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idZona = $_POST["zona"];
    $idResidente = $_POST["residente"];
    $fechaDesde = $_POST["fechaDesde"];
    $fechaHasta = $_POST["fechaHasta"];
    $estado = $_POST["estado"];

    // Incluir el archivo del controlador
    require_once 'C:/XAMPP/htdocs/proyectoConjuntos/controllers/ReservasController.php';

    // Crear una instancia del controlador de reservas
    $reservasController = new ReservasController($db);

    // Llamar al método para registrar la reserva
    $resultado = $reservasController->registrarReserva($idZona, $idResidente, $fechaDesde, $fechaHasta, $estado);
    
    header("Location: dashboard.php");
} else {
    // Si no se reciben datos por POST, redireccionar a la página de inicio
    header("Location: dashboard.php");
    exit;
}
?>