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

    <meta property="og:title" content="Zehlendorf Wheels">
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
            <img src="images/index/superior-index-1.webp" alt="auto negro Zehlendorf">
        </div>
        <div class="superior">
            <div class="superior-elementos">
                <a href="aros.php"><img src="images/thumbnail-aros.png" alt="imagen de aro Zehlendorf"></a>
                <a class="btn-buscar-index" href="aros.php">
                    <h3>Buscar Aros</h3>
                </a>
            </div>
            <div class="superior-elementos llanta">
                <a href="llantas.php"><img src="images/thumbnail-llantas.png" alt="imagen de llanta Zehlendorf"></a>
                <a class="btn-buscar-index" href="llantas.php">
                    <h3>Buscar Llantas</h3>
                </a>
            </div>
            <div class="superior-elementos">
                <a href="faros.php"><img src="images/thumbnail-faros.png" alt="imagen de faro Zehlendorf"></a>
                <a class="btn-buscar-index" href="faros.php">
                    <h3>Buscar Faros</h3>
                </a>
            </div>
            <div class="superior-elementos">
                <a href="accesorios.php"><img src="images/thumbnail-accesorios.png" alt="imagen de accesorio Zehlendorf"></a>
                <a class="btn-buscar-index" href="accesorios.php">
                    <h3>Buscar Accesorios</h3>
                </a>
            </div>
        </div>
        <div class="llantas-index-container">
            <div class="texto-subtitulos">
                <h1>Variedad de marcas</h1>
            </div>
            <div class="llantas-index">
                <div class="img-llantas-index"><a href="llantas.php"><img src="images/index/inferior-index-1.webp" alt="imagen llanta Yokohama"></a></div>
                <div class="img-llantas-index"><a href="llantas.php"><img src="images/index/inferior-index-2.webp" alt="imagen llanta Goodyear"></a></div>
                <div class="img-llantas-index"><a href="llantas.php"><img src="images/index/inferior-index-3.webp" alt="imagen llanta Dunlop"></a></div>
                <div class="img-llantas-index"><a href="llantas.php"><img src="images/index/inferior-index-4.webp" alt="imagen llanta Sumitomo"></a></div>
                <div class="img-llantas-index"><a href="llantas.php"><img src="images/index/inferior-index-5.webp" alt="imagen llanta Maxxis"></a></div>
            </div>
        </div>
        <div class="mapa-content">
            <div class="texto-subtitulos">
                <h1>Visítanos:</h1>
            </div>
            <div class="mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.445498088105!2d-77.023856623983!3d-12.081624342552644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c886411daef5%3A0x6b0428cb4e10e33c!2sAros%20Zehlendorf%20S.A.C!5e0!3m2!1ses!2spe!4v1694039156512!5m2!1ses!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </main>

    <footer>
        <?php require_once("resources/footer.php") ?>
    </footer>

</body>

</html>