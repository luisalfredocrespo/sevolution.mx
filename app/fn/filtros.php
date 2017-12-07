<?php 

function filtros($datos=[]){
	$out = ["error"=>"Faltan datos"];
	global $jmy;
	$out = $jmy->ver([	"TABLA"=>"PRODUCTOS", // STRING
					"ORDER"=>"GROUP BY V ORDER BY ID DESC",
					"SALIDA"=>"CONTADOR",
					"COL"=>["resumen_tags",
							"resumen_tamanos",
							"resumen_categoria",
							"resumen_calificacion",
							"resumen_calificacion"
							], // STRING OPCIONAL
					//"ID_F"=>$_GET['peticion'], // STRING OPCIONAL
		]);
	/*echo '<pre>';
	print_r($out);
	echo '</pre>';*/
	
	return $out;
}