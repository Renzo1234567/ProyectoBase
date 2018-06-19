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
        $('#delete-item-btn').click(function() {
            if(confirm('¿Seguro?')) {
                alert('listo');
            }
        });
        $('#edit-item-btn').click(function() {
            detail.html('<i class="fas fa-spinner fa-pulse"></i>');
            var id = $(this).data('id');
            loadEdit(id);
        });
    }).fail(function(response) {
        alert('Lo sentimos, algo salió mal :(');
        console.log(response);
    });
}

/**
 * Load form to edit
 */
function loadEdit(id) {
    $.ajax({
        url: BASE_URL + "producto/edit/" + id,
    }).done(function(response) {
        detail.html(response);
        $('.edit-form').submit(function( event ) {
            event.preventDefault();
            updateItem();
        });
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
        detail.html('<i class="fas fa-spinner fa-pulse"></i>');
        list.html('<i class="fas fa-spinner fa-pulse"></i>');
        console.log(response);
        if(response.length > 0) {
            alert(response);
        } else {
            refreshList();
        }
    }).fail(function(response) {
        alert('Lo sentimos, algo salió mal :(');
        console.log(response);
    });
}

/**
 * Update item
 */
function updateItem() {
    var data = $( '.edit-form' ).serialize();
    var id = $('input[name="prod_id"]').val();
    $.ajax({
        url: BASE_URL + "producto/edit",
        method: "POST",
        data: data
    }).done(function(response) {
        detail.html('<i class="fas fa-spinner fa-pulse"></i>');
        list.html('<i class="fas fa-spinner fa-pulse"></i>');
        console.log(response);
        if(response.length > 0) {
            alert(response);
        } else {
            refreshList(id);
        }
    }).fail(function(response) {
        alert('Lo sentimos, algo salió mal :(');
        console.log(response);
    });
}

function refreshList(id = false) {
    $.ajax({
        url: BASE_URL + "producto/get_list",
    }).done(function(response) {
        list.html(response);
        console.log('Estos');console.log(id);
        id ? loadDetail(id) : detail.html('');
        $('.item-row').click(function() {
            var id = $(this).data('id');
            loadDetail(id);
        });
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
    refreshList();

    /**
     * Load detail where is clicked
     */
    $('.item-row').click(function() {
        detail.html('<i class="fas fa-spinner fa-pulse"></i>');
        var id = $(this).data('id');
        loadDetail(id);
    });
    
    /**
     * Show form of create
     */
    $('#new-item-btn').click(function() {
        detail.html('<i class="fas fa-spinner fa-pulse"></i>');
        $.ajax({
            url: BASE_URL + "producto/create",
        }).done(function(response) {
            detail.html(response);
            $('.create-form').submit(function( event ) {
                event.preventDefault();
                createItem();
            });
        }).fail(function(response) {
            alert('Lo sentimos, algo salió mal :(');
            console.log(response);
        });
    });    
    
});

console.log(6);