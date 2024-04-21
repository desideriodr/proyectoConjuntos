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

                    <div id="reservasContent" class="reservas-content">
                        <div class="card-reservas">
                            <div class="card-header">
                                Reservas de Áreas Comunes
                            </div>
                            <div class="card-body" style="display: inline-block;">
                                <!-- Contenido de las reservas -->
                                <table class="table table-striped table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nombre de la Zona</th>
                                            <th>Capacidad Máxima</th>
                                            <th>Residente</th>
                                            <th>Cantidad invitados</th>
                                            <th>Estado</th>
                                            <th>Desde</th>
                                            <th>Hasta</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Incluir el archivo del controlador
                                        require_once 'C:/XAMPP/htdocs/proyectoConjuntos/controllers/ReservasController.php';

                                        // Crear una instancia del controlador de reservas
                                        $reservasController = new ReservasController();

                                        // Obtener las zonas disponibles
                                        $zonasDisponibles = $reservasController->mostrarZonas();

                                        // Obtener los residentes disponibles (supongamos que existe un método para esto en el controlador)
                                        $residentesDisponibles = $reservasController->mostrarResidentes();

                                        // Iterar sobre las zonas disponibles y mostrar cada una en una fila de la tabla
                                        foreach ($zonasDisponibles as $zona) {
                                            echo "<tr>";
                                            echo "<td>" . $zona['nombre'] . "</td>";
                                            echo "<td>" . $zona['capacidadMax'] . "</td>";
                                            echo "<td>"; // Abre la celda para el campo de selección
                                            echo "<select name='residente' class='form-control'>"; // Abre el select
                                            echo "<option value='' selected>Seleccione..</option>"; // Opción por defecto
                                            // Iterar sobre los residentes y generar las opciones del select
                                            foreach ($residentesDisponibles as $residente) {
                                                echo "<option value='" . $residente['id'] . "'>" . $residente['nombre'] . "</option>";
                                            }
                                            echo "</select>"; // Cierra el select
                                            echo "</td>"; // Cierra la celda
                                            // Agrega la celda para el campo de cantidad de invitados
                                            echo "<td>";
                                            echo "<input type='number' name='cantidadInvitados' min='0' max='" . $zona['capacidadMax'] . "'>";
                                            echo "</td>";
                                            echo "<td>"; // Abre la celda para el estado
                                            // Agregar una clase de Bootstrap dependiendo del estado
                                            $estadoClass = ($zona['estado'] === 'Libre') ? 'text-success' : 'text-danger';
                                            echo "<span class='badge badge-pill $estadoClass'>" . $zona['estado'] . "</span>";
                                            echo "</td>"; // Cierra la celda del estado
                                            // Agrega las celdas para los campos de fecha desde y hasta
                                            echo "<td><input type='date' name='fechaDesde' value='--------'></td>";
                                            echo "<td><input type='date' name='fechaHasta' value='--------'></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="../main.js"></script>
    </body>
</html>
