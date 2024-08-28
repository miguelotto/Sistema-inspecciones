<?php require_once("../../parte_superior.php")  ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>






<?php

$id_usuario = $_SESSION['id'];

require_once("../../connection/conexion.php");
$estacion = $_GET['id_estacion'];
$id_vehiculo = $_GET['id_vehiculo'];
$id_modelo = $_GET['id_modelo'];
$formato = $_GET['formato'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $inspections = $_POST['inspeccion'];
    $fecha_actual = date("Y/m/d");

    $numero = 1;



    $sentencia1 = $bd->prepare("UPDATE vehiculo SET id_estacion=? WHERE id=?");
    $sentencia1->execute([$estacion, $id_vehiculo]);
    $sentencia;


    if ($id_modelo == 19 && $estacion == 9) {
        $sentencia2 = $bd->prepare("UPDATE vehiculo SET status ='Terminado' WHERE id=?");
        $sentencia2->execute([$id_vehiculo]);
        $sentencia;
    } else if ($id_modelo != 19 && $id_modelo != 18 && $estacion == 22) {
        $sentencia2 = $bd->prepare("UPDATE vehiculo SET status ='Terminado' WHERE id=?");
        $sentencia2->execute([$id_vehiculo]);
        $sentencia;
    } else if ($id_modelo == 18 && $estacion == 31) {
        $sentencia2 = $bd->prepare("UPDATE vehiculo SET status ='Terminado' WHERE id=?");
        $sentencia2->execute([$id_vehiculo]);
        $sentencia;
    } else {
        $sentencia2 = $bd->prepare("UPDATE vehiculo SET status ='En Proceso' WHERE id=?");
        $sentencia2->execute([$id_vehiculo]);
        $sentencia;
    }











    foreach ($inspections as $inspectionId => $selectedValue) {
        $sentencia = $bd->prepare("INSERT INTO detalle_vehiculo(`id_inspeccion`,`resultado`,`id_vehiculo`,`id_estacion`,`fecha`,`id_usuario`)VALUES(?,?,?,?,?,?)");
        $sentencia->execute([$inspectionId, $selectedValue, $id_vehiculo, $estacion, $fecha_actual, $id_usuario]);

        while ($numero <= 10) {
            $observacion = $_POST[$numero];
            $sentencia = $bd->prepare("INSERT INTO observaciones(`descripcion`,`id_vehiculo`,`id_estacion`,`id_usuario`,`id_formato`,`id_modelo`)VALUES(?,?,?,?,?,?)");
            $sentencia->execute([$observacion, $id_vehiculo, $estacion, $id_usuario, $formato, $id_modelo]);

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