function filtrar_producto(tipo_producto, pagina) {

    if (tipo_producto == 'aro') {
        var vehiculo = document.getElementById("vehiculo").value;
        var diametro = document.getElementById("diametro").value;
        var pernos = document.getElementById("pernos").value;
        var pcd = document.getElementById("pcd").value;
        var campo = document.getElementById("campo").value;

        var parametros = { "tipo_producto": tipo_producto, "vehiculo": vehiculo, "diametro": diametro, "pernos": pernos, "pcd": pcd, "campo": campo , "pagina":pagina};
    }

    if (tipo_producto == 'llanta') {
        var ancho = document.getElementById('ancho').value;
        var perfil = document.getElementById('perfil').value;
        var aro = document.getElementById('aro').value;
        var campo = document.getElementById("campo").value;

        var parametros = { "tipo_producto": tipo_producto, "ancho": ancho, "perfil": perfil, "aro": aro, "campo": campo };
    }
    // $('#overlay').fadeIn();
    // $('#loader').fadeIn();
    $.ajax({
        data: parametros,
        url: 'config/filtrar_productos.php',
        type: 'POST',
        timeout: 10000,
        beforeSend: function () {

        },
        success: function (response) {
            document.getElementById("resultado-busqueda").innerHTML = response;
            // $('#overlay').fadeOut();
            // $('#loader').fadeOut();
        },
        error: function (response, error) {
            console.log('ERROR');
            document.getElementById("resultado-busqueda").innerHTML = error;
            // $('#overlay').fadeOut();
            // $('#loader').fadeOut();
        }
    });
}