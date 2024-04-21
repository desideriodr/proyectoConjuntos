document.addEventListener("DOMContentLoaded", function() {
    // JavaScript para controlar la visibilidad del contenedor de reservas
    var reservasAreasComunesLink = document.getElementById('reservasAreasComunes');
    var reservasContent = document.getElementById('reservasContent');

    reservasAreasComunesLink.addEventListener('click', function (event) {
        event.preventDefault(); // Evita que se realice la acción predeterminada del enlace

        // Si el contenedor de reservas está oculto, muéstralo; de lo contrario, ocúltalo
        reservasContent.style.display = (reservasContent.style.display === 'none') ? 'block' : 'none';
    });

    // Manejar el registro de reservas al hacer clic en el botón Registrar
     document.querySelectorAll(".btnRegistrar").forEach(function(button) {
        button.addEventListener("click", function(e) {
            e.preventDefault();
            
            var form = this.closest('tr').querySelector('form');
            var formData = new FormData(form);
            
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    
                    alert("¡Registrado con éxito!");
                    
                }else {
                        alert("Error al registrar");
                    }
            };
            xhr.open("POST", form.action, true);
            xhr.send(formData);
        });
    });
});