<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Expedientes</title>
    <link rel="stylesheet" href="../estilos_tabla.css">
    <style>
    .button-container {
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .button-container a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #002147;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
    }

    .button-container a:hover {
        background-color: #002141;
    }
    </style>
</head>

<body>

    <h3>Lista de Expedientes</h3>

    <?php
    // Datos del servidor
    $host = "localhost";
    $user = "root";
    $pass = "";
    $datab = "notarie";

    include 'conexion_be.php';

    // Mostramos los datos registrados con nombres de comparecientes
    $consulta = "
    SELECT e.*, 
           GROUP_CONCAT(CONCAT(c.nombre, ' - ', c.rol) SEPARATOR '<br>') AS nombres_comparecientes
    FROM expedientes e
    LEFT JOIN comparecientes c ON e.id = c.escritura_id
    GROUP BY e.id
";
$result = mysqli_query($conexion, $consulta);
if (!$result) {
    die("No se ha podido realizar la consulta");
} else {
    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    echo "<tr>";
    echo "<th>No. Operacion</th>";
    echo "<th>Comparecientes</th>";
    echo "<th>Acreedor</th>";
    echo "<th>Acto</th>";
    echo "<th>No. Factura</th>";
    echo "<th>Honorarios</th>";
    echo "<th>Fechas</th>";
    echo "<th>Creador</th>";
    echo "</tr>";

    while ($colum = mysqli_fetch_array($result)) {
        $bgClass = 'default-bg'; // Clase por defecto
    
        if ($colum['fechaSalidaRPP']) {
            $bgClass = 'highlight-bg-salida-rpp';
        } elseif ($colum['fechaIngresoRPP']) {
            $bgClass = 'highlight-bg-ingreso-rpp';
        } elseif ($colum['entregaGestor']) {
            $bgClass = 'highlight-bg-gestor';
        } elseif ($colum['fechaTraslado']) {
            $bgClass = 'highlight-bg-traslado';
        } elseif ($colum['fechaFirma']) {
            $bgClass = 'highlight-bg-firma';
        }
    
        echo "<tr class='$bgClass'>";
        echo "<td>" . $colum['escritura'] . "</td>";
        echo "<td>" . $colum['nombres_comparecientes'] . "</td>";
        echo "<td>" . $colum['acreedor'] . "</td>";
        echo "<td>" . $colum['acto'] . "</td>";
        echo "<td>" . $colum['factura'] . "</td>";
        echo "<td>" . $colum['honorario'] . "</td>";
        echo "<td>
                <table class='fechas-table'>
                    <tr><th>Fecha UIF:</th><td>" . $colum['fechaUIF'] . "</td></tr>
                    <tr><th>Fecha Firma:</th><td>" . $colum['fechaFirma'] . "</td></tr>
                    <tr><th>Fecha Traslado:</th><td>" . $colum['fechaTraslado'] . "</td></tr>
                    <tr><th>Entrega a Gestor:</th><td>" . $colum['entregaGestor'] . "</td></tr>
                    <tr><th>Ingreso RPP:</th><td>" . $colum['fechaIngresoRPP'] . "</td></tr>
                    <tr><th>Salida RPP:</th><td>" . $colum['fechaSalidaRPP'] . "</td></tr>
                </table>
              </td>";
        echo "<td>" . $colum['done_by'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

    // Cerramos la conexión a la base de datos
    mysqli_close($conexion);
    ?>

    <div class="button-container">
        <a href="../carga_menu.php">Volver al Menú</a>
    </div>

</body>

</html>