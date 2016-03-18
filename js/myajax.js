$(document).ready(function(){
	$(".speaker").click(function(e){
		e.preventDefault();
		//alert(this);
		showSpeakerDetails( $(".details > .name",this).html(),$(".details > .about",this).html() );
	})


	});

function showSpeakerDetails(name,about)
{
	$("#mymodalname").html(name);	
	$("#mymodalabout").html(about);	
	$("#mymodal").modal("toggle");
}
