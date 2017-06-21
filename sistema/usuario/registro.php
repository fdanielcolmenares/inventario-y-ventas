<?PHP

	include("../scriptPHP/conex.php");
	
	$bd=Conectarse();
	
	$sql="insert into usuario (nombre, apellido, password, usuario, estado)
	 values ('".$_POST["nombre"]."','".$_POST["apellido"]."','".$_POST["pass"]."','".$_POST["usuario"]."','".$_POST["estado"]."')";
	$res=mysql_query($sql,$bd);
	
	if($res){
		echo'
			 <script type="text/javascript">
  				window.location="usuarioRegistro.php?E=1";
			 </script>
		';	
	}
	else{
		echo'
			 <script type="text/javascript">
  				window.location="usuarioRegistro.php?E=0";
			 </script>
		';	
	}

?>