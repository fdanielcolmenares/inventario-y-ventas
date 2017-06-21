<?php 
function Conectarse(){
   if(!$link=mysql_connect("localhost","root","987654321"))
   {
     die('Imposible conectar con la Base de Datos');
   }
   if(!mysql_select_db("scvc",$link))
   {
     die('Imposible seleccionar la base de datos');
   }
  return $link;
}

?>