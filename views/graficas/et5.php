<?php
require_once("../../connection/conexion.php");
require_once("../../parte_superior.php");



$sentencia1 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=1 AND id_formato=2  AND id_modelo=19
");
$result1 = $sentencia1->fetch(PDO::FETCH_ASSOC);


$sentencia2 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=2 AND id_formato=2 AND id_modelo=19
 ");
$result2 = $sentencia2->fetch(PDO::FETCH_ASSOC);

$sentencia3 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=6 AND id_formato=2 AND id_modelo=19
 ");
$result3 = $sentencia3->fetch(PDO::FETCH_ASSOC);


$sentencia4 = $bd->query("SELECT  COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=4 AND id_formato=2 AND id_modelo=19
 ");
$result4 = $sentencia4->fetch(PDO::FETCH_ASSOC);

$sentencia4 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=7 AND id_formato=2 AND id_modelo=19
");
$result5 = $sentencia4->fetch(PDO::FETCH_ASSOC);


$sentencia4 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=8 AND id_formato=2 AND id_modelo=19
");
$result6 = $sentencia4->fetch(PDO::FETCH_ASSOC);



$sentencia4 = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=9 AND id_formato=2 AND id_modelo=19
");
$result7 = $sentencia4->fetch(PDO::FETCH_ASSOC);



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
            echo "['Tuberias y Arnes Electrico'," . $result3['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Motor'," . $result4['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Combustible y Admision'," . $result5['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Piso Cabina'," . $result6['cantidad'] . "  ],";
            ?>
            <?php
            echo "['Linea de Inspeccion'," . $result7['cantidad'] . "  ],";
            ?>




        ]);

        var options = {
            title: 'Observaciones chasis ENT-610'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>


<div style="
display: flex;
flex-direction: row;
flex-wrap: wrap;
width: 100%;" class="contenido">
        <div id="piechart" style="margin: 2% 2%;"></div>

    </div>





<?php require_once("../../parte_inferior.php"); ?>