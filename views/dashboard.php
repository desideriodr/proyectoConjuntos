<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../resource/css/styles.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
                    <a class="navbar-brand" href="#">Nombre del Conjunto Residencial</a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-person"></i>
                                    <span id="username">Nombre de Usuario</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Cerrar Sesión</a>
                                    <a class="dropdown-item" href="#">Configuración</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-2 sidebar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link btn" href="#">Administración <i class="bi bi-caret-down"></i></a>
                            <ul class="submenu">
                                <li><a href="#">Listar Usuarios</a></li>
                                <li><a href="#">Crear Usuarios</a></li>
                                <li><a href="#">Asignar Permisos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn" href="#">Residentes <i class="bi bi-caret-down"></i></a>
                            <ul class="submenu">
                                <li><a href="#">Nuevo Residente</a></li>
                                <li><a href="#">Gestionar Residente</a></li>
                                <li><a href="#">Ingreso Visitante</a></li>
                                <li><a href="#">Rastrear Mascota</a></li>
                                <li><a href="#">Registrar Vehículos</a></li>
                                <li><a href="#" id="reservasAreasComunes">Reserva areas comunes</a></li>
                                <li><a href="#">Generar Recibo de Pago</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn" href="#">Inventario <i class="bi bi-caret-down"></i></a>
                            <ul class="submenu">
                                <li><a href="#">Listar Artículos</a></li>
                                <li><a href="#">Registrar Artículos</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10 content">
                    <!-- Contenido del dashboard -->
                    

                </div>
            </div>
        </div>
    </body>
</html>
