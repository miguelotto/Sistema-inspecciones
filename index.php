<?php




/* $url = "/Inspecciones/";


require_once('parte_superior.php'); */
//require_once('inicio.php');



?>



<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<!------ Include the above in your HEAD tag ---------->

    <div class="container " >    
        <div id="loginbox" style="   margin-top:70px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel" >
                    <div class="panel-heading " style="background-color: #5a5c69;">
                        <div class="panel-title" style="color: white;">Iniciar sesion</div>
<!--                         <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div> -->
                    </div>     

                    <div style=" border: 0.3px solid gray;  padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form method="POST" action="/Inspecciones/controller/buscar/buscarUsuario.php" id="loginform" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="username" type="text" class="form-control" name="username" value="" placeholder="Usuario">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña">
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <!-- <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div> -->
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls text-center">
                                <!--       <a id="btn-login" href="#" class="btn btn-success">Login  </a> -->
                                      <button id="btn-fblogin" type="submit" class="btn btn-success">Aceptar</button>

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




    




<?php
/* require_once("parte_inferior.php"); */
?>