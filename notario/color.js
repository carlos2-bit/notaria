$(document).ready(function() {
    $('#busqueda').on('input', function() {
        let valorBusqueda = $(this).val();
        if (valorBusqueda != "") {
            $.ajax({
                url: 'php/buscar_expediente.php',
                method: 'POST',
                data: {
                    query: valorBusqueda
                },
                success: function(data) {
                    $('#resultadosBusqueda').html(data);
                    cambiarColorFilas(); // Cambia el color según las fechas
                }
            });
        } else {
            $('#resultadosBusqueda').html("");
        }
    });
});

function cambiarColorFilas() {
    $('#resultadosBusqueda tr').each(function() {
        const fechaFirma = $(this).find('td:nth-child(8)').text();
        const fechaTraslado = $(this).find('td:nth-child(9)').text();
        const entregaGestor = $(this).find('td:nth-child(10)').text();
        const fechaIngresoRPP = $(this).find('td:nth-child(11)').text();
        const fechaSalidaRPP = $(this).find('td:nth-child(12)').text();

        // Lógica para asignar clase según fechas
        if (fechaFirma) {
            $(this).addClass('highlight-bg-firma');
        } else if (fechaTraslado) {
            $(this).addClass('highlight-bg-traslado');
        } else if (entregaGestor) {
            $(this).addClass('highlight-bg-gestor');
        } else if (fechaIngresoRPP) {
            $(this).addClass('highlight-bg-ingreso-rpp');
        } else if (fechaSalidaRPP) {
            $(this).addClass('highlight-bg-salida-rpp');
        }
    });
}