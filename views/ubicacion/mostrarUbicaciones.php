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
    $chasis = $_GET['chasis'];



    require_once("../../connection/conexion.php");

    $sentencia1 = $bd->prepare("SELECT modelo.descripcion as m,v.fecha as f,estacion.descripcion as d,usuarios.username as u,v.status as s FROM vehiculo v JOIN modelo ON v.id_modelo=modelo.id JOIN estacion ON v.id_estacion=estacion.id JOIN usuarios ON usuarios.id=v.id_usuario
    WHERE v.chasis=?");
    $sentencia1->execute([$chasis]);
    

    $resultado = $sentencia1->fetch(PDO::FETCH_OBJ);

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
                            <th scope="col">Ultima Estacion inspeccionada</th>
                            <th scope="col">Usuario que lo registro</th>
                            <th scope="col">status</th>

                        </tr>
                    </thead>
                    <tbody>
                
                            <tr>
                                <th scope="row"><?php echo $chasis; ?></th>
                                <td><?php echo $resultado->m; ?></td>
                                <td><?php echo $resultado->f; ?></td>
                                <td><?php echo $resultado->d; ?></td>
                                <td><?php echo $resultado->u; ?></td>
                                <td><?php echo $resultado->s; ?></td>
                                <!-- <td>
                                <a class="btn btn-warning" href="">Modificar</a>
                                ||
                          


                                <a class="btn btn-danger" href="">Eliminar</a>
                            </td> -->
                            </tr>
                 
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<?php
    require_once("../../parte_inferior.php");
}


?>