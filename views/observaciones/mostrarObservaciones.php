<?php
require_once("../../parte_superior.php");
if (!isset($_SESSION['username'])) {
?>
    <script>
        alert("usted no esta autorizado");
        location.href = "";
    </script>
<?php

} else {
    require_once("../../parte_superior.php");
    require_once("../../connection/conexion.php");

    $sentencia = $bd->query("SELECT vehiculo.chasis as c,o.descripcion as d ,estacion.descripcion as ed, usuarios.username as u FROM observaciones o JOIN vehiculo ON vehiculo.id=o.id_vehiculo
JOIN estacion ON estacion.id=o.id_estacion JOIN usuarios ON usuarios.id=o.id_usuario");

    $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);






?>

    <h2 class="text-center">Observaciones</h2>

    <div class="container " style="margin: 5% 5%;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- table-bordered: para colocarle un borde -->
                <table class="table table-bordered  table-striped table-responsive">
                    <thead class="thead-dark">
                        <tr>

                            <th scope="col">Nro de chasis del vehiculo</th>
                            <th scope="col">Observacion (algunas pueden estar vacias)</th>
                            <th scope="col">Estacion en la cual se origino</th>
                            <th scope="col">Usuario que la registro</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultado as $vehiculos) : ?>
                            <tr>
                                <th scope="row"><?php echo $vehiculos->c; ?></th>
                                <td><?php echo $vehiculos->d; ?></td>
                                <td><?php echo $vehiculos->ed; ?></td>
                                <td><?php echo $vehiculos->u; ?></td>


                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>






<?php
    require_once("../../parte_inferior.php");
}

?>