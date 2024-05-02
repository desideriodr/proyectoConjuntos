<?php
// Archivo reservar.php
// Incluir el archivo del controlador
require_once 'C:/XAMPP/htdocs/proyectoConjuntos/controllers/ReservasController.php';

// Crear una instancia del controlador
$reservasController = new ReservasController($db);

// Obtener las zonas disponibles desde la base de datos
$zonasComunes = $reservasController->mostrarZonas();

// Obtener los residentes disponibles desde la base de datos
$residentes = $reservasController->mostrarResidentes();

$reservas = $reservasController->mostrarReservas();

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
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
                                <li><a href="#" id="reservasAreasComunes">Reserva áreas comunes</a></li>
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

                    <div id="reservasContent" class="reservas-content" class="reservas-content card border-primary shadow">
                        <div class="card-reservas">
                            <div class="card-header bg-primary text-white">
                                <h5 class="card-title">Reservas de Áreas Comunes</h5>
                            </div>
                            <div class="card-body">
                                <!-- Formulario de reserva -->
                                <form action="reservar.php" method="POST">
                                    <div class="form-group">
                                        <label for="zona">Nombre de la Zona:</label>
                                        <select class="form-control" id="zona" name="zona" required>
                                            <option value="">Selecciona una zona</option>
                                            <?php foreach ($zonasComunes as $zona) : ?>
                                                <option value="<?php echo $zona['id']; ?>"><?php echo $zona['nombre']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="residente">Residente:</label>
                                        <select class="form-control" id="residente" name="residente" required>
                                            <option value="">Selecciona un residente</option>
                                            <?php foreach ($residentes as $residente) : ?>
                                                <option value="<?php echo $residente['id']; ?>"><?php echo $residente['nombre']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">Estado:</label>
                                        <select class="form-control" id="estado" name="estado" required>
                                            <option value="Libre">Libre</option>
                                            <option value="Reservado">Reservado</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="fechaDesde">Fecha Desde:</label>
                                        <input type="date" class="form-control" id="fechaDesde" name="fechaDesde" required>
                                        <label for="horaDesde">Hora Hasta:</label>
                                        <input type="time" class="form-control" id="horaDesde" name="horaDesde" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fechaHasta">Fecha Hasta:</label>
                                        <input type="date" class="form-control" id="fechaHasta" name="fechaHasta" required>
                                        <label for="horaHasta">Hora Hasta:</label>
                                        <input type="time" class="form-control" id="horaHasta" name="horaHasta" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </form>

                            </div>
                        </div>
                    </div>


                    <div class="mt-3" id="tablaReservas">
                        <h5>Reservas Realizadas</h5>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Zona Común</th>
                                    <th scope="col">Residente</th>
                                    <th scope="col">Fecha de Inicio</th>
                                    <th scope="col">Fecha de Fin</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservas as $reserva) : ?>
                                    <tr>
                                        <td><?php echo $reserva['nombre_zona']; ?></td>
                                        <td><?php echo $reserva['nombre_residente']; ?></td>
                                        <td><?php echo $reserva['fecha_inicio']; ?></td>
                                        <td><?php echo $reserva['fecha_fin']; ?></td>
                                        <td><?php echo $reserva['estado']; ?></td>
                                        <td>
                                            <!-- Botón para cancelar la reserva -->
                                            <form action="cancelar_reserva.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $reserva['id']; ?>">
                                                <button type="submit" class="btn btn-danger" <?php if ($reserva['estado'] === 'Cancelada') echo 'disabled'; ?>><i class="bi bi-x"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
        <script src="../main.js"></script>
    </body>
</html>
