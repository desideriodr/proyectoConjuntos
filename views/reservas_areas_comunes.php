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
        <?php if (!empty($zonasDisponibles)) : ?>
            <!-- Mostrar zonas disponibles -->
            <h2>Zonas Comunes Disponibles</h2>
            <ul>
                <?php foreach ($zonasDisponibles as $zona) : ?>
                    <li><?php echo $zona['nombre']; ?></li>
                    <!-- Mostrar otros detalles de la zona común si es necesario -->
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>No hay zonas comunes disponibles en este momento.</p>
        <?php endif; ?>

        <?php if (!empty($reservas)) : ?>
            <!-- Mostrar reservas actuales -->
            <h2>Reservas Actuales</h2>
            <ul>
                <?php foreach ($reservas as $reserva) : ?>
                    <li><?php echo $reserva['nombre']; ?></li>
                    <!-- Mostrar otros detalles de la reserva si es necesario -->
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>No hay reservas en este momento.</p>
        <?php endif; ?>


        <!-- Agregar formulario para hacer una nueva reserva -->
    </body>
</html>
