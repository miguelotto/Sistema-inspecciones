<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
require_once("../../connection/conexion.php");

$usuario = $_POST['username'];
$password = $_POST['password'];
$cargo = $_POST['cargo'];
$status = "Activo";
$clave_hasheada = password_hash($password, PASSWORD_BCRYPT);


$sentencia = $bd->prepare("INSERT INTO usuarios(`username`,`password`,`status`,`cargo`)VALUES(?,?,?,?)");

$sentencia->execute([$usuario, $clave_hasheada, $status, $cargo]);


if ($sentencia == true) {


?> <Script>
        Swal.fire({
            icon: "success",
            title: "Usuario Registrado Exitosamente",
            text: "Presione confirm para continuar",
            showConfirmButton: true,

        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "/Inspecciones/views/usuarios/nuevoUsuario.php";
            }
        });
    </Script>
<?php

} else {

?> <script>
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Ocurrio un error al crear el usuario",
            showConfirmButton: true,

        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "/Inspecciones/views/usuarios/nuevoUsuario.php";
            }
        });
    </script>

<?php
}


?>