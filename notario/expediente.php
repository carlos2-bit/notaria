<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Expediente</title>
    <link rel="stylesheet" href="estilos_expediente.css">
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
        ;
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

    <h1>NUEVO EXPEDIENTE</h1>

    <form action="php\register.php" method="POST" enctype="multipart/form-data">


        <h2>Datos</h2>
        <p>Ingrese los datos correspondientes</p>

        <div class="form-group full-width">
            <label for="numComparecientes">No. Comparecientes:</label>
            <input type="number" id="numComparecientes" name="comparecientes" min="1" required
                onchange="generarCamposComparecientes()">
        </div>

        <div id="comparecientesContainer" class="form-group full-width"></div>

        <div class="form-group full-width">
            <label for="acto">Acto:</label>
            <input type="text" id="acto" name="acto" required>
        </div>

        <div class="form-group">
            <label for="acreedor">Acreedor:</label>
            <input type="text" id="acreedor" name="acreedor" required>

            <label for="factura">No. Factura:</label>
            <input type="text" id="factura" name="factura">
        </div>

        <div class="form-group">
            <label for="honorario">Honorarios:</label>
            <input type="number" id="honorario" name="honorario" step="0.01" placeholder="$">
        </div>

        <h2>Escrituras</h2>
        <p>Ingrese la informacion correspondiente</p>

        <div class="form-group">

            <label for="protocolo">Protocolo:</label>
            <select id="protocolo" name="protocolo">
                <option value="ordinario">Ordinario</option>
                <option value="especial">Especial</option>
            </select>

            <label for="esc">Escritura: </label>
            <input type="number" id="esc" name="esc">

        </div>

        <h2>Fechas</h2>
        <p>Ingrese las fechas correspondientes</p>

        <div class="form-group">

            <label for="fechaUIF">EXP UIF:</label>
            <input type="date" id="fechaUIF" name="fechaUIF">

            <label for="fechaFirma">Firma:</label>
            <input type="date" id="fechaFirma" name="fechaFirma">

            <label for="fechaTraslado">Traslado:</label>
            <input type="date" id="fechaTraslado" name="fechaTraslado">

            <label for="entregaGestor">Entrega a Gestor:</label>
            <input type="date" id="entregaGestor" name="entregaGestor">
        </div>

        <div class="form-group">
            <label for="fechaIngresoRPP">Ingreso a RPP:</label>
            <input type="date" id="fechaIngresoRPP" name="fechaIngresoRPP">

            <label for="fechaSalidaRPP">Salida de RPP:</label>
            <input type="date" id="fechaSalidaRPP" name="fechaSalidaRPP">

            <label for="entregaCliente">Entrega a Cliente:</label>
            <input type="date" id="entregaCliente" name="entregaCliente">

        </div>

        <h2>Factura</h2>
        <div class="form-group full-width">
            <label for="archivo">Subir Archivos:</label>
            <input type="file" id="file" name="file" multiple>
        </div>
        <input type="submit" name="Registrar">

        <script src="eljava.js"></script>


</body>

</html>