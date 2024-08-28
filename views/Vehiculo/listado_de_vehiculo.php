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


    $sentencia = $bd->query("SELECT v.chasis as ch,m.descripcion as idm,m.descripcion as de,v.status as s, usuarios.username as u  FROM vehiculo v JOIN modelo m ON v.id_modelo=m.id JOIN usuarios on usuarios.id=v.id_usuario");
    $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);


?>
    <h2 class="text-center">Listado de Vehiculos</h2>

    <div class="container " style="margin-top: 5%;">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <!-- table-bordered: para colocarle un borde -->
                <table class="table table-bordered  table-striped table-responsive">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="col-md-2">Nro de chasis</th>
                            <th scope="col">Modelo de vehiculo</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Status</th>
                            <th scope="col">Usuario que lo registro</th>
                            <!--                             <th scope="col">Acciones</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultado as $vehiculos) : ?>
                            <tr>
                                <th scope="row"><?php echo $vehiculos->ch; ?></th>
                                <td><?php echo $vehiculos->idm; ?></td>
                                <td><?php echo $vehiculos->de; ?></td>
                                <td><?php echo $vehiculos->s; ?></td>
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