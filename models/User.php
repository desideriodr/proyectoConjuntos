<?php

require_once 'C:/XAMPP/htdocs/proyectoConjuntos/includes/conexion.php';

class User {
    public static function verifyCredentials($username, $password) {
        global $db;

        // Consultar la base de datos para verificar las credenciales
        $sql = "SELECT * FROM usuarios WHERE nombre = ? LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $stored_password = $user['contraseña']; // Obtener la contraseña almacenada

            // Comparar las contraseñas directamente
            if ($password === $stored_password) {
                return true;
            }
        }
        return false;
    }
}


?>
