<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Bootstrap, from LayoutIt!</title>
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
    
    <script type="text/javascript">
		$('#myModal').modal('show');
	</script>
</head>

<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
		</div>
	</div>
	<div class="row-fluid">
		<div class="span4">
			
		</div>
		<div class="span4">
			 
                         			
			<div id="inicioSession" class="modal" role="dialog" aria-labelledby="ModalInicio">
				<div class="modal-header">					 
					<h3 id="myModalLabel">
						Incio de sesi&oacute;n
					</h3>
				</div>
				<div class="modal-body">
					<p>
						<form class="form-horizontal" action="scriptPHP/session.php?I=E" method="post" id="Inicio" name="Inicio">
							<div class="control-group">
                                <label class="control-label" for="inputEmail">Usuario</label>
                                <div class="controls">
                                	<input type="text" id="usuario" name="usuario" placeholder="Usuario">
                                </div>
							</div>
                            <div class="control-group">
                            	<label class="control-label" for="inputPassword">Contraseña</label>
                                <div class="controls">
                                    <input type="password" id="pass" name="pass" placeholder="">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls"> 
                                     <button type="submit" class="btn btn-primary">Entrar</button>
                                </div>
                            </div>
                        </form>
					</p>
                    <?PHP 
					if(isset($_GET['E']) && $_GET['E'] == '1'){
						echo'
						<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Fall&oacute; inicio de sesion!</strong> Usuario o contrase&ntilde;a invalida.
						</div>';
					}
					if(isset($_GET['E']) && $_GET['E'] == '2'){
						echo'
						<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>sesi&oacute;n invalida</strong> debe iniciar sesion.
						</div>';
					}
					?>
				</div>
			</div> 
            <!--FIN DE MODAL -->
            
		</div>
		<div class="span4">
		</div>
	</div>
</div>
</body>
</html>

