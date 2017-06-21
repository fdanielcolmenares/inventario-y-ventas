<?PHP
	session_start();
	include("../scriptPHP/conex.php");
	
	$bd=Conectarse();
	
	$sql="SELECT codigo_articulo_cantidad, codigo_articulo, cantidad from articulo_cantidad where codigo_articulo='".$_POST["codigo"]."'"; 	
	$res=mysql_query($sql);
	if(!$data=mysql_fetch_assoc($res)){	
		$sql="insert into articulo_cantidad (cantidad, fecha, codigo_articulo, codigo_usuario)
		 values (".$_POST["cantidad"].",'".date("Y-m-d")."','".$_POST["codigo"]."',".$_SESSION["idUsuario"].")";
		$res=mysql_query($sql,$bd);		
	}// fin si no hay data
	else{
		$cantidad=$data["cantidad"]+$_POST["cantidad"];
		$sql="update articulo_cantidad set cantidad=".$cantidad.", fecha='".date("Y-m-d")."', codigo_usuario=".$_SESSION["idUsuario"]." where codigo_articulo_cantidad='".$data["codigo_articulo_cantidad"]."'";
		$res=mysql_query($sql);	
	}
	if($res){
		echo'
			 <script type="text/javascript">
				window.location="consultarArticulo.php?E=6";
			 </script>
		';	
	}
	else{
		echo'
			 <script type="text/javascript">
				window.location="consultarArticulo.php?E=7";
			 </script>
		';	
	}	
?>