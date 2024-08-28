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

    $estacion = $_GET['estacion'];
    /* $formato = 2; */
    $id_vehiculo = $_GET['id_vehiculo'];
    $id_modelo = $_GET['id_modelo'];


    $sentencia1 = $bd->prepare("SELECT id_formato as idf FROM formato_estacion WHERE id_estacion=? AND id_modelo =?");

    $sentencia1->execute([$estacion, $id_modelo]);
    $resultado = $sentencia1->fetch(PDO::FETCH_OBJ);


    $sentencia = $bd->prepare("SELECT id,descripcion as d FROM inspeccion WHERE id_estacion=? AND id_formato=?");
    $sentencia->execute([$estacion, $resultado->idf]);
    $inspecciones = $sentencia->fetchAll(PDO::FETCH_OBJ);

    $formato = $resultado->idf;

    $sentencia3 = $bd->prepare("SELECT descripcion as d FROM formatos WHERE id=?");
    $sentencia3->execute([$formato]);
    $titulo = $sentencia3->fetch(PDO::FETCH_OBJ);

    $sentencia4 = $bd->prepare("SELECT descripcion as d FROM estacion WHERE id=?");
    $sentencia4->execute([$estacion]);
    $titulo2 = $sentencia4->fetch(PDO::FETCH_OBJ);

    $sentencia5 = $bd->prepare("SELECT descripcion as d FROM modelo WHERE id=?");
    $sentencia5->execute([$id_modelo]);
    $titulo3 = $sentencia5->fetch(PDO::FETCH_OBJ);










?>


    <h2 class="text-center " style="margin-top:5%; color: var(--dark); "><?php echo $titulo->d ?></h2>
    <h3 class="text-center " style="margin-top:2%; color: var(--dark); "><?php echo $titulo2->d ?> </h3>
    <h4 class="text-center " style="margin-top:2%; color: var(--dark); "><?php echo $titulo3->d ?> </h4>

    <div class="contenedor" style="
display: flex;
flex-direction: row;
flex-wrap: wrap;
width: 100%;">
        <div style="margin: 1% auto;" class="form-group">
            <label class="col-md-4 control-label" for="rellenar"></label>
            <div class="col text-center ">
                <button type="submit" onclick="marcarAprobado()" id="rellenar" name="rellenar" class="btn btn-success">Aprobar todas las inspecciones</button>
            </div>
        </div>


        <div style="margin: 1% auto;" class="form-group">
            <label class="col-md-4 control-label" for="rellenar"></label>
            <div class="col text-center ">
                <button type="submit" onclick="marcarReprobado()" id="rellenar2" name="rellenar2" class="btn btn-danger">Reprobar todas las inspecciones</button>
            </div>
        </div>

    </div>
    <form action="/Inspecciones/controller/registrar/insertarDetalleVehiculo.php?id_vehiculo=<?php echo $id_vehiculo ?>&id_estacion=<?php echo $estacion ?>&id_modelo=<?php echo $id_modelo  ?>&formato=<?php echo $formato ?>" id="registro" method="POST">

        <div class="container" style="
display: flex;
flex-direction: row;
flex-wrap: wrap;
width: 100%;">
            <div class="row" style="margin: 2% 2%;">

                <?php foreach ($inspecciones as $inspeccion) : ?>
                    <div style="width: 430px; margin: 2% 2%; ">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="color: var(--dark);" class="card-title"><?php echo $inspeccion->d; ?></h5>
                                <p class="card-text"></p>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="inspeccion[<?php echo $inspeccion->id; ?>]" id="<?php echo $inspeccion->id; ?>" value="Aprobado">
                                    <label class="form-check-label" for="<?php echo $inspeccion->id; ?>">Aprobado</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="inspeccion[<?php echo $inspeccion->id; ?>]" id="<?php echo $inspeccion->id; ?>" value="Reprobado">
                                    <label class="form-check-label" for="<?php echo $inspeccion->id; ?>">Reprobado</label>
                                </div>


                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div style="width: 430px; margin: 2% 2%; ">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-text"></p>
                            <div class="form-group">
                                <label style=" color: var(--dark); " class="col-md-5 control-label" for="chasis">Observaciones</label>
                                <div class="col-xl-12">
                                    <input style="height: 30px;" autocomplete="off" id="1" name="1" type="text" placeholder="Observacion Nro.1" class="form-control input-md">

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div style="width: 430px; margin: 2% 2%; ">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-text"></p>
                            <div class="form-group">
                                <label style=" color: var(--dark); " class="col-md-5 control-label" for="chasis">Observaciones</label>
                                <div class="col-xl-12">
                                    <input style="height: 30px;" autocomplete="off" id="2" name="2" type="text" placeholder="Observacion Nro.2" class="form-control input-md">

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div style="width: 430px; margin: 2% 2%; ">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-text"></p>
                            <div class="form-group">
                                <label style=" color: var(--dark); " class="col-md-5 control-label" for="chasis">Observaciones</label>
                                <div class="col-xl-12">
                                    <input style="height: 30px;" autocomplete="off" id="3" name="3" type="text" placeholder="Observacion Nro.3" class="form-control input-md">

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div style="width: 430px; margin: 2% 2%; ">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-text"></p>
                            <div class="form-group">
                                <label style=" color: var(--dark); " class="col-md-5 control-label" for="chasis">Observaciones</label>
                                <div class="col-xl-12">
                                    <input style="height: 30px;" autocomplete="off" id="4" name="4" type="text" placeholder="Observacion Nro.4" class="form-control input-md">

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div style="width: 430px; margin: 2% 2%; ">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-text"></p>
                            <div class="form-group">
                                <label style=" color: var(--dark); " class="col-md-5 control-label" for="chasis">Observaciones</label>
                                <div class="col-xl-12">
                                    <input style="height: 30px;" autocomplete="off" id="5" name="5" type="text" placeholder="Observacion Nro.5" class="form-control input-md">

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div style="width: 430px; margin: 2% 2%; ">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-text"></p>
                            <div class="form-group">
                                <label style=" color: var(--dark); " class="col-md-5 control-label" for="chasis">Observaciones</label>
                                <div class="col-xl-12">
                                    <input style="height: 30px;" autocomplete="off" id="6" name="6" type="text" placeholder="Observacion Nro.6" class="form-control input-md">

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div style="width: 430px; margin: 2% 2%; ">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-text"></p>
                            <div class="form-group">
                                <label style=" color: var(--dark); " class="col-md-5 control-label" for="chasis">Observaciones</label>
                                <div class="col-xl-12">
                                    <input style="height: 30px;" autocomplete="off" id="7" name="7" type="text" placeholder="Observacion Nro.7" class="form-control input-md">

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div style="width: 430px; margin: 2% 2%; ">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-text"></p>
                            <div class="form-group">
                                <label style=" color: var(--dark); " class="col-md-5 control-label" for="chasis">Observaciones</label>
                                <div class="col-xl-12">
                                    <input style="height: 30px;" autocomplete="off" id="8" name="8" type="text" placeholder="Observacion Nro.8" class="form-control input-md">

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div style="width: 430px; margin: 2% 2%; ">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-text"></p>
                            <div class="form-group">
                                <label style=" color: var(--dark); " class="col-md-5 control-label" for="chasis">Observaciones</label>
                                <div class="col-xl-12">
                                    <input style="height: 30px;" autocomplete="off" id="9" name="9" type="text" placeholder="Observacion Nro.9" class="form-control input-md">

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div style="width: 430px; margin: 2% 2%; ">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-text"></p>
                            <div class="form-group">
                                <label style=" color: var(--dark); " class="col-md-5 control-label" for="chasis">Observaciones</label>
                                <div class="col-xl-12">
                                    <input style="height: 30px;" autocomplete="off" id="10" name="10" type="text" placeholder="Observacion Nro.10" class="form-control input-md">

                                </div>
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
    <script>
        function marcarAprobado() {
            const radioButtons = document.querySelectorAll('input[type="radio"]');
            radioButtons.forEach(radio => {
                if (radio.value === 'Aprobado') {
                    radio.checked = true;
                }
            });
        }

        function marcarReprobado() {
            const radioButtons = document.querySelectorAll('input[type="radio"]');
            radioButtons.forEach(radio => {
                if (radio.value === 'Reprobado') {
                    radio.checked = true;
                }
            });
        }
    </script>

<?php
    require_once("../../parte_inferior.php");
}
?>