<?php
require_once 'C:/XAMPP/htdocs/proyectoConjuntos/models/User.php';

class AuthController {
    public static function login($username, $user_password) {
        // Verificar si el usuario y la contraseña son válidos
        if (User::verifyCredentials($username, $user_password)) {
            // Si las credenciales son válidas, iniciar sesión y redirigir al dashboard
            $_SESSION['logged_in'] = true;
            header('Location: ../views/dashboard.php');
            exit();
        } else {
            // Si las credenciales no son válidas, mostrar un mensaje de error
            $_SESSION['error'] = "Nombre de usuario o contraseña incorrectos";
            header('Location: ../views/login.php');
            exit();
        }
    }
}
?>