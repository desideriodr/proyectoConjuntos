<?php

require_once 'C:/XAMPP/htdocs/proyectoConjuntos/models/ZonasComunes.php';
require_once 'C:/XAMPP/htdocs/proyectoConjuntos/models/Reservas.php';


class ReservasController {
    
    public function mostrarReservas() {
        $zonasDisponibles = ZonasComunes::obtenerZonas();
        $reservas = Reservas::obtenerReservas();

        // Cargar la vista de reservas
        require_once '../views/reservas_areas_comunes.php';
    }
    
    public function hacerReserva() {
        // Lógica para procesar la solicitud de reserva
        // Esto implicará validar los datos del formulario y agregar la reserva a la base de datos
    }
}
?>
