<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    $chasis = $_POST['chasis'];


    $sentencia = $bd->prepare("SELECT v.id as idm,modelo.descripcion as m  FROM vehiculo v JOIN modelo ON v.id_modelo=modelo.id WHERE chasis=? ");
    $sentencia->execute([$chasis]);
    $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

    if (!$resultado) {
    ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Este Vehiculo no existe",
                showConfirmButton: true,
                showCancelButton: true,
            }).then((resultado) => {
                if (resultado.isConfirmed) {
                    url = "/Inspecciones/views/inspecciones/buscarInspecciones.php";
                    location.href = url;

                } else if (resultado.dismiss === Swal.DismissReason.cancel) {
                    url = "/Inspecciones/views/inspecciones/buscarInspecciones.php";


                    location.href = url;
                }
            });
        </script>

    <?php


    } else {


        $sentencia2 = $bd->prepare("SELECT dv.id as idD ,usuarios.username as u, inspeccion.descripcion as d,dv.resultado as r, estacion.descripcion as ed ,dv.fecha as f  FROM detalle_vehiculo dv JOIN inspeccion ON dv.id_inspeccion =inspeccion.id
JOIN vehiculo ON dv.id_vehiculo=vehiculo.id JOIN estacion ON dv.id_estacion=estacion.id JOIN
usuarios ON usuarios.id=dv.id_usuario WHERE dv.id_vehiculo=?");
        $sentencia2->execute([$resultado->idm]);
        $inspecciones = $sentencia2->fetchAll(PDO::FETCH_OBJ);




    ?>

        <h2 class="text-center">Inspecciones de <?php echo $resultado->m ?></h2>

        <div class="container " style="margin-top: 5%;">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <!-- table-bordered: para colocarle un borde -->
                    <table class="table table-bordered  table-striped table-responsive">
                        <thead class="thead-dark">
                            <tr>

                                <th scope="col">Inspeccion</th>
                                <th scope="col">Resultado</th>
                                <th scope="col">Estacion de la inspeccion</th>
                                <th class="col-sm-5" scope="col">Fecha de registro </th>
                                <th class="col-sm-5" scope="col">Usuario que la registro</th>
                                <th class="col-sm-5" scope="col">Accion</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            <?php foreach ($inspecciones as $vehiculos) : ?>
                                <tr>
                                    <th scope="row"><?php echo $vehiculos->d; ?></th>
                                    <td><?php echo $vehiculos->r; ?></td>
                                    <td><?php echo $vehiculos->ed; ?></td>
                                    <td><?php echo $vehiculos->f; ?></td>
                                    <td><?php echo $vehiculos->u; ?></td>
                                    <td> <a class="btn btn-warning" href="/Inspecciones/views/inspecciones/modificarInspeccion.php?id_detalle=<?php echo $vehiculos->idD ?>&chasis=<?php echo $chasis ?>">Modificar</a></td>

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
}
?>