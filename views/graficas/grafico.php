<?php
require_once("../../connection/conexion.php");
require_once("../../parte_superior.php");


$sql = "SELECT 
            SUM(CASE WHEN descripcion IS NULL OR descripcion = '' THEN 1 ELSE 0 END) AS vacios,
            SUM(CASE WHEN descripcion IS NOT NULL AND descripcion != '' THEN 1 ELSE 0 END) AS llenos
        FROM observaciones";
$result = $bd->query($sql);


$row = $result->fetch(PDO::FETCH_OBJ);
$vacios = $row->vacios;
$llenos = $row->llenos;

$sentencias = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != ''
GROUP BY descripcion; ");
$resultadosx = $sentencias->fetchAll(PDO::FETCH_OBJ);




$sentencia = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=1 AND id_formato=2
");
$result1 = $sentencia->fetch(PDO::FETCH_ASSOC);


$sentencia = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=2 AND id_formato=2
 ");
$result2 = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=3 AND id_formato=2
 ");
$result3 = $sentencia->fetch(PDO::FETCH_ASSOC);


$sentencia = $bd->query("SELECT  COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=4 AND id_formato=2
 ");
$result4 = $sentencia->fetch(PDO::FETCH_ASSOC);

$sentencia = $bd->query("SELECT descripcion, COUNT(*) AS cantidad
FROM observaciones
WHERE descripcion != '' AND id_estacion=5 AND id_formato=2
");
$result5 = $sentencia->fetch(PDO::FETCH_ASSOC);


//asldkjaksdjklasajskldkl






?>

<?php   ?>

<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Tipo', 'Cantidad'],
                ['Vacíos', <?php echo $vacios; ?>],
                ['Llenos', <?php echo $llenos; ?>]
            ]);

            var options = {
                title: 'Cantidad de observaciones vacias  y con datos'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Tipo', 'Cantidad'],

                <?php foreach ($resultadosx as $sta) {
                    echo "['" . $sta->descripcion . "'," . $sta->cantidad . "  ],";
                } ?>

            ]);

            var options = {
                title: 'Observaciones en general'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart.draw(data, options);
        }
    </script>
    <!-- graficos de comparacion en estaciones -->


   




</head>

<body>
    <div style="
display: flex;
flex-direction: row;
flex-wrap: wrap;
width: 100%;" class="contenido">

        <div id="piechart" style="margin: 2% 2%;"></div>
        <div id="piechart2" style="margin: 2% 2%; width: 55%;"></div>

      
    </div>

</body>

</html>


<?php
require_once("../../parte_inferior.php")


?>