document.addEventListener('DOMContentLoaded', function() {
    var reservasAreasComunesLink = document.getElementById('reservasAreasComunes');
    var reservaAreasComunesContent = document.getElementById('reservaAreasComunesContent');
    
    reservasAreasComunesLink.addEventListener('click', function(event) {
        event.preventDefault(); // Evita que se realice la acción predeterminada del enlace
        
        var xhr = new XMLHttpRequest();
        var url = "http://localhost/proyectoConjuntos/views/reservas_areas_comunes.php";
        xhr.open('GET', url, true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Inserta el contenido de la vista en el contenedor
                reservaAreasComunesContent.innerHTML = xhr.responseText;
            } else {
                console.error('Error al cargar la vista de reserva de áreas comunes');
            }
        };
        xhr.onerror = function() {
            console.error('Error de red al cargar la vista de reserva de áreas comunes');
        };
        xhr.send();
    });
});
