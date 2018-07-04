$(document).ready(function () {
    
    $('#btn-pagar').click(function () { 
        var option = $('input[name="medi_clave"]:checked').val();
        window.location.href = BASE_URL + 'carrito/hacer_pago/' + option;
    });

    $('#btn-pagar-tienda').click(function () { 
        var option = $('input[name="medi_clave"]:checked').val();
        var tipo = $('#tipo_usuario').val();
        window.location.href = BASE_URL + 'carrito/hacer_pago_en_tienda/' + tipo + '/' + option;
    });

    $('.tarjeta').click(function (e) { 
        e.preventDefault();
        $(this).find('input').prop("checked", true);
    });
});
