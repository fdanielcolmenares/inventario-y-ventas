<?PHP

	include("../scriptPHP/conex.php");		
	
	$bd=Conectarse();
	$sql="SELECT * from articulo where codigo_articulo='".$_POST["id"]."'"; 
	$res=mysql_query($sql);	
	$data=mysql_fetch_assoc($res);
	$sql1="SELECT imagen from articulo_imagen where codigo_articulo='".$data["codigo_articulo"]."' and tamano=1"; 
	$res1=mysql_query($sql1);	
	$data1=mysql_fetch_assoc($res1);
	if($data1["imagen"]=="")$foto="../img/image.gif";
	else $foto="../inventario/fotos/".$data1["imagen"];	
	$sql2="SELECT nombre, apellido from usuario where codigo_usario='".$data["codigo_usuario"]."'"; 
	$res2=mysql_query($sql2);	
	$data2=mysql_fetch_assoc($res2);
?>

<form class="form-horizontal" action="modificar.php" method="post" id="regVend" name="regVend" enctype="multipart/form-data">
    <fieldset>
    
    <!-- Form Name -->
    <legend>Modificar producto</legend>
    
    <div class="control-group">
        <div class="fileupload fileupload-new span3" data-provides="fileupload" align="center">
            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?PHP echo $foto; ?>" /></div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
              <span class="btn btn-file btn-primary">
                <span class="fileupload-new">Seleccionar imagen</span>
                <span class="fileupload-exists">Cambiar</span><input type="file" name="imgA" id="imgA" Accept="image/*"/>
              </span>
              <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Quitar</a>
            </div>
        </div>
    </div>
    
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="nombre">Codigo:</label>
      <div class="controls">
        <input id="codigo" name="codigo" type="text" value="<?PHP echo $data["codigo_articulo"]; ?>" class="input-large" readonly>  
        <div id="InfoC"></div>              
      </div>
    </div>
    
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="apellido">Descripci&oacute;n:</label>
      <div class="controls">
        <input id="desc" name="desc" type="text" value="<?PHP echo $data["descripcion"]; ?>" class="input-large" required>                
      </div>
    </div>
    
    <!-- Multiple Radios (inline) -->
    <div class="control-group">
      <label class="control-label" for="estado">Estado:</label>
      <div class="controls">
        <label class="radio inline" for="estado-0">
          <?PHP if($data["estado"]=="ACTIVO"){ ?>
          <input type="radio" name="estado" id="estado-0" value="ACTIVO" checked="checked">
          <?PHP }else{ ?>
          <input type="radio" name="estado" id="estado-0" value="ACTIVO">
          <?PHP } ?>
          Activo
        </label>
        <label class="radio inline" for="estado-1">
          <?PHP if($data["estado"]=="INACTIVO"){ ?>
          <input type="radio" name="estado" id="estado-1" value="INACTIVO" checked="checked">
          <?PHP }else{ ?>
          <input type="radio" name="estado" id="estado-1" value="INACTIVO">
          <?PHP } ?>
          Inactivo
        </label>
      </div>
    </div>
    
    <!-- Button -->
    <div class="control-group">
      <label class="control-label" for="guardar"></label>
      <div class="controls">
        <button type="submit" id="guardar" name="guardar" class="btn btn-primary">Guardar</button>
      </div>
    </div>
    
    </fieldset>
</form>