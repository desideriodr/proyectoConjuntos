<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas de Áreas Comunes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Reservas de Áreas Comunes</h1>
    <h2>Zonas Comunes Disponibles</h2>
    <ul>
        <?php foreach ($zonasDisponibles as $zona): ?>
            <li><?php echo $zona['nombre']; ?></li>
            <!-- Agregar formulario para hacer reserva en esta zona -->
            <!-- Este formulario debe incluir un select con los residentes y otros campos necesarios -->
        <?php endforeach; ?>
    </ul>

    <h2>Reservas Actuales</h2>
    <ul>
        <?php foreach ($reservas as $reserva): ?>
            <li><?php echo $reserva['nombre_residente']; ?> - <?php echo $reserva['zona_comun']; ?></li>
            <!-- Mostrar información sobre las reservas existentes -->
        <?php endforeach; ?>
    </ul>

    <!-- Agregar formulario para hacer una nueva reserva -->
</body>
</html>
