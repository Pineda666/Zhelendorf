<?php
require 'config.php';
require 'conexionbd.php';

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
                $dir_images = '../images/aros/' . $id . '/';
                break;
            case '2':
                $table_name = 'llanta';
                $columns = 'nombre,modelo,id_marca_llanta,diametro_aro,ancho_llanta,perfil_llanta';
                $dir_images = '../images/llantas/' . $id . '/';
                break;
            case '3':
                $table_name = 'faro';
                $columns = 'nombre';
                $dir_images = '../images/faros/' . $id . '/';
                break;
            case '4':
                $table_name = 'accesorio';
                $columns = 'nombre,descripcion';
                $dir_images = '../images/accesorios/' . $id . '/';
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
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            // Asignar valores a las variables
            extract($row);

            // Cerrar la conexión
            $stmt->close();

            $rutaImgPrincipal = $dir_images . 'principal.webp';
            if (!file_exists($rutaImgPrincipal)) {
                $rutaImgPrincipal = '../images/no-photo.jpg';
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
$mensaje = 'Hola! Aros Zehlendorf, estoy interesado en comprar el producto ' . $nombre;
$enlaceWhatsApp = "https://api.whatsapp.com/send?phone=$numeroTelefono&text=" . urlencode($mensaje);
