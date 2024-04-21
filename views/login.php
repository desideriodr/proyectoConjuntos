<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resource/css/styles.css">
</head>
<body>
   
    <div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Iniciar Sesión</h2>
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="username">Nombre de Usuario</label>
                            <input type="text" id="username" class="form-control" name="username" placeholder="Nombre de Usuario" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="user_password" class="form-control" name="user_password" placeholder="Contraseña" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php
require_once '../controllers/AuthController.php';

// Verificar si se enviaron datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    
    // Llamar al método login del controlador de autenticación
    AuthController::login($username, $user_password);
}
?>