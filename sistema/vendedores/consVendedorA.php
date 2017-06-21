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
    <legend>Datos de Vendedor</legend>
    
    <div class="control-group">
        <img src="<?PHP echo $foto; ?>" class="img-polaroid" style="height:75px;width:75px">
    </div>
    
    <!-- Text input-->
    <div class="control-group">
      <h3><?PHP echo $data["Nombre"]." ".$data["Apellido"]; ?></h3>
    </div>
    
    <input type="hidden" id="idV" name="idV" value="<?PHP echo $data["codigo_vendedor"] ?>" />
    
    <legend>Buscar articulo</legend>
    
    <div id="consulta"> 
    	<form class="form-horizontal" action="#" method="post" id="consArt" name="consArt">
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="articuloB">Codigo o descripci&oacute;n:</label>
              <div class="controls">
                <input id="articuloB" name="articuloB" type="text" placeholder="AAFGT" class="input-large" >
                <button type="button" id="consulta" name="consulta" class="btn btn-primary" onClick="consultarArticulo()">Consultar</button>
              </div>
            </div>
        </form>
    </div>   
           
    </fieldset>