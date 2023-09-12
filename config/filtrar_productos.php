<?php
require 'conexionbd.php';
require 'config.php';

$columns = [
    'id_aro', 'nombre', 'modelo', 'diametro', 'ancho', 'pernos', 'pcd', 'et', 'cb', 'color', 'vehiculo', 'id_tipo_producto', 'estado'
];
$table = "aro";
$id = 'id_aro';

$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;
$vehiculo = isset($_POST['vehiculo']) ? $conn->real_escape_string($_POST['vehiculo']) : 'todos';
$diametro = isset($_POST['diametro']) ? $conn->real_escape_string($_POST['diametro']) : 'todos';
$pernos = isset($_POST['pernos']) ? $conn->real_escape_string($_POST['pernos']) : 'todos';
$pcd = isset($_POST['pcd']) ? $conn->real_escape_string($_POST['pcd']) : 'todos';

$where = '';
$filtro = '';

if ($campo != null) {
    $where .= "( nombre LIKE '%" . $campo . "%' ) ";
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
if ($pcd != 'todos') {
    $filtro .= "AND pcd = '" . $pcd . "'";
}

$limit = 8;
$pagina = isset($_POST['pagina']) ? $conn->real_escape_string($_POST['pagina']) : 0;

if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit = "LIMIT $inicio , $limit";

$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table WHERE ";
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
$sqlTotal = "SELECT count($id) FROM $table";
$resTotal = $conn->query($sqlTotal);
$row_total = $resTotal->fetch_array();
$totalRegistros = $row_total[0];

//mostrar resultados
$output = [];
$output['totalRegistros'] = $totalRegistros;
$output['totalFiltro'] = $totalFiltro;
$output['data'] = '';
$output['paginacion'] = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $id = $row['id_aro'];
        $image = 'images/aros/' . $id . '/principal.webp';

        $nombre = $row['nombre'];
        $tipo_producto = $row['id_tipo_producto'];
        $mensaje = 'Hola! Aros Zehlendorf, estoy interesado en comprar el producto ' . $nombre;
        $numeroTelefono = '+51959959195';
        $enlaceWhatsApp = "https://api.whatsapp.com/send?phone=$numeroTelefono&text=" . urlencode($mensaje);

        $output['data'] .= '
            <div class="product">
                <a href="config/show_detail_product.php?id=' . $id . '&tipo=' . $tipo_producto . '&token=' . hash_hmac('sha1', $id, KEY_TOKEN) . '">
                    <img src="' . $image . '" alt="imagen de aro">
                </a>
                <a href="config/show_detail_product.php?id=' . $id . '&tipo=' . $tipo_producto . '&token=' . hash_hmac('sha1', $id, KEY_TOKEN) . '">
                    <h2>' . $nombre . '</h2>
                </a>
                <a href="config/show_detail_product.php?id=' . $id . '&tipo=' . $tipo_producto . '&token=' . hash_hmac('sha1', $id, KEY_TOKEN) . '" class="btn-details">Detalles</a>
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

// if ($_POST['tipo_producto'] == 'llanta') {

//     $query = "SELECT*FROM llanta WHERE nombre != ''";
//     if ($_POST['ancho'] != 'todos') {
//         $query .= "AND ancho_llanta = '" . $_POST['ancho'] . "'";
//     }
//     if ($_POST['perfil'] != 'todos') {
//         $query .= "AND perfil_llanta = '" . $_POST['perfil'] . "'";
//     }
//     if ($_POST['aro'] != 'todos') {
//         $query .= "AND diametro_aro = '" . $_POST['aro'] . "'";
//     }

//     $resultado = $conexion->query($query);

//     while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
//         $id = $row['id_llanta'];
//         $image = 'images/llantas/' . $id . '/principal.webp';

//         $nombre = $row['nombre'];
//         $tipo_producto = $row['id_tipo_producto'];
//         $mensaje = 'Hola! Aros Zehlendorf, estoy interesado en comprar el producto ' . $nombre;
//         $enlaceWhatsApp = "https://api.whatsapp.com/send?phone=$numeroTelefono&text=" . urlencode($mensaje);

//         echo '        
//             <div class="product">
//                 <a href="detalles-producto.php?id=' . $id . '&tipo=' . $tipo_producto . '&token=' . hash_hmac('sha1', $id, KEY_TOKEN) . '">
//                     <div class="content-image-llantas"><img src="' . $image . '"></div>
//                 </a>
//                 <a href="detalles-producto.php?id=' . $id . '&tipo=' . $tipo_producto . '&token=' . hash_hmac('sha1', $id, KEY_TOKEN) . '">
//                     <h2>' . $nombre . '</h2>
//                 </a>
//                 <a href="detalles-producto.php?id=' . $id . '&tipo=' . $tipo_producto . '&token=' . hash_hmac('sha1', $id, KEY_TOKEN) . '" class="btn-details">Detalles</a>
//                 <a href="' . $enlaceWhatsApp . '" class="btn-availability">Consultar disponibilidad</a>
//             </div>
//         ';
//     }
// }
