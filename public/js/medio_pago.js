$(document).ready(function () {

    $('#btn-añadir-tarjeta').click(function () {
        alert(1);
    });
    $('#form-añadir-tarjeta').submit(function(evnet) {
        event.preventDefault();
        alert(2);
    });

});