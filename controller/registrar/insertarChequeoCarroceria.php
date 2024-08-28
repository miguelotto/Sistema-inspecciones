<?php require_once("../../parte_superior.php")  ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




<?php

$id_usuario = $_SESSION['id'];

require_once("../../connection/conexion.php");
$estacion = $_GET['id_estacion'];
$id_vehiculo = $_GET['id_vehiculo'];
$formato = $_GET['formato'];
$modelo = $_GET['id_modelo'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ensamblaje = $_POST['e'];
    $fijacion = $_POST['f'];
    $apariencia = $_POST['ap'];

    $fecha_actual = date("Y/m/d");

    $numero = 1;



    $sentencia1 = $bd->prepare("UPDATE vehiculo SET id_estacion=? WHERE id=?");
    $sentencia1->execute([$estacion, $id_vehiculo]);
    $sentencia;




    foreach ($ensamblaje as $inspectionId => $selectedValue) {
        $valorInspeccion = " E: " . $selectedValue . " F: " . $fijacion[$inspectionId] . " AP: " . $apariencia[$inspectionId];
        $sentencia = $bd->prepare("INSERT INTO detalle_vehiculo(`id_inspeccion`,`resultado`,`id_vehiculo`,`id_estacion`,`fecha`,`id_usuario`)VALUES(?,?,?,?,?,?)");
        $sentencia->execute([$inspectionId, $valorInspeccion, $id_vehiculo, $estacion, $fecha_actual, $id_usuario]);

        while ($numero <= 10) {
            $observacion = $_POST[$numero];
            $sentencia = $bd->prepare("INSERT INTO observaciones(`descripcion`,`id_vehiculo`,`id_estacion`,`id_usuario`,`id_formato`,`id_modelo`)VALUES(?,?,?,?,?,?)");
            $sentencia->execute([$observacion, $id_vehiculo, $estacion, $id_usuario,$formato,$modelo]);

            $numero++;
        }


        //echo "Inspection ID: $inspectionId, Selected Value: $selectedValue<br>";
    }
    if ($sentencia == true) {
?>
        <script>
            Swal.fire({
                icon: "success",
                title: "Exito",
                text: "Inspecciones insertadas correctamente",
                showConfirmButton: true,
                showCancelButton: true,
            }).then((resultado) => {
                if (resultado.isConfirmed) {
                    url = "/Inspecciones/views/buscar.php";
                    location.href = url;

                } else if (resultado.dismiss === Swal.DismissReason.cancel) {
                    url = "/Inspecciones/views/buscar.php";


                    location.href = "/Inspecciones/views/buscar.php";
                }
            });
        </script>
    <?php

    }
    ?> <!-- <script>
        location.href = "/Inspecciones/inicio.php";
    </script> -->


<?php
} else {

    echo 'Invalid request method.';
}










?>




<?php require_once("../../parte_inferior.php") ?>