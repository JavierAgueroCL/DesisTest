(function(window, document, $){
    "use strict";

    //MODO DE PRUEBAS
    var DEBUG = true;

    //DECLARACION DE RUTS
    var frm 	= jQuery('#formulario');
	var rut 	= jQuery("#rut");
	var alert 	= jQuery(".alert");
    var ciudad  = jQuery("#ciudad");
    var select  = jQuery("#resultado");

	//COMPROBACION DE RUT
	rut.on('input', function() {
		var ninjarut = new NinjaRut(rut.val());
		rut.val(ninjarut.format());
		rut.parent().removeClass("has-error");

		DEBUG == true && console.log("RUT no valido: " + ninjarut.isValid);
	}); 

    // CAMBIO DE VALORES SELECT
    ciudad.change(function () {
        var valor = jQuery(this).val();
        select.load("index.php?mod=select&val=" + valor);
        select.removeAttr("disabled");
        select.prop('required', true);

        if(ciudad.val() === "") {
            select.prop('disabled', true);
            select.prop('required', false);
            select.find('option').remove().end();
            DEBUG == true && console.log("Ciudad Vacia, campo desactivado");    
        }
        DEBUG == true && console.log("Select dependiente cargado val:" + valor);
    });

    // FORMULARIO AJAX
    frm.submit(function (event) {
		event.preventDefault();
		var ninjarut = new NinjaRut(rut.val());

    	// VALIDACION DE TODOS LOS DATOS, DESDE HTML5
    	if (jQuery(this).get(0).checkValidity() == false){ return false; }
    	if (ninjarut.isValid == false) { error(rut);  return false; }


        jQuery.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            beforeSend: function()
			{
				//alert('antes de enviar');
                DEBUG == true && console.log("Cargando formulario");
			},
            success: function (data) {
                alert.addClass("alert-success");
                alert.html(data);
                DEBUG == true && console.log("formulario existoso");
            },
            error: function (data) {
            	//alert('error');	
                DEBUG == true && console.log("Error en el Formulario");
            }
        });

    });

    //CARGA INFORMACION USUARIOS
    jQuery("#cargar-info").on('click', function (event) {
        event.preventDefault();
        jQuery("#info-load").load("index.php?mod=getinfo");
        jQuery('.table').DataTable();
        DEBUG == true && console.log("Tabla cargada");
    });

    //MUESTRA EL CAMPO DE ERROR
    function error(campo){
		campo.parent().addClass("has-error");  
		alert.html(campo.attr('title')).addClass("alert-danger");
        alert.html(campo.attr('title')).removeClass("alert-success");
		return false; 
        DEBUG == true && console.log("Error en el campo:" + campo);
    }

    jQuery("#info-load").delegate("load", ".table", function () {
        jQuery('#tabla').DataTable({"order": [[ 0, "desc" ]] });
        DEBUG == true && console.log("Tabla Delegada");
    });

}(this, jQuery));