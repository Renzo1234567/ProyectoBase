$(document).ready(function () {
    
    $('#btn-añadir-tarjeta').click(function () {
        $(this).hide();
        $('#form-añadir-tarjeta').show();
    });
    //No AJAX por razones de tiempo
    //$('#form-añadir-tarjeta').submit(function(evnet) {});

});