document.addEventListener('DOMContentLoaded', function () {
    filtrar_llantas("todos", "todos", "todos");
});

function filtrar_llantas(ancho, perfil, aro) {
    var tipo_producto = 'llanta';
    var parametros = { "tipo_producto": tipo_producto, "ancho": ancho, "perfil": perfil, "aro": aro};

    $('#overlay').fadeIn();
    $('#loader').fadeIn();

    $.ajax({
        data: parametros,
        url: 'config/filtrar_productos.php',
        type: 'POST',
        timeout: 10000,
        beforeSend: function () {

        },
        success: function (response) {
            document.getElementById("resultado-busqueda").innerHTML = response;
            $('#overlay').fadeOut();
            $('#loader').fadeOut();
        },
        error: function (response, error) {
            console.log('ERROR');
            document.getElementById("resultado-busqueda").innerHTML = error;
            $('#overlay').fadeOut();
            $('#loader').fadeOut();
        }
    });
}