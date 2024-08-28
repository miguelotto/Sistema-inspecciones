<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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



        $sentencia = $bd->query("SELECT username as u,cargo as c,status as s FROM usuarios WHERE status = 'Activo'");
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);


    ?>


        <h2 class="text-center">Usuarios</h2>

        <div class="container " style="margin-top: 5%;">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <!-- table-bordered: para colocarle un borde -->
                    <table class="table table-bordered  table-striped table-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="col-md-2">usuario</th>
                                <th scope="col" class="col-md-4">cargo</th>
                                <th scope="col">status</th>

                                <th scope="col" class="col-md-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultado as $usuarios) : ?>
                                <tr>
                                    <th scope="row"><?php echo $usuarios->u; ?></th>
                                    <td><?php echo $usuarios->c; ?></td>
                                    <td><?php echo $usuarios->s; ?></td>

                                    <td>
                                        <a class="btn btn-warning" href="">Modificar</a>
                                        ||



                                        <a class="btn btn-danger" href="">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<?php

        require_once("../../parte_inferior.php");
    }
}

?>