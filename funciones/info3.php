<?php

include "conexion.php";

$arreglo = array();
$x = 0;

$query = "select estado, count(estado) as 'cantidad' from expo.registros2022mx group by estado order by count(estado) desc";
$consulta = mysqli_query($conexion,$query);
while($tabla = mysqli_fetch_array($consulta))
{
    $arreglo[$x]["estado"] = $tabla["estado"];
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