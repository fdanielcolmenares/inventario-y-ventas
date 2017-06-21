<?PHP
	
	include("../scriptPHP/conex.php");		
	$ban = 0;
	$bd=Conectarse();
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
		$sql1="SELECT imagen from articulo_imagen where codigo_articulo='".$data["codigo_articulo"]."' and tamano=1"; 
		$res1=mysql_query($sql1);	
		$data1=mysql_fetch_assoc($res1);
		if($data1["imagen"]=="")$foto="../img/image.gif";
		else $foto="../inventario/fotos/".$data1["imagen"];					  
		$retorno=$retorno."<tr> <th> <img src='".$foto."' class='img-polaroid' style='width: 70px; height: 70px;'> </th> <th>".$data["codigo_articulo"]."</th> <th>".$data["descripcion"]."</th> <th> <a href=javascript:consultarA('".$data['codigo_articulo']."') data-toggle='tooltip' title='Consultar articulo'><i class='icon-eye-open'></i></a>
		<a href=javascript:modificarA('".$data['codigo_articulo']."') data-toggle='tooltip' title='Modificar articulo''><i class='icon-edit'></i></a>
		<a href=javascript:costoA('".$data['codigo_articulo']."') data-toggle='tooltip' title='Agregar costo articulo'><i class='icon-shopping-cart'></i></a>
		<a href=javascript:porcentajeA('".$data['codigo_articulo']."') data-toggle='tooltip' title='Agregar porcentaje articulo'><i class='icon-briefcase'></i></a>
		<a href=javascript:cantidadA('".$data['codigo_articulo']."') data-toggle='tooltip' title='agregar cantidad articulo'><i class='icon-plus-sign'></i></a> </th> </tr>";
		$ban = 1;                
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