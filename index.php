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
    <title>Zehlendorf Whells</title>

    <link href="css/reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <header>
        <?php require_once("recursos/header.php") ?>
    </header>

    <main>
        <div class="content-producto">
            <div class="filtro">

            </div>
            <div class="productos">

            </div>
        </div>
    </main>

    <footer>
        <?php require_once("recursos/footer.php") ?>
    </footer>

</body>

</html>