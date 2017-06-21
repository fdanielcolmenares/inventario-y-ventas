<?php 
	session_start(); 
	include("../scriptPHP/funciones.php");
	isConnect("../");
	
	include("../scriptPHP/conex.php");
	
	$bd=Conectarse();
	$alert=-1;
		
	if(isset($_POST["consulta"])){
		$sql="SELECT * from usuario where usuario='".$_POST["usuario"]."'"; 
		$res=mysql_query($sql);	
		$data=mysql_fetch_assoc($res);
		if(!$data){$alert=1;}
	}
	if(isset($_POST["guardar"])){ echo "hola ".$_POST["nombre"];
		$sql="SELECT codigo_usario from usuario where usuario='".$_POST["usuario"]."'"; 
		$res=mysql_query($sql);	
		$data=mysql_fetch_assoc($res);
		$idUsuario=$data["codigo_usario"];
		
		$sql="update usuario set nombre='".$_POST["nombre"]."', apellido='".$_POST["apellido"]."', password='".$_POST["pass"]."', estado='".$_POST["estado"]."' where codigo_usario=".$idUsuario."";
		$res=mysql_query($sql);
		if($res){
			$alert=2;
		}
		else{
			$alert=0;	
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Consulta de Usuario</title>
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
    <script>
		/*$("form").submit(function() {
			alert("hola");
			return false;	
		});*/
		/*
		$(document).ready(function(){
			//$("a").popover()
		});
		*/
	</script>
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
                      <li class="active"><a href="../usuario/usuarioRegistro.php"><i class="icon-user icon-white"></i> Usuarios</a></li>
                      <li><a href="../vendedores/vendedorRegistro.php"><i class="icon-barcode icon-white"></i> Vendedores</a></li>
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
					<a href="usuarioRegistro.php">Registro de usuario</a>
				</li>
				<li class="active">
					<a href="modificaUsuario.php">Modificar usuario</a>
				</li>
				<li> <!--class="disabled"-->
					<a href="consultaUsuario.php">Consultar usuario</a>
				</li>	
                <li> <!--class="disabled"-->
					<a href="../inicio.php">Regresar a inicio</a>
				</li>			
			</ul>
		</div>
        
		<div class="span1">
		</div>
        
		<div class="span8">
        	
            <?PHP 
			if($alert == 1){
				echo'
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Usuario no encontrado</strong>
				</div>';
			}
			if($alert == 2){
				echo'
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Usuario modificado exitosamente</strong> 
				</div>';
			}
			if($alert == 0){
				echo'
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Usuario no modificado exitosamente</strong>
				</div>';
			}
			?>
            
			<form class="form-horizontal" action="modificaUsuario.php" method="post" id="consUser" name="consUser">
            <fieldset>
            
            <!-- Form Name -->
            <legend>Consulta de usuario</legend>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="usuario">Usuario:</label>
              <div class="controls">
                <input id="usuario" name="usuario" type="text" placeholder="usuario" class="input-large" required value="<?PHP if($data) {echo $data["usuario"];} ?>">
                <button type="submit" id="consulta" name="consulta" class="btn btn-primary">Consultar</button>
                <p class="help-block">El nombre de usuario no puede ser modificado</p>
              </div>
            </div>
            </fieldset>
            </form>
            
            <form class="form-horizontal" action="modificaUsuario.php" method="post" id="modUsuario" name="modUsuario">
            <fieldset>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="nombre">Nombre:</label>
              <div class="controls">
                <input id="nombre" name="nombre" type="text" placeholder="nombre" class="input-large" value="<?PHP if($data){ echo $data["nombre"];} ?>" required="">
                
              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="apellido">Apellido:</label>
              <div class="controls">
                <input id="apellido" name="apellido" type="text" placeholder="apellido" class="input-large" value="<?PHP if($data){ echo $data["apellido"];} ?>" required="">
                
              </div>
            </div> 
            
             <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="pass">Contraseña:</label>
              <div class="controls">
                <input id="pass" name="pass" type="password" placeholder="" class="input-medium" required="" value="<?PHP if($data){ echo $data["password"];} ?>">
                
              </div>
            </div>
            
            <!-- Multiple Radios (inline) -->
            <div class="control-group">
              <label class="control-label" for="estado">Estado:</label>
              <div class="controls">
                <label class="radio inline" for="estado-0">
                  <?PHP if($data["estado"]=="ACTIVO"){ ?>
                  <input type="radio" name="estado" id="estado-0" value="ACTIVO" checked="checked">
                  <?PHP }else{ ?>
                  <input type="radio" name="estado" id="estado-0" value="ACTIVO">
                  <?PHP } ?>
                  Activo
                </label>
                <label class="radio inline" for="estado-1">
                  <?PHP if($data["estado"]=="INACTIVO"){ ?>
                  <input type="radio" name="estado" id="estado-1" value="INACTIVO" checked="checked">
                  <?PHP }else{ ?>
                  <input type="radio" name="estado" id="estado-1" value="INACTIVO">
                  <?PHP } ?>
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
	
</script>