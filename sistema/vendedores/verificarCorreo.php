<?PHP
	include("../scriptPHP/conex.php");
	
	$bd=Conectarse();
	
	$sql="SELECT correo from vendedor where correo='".$_POST['mail']."'"; 
	$res=mysql_query($sql);	
	$data=mysql_fetch_assoc($res);
	
	if(!$data){
		echo 'OK';
	}
	else{
		echo 'Correo ya registrado';	
	}
?>