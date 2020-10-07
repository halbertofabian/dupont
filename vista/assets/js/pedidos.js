$("document").ready(function () {


    $("#actu_pdo_estado").on("change", function () {

        var pdo_estado = $(this).val()
        var pdo_numero = $(this).attr('pdo_numero')

        var datos = new FormData();
        datos.append("pdo_estado", pdo_estado)
        datos.append("pdo_numero", pdo_numero)
        datos.append("btnCambiarEstado", true)


        $.ajax({

            url: "http://localhost/dupont/ajax/pedidos.ajax.php",
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

$(".tablaPedidos tbody").on("click", "button.btnEliminarPedido", function () {
    var pdo_numero = $(this).attr("pdo_numero")

    swal({
        title: "¿Estas seguro de querer eliminar esta salida?",
        text: "Si eliminas esta salida todo lo relacionado se eliminará y la mercancia será devuelta al inventario",
        icon: "info",
        buttons: ["No, cancelar", "Si, eliminar salida"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                var datos = new FormData()
                datos.append("btnEliminarPedido", true)
                datos.append("pdo_numero", pdo_numero)
                $.ajax({

                    url: "http://localhost/dupont/ajax/pedidos.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (res) {

                        console.log(res)

                        if (res.status) {

                            swal({
                                title: "Muy bien",
                                text: res.mensaje,
                                icon: "success",
                                buttons: [false, "Continuar"],
                                dangerMode: true,
                            })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.href = res.pagina
                                    } else {
                                        window.location.href = res.pagina

                                    }
                                });

                        } else {
                            swal({
                                title: "Error",
                                text: res.mensaje,
                                icon: "error",
                                buttons: [false, "Continuar"],
                                dangerMode: true,
                            })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.href = res.pagina
                                    } else {
                                        window.location.href = res.pagina
                                    }
                                });

                        }

                    }
                })


            }
        });

})



