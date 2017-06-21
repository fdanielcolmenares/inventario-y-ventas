<?PHP
	session_start();
	include("../scriptPHP/conex.php");
	
	$bd=Conectarse();
	
	$sql="DELETE from articulo_vendedor where codigo_articulo_vendedor=".$_POST["idA"]."";
	$res=mysql_query($sql);
	
	$sql="SELECT codigo_articulo, cantidad from articulo_cantidad where codigo_articulo='".$_POST["cod"]."'"; 
	$res1=mysql_query($sql);
	$data=mysql_fetch_assoc($res1);
	
	$cantN=$data["cantidad"]+$_POST["cant"];
	$sql2="update articulo_cantidad set cantidad=".$cantN." where codigo_articulo='".$_POST["cod"]."'";
	$res2=mysql_query($sql2);
	
	$sql="SELECT * from articulo_vendedor where fecha_entrega='".date("Y-m-d")."'"; 
	$res1=mysql_query($sql);	
	
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
	
	while($data=mysql_fetch_assoc($res1)){
		$retorno=$retorno."<tr><th>".$data["codigo_articulo"]."</th> <th>".$data["cantidad"]."</th> <th> 
		<a href=javascript:eliminarA('".$data["codigo_articulo_vendedor"]."','".$data["cantidad"]."','".$data["codigo_articulo"]."') data-toggle='tooltip' title='eliminar articulo'><i class='icon-remove-sign'></i></a> </th> </tr>";
	}
	
	$retorno=$retorno."</tbody> </table>";
	
	echo $retorno;
	
	echo'<script>
		$(document).ready(function(){
			$("a").tooltip();
		});
	</script>';
	
?>