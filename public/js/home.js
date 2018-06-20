$( document ).ready(function() {

    $('.agregar-prodcuto-carrito').click(function () {
        $(this).parent().find('form').css('display', 'block');
        $(this).css('display', 'none');
    });
    
    $('.agregar-prodcuto-form').submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize();
        var self = this;
        var cantidad = $(this).find('input[name="cantidad"]').val();
        $.ajax({
            url: BASE_URL + "carrito/agregar",
            method: 'POST',
            data: data
        }).done(function(response) {
            alert('Se agregaron ' + cantidad + ' en su carrito');
            $(self).parent().find('.agregar-prodcuto-carrito').css('display', 'block');
            $(self).css('display', 'none');
            console.log(response);
        }).fail(function(response) {
            alert('Lo sentimos, algo salió mal :(');
            console.log(response);
        });
    });  
    
});