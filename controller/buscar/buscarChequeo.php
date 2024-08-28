<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
require_once("../../parte_superior.php");
require_once("../../connection/conexion.php");

$estacion = $_GET['estacion'];
$id_modelo = $_GET['id_modelo'];
$id_vehiculo = $_GET['id_vehiculo'];


while ($estacion <= 13) {
    $sentencia = $bd->prepare("SELECT id FROM detalle_vehiculo WHERE id_vehiculo = ? AND id_estacion=?");
    $sentencia->execute([$id_vehiculo, $estacion]);
    $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (!$resultado == true) {
?>
        <script>
            Swal.fire({
                icon: "warning",
                title: "Inspecciones pendientes",
                text: "Este vehiculo tiene inspecciones pendientes en carrocerias,desea inspeccionarlo?",
                showConfirmButton: true,
                showCancelButton: true,
            }).then((resultado) => {
                if (resultado.isConfirmed) {
                    url = "/Inspecciones/views/chequeo_carroceria/inspeccion.php?id_vehiculo=<?php echo $id_vehiculo ?>&id_modelo=<?php echo $id_modelo ?>&estacion=<?php echo $estacion ?>";
                    location.href = url;

                } else if (resultado.dismiss === Swal.DismissReason.cancel) {
                    url = "/Inspecciones/views/buscar.php";


                    location.href = "/Inspecciones/views/buscar.php";
                }
            });
        </script>



<?php
        break;
    } else {
    }
    $estacion++;
}


?>


<?php require_once("../../parte_inferior.php")  ?>