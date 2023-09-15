<?php
require 'config/config.php';
require 'config/conexionbd.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';

if ($id == '' || $token == '' || $tipo == '') {
    echo 'Error al procesar la petición';
    exit;
} else {
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp) {
        $dir_images = '';

        switch ($tipo) {
            case '1':
                $table_name = 'aro';
                $columns = 'nombre,modelo,diametro,ancho,pernos,pcd,et,cb,color';
                $dir_images = 'images/aros/' . $id . '/';
                break;
            case '2':
                $table_name = 'llanta';
                $columns = 'nombre,modelo,id_marca_llanta,diametro_aro,ancho_llanta,perfil_llanta';
                $dir_images = 'images/llantas/' . $id . '/';
                break;
            case '3':
                $table_name = 'faro';
                $columns = 'nombre';
                $dir_images = 'images/faros/' . $id . '/';
                break;
            case '4':
                $table_name = 'accesorio';
                $columns = 'nombre,descripcion';
                $dir_images = 'images/accesorios/' . $id . '/';
                break;
            default:
                echo 'Error: No existe el tipo de producto';
                exit;
        }

        $stmt = $conn->prepare("SELECT COUNT(*) FROM $table_name WHERE id_$table_name=?");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            $stmt = $conn->prepare("SELECT $columns FROM $table_name WHERE id_$table_name=?");
            $stmt->bind_param('s', $id);     // el "s" es para indicar que se está vinculando un string al ?
            $stmt->execute();
            $result = $stmt->get_result(); //obtiene el resultado como un objeto
            $row = $result->fetch_assoc(); //asociar por columnas

            // Asignar valores a las variables
            extract($row); //extrae los valores del array y crea variables con los nombres de las columnas

            // Cerrar la conexión
            $stmt->close();

            if ($tipo == '2') {
                $stmt = $conn->prepare("SELECT * FROM marca_llanta WHERE id_marca_llanta=?");
                $stmt->bind_param('s',$id_marca_llanta);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                extract($row);
                $stmt->close();
            }

            $rutaImgPrincipal = $dir_images . 'principal.webp';
            if (!file_exists($rutaImgPrincipal)) {
                $rutaImgPrincipal = '/images/no-photo.jpg';
            }

            $imagenes = array();
            $dir = dir($dir_images);

            while (($archivo = $dir->read()) !== false) {
                if ($archivo != 'principal.webp' && strpos($archivo, 'webp') !== false) {
                    $imagenes[] = $dir_images . $archivo;
                }
            }
            $dir->close();
        } else {
            echo 'No se encontraron resultados para este ID';
        }
    } else {
        echo 'Error al procesar la petición token';
    }
}

$numeroTelefono = '+51959959195';
$mensaje = 'Hola! Aros Zehlendorf, estoy interesado en ' . $nombre;
$enlaceWhatsApp = "https://api.whatsapp.com/send?phone=$numeroTelefono&text=" . urlencode($mensaje);

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
                            <?php if ($et != '0' && $cb != '0') { ?>
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
                                <th><?php echo $diametro_aro; ?></th>
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