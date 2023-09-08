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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/filtrar_aros.js"></script>
</head>

<body>

    <header>
        <?php require_once("resources/header.php") ?>
    </header>

    <main>
        <!-- para el efecto de desvanecer al cargar un filtro -->
        <div class="overlay" id="overlay"></div>
        <div class="loader" id="loader"></div>

        <div class="filtro-producto">
            <label>Vehículo:</label>
            <select id="vehiculo" name="vehiculo">
                <option value="todos">Todos</option>
                <option value="auto">Auto</option>
                <option value="camioneta">Camioneta</option>
            </select>
            <label>Diámetro:</label>
            <select id="diametro" name="diametro_aro">
                <option value="todos">Todos</option>
                <option value="15">15</option>
                <option value="6">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
            </select>
            <label>Pernos:</label>
            <select id="pernos" name="pernos">
                <option value="todos">Todos</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            <label>PCD:</label>
            <select id="pcd" name="pcd">
                <option value="todos">Todos</option>
                <option value="100">100</option>
                <option value="105">105</option>
                <option value="108">108</option>
                <option value="114.3">114.3</option>
            </select>
            <button type="submit" onclick="filtrar_aros($('#vehiculo').val(),$('#diametro').val(),$('#pernos').val(),$('#pcd').val());">Filtrar</button>
        </div>

        <div class="product-grid" id="resultado-busqueda">
        </div>
    </main>

    <footer>
        <?php require_once("resources/footer.php") ?>
    </footer>
</body>

</html>