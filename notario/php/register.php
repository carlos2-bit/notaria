<?php
// Datos del servidor
$host = "localhost";
$user = "root";
$pass = "";
$datab = "notarie";

session_start();

// Conexión a la base de datos
$connection = mysqli_connect($host, $user, $pass, $datab);

// Obtener el número de escritura automáticamente
$escritura = 5000; // Valor por defecto

$consulta_escritura = "SELECT MAX(escritura) AS max_escritura FROM expedientes";
$resultado_escritura = mysqli_query($connection, $consulta_escritura);

if ($resultado_escritura) {
    $fila_escritura = mysqli_fetch_assoc($resultado_escritura);
    if ($fila_escritura['max_escritura']) {
        $escritura = $fila_escritura['max_escritura'] + 1;
    }
}

// Verifica si el número de escritura ya existe
$verificar_escritura = "SELECT * FROM expedientes WHERE escritura = '$escritura'";
$resultado_verificacion = mysqli_query($connection, $verificar_escritura);

// Estilos CSS para centrar el contenido
echo '<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f4f4f4;
        font-family: "Georgia", serif;
    }
    .container {
        background-color: #fdfdfd;
        border: 1px solid #ddd;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 500px;
    }
    h3 {
        font-size: 20px;
        margin-bottom: 20px;
    }
    .success {
        color: #002147;
    }
    .error {
        color: #d9534f;
    }
    a {
        display: inline-block;
        margin-top: 20px;
        background-color: #002147;
        color: #f9f9f9;
        padding: 12px 20px;
        text-decoration: none;
        font-size: 18px;
        border-radius: 5px;
    }
</style>';

echo '<div class="container">';

if (mysqli_num_rows($resultado_verificacion) > 0) {
    echo '<h3 class="error">Error: El número de escritura ya existe. Por favor, intenta nuevamente.</h3>';
} else {
    // Inserción de datos si el número de escritura no se repite
    $comparecientes = isset($_POST["comparecientes"]) ? $_POST["comparecientes"] : null;
    $acreedor = isset($_POST["acreedor"]) ? $_POST["acreedor"] : null;
    $acto = isset($_POST["acto"]) ? $_POST["acto"] : null;
    $factura = isset($_POST["factura"]) ? $_POST["factura"] : null;
    $honorario = isset($_POST["honorario"]) ? $_POST["honorario"] : null;
    $fechaUIF = isset($_POST["fechaUIF"]) ? $_POST["fechaUIF"] : null;
    $fechaFirma = isset($_POST["fechaFirma"]) ? $_POST["fechaFirma"] : null;
    $fechaTraslado = isset($_POST["fechaTraslado"]) ? $_POST["fechaTraslado"] : null;
    $entregaGestor = isset($_POST["entregaGestor"]) ? $_POST["entregaGestor"] : null;
    $fechaIngresoRPP = isset($_POST["fechaIngresoRPP"]) ? $_POST["fechaIngresoRPP"] : null;
    $fechaSalidaRPP = isset($_POST["fechaSalidaRPP"]) ? $_POST["fechaSalidaRPP"] : null;
    $done_by = $_SESSION['how'];

    // Insertamos los datos en la tabla correspondiente
    $instruccion_SQL = "INSERT INTO expedientes (escritura, comparecientes, acreedor, acto, factura, honorario, fechaUIF, fechaFirma, fechaTraslado, entregaGestor, fechaIngresoRPP, fechaSalidaRPP, done_by) 
                        VALUES ('$escritura', '$comparecientes', '$acreedor', '$acto', '$factura', '$honorario', '$fechaUIF', '$fechaFirma', '$fechaTraslado', '$entregaGestor', '$fechaIngresoRPP', '$fechaSalidaRPP','$done_by')";

    if (mysqli_query($connection, $instruccion_SQL)) {
        $escritura_id = mysqli_insert_id($connection);

        for ($i = 1; $i <= $_POST['comparecientes']; $i++) {
            $nombre = $_POST["comparecienteNombre$i"];
            $rol = $_POST["comparecienteRol$i"];

            $sql_compareciente = "INSERT INTO comparecientes (escritura_id, nombre, rol)
                                  VALUES ('$escritura_id', '$nombre', '$rol')";
            mysqli_query($connection, $sql_compareciente);
        }

        echo '<h3 class="success">Expediente Registrado Exitosamente.</h3>';
    } else {
        echo '<h3 class="error">Error: ' . $instruccion_SQL . '<br>' . mysqli_error($connection) . '</h3>';
    }
}

?>

<?php
// Datos del servidor
$host = "localhost";
$user = "root";
$pass = "";
$datab = "notarie";

include 'conexion_be.php';

// Mostramos el último expediente registrado
$consulta = "
SELECT * 
FROM expedientes 
ORDER BY id DESC 
LIMIT 1
";

$result = mysqli_query($conexion, $consulta);
if (!$result) {
    die("No se ha podido realizar la consulta");
} else {
    if ($colum = mysqli_fetch_array($result)) {
        echo "El número de operación que se asignó fue el " . $colum['escritura'];
    } else {
        echo "No se encontró ningún expediente.";
    }
}
?>



<?php
// Cerrar la conexión
mysqli_close($connection);

echo '<br><br><a href="../menu.php">L I S T O</a>';
echo '</div>';
?>