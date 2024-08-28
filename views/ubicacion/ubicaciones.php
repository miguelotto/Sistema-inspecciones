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



    require_once("../../connection/conexion.php");

    $sentencia1 = $bd->query("SELECT chasis as c,modelo.descripcion as m,v.fecha as f,estacion.descripcion as d,usuarios.username as u FROM vehiculo v JOIN modelo ON v.id_modelo=modelo.id JOIN estacion ON v.id_estacion=estacion.id JOIN usuarios ON usuarios.id=v.id_usuario");

    $resultado = $sentencia1->fetchAll(PDO::FETCH_OBJ);

?>


    <h2 class="text-center">Ubicacion de vehiculos</h2>

    <div class="container " style="margin-top: 5%;">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <!-- table-bordered: para colocarle un borde -->
                <table class="table table-bordered  table-striped table-responsive">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="col-md-2">Nro de chasis</th>
                            <th scope="col">Modelo de vehiculo</th>
                            <th scope="col">fecha</th>
                            <th scope="col">Ultima estacion inspeccionada</th>
                            <th scope="col">Usuario que lo registro</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultado as $vehiculos) : ?>
                            <tr>
                                <th scope="row"><?php echo $vehiculos->c; ?></th>
                                <td><?php echo $vehiculos->m; ?></td>
                                <td><?php echo $vehiculos->f; ?></td>
                                <td><?php echo $vehiculos->d; ?></td>
                                <td><?php echo $vehiculos->u; ?></td>
                                <!-- <td>
                                <a class="btn btn-warning" href="">Modificar</a>
                                ||
                          


                                <a class="btn btn-danger" href="">Eliminar</a>
                            </td> -->
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