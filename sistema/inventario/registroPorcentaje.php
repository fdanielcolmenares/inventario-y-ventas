<?PHP
	session_start();
	include("../scriptPHP/conex.php");
	
	$bd=Conectarse();
	
	$sql="insert into articulo_porcentaje (porcentaje, codigo_articulo)
	 values (".$_POST["Porcentaje"].",'".$_POST["codigo"]."')";
	$res=mysql_query($sql,$bd);
	
	if($res){
		echo'
			 <script type="text/javascript">
  				window.location="consultarArticulo.php?E=4";
			 </script>
		';	
	}
	else{
		echo'
			 <script type="text/javascript">
  				window.location="consultarArticulo.php?E=5";
			 </script>
		';	
	}
	
?>