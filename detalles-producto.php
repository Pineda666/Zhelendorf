<?php
require 'conexion/config.php';
require 'conexion/configbd.php';
$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
    echo 'Error al procesar la petición';
    exit;
} else {
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp) {

        $sql = $con->prepare("SELECT count(id_aros) FROM aros WHERE id_aros=?");
        $sql->execute([$id]);
        if ($sql->fetchColumn() > 0) {
            $sql = $con->prepare("SELECT nombre,modelo,diametro,ancho,pernos,pcd,et,cb,color FROM aros WHERE id_aros=? LIMIT 1");
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
    } else {
        echo 'Error al procesar la petición token';
        exit;
    }
}

$sql = $con->prepare("SELECT id_aros,nombre,modelo,diametro,ancho,pernos,pcd,et,cb,color FROM aros");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC); //ese fetch es para asociar por nombre de columnas

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
                    <p>
                        <?php echo $modelo ?>
                    </p>

                    <div>
                        <button type="button">Consultar disponibilidad</button>
                    </div>
                </div>
            </div>
    </main>

    <footer>
        <?php require_once("recursos/footer.php") ?>
    </footer>

</body>

</html>