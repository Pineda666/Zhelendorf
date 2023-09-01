<?php
require 'config/config.php';
require 'config/conexionbd.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id_llanta,nombre,id_tipo_producto FROM llanta");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC); //ese fetch es para asociar por nombre de columnas

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llantas Zehlendorf</title>

    <link href="css/reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <?php require_once("resources/header.php") ?>
    </header>
    <main>
        <div class="filtro-producto">
            <nav>
                <ul>
                    <li>Ancho</li>
                    <li>Perfil</li>
                    <li>Aro</li>
                </ul>
            </nav>
        </div>
        <div class="product-grid">
            <?php foreach ($resultado as $row) { ?>

                <?php
                $id = $row['id_llanta'];
                $image = "images/llantas/" . $id . "/principal.webp";

                if (!file_exists($image)) {
                    $image = "images/no-photo.jpg";
                }
                ?>
                <div class="product">
                    <a href="detalles-producto.php?id=<?php echo $row['id_llanta']; ?>&tipo=<?php echo $row['id_tipo_producto']; ?>&token=<?php echo hash_hmac('sha1', $row['id_llanta'], KEY_TOKEN); ?>"><img src="<?php echo $image; ?>"></a>
                    <a href="detalles-producto.php?id=<?php echo $row['id_llanta']; ?>&tipo=<?php echo $row['id_tipo_producto']; ?>&token=<?php echo hash_hmac('sha1', $row['id_llanta'], KEY_TOKEN); ?>">
                        <h2><?php echo $row['nombre'] ?></h2>
                    </a>
                    <a href="detalles-producto.php?id=<?php echo $row['id_llanta']; ?>&tipo=<?php echo $row['id_tipo_producto']; ?>&token=<?php echo hash_hmac('sha1', $row['id_llanta'], KEY_TOKEN); ?>" class="btn-details">Detalles</a>
                    <a href="" class="btn-availability">Consultar disponibilidad</a>
                </div>
            <?php } ?>
        </div>
    </main>
    <footer>
        <?php require_once("resources/footer.php") ?>
    </footer>
</body>

</html>