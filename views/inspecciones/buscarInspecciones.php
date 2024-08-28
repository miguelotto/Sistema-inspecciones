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
 ?>



    <div class="container col-10" style="background-color: #ededed; border: 2px solid #ddd;  margin: 5% auto;">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <h2 class="text-center " style="margin-top:5%; color: var(--dark); ">Inspeccion de vehiculo</h2>


                <form action="/Inspecciones/views/inspecciones/mostrarInspecciones.php" id="registro" class="form-horizontal" method="POST">
                    <fieldset>

                        <!-- Form Name -->


                        <!-- Text input-->
                        <div class="form-group">
                            <label style=" color: var(--dark); " class="col-md-4 control-label" for="chasis">Coloque el Nro de chasis</label>
                            <div class="col-xl-12">
                                <input autocomplete="off" id="chasis" name="chasis" type="text" placeholder="Ejem: 8Y75EECK4RG000226" class="form-control input-md" required="">

                            </div>
                        </div>



                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="aceptar"></label>
                            <div class="col text-center ">
                                <button type="submit" id="aceptar" name="aceptar" class="btn btn-warning">Buscar</button>
                            </div>
                        </div>

                    </fieldset>
                </form>

            </div>
        </div>
    </div>
<?php require_once("../../parte_inferior.php");
} ?>