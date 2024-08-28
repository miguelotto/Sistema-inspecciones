<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
require_once("../../parte_superior.php");
require_once("../../connection/conexion.php");


$valor = $_POST['inspeccion'];
$id = $_GET['id_detalle'];


$sentencia = $bd->prepare("UPDATE detalle_vehiculo SET resultado=? WHERE id=?");

$sentencia->execute([$valor, $id]);

if ($sentencia) {
?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Exito",
            text: "Inspeccion modificada correctamente",
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

?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Ocurrio un error al modificar los datos",
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

}
