<?PHP
	session_start();
	include("../scriptPHP/conex.php");
	
	$bd=Conectarse();
	$nombre="";
	//subo la imagen
	if($_FILES['imgA']['tmp_name']!=""){
		$rutaEnServidor='../inventario/fotos';
		$rutaTemporal=$_FILES['imgA']['tmp_name'];
		$ext=explode(".",$_FILES['imgA']['name']);
		$num=count($ext)-1;
		$nombre=$_POST["codigo"].".".$ext[$num];
		$rutaDestino=$rutaEnServidor.'/'.$nombre;
		move_uploaded_file($rutaTemporal,$rutaDestino);
		// cargo imagen guardada
		$ruta_imagen = "../inventario/fotos/".$nombre;
		$miniatura_ancho_maximo = 200;
		$miniatura_alto_maximo = 150;
		$info_imagen = getimagesize($ruta_imagen);
		$imagen_ancho = $info_imagen[0];
		$imagen_alto = $info_imagen[1];
		$imagen_tipo = $info_imagen['mime'];
		$proporcion_imagen = $imagen_ancho / $imagen_alto;
		$proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;
		if ( $proporcion_imagen > $proporcion_miniatura ){
		  $miniatura_ancho = $miniatura_ancho_maximo;
		  $miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;
		} else if ( $proporcion_imagen < $proporcion_miniatura ){
		  $miniatura_ancho = $miniatura_alto_maximo * $proporcion_imagen;
		  $miniatura_alto = $miniatura_alto_maximo;
		} else {
		  $miniatura_ancho = $miniatura_ancho_maximo;
		  $miniatura_alto = $miniatura_alto_maximo;
		}
		//creo una imagen para redimencionar
		$lienzo = imagecreatetruecolor( $miniatura_ancho, $miniatura_alto );
		// tipo de la imagen
		switch ( $imagen_tipo ){
			case "image/jpg":
			case "image/jpeg":
			$imagen = imagecreatefromjpeg( $ruta_imagen );
			break;
			case "image/png":
			$imagen = imagecreatefrompng( $ruta_imagen );
			break;
			case "image/gif":
			$imagen = imagecreatefromgif( $ruta_imagen );
			break;
		}
		//guardo imagen redimencionada
		imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho, $miniatura_alto, $imagen_ancho, $imagen_alto);
		imagejpeg($lienzo, $rutaDestino, 90);
	}
	
	$sql="update articulo set descripcion='".$_POST["desc"]."', estado='".$_POST["estado"]."' where codigo_articulo='".$_POST["codigo"]."'";
	$res=mysql_query($sql);
	
	if($nombre!=""){
		$sql2="update articulo_imagen set imagen='".$nombre."' where codigo_articulo='".$_POST["codigo"]."' and tamano=1";
		$res2=mysql_query($sql2);
	}
	
	if($res){
		echo'
			<script type="text/javascript">
  				window.location="consultarArticulo.php?E=1";
			</script>';	
	}
	else{
		echo'
			<script type="text/javascript">
  				window.location="consultarArticulo.php?E=0";
			</script>';	
	}

?>