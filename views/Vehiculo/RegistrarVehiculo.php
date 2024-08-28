<?php
require_once("../../parte_superior.php");
require_once("../../connection/conexion.php");

$sentencia = $bd->query("SELECT id as IM,descripcion as dm FROM modelo");
$todo = $sentencia->fetchAll(PDO::FETCH_OBJ);


?>



<div class="container col-10" style="background-color: #ededed; border: 2px solid #ddd;  margin: 5% auto;">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <h2 class="text-center " style="margin-top:5%; color: var(--dark); ">Registro de vehiculo</h2>


            <form id="registro" class="form-horizontal" method="POST">
                <fieldset>

                    <!-- Form Name -->


                    <!-- Text input-->
                    <div class="form-group">
                        <label style=" color: var(--dark); " class="col-md-4 control-label" for="chasis">Nro de chasis</label>
                        <div class="col-xl-12">
                            <input autocomplete="off" id="chasis" name="chasis" type="text" placeholder="Ejem: 8Y75EECK4RG000226" class="form-control input-md" required="">

                        </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label style=" color: var(--dark); " class="col-md-4 control-label" for="modelo" autocomplete="off">Modelo de vehiculo</label>
                        <div class="col-md-12">
                            <select id="modelo" name="modelo" class="form-control">
                                <option value="Seleccione">Seleccione</option>
                                <?php foreach ($todo as $datos) {  ?>
                                    <option value="<?php echo $datos->IM  ?>">
                                        <?php echo $datos->dm ?>
                                    </option>
                                <?php  } ?>
                            </select>

                        </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label style=" color: var(--dark); " class="col-md-4 control-label" for="status">Status</label>
                        <div class="col-md-12">
                            <select id="status" name="status" class="form-control">
                                <option value="Seleccione">Seleccione</option>
                                <option value="Creado">Creado</option>

                                <option value="En proceso">En proceso</option>
                                <option value="Terminado">Terminado</option>
                            </select>

                        </div>
                        <label style="margin-top: 10px; color: var(--dark); " class="col-md-5 control-label" for="fecha">Fecha de registro</label>
                        <div class="col-md-12">

                            <input id="fecha" name="fecha" type="date" class="form-control">
                        </div>



                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="aceptar"></label>
                        <div class="col text-center ">
                            <button type="submit" id="aceptar" name="aceptar" class="btn btn-warning">Aceptar</button>
                        </div>
                    </div>

                </fieldset>
            </form>

        </div>
    </div>
</div>
<script>
    document.getElementById("registro").addEventListener('submit', function(event) {

        event.preventDefault();
        var formData = new FormData(this);
        var modelo = formData.get('modelo');
        var status = formData.get('status');
        var fecha = formData.get('fecha');



        if (modelo == "Seleccione") {

            Swal.fire({
                icon: "error",
                title: "Error al registrar el modelo",
                text: "Coloque un modelo de vehiculo que no sea seleccione",
            });
            return;


        }
        if (status == "Seleccione") {

            Swal.fire({
                title: "Error al registrar el status del vehiculo",
                text: "Coloque un status que no sea 'Seleccione' ",
                icon: "error",

            });
            return;


        }
        if (!fecha) {

            Swal.fire({
                title: "Error al registrar la fecha del vehiculo",
                text: "el campo de fecha no puede estar vacio ",
                icon: "error",

            });
            return;


        }

        fetch('../../controller/registrar/registrarVehiculo.php', {
            method: "POST",
            body: formData,

        }).then(function(response) {
            if (response.ok) {
                Swal.fire({
                    icon: "success",
                    title: "Exito",
                    text: "Datos registrados correctamente",
                });
                return;

            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "ocurrio un error al registrar los datos",
                });
                return;
            }

        }).then(function(data) {

        }, function(rejectionReason) {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "ocurrio un error en la solicitud",
            });
            return;

        });
    });


    /*


    fetch('../../controller/registrar/registrarVehiculo.php', {
    method: "POST",
    body: formData,
    }).then(response => response.json()).then(data => {
    if (response.ok) {
    Swal.fire({
    icon: "success",
    title: "Exito",
    text: "Datos Registrados correctamente",
    });
    return;
    } else {
    Swal.fire({
    icon: "error",
    title: "Error",
    text: "ocurrio un error al registrar los datos",
    });
    return;

    }
    }).catch(error => {
    Swal.fire({
    icon: "success",
    title: "Exito",
    text: "datos registrados correctamente", //deberia ser un error pero bueno
    });
    return;
    });
    }); */
</script>






<!-- 
<div class="container" class="panel">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <h2 class="text-center">Registrar Vehiculo</h2>
            <form>
                <div class="form-group">
                    <label for="chasis">Nro de chasis</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"></div>
                        </div>
                        <input id="chasis" name="chasis" placeholder="Ejem: 8Y75EECK4RG000226" type="text" required="required" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="modelo">Modelo</label>
                    <div>
                        <select id="modelo" name="modelo" required="required" class="custom-select">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <div>
                        <select id="status" name="status" required="required" class="custom-select">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-warning">Aceptar</button>
                </div>
            </form>


        </div>
    </div>
</div>
 -->
<!-- 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form>
  <div class="form-group">
    <label for="chasis">Nro de chasis</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text"></div>
      </div> 
      <input id="chasis" name="chasis" placeholder="Ejem: 8Y75EECK4RG000226" type="text" required="required" class="form-control"> 
      <div class="input-group-append">
        <div class="input-group-text"></div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="modelo">Modelo</label> 
    <div>
      <select id="modelo" name="modelo" required="required" class="custom-select">
        <option value="">Seleccione</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="status">Status</label> 
    <div>
      <select id="status" name="status" required="required" class="custom-select">
        <option value="">Seleccione</option>
      </select>
    </div>
  </div> 
  <div class="form-group">
    <button name="submit" type="submit" class="btn btn-primary">Aceptar</button>
  </div>
</form>
 -->

<?php
require_once("../../parte_inferior.php");


?>