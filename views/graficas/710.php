<?php
require_once("../../parte_superior.php");
require_once("../../connection/conexion.php");



$sentencia1 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=1 AND id_formato=1
");
$result1 = $sentencia1->fetch(PDO::FETCH_ASSOC);


$sentencia2 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=2 AND id_formato=1
 ");
$result2 = $sentencia2->fetch(PDO::FETCH_ASSOC);

$sentencia3 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=3 AND id_formato=1
 ");
$result3 = $sentencia3->fetch(PDO::FETCH_ASSOC);


$sentencia4 = $bd->query("SELECT  COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=4 AND id_formato=1
 ");
$result4 = $sentencia4->fetch(PDO::FETCH_ASSOC);

$sentencia4 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=5 AND id_formato=1
");
$result5 = $sentencia4->fetch(PDO::FETCH_ASSOC);

// FALTA QUE SEAN ESTADISTICAS POR MODELO ASI QUE DEBO ACTUALIZAR LA BASE DE DATOS >:( 



$xd1 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=16 AND id_formato=4 AND id_modelo!=18 AND id_modelo!=19 AND id_modelo!=10
AND id_modelo!=6 AND NOT id_modelo <=4");
$resultado1 = $xd1->fetch(PDO::FETCH_ASSOC);


$xd2 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=17 AND id_formato=4 AND id_modelo!=18 AND id_modelo!=19 AND id_modelo!=10
AND id_modelo!=6 AND NOT id_modelo <=4
 ");
$resultado2 = $xd2->fetch(PDO::FETCH_ASSOC);

$xd3 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=18 AND id_formato=4 AND id_modelo!=18 AND id_modelo!=19 AND id_modelo!=10
AND id_modelo!=6 AND NOT id_modelo <=4
 ");
$resultado3 = $xd3->fetch(PDO::FETCH_ASSOC);


$xd4 = $bd->query("SELECT  COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=19 AND id_formato=4 AND id_modelo!=18 AND id_modelo!=19 AND id_modelo!=10
AND id_modelo!=6 AND NOT id_modelo <=4
 ");
$resultado4 = $xd4->fetch(PDO::FETCH_ASSOC);

$xd5 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=20 AND id_formato=4 AND id_modelo!=18 AND id_modelo!=19 AND id_modelo!=10
AND id_modelo!=6 AND NOT id_modelo <=4
");
$resultado5 = $xd5->fetch(PDO::FETCH_ASSOC);

$xd6 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=21 AND id_formato=4 AND id_modelo!=18 AND id_modelo!=19 AND id_modelo!=10
AND id_modelo!=6 AND NOT id_modelo <=4
");
$resultado6 = $xd6->fetch(PDO::FETCH_ASSOC);
$xd7 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=22 AND id_formato=4 AND id_modelo!=18 AND id_modelo!=19 AND id_modelo!=10
AND id_modelo!=6 AND NOT id_modelo <=4
");
$resultado7 = $xd7->fetch(PDO::FETCH_ASSOC);


//again


$xd1 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=10 AND id_formato=3 AND id_modelo!=18 AND id_modelo!=19 AND id_modelo!=10
AND id_modelo!=6 AND NOT id_modelo <=4
");
$resultados1 = $xd1->fetch(PDO::FETCH_ASSOC);


$xd2 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=11 AND id_formato=3 AND id_modelo!=18 AND id_modelo!=19 AND id_modelo!=10
AND id_modelo!=6 AND NOT id_modelo <=4
 ");
$resultados2 = $xd2->fetch(PDO::FETCH_ASSOC);

$xd3 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=12 AND id_formato=3 AND id_modelo!=18 AND id_modelo!=19 AND id_modelo!=10
AND id_modelo!=6 AND NOT id_modelo <=4
 ");
$resultados3 = $xd3->fetch(PDO::FETCH_ASSOC);


$xd4 = $bd->query("SELECT  COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=13 AND id_formato=3 AND id_modelo!=18 AND id_modelo!=19 AND id_modelo!=10
AND id_modelo!=6 AND NOT id_modelo <=4
 ");
$resultados4 = $xd4->fetch(PDO::FETCH_ASSOC);

//kill me

$xd3 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=14 AND id_formato=5 AND id_modelo!=18 AND id_modelo!=19 AND id_modelo!=10
AND id_modelo!=6 AND NOT id_modelo <=4
 ");
$r1 = $xd3->fetch(PDO::FETCH_ASSOC);


$xd4 = $bd->query("SELECT  COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=15 AND id_formato=5 AND id_modelo!=18 AND id_modelo!=19 AND id_modelo!=10
AND id_modelo!=6 AND NOT id_modelo <=4
 ");
$r2 = $xd4->fetch(PDO::FETCH_ASSOC);




?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Tipo', 'Cantidad'],
            <?php
            echo "['Remachado'," . $result1['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Ejes'," . $result2['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Tuberias'," . $result3['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Motor'," . $result4['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Acabado Final'," . $result5['cantidad'] . "  ],";
            ?>


        ]);

        var options = {
            title: 'Observaciones chasis ENT-710-900-3300-6100'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>


<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Tipo', 'Cantidad'],
            <?php
            echo "['Plataforma'," . $resultados1['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Estructura'," . $resultados2['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Forro Exterior'," . $resultados3['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Forro Interior'," . $resultados4['cantidad'] . "  ],";
            ?>



        ]);

        var options = {
            title: 'Observaciones Chequeo Carrocerias'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));

        chart.draw(data, options);
    }
</script>








<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Tipo', 'Cantidad'],
            <?php
            echo "['Inspeccion Externa'," . $resultado1['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Inspeccion Interna'," . $resultado2['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Piso Pletina Ventana'," . $resultado3['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Inspeccion Accesorios exterior'," . $resultado4['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Inspeccion Accesorios interior'," . $resultado5['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Inspeccion Retoque exterior'," . $resultado6['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Inspeccion Retoque interior'," . $resultado7['cantidad'] . "  ],";
            ?>



        ]);

        var options = {
            title: 'Observaciones Acabado Final ENT-610'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
    }
</script>





<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Tipo', 'Cantidad'],
            <?php
            echo "['Inspeccion Externa'," . $r1['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Inspeccion Interna'," . $r2['cantidad'] . "  ],";
            ?>




        ]);

        var options = {
            title: 'Observaciones Cabina Pintura'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart5'));

        chart.draw(data, options);
    }
</script>


<div style="
display: flex;
flex-direction: row;
flex-wrap: wrap;
width: 100%;" class="contenido">
    <div id="piechart" style="margin: 2% 2%;"></div>
    <div id="piechart1" style="margin: 2% 2%;"></div>
    <div id="piechart4" style="margin: 2% 2%;"></div>
    <div id="piechart5" style="margin: 2% 2%;"></div>
</div>




<?php
require_once("../../parte_inferior.php");


?>