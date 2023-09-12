<?php
include('conexionbd.php');
require 'config.php';

$db = new Database();
$conexion = $db->conectar();

$numeroTelefono = '+51959959195';

$campo = isset($_POST["campo"]) ? $_POST["campo"] : null; //para prevenir inyecciones sql
$where = '';
if ($campo != null) {
    $where = "( nombre LIKE '%" . $campo . "%' )";
}

$pagina = isset($_POST["pagina"]) ? $_POST["pagina"] : 0;
$limit_product = 16;

if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $limit_product;
}

if ($_POST['tipo_producto'] == 'aro') {

    $query = "SELECT SQL_CALC_FOUND_ROWS * FROM aro WHERE";
    if (!empty($where)) {
        $query .= $where;
    } else {
        $query .= " nombre != ''";
    }
    if ($_POST["vehiculo"] != 'todos') {
        $query .= "AND vehiculo = '" . $_POST["vehiculo"] . "' ";
    }
    if ($_POST["diametro"] != 'todos') {
        $query .= "AND diametro = '" . $_POST["diametro"] . "' ";
    }
    if ($_POST["pernos"] != 'todos') {
        $query .= "AND pernos = '" . $_POST["pernos"] . "' ";
    }
    if ($_POST["pcd"] != 'todos') {
        $query .= "AND pcd = '" . $_POST["pcd"] . "' ";
    }
    $query .= "LIMIT $inicio , $limit_product";

    $resultado = $conexion->query($query);

    // total de registros filtrados
    $sqlFiltro = "SELECT FOUND_ROWS()";
    $resFiltro = $conexion->query($sqlFiltro);
    $row_filtro = $resFiltro->fetch(PDO::FETCH_ASSOC);
    $totalFiltro = $row_filtro['FOUND_ROWS()'];

    // total de aros en stock
    $sqlTotal = "SELECT count(id_aro) FROM aro";
    $resTotal = $conexion->query($sqlTotal);
    $row_total = $resTotal->fetch(PDO::FETCH_ASSOC);
    $totalRegistros = $row_total['count(id_aro)'];

    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id_aro'];
        $image = 'images/aros/' . $id . '/principal.webp';

        $nombre = $row['nombre'];
        $tipo_producto = $row['id_tipo_producto'];
        $mensaje = 'Hola! Aros Zehlendorf, estoy interesado en comprar el producto ' . $nombre;
        $enlaceWhatsApp = "https://api.whatsapp.com/send?phone=$numeroTelefono&text=" . urlencode($mensaje);

        echo '
            <div class="product">
                <a href="detalles-producto.php?id=' . $id . '&tipo=' . $tipo_producto . '&token=' . hash_hmac('sha1', $id, KEY_TOKEN) . '">
                    <img src="' . $image . '" alt="imagen de aro">
                </a>
                <a href="detalles-producto.php?id=' . $id . '&tipo=' . $tipo_producto . '&token=' . hash_hmac('sha1', $id, KEY_TOKEN) . '">
                    <h2>' . $nombre . '</h2>
                </a>
                <a href="detalles-producto.php?id=' . $id . '&tipo=' . $tipo_producto . '&token=' . hash_hmac('sha1', $id, KEY_TOKEN) . '" class="btn-details">Detalles</a>
                <a href="' . $enlaceWhatsApp . '" class="btn-availability">Consultar disponibilidad</a>
            </div>
        ';
    }

    $paginacion = '';

    if ($totalRegistros > 0) {
        $totalPaginas = ceil($totalFiltro / $limit_product);

        $paginacion .= '<nav class="pagination">';
        $paginacion .= '<ul>';
        for ($i = 1; $i <= $totalPaginas; $i++) {
            if ($i == $pagina) {
                $paginacion .= '<li class="active"><a href="#" onclick="filtrar_producto(\'aro\',\'' . $i . '\')">' . $i . '</a></li>';
            } else {
                $paginacion .= '<li><a href="#" onclick="filtrar_producto(\'aro\',\'' . $i . '\')">' . $i . '</a></li>'; //se usa el backslash para poder concatenar bien
            }
        }
        $paginacion .= '</ul>';
        $paginacion .= '</nav>';
    }

    echo $paginacion;
}

if ($_POST['tipo_producto'] == 'llanta') {

    $query = "SELECT*FROM llanta WHERE nombre != ''";
    if ($_POST['ancho'] != 'todos') {
        $query .= "AND ancho_llanta = '" . $_POST['ancho'] . "'";
    }
    if ($_POST['perfil'] != 'todos') {
        $query .= "AND perfil_llanta = '" . $_POST['perfil'] . "'";
    }
    if ($_POST['aro'] != 'todos') {
        $query .= "AND diametro_aro = '" . $_POST['aro'] . "'";
    }

    $resultado = $conexion->query($query);

    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id_llanta'];
        $image = 'images/llantas/' . $id . '/principal.webp';

        $nombre = $row['nombre'];
        $tipo_producto = $row['id_tipo_producto'];
        $mensaje = 'Hola! Aros Zehlendorf, estoy interesado en comprar el producto ' . $nombre;
        $enlaceWhatsApp = "https://api.whatsapp.com/send?phone=$numeroTelefono&text=" . urlencode($mensaje);

        echo '        
            <div class="product">
                <a href="detalles-producto.php?id=' . $id . '&tipo=' . $tipo_producto . '&token=' . hash_hmac('sha1', $id, KEY_TOKEN) . '">
                    <div class="content-image-llantas"><img src="' . $image . '"></div>
                </a>
                <a href="detalles-producto.php?id=' . $id . '&tipo=' . $tipo_producto . '&token=' . hash_hmac('sha1', $id, KEY_TOKEN) . '">
                    <h2>' . $nombre . '</h2>
                </a>
                <a href="detalles-producto.php?id=' . $id . '&tipo=' . $tipo_producto . '&token=' . hash_hmac('sha1', $id, KEY_TOKEN) . '" class="btn-details">Detalles</a>
                <a href="' . $enlaceWhatsApp . '" class="btn-availability">Consultar disponibilidad</a>
            </div>
        ';
    }
}
