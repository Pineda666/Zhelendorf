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
    <meta property="og:image" content="images/thumbnail-faros.png">
    <meta property="og:url" content="https://zehlendorf-aros.com">
    <meta property="og:type" content="website">

    <title>Faros Zehlendorf</title>

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
        let tipo_producto = '3';
        let paginaActual = 1;

        getData(paginaActual)

        document.getElementById("campo").addEventListener("keyup", function() {
            getData(1)
        }, false)

        function getData(pagina) {
            let input = document.getElementById("campo").value;

            let url = "config/filtrar_productos.php"
            let formData = new FormData()
            formData.append('campo', input)
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