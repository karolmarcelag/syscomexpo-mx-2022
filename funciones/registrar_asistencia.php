<?php

require "conexion.php";
require "openssl.php";
date_default_timezone_set('America/mexico_city');

$lecturaEncriptada = $_POST["lectura"];
$fecha = date("Y-m-d"); 
$hora = date("H:i:s"); 

$lecturaDesencriptada = Openssl::desencriptar($lecturaEncriptada);
$arreglo = json_decode($lecturaDesencriptada,true);

$nombre = $arreglo[0]["nombre"];
$apellido = $arreglo[0]["apellido"];
$correo = $arreglo[0]["correo"];
$cargo = $arreglo[0]["cargo"];
$empresa = $arreglo[0]["empresa"];
$pais = $arreglo[0]["pais"];
$estado = $arreglo[0]["estado"];
$ciudad = $arreglo[0]["ciudad"];

if($nombre != "")
{
    $consulta = "insert into expo.asistentes2022mx (nombre,apellido,correo,cargo,empresa,fecha,hora) values ('$nombre','$apellido','$correo','$cargo','$empresa','$fecha','$hora')";
    mysqli_query($conexion,$consulta);
}

$arreglo2 = array();
$arreglo2[0]["nombre"] = $nombre;
$arreglo2[0]["apellido"] = $apellido;
$arreglo2[0]["correo"] = $correo;
$arreglo2[0]["empresa"] = $empresa;
$arreglo2[0]["pais"] = $pais;
$arreglo2[0]["estado"] = $estado;
$arreglo2[0]["ciudad"] = $ciudad;

echo json_encode($arreglo2);

?>