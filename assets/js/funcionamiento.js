var script = document.createElement('script');
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);


$(document).ready(()=> {
	$('#calefacciones_text').show();
	$('#calentamiento_text').hide();
	$('#circulacion_text').hide();
	$('#regulacion_text').hide();
	$('#aire_text').hide();
	$('#calefactores_show_td').addClass("characteristics_functioning_selected_button");

	$('#calefactores_show').click(function() {
		$('#calefacciones_text').show();
		$('#calentamiento_text').hide();
		$('#circulacion_text').hide();
		$('#regulacion_text').hide();
		$('#aire_text').hide();
		$('#calefactores_show_td').addClass("characteristics_functioning_selected_button");
		$('#calentamiento_show_td').removeClass("characteristics_functioning_selected_button");
		$('#circulacion_show_td').removeClass("characteristics_functioning_selected_button");
		$('#regulacion_show_td').removeClass("characteristics_functioning_selected_button");
		$('#aire_show_td').removeClass("characteristics_functioning_selected_button");

	});	

	$('#calentamiento_show').click(function() {
		$('#calefacciones_text').hide();
		$('#calentamiento_text').show();
		$('#circulacion_text').hide();
		$('#regulacion_text').hide();
		$('#aire_text').hide();
		$('#calefactores_show_td').removeClass("characteristics_functioning_selected_button");
		$('#calentamiento_show_td').addClass("characteristics_functioning_selected_button");
		$('#circulacion_show_td').removeClass("characteristics_functioning_selected_button");
		$('#regulacion_show_td').removeClass("characteristics_functioning_selected_button");
		$('#aire_show_td').removeClass("characteristics_functioning_selected_button");
	});

	$('#circulacion_show').click(function() {
		$('#calefacciones_text').hide();
		$('#calentamiento_text').hide();
		$('#circulacion_text').show();
		$('#regulacion_text').hide();
		$('#aire_text').hide();
		$('#calefactores_show_td').removeClass("characteristics_functioning_selected_button");
		$('#calentamiento_show_td').removeClass("characteristics_functioning_selected_button");
		$('#circulacion_show_td').addClass("characteristics_functioning_selected_button");
		$('#regulacion_show_td').removeClass("characteristics_functioning_selected_button");
		$('#aire_show_td').removeClass("characteristics_functioning_selected_button");
	});

	$('#regulacion_show').click(function() {
		$('#calefacciones_text').hide();
		$('#calentamiento_text').hide();
		$('#circulacion_text').hide();
		$('#regulacion_text').show();
		$('#aire_text').hide();
		$('#calefactores_show_td').removeClass("characteristics_functioning_selected_button");
		$('#calentamiento_show_td').removeClass("characteristics_functioning_selected_button");
		$('#circulacion_show_td').removeClass("characteristics_functioning_selected_button");
		$('#regulacion_show_td').addClass("characteristics_functioning_selected_button");
		$('#aire_show_td').removeClass("characteristics_functioning_selected_button");

	});

	$('#aire_show').click(function() {
		$('#calefacciones_text').hide();
		$('#calentamiento_text').hide();
		$('#circulacion_text').hide();
		$('#regulacion_text').hide();
		$('#aire_text').show();
		$('#calefactores_show_td').removeClass("characteristics_functioning_selected_button");
		$('#calentamiento_show_td').removeClass("characteristics_functioning_selected_button");
		$('#circulacion_show_td').removeClass("characteristics_functioning_selected_button");
		$('#regulacion_show_td').removeClass("characteristics_functioning_selected_button");
		$('#aire_show_td').addClass("characteristics_functioning_selected_button");
	});
	
})

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("characteristic_slide");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

