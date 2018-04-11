<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ERROR | E_PARSE); 
date_default_timezone_set('America/Mexico_City');
$raiz= './';
require($raiz.'config.inc.php');
require(BASE_APP.'h.php'); 
?>