var script = document.createElement('script');
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);


$(document).ready(()=> {
  $('#call__button').click(function() {
		//$('#modal_container').removeClass("show");
		$('#modal_container').hide();
	});	

})