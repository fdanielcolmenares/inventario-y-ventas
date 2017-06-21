<?PHP

	include("../scriptPHP/conex.php");		
	
	$bd=Conectarse();
	$sql="SELECT * from vendedor where codigo_vendedor=".$_POST["id"].""; 
	$res=mysql_query($sql);	
	$data=mysql_fetch_assoc($res);echo $data["foto"];
	if($data["foto"]==""){$foto="../img/image.gif";}
	else{ $foto="../vendedores/fotos/".$data["foto"];}
?>

	<form class="form-horizontal" action="actualizar.php" method="post" id="modVend" name="modVend" enctype="multipart/form-data">
    <fieldset>
    
    <!-- Form Name -->
    <legend>Registro de Vendedor</legend>
    <input type="hidden" name="id" id="id" value="<? echo $data["codigo_vendedor"]; ?>"/>
    <div class="control-group">
        <div class="fileupload fileupload-new span3" data-provides="fileupload" align="center">
            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?PHP echo $foto; ?>" /></div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
              <span class="btn btn-file btn-primary">
                <span class="fileupload-new">Seleccionar imagen</span>
                <span class="fileupload-exists">Cambiar</span><input type="file" name="imgV" id="imgV" Accept="image/*"/>
              </span>
              <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Quitar</a>
            </div>
        </div>
    </div>
    
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="nombre">Nombre:</label>
      <div class="controls">
        <input id="nombre" name="nombre" type="text" placeholder="nombre" class="input-large" required="" value="<?PHP echo $data["Nombre"]; ?>">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="apellido">Apellido:</label>
      <div class="controls">
        <input id="apellido" name="apellido" type="text" placeholder="apellido" class="input-large" required="" value="<?PHP echo $data["Apellido"]; ?>">                
      </div>
    </div>
    
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="apellido">Correo:</label>
      <div class="controls">
        <input id="correo" name="correo" type="text" placeholder="alguien@gmail.com" class="input-large email" required="" value="<?PHP echo $data["correo"]; ?>">                 
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
    
    <!-- Button -->
    <div class="control-group">
      <label class="control-label" for="guardar"></label>
      <div class="controls">
        <button type="submit" id="guardar" name="guardar" class="btn btn-primary">Guardar</button>
      </div>
    </div>
    
    </fieldset>
    </form>
    
<script>
	$(document).ready(function(){
		$('#correo').blur(function(){ 
			if($(this).valid()){
				$('#InfoC').html('<img src="../img/loader.gif" alt="" />').fadeOut(1000);
	
				var mail = $(this).val();        
				var dataString = 'mail='+mail;
	
				$.ajax({
					type: "POST",
					url: "verificarCorreo.php",
					data: dataString,
					success: function(data) {
						$('#InfoC').fadeIn(1000).html(data);
					}
				});
			}
        })
	});
</script>