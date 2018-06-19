var list = null;
var detail = null;

/**
 * Load view
 */
function loadDetail(id) {
    $.ajax({
        url: BASE_URL + "producto/view/" + id,
    }).done(function(response) {
        detail.html(response);
    }).fail(function(response) {
        alert('Lo sentimos, algo salió mal :(');
        console.log(response);
    });
}

/**
 * Create item
 */
function createItem() {
    var data = $( '.create-form' ).serialize();
    $.ajax({
        url: BASE_URL + "producto/create",
        method: "POST",
        data: data
    }).done(function(response) {
        detail.html('Listo');
    }).fail(function(response) {
        alert('Lo sentimos, algo salió mal :(');
        console.log(response);
    });
}

$( document ).ready(function() {

    list = $('#item-list');
    detail = $('#item-detail');

    /**
     * Load the list data
     */
    $.ajax({
        url: BASE_URL + "producto/list",
    }).done(function(response) {
        console.log(2);
        list.html(response);
        detail.html('');
        $('.item-row').click(function() {
            var id = $(this).data('id');
            loadDetail(id);
        });
    }).fail(function(response) {
        alert('Lo sentimos, algo salió mal :(');
        console.log(response);
    });

    $('.item-row').click(function() {
        var id = $(this).data('id');
        loadDetail(id);
    });
    
    $('#new-item-btn').click(function() {
        $.ajax({
            url: BASE_URL + "producto/create",
        }).done(function(response) {
            detail.html(response);
        }).fail(function(response) {
            alert('Lo sentimos, algo salió mal :(');
            console.log(response);
        });
    });

     $('#boton').click(function() {
        $.ajax({
            url: BASE_URL + "producto/create",
        }).done(function(response) {
            detail.html(response);
        }).fail(function(response) {
            alert('Lo sentimos, algo salió mal :(');
            console.log(response);
        });
    });
    
    
});