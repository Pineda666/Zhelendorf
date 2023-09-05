document.addEventListener('DOMContentLoaded', function () {
    filtrar_aros("todos", "todos", "todos", "todos");
});

function filtrar_aros(vehiculo, diametro, pernos, pcd) {
    var tipo_producto = 'aro';
    var parametros = { "tipo_producto": tipo_producto, "vehiculo": vehiculo, "diametro": diametro, "pernos": pernos, "pcd": pcd };

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