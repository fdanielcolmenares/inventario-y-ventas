<?PHP
	session_start();
	include("../scriptPHP/conex.php");
	
	$bd=Conectarse();
	
	$sql="SELECT codigo_articulo, cantidad from articulo_cantidad where codigo_articulo='".$_POST["idA"]."'"; 
	$res1=mysql_query($sql);
	$data=mysql_fetch_assoc($res1);
	
	if($data["cantidad"] >= $_POST["cant"]){	
		$sql="insert into articulo_vendedor (cantidad, fecha_entrega, codigo_articulo, codigo_vendedor)
			 values (".$_POST["cant"].",'".date("Y-m-d")."','".$_POST["idA"]."',".$_POST["idV"].")";
		$res=mysql_query($sql,$bd);
		
		$cantN=$data["cantidad"]-$_POST["cant"];
		$sql2="update articulo_cantidad set cantidad=".$cantN." where codigo_articulo='".$_POST["idA"]."'";
		$res2=mysql_query($sql2);
		
		$retorno = '<legend>Articulo seleccionado</legend>	
	<table class="table table-striped" id="tablaAsignacion">
			  <thead>
				<tr>
				  <th>Codigo</th>
				  <th>Cantidad</th>
				  <th>Opciones</th>
				</tr>
			  </thead>
			  <tbody>
			  ';	
	}// fin if existe inventario
	else{
		$retorno = '<legend>Articulo seleccionado</legend>
		<div class="alert1 alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Exedio inventario de '.$_POST["idA"].'</strong>
				</div>	
		<table class="table table-striped" id="tablaAsignacion">
				  <thead>
					<tr>
					  <th>Codigo</th>
					  <th>Cantidad</th>
					  <th>Opciones</th>
					</tr>
				  </thead>
				  <tbody>
				  ';
	}
	$sql="SELECT * from articulo_vendedor where fecha_entrega='".date("Y-m-d")."'"; 
	$res1=mysql_query($sql);	
	
	while($data=mysql_fetch_assoc($res1)){
		$retorno=$retorno."<tr><th>".$data["codigo_articulo"]."</th> <th>".$data["cantidad"]."</th> <th> 
		<a href=javascript:eliminarA('".$data["codigo_articulo_vendedor"]."','".$data["cantidad"]."','".$data["codigo_articulo"]."') data-toggle='tooltip' title='eliminar articulo'><i class='icon-remove-sign'></i></a> </th> </tr>";
	}
	
	$retorno=$retorno."</tbody> </table>";
	//else{$retorno='-1';}
	
	echo $retorno;
	
	echo'<script>
		$(document).ready(function(){
			$("a").tooltip();
		});
	</script>';
	
?>