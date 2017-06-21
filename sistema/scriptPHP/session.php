<?PHP
session_start();

include("conex.php");


if($_GET['I']=='E'){
	$bd=Conectarse();
	$sql="SELECT codigo_usario, nombre, apellido from usuario where usuario='".$_POST['usuario']."' and password='".$_POST["pass"]."' and estado='ACTIVO'"; 
	$res=mysql_query($sql);	
	$data=mysql_fetch_assoc($res);	
	if(!$data){
		echo'
			 <script type="text/javascript">
  				window.location="../index.php?E=1";
			 </script>
		';	
	}
	else{				
		$_SESSION["idUsuario"]=$data["codigo_usario"];	
		$_SESSION["nombre"]=$data["nombre"]." ".$data["apellido"];
		echo'
			 <script type="text/javascript">
  				window.location="../inicio.php";
			 </script>
		';	
	}
}

if($_GET['I']=='S'){
	session_destroy();	
	echo'
		 <script type="text/javascript">
			window.location="../index.php";
		 </script>
	';	
}

?>