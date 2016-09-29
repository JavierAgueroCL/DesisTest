(function(window, document, $){
    "use strict";

    //MODO DE PRUEBAS
    var DEBUG = true;

    //DECLARACION DE RUTS
    var frm 	= jQuery('#formulario');
	var rut 	= jQuery("#rut");
	var alert 	= jQuery(".alert");
    var ciudad  = jQuery("#ciudad");
    var select  = jQuery("#comuna");

    //CARGA LOS DATOS INICIALES EN REGION
    ciudad.load("index.php?mod=select");

	//COMPROBACION DE RUT
	rut.on('input', function() {
		var ninjarut = new NinjaRut(rut.val());
        var largo = rut.val().length;
		rut.val(ninjarut.format());
		rut.parent().removeClass("has-error");


        //CARGA DE DATOS
        if(largo == 10) {
            DEBUG == true && console.log("Largo completado: " + rut.val());

            jQuery(document).keypress(function(e) { // PRESIONA ENTER

                if(e.which == 13) {
                    alert.load("index.php?mod=getinfo&comuna&rut=" + rut.val());
                    DEBUG == true && console.log("Infomacion Cargada");
                  }
                alert.removeClass("alert-success").removeClass("alert-danger");
            });
        }

        //COLOR DEL TEXT
        if(ninjarut.isValid == false) {
            rut.addClass("alert-danger").removeClass("alert-success");
        }
        else if(ninjarut.isValid == true && largo == 10) {
            rut.addClass("alert-success").removeClass("alert-danger");
        }

		DEBUG == true && console.log("RUT no valido [" + largo + "]: " + ninjarut.isValid);
	}); 

    // CAMBIO DE VALORES SELECT
    ciudad.change(function () {
        var valor = jQuery(this).val();
        select.load("index.php?mod=select&comuna=true&region=" + valor);
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
                jQuery(".alert").html("<img src='media/images/load.gif' width='30' />");
				jQuery(".alert").removeClass("alert-success").removeClass("alert-danger");
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


    //REMUEVE EL ENTER DEL FORMULARIO
    frm.on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) { 
            e.preventDefault();
            //return false;
        }
    });

    //MUESTRA EL CAMPO DE ERROR
    function error(campo){
		campo.parent().addClass("has-error");  
		alert.removeClass("alert-danger");
        alert.removeClass("alert-success");

        //alert.html(campo.attr('title')).removeClass("alert-danger");
        //alert.html(campo.attr('title')).removeClass("alert-success");
		return false; 
        DEBUG == true && console.log("Error en el campo:" + campo);
    }


}(this, jQuery));