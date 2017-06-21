<?PHP
	session_start();
	include("../scriptPHP/conex.php");
	
	$bd=Conectarse();
	$nombre="";
	//subo la imagen
	if($_FILES['imgV']['tmp_name']!=""){
		$rutaEnServidor='../vendedores/fotos';
		$rutaTemporal=$_FILES['imgV']['tmp_name'];
		$ext=explode(".",$_FILES['imgV']['name']);
		$num=count($ext)-1;
		$nombre=$_POST["nombre"].$_POST["apellido"].".".$ext[$num];
		$rutaDestino=$rutaEnServidor.'/'.$nombre;
		move_uploaded_file($rutaTemporal,$rutaDestino);
		// cargo imagen guardada
		$ruta_imagen = "../vendedores/fotos/".$nombre;
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
	$sql="insert into vendedor (Nombre, Apellido, correo, estado, foto, codigo_usuario)
	 values ('".$_POST["nombre"]."','".$_POST["apellido"]."','".$_POST["correo"]."','".$_POST["estado"]."','".$nombre."',".$_SESSION["idUsuario"].")";
	$res=mysql_query($sql,$bd);
	
	if($res){
		echo'
			 <script type="text/javascript">
  				window.location="vendedorRegistro.php?E=1";
			 </script>
		';	
	}
	else{
		echo'
			 <script type="text/javascript">
  				window.location="vendedorRegistro.php?E=0";
			 </script>
		';	
	}

?>