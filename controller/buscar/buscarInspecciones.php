<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
require_once("../../parte_superior.php");
require_once("../../connection/conexion.php");


$id_vehiculo = $_GET['id'];
$id_modelo = $_GET['id_modelo'];




switch ($id_modelo) {
    case $id_modelo != 19 && $id_modelo != 18:
        $estacion = 1;


        $comprobar = $bd->prepare("SELECT id FROM detalle_vehiculo WHERE id_vehiculo = ? AND id_estacion=22");
        $comprobar->execute([$id_vehiculo]);
        $resultadoC = $comprobar->fetchAll(PDO::FETCH_OBJ);

        if ($resultadoC) {
?>
            <script>
                Swal.fire({
                    icon: "warning",
                    title: "Inspecciones Completadas",
                    text: "Este vehiculo Ya completo todas sus inspecciones",
                    showConfirmButton: true,
                    showCancelButton: true,
                }).then((resultado) => {
                    if (resultado.isConfirmed) {
                        url = "/Inspecciones/views/buscar.php";


                        location.href = url;

                    } else if (resultado.dismiss === Swal.DismissReason.cancel) {
                        url = "/Inspecciones/views/buscar.php";


                        location.href = url;
                    }
                });
            </script>


            <?php
            break;
        } else {



            while ($estacion <= 5) {
                $sentencia = $bd->prepare("SELECT id FROM detalle_vehiculo WHERE id_vehiculo = ? AND id_estacion=?");
                $sentencia->execute([$id_vehiculo, $estacion]);
                $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
                if (!$resultado == true) {
            ?>
                    <script>
                        Swal.fire({
                            icon: "warning",
                            title: "Inspecciones pendientes",
                            text: "Este vehiculo tiene inspecciones pendientes,desea inspeccionarlo?",
                            showConfirmButton: true,
                            showCancelButton: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                url = "/Inspecciones/views/ensamblaje_chasis/inspeccion.php?id_vehiculo=<?php echo $id_vehiculo ?>&id_modelo=<?php echo $id_modelo ?>&estacion=<?php echo $estacion ?>";
                                location.href = url;

                            } else {


                                location.href = "/Inspecciones/views/buscar.php";
                            }
                        });
                    </script>




                    <?php

                    break;
                } else {

                    if ($estacion == 5) {
                        $estacion = 10;
                        while ($estacion <= 22) {
                            $buscar = $bd->prepare("SELECT id FROM detalle_vehiculo WHERE id_vehiculo = ? AND id_estacion=?");
                            $buscar->execute([$id_vehiculo, $estacion]);
                            $result = $buscar->fetchAll(PDO::FETCH_OBJ);

                            $buscar1 = $bd->prepare("SELECT id FROM detalle_vehiculo WHERE id_vehiculo = ? AND id_estacion=15");
                            $buscar1->execute([$id_vehiculo]);
                            $result1 = $buscar1->fetchAll(PDO::FETCH_OBJ);

                            if (!$result) {

                                if ($estacion >= 16) {
                    ?>
                                    <script>
                                        location.href = "/Inspecciones/controller/buscar/buscarElectricidad.php?estacion=<?php echo $estacion ?>&id_vehiculo=<?php echo $id_vehiculo  ?>&id_modelo=<?php echo $id_modelo ?>";
                                    </script>

                                <?php
                                    break;
                                } else {



                                ?>
                                    <script>
                                        location.href = "/Inspecciones/controller/buscar/buscarChequeo.php?estacion=<?php echo $estacion ?>&id_vehiculo=<?php echo $id_vehiculo  ?>&id_modelo=<?php echo $id_modelo ?>";
                                    </script>

                                <?php
                                    break;
                                }
                            } else if ($result == true && $estacion == 13 && !$result1) {
                                ?>
                                <script>
                                    location.href = "/Inspecciones/controller/buscar/buscarPintura.php?estacion=<?php echo $estacion ?>&id_vehiculo=<?php echo $id_vehiculo  ?>&id_modelo=<?php echo $id_modelo ?>";
                                </script>

                <?php
                                break;
                            }
                            $estacion++;
                        }
                    }
                }
                $estacion++;
            }
        }





        break;
    case 18:
        $estacion = 23;
        while ($estacion <= 31) {
            $sentencia = $bd->prepare("SELECT id FROM detalle_vehiculo WHERE id_vehiculo = ? AND id_estacion=?");
            $sentencia->execute([$id_vehiculo, $estacion]);
            $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
            if (!$resultado) {
                ?>
                <script>
                    Swal.fire({
                        icon: "warning",
                        title: "Inspecciones pendientes",
                        text: "Este vehiculo tiene inspecciones pendientes,desea inspeccionarlo ?",
                        showConfirmButton: true,
                        showCancelButton: true,
                    }).then((resultado) => {
                        if (resultado.isConfirmed) {
                            url = "/Inspecciones/views/EP-1000/evaluacionVehiculo.php?id_vehiculo=<?php echo $id_vehiculo ?>&id_modelo=<?php echo $id_modelo ?>&estacion=<?php echo $estacion ?>";


                            location.href = url;

                        } else if (resultado.dismiss === Swal.DismissReason.cancel) {
                            url = "/Inspecciones/views/buscar.php";


                            location.href = url;
                        }
                    });
                </script>


            <?php
                break;
            }

            if ($resultado && $estacion == 31) {
            ?>
                <script>
                    Swal.fire({
                        icon: "warning",
                        title: "Inspecciones Completadas",
                        text: "Este vehiculo Ya completo todas sus inspecciones",
                        showConfirmButton: true,
                        showCancelButton: true,
                    }).then((resultado) => {
                        if (resultado.isConfirmed) {
                            url = "/Inspecciones/views/buscar.php";


                            location.href = url;

                        } else if (resultado.dismiss === Swal.DismissReason.cancel) {
                            url = "/Inspecciones/views/buscar.php";


                            location.href = url;
                        }
                    });
                </script>


            <?php


            }
            $estacion++;
        }


        break;
    case 19:
        $estacion = 1;
        $sentencia3 = $bd->prepare("SELECT * FROM detalle_vehiculo WHERE id_vehiculo=? AND id_estacion=9");
        $sentencia3->execute([$id_vehiculo]);
        $resultado3 = $sentencia3->fetchAll(PDO::FETCH_OBJ);





        if ($resultado3) {
            ?>
            <script>
                Swal.fire({
                    icon: "warning",
                    title: "Inspecciones Completadas",
                    text: "Este vehiculo Ya completo todas sus inspecciones",
                    showConfirmButton: true,
                    showCancelButton: true,
                }).then((resultado) => {
                    if (resultado.isConfirmed) {
                        url = "/Inspecciones/views/buscar.php";


                        location.href = url;

                    } else if (resultado.dismiss === Swal.DismissReason.cancel) {
                        url = "/Inspecciones/views/buscar.php";


                        location.href = url;
                    }
                });
            </script>


            <?php
            break;
        } else {


            while ($estacion <= 10) {
                if ($estacion == 3 || $estacion == 5) {
                } else {

                    $sentencia = $bd->prepare("SELECT id FROM detalle_vehiculo WHERE id_vehiculo = ? AND id_estacion=?");
                    $sentencia->execute([$id_vehiculo, $estacion]);
                    $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
                    if (!$resultado) {
                        $sentencia2 = $bd->prepare("SELECT * FROM detalle_vehiculo WHERE id_vehiculo=? AND id_estacion=6");
                        $sentencia2->execute([$id_vehiculo]);
                        $resultado2 = $sentencia2->fetchAll(PDO::FETCH_OBJ);
                        if ($estacion == 4) {
                            if ($resultado == false && $resultado2 == false) {
                                $estacion = 6;
            ?>
                                <script>
                                    Swal.fire({
                                        icon: "warning",
                                        title: "Inspecciones pendientes",
                                        text: "Este vehiculo tiene inspecciones pendientes, desea inspeccionarlo?",
                                        showConfirmButton: true,
                                        showCancelButton: true,
                                    }).then((resultado) => {
                                        if (resultado.isConfirmed) {
                                            url = "/Inspecciones/views/ensamblaje_camion/inspeccion.php?id_vehiculo=<?php echo $id_vehiculo ?>&id_modelo=<?php echo $id_modelo ?>&estacion=<?php echo $estacion ?>";

                                            location.href = url;

                                        } else if (resultado.dismiss === Swal.DismissReason.cancel) {
                                            url = "/Inspecciones/views/buscar.php";


                                            location.href = url;
                                        }
                                    });
                                </script>


                            <?php

                                break;
                            } else if ($resultado == false && $resultado2 == true) {







                            ?>

                                <script>
                                    Swal.fire({
                                        icon: "warning",
                                        title: "Inspecciones pendientes",
                                        text: "Este vehiculo tiene inspecciones pendientes, desea inspeccionarlo?",
                                        showConfirmButton: true,
                                        showCancelButton: true,
                                    }).then((resultado) => {
                                        if (resultado.isConfirmed) {
                                            url = "/Inspecciones/views/ensamblaje_camion/inspeccion.php?id_vehiculo=<?php echo $id_vehiculo ?>&id_modelo=<?php echo $id_modelo ?>&estacion=<?php echo $estacion ?>";

                                            location.href = url;

                                        } else if (resultado.dismiss === Swal.DismissReason.cancel) {
                                            url = "/Inspecciones/views/buscar.php";


                                            location.href = url;
                                        }
                                    });
                                </script>


                        <?php
                                break;
                            }
                        }
                        ?>
                        <script>
                            Swal.fire({
                                icon: "warning",
                                title: "Inspecciones pendientes",
                                text: "Este vehiculo tiene inspecciones pendientes, desea inspeccionarlo?",
                                showConfirmButton: true,
                                showCancelButton: true,
                            }).then((resultado) => {
                                if (resultado.isConfirmed) {
                                    url = "/Inspecciones/views/ensamblaje_camion/inspeccion.php?id_vehiculo=<?php echo $id_vehiculo ?>&id_modelo=<?php echo $id_modelo ?>&estacion=<?php echo $estacion ?>";

                                    location.href = url;

                                } else if (resultado.dismiss === Swal.DismissReason.cancel) {
                                    url = "/Inspecciones/views/buscar.php";


                                    location.href = url;
                                }
                            });
                        </script>




<?php
                        break;
                    }
                }
                $estacion++;
            }
        }
}


?>

<?php
require_once("../../parte_inferior.php");


?>