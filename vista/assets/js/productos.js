$("document").ready(function () {
    // Generar SKU producto  
    $("#nuevo_sku_producto").val(generarSKU(9999999))

    
})

// Generar SKU producto  
function generarSKU(rango) {
    return Math.floor(Math.random() * rango);
}