var list = null; $('#item-list');
var detail = null; $('#item-detail');

/**
 * Load view
 */
function loadDetail(id) {
    $.ajax({
        url: BASE_URL + "masterdetail/view/" + id,
    }).done(function(response) {
        detail.html(response);
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
        url: BASE_URL + "masterdetail/list",
    }).done(function(response) {
        console.log(1);
        list.html(response);
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
            url: BASE_URL + "masterdetail/create",
        }).done(function(response) {
            detail.html(response);
        }).fail(function(response) {
            alert('Lo sentimos, algo salió mal :(');
            console.log(response);
        });
    });

     $('#boton').click(function() {
        $.ajax({
            url: BASE_URL + "masterdetail/create",
        }).done(function(response) {
            detail.html(response);
        }).fail(function(response) {
            alert('Lo sentimos, algo salió mal :(');
            console.log(response);
        });
    });
    
    
});