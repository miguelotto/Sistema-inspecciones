<?php
require_once("../../parte_superior.php");
//intval te permite convertir un string a int

header('Content-Type: application/json');



require_once("../../connection/conexion.php");
$chasis = $_POST['chasis'];
$modelo = intval($_POST['modelo']);
$status = $_POST['status'];
$fecha = $_POST['fecha'];
list($año, $mes, $dia) = explode("/", $fecha);
$fechaFormat = $año . "/" . $mes . "/" . $dia;
$id_usuario = $_SESSION['id'];

if (empty($chasis) || empty($modelo) || empty($fechaFormat) || empty($status)) {
    echo json_encode(['success' => false, 'message' => 'todos los campos son obligatorios']);
    exit;
}

$sentencia = $bd->prepare("INSERT INTO vehiculo(`chasis`,`id_modelo`,`status`,`fecha`,`id_usuario`)VALUES(?,?,?,?,?) ");

$sentencia->execute([$chasis, $modelo, $status, $fechaFormat, $id_usuario]);

if ($bd->query($sentencia) == true) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al insertar los datos']);
}

error_log($chasis, $modelo, $status, $fechaFormat);
