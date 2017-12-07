<?php
$direccion = ($_GET['ruta']!='') ? $_GET['ruta'] : TEMPLET_HOME ;
require(RUTA_APP."class/jmy3webCore.class.php"); $jmycore = new JMY3WEBCORE();
require(RUTA_APP."class/token_jmy.class.php"); $jmyconect = new HiJMY();
if(ESTADO_WEB=='PUBLICO' || $jmycore -> acceso() ){
	require(RUTA_APP."class/jmy3mysql.class.php"); $jmy = new JMY3MySQL();
	require(RUTA_APP."class/jmy3webHelp.class.php"); $jmyWeb = new JMY3WEB();
	require(RUTA_APP."class/jmy3carrito.class.php");
	require(RUTA_APP."fn/filtros.php");
	if(file_exists(RUTA_APP.'controlador/'.$direccion.'.php')){
		include(RUTA_APP.'controlador/'.$direccion.'.php');
	}else{
		include(BASE_TEMPLET.'error404.php');
	}
}else{
	include(BASE_TEMPLET.TEMPLET_MANTENIMIENTO);
}
?>

