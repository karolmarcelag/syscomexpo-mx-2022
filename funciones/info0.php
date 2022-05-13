<?php

include "conexion.php";

$arreglo = array();
$x = 0;

$query = "select count(id) as 'registros' from expo.registros2022mx";
$consulta = mysqli_query($conexion,$query);
while($tabla = mysqli_fetch_array($consulta))
{
    $arreglo[$x]["cuenta"] = $tabla["cuenta"];
    $arreglo[$x]["cantidad"] = $tabla["cantidad"];
    $x++;
}

if($x>0)
{
    echo json_encode($arreglo);
}
else
{
    echo "-1";
}

?>