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


    $id_vehiculo = $_GET['id_vehiculo'];
    $estacion = $_GET['estacion'];
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
    <!-- <h5 class="text-center " style="margin-top:2%; color: var(--dark); "> </h5>
 -->



    <div class="contenedor" style="
display: flex;
flex-direction: row;
flex-wrap: wrap;
width: 100%;">
        <div style="margin: 1% auto;" class="form-group">
            <label class="col-md-4 control-label" for="rellenar"></label>
            <div class="col text-center ">
                <button type="submit" onclick="marcarCheckboxes()" id="rellenar" name="rellenar" class="btn btn-success">Marcar los checks de las inspecciones</button>
            </div>
        </div>


        <div style="margin: 1% auto;" class="form-group">
            <label class="col-md-4 control-label" for="rellenar"></label>
            <div class="col text-center ">
                <button type="submit" onclick="marcarCheckboxes2()" id="rellenar2" name="rellenar2" class="btn btn-danger">Desmarcar los checks de las inspecciones</button>
            </div>
        </div>

    </div>


    <form action="/Inspecciones/controller/registrar/insertarCabinaPintura.php?id_vehiculo=<?php echo $id_vehiculo ?>&id_estacion=<?php echo $estacion ?>&formato=<?php echo $formato ?>&id_modelo=<?php echo $formato ?>" method="POST">
        <div class="container " style="margin-top: 5%;">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <!-- table-bordered: para colocarle un borde -->
                    <table class="table table-bordered  table-striped table-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="col-md-2">Inspeccion</th>
                                <th scope="col">Contaminacion</th>
                                <th scope="col">Chorreo</th>
                                <th scope="col">Bajo Espesor</th>
                                <th scope="col">Fogueo</th>
                                <th scope="col">Desconche</th>
                                <th scope="col">Puntos de Aguja</th>
                                <th scope="col">Ojos de pez</th>
                                <th scope="col">Concha de naranja</th>
                                <th scope="col">Defectos de preparacion</th>
                                <th scope="col">Defectos de carroceria</th>
                                <th scope="col">Defectos de fibra</th>
                                <th scope="col">Otros</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($inspecciones as $inspeccion) : ?>

                                <tr>
                                    <th>
                                        <?php echo $inspeccion->d; ?>
                                    </th>

                                    <td style="position: relative; text-align: center; vertical-align: middle;"><input class="form-check-input" type="checkbox" value="Aprobado" name="CO[<?php echo $inspeccion->id; ?>]" id="12<?php echo $inspeccion->id; ?>"></td>
                                    <label class="form-check-label" for="12<?php echo $inspeccion->id; ?>"></label>
                                    <td style="position: relative; text-align: center; vertical-align: middle;"><input class="form-check-input" type="checkbox" value="Aprobado" name="CO[<?php echo $inspeccion->id; ?>]" id="11<?php echo $inspeccion->id; ?>"></td>
                                    <label class="form-check-label" for="11<?php echo $inspeccion->id; ?>"></label>
                                    <td style="position: relative; text-align: center; vertical-align: middle;"><input class="form-check-input" type="checkbox" value="Aprobado" name="BE[<?php echo $inspeccion->id; ?>]" id="10<?php echo $inspeccion->id; ?>"></td>
                                    <label class="form-check-label" for="10<?php echo $inspeccion->id; ?>"></label>
                                    <td style="position: relative; text-align: center; vertical-align: middle;"><input class="form-check-input" type="checkbox" value="Aprobado" name="FO[<?php echo $inspeccion->id; ?>]" id="9<?php echo $inspeccion->id; ?>"></td>
                                    <label class="form-check-label" for="9<?php echo $inspeccion->id; ?>"></label>
                                    <td style="position: relative; text-align: center; vertical-align: middle;"><input class="form-check-input" type="checkbox" value="Aprobado" name="DE[<?php echo $inspeccion->id; ?>]" id="8<?php echo $inspeccion->id; ?>"></td>
                                    <label class="form-check-label" for="8<?php echo $inspeccion->id; ?>"></label>
                                    <td style="position: relative; text-align: center; vertical-align: middle;"><input class="form-check-input" type="checkbox" value="Aprobado" name="PA[<?php echo $inspeccion->id; ?>]" id="7<?php echo $inspeccion->id; ?>"></td>
                                    <label class="form-check-label" for="7<?php echo $inspeccion->id; ?>"></label>
                                    <td style="position: relative; text-align: center; vertical-align: middle;"><input class="form-check-input" type="checkbox" value="Aprobado" name="OP[<?php echo $inspeccion->id; ?>]" id="6<?php echo $inspeccion->id; ?>"></td>
                                    <label class="form-check-label" for="6<?php echo $inspeccion->id; ?>"></label>
                                    <td style="position: relative; text-align: center; vertical-align: middle;"><input class="form-check-input" type="checkbox" value="Aprobado" name="CN[<?php echo $inspeccion->id; ?>]" id="5<?php echo $inspeccion->id; ?>"></td>
                                    <label class="form-chechk-label" for="5<?php echo $inspeccion->id; ?>"></label>
                                    <td style="position: relative; text-align: center; vertical-align: middle;"><input class="form-check-input" type="checkbox" value="Aprobado" name="RP[<?php echo $inspeccion->id; ?>]" id="4<?php echo $inspeccion->id; ?>"></td>
                                    <label class="form-check-label" for="4<?php echo $inspeccion->id; ?>"></label>
                                    <td style="position: relative; text-align: center; vertical-align: middle;"><input class="form-check-input" type="checkbox" value="Aprobado" name="DC[<?php echo $inspeccion->id; ?>]" id="3<?php echo $inspeccion->id; ?>"></td>
                                    <label class="form-check-label" for="3<?php echo $inspeccion->id; ?>"></label>
                                    <td style="position: relative; text-align: center; vertical-align: middle;"><input class="form-check-input" type="checkbox" value="Aprobado" name="DF[<?php echo $inspeccion->id; ?>]" id="2<?php echo $inspeccion->id; ?>"></td>
                                    <label class="form-check-label" for="2<?php echo
                                                                            $inspeccion->id; ?>"></label>


                                    <td style="position: relative; text-align: center; vertical-align: middle;"><input value="Aprobado" class="form-check-input" type="checkbox" name="OT[<?php echo $inspeccion->id; ?>]" id="1<?php echo $inspeccion->id; ?>"></td>
                                    <label class="form-check-label" for="1<?php echo $inspeccion->id; ?>"></label>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="contenedor" style="display: flex; flex-wrap: wrap; width: 100%;">
            <div style="width: 45%; margin: 2% 2%; ">
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
            <div style="width: 45%; margin: 2% 2%; ">
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
            <div style="width: 45%; margin: 2% 2%; ">
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
            <div style="width: 45%; margin: 2% 2%; ">
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
            <div style="width: 45%; margin: 2% 2%; ">
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
            <div style="width: 45%; margin: 2% 2%; ">
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
            <div style="width: 45%; margin: 2% 2%; ">
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
            <div style="width: 45%; margin: 2% 2%; ">
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
            <div style="width: 45%; margin: 2% 2%; ">
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
            <div style="width: 45%; margin: 2% 2%; ">
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
        <div style="margin: 1% auto;" class="form-group">
            <label class="col-md-4 control-label" for="rellenar"></label>
            <div class="col text-center ">
                <button type="submit" id="rellenar" name="rellenar" class="btn btn-warning">Aceptar</button>
            </div>
        </div>




    </form>

    <script>
        // JavaScript
        const checkboxes = document.querySelectorAll(".form-check-input");
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("click", function() {
                const id = this.getAttribute("data-id");
                const valor = this.checked ? "Aprobado" : "Reprobado";
                console.log(`Checkbox con ID ${id}: ${valor}`);
            });
        });

        function marcarCheckboxes() {
            const checkboxes = document.querySelectorAll(".form-check-input");
            checkboxes.forEach(checkbox => {
                checkbox.checked = true;
            });
        }

        function marcarCheckboxes2() {
            const checkboxes = document.querySelectorAll(".form-check-input");
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
        }
    </script>





<?php

    require_once("../../parte_inferior.php");
}

?>