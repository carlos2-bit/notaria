<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Carga</title>
    <style>
    body {
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f9f9f9;
        color: #002147;
        font-family: 'Georgia', serif;
        text-align: center;
    }

    .loading-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .loading-container img {
        margin-top: 1px;
        width: 250px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* Sombra para darle profundidad */
        border-radius: 8px;
        /* Opcional: bordes redondeados */
    }
    </style>
</head>

<body>
    <div class="loading-container">
        <img src="img/logo.png" alt="Cargando">
        <h1>Espere un Momento...</h1>
    </div>

    <script>
    setTimeout(function() {
        window.location.href = "menu.php";
    }, 1000);
    </script>
</body>

</html>