<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica de Expedientes por Etapas</title>
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
        max-width: 1100px;
        min-width: 1100px;
        /* Añadir un ancho mínimo para evitar que se reduzca demasiado */
        position: relative;
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

    #totalHonorarios {
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 16px;
        font-weight: bold;
        background-color: #f9f9f9;
        padding: 5px 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    canvas {
        max-width: 100%;
        height: auto;
    }
    </style>
</head>

<body>
    <div class="container">
        <div id="totalHonorarios"></div>
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    fetch('obtener_datos.php')
        .then(response => response.json())
        .then(data => {
            const ctx = document.getElementById('myChart').getContext('2d');

            const totalHonorariosGeneral = data.total_honorarios_general;
            const honorariosPorCreador = data.total_honorarios_creador.map((honorario, index) =>
                `${data.creadores[index]}: $${honorario}`);

            // Mostrar el total general de honorarios en la esquina superior izquierda
            document.getElementById('totalHonorarios').innerText = `Total Honorarios: $${totalHonorariosGeneral}`;

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: honorariosPorCreador,
                    datasets: [{
                            label: 'Firma',
                            backgroundColor: '#640101',
                            data: data.firmas
                        },
                        {
                            label: 'Traslado',
                            backgroundColor: '#91350d',
                            data: data.traslados
                        },
                        {
                            label: 'Entregado a Gestor',
                            backgroundColor: '#a4892e',
                            data: data.entregados
                        },
                        {
                            label: 'Ingresado',
                            backgroundColor: '#1d3195',
                            data: data.ingresados
                        },
                        {
                            label: 'Saliente',
                            backgroundColor: '#355E3B',
                            data: data.salientes
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>


    <div class="button-container">
        <a href="menu_notario.php">Volver al Menú</a>
    </div>
</body>

</html>