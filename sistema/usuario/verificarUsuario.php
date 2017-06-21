<?PHP
	include("../scriptPHP/conex.php");
	
	$bd=Conectarse();
	
	$sql="SELECT usuario from usuario where usuario='".$_POST['usuario']."'"; 
	$res=mysql_query($sql);	
	$data=mysql_fetch_assoc($res);
	
	if(!$data){
		echo 'OK';
	}
	else{
		echo 'No disponible';	
	}
?>