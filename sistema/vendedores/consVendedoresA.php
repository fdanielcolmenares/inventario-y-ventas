<?PHP
	
	include("../scriptPHP/conex.php");		
	$ban = 0;
	$bd=Conectarse();
	$sql="SELECT * from vendedor where Nombre LIKE '%".$_POST["nombre"]."%' OR Apellido LIKE '%".$_POST["nombre"]."%'"; 
	//echo $sql;
	$res=mysql_query($sql);	
	$retorno = '<table class="table table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Seleccionar</th>
                </tr>
              </thead>
              <tbody>';
	while($data=mysql_fetch_assoc($res)){			  
		$retorno=$retorno."<tr> <th>".$data["Nombre"]."</th> <th>".$data["Apellido"]."</th> <th> <a href='javascript:cargaV(".$data['codigo_vendedor'].")'><i class='icon-ok'></i></a> </th> </tr>";
		$ban = 1;                
	}
	$retorno=$retorno."</tbody> </table>";
	
	if($ban == 0){echo "-1";}
	else{echo $retorno;}
?>