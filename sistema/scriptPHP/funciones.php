<?PHP
session_start();
	function isConnect($pos){
		if($_SESSION["idUsuario"]==""){
			echo'
			 <script type="text/javascript">
  				window.location="'.$pos.'index.php?E=2";
			 </script>
			';
			return "FALLO";	
		}
	  	return "OK";
	}

?>