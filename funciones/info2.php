<?php

include "conexion.php";

$arreglo = array();
$x = 0;

$query = "select fecha, count(fecha) as 'cantidad' from expo.registros2022mx group by fecha order by str_to_date(fecha, '%d-%m-%Y') desc";
$consulta = mysqli_query($conexion,$query);
while($tabla = mysqli_fetch_array($consulta))
{
    $arreglo[$x]["fecha"] = $tabla["fecha"];
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