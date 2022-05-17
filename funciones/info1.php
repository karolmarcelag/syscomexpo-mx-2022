<?php

include "conexion.php";

$arreglo = array();
$x = 0;
$filtro = $_POST["filtro"];

$query = "select cuenta, count(cuenta) as 'cantidad' from expo.registros2022mx where cuenta like '%$filtro%' group by cuenta order by count(cuenta) desc";
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