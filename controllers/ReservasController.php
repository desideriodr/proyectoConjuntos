<?php

require_once 'C:/XAMPP/htdocs/proyectoConjuntos/models/ZonasComunes.php';
require_once 'C:/XAMPP/htdocs/proyectoConjuntos/models/Residentes.php';
require_once 'C:/XAMPP/htdocs/proyectoConjuntos/models/Reservas.php';

class ReservasController {

    private $conexion; // Propiedad para almacenar la conexión a la base de datos

    public function __construct($conexion) {
        $this->conexion = $conexion; // Almacenar la conexión proporcionada en la propiedad
    }

    public function mostrarZonas() {
        $zonasDisponibles = ZonasComunes::obtenerZonas();
        // $reservas = Reservas::obtenerReservas();
        return $zonasDisponibles;
// Cargar la vista de reservas
        // require_once 'C:/XAMPP/htdocs/proyectoConjuntos/views/reservas_areas_comunes.php';
    }

    public function mostrarResidentes() {
        $residentes = Residentes::obtenerResidentes();
        // $reservas = Reservas::obtenerReservas();
        return $residentes;
// Cargar la vista de reservas
        // require_once 'C:/XAMPP/htdocs/proyectoConjuntos/views/reservas_areas_comunes.php';
    }
    
    public function mostrarReservas() {
        $reservas = Reservas::obtenerReservas();
        // $reservas = Reservas::obtenerReservas();
        return $reservas;
// Cargar la vista de reservas
        // require_once 'C:/XAMPP/htdocs/proyectoConjuntos/views/reservas_areas_comunes.php';
    }

    public function registrarReserva($idZona, $idResidente, $fechaDesde, $fechaHasta, $estado) {

        // Insertar un nuevo registro en la tabla reservas
        $this->insertarReserva($idZona, $idResidente, $fechaDesde, $fechaHasta, $estado);
    }

    private function insertarReserva($idZona, $idResidente, $fechaDesde, $fechaHasta, $estado) {
        // Preparar la consulta SQL con un prepared statement para evitar SQL injection
        
        $sql = "INSERT INTO reservas (id_zona_comun, id_residente, fecha_inicio, fecha_fin, estado)  
        VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('sssss', $idZona, $idResidente, $fechaDesde, $fechaHasta, $estado);
        $stmt->execute();
    }

}

?>
