<?php

include "conexion.php";

$arreglo = array();
$x = 0;

$query = "select count(id) as 'registros' from expo.registros2022mx";
$consulta = mysqli_query($conexion,$query);


?>