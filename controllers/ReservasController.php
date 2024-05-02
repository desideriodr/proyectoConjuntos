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
        // Verificar si ya existe una reserva para la zona común y el rango de fechas seleccionado
        if ($this->existeReservaEnRango($idZona, $fechaDesde, $fechaHasta)) {
            // Ya existe una reserva en ese rango de fechas, devolver false
            return false;
        }

        // Si no existe una reserva en el rango de fechas seleccionado, proceder con el registro
        $this->insertarReserva($idZona, $idResidente, $fechaDesde, $fechaHasta, $estado);
        // Devolver true para indicar que la reserva se registró correctamente
        return true;
    }

    private function existeReservaEnRango($idZona, $fechaDesde, $fechaHasta) {
        // Consultar la base de datos para verificar si ya existe una reserva en el rango de fechas seleccionado
        $sql = "SELECT COUNT(*) AS total_reservas FROM reservas WHERE id_zona_comun = ? AND ((fecha_inicio <= ? AND fecha_fin >= ?) OR (fecha_inicio <= ? AND fecha_fin >= ?)) AND estado = 'Reservado'";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('sssss', $idZona, $fechaDesde, $fechaHasta, $fechaDesde, $fechaHasta);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $totalReservas = $row['total_reservas'];

        // Devolver true si hay al menos una reserva en el rango de fechas seleccionado, false en caso contrario
        return $totalReservas > 0;
    }

    private function insertarReserva($idZona, $idResidente, $fechaDesde, $fechaHasta, $estado) {
        // Preparar la consulta SQL con un prepared statement para evitar SQL injection

        $sql = "INSERT INTO reservas (id_zona_comun, id_residente, fecha_inicio, fecha_fin, estado)  
        VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('sssss', $idZona, $idResidente, $fechaDesde, $fechaHasta, $estado);
        $stmt->execute();
    }

    public function cancelarReserva($idReserva) {
        $sql = "UPDATE reservas SET estado = 'Cancelada' WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('i', $idReserva);
        if ($stmt->execute()) {
            // La reserva se canceló correctamente
            return true;
        } else {
            // Hubo un error al cancelar la reserva
            return false;
        }
    }

}

?>
