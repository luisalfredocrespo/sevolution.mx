<?php



/* Detalles de diseño */ 
define(	"BASE_TEMPLET","templet/"); 
define(	"BASE_APP","app/"); 
define(	"RUTA_ACTUAL","http://local.evolution.mx/"); 
define(	"TEMPLET_HOME","inicio"); //archivo como se inicia
define(	"TEMPLET_HEADER","header.php"); 
define(	"TEMPLET_FOOTER","footer.php"); 
define(	"TEMPLET_MANTENIMIENTO","en_construccion.php"); 
define(	"TEMPLET_404",'error404.php'); 
define(	"ESTADO_WEB","PUBLICO");  // PUBLICO, MANTENIMIENTO 
/*Licencia JMY CONNECT*/
define(	"JMY_SERVER","http://comsis.mx/app/update.php"); 
define(	"JMY_KEY","8d7db37489d2aa7c76d739cac701d50a"); 
define(	"JMY_SECRET_KEY","c15369bea0c32f7d6d66a4f886300e3e"); 
/*Configuración JMY */
define(	"DB_JMY_ADD_ID_D",true); //Agregar campos faltantes en la base de datos
define(	"DB_JMY_ADD_TABLA",true); //Agregar Tablas faltantes en la base de datos
/*MySQL*/
define(	"DB_HO","localhost"); //servidor
define(	"DB_US","root"); //usuario
define(	"DB_PA",""); //contrase�a
define(	"DB_DB","evolution"); //Base de datos

/*------ no modificar a partir de este punto ------*/
define("RAIZ_TEMPLET",RUTA_ACTUAL.BASE_TEMPLET);
define("RUTA_APP",BASE_APP);
require(BASE_APP.'h.php'); 

?>