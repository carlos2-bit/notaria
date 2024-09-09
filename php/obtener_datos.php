<?php
$host = "localhost";
$user = "root";
$pass = "";
$datab = "notarie";

$connection = mysqli_connect($host, $user, $pass, $datab);

if (!$connection) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Consulta para obtener la cantidad de expedientes en cada etapa por creador y la suma de honorarios
$query = "
    SELECT done_by,
        SUM(CASE WHEN fechaFirma IS NOT NULL AND fechaFirma != '0000-00-00' AND (fechaTraslado IS NULL OR fechaTraslado = '0000-00-00') THEN 1 ELSE 0 END) AS firma,
        SUM(CASE WHEN fechaTraslado IS NOT NULL AND fechaTraslado != '0000-00-00' AND (entregaGestor IS NULL OR entregaGestor = '0000-00-00') THEN 1 ELSE 0 END) AS traslado,
        SUM(CASE WHEN entregaGestor IS NOT NULL AND entregaGestor != '0000-00-00' AND (fechaIngresoRPP IS NULL OR fechaIngresoRPP = '0000-00-00') THEN 1 ELSE 0 END) AS entregado,
        SUM(CASE WHEN fechaIngresoRPP IS NOT NULL AND fechaIngresoRPP != '0000-00-00' AND (fechaSalidaRPP IS NULL OR fechaSalidaRPP = '0000-00-00') THEN 1 ELSE 0 END) AS ingresado,
        SUM(CASE WHEN fechaSalidaRPP IS NOT NULL AND fechaSalidaRPP != '0000-00-00' THEN 1 ELSE 0 END) AS saliente,
        SUM(honorario) AS total_honorarios_creador
    FROM expedientes
    GROUP BY done_by
";

$result = mysqli_query($connection, $query);

$creadores = [];
$firmas = [];
$traslados = [];
$entregados = [];
$ingresados = [];
$salientes = [];
$total_honorarios_creador = [];

$total_honorarios_general = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $creadores[] = $row['done_by'];
    $firmas[] = $row['firma'];
    $traslados[] = $row['traslado'];
    $entregados[] = $row['entregado'];
    $ingresados[] = $row['ingresado'];
    $salientes[] = $row['saliente'];
    $total_honorarios_creador[] = $row['total_honorarios_creador'];
    $total_honorarios_general += $row['total_honorarios_creador'];
}

mysqli_close($connection);

// Devolver los datos en formato JSON
echo json_encode([
    'creadores' => $creadores,
    'firmas' => $firmas,
    'traslados' => $traslados,
    'entregados' => $entregados,
    'ingresados' => $ingresados,
    'salientes' => $salientes,
    'total_honorarios_creador' => $total_honorarios_creador,
    'total_honorarios_general' => $total_honorarios_general
]);
?>