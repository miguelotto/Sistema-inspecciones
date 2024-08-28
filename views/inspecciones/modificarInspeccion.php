<?php
require_once("../../parte_superior.php");
require_once("../../connection/conexion.php");




?>
<?php
$id = $_GET['id_detalle'];
$chasis = $_GET['chasis'];

$sentencia = $bd->prepare("SELECT resultado as r ,inspeccion.descripcion as d  FROM detalle_vehiculo dv JOIN inspeccion ON inspeccion.id=dv.id_inspeccion WHERE dv.id=? ");
$sentencia->execute([$id]);
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);









if ($resultado->r == "Aprobado") {

?>

    <form action="/Inspecciones/controller/modificar/modificarInspecciones.php?id_detalle=<?php echo $id  ?>&chasis=<?php echo $chasis ?>" id="registro" method="POST">

        <div class="container" style="
display: flex;
flex-direction: row;
flex-wrap: wrap;
width: 100%;">
            <div class="row" style="margin: 2% 2%;">


                <div style="width: 430px; margin: 2% 2%; ">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: var(--dark);" class="card-title"><?php echo $resultado->d; ?></h5>
                            <p class="card-text"></p>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="inspeccion" id="inspeccion" checked value="Aprobado">
                                <label class="form-check-label" for="inspeccion">Aprobado</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="inspeccion" id="inspeccion" value="Reprobado">
                                <label class="form-check-label" for="inspeccion">Reprobado</label>
                            </div>
                        </div>
                    </div>
                </div>









            </div>








        </div>
        <div class="boton">
            <div style="margin: 1% auto;" class="form-group">
                <label class="col-md-4 control-label" for="aceptar"></label>
                <div class="col text-center ">
                    <button type="submit" id="aceptar" name="aceptar" class="btn btn-warning">Aceptar</button>
                </div>
            </div>
        </div>


    </form>



<?php





} else {


?>

    <form action="/Inspecciones/controller/modificar/modificarInspecciones.php?id_detalle=<?php echo $id  ?>" id="registro" method="POST">

        <div class="container" style="
display: flex;
flex-direction: row;
flex-wrap: wrap;
width: 100%;">
            <div class="row" style="margin: 2% 2%;">


                <div style="width: 430px; margin: 2% 2%; ">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: var(--dark);" class="card-title"><?php echo $resultado->d; ?></h5>
                            <p class="card-text"></p>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="inspeccion" id="inspeccion" value="Aprobado">
                                <label class="form-check-label" for="inspeccion">Aprobado</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="inspeccion" id="inspeccion" checked value="Reprobado">
                                <label class="form-check-label" for="inspeccion">Reprobado</label>
                            </div>
                        </div>
                    </div>
                </div>









            </div>








        </div>
        <div class="boton">
            <div style="margin: 1% auto;" class="form-group">
                <label class="col-md-4 control-label" for="aceptar"></label>
                <div class="col text-center ">
                    <button type="submit" id="aceptar" name="aceptar" class="btn btn-warning">Aceptar</button>
                </div>
            </div>
        </div>


    </form>



<?php





}



?>





<?php
require_once("../../parte_inferior.php");
?>