<?php
session_start();
session_destroy(); // Finaliza la sesión
header("Location: /proyectoConjuntos/views/login.php"); // Redirige a la página de login
exit();
