<?php
$base_Datos = "inspecciones"; //hay que cambiar el nombre de la base de datos a usar 
$usuario = "root";
$clave = "";
$host = "127.0.0.1:3307"; //localhost o en mi caso 127.0.0.1:3307

try {
    $bd = new PDO("mysql:host=$host; dbname=$base_Datos", $usuario, $clave);
    //echo "se a conectado correctamente"; //es una manera mas segura de conectar?

} catch (Exception $e) {
    echo 'Error de conexion' . $e->getMessage();
}
