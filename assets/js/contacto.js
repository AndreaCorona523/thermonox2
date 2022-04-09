function enviar(){
	nombrejs = document.contacto_form.nombre.value;	
	correo_electronicojs = document.contacto_form.correo_electronico.value;
	asuntojs = document.contacto_form.asunto.value;
	mensajejs = document.contacto_form.mensaje.value;
	tipo_usuariojs = document.getElementById("tipo_usuario").value;
	municipiojs = document.contacto_form.municipio.value;
	estadojs = document.contacto_form.estado.value;
	cod_postjs = document.contacto_form.cod_post.value;
	paisjs = document.contacto_form.pais.value;

	if(document.contacto_form.copia_adicional.checked){
		//enviar copia
	}	

	if(document.contacto_form.politica_privacidad.checked){
		//indicar que se aceptó la politica de privacidad
	}

	alert("Por hacer");

}