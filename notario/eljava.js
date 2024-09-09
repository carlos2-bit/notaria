function generarCamposComparecientes() {
    const numComparecientes = document.getElementById('numComparecientes').value;
    const container = document.getElementById('comparecientesContainer');
    container.innerHTML = ''; // Limpia el contenido anterior

    for (let i = 1; i <= numComparecientes; i++) {
        // Crear el campo para el nombre del compareciente
        const labelNombre = document.createElement('label');
        labelNombre.textContent = `Compareciente ${i}:`;
        const inputNombre = document.createElement('input');
        inputNombre.type = 'text';
        inputNombre.name = `comparecienteNombre${i}`;
        inputNombre.placeholder = `Nombre`;
        inputNombre.required = true;

        // Crear el campo para el rol del compareciente
        const labelRol = document.createElement('label');
        labelRol.textContent = `Rol ${i}:`;
        const inputRol = document.createElement('input');
        inputRol.type = 'text';
        inputRol.name = `comparecienteRol${i}`;
        inputRol.placeholder = `Rol`;
        inputRol.required = true;

        // Añadir los elementos al contenedor
        const divCompareciente = document.createElement('div');
        divCompareciente.className = 'form-group';
        divCompareciente.appendChild(labelNombre);
        divCompareciente.appendChild(inputNombre);
        divCompareciente.appendChild(labelRol);
        divCompareciente.appendChild(inputRol);
        
        container.appendChild(divCompareciente);
    }
}

function cambiarColorFondoPorFecha() {
    const fechaFirma = document.getElementById('fechaFirma');
    const fechaTraslado = document.getElementById('fechaTraslado');
    const entregaGestor = document.getElementById('entregaGestor');
    const fechaIngresoRPP = document.getElementById('fechaIngresoRPP');
    const fechaSalidaRPP = document.getElementById('fechaSalidaRPP');

    if (fechaFirma) {
        fechaFirma.addEventListener('input', function() {
            document.body.className = this.value ? 'highlight-bg-firma' : 'default-bg';
        });
    }

    if (fechaTraslado) {
        fechaTraslado.addEventListener('input', function() {
            document.body.className = this.value ? 'highlight-bg-traslado' : 'default-bg';
        });
    }

    if (entregaGestor) {
        entregaGestor.addEventListener('input', function() {
            document.body.className = this.value ? 'highlight-bg-gestor' : 'default-bg';
        });
    }

    if (fechaIngresoRPP) {
        fechaIngresoRPP.addEventListener('input', function() {
            document.body.className = this.value ? 'highlight-bg-ingreso-rpp' : 'default-bg';
        });
    }

    if (fechaSalidaRPP) {
        fechaSalidaRPP.addEventListener('input', function() {
            document.body.className = this.value ? 'highlight-bg-salida-rpp' : 'default-bg';
        });
    }
}

document.addEventListener('DOMContentLoaded', cambiarColorFondoPorFecha);


