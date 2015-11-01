$(document).ready(function(){

	$("#form").validate({		
		rules: {
			nombre: {
				required: true,	
				alphas: true		
			},
			titulo: {
				required: true,	
				alphas: true		
			},
			url: {
				required: true,	
				url: true		
			},
			edad: {
				required: true,
				numbers: true
			}
		},
		submitHandler: function(form){			
			form.submit();				
		},
		highlight: function(element){
			$(element).parent().removeClass('has-success').addClass('has-error');
		}, 
		success: function(element){
			$(element).parent().removeClass('has-error').addClass('has-success');
		}
	});

	jQuery.validator.addMethod("alphas", function(value, element) {
  return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
	}, 'Sólo caracteres');

	jQuery.validator.addMethod("numbers", function(value, element) {
  return this.optional(element) || /^[1-9]+$/.test(value);
	}, 'Sólo números');

	$("#guardar").prop('disabled', 'disabled');

	$("#form").on('keyup blur', function(){ //Evento cada que presionemos una tecla o posicion 
		if ($("#form").valid()){
			//Habilitamos
			$("#guardar").prop('disabled', false);
		}else{
			//Deshabilitado
			$("#guardar").prop('disabled', 'disabled');
		}
	});


});