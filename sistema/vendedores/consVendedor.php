<?PHP

	include("../scriptPHP/conex.php");		
	
	$bd=Conectarse();
	$sql="SELECT * from vendedor where codigo_vendedor=".$_POST["id"].""; 
	$res=mysql_query($sql);	
	$data=mysql_fetch_assoc($res);
	if($data["foto"]=="")$foto="../img/image.gif";
	else $foto="../vendedores/fotos/".$data["foto"];
?>
    <fieldset>
                
    <!-- Form Name -->
    <legend>Consulta de Vendedor</legend>
    
    <div class="control-group">
        <img src="<?PHP echo $foto; ?>" class="img-polaroid">
    </div>
    
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="nombre">Nombre:</label>
      <div class="controls">
        <input id="nombre" name="nombre" type="text" placeholder="nombre" class="input-large" readonly value="<?PHP echo $data["Nombre"]; ?>">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="apellido">Apellido:</label>
      <div class="controls">
        <input id="apellido" name="apellido" type="text" placeholder="apellido" class="input-large" readonly value="<?PHP echo $data["Apellido"]; ?>">                
      </div>
    </div>
    
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="apellido">Correo:</label>
      <div class="controls">
        <input id="correo" name="correo" type="text" placeholder="alguien@gmail.com" class="input-large email" readonly value="<?PHP echo $data["correo"]; ?>">                 
        <div id="InfoC"></div>              
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
    
    </fieldset>