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
            }
        } else {
            echo 'Error: No existe el tipo de producto';
            exit;
        }
    } else {
        echo 'Error al procesar la petición token';
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nombre ?></title>

    <link href="css/reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <header>
        <?php require_once("recursos/header.php") ?>
    </header>

    <main>
        <div>
            <div>
                <div>

                    <div>
                        <div>
                            <div>
                                <img src="<?php echo $rutaImgPrincipal ?>">
                            </div>

                            <?php foreach ($imagenes as $img) { ?>
                                <div>
                                    <img src="<?php echo $img ?>">
                                </div>
                            <?php } ?>
                        </div>
                    </div>


                </div>
                <div>
                    <h2><?php echo $nombre; ?></h2>
                    <table>
                        <tbody>
                            <?php if ($tipo == '1') { ?>
                                <tr>
                                    <th>Modelo:</th>
                                    <th><?php echo $modelo ?></th>
                                </tr>
                                <tr>
                                    <th>Diametro:</th>
                                    <th><?php echo $diametro ?></th>
                                </tr>
                                <tr>
                                    <th>Ancho:</th>
                                    <th><?php echo $ancho ?></th>
                                </tr>
                                <tr>
                                    <th>Pernos:</th>
                                    <th><?php echo $pernos ?></th>
                                </tr>
                                <tr>
                                    <th>PCD:</th>
                                    <th><?php echo $pcd ?></th>
                                </tr>
                                <?php if ($et >= '0' && $cb >= '0') { ?>
                                    <tr>
                                        <th>ET:</th>
                                        <th><?php echo $et ?></th>
                                    </tr>
                                    <tr>
                                        <th>CB:</th>
                                        <th><?php echo $cb ?></th>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <th>Color:</th>
                                    <th><?php echo $color ?></th>
                                </tr>
                            <?php  } else if ($tipo == '2') { ?>
                                <tr>
                                    <th>Modelo:</th>
                                    <th><?php echo $modelo ?></th>
                                </tr>
                                <tr>
                                    <th>Marca:</th>
                                    <th><?php echo $marca_llanta ?></th>
                                </tr>
                                <tr>
                                    <th>Diametro de aro:</th>
                                    <th><?php echo $diametro ?></th>
                                </tr>
                                <tr>
                                    <th>Perfil:</th>
                                    <th><?php echo $perfil_llanta ?></th>
                                </tr>
                                <tr>
                                    <th>Ancho:</th>
                                    <th><?php echo $ancho_llanta ?></th>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                    <div>
                        <button type="button">Consultar disponibilidad</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <?php require_once("recursos/footer.php") ?>
    </footer>

</body>

</html>