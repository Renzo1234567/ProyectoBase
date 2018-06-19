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
			type:$(this).attr("method"),
			data:$(this).serialize(),
			success:function(resp){
				if(resp==="error"){
					$("#error1").show();
				}
				else{
					window.location.href="http://localhost/proyectobase"
				}
			}

		});
	});
}