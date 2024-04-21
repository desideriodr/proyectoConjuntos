<?php

require_once 'C:/XAMPP/htdocs/proyectoConjuntos/models/ZonasComunes.php';
require_once 'C:/XAMPP/htdocs/proyectoConjuntos/models/Reservas.php';


class ReservasController {
    public function mostrarReservas() {
        // Lógica para obtener las áreas comunes disponibles y las reservas existentes
        // Puedes usar el modelo para obtener estos datos de la base de datos
        $zonasDisponibles = ZonasComunes::obtenerZonasDisponibles();
        $reservas = Reservas::obtenerReservas();

        // Cargar la vista de reservas
        require_once 'app/views/reservas.php';
    }

    public function hacerReserva() {
        // Lógica para procesar la solicitud de reserva
        // Esto implicará validar los datos del formulario y agregar la reserva a la base de datos
    }
}
?>
