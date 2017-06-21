<?PHP
	
	include("../scriptPHP/conex.php");		
	$ban = 0;
	$bd=Conectarse();

	if(isset($_GET["op"])){
		if($_GET["op"]==1){
			$sql="select cantidad from articulo_vendedor where codigo_articulo='".$_POST["articulo"]."'";
			$res=mysql_query($sql);
			$data=mysql_fetch_assoc($res);
			$cant=$data["cantidad"];
			$resta=$cant-$_GET["c"];
			$sql="update articulo_vendedor set cantidad=".$resta." where codigo_articulo_vendedor='".$_GET["idAV"]."'";
			$res=mysql_query($sql);
			$sql="insert into cliente (nombre) values ('".$_GET["nom"]."')";
			$res=mysql_query($sql,$bd);
			$sql="select idCliente from cliente order by idCliente DESC limit 1";
			$res=mysql_query($sql);
			$data=mysql_fetch_assoc($res);
			$idCliente=$data["idCliente"];
			$sql="insert into articulo_vendido (fecha, estado, cantidad, codigo_vendedor, idCliente) values ('".date("Y-m-d")."','ACTIVO',".$_GET["c"].",".$_GET["id"].",".$idCliente.")";
			$res=mysql_query($sql,$bd);
			//echo $sql;
		}
	}

	$sql="SELECT * from articulo where codigo_articulo LIKE '%".$_POST["articulo"]."%' OR descripcion LIKE '%".$_POST["articulo"]."%'"; 
	//echo $sql;
	$res=mysql_query($sql);	
	$retorno = '<table class="table table-striped">
              <thead>
                <tr>
				  <th>Imagen</th>
                  <th>Codigo</th>
                  <th>Descripci&oacute;n</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>';
	while($data=mysql_fetch_assoc($res)){ 
		$sql2="SELECT codigo_articulo_vendedor, cantidad from articulo_vendedor where codigo_articulo='".$data["codigo_articulo"]."' and codigo_vendedor=".$_GET["id"]."";
		$res2=mysql_query($sql2);	//echo $sql2;

		while($data2=mysql_fetch_assoc($res2)){
			if($data2["cantidad"]>0){
				$sql1="SELECT imagen from articulo_imagen where codigo_articulo='".$data["codigo_articulo"]."' and tamano=1"; 
				$res1=mysql_query($sql1);	
				$data1=mysql_fetch_assoc($res1);
				if($data1["imagen"]=="")$foto="../img/image.gif";
				else $foto="../inventario/fotos/".$data1["imagen"];					  
				$retorno=$retorno."<tr> <th> <img src='".$foto."' class='img-polaroid' style='width: 70px; height: 70px;'> </th> <th>".$data["codigo_articulo"]."</th> <th>".$data["descripcion"]."</th> <th> <input id='cantidad' name='cantidad' type='text' placeholder='3' class='input-small number' value='".$data2["cantidad"]."' required >
				<a href=javascript:VenderA('".$data['codigo_articulo']."',$('#cantidad').val(),'".$_GET["id"]."','".$data2['codigo_articulo_vendedor']."') data-toggle='tooltip' title='vender articulo'><i class='icon-ok-circle'></i></a> </th> </tr>";
				$ban = 1;   
			}
		}
	}
	$retorno=$retorno."</tbody> </table>";
	
	if($ban == 0){
		echo'
			 <div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Articulo no encontrado</strong>
			</div>
		';	
	}
	else{echo $retorno;}
	
	echo'<script>
		$(document).ready(function(){
			$("a").tooltip();
		});
	</script>';

?>