<?php
$gt = $_GET;
$url = strtolower($gt['peticion']); // quitar espacios trim() y minusculas strolower()
$url = preg_replace("/^[0-9a-zA-Z]+$/","",$url); // quitar caracteres no aceptados mas los que esten en la expreción regular
$pet = explode('/', $url); // separa instrucciones para el blog
$url = $pet[0]; // url de registro en base de datos
//$jmyWeb ->pre(['p'=>$url,'t'=>'URL']);
if(in_array('pre',$pet)){ 
	$jmyWeb ->pre(['p'=>$out,'t'=>'PRE']);
}else{
	if($url!=''){
		$jmyWeb->cargar(["pagina"=>$url]);		
		echo $jmyWeb ->cargar_vista(["url"=>$url.".php","data"=>$out]);	
	}else{
		$out = $jmyWeb->cargar(["pagina"=>"inicio"]);
		$out = $print[ot]['inicio'];
		echo $jmyWeb ->cargar_vista(["url"=>"paquetes.php","data"=>$out]);
	}
}
?>