// Eliminar usuario

$("document").ready(function () {
    $(".tablaUsuarios tbody").on("click", "button.btnEliminarUsuario", function () {

        var idUsuario = $(this).attr("idUsuario");
        swal({
            title: "¿Estás seguro de eliminar este usuario?",
            text: "Al continuar con la operación el usuario con número de identificación: " + idUsuario + " será eliminado y no podrá ser recuperado",
            icon: "warning",
            buttons: ["Cancelar", "Si, eliminar usuario"],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                    var datos = new FormData();
                    datos.append("btnBorrarUsuario", true);
                    datos.append("usr_id", idUsuario)

                    $.ajax({

                        url: "ajax/usuarios.ajax.php",
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
                                            window.location.href = "lista-usuarios"
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
})