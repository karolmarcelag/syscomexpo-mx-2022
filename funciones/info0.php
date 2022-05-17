<?php

include "conexion.php";

$query = "select count(id) as 'registros' from expo.registros2022mx";
$consulta = mysqli_query($conexion,$query);
$tabla = mysqli_fetch_array($consulta);

$registros = $tabla["registros"];

echo $registros;

?>