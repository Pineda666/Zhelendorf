<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="language" content="spanish">
    <meta name="copyright" content="Aros Zehlendorf">
    <meta name="author" content="Zehlendorf Wheels">
    <meta name="audience" content="all">
    <meta name="description" content="Líder en venta de aros, llantas, faros y accesorios para autos y camionetas. Amplio catálogo. Mejora el rendimiento y estilo de tu vehículo.">
    <meta itemprop="telephone" content="+51959959195">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <meta property="og:title" content="Aros Zehlendorf">
    <meta property="og:description" content="Líder en venta de aros, llantas, faros y accesorios para autos y camionetas. Amplio catálogo.">
    <meta property="og:image" content="images/thumbnail-aros.png">
    <meta property="og:url" content="https://zehlendorf-aros.com">
    <meta property="og:type" content="website">

    <title>Aros Zehlendorf</title>

    <link rel="icon" href="images/favicon.png" sizes="32x32">
    <link rel="icon" href="images/favicon.png" sizes="192x192">
    <link rel="apple-touch-icon" href="images/favicon.png">
    <meta name="msapplication-TileImage" content="images/favicon.png">

    <link rel="canonical" href="https://zehlendorf-aros.com">

    <link href="css/reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <header>
        <?php require_once("resources/header.php") ?>
    </header>

    <main>
        <div class="filtro-producto">
            <label for="vehiculo">Vehículo:</label>
            <select id="vehiculo" name="vehiculo">
                <option value="todos">Todos</option>
                <option value="auto">Auto</option>
                <option value="camioneta">Camioneta</option>
            </select>
            <label for="diametro">Diámetro:</label>
            <select id="diametro" name="diametro_aro">
                <option value="todos">Todos</option>
                <option value="15">15</option>
                <option value="6">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
            </select>
            <label for="pernos">Pernos:</label>
            <select id="pernos" name="pernos">
                <option value="todos">Todos</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            <label for="pcd">PCD:</label>
            <select id="pcd" name="pcd">
                <option value="todos">Todos</option>
                <option value="100">100</option>
                <option value="105">105</option>
                <option value="108">108</option>
                <option value="114.3">114.3</option>
            </select>
        </div>

        <div class="product-grid" id="content">
        </div>

        <div>
            <div id="nav-paginacion"></div>
        </div>
    </main>

    <footer>
        <?php require_once("resources/footer.php") ?>
    </footer>

    <script>
        let tipo_producto = '1';
        let paginaActual = 1;

        getData(paginaActual)

        document.getElementById("campo").addEventListener("keyup", function() {
            getData(1)
        }, false)
        document.getElementById("vehiculo").addEventListener("change", function() {
            getData(paginaActual)
        }, false)
        document.getElementById("diametro").addEventListener("change", function() {
            getData(paginaActual)
        }, false)
        document.getElementById("pernos").addEventListener("change", function() {
            getData(paginaActual)
        }, false)
        document.getElementById("pcd").addEventListener("change", function() {
            getData(paginaActual)
        }, false)

        function getData(pagina) {
            let input = document.getElementById("campo").value;
            let select_vehiculo = document.getElementById("vehiculo").value;
            let select_diametro = document.getElementById("diametro").value;
            let select_pernos = document.getElementById("pernos").value;
            let select_pcd = document.getElementById("pcd").value;

            let url = "config/filtrar_productos.php"
            let formData = new FormData()
            formData.append('campo', input)
            formData.append('vehiculo', select_vehiculo)
            formData.append('diametro', select_diametro)
            formData.append('pernos', select_pernos)
            formData.append('pcd', select_pcd)
            formData.append('pagina', pagina)
            formData.append('tipo_producto', tipo_producto)

            fetch(url, {
                method: "POST",
                body: formData
            }).then(response => response.json()).then(data => {
                document.getElementById("content").innerHTML = data.data
                document.getElementById("nav-paginacion").innerHTML = data.paginacion
            }).catch(err => console.log(err))
        }
    </script>
</body>

</html>