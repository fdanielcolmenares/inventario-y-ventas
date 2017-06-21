<?PHP
	include("../scriptPHP/conex.php");
	
	$bd=Conectarse();
	
	$sql="SELECT codigo_articulo from articulo where codigo_articulo='".$_POST['codigo']."'"; 
	$res=mysql_query($sql);	
	$data=mysql_fetch_assoc($res);
	
	if(!$data){
		echo 'OK';
	}
	else{
		echo 'Correo ya registrado';	
	}
?>