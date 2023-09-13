<?php
require 'conexionbd.php';
require 'config.php';

$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;
$tipo_producto = isset($_POST['tipo_producto']) ? $conn->real_escape_string($_POST['tipo_producto']) : null;
$vehiculo = isset($_POST['vehiculo']) ? $conn->real_escape_string($_POST['vehiculo']) : 'todos';
$diametro = isset($_POST['diametro']) ? $conn->real_escape_string($_POST['diametro']) : 'todos';
$pernos = isset($_POST['pernos']) ? $conn->real_escape_string($_POST['pernos']) : 'todos';
$pcd = isset($_POST['pcd']) ? $conn->real_escape_string($_POST['pcd']) : 'todos';
$ancho_llanta = isset($_POST['ancho_llanta']) ? $conn->real_escape_string($_POST['ancho_llanta']) : 'todos';
$perfil_llanta = isset($_POST['perfil_llanta']) ? $conn->real_escape_string($_POST['perfil_llanta']) : 'todos';
$diametro_aro = isset($_POST['diametro_aro']) ? $conn->real_escape_string($_POST['diametro_aro']) : 'todos';

switch ($tipo_producto) {
    case '1':
        $table = "aro";
        $id_name = 'id_aro';
        break;
    case '2':
        $table = "llanta";
        $id_name = 'id_llanta';
        break;
    case '3':
        $table = "faro";
        $id_name = 'id_faro';
        break;
    case '4':
        $table = "accesorio";
        $id_name = 'id_accesorio';
        break;
    default:
        echo 'Error: No existe el tipo de producto';
        exit;
}

$where = '';
$filtro = '';

if ($campo != null) {
    $where .= "( nombre LIKE '%" . $campo . "%' ";
    //para poder filtrar pcd con dos valores y buscar en la barra también
    if ($pcd != 'todos') {
        $where .= " OR pcd LIKE '%" . $pcd . "%' ) ";
    } else {
        $where .= " )";
    }
} elseif ($pcd != 'todos') {
    $where .= "( pcd LIKE '%" . $pcd . "%' ) ";
}
if ($vehiculo != 'todos') {
    $filtro .= "AND vehiculo = '" . $vehiculo . "'";
}
if ($diametro != 'todos') {
    $filtro .= "AND diametro = '" . $diametro . "'";
}
if ($pernos != 'todos') {
    $filtro .= "AND pernos = '" . $pernos . "'";
}
if ($ancho_llanta != 'todos') {
    $filtro .= "AND ancho_llanta = '" . $ancho_llanta . "'";
}
if ($perfil_llanta != 'todos') {
    $filtro .= "AND perfil_llanta = '" . $perfil_llanta . "'";
}
if ($diametro_aro != 'todos') {
    $filtro .= "AND diametro_aro = '" . $diametro_aro . "'";
}

$limit = 16;
$pagina = isset($_POST['pagina']) ? $conn->real_escape_string($_POST['pagina']) : 0;

if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit = "LIMIT $inicio , $limit";

$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM $table WHERE ";
if (!empty($where)) {
    $sql .= $where;
} else {
    $sql .= "nombre != '' ";
}
$sql .= "$filtro $sLimit";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

//total de registros filtrados con el where
$sqlFiltro = "SELECT FOUND_ROWS()";
$resFiltro = $conn->query($sqlFiltro);
$row_filtro = $resFiltro->fetch_array();
$totalFiltro = $row_filtro[0];

// total de aros en stock
// $sqlTotal = "SELECT count($id_name) FROM $table";
// $resTotal = $conn->query($sqlTotal);
// $row_total = $resTotal->fetch_array();
// $totalRegistros = $row_total[0];

//mostrar resultados
$output = [];
// $output['totalRegistros'] = $totalRegistros;
$output['totalFiltro'] = $totalFiltro;
$output['data'] = '';
$output['paginacion'] = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $id_producto = array_shift($row); //captura el valor de la primera columna de la fila $row
        $image = 'images/' . $table . 's/' . $id_producto . '/principal.webp';

        $nombre = $row['nombre'];
        $mensaje = 'Hola! Aros Zehlendorf, estoy interesado en ' . $nombre;
        $numeroTelefono = '+51959959195';
        $enlaceWhatsApp = "https://api.whatsapp.com/send?phone=$numeroTelefono&text=" . urlencode($mensaje);

        $output['data'] .= '
            <div class="product">
                <a href="detalles-producto.php?id=' . $id_producto . '&tipo=' . $tipo_producto . '&token=' . hash_hmac('sha1', $id_producto, KEY_TOKEN) . '">';
        if ($tipo_producto == '2') {
            $output['data'] .= '<div class="content-image-llantas"><img src="' . $image . '"></div>';
        } else {
            $output['data'] .= '<img src="' . $image . '" alt="imagen de aro">';
        }
        $output['data'] .= '
                </a>
                <a href="detalles-producto.php?id=' . $id_producto . '&tipo=' . $tipo_producto . '&token=' . hash_hmac('sha1', $id_producto, KEY_TOKEN) . '">
                    <h2>' . $nombre . '</h2>
                </a>
                <a href="detalles-producto.php?id=' . $id_producto . '&tipo=' . $tipo_producto . '&token=' . hash_hmac('sha1', $id_producto, KEY_TOKEN) . '" class="btn-details">Detalles</a>
                <a href="' . $enlaceWhatsApp . '" class="btn-availability">Consultar disponibilidad</a>
            </div>
        ';
    }
} else {
    $output['data'] .=
        '<div class="product">
        <h2>No se encontraron resultados resultados</h2>
    </div>
    ';
}

if ($output['totalFiltro'] > 0) {
    $totalPaginas = ceil($output['totalFiltro'] / $limit);

    $output['paginacion'] .= '<nav class="pagination">';
    $output['paginacion'] .= '<ul>';

    $numeroInicio = 1;

    if (($pagina - 4) > 1) {
        $numeroInicio = $pagina - 4;
    }

    $numeroFin = $numeroInicio + 9;

    if ($numeroFin > $totalPaginas) {
        $numeroFin = $totalPaginas;
    }

    for ($i = $numeroInicio; $i <= $numeroFin; $i++) {
        if ($pagina == $i) {
            //para el estilo de la página activa
            $output['paginacion'] .= '<li class="active"><a href="#">' . $i . '</a></li>';
        } else {
            $output['paginacion'] .= '<li><a href="#" onclick="getData(' . $i . ')">' . $i . '</a></li>';
        }
    }

    $output['paginacion'] .= '</ul>';
    $output['paginacion'] .= '</nav>';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE); //el unescaped se usa en caso haya algun caracter especial o cualquier cosita
