// JavaScript para controlar la visibilidad del contenedor de reservas
document.addEventListener('DOMContentLoaded', function () {
    var reservasAreasComunesLink = document.getElementById('reservasAreasComunes');
    var reservasContent = document.getElementById('reservasContent');

    reservasAreasComunesLink.addEventListener('click', function (event) {
        event.preventDefault(); // Evita que se realice la acción predeterminada del enlace

        // Si el contenedor de reservas está oculto, muéstralo; de lo contrario, ocúltalo
        if (reservasContent.style.display === 'none') {
            reservasContent.style.display = 'block';
        } else {
            reservasContent.style.display = 'none';
        }
    });
});



function formatDate(date) {
    // Obtiene el día, mes y año
    var day = date.getDate();
    var month = date.getMonth() + 1; // Se suma 1 porque los meses van de 0 a 11
    var year = date.getFullYear();

    // Ajusta el formato para que siempre tenga dos dígitos
    if (day < 10) {
        day = '0' + day;
    }
    if (month < 10) {
        month = '0' + month;
    }

    // Retorna la fecha en formato "YYYY-MM-DD"
    return year + '-' + month + '-' + day;
}

// Ejemplo de uso
var fecha = new Date('01/01/2021');
var fechaFormateada = formatDate(fecha);
console.log(fechaFormateada);