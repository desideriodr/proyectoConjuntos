<?php

require_once 'C:/XAMPP/htdocs/proyectoConjuntos/includes/conexion.php';

class ZonasComunes {
    public static function obtenerZonas() {
        global $db;

        // Consultar la base de datos para obtener las zonas comunes
        $sql = "SELECT * FROM zonas_comunes";
        $result = $db->query($sql);

        // Verificar si se obtuvieron resultados
        if ($result && $result->num_rows > 0) {
            // Convertir los resultados en un array asociativo
            $zonas = [];
            while ($row = $result->fetch_assoc()) {
                $zonas[] = $row;
            }
            return $zonas;
        } else {
            return []; // Devolver un array vacío si no hay zonas comunes
        }
    }
}

