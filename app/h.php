<?php
$DI = ($_GET['ruta']!='') ? $_GET['ruta'] : TEMPLET_HOME ;
require(RUTA_APP."class/jmy3webCore.class.php"); $jmycore = new JMY3WEBCORE();
require(RUTA_APP."class/token_jmy.class.php"); $jmyconect = new HiJMY();
if(ESTADO_WEB=='PUBLICO' || $jmycore -> acceso() ){
	require(RUTA_APP."class/jmy3mysql.class.php"); $jmy = new JMY3MySQL();
	require(RUTA_APP."class/jmy3webHelp.class.php"); $jmyWeb = new JMY3WEB();
	//require(RUTA_APP."class/jmy3carrito.class.php");
	if(!in_array($DI,['entrar','INSTALAR'])){
		if(file_exists(RUTA_APP.'controlador/'.$DI.'.php'))
			include(RUTA_APP.'controlador/'.$DI.'.php');
		else
			include(RUTA_APP.'controlador/error404.php');
	}else{
		if(file_exists(RUTA_APP.'admin/'.$DI.'.php'))
			include(RUTA_APP.'admin/'.$DI.'.php');
		else
			include(RUTA_APP.'controlador/error404.php');
	}
}else{
	if(file_exists(BASE_TEMPLET.TEMPLET_MANTENIMIENTO))
		include(BASE_TEMPLET.TEMPLET_MANTENIMIENTO);
	else
		include(RUTA_APP.'mantenimiento.php');
}
?>