<?php
require 'config/show_detail_product.php';
?>

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
    <meta property="og:url" content="https://zehlendorf-aros.com">
    <meta property="og:type" content="website">

    <title><?php echo $nombre; ?></title>

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
        <div class="product-details">
            <div class="product-image">
                <img src="<?php echo $rutaImgPrincipal; ?>">
            </div>
            <?php foreach ($imagenes as $img) { ?>
                <div>
                    <img src="<?php echo $img; ?>">
                </div>
            <?php } ?>
            <div class="product-info">
                <h2><?php echo $nombre; ?></h2>
                <table class="table-detail-product">
                    <tbody>
                        <?php if ($tipo == '1') { ?>
                            <tr>
                                <th>Modelo:</th>
                                <th><?php echo $modelo; ?></th>
                            </tr>
                            <tr>
                                <th>Diametro:</th>
                                <th><?php echo $diametro; ?></th>
                            </tr>
                            <tr>
                                <th>Ancho:</th>
                                <th><?php echo $ancho; ?></th>
                            </tr>
                            <tr>
                                <th>Pernos:</th>
                                <th><?php echo $pernos; ?></th>
                            </tr>
                            <tr>
                                <th>PCD:</th>
                                <th><?php echo $pcd; ?></th>
                            </tr>
                            <?php if ($et >= '0' && $cb >= '0') { ?>
                                <tr>
                                    <th>ET:</th>
                                    <th><?php echo $et; ?></th>
                                </tr>
                                <tr>
                                    <th>CB:</th>
                                    <th><?php echo $cb; ?></th>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th>Color:</th>
                                <th><?php echo $color; ?></th>
                            </tr>
                        <?php  } else if ($tipo == '2') { ?>
                            <tr>
                                <th>Modelo:</th>
                                <th><?php echo $modelo; ?></th>
                            </tr>
                            <tr>
                                <th>Marca:</th>
                                <th><?php echo $marca_llanta; ?></th>
                            </tr>
                            <tr>
                                <th>Diametro de aro:</th>
                                <th><?php echo $diametro; ?></th>
                            </tr>
                            <tr>
                                <th>Perfil:</th>
                                <th><?php echo $perfil_llanta; ?></th>
                            </tr>
                            <tr>
                                <th>Ancho:</th>
                                <th><?php echo $ancho_llanta; ?></th>
                            </tr>

                        <?php } else if ($tipo == '3') { ?>
                            <tr>
                                <th></th>
                                <th><?php echo $nombre; ?></th>
                            </tr>

                        <?php } else if ($tipo == '4') { ?>
                            <tr>
                                <th></th>
                                <th><?php echo $descripcion; ?></th>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <div class="btn-pages-details">
                    <a href="<?php echo $enlaceWhatsApp; ?>" class="btn-availability page-detail">Consultar disponibilidad</a>
                    <a class="btn-back page-detail" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Volver a la lista</a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <?php require_once("resources/footer.php") ?>
    </footer>

</body>

</html>