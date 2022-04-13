<html>
    <head>
        <meta charset="utf-8">
        <title>Intento SYSCOMExpo 2022</title>
        <link rel="icon" href="https://www.syscom.mx/favico/syscom_favico.png">
        <meta name="viewport" content="width=device-width, initial-scale=1, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <style>
        body
        {
            font-family: system-ui;
        }
        .cuadroInfo
        {
            width: 50%;
            margin-top: 2%;
            float: left;
        }
        .nombre
        {
            text-align: center;
            width: 90%;
            font-size: 35px;
            font-weight: bold;
            margin-top: 30%;
        }
        .apellido, .empresa, .cargo
        {
            text-align: center;
            width: 85%;
        }
        .apellido
        {
            font-size: 25px;
            font-weight: bold;
        }
        .empresa
        {
            font-size: 17px;
            margin-top: 5%;
        }
        .cargo
        {
            float: left;
            width: 40%;
            font-size: 14px;
            margin-top: 11%;
            margin-right: 5px;
        }
        img
        {
            width: 25%;
            float: right;
            margin-top: 3%;
            margin-right: 10%;
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