<?php
    /*
    session_start();
    if(!isset($_SESSION['user'])){
        echo'
            <script>
                alert("Inicia Sesion por favor");
            </script>';
        session_destroy();
        die();
    }

    session_destroy();*/
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOT65</title>
    <link rel="stylesheet" href="estilos_menu.css">
    <link rel="icon" href="img/logo.png">

</head>

<body>
    <nav>
        <ul>
            <li><a href="buscador_notario.php">Buscar</a></li>
            <li><a href="php\ver_expedientes_notario.php">Ver todos los Expedientes</a></li>
            <li><a href="grafico_expedientes.php">Panorama Gráfico</a></li>
            <li><a href="php/cerrar_sesion.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <h1>BIENVENIDO NOTARIO</h1>
    <h1>Lic. Jose Luis Mazoy Kuri</h1><br>
    <p>

    </p>
</body>

</html>