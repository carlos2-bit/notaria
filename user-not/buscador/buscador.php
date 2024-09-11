<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda de Expediente</title>
    <link rel="stylesheet" href="estail.css">
    <link rel="icon" href="img/logo.png">
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
        background-color: #002147;
    }
    </style>
</head>

<body>
    <div class="button-container">
        <a href="carga_menu.php">Volver al Menú</a>
    </div>

    <h2>Busca el Expediente</h2>
    <div class="form-group">
        <label for="busqueda">Buscar Expedientes:</label>
        <input type="text" id="busqueda" name="busqueda">
    </div>

    <table>
        <thead>
            <tr>
                <th>No. Escritura</th>
                <th>Comparecientes</th>
                <th>Acto</th>
                <th>Acreedor</th>
                <th>Factura</th>
                <th>Honorarios</th>
                <th>Fechas</th>
                <th>Creador</th>
            </tr>
        </thead>
        <tbody id="resultadosBusqueda">

        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="eljava.js"></script>
    <script>
    $(document).ready(function() {
        $('#busqueda').on('input', function() {
            let valorBusqueda = $(this).val();
            if (valorBusqueda != "") {
                $.ajax({
                    url: 'php/bus.php',
                    method: 'POST',
                    data: {
                        query: valorBusqueda
                    },
                    success: function(data) {
                        $('#resultadosBusqueda').html(data);
                    }
                });
            } else {
                $('#resultadosBusqueda').html("");
            }
        });
    });
    </script>

</body>

</html>