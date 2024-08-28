<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
require_once("../../parte_superior.php");

require_once("../../connection/conexion.php");

$chasis = $_POST['chasis'];


$sentencia = $bd->prepare("SELECT id,id_modelo as idM FROM vehiculo WHERE chasis = ?");
$sentencia->execute([$chasis]);
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);


if ($resultado == true) {
?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Vehiculo encontrado",
            text: "Desea revisar si tiene inspecciones pendientes ?",
            showConfirmButton: true,
            showCancelButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                var url = "/Inspecciones/controller/buscar/buscarInspecciones.php?id=<?php echo $resultado->id ?>&id_modelo=<?php echo $resultado->idM ?>";

                location.href = url;
            } else {
                location.href = "/Inspecciones/views/buscar.php";
            }
        });
    </script>



<?php

} else {
?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Vehiculo inexistente",
            text: "Este vehiculo no existe",
            showConfirmButton: true,

        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "/Inspecciones/views/buscar.php";
            } else {
                location.href = "/Inspecciones/views/buscar.php";
            }
        });
    </script>


<?php




}


require_once("../../parte_inferior.php");
?>