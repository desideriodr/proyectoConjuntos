<?php

require_once 'C:/XAMPP/htdocs/proyectoConjuntos/models/ZonasComunes.php';
require_once 'C:/XAMPP/htdocs/proyectoConjuntos/models/Residentes.php';


class ReservasController {
    
    public function mostrarZonas() {
        $zonasDisponibles = ZonasComunes::obtenerZonas();
        // $reservas = Reservas::obtenerReservas();
        return $zonasDisponibles;
// Cargar la vista de reservas
        // require_once 'C:/XAMPP/htdocs/proyectoConjuntos/views/reservas_areas_comunes.php';
    }
    
    public function mostrarResidentes() {
        $zonasDisponibles = Residentes::obtenerResidentes();
        // $reservas = Reservas::obtenerReservas();
        return $zonasDisponibles;
// Cargar la vista de reservas
        // require_once 'C:/XAMPP/htdocs/proyectoConjuntos/views/reservas_areas_comunes.php';
    }
    
    public function hacerReserva() {
        // Lógica para procesar la solicitud de reserva
        // Esto implicará validar los datos del formulario y agregar la reserva a la base de datos
    }
}
?>
