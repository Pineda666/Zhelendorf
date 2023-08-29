<?php
require 'conexion/config.php';
require 'conexion/configbd.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id_aros,nombre,modelo,diametro,ancho,pernos,pcd,et,cb,color FROM aros");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC); //ese fetch es para sociar por nombre de columnas

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aros Zehlendorf</title>

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
                <?php foreach ($resultado as $row) { ?>
                    <div>
                        <div>

                            <?php
                            $id = $row['id_aros'];
                            $image = "images/aros/" . $id . "/principal.webp";

                            if (!file_exists($image)) {
                                $image = "images/no-photo.jpg";
                            }
                            ?>

                            <img src="<?php echo $image; ?>">
                            <div>
                                <h5><?php echo $row['nombre'] ?></h5>
                                <div>
                                    <div>
                                        <a href="detalles-producto.php?id=<?php echo $row['id_aros']; ?>&token=<?php echo hash_hmac('sha1', $row['id_aros'], KEY_TOKEN); ?>">Detalles</a>
                                    </div>
                                    <a href="">Consultar disponibilidad</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
    </main>

    <footer>
        <?php require_once("recursos/footer.php") ?>
    </footer>

</body>

</html>