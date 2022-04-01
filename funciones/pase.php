<html>
    <head>
        <meta charset="utf-8">
        <title>SYSCOMExpo 2022</title>
        <link rel="icon" href="https://www.syscom.mx/favico/syscom_favico.png">
        <meta name="viewport" content="width=device-width, initial-scale=1, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <style>
        body
        {
            font-family: system-ui;
        }
        .nombre
        {
            font-size: 27px;
            width: 80%;
            text-align: center;
            top: 0;
            left: 0;
            position: absolute;
            margin-top: 48%;
            margin-left: 10%;
            font-weight: bold;
        }
        .apellido, .empresa, .cargo
        {
            font-size: 15px;
            width: 80%;
            text-align: center;
            left: 0;
            top: 0;
            position: absolute;
            margin-left: 10%;
        }
        .apellido
        {
            margin-top: 59%;
            font-size: 21px;
            font-weight: bold;
        }
        .empresa
        {
            margin-top: 72%;
        }
        .cargo
        {
            margin-top: 96%;
            text-align: center;
            margin-left: 0;
            width: 40%;
        }
        .imagen
        {
            margin-top: 89%;
            text-align: center;
            margin-left: 50%;
            width: 40%;
        }
        .fondo
        {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 0;
            width: 100%;
        }
        .cuadoInfo
        {
            position: absolute;
            z-index: 100;
            width: 100%;
            left: 0;
            top: 0;
        }
        </style>
    </head>

    <!--<body onload="window.print(); window.close();">-->
    <body onload="window.print();">
        <!--<img src="fondo.jpg" class="fondo">-->
        <div class="cuadroInfo">
            <div class="nombre"><?php echo $_GET["nombre"] ?></div>
            <div class="apellido"><?php echo $_GET["apellido"] ?></div>
            <div class="empresa"><?php echo $_GET["empresa"] ?></div>
            <div class="cargo"><?php echo $_GET["cargo"] ?></div>
            <?php
            echo "<img class='imagen' src='../codigos/".$_GET["correo"].".png'>"
            ?>
        </div>
    </body>
</html>
