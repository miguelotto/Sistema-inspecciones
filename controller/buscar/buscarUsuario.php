<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
require_once("../../parte_superior.php");
require_once("../../connection/conexion.php");


$username = $_POST['username'];
$password = $_POST['password'];



$sentencia = $bd->prepare("SELECT username as u ,password as p, id ,cargo as c FROM usuarios WHERE username=?");
$sentencia->execute([$username]);
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

if ($resultado == true) {

    if (password_verify($password, $resultado->p)) {
        $_SESSION['username']=$username;
        $_SESSION['id']=$resultado->id;
        $_SESSION['cargo']=$resultado->c;
?>
        <script>
            Swal.fire({
                icon: "success",
                title: "Bienvenido",
                text: "Presione OK para continuar",
                showConfirmButton: true,

            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "/Inspecciones/inicio.php";
                }
            });
        </script>


    <?php


    } else {
    ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Contraseña Incorrecta",
                text: "Porfavor coloque una contraseña correcta",
                showConfirmButton: true,

            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "/Inspecciones/index.php";
                }
            });
        </script>


    <?php
    }

    ?>







<?php

} else {
?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Este Usuario no existe",
            showConfirmButton: true,

        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "/Inspecciones/index.php";
            }


        });
    </script>


<?php
}


//require_once("../../parte_superior.php");

?>