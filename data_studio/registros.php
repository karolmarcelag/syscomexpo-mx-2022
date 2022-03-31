<?php

$tipo = $_GET["type"];

include "../funciones/conexion.php";

switch($tipo)
{
    case "table":
        {
            $query1 = "select nombre, apellido, correo, cargo, rfc, empresa, cuenta, ciudad, estado, telefono, fecha
            from expo.registros2022mx";
            $consulta1 = mysqli_query($conexion,$query1);
            
            $codigo = "
            <table>
                <tr>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Correo</td>
                    <td>Cargo</td>
                    <td>RFC</td>
                    <td>Empresa</td>
                    <td>No. Cliente</td>
                    <td>Ciudad</td>
                    <td>Estado</td>
                    <td>Teléfono</td>
                    <td>Fecha</td>
                </tr>
            ";
            while($tabla1 = mysqli_fetch_array($consulta1))
            {
                $codigo.="
                <tr>
                    <td>".$tabla1["nombre"]."</td>
                    <td>".$tabla1["apellido"]."</td>
                    <td>".$tabla1["correo"]."</td>
                    <td>".$tabla1["cargo"]."</td>
                    <td>".$tabla1["rfc"]."</td>
                    <td>".$tabla1["empresa"]."</td>
                    <td>".$tabla1["cuenta"]."</td>
                    <td>".$tabla1["ciudad"]."</td>
                    <td>".$tabla1["estado"]."</td>
                    <td>".str_replace("+52","",$tabla1["telefono"])."</td>
                    <td>".$tabla1["fecha"]."</td>
                </tr>
                ";
            }
            $codigo.="
            </table>
            ";
            
            echo $codigo;
        }
        break;
    case "json":
        {
            $arreglo = array();
            $x=0;

            $query1 = "select nombre, apellido, correo, cargo, rfc, empresa, cuenta, ciudad, estado, telefono, fecha
            from expo.registros2022mx";
            $consulta1 = mysqli_query($conexion,$query1);

            while($tabla1 = mysqli_fetch_array($consulta1))
            {
                $arreglo[$x]["Nombre"] = $tabla1["nombre"];
                $arreglo[$x]["Apellido"] = $tabla1["apellido"];
                $arreglo[$x]["Correo"] = $tabla1["correo"];
                $arreglo[$x]["Cargo"] = $tabla1["cargo"];
                $arreglo[$x]["RFC"] = $tabla1["rfc"];
                $arreglo[$x]["Empresa"] = $tabla1["empresa"];
                $arreglo[$x]["No. Cliente"] = $tabla1["cuenta"];
                $arreglo[$x]["Ciudad"] = $tabla1["ciudad"];
                $arreglo[$x]["Estado"] = $tabla1["estado"];
                $arreglo[$x]["Teléfono"] = $tabla1["telefono"];
                $arreglo[$x]["Fecha"] = date("Y-m-d",strtotime($tabla1["fecha"]));
                $x++;
            }

            echo json_encode($arreglo);
        }
        break;
    case "excel":
        {
            echo "<meta charset='utf-8'>";
            
            $nombre_archivo = "registros_clientes";

            header("Content-type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=$nombre_archivo.xls");
            header("Pragma: no-cache");
            header("Expires: 0");

            $query1 = "select nombre, apellido, correo, cargo, rfc, empresa, cuenta, ciudad, estado, telefono, fecha
            from expo.registros2022mx";
            $consulta1 = mysqli_query($conexion,$query1);
            
            $codigo = "
            <table>
                <tr>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Correo</td>
                    <td>Cargo</td>
                    <td>RFC</td>
                    <td>Empresa</td>
                    <td>No. Cliente</td>
                    <td>Ciudad</td>
                    <td>Estado</td>
                    <td>Teléfono</td>
                    <td>Fecha</td>
                </tr>
            ";
            while($tabla1 = mysqli_fetch_array($consulta1))
            {
                $codigo.="
                <tr>
                    <td>".$tabla1["nombre"]."</td>
                    <td>".$tabla1["apellido"]."</td>
                    <td>".$tabla1["correo"]."</td>
                    <td>".$tabla1["cargo"]."</td>
                    <td>".$tabla1["rfc"]."</td>
                    <td>".$tabla1["empresa"]."</td>
                    <td>".$tabla1["cuenta"]."</td>
                    <td>".$tabla1["ciudad"]."</td>
                    <td>".$tabla1["estado"]."</td>
                    <td>".str_replace("+52","",$tabla1["telefono"])."</td>
                    <td>".$tabla1["fecha"]."</td>
                </tr>
                ";
            }
            $codigo.="
            </table>
            ";
            
            echo $codigo;
        }
        break;
        default:
        {
            header("Location: https://syscom.mx");
        }
        break;
}