<?php
require('../../config.inc.php');
$cu=new mysqli(DB_HO,DB_US,DB_PA,DB_DB);
if($cu->connect_error){$error='Error de Conexión ('.$mysqli->connect_errno.')'.$mysqli->error;}else{
$n='CREATE TABLE IF NOT EXISTS `cat_d` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NAME` (`NAME`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;';
if(!$cu->query($n)){$error[] = "Tabla existente-".$cu->error;}      
//$jmy->db(['vistaweb','blog']);
}