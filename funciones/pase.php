
<html><head>
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
        font-size: 26px;
        width: 80%;
        text-align: center;
        top: 0;
        left: 0;
        position: absolute;
        margin-top: 62%;
        margin-left: 10%;
        font-weight: bold;
    }
    .empresa
    {
        font-size: 14px;
        width: 80%;
        text-align: center;
        left: 0;
        top: 0;
        position: absolute;
        margin-top: 85%;
        margin-left: 10%;
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
            <div class="nombre"><?php echo $_GET["nombre"] ?></div>
        </div>
    </body>
</html>
