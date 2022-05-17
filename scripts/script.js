$(document).ready(function()
{
    $("#enviarCorreo").click(function(_e)
    {
        send()
    })
    $("#guardar").click(function(_e)
    {
        registrar_usuario()
    })
    $("#buscar").click(function(_e)
    {
        buscar_usuario()
    })
    $("#body").click(function(_e)
    {
        autofocus()
    })
    $("#entradaqr").keypress(function(e)
    {
        if(e.which == 13) 
        {
            registrar_asistencia()
        }
    })
    $("#cliente").keypress(function(e)
    {
        if(e.which == 13) 
        {
            init()
        }
    })
    $("#usuarioFinal").click(function(_e)
    {
        checked()
    })
})

function init()
{
    //llamarInfo()
    //info0()
    info1()
    //info2()
    //info3()
}

function llamarInfo()
{
    $.post("funciones/info.php",
    {
    },
    function(respuesta)
    {
        console.log(respuesta)
        switch(parseInt(respuesta))
        {
            case -1:
                {
                    $("#tabla").html("<div style='width:100%; margin-top:15px; '><b>Aún no hay registros</b></div>")
                }
                break
            default:
                {
                    var tabla = JSON.parse(respuesta)
                    tabla_clientes = tabla

                    var codigo = ""+
                    "<table style='width:100%;'>"+
                        "<tr class='head'>"+
                            "<td class='encabezadoId'></td>"+
                            "<td class='encabezado'><b>Nombre<b></td>"+
                            "<td class='encabezado'><b>Apellido<b></td>"+
                            "<td class='encabezado'><b>No. Cliente<b></td>"+
                            "<td class='encabezado'><b>Empresa<b></td>"+
                            "<td class='encabezado'><b>Cargo<b></td>"+
                            "<td class='encabezado'><b>Estado<b></td>"+
                        "</tr>"
                    for(x=0; x<tabla.length; x++)
                    {
                        codigo+=
                        "<tr>"+
                            "<td>" + tabla[x]["id"] + "</td>"+
                            "<td>" + tabla[x]["nombre"] + "</td>"+
                            "<td>" + tabla[x]["apellido"] + "</td>"+
                            "<td>" + tabla[x]["cuenta"] + "</td>"+
                            "<td>" + tabla[x]["empresa"] + "</td>"+
                            "<td>" + tabla[x]["cargo"] + "</td>"+
                            "<td>" + tabla[x]["estado"] + "</td>"+
                        "</tr>"
                    }
                    codigo+=
                    "</table>"

                    $("#tabla").html(codigo)
                }
                break
        }
    })
}

function info0()
{
    $.post("funciones/info0.php",
    {
    },
    function(respuesta)
    {
        console.log(respuesta)
        var datos = JSON.parse(respuesta)
    })
}

function info1()
{
    $.post("funciones/info1.php",
    {
        filtro: $("#cliente").val()
    },
    function(respuesta)
    {
        console.log(respuesta)
        switch(parseInt(respuesta))
        {
            case -1:
                {
                    var codigo = ""+
                    "<table style='width:100%;'>"+
                        "<tr class='head'>"+
                            "<td class='encabezado'><b>No. Cliente<b></td>"+
                            "<td class='encabezado'><b>Cantidad<b></td>"+
                        "</tr>"+
                        "<tr>"+
                            "<td colspan=2 style='text-align:center;'>Aún no hay registros</td>"+
                        "</tr>"+
                    "</table>"

                    $("#tabla1").html(codigo)
                }
                break
            default:
                {
                    var tabla = JSON.parse(respuesta)
                    tabla_noCliente = tabla

                    var codigo = ""+
                    "<table style='width:100%;'>"+
                        "<tr class='head'>"+
                            "<td class='encabezado'><b>No. Cliente<b></td>"+
                            "<td class='encabezado'><b>Cantidad<b></td>"+
                        "</tr>"
                    for(x=0; x<tabla.length; x++)
                    {
                        codigo+=
                        "<tr>"+
                            "<td>" + tabla[x]["cuenta"] + "</td>"+
                            "<td>" + tabla[x]["cantidad"] + "</td>"+
                        "</tr>"
                    }
                    codigo+=
                    "</table>"

                    $("#tabla1").html(codigo)
                }
                break
        }
    })
}

function info2()
{
    $.post("funciones/info2.php",
    {
    },
    function(respuesta)
    {
        console.log(respuesta)
        switch(parseInt(respuesta))
        {
            case -1:
                {
                    $("#tabla").html("<div style='width:100%; margin-top:15px; '><b>Aún no hay registros</b></div>")
                }
                break
            default:
                {
                    var tabla = JSON.parse(respuesta)
                    tabla_fecha = tabla

                    var codigo = ""+
                    "<table style='width:100%;'>"+
                        "<tr class='head'>"+
                            "<td class='encabezado'><b>Fecha<b></td>"+
                            "<td class='encabezado'><b>Cantidad<b></td>"+
                        "</tr>"
                    for(x=0; x<tabla.length; x++)
                    {
                        codigo+=
                        "<tr>"+
                            "<td>" + tabla[x]["fecha"] + "</td>"+
                            "<td>" + tabla[x]["cantidad"] + "</td>"+
                        "</tr>"
                    }
                    codigo+=
                    "</table>"

                    $("#tabla2").html(codigo)
                }
                break
        }
    })
}

function info3()
{
    $.post("funciones/info3.php",
    {
    },
    function(respuesta)
    {
        console.log(respuesta)
        switch(parseInt(respuesta))
        {
            case -1:
                {
                    $("#tabla").html("<div style='width:100%; margin-top:15px; '><b>Aún no hay registros</b></div>")
                }
                break
            default:
                {
                    var tabla = JSON.parse(respuesta)
                    tabla_estado = tabla

                    var codigo = ""+
                    "<table style='width:100%;'>"+
                        "<tr class='head'>"+
                            "<td class='encabezado'><b>No. Cliente<b></td>"+
                            "<td class='encabezado'><b>Cantidad<b></td>"+
                        "</tr>"
                    for(x=0; x<tabla.length; x++)
                    {
                        codigo+=
                        "<tr>"+
                            "<td>" + tabla[x]["estado"] + "</td>"+
                            "<td>" + tabla[x]["cantidad"] + "</td>"+
                        "</tr>"
                    }
                    codigo+=
                    "</table>"

                    $("#tabla3").html(codigo)
                }
                break
        }
    })
}

function autofocus()
{
    $("#entradaqr").focus()
}

function registrar_usuario()
{
    if(validar() == true)
    {
        $("#esperar").html("<div class='loadingio-spinner-rolling-k7dywir643' style='position: absolute; top: 0; margin-left: 50%; left: -100px; margin-top: 300px; z-index: 100;'><div class='ldio-7vvtb13lcc'><div></div></div></div>")
        $('body, html').animate({ scrollTop: '0px' }, 300);
        $("#guardar").css({"display":"none"})
        $.post("funciones/registrar_usuario.php",
        {
            nombre: $("#nombre").val(),
            apellido: $("#apellido").val(),
            correo: $("#correo").val(),
            cargo: $("#cargo").val(),
            rfc: $("#rfc").val(),
            empresa: $("#empresa").val(),
            cuenta: $("#cuenta").val(),
            pais: $("#pais").val(),
            estado: $("#estado").val(),
            ciudad: $("#ciudad").val(),
            telefono: $("#telefono").val()
        },
        function(respuesta)
        {
            switch(parseInt(respuesta))
            {
                case 1:
                    {
                        generarQR()
                        $("#nombre").val("")
                        $("#correo").val("")
                        $("#cargo").val("")
                        $("#empresa").val("")
                        $("#cuenta").val("")
                        $("#pais").val("")
                        $("#estado").val("")
                        $("#ciudad").val("")
                        $("#telefono").val("")
                        $("#guardar").css({"display":"block"})
                        $("#esperar").html("")
                        alert("Registro agregado correctamente")
                        $("#info").css({"display": "none"})
                    }
                    break
                default:
                    {
                        alert("Ocurrió un error, por favor contacta al administrador\n\nError: " + respuesta)
                    }
                    break
            }
        })
    }
    else
    {
        alert("Por favor complete correctamente los campos en color rojo")
    }
}

function registrar_asistencia()
{
    $.post("funciones/registrar_asistencia.php",
    {
        lectura: $("#entradaqr").val()
    },
    function(respuesta)
    {
        console.log(respuesta)
        var datos = JSON.parse(respuesta)
        var nombre = datos[0]["nombre"]
        var apellido = datos[0]["apellido"]
        var empresa = datos[0]["empresa"]
        var cargo = datos[0]["cargo"]
        var correo = datos[0]["correo"]
        var codigo = "<span style='font-size:40px; text-align:center; margin-top:25px; margin-bottom:63px;'>Gracias " + nombre + " por acompañarnos a SYSCOMExpo 2022 Cd. México</span>"
        $("#leyenda").html(codigo)
        $("#entradaqr").val("")
        autofocus()

        var url = "funciones/pase.php?nombre=" + nombre + "&apellido=" + apellido + "&empresa=" + empresa + "&cargo=" + cargo + "&correo=" + correo;
        window.open(url, '_blank');
    })
}

function generarQR()
{
    $.post("funciones/generarQR.php",
    {
        nombre: $("#nombre").val(),
        apellido: $("#apellido").val(),
        empresa: $("#empresa").val(),
        cargo: $("#cargo").val(),
        correo: $("#correo").val()
    },
    function(respuesta)
    {
        var datos = JSON.parse(respuesta)
        var url = datos[0]["url"]
        var codigo = "" +
        "<img style='margin-top:25px;' class='qr' src='" + url + "'>"+
        "<a href='" + url + "' download='QR-SYSCOMEXPO-2022-CDMX'>"+
            "<button class='boton3'>Descargar QR</button>"+
        "</a>"+
        "<a href='formulario.php'>"+
            "<button class='boton3'>Añadir otro registro</button>"+
        "</a>"

        $("#imagenQR").html(codigo)
    })
}

function buscar_usuario()
{
    if(validarCorreo() == true)
    {
        $.post("funciones/buscar_registro.php",
        {
            correo: $("#correo").val()
        },
        function(respuesta)
        {
            var datos = JSON.parse(respuesta)
            var respuesta = parseInt(datos[0]["respuesta"])
            switch(respuesta)
            {
                case 1:
                {
                    var url = datos[0]["url"]
                    var codigo = "" +
                    "<img style='margin-top:25px;' class='qr' src='" + url + "'>"+
                    "<a href='" + url + "' download='QR-SYSCOMEXPO-2022-CDMX'>"+
                        "<button class='boton3'>Descargar QR</button>"+
                    "</a>"+
                    "<a href='buscarRegistro.html'>"+
                        "<button class='boton3'>Buscar otro registro</button>"+
                    "</a>"
                    $("#info").css({"display": "none"})
                    $("#imagenQR").html(codigo)
                }
                break
                case -1:
                {
                    alert("No fue encontrado ningún registro relacionado al correo " + $("#correo").val() + ", por favor valide los datos")
                    if(confirm("¿Desea generar un registro nuevo?") == true)
                    {
                        window.location.href = "formulario.html";
                    }
                }
                break
            }
            
        })
    }
    else
        alert("Por favor complete correctamente el campo de correo")
}

function send()
{
    if($("#notas").val() != "")
    {
        $("#enviarCorreo").css({"display":"none"})
        $.post("../funciones/send.php",
        {
            nombre: $("#nombre").val(),
            apellido: $("#apellido").val(),
            correo: $("#correo").val(),
            cargo: $("#cargo").val(),
            empresa: $("#empresa").val(),
            notas: $("#notas").val(),
            correoExpositor: $("#correoExpositor").val()
        },
        function(respuesta)
        {
            switch(parseInt(respuesta))
            {
                case 1:
                {
                    alert("Correo enviado exitosamente")
                    window.location.href = "https://expo.syscom.mx";
                }
                break
                case -1:
                {
                    alert("No fue posible enviar el correo")
                }
                break
            }
        })
    }
    else
    {
        alert("No deje el campo notas en blanco.")
    }
}

function checked()
{
    var checkbox = document.getElementById("usuarioFinal")
    if(checkbox.checked == true)
    {
        $("#contenedorCuenta").css({"display":"none"})
        $("#cargo").val("Invitado")
        $("#rfc").val("-")
        $("#empresa").val("Invitado")
        $("#cuenta").val(100)
    }
    else
    {
        $("#contenedorCuenta").css({"display":"block"})
        $("#cargo").val("")
        $("#rfc").val("")
        $("#empresa").val("")
        $("#cuenta").val("")
    }
}

function paisMexico()
{
    var paisSeleccionado = $("#pais").val()
    if(paisSeleccionado == "MX")
    {
        $("#contenedorPais").css({"display":"block"})
        $("#estado").val("")
        $("#ciudad").val("")
    }
    else
    {
        $("#contenedorPais").css({"display":"none"})
    }
}

function validar()
{
    var inputTexto = ["nombre","cargo","empresa","pais","telefono"]
    var inputNumero = ["cuenta"]
    var inputCorreo = ["correo"]
    var acumulado = 0

    for(x=0; x<inputTexto.length; x++)
    {
        var id = "#" + inputTexto[x]
            if($(id).val() == "" || $(id).val() == null)
            {
                acumulado++
                $(id).css({"border":"solid 1px red"})
            }
            else
            {
                $(id).css({"border":"solid 1px #767676"})
            }
    }

    if($("#pais").val() == "MX")
    {
        var inputTexto2 = ["estado","ciudad"]
        for(x=0; x<inputTexto2.length; x++)
        {
            var id = "#" + inputTexto2[x]
                if($(id).val() == "" || $(id).val() == null)
                {
                    acumulado++
                    $(id).css({"border":"solid 1px red"})
                }
                else
                {
                    $(id).css({"border":"solid 1px #767676"})
                }
        }
    }

    for(x=0; x<inputNumero.length; x++)
    {
        var id = "#" + inputNumero[x]
        if($(id).val() == "" || $(id).val() == 0)
        {
            acumulado++
            $(id).css({"border":"solid 1px red"})
        }
        else
        {
            $(id).css({"border":"solid 1px #767676"})
        }
    }

    for(x=0; x<inputCorreo.length; x++)
    {
        var id = "#" + inputCorreo[x]
        var correo = $(id).val()
        if(correo.indexOf("@") == -1 || correo.indexOf(".") == -1)
        {
            acumulado++
            $(id).css({"border":"solid 1px red"})
        }
        else
        {
            $(id).css({"border":"solid 1px #767676"})
        }
    }

    if(acumulado > 0)
    {
        return false
    }
    else
    {
        return true
    }
}

function validarCorreo()
{
    var inputCorreo = ["correo"]
    var acumulado = 0

    for(x=0; x<inputCorreo.length; x++)
    {
        var id = "#" + inputCorreo[x]
        var correo = $(id).val()
        if(correo.indexOf("@") == -1 || correo.indexOf(".") == -1)
        {
            acumulado++
            $(id).css({"border":"solid 1px red"})
        }
        else
        {
            $(id).css({"border":"solid 1px #767676"})
        }
    }

    if(acumulado > 0)
    {
        return false
    }
    else
    {
        return true
    }
}