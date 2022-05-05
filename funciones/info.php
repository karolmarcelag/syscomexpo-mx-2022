<?php

include "conexion.php";

$query = "select count(id) as 'registros' from expo.registros2022mx where cuenta like '%$('#cuenta')%'";
$consulta = mysqli_query($conexion,$query);
$tabla = mysqli_fetch_array($consulta);

//$arreglo["cantidad"][0]["registros"] = $tabla["cantidadRegistros"];


$query2 = "select cuenta, count(cuenta) as 'cantidad' from expo.registros2022mx where cuenta like '%$('#cuenta')%' group by cuenta order by count(cuenta) desc";
$consulta2 = mysqli_query($conexion,$query2);
$tabla2 = mysqli_fetch_array($consulta2);

//$arreglo["cantidad"][0]["cuenta"] = $tabla2["cantidadCuenta"];


$query3 = "select fecha, count(fecha) as 'cantidad' from expo.registros2022mx where cuenta like '%$('#cuenta')%' group by fecha order by str_to_date(fecha, '%d-%m-%Y') desc";
$consulta3 = mysqli_query($conexion,$query3);
$tabla3 = mysqli_fetch_array($consulta3);

//$arreglo["cantidad"][0]["fecha"] = $tabla3["cantidadFecha"];


$query4 = "select estado, count(estado) as 'cantidad' from expo.registros2022mx where cuenta like '%$('#cuenta')%'";
$consulta4 = mysqli_query($conexion,$query4);
$tabla4 = mysqli_fetch_array($consulta4);

//$arreglo["cantidad"][0]["estado"] = $tabla4["cantidadEstado"];


$query5 = "select nombre, apellido, cuenta, empresa, cargo, estado from expo.registros2022mx where cuenta like '%$('#cuenta')%'";
$consulta5 = mysqli_query($conexion,$query5);
$tabla5 = mysqli_fetch_array($consulta5);

//$arreglo["cantidad"][0]["datos"] = $tabla5["cantidadRegistros"];


$arreglo["tabla1"][$x]["registros"] = $tabla["cantidadRegistros"];
$arreglo["tabla2"][$x]["cuenta"] = $tabla["numeroCuenta"];
$arreglo["tabla3"][$x]["fecha"] = $tabla["cantidadFechas"];
$arreglo["tabla4"][$x]["estado"] = $tabla["cantidadEstados"];
$arreglo["tabla4"][$x]["datos"] = $tabla["datosTodos"];

echo json_encode($arreglo);

?>