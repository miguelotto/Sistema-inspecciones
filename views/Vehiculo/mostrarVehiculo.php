<?php

require_once("../../parte_superior.php");
require_once("../../connection/conexion.php");

$chasis = $_POST['chasis'];


$sentencia = $bd->prepare("SELECT modelo.descripcion as m , v.chasis as ch, v.status as st, v.fecha as f, usuarios.username as u FROM vehiculo v
JOIN modelo ON v.id_modelo=modelo.id JOIN estacion ON estacion.id=v.id_estacion JOIN
usuarios ON usuarios.id=v.id_usuario WHERE
chasis=?");
$sentencia->execute([$chasis]);
$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);


?>
<h2 class="text-center">Informacion del Vehiculo</h2>

<div class="container " style="margin-top: 5%;">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <!-- table-bordered: para colocarle un borde -->
            <table class="table table-bordered  table-striped table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="col-md-2">Nro de chasis</th>
                        <th scope="col">Modelo de vehiculo</th>

                        <th scope="col">Status</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">usuario que lo registro</th>
                        <!-- <th scope="col">Acciones</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultado as $vehiculos) : ?>
                        <tr>
                            <th scope="row"><?php echo $vehiculos->ch; ?></th>
                            <td><?php echo $vehiculos->m; ?></td>
                            <td><?php echo $vehiculos->st; ?></td>
                            <td><?php echo $vehiculos->f; ?></td>
                            <td><?php echo $vehiculos->u; ?></td>

                            <!--   <td>
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

<?php require_once("../../parte_inferior.php");


?>