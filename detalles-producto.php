<?php
require 'config/config.php';
require 'config/conexionbd.php';
$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';

if ($id == '' || $token == '' || $tipo == '') {
    echo 'Error al procesar la petición';
    exit;
} else {
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp) {

        if ($tipo == '1') {
            $sql = $con->prepare("SELECT count(id_aro) FROM aro WHERE id_aro=?");
            $sql->execute([$id]);
            if ($sql->fetchColumn() > 0) {
                $sql = $con->prepare("SELECT nombre,modelo,diametro,ancho,pernos,pcd,et,cb,color FROM aro WHERE id_aro=?");
                $sql->execute([$id]);
                $row = $sql->fetch((PDO::FETCH_ASSOC));
                $nombre = $row['nombre'];
                $modelo = $row['modelo'];
                $diametro = $row['diametro'];
                $ancho = $row['ancho'];
                $pernos = $row['pernos'];
                $pcd = $row['pcd'];
                $et = $row['et'];
                $cb = $row['cb'];
                $color = $row['color'];
                $dir_images = 'images/aros/' . $id . '/';
            }
        } else if ($tipo == '2') {
            $sql = $con->prepare("SELECT count(id_llanta) FROM llanta WHERE id_llanta=?");
            $sql->execute([$id]);
            if ($sql->fetchColumn() > 0) {
                $sql = $con->prepare("SELECT nombre,modelo,id_marca_llanta,diametro_aro,ancho_llanta,perfil_llanta FROM llanta WHERE id_llanta=?");
                $sql->execute([$id]);
                $row = $sql->fetch((PDO::FETCH_ASSOC));
                $nombre = $row['nombre'];
                $modelo = $row['modelo'];
                $id_marca_llanta = $row['id_marca_llanta'];
                $diametro = $row['diametro_aro'];
                $perfil_llanta = $row['perfil_llanta'];
                $ancho_llanta = $row['ancho_llanta'];
                $dir_images = 'images/llantas/' . $id . '/';

                $sql = $con->prepare("SELECT marca FROM marca_llanta WHERE id_marca_llanta=?");
                $sql->execute([$id_marca_llanta]);
                $row2 = $sql->fetch((PDO::FETCH_ASSOC));

                $marca_llanta = $row2['marca'];
            }
        } else if ($tipo == '3') {
            $sql = $con->prepare("SELECT count(id_faro) FROM faro WHERE id_faro=?");
            $sql->execute([$id]);
            if ($sql->fetchColumn() > 0) {
                $sql = $con->prepare("SELECT nombre FROM faro WHERE id_faro=?");
                $sql->execute([$id]);
                $row = $sql->fetch((PDO::FETCH_ASSOC));
                $nombre = $row['nombre'];
                $dir_images = 'images/faros/' . $id . '/';
            }
        } else if ($tipo == '4') {
            $sql = $con->prepare("SELECT count(id_accesorio) FROM accesorio WHERE id_accesorio=?");
            $sql->execute([$id]);
            if ($sql->fetchColumn() > 0) {
                $sql = $con->prepare("SELECT nombre,descripcion FROM accesorio WHERE id_accesorio=?");
                $sql->execute([$id]);
                $row = $sql->fetch((PDO::FETCH_ASSOC));
                $nombre = $row['nombre'];
                $descripcion = $row['descripcion'];
                $dir_images = 'images/accesorios/' . $id . '/';
            }
        } else {
            echo 'Error: No existe el tipo de producto';
            exit;
        }

        $rutaImgPrincipal = $dir_images . 'principal.webp';
        if (!file_exists($rutaImgPrincipal)) {
            $rutaImgPrincipal  = 'images/no-photo.jpg';
        }

        $imagenes = array();
        $dir = dir($dir_images);

        while (($archivo = $dir->read()) != false) {
            if ($archivo != 'principal.webp' && strpos($archivo, 'webp')) {
                $imagenes[] = $dir_images . $archivo;
            }
        }
        $dir->close();
    } else {
        echo 'Error al procesar la petición token';
        exit;
    }
}

$numeroTelefono = '+51959959195';
$mensaje = 'Hola! Aros Zehlendorf, estoy interesado en comprar el producto ' . $nombre;
$enlaceWhatsApp = "https://api.whatsapp.com/send?phone=$numeroTelefono&text=" . urlencode($mensaje);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nombre; ?></title>

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
                    <a href="<?php echo $enlaceWhatsApp; ?>" class="btn-availability">Consultar disponibilidad</a>
                    <a class="btn-back" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Volver a la lista</a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <?php require_once("resources/footer.php") ?>
    </footer>

</body>

</html>