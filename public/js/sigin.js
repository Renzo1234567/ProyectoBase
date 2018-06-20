$(document).on("ready",main);

function main(){
$("#error1").hide();
$('#closeboton').on('click', function(c){
		$(this).parent().fadeOut('slow', function(c){
		});
	});	
	$("#login").submit(function(event){
		event.preventDefault();
		$.ajax({
			url:$(this).attr("action"),
			method:$(this).attr("method"),
			data:$(this).serialize(),
			success:function(resp){
                                console.log(resp);
                                if(resp.length > 0) {
                                    $("#error1").show();
                                } else {
                                    window.location.href= BASE_URL;
                                }
			}

		});
	});
}