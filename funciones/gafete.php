<html>

    <head>
        <meta charset="utf-8">
        <title>Gafete SYSCOMExpo 2022</title>
        <link rel="icon" href="https://www.syscom.mx/favico/syscom_favico.png">
        <meta name="viewport" content="width=device-width, initial-scale=1, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <style>
        body
        {
            font-family: system-ui;
        }
        .cuadroInfo
        {
            text-align: center;
            float: left;
            width: 50%;
            margin-top: 5%;
        }
        .nombre
        {
            font-weight: bold;
            font-size: 35px;
        }
        .apellido
        {
            font-weight: bold;
            font-size: 25px;
        }
        .empresa
        {
            font-size: 17px;
            margin-top: 8%;
        }
        .cargo
        {
            float: left;
            margin-top: 9%;
            margin-left: 18%;
        }
        img
        {
            float: right;
            width: 20%;
            margin-right: 264px;
            margin-top: 3%;
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