<!-- Contenido de reservas_areas_comunes.php -->

<div class="container" id="reservaFormContainer" style="display: none;">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Reservar Área Común</h2>
                    <?php
                    // Consulta a la base de datos para obtener las zonas comunes
                    $query = "SELECT * FROM zonas_comunes";
                    $result = mysqli_query($db, $query);
                    if (mysqli_num_rows($result) > 0) {
                        // Mostrar formulario para cada zona común
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <form action="registrar_reserva.php" method="post" class="zona-form">
                                <h3><?php echo $row['nombre']; ?></h3>
                                <input type="hidden" name="id_zona" value="<?php echo $row['id']; ?>">
                                <div class="form-group">
                                    <label for="residente">Residente:</label>
                                    <select name="id_residente" class="form-control">
                                        <?php
                                        // Consulta a la base de datos para obtener la lista de residentes
                                        $query_residentes = "SELECT * FROM residentes";
                                        $result_residentes = mysqli_query($db, $query_residentes);
                                        if (mysqli_num_rows($result_residentes) > 0) {
                                            while ($row_residente = mysqli_fetch_assoc($result_residentes)) {
                                                echo '<option value="' . $row_residente['id'] . '">' . $row_residente['nombre'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="estado">Estado:</label>
                                    <input type="text" name="estado" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Reservar</button>
                                    <button type="button" class="btn btn-danger">Deshacer Reserva</button>
                                </div>
                            </form>
                            <?php
                        }
                    } else {
                        echo "No hay zonas comunes disponibles.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
