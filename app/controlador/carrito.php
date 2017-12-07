<?php 
/*
POST ID, Camtidad
*/
$jmy = new JMY3MySQL();
$jmyWeb = new JMY3WEB();
$jmyCar = new Carrito();

$pet = explode("/",$_GET["peticion"]);

	 
if($_POST['id']!=''){
	
	if(in_array("agregar",$pet)) // agrega y actualiza
		$out = $jmyCar -> agregar($_POST);
	
	if(in_array("quitar",$pet))
		 $out = $jmyCar -> quitar($_POST['id']);
		
}else{
	
	if(in_array("actualizar",$pet)){
		$out["post"] = $_POST;
		for($i=0;$i<count($_POST['datos']);$i++){
			$out[] = $jmyCar -> agregar([ 	"id"=>$_POST['datos'][$i]["id"],
											"cantidad"=>$_POST['datos'][$i]["cantidad"] 
										]);
			
		}
	}else{
		$out = $jmyCar -> ver();
	}
}

/* SALIDA */

if(in_array("json",$pet)){
	 echo json_encode($out);
}else{
	if(is_array($out['key'])){
		$detalles = $jmy->ver([	"TABLA"=>"PRODUCTOS", // STRING
								"ID_F"=>$out['key'], // OPCIONES EN ARRAY
								"COL"=>["titulo", 
										"resumen_descripcion",
										"descuento",
										"precio",
										"url",
										"archivos",
								],
			]);
			
		for($i=0;$i<count($detalles['otKey']);$i++){
			$t=$detalles['ot'][ $detalles['otKey'][$i] ];
			if($t['descuento']!=''){
				$totales[] = ($t['precio']-($t['descuento']*$t['precio']/100))*$out['lista'][$detalles['otKey'][$i]]['cantidad'];	
			}else{
				$totales[] = $t['precio']*$out['lista'][$detalles['otKey'][$i]]['cantidad'];	
			}				
		}	
	}
	$jmyWeb -> cargar_js(["url"=>BASE_TEMPLET."js/carrito.js","unico"=>true]); // carga JS externo 
	$vista = ($totales<1) ? "carrito_vacio.php" : "carrito.php";
	$jmyWeb -> cargar_vista(["url"=>$vista,"data"=>[	"out"=>$out,
														"detalles"=>$detalles['ot'],
														"total"=>$totales,
														"session"=>$jmyCar->session()
													]]);
}

?>