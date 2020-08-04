$("document").ready(function () {

    $("#actu_pdo_estado").on("change", function () {

        var pdo_estado = $(this).val()
        var pdo_numero = $(this).attr('pdo_numero')

        var datos = new FormData();
        datos.append("pdo_estado", pdo_estado)
        datos.append("pdo_numero", pdo_numero)
        datos.append("btnCambiarEstado", true)


        $.ajax({

            url: "http://192.168.100.228/dupont/ajax/pedidos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "html",
            success: function (respuesta) {

                console.log(respuesta)
                if (respuesta) {

                    swal({
                        title: "Excelente",
                        text: "Estado cambiado",
                        icon: "success",
                        button: "Continuar",
                    });


                }
            }
        })



    })




})