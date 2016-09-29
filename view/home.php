<!DOCTYPE html>
<html>
  <head>
    <title>Desis Test</title>
    <meta name="encoding" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Prueba de conocimientos técnicos" />
    <meta name="author" content="Javier Aguero" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="lang" content="es-ES" />
    <!-- Bootstrap -->
    <link href="media/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="media/css/styles.css" rel="stylesheet" media="screen">
  </head>
  <body>
  	<header>
    	<h1>Prueba Desis</h1>
    	<hr width="80%">
	</header>
	<main>
		<form method="post" id="formulario" action="index.php?mod=saveinfo"> 
			<section class="row">
				<div class="col-xs-12">
					<div class="alert"></div>
					<h3>Datos de la Empresa</h3>
					<div class="offset col-md-3 vcenter">RUT Empresa</div>
					<div class="offset col-md-9">
						<input class="form-control input-lg" id="rut" required="" name="rut" type="text" maxlength="10" placeholder="Ej: 11111111-1" title="Ingrese un rut Valido" />
					</div>
					<div class="offset col-md-3 vcenter">Razon Social</div>
					<div class="offset col-md-9">
						<input class="form-control input-lg" required="" name="razon_social" id="razon_social" type="text" maxlength="100" placeholder="Ej: Su empresa Ltda" title="Ingresa su razon social" />
					</div>
					<div class="offset col-md-3 vcenter">Giro Comercial</div>
					<div class="offset col-md-9">
						<input class="form-control input-lg" required="" name="giro_comercial" id="giro_comercial" type="text" minlength="5" maxlength="100" placeholder="Ej: Venta de repuestos" title="Ingres su Giro Comercial" />
					</div>
					<div class="offset col-md-3 vcenter">Direcci&oacute;n</div>
					<div class="offset col-md-4">
						<input class="form-control input-lg" required="" name="direccion" id="direccion" type="text" maxlength="100" placeholder="Ej: Mi direccion" title="Ingrese su direccion, solo letras y numeros" pattern="[a-zA-Z0-9\s]+" />
					</div>
					<div class="offset col-md-3">
						<select name="ciudad" class="form-control input-lg" id="ciudad" required>
							<option value="">-- Seleccione ---</option>
						</select>
					</div>
					<div class="offset col-md-2">
						<select  name="comuna" class="form-control input-lg" id="comuna" required disabled>
							<option value="">-- Seleccione ---</option>
						</select>
					</div>
					<h3>Datos de Contacto</h3>
					<div class="offset spaccer col-md-3 vcenter">Nombre Contacto</div>
					<div class="offset col-md-9">
						<input class="form-control input-lg" required="" name="nombre_contacto" id="nombre_contacto"  type="text" maxlength="100" placeholder="Ej: Juan Riquelme" title="Ingres su Nombre" />
					</div>
						<div class="offset col-md-3 vcenter">Correo Electronico</div>
					<div class="offset col-md-9">
						<input class="form-control input-lg" required="" name="email" id="email" type="email" maxlength="100" placeholder="Ej: ejemplo@ejemplo.cl" title="Ingrese su Email" />
					</div>
					<h3>Tipos Documento</h3>
					<div class="offset col-md-4">
						<label><input type="checkbox" name="factura" id="factura" required /> Facturas, Notas de credito y debito electronico</label>
					</div>
					<div class="offset col-md-4">
						<label><input type="checkbox" name="boleta" id="boleta" required /> Boleta y/o Boleta exenta Electronica</label>
					</div>
					<div class="offset col-md-4">
						<label><input type="checkbox" name="exportacion" id="exportacion" required /> Documentos de Exportacion Electronica</label>
					</div>
					<div class="offset col-md-4">
						<label><input type="checkbox" name="guia_despacho" id="guia_despacho" /> Guia de despacho electronica</label>
					</div>
					<div class="offset col-md-4">
						<label><input type="checkbox" name="factura_compra" id="factura_compra"/> Factura de Compra Electronica</label>
					</div>
					<div class="offset col-md-4">
						<label><input type="checkbox" name="liquidacion" id="liquidacion" /> Liquidacion Factura Electronica</label>
					</div>
					<div class="offset col-md-4">
						<label><input type="checkbox" name="factura_exenta" id="factura_exenta" /> Factura Exenta Electronica</label>
					</div>
					<div class="offset col-md-12 text-center">
						<input type="submit" class="btn btn-primary btn-lg" value="Enviar">
					</div>

				</div>

				<div class="col-xs-6">
		  			<!--button type="button" class="btn btn-success btn-lg" id="cargar-info">Cargar Info</button-->
		  			<hr width="80%">
		  			<div id="info-load"></div>
	  			</div>

	  		</section>
		</form>

	</main>
    <script src="media/js/jquery-3.1.1.min.js"></script>
    <script src="media/js/bootstrap.min.js"></script>
    <script src="media/js/ninjaRut.min.js"></script>
    <script src="media/js/main.js"></script>
  </body>
</html>