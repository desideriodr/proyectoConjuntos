document.addEventListener("DOMContentLoaded", function() {
    // JavaScript para controlar la visibilidad del contenedor de reservas
    var reservasAreasComunesLink = document.getElementById('reservasAreasComunes');
    var reservasContent = document.getElementById('reservasContent');

    reservasAreasComunesLink.addEventListener('click', function (event) {
        event.preventDefault(); // Evita que se realice la acción predeterminada del enlace

        // Si el contenedor de reservas está oculto, muéstralo; de lo contrario, ocúltalo
        reservasContent.style.display = (reservasContent.style.display === 'none') ? 'block' : 'none';
    });
    
    function registrarReserva(idZona) {
    $.ajax({
        type: 'POST',
        url: 'registrarReserva.php',
        data: { idZona: idZona },
        success: function(response) {
            alert(response); // Muestra la respuesta del servidor
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('Error al registrar la reserva');
        }
    });
}
    
});