<?php 
	session_start(); 
	include("../scriptPHP/funciones.php");
	isConnect("../");	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Consulta de Vendedor</title>
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
				<li>
					<a href="modificaVendedor.php">Modificar vendedor</a>
				</li>
				<li> <!--class="disabled"-->
					<a href="consultaVendedor.php">Consultar vendedor</a>
				</li>	
                <li> 
					<a href="mercancia.php">Asignar mercancia</a>
				</li>	
                <li class="active"> 
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
            <div class="alert alert-error hide">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Vendedor no registrado</strong>
            </div>
            <div id="consulta">
            	<form class="form-horizontal" action="#" method="post" id="consUser" name="consUser">
                	<!-- Text input-->
                    <div class="control-group">
                      <label class="control-label" for="usuario">Nombre del vendedor:</label>
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
            
            <div id="articulos">
    		</div> 
            
    		<div id="articuloS">
    		</div> 

    		<input type="hidden" id="idA" name="idA" value="" />
    		<input type="hidden" id="idAV" name="idAV" value="" />
 
			<!-- Modal -->
			<div id="Cliente" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    <h3 id="myModalLabel">Nombre del Cliente</h3>
			  </div>
			  <div class="modal-body">
			    <p><input id='cli' name='cli' type='text' placeholder='Teresa Ayala' class='input-large' required ></p>
			    <p>Cantidad: <div id="cant"></div></p>
			  </div>
			  <div class="modal-footer">
			    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
			    <button class="btn btn-primary" onclick="guardarVenta()">Guardar Compra</button>
			  </div>
			</div>
    
		</div><!-- fin del span8 formulario -->
	</div><!--fin de layout-->
    
</div>
</body>
</html>
<script>
	
	function consultarVendedores(){
		$(".alert").hide();
		$('#vendedor').hide();	
		$('#vendedores').html("");
		if($('#nomB').valid()){
		var nombre = $('#nomB').val();        
		var dataString = 'nombre='+nombre;

		$.ajax({
			type: "POST",
			url: "consVendedoresA.php",
			data: dataString,
			success: function(data1) {			
				if(data1=="-1"){ $(".alert1").show();}
				else{
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
			url: "consVendedorA.php",
			data: dataString,
			success: function(data1) {				
				$('#vendedor').show();	
				$('#vendedor').fadeIn(1000).html(data1);
			}
		});	
	}
	
	function consultarArticulo(){
		$('#articulo').hide();	
		$('#articulos').html("");
		if($('#articuloB').valid()){
		var articulo = $('#articuloB').val(); 
		var idV = $('#idV').val();       
		var dataString = 'articulo='+articulo;

		$.ajax({
			type: "POST",
			url: "venderArticulo.php?id="+idV,
			data: dataString,
			success: function(data1) {			
				if(data1=="-1"){ $(".alert").show();}
				else{
					$('#articulos').fadeIn(1000).html(data1);
				}
			}
		});	
		}
	}

	function VenderA(idA,cantidad, idV, idAV){		
		$('#idA').val(idA); //alert(cantidad);
		$('#idAV').val(idAV);
		$('#cant').html(cantidad);
		$('#Cliente').modal('show');
	}
	
	function guardarVenta(){
		/*$('#articulo').hide();	
		$('#articulos').html("");
		if($('#articuloB').valid()){
		var articulo = $('#articuloB').val(); 
		var idV = $('#idV').val();       
		var dataString = 'articulo='+articulo;*/

		var idV = $('#idV').val(); 
		var idAV = $('#idAV').val();
		var cant =$('#cant').html(); 
		var nom =$('#cli').val();  

		var dataString = 'articulo='+$('#idA').val();
		$('#Cliente').modal('hide');

		$.ajax({
			type: "POST",
			url: "venderArticulo.php?id="+idV+'&idAV='+idAV+'&c='+cant+'&op=1'+'&nom='+nom,
			data: dataString,
			success: function(data1) {			
				if(data1=="-1"){ $(".alert").show();}
				else{
					$('#articulos').fadeIn(1000).html(data1);
				}
			}
		});
	}

	/*function asignarA(idA,cantidad){
		$('#articulo').hide();	
		$('#articulos').html("");
		var idV = $('#idV').val();       
		//alert(idA+" "+cantidad);
		var tabla=0; //no hace nada
		/*if ($('#tablaAsignacion').length){
			tabla=1;
		}*/
		/*$.post(
			"guardarArtAsig.php",
			{idV: idV, idA: idA, cant: cantidad, tabla: tabla},
			function(data1) {			
				if(data1=="-1"){ $(".alert").show();}
				else{
					$('#articuloS').fadeIn(1000).html(data1);
				}
			}
		);	
	}
	
	function eliminarA(idA, cant, cod){
		$('#articulo').hide();	
		$('#articulos').html("");   
		$.post(
			"eliminarArtAsig.php",
			{idA: idA, cant:cant, cod:cod},
			function(data1) {			
				if(data1=="-1"){ $(".alert").show();}
				else{
					$('#articuloS').fadeIn(1000).html(data1);
				}
			}
		);	
	}*/
	
</script>