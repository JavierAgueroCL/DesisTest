<?php
include("includes/tabla.class.php");
//include("includes/security.class.php");
referer();

$tabla = new Tabla();
//$security = new Security();
$rut = $_GET['rut'];

$resultado = $tabla->get("
    SELECT * 
    FROM informacion_empresa_view
    WHERE rut='".$rut."' LIMIT 1");

    //CODIGO MUY RAPIDO
    //DEBERIA HACERSE UN FOREACH QUE RECORRA UNO POR UNO LOS CAMPOS
    //Y NO MANUALMENTE,COMO ESTA AHORA
    //CARGA LOS DATOS

    echo '<script>';
    foreach ($resultado as $info){

        //Informacion personal
        echo 'jQuery("#razon_social").val("'.$info['razon_social'].'");';
        echo 'jQuery("#giro_comercial").val("'.$info['giro_comercial'].'");';
        echo 'jQuery("#direccion").val("'.$info['direccion'].'");';
        echo 'jQuery("#nombre_contacto").val("'.$info['nombre_contacto'].'");';
        echo 'jQuery("#email").val("'.$info['email_contacto'].'");';


        //Checkboxes
        echo 'jQuery("input[type=checkbox]").attr("checked", false);';
        if($info['factura'] == 1) { echo 'jQuery("#factura").attr("checked", true);';  }
        if($info['boleta'] == 1) { echo 'jQuery("#boleta").attr("checked", true);';  }
        if($info['exportacion'] == 1) { echo 'jQuery("#exportacion").attr("checked", true);';  }
        if($info['guia_despacho'] == 1) { echo 'jQuery("#guia_despacho").attr("checked", true);';  }
        if($info['factura_compra'] == 1) { echo 'jQuery("#factura_compra").attr("checked", true);';  }
        if($info['liquidacion'] == 1) { echo 'jQuery("#liquidacion").attr("checked", true);';  }
        if($info['factura_exenta'] == 1) { echo 'jQuery("#factura_exenta").attr("checked", true);';  }

        //Selects
        ?>
        jQuery("#comuna").load("index.php?mod=select&comuna=true&region=<?php echo $info['region']; ?>");
        jQuery("#comuna").removeAttr("disabled");
        jQuery('#ciudad option[value="<?php echo $info['region']; ?>"]').attr('selected', 'selected');
        
        setTimeout('cargar_comuna()',500);
        function cargar_comuna(){
            jQuery('#comuna option[value="<?php echo $info['comuna']; ?>"]').attr('selected', 'selected');
        }
        <?php


    }
    echo '</script>';
?>

