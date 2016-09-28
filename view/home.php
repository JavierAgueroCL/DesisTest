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
    	<h1>Titulo</h1>
	</header>
	<main>
		<form method="post" id="formulario" action="index.php"> 
			<div class="alert"></div>
			<div class="row">
				<div class="offset col-md-3 vcenter">.col-md-4</div>
				<div class="offset col-md-9">
					<input class="form-control input-lg" id="rut" required="" type="text" maxlength="10" placeholder="11111111-1" title="Ingrese un rut Valido" />
				</div>
				<div class="offset col-md-3 vcenter">.col-md-4</div>
				<div class="offset col-md-4">
					<select class="form-control input-lg" id="ciudad" required>
						<option value="">-- Seleccione ---</option>
						<option value="1">Santiago</option>
						<option value="2">Metropolitana</option>
					</select>
				</div>
				<div class="offset col-md-5">
					<select class="form-control input-lg" id="resultado">
						<option value="">-- Seleccione ---</option>
					</select>
				</div>
				<div class="offset col-md-3 vcenter">.col-md-4</div>
				<div class="offset col-md-9"><textarea class="form-control" rows="3"></textarea></div>
				<div class="offset col-md-12 text-center">
					<input type="submit" class="btn btn-primary btn-lg" value="Enviar">
				</div>
	  		</div>
		</form>
	</main>
    <script src="media/js/jquery-3.1.1.min.js"></script>
    <script src="media/js/bootstrap.min.js"></script>
    <script src="media/js/ninjaRut.min.js"></script>
    <script src="media/js/main.js"></script>
  </body>
</html>