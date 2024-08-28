<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php require_once("../../parte_superior.php");
require_once("../../connection/conexion.php");

$chasis = $_POST['chasis'];

$sentencia = $bd->prepare("SELECT id FROM vehiculo WHERE chasis = ?");
$sentencia->execute([$chasis]);
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

if ($resultado) {
?>
    <script>
        location.href = "/Inspecciones/views/observaciones/verObservaciones.php?id=<?php echo $resultado->id ?>";
    </script>


<?php


}
?>
<script>
    Swal.fire({
        icon: "error",
        title: "Este Vehiculo no existe",
        text: "porfavor intente de nuevo",
        showConfirmButton: true,
        showCancelButton: true,
    }).then((resultado) => {
        if (resultado.isConfirmed) {
            url="/Inspecciones/views/observaciones/buscarObservaciones.php";

            location.href = url;

        } else if (resultado.dismiss === Swal.DismissReason.cancel) {
            url =

                location.href ="/Inspecciones/views/observaciones/buscarObservaciones.php";
        }
    });
</script>



<?php



?>




<?php require_once("../../parte_inferior.php"); ?>