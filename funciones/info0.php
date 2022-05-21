<?php

include "conexion.php";

$filtro = $_POST["filtro"];

$query = "select count(id) as 'registros' from expo.registros2022mx where cuenta like '%$filtro%'";
$consulta = mysqli_query($conexion,$query);
$tabla = mysqli_fetch_array($consulta);

$registros = $tabla["registros"];

echo $registros;

?>