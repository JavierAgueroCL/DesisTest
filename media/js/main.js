(function(window, document, $){
    "use strict";

    //MODO DE PRUEBAS
    var DEBUG = true;

    //DECLARACION DE RUTS
    var frm 	= jQuery('#formulario');
	var rut 	= jQuery("#rut");
	var alert 	= jQuery(".alert");

	//COMPROBACION DE RUT
	rut.on('input', function() {
		var ninjarut = new NinjaRut(rut.val());
		rut.val(ninjarut.format());
		rut.parent().removeClass("has-error");

		DEBUG == true && console.log("RUT no valido: " + ninjarut.isValid);
	}); 

    // CAMBIO DE VALORES SELECT
    jQuery("#ciudad").change(function () {
        var valor = jQuery(this).val();
        jQuery("#resultado").load("view/select.modal.php?ciudad=" + valor);
    });

    // FORMULARIO AJAX
    frm.submit(function (ev) {
		ev.preventDefault();
		var ninjarut = new NinjaRut(rut.val());

    	// VALIDACION DE TODOS LOS DATOS, DESDE HTML5
    	if (jQuery(this).get(0).checkValidity() == false){ return false; }
    	if (ninjarut.isValid == false) { error(rut); }


        jQuery.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            beforeSend: function()
			{
				//alert('antes de enviar');
			},
            success: function (data) {
                //alert('ok');
            },
            error: function (data) {
            	//alert('error');	
            }
        });

    });

    //MUESTRA EL CAMPO DE ERROR
    function error(campo){
		campo.parent().addClass("has-error");  
		alert.html(campo.attr('title')).addClass("alert-danger");
		return false; 
    }

}(this, jQuery));