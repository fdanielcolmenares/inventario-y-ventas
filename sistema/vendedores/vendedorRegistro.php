<?php 
	session_start(); 
	include("../scriptPHP/funciones.php");
	isConnect("../");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Registro de Vendedor</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="../less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="../less/responsive.less" type="text/css" /-->
	<!--script src="../js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-fileupload.css"> 

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="../img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="../img/favicon.png">
  
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/scripts.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.js"></script>
    <script type="text/javascript" src="../js/bootstrap-fileupload.js"></script>
</head>

<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
        
			<div class="navbar navbar-inverse navbar-fixed-top">
              <div class="navbar-inner">
              	<div class="container">
                    <a class="brand" href="../inicio.php">SC&amp;V</a>                   
                    <ul class="nav">
                      <li><a href="#"><span class="label label-info"><?php echo $_SESSION["nombre"]; ?></span></a></li>
                      <li><a href="../usuario/usuarioRegistro.php"><i class="icon-user icon-white"></i> Usuarios</a></li>
                      <li class="active"><a href="../vendedores/vendedorRegistro.php"><i class="icon-barcode icon-white"></i> Vendedores</a></li>
                      <li><a href="../inventario/inventario.php"><i class="icon-inbox icon-white"></i> Inventario</a></li>
                      <li><a href="../reportes/reporte.php"><i class="icon-file icon-white"></i> Reportes</a></li> 
                      <li><a href="../cierre/cierre.php"><i class="icon-briefcase icon-white"></i> Cierre</a></li>
                      <li><a href="../scriptPHP/session.php?I=S"><i class="icon-share icon-white"></i> Salir</a></li>
                    </ul>
                </div>
              </div>
            </div>
            
		</div>       
	</div><!--fin de barra-->
    
    <br><br><br>
	
    <div class="row-fluid">
		<div class="span3">
			<ul class="nav nav-pills nav-stacked">
				<li class="active">
					<a href="vendedorRegistro.php">Registro de vendedor</a>
				</li>
				<li>
					<a href="modificaVendedor.php">Modificar vendedor</a>
				</li>
				<li> <!--class="disabled"-->
					<a href="consultaVendedor.php">Consultar vendedor</a>
				</li>	
                <li> 
					<a href="mercancia.php">Asignar mercancia</a>
				</li>	
                <li> 
					<a href="ventaMercancia.php">Venta mercancia</a>
				</li>
                <li> 
					<a href="devolMercancia.php">Devoluci&oacute;n mercancia</a>
				</li>
                <li> 
					<a href="../inicio.php">Regresar a inicio</a>
				</li>		
			</ul>
		</div>
        
		<div class="span1">
		</div>
        
		<div class="span8">
        	<?PHP 
			if(isset($_GET['E']) && $_GET['E'] == '1'){
				echo'
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Vendedor registrado exitosamente</strong> 
				</div>';
			}
			if(isset($_GET['E']) && $_GET['E'] == '0'){
				echo'
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Vendedor no registrado exitosamente</strong>
				</div>';
			}
			?>
			<form class="form-horizontal" action="registro.php" method="post" id="regVend" name="regVend" enctype="multipart/form-data">
            <fieldset>
            
            <!-- Form Name -->
            <legend>Registro de Vendedor</legend>
            
            <div class="control-group">
                <div class="fileupload fileupload-new span3" data-provides="fileupload" align="center">
                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="../img/image.gif" /></div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                      <span class="btn btn-file btn-primary">
                      	<span class="fileupload-new">Seleccionar imagen</span>
                        <span class="fileupload-exists">Cambiar</span><input type="file" name="imgV" id="imgV" Accept="image/*"/>
                      </span>
                      <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Quitar</a>
                    </div>
                </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="nombre">Nombre:</label>
              <div class="controls">
                <input id="nombre" name="nombre" type="text" placeholder="nombre" class="input-large" required>
                
              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="apellido">Apellido:</label>
              <div class="controls">
                <input id="apellido" name="apellido" type="text" placeholder="apellido" class="input-large" required>                
              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="apellido">Correo:</label>
              <div class="controls">
                <input id="correo" name="correo" type="text" placeholder="alguien@gmail.com" class="input-large email" required>                 
                <div id="InfoC"></div>              
              </div>
            </div>
            
            <!-- Multiple Radios (inline) -->
            <div class="control-group">
              <label class="control-label" for="estado">Estado:</label>
              <div class="controls">
                <label class="radio inline" for="estado-0">
                  <input type="radio" name="estado" id="estado-0" value="ACTIVO" checked="checked">
                  Activo
                </label>
                <label class="radio inline" for="estado-1">
                  <input type="radio" name="estado" id="estado-1" value="INACTIVO">
                  Inactivo
                </label>
              </div>
            </div>
            
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="guardar"></label>
              <div class="controls">
                <button type="submit" id="guardar" name="guardar" class="btn btn-primary">Guardar</button>
              </div>
            </div>
            
            </fieldset>
            </form>
		</div><!-- fin del span8 formulario -->
	</div><!--fin de layout-->
    
</div>
</body>
</html>
<script>
	$("form").submit(function() {
		if($('#InfoC').html()=="OK")
			return true;
		return false;	
	});
	
	$(document).ready(function(){
		$('#correo').blur(function(){ 
			if($(this).valid()){
				$('#InfoC').html('<img src="../img/loader.gif" alt="" />').fadeOut(1000);
	
				var mail = $(this).val();        
				var dataString = 'mail='+mail;
	
				$.ajax({
					type: "POST",
					url: "verificarCorreo.php",
					data: dataString,
					success: function(data) {
						$('#InfoC').fadeIn(1000).html(data);
					}
				});
			}
        })
	});
	
</script>