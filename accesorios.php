<?php
require 'config/config.php';
require 'config/conexionbd.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id_accesorio,nombre,id_tipo_producto FROM accesorio");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC); //ese fetch es para sociar por nombre de columnas

$numeroTelefono = '+51959959195';

?>

<!DOCTYPE html>
<html lang="en">

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
    <meta property="og:image" content="images/thumbnail-accesorios.png">
    <meta property="og:url" content="https://zehlendorf-aros.com">
    <meta property="og:type" content="website">

    <title>Accesorios Zehlendorf</title>

    <link rel="icon" type="image/png" href="images/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" href="images/favicon-apple-touch.png">

    <link rel="canonical" href="https://zehlendorf-aros.com">

    <link href="css/reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <header>
        <?php require_once("resources/header.php") ?>
    </header>

    <main>
        <div class="product-grid">
            <?php foreach ($resultado as $row) { ?>

                <?php
                $id = $row['id_accesorio'];
                $image = "images/accesorios/" . $id . "/principal.webp";

                if (!file_exists($image)) {
                    $image = "images/no-photo.jpg";
                }

                $nombre = $row['nombre'];
                $mensaje = 'Hola! Aros Zehlendorf, estoy interesado en comprar el producto ' . $nombre;
                $enlaceWhatsApp = "https://api.whatsapp.com/send?phone=$numeroTelefono&text=" . urlencode($mensaje);
                ?>
                <div class="product">
                    <a href="detalles-producto.php?id=<?php echo $row['id_accesorio']; ?>&tipo=<?php echo $row['id_tipo_producto']; ?>&token=<?php echo hash_hmac('sha1', $row['id_accesorio'], KEY_TOKEN); ?>"><img src="<?php echo $image; ?>"></a>
                    <a href="detalles-producto.php?id=<?php echo $row['id_accesorio']; ?>&tipo=<?php echo $row['id_tipo_producto']; ?>&token=<?php echo hash_hmac('sha1', $row['id_accesorio'], KEY_TOKEN); ?>">
                        <h2><?php echo $nombre; ?></h2>
                    </a>
                    <a href="detalles-producto.php?id=<?php echo $row['id_accesorio']; ?>&tipo=<?php echo $row['id_tipo_producto']; ?>&token=<?php echo hash_hmac('sha1', $row['id_accesorio'], KEY_TOKEN); ?>" class="btn-details">Detalles</a>
                    <a href="<?php echo $enlaceWhatsApp; ?>" class="btn-availability">Consultar disponibilidad</a>
                </div>
            <?php } ?>
        </div>
    </main>

    <footer>
        <?php require_once("resources/footer.php") ?>
    </footer>

</body>

</html>