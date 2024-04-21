document.addEventListener("DOMContentLoaded", function() {
    // JavaScript para controlar la visibilidad del contenedor de reservas
    var reservasAreasComunesLink = document.getElementById('reservasAreasComunes');
    var reservasContent = document.getElementById('reservasContent');
    var tablaReservas = document.getElementById('tablaReservas');

    // Mostrar la tabla al cargar la página
    tablaReservas.style.display = 'block';

    reservasAreasComunesLink.addEventListener('click', function (event) {
        event.preventDefault(); // Evita que se realice la acción predeterminada del enlace

        // Si el contenedor de reservas está oculto, muéstralo; de lo contrario, ocúltalo
        reservasContent.style.display = (reservasContent.style.display === 'none') ? 'block' : 'none';
        tablaReservas.style.display = (reservasContent.style.display === 'none') ? 'block' : 'none'; // Mostrar la tabla cuando se oculta el formulario
    });

    // Ocultar la tabla cuando se muestra el formulario al cargar la página
    reservasContent.style.display = 'none';
});
