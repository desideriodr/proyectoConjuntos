<?php

// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idZona = $_POST["zona"];
    $idResidente = $_POST["residente"];
    $fechaDesde = $_POST["fechaDesde"];
    $horaDesde = $_POST["horaDesde"];
    $fechaHasta = $_POST["fechaHasta"];
    $horaHasta = $_POST["horaHasta"];
    $estado = $_POST["estado"];
    $fechaHoraDesde = $fechaDesde . ' ' . $horaDesde;
    $fechaHoraHasta = $fechaHasta . ' ' . $horaHasta;

    // Incluir el archivo del controlador
    require_once 'C:/XAMPP/htdocs/proyectoConjuntos/controllers/ReservasController.php';

    // Crear una instancia del controlador de reservas
    $reservasController = new ReservasController($db);

    // Llamar al método para registrar la reserva
    $resultado = $reservasController->registrarReserva($idZona, $idResidente, $fechaHoraDesde, $fechaHoraHasta, $estado);

    // Verificar el resultado
    // Después de realizar la operación de reserva
    if ($resultado  === true) {
        $mensaje = "Reserva registrada con éxito";
    } else {
        $mensaje = "Error al registrar la reserva";
    }

// Almacenar el mensaje en una variable de sesión para que esté disponible en dashboard.php
    $_SESSION['mensaje'] = $mensaje;

// Redireccionar a dashboard.php
    header("Location: dashboard.php");
} else {
    // Si no se reciben datos por POST, redireccionar a la página de inicio
    header("Location: dashboard.php");
    exit;
}
?>