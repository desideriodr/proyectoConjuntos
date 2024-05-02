<?php

require_once 'C:/XAMPP/htdocs/proyectoConjuntos/includes/conexion.php';

class Reservas {

    public static function obtenerReservas() {
        global $db;

        // Consultar la base de datos para obtener las reservas actuales
        $sql = "SELECT R.id,Z.nombre as nombre_zona,RE.nombre as nombre_residente,R.fecha_inicio,fecha_fin,estado FROM reservas R
                INNER JOIN residentes RE ON (R.id_residente = RE.id)
                INNER JOIN zonas_comunes Z ON (R.id_zona_comun = Z.id)";
        $result = $db->query($sql);

        // Verificar si se obtuvieron resultados
        if ($result->num_rows > 0) {
            // Convertir los resultados en un array asociativo
            $reservas = [];
            while ($row = $result->fetch_assoc()) {
                $reservas[] = $row;
            }
            return $reservas;
        } else {
            return []; // Devolver un array vacío si no hay reservas
        }
    }

}

?>
