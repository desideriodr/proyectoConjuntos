<?php

require_once 'C:/XAMPP/htdocs/proyectoConjuntos/includes/conexion.php';

class Residentes {

    public static function obtenerResidentes() {
        global $db;

        // Consultar la base de datos para obtener las zonas comunes
        $sql = "SELECT * FROM residentes";
        $result = $db->query($sql);


        // Verificar si se obtuvieron resultados
        if ($result->num_rows > 0) {
            // Convertir los resultados en un array asociativo
            $residentes = [];
            while ($row = $result->fetch_assoc()) {
                $residentes[] = $row;
            }
            return $residentes;
        } else {
            return []; // Devolver un array vacío si no hay zonas comunes
        }
    }

}

?>
