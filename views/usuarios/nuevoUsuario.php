<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

require_once("../../parte_superior.php");
if (!isset($_SESSION['username'])) {
?>
    <script>
        alert("usted no esta autorizado");
        location.href="";
 
    </script>
<?php

} else {
    
    $cargo = $_SESSION['cargo'];
    if ($cargo == "Inspector de control de calidad") {
    ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Usted no esta autorizado para ver al modulo de usuarios",
                text: "gracias por su comprension",
                showConfirmButton: true,
                showCancelButton: true,
            }).then((resultado) => {
                if (resultado.isConfirmed) {
                    url = "/Inspecciones/inicio.php";
                    location.href = url;

                } else if (resultado.dismiss === Swal.DismissReason.cancel) {
                    url = "/Inspecciones/inicio.php";


                    location.href = "/Inspecciones/views/buscar.php";
                }
            });
        </script>




    <?php

    } else {


require_once("../../connection/conexion.php");



?>
<div class="container ">
    <div id="loginbox" style="   margin: 70px auto;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel">
            <div class="panel-heading " style="background-color: #5a5c69; height: 40px;">
                <div class="panel-title text-center" style="color: white; ">Nuevo Usuario</div>
                <!--                         <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div> -->
            </div>

            <div style=" border: 0.3px solid gray; background-color: white;  padding-top:30px" class="panel-body">

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form method="POST" id="registro" class="form-horizontal" role="form">

                    <div style="margin-bottom: 25px" class="col-sm-12 input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control input-md" name="username" value="" placeholder="Usuario">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group col-sm-12">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control " name="password" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <label style=" color: var(--dark); " class="col-md-4 control-label" for="cargo">Status</label>
                        <div class="col-md-12">
                            <select id="cargo" name="cargo" class="form-control">

                                <option class="form" value="Inspector de control de calidad">Inspector de control de calidad</option>
                                <option value="Jefe de control de calidad">Jefe control de calidad</option>



                            </select>
                        </div>
                    </div>



                    <div class="input-group">
                        <!-- <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div> -->
                    </div>


                    <div style="margin-top:10px" class="form-group">


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="aceptar"></label>
                            <div class="col text-center ">
                                <button id="aceptar" name="aceptar" class="btn btn-warning">Aceptar</button>
                            </div>
                        </div>


                        <!--  <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>     -->
                </form>



            </div>
        </div>
    </div>

</div>
<script>
    document.getElementById("registro").addEventListener('submit', function(event) {

        event.preventDefault();
        var formData = new FormData(this);
        var username = formData.get('username');
        var password = formData.get('password');
        var cargo = formData.get('cargo');



        if (!username) {

            Swal.fire({
                icon: "error",
                title: "Error",
                text: "El campo usuario no puede estar vacio",
            });
            return;


        }
        if (!password) {

            Swal.fire({
                title: "Error",
                text: "El campo contraseña no puede estar vacio",
                icon: "error",

            });
            return;


        }


        fetch('../../controller/registrar/registrarUsuario.php', {
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
</script>



<?php
require_once("../../parte_inferior.php");
}
}
?>