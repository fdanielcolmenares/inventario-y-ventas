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
				<li>
					<a href="vendedorRegistro.php">Registro de vendedor</a>
				</li>
				<li class="active">
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
					<strong>Vendedor modificado exitosamente</strong> 
				</div>';
			}
			if(isset($_GET['E']) && $_GET['E'] == '0'){
				echo'
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Vendedor no modificado exitosamente</strong>
				</div>';
			}
			?>
			<div id="consulta">
            	<form class="form-horizontal" action="consultaUsuario.php" method="post" id="consUser" name="consUser">
                	<!-- Text input-->
                    <div class="control-group">
                      <label class="control-label" for="usuario">Nombre:</label>
                      <div class="controls">
                        <input id="nomB" name="nomB" type="text" placeholder="nombre" class="input-large" required >
                        <button type="button" id="consulta" name="consulta" class="btn btn-primary" onClick="consultarVendedores()">Consultar</button>
                      </div>
                    </div>
                </form>
            </div>
            
            <div id="vendedores">
            </div>
            
			<div id="vendedor" style="display:none">
            
            </div>
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
	
	function consultarVendedores(){
		$(".alert").hide();
		$('#vendedor').hide();	
		$('#vendedores').html("");
		if($('#nomB').valid()){
		var nombre = $('#nomB').val();        
		var dataString = 'nombre='+nombre;

		$.ajax({
			type: "POST",
			url: "consVendedores.php",
			data: dataString,
			success: function(data1) {			
				if(data1=="-1"){ $(".alert").show();}
				else{
					//$('#consulta').hide();
					$('#vendedores').fadeIn(1000).html(data1);
				}
			}
		});	
		}
	}
	
	function cargaV(id){
		$(".alert").hide();
		$('#vendedores').hide();        
		var dataString = 'id='+id;

		$.ajax({
			type: "POST",
			url: "modVendedor.php",
			data: dataString,
			success: function(data1) {				
				$('#vendedor').show();	
				$('#vendedor').fadeIn(1000).html(data1);
			}
		});	
	}
	
</script>