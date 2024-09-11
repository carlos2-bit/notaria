<?php
require 'conexion_be.php';

if (isset($_POST['query'])) {
    $busqueda = $conexion->real_escape_string($_POST['query']);
    
    // Consulta para buscar en los expedientes y obtener los nombres de comparecientes
    $consulta = "
        SELECT e.*, 
            GROUP_CONCAT(CONCAT(c.nombre, ' - ', c.rol) SEPARATOR '<br>') AS nombres_comparecientes
        FROM expedientes e
        LEFT JOIN comparecientes c ON e.id = c.escritura_id
        WHERE e.escritura LIKE '%$busqueda%' 
           OR c.nombre LIKE '%$busqueda%'
           OR e.acto LIKE '%$busqueda%'
           OR e.acreedor LIKE '%$busqueda%'
           OR e.done_by LIKE '%$busqueda%'
        GROUP BY e.id
    ";
    $result = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($result) > 0) {
        while ($colum = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $colum['escritura'] . "</td>";
            echo "<td>" . $colum['nombres_comparecientes'] . "</td>";
            echo "<td>" . $colum['acto'] . "</td>";
            echo "<td>" . $colum['acreedor'] . "</td>";
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
    } else {
        echo "<tr><td colspan='7'>No se encontraron resultados</td></tr>";
    }
} else {
    echo "<tr><td colspan='7'>Error en la búsqueda</td></tr>";
}

mysqli_close($conexion);
?>