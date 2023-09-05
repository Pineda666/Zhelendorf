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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <meta property="og:title" content="Aros Zehlendorf">
    <meta property="og:description" content="Líder en venta de aros, llantas, faros y accesorios para autos y camionetas. Amplio catálogo.">
    <meta property="og:image" content="images/thumbnail-aros.png">
    <meta property="og:url" content="https://zehlendorf-aros.com">
    <meta property="og:type" content="website">

    <title>Zehlendorf Wheels</title>

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
        <div class="slider-superior">
            <img src="images/index/superior-index-1.webp">
        </div>
        <div class="superior">
            <div class="superior-elementos">
                <a href="aros.php"><img src="images/thumbnail-aros.png"></a>
                <a class="btn-buscar-index" href="aros.php">
                    <h3>Buscar Aros</h3>
                </a>
            </div>
            <div class="superior-elementos llanta">
                <a href="llantas.php"><img src="images/thumbnail-llantas.png"></a>
                <a class="btn-buscar-index" href="llantas.php">
                    <h3>Buscar Llantas</h3>
                </a>
            </div>
        </div>
        <div class="llantas-index-container">
            <div class="llantas-index-text">
                <h1>Variedad de marcas</h1>
            </div>
            <div class="llantas-index">
                <div class="img-llantas-index"><a href="llantas.php"><img src="images/index/inferior-index-1.webp"></a></div>
                <div class="img-llantas-index"><a href="llantas.php"><img src="images/index/inferior-index-2.webp"></a></div>
                <div class="img-llantas-index"><a href="llantas.php"><img src="images/index/inferior-index-3.webp"></a></div>
                <div class="img-llantas-index"><a href="llantas.php"><img src="images/index/inferior-index-4.webp"></a></div>
                <div class="img-llantas-index"><a href="llantas.php"><img src="images/index/inferior-index-5.webp"></a></div>
            </div>
        </div>
    </main>

    <footer>
        <?php require_once("resources/footer.php") ?>
    </footer>

</body>

</html>