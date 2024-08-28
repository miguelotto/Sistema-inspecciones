<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

require_once("../../parte_superior.php");
require_once("../../connection/conexion.php");

$chasis = $_POST['chasis'];


$sentencia = $bd->prepare("SELECT * FROM vehiculo WHERE chasis = ?");
$sentencia->execute([$chasis]);
$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);

if($resultado){
    ?> 
    <script>
        location.href="/Inspecciones/views/ubicacion/mostrarUbicaciones.php?chasis=<?php echo $chasis ?>";
    </script>
    
    
    <?php

}else{
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
                    url = "/Inspecciones/views/ubicacion/buscarUbicaciones.php";
                    location.href = url;

                } else if (resultado.dismiss === Swal.DismissReason.cancel) {
                    url = 

                    location.href = "/Inspecciones/views/ubicacion/buscarUbicaciones.php";
                }
            });
        </script>

    
    
    <?php

}


?>


<?php
require_once("../../parte_inferior.php");


?>