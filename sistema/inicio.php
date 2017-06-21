<?php 
	session_start(); 
	include("scriptPHP/funciones.php");
	isConnect("");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Inicio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <script>
		$(document).ready(function(){
			$("a").popover()
		});
	</script>
</head>

<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
        
			<div class="navbar navbar-inverse navbar-fixed-top">
              <div class="navbar-inner">
              	<div class="container">
                    <a class="brand" href="#">SC&amp;V</a>                   
                    <ul class="nav">
                      <li class="active"><a href="#"><span class="label label-info"><?php echo $_SESSION["nombre"]; ?></span></a></li>
                      <li><a href="usuario/usuarioRegistro.php"><i class="icon-user icon-white"></i> Usuarios</a></li>
                      <li><a href="vendedores/vendedorRegistro.php"><i class="icon-barcode icon-white"></i> Vendedores</a></li>
                      <li><a href="inventario/inventario.php"><i class="icon-inbox icon-white"></i> Inventario</a></li>
                      <li><a href="reportes/reporte.php"><i class="icon-file icon-white"></i> Reportes</a></li> 
                      <li><a href="cierre/cierre.php"><i class="icon-briefcase icon-white"></i> Cierre</a></li>
                      <li><a href="scriptPHP/session.php?I=S"><i class="icon-share icon-white"></i> Salir</a></li> 
                    </ul>
                </div>
              </div>
            </div>
            
		</div>
 <!--<a href="#" data-toggle="tooltip" data-placement="bottom" data-original-title="first tooltip">-->       
	</div>
    <br><br><br>
	<div class="row-fluid">
	  <div class="span12">
       	<div class="container">
			<div class="row-fluid">
				<div class="span4">
				</div>
                <div class="well span4">
                	<div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span4">
                        	<a href="usuario/usuarioRegistro.php" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Ingresa para gestionar usuarios" data-original-title="Usuarios">
                            <img alt="140x140" width="140" height="140" src="img/usuarios.png" />
                            </a>
                        </div>
                        <div class="span4">
                            <a href="vendedores/vendedorRegistro.php" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Ingresa para gestionar vendedores" data-original-title="Vendedores">
                            <img alt="140x140" width="140" height="140" src="img/vendedor.png" />
                            </a>
                        </div>
                        <div class="span4">
                            <a href="inventario/inventario.php" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Ingresa para gestionar inventario" data-original-title="Inventario">
                            <img alt="140x140" width="140" height="140" src="img/inventarios.png" />
                            </a>
                        </div>
                    </div>
                    </div>
                    <br>
                  <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span4">
                            <a href="reportes/reporte.php" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Ingresa para visualizar reportes" data-original-title="Reportes">
                            <img alt="140x140" width="140" height="140" src="img/reportes.jpg" />
                            </a>
                        </div>
                        <div class="span4">
                            <a href="cierre/cierre.php" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Ingresa para procesar el cierre de ventas" data-original-title="Cierre">
                            <img alt="140x140" width="140" height="140" src="img/cierre.png" />
                            </a>
                        </div>
                        <div class="span4">
                            <a href="scriptPHP/session.php?I=S" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="Finaliza la sesi&oacute;n" data-original-title="Salir">
                            <img alt="140x140" width="140" height="140" src="img/salir.png" />
                            </a>
                        </div>
                    </div>  
                  </div>             
              </div><!--Fin de well-->
				<div class="span4">
				</div>
			</div>
            </div>
		</div>
	</div>
</div>
</body>
</html>
