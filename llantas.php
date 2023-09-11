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
    <meta property="og:image" content="images/thumbnail-llantas.png">
    <meta property="og:url" content="https://zehlendorf-aros.com">
    <meta property="og:type" content="website">

    <title>Llantas Zehlendorf</title>

    <link rel="icon" href="images/favicon.png" sizes="32x32">
    <link rel="icon" href="images/favicon.png" sizes="192x192">
    <link rel="apple-touch-icon" href="images/favicon.png">
    <meta name="msapplication-TileImage" content="images/favicon.png">

    <link rel="canonical" href="https://zehlendorf-aros.com">

    <link href="css/reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/filtrar_producto.js"></script>
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
            <label>Ancho:</label>
            <select id="ancho" name="ancho_llanta">
                <option value="todos">Todos</option>
                <option value="205">205</option>
                <option value="215">215</option>
                <option value="225">225</option>
                <option value="235">235</option>
                <option value="245">245</option>
                <option value="265">265</option>
                <option value="-165">-165</option>
            </select>
            <label>Perfil:</label>
            <select id="perfil" name="perfil_llanta">
                <option value="todos">Todos</option>
                <option value="40">40</option>
                <option value="45">45</option>
                <option value="55">55</option>
                <option value="60">60</option>
                <option value="65">65</option>
                <option value="70">70</option>
            </select>
            <label>Aro:</label>
            <select id="aro" name="diametro_aro">
                <option value="todos">Todos</option>
                <option value="14">14</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
            </select>
            <button type="submit" onclick="filtrar_producto('llanta');">Filtrar</button>
        </div>
        <div class="product-grid" id="resultado-busqueda">
        </div>
    </main>
    
    <footer>
        <?php require_once("resources/footer.php") ?>
    </footer>

    <script>
        window.onload = function() {
            filtrar_producto('llanta');
        };
    </script>
</body>

</html>