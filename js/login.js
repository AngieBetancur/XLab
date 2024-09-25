document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar que el formulario se envíe inmediatamente

        // Obtener los valores de los campos
        const tipoIdentificacion = document.getElementById('tipo_identificacion').value;
        const identificacion = document.getElementById('identificacion').value;
        const fechaNacimiento = document.getElementById('fecha_nacimiento').value;

        // Validar que los campos no estén vacíos
        if (!tipoIdentificacion || !identificacion || !fechaNacimiento) {
            alert('Por favor, complete todos los campos requeridos.');
            return;
        }

        // Validar que el número de identificación sea un número válido
        if (isNaN(identificacion) || identificacion.length < 5) {
            alert('El número de identificación debe ser un número válido y tener al menos 5 dígitos.');
            return;
        }

        // Si todas las validaciones pasan, enviar el formulario
        form.submit();
    });
});
