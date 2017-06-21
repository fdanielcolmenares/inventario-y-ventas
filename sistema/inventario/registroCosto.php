<?PHP
	session_start();
	include("../scriptPHP/conex.php");
	
	$bd=Conectarse();
	
	$sql="insert into articulo_costo (costo, fecha, codigo_articulo)
	 values (".$_POST["Costo"].",'".date("Y-m-d")."','".$_POST["codigo"]."')";
	$res=mysql_query($sql,$bd);
	
	if($res){
		echo'
			 <script type="text/javascript">
  				window.location="consultarArticulo.php?E=2";
			 </script>
		';	
	}
	else{
		echo'
			 <script type="text/javascript">
  				window.location="consultarArticulo.php?E=3";
			 </script>
		';	
	}
	
?>