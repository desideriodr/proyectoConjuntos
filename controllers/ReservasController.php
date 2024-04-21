<?php

require_once 'C:/XAMPP/htdocs/proyectoConjuntos/models/ZonasComunes.php';
require_once 'C:/XAMPP/htdocs/proyectoConjuntos/models/Residentes.php';

var_dump($_POST);
$idZona = $_POST['idZona'];

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
        $zonasDisponibles = Residentes::obtenerResidentes();
        // $reservas = Reservas::obtenerReservas();
        return $zonasDisponibles;
// Cargar la vista de reservas
        // require_once 'C:/XAMPP/htdocs/proyectoConjuntos/views/reservas_areas_comunes.php';
    }
    
    public function registrarReserva($idZona, $idResidente,$estado, $fechaDesde, $fechaHasta, $cantidadInvitados) {
        // Actualizar el estado de la zona en la tabla zonas_comunes
        
        var_dump($idZona, $idResidente,$estado, $fechaDesde, $fechaHasta, $cantidadInvitados);
  //      $this->actualizarEstadoZona($idZona, $estado);

        // Insertar un nuevo registro en la tabla reservas
//        $this->insertarReserva($fechaDesde, $fechaHasta, $cantidadInvitados, $idZona, $idResidente);
    }

    private function actualizarEstadoZona($idZona, $estado) {
        // Preparar la consulta SQL con un prepared statement para evitar SQL injection
        $sql = "UPDATE zonas_comunes SET estado = :estado WHERE id = :idZona";
        $stmt = $this->conexion->prepare($sql);

        // Bind de los parámetros
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':idZona', $idZona);

        // Ejecutar la consulta
        $stmt->execute();
    }

    private function insertarReserva($idZona, $idResidente, $fechaDesde, $fechaHasta, $cantidadInvitados) {
        // Preparar la consulta SQL con un prepared statement para evitar SQL injection
        $sql = "INSERT INTO reservas (fecha_inicio, fecha_fin, cantidad_invitados, id_zona, id_residente) 
                VALUES (:fechaDesde, :fechaHasta, :cantidadInvitados, :idZona, :idResidente)";
        $stmt = $this->conexion->prepare($sql);

        // Bind de los parámetros
        $stmt->bindParam(':fechaDesde', $fechaDesde);
        $stmt->bindParam(':fechaHasta', $fechaHasta);
        $stmt->bindParam(':cantidadInvitados', $cantidadInvitados);
        $stmt->bindParam(':idZona', $idZona);
        $stmt->bindParam(':idResidente', $idResidente);

        // Ejecutar la consulta
        $stmt->execute();
    }
}
?>
