<form class="form-horizontal" action="registroPorcentaje.php" method="post" id="regVend" name="regVend" enctype="multipart/form-data">
    <fieldset>
    
    <!-- Form Name -->
    <legend>Asignar procentaje de ganancia a articulo</legend>
                      
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="nombre">Codigo Articulo:</label>
      <div class="controls">
        <input id="codigo" name="codigo" type="text" value="<?PHP echo $_POST["id"]; ?>" class="input-large" readonly>  
        <div id="InfoC"></div>              
      </div>
    </div>
    
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="Porcentaje">Porcentaje:</label>
      <div class="controls">
        <input id="Porcentaje" name="Porcentaje" type="text" placeholder="0.6" class="input-large number" required >                
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
	$("form").submit(function() {
		if($("#Porcentaje").valid())
			return true;
		return false;	
	});
</script>