$("document").ready(function () {
    // Generar SKU producto  
    $("#nuevo_sku_producto").val(generarSKU(99999999))
    buscarScanProducto()
    btnAgregarProductos()


    // Eliminar producto 
    $(".tablaProductos tbody").on("click", "button.btnEliminarProducto", function () {

        var idProducto = $(this).attr("idProducto");
        swal({
            title: "¿Estás seguro de eliminar este producto?",
            text: "Al continuar con la operación el producto con SKU: " + idProducto + " será eliminado y no podrá ser recuperado",
            icon: "warning",
            buttons: ["Cancelar", "Si, eliminar producto"],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                    var datos = new FormData();
                    datos.append("btnEliminarProducto", true);
                    datos.append("pdt_sku", idProducto)

                    $.ajax({

                        url: "ajax/productos.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function (respuesta) {
                            if (respuesta.status) {

                                swal({
                                    title: "¡Muy bien!",
                                    text: respuesta.mensaje,
                                    icon: "success",
                                    buttons: [false, "Continuar"],
                                    dangerMode: true,
                                })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            window.location.href = "lista-productos"
                                        }
                                    });

                            } else {

                                swal({
                                    title: "¡Error!",
                                    text: respuesta.mensaje,
                                    icon: "error",
                                    buttons: [false, "Continuar"],
                                    dangerMode: true,
                                })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            window.back();
                                        }
                                    });
                            }
                        }
                    });

                }
            });


    })


    $("#inputScanProducto").on("keyup", function () {
        var pdt_filtro = $("#inputScanProducto").val()
        buscarScanProducto(pdt_filtro)

    })



    $("#formScanProducto").on("submit", function (e) {
        e.preventDefault()
        var pdt_filtro = $("#inputScanProducto").val()
        buscarScanProducto(pdt_filtro)

        btnAgregarProductos(pdt_filtro)


        $("#inputScanProducto").val("")

    })



})



// Generar SKU producto
function generarSKU(rango) {
    return Math.floor(Math.random() * rango);
}

function buscarScanProducto(pdt_filtro = "") {
    var datos = new FormData()

    datos.append("btnFiltroProducto", true)
    datos.append("pdt_filtro", pdt_filtro)

    $.ajax({

        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "html",
        success: function (respuesta) {
            if (respuesta) {

                $("#card-productos").html(respuesta)


            }
        }
    })
}

function btnAgregarProductos(pdt_sku = "") {
    var datos = new FormData()

    datos.append("btnAgregarCarrito", true)
    datos.append("pdt_sku", pdt_sku)

    $.ajax({

        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "html",
        success: function (respuesta) {
            if (respuesta) {

                $("#card-productos-carrito").html(respuesta)


            }
        }
    })
}

function btnQuitarProducto(pdt_sku = "") {

    var datos = new FormData()

    datos.append("btnQuitarCarrito", true)
    datos.append("pdt_sku", pdt_sku)

    $.ajax({

        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "html",
        success: function (respuesta) {
            if (respuesta) {
                $("#card-productos-carrito").html(respuesta)

            }
        }
    })
}

$(".btnImportarProductos").on("click", function () {
    swal({
        title: "¿Estas seguro de querer importar la lista de productos?",
        text: "Asegurate de tener el archivo en la locación correcta",
        icon: "info",
        buttons: ["Calcelar", "Si, importar lista"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                var datos = new FormData()

                datos.append("btnImportarProductos", true)

                $.ajax({

                    url: "ajax/productos.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {

                        $(".btnImportarProductos").attr("disabled", true)
                        $(".btnImportarProductos").removeClass("btn-success")
                        $(".btnImportarProductos").addClass("btn-secondary")
                        $(".btnImportarProductos").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="sr-only">Loading...</span> 
                        Importando productos ...`);


                    },
                    success: function (respuesta) {
                        $(".btnImportarProductos").attr("disabled", false)
                        $(".btnImportarProductos").addClass("btn-success")
                        $(".btnImportarProductos").removeClass("btn-secondary")
                        $(".btnImportarProductos").html(`<i class="fa fa-file-excel-o" aria-hidden="true"></i>
                        Importar productos`);

                        if (respuesta.status) {

                            swal({
                                title: respuesta.mensaje,
                                text: "Se registraron " + respuesta.insert + " productos \n Se actualizaron " + respuesta.update + " productos ",
                                icon: "success",
                                buttons: [false, "Ver lista"],
                                dangerMode: true,
                            })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.href = "./lista-productos"
                                    } else {
                                        window.location.href = "./lista-productos"

                                    }
                                })

                        } else {

                            swal({
                                title: "Error",
                                text: respuesta.mensaje,
                                icon: "error",
                                buttons: [false, "Intentar de nuevo"],
                                dangerMode: true,
                            })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.href = "./lista-productos"
                                    } else {
                                        window.location.href = "./lista-productos"

                                    }
                                })

                        }

                    }
                })
            }
        });
})