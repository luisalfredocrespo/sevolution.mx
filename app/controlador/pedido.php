<?php 

$jmy = new JMY3MySQL();
$jmyWeb = new JMY3WEB();
$jmyCar = new Carrito();

$jmy->db(["PEDIDOS"]);


$peticion = explode("/",$_GET['peticion']);
if($peticion[0]!=""){
	echo "Pedido confirmado con el no: ".$peticion[0]. " <a href='http://gurteltier.com.mx'>  Regresar a la tienda</a>";
	/*$ver = $jmy->ver([	"TABLA"=>"PEDIDOS", // STRING
						"ID_F"=>$peticion[0], // OPCIONES EN ARRAY
						
				]);	*/
	
	//$jmyWeb->pre(["p"=> ["peticion"=>$peticion,"ver"=>$ver, ]]);
}else{
	
	/* Datos del comprador */	
	$out["comprador"] = $_POST;						
	/* obtener No orden temporal */
	$out["no_pedidp"] = $jmyCar -> session();
					
	/* obtener orden de compra */
	$out["cadena_compra"] = $jmyCar -> ver();				

	/* obtener detalles de los productos */
	$out["detalles"] = $jmy->ver([	"TABLA"=>"PRODUCTOS", // STRING
							"ID_F"=>$out["cadena_compra"]['key'], // OPCIONES EN ARRAY
							"COL"=>["titulo", 
									"resumen_descripcion",
									"descuento",
									"precio",
									"url",
							],
				]);			
	$detalles = $out["detalles"];	
	for($i=0;$i<count($detalles['otKey']);$i++){
				$t=$detalles['ot'][ $detalles['otKey'][$i] ];
				if($t['descuento']!=''){
					$totales[] = ($t['precio']-($t['descuento']*$t['precio']/100))*$out['cadena_compra']['lista'][$detalles['otKey'][$i]]['cantidad'];	
				}else{
					$totales[] = $t['precio']*$out['cadena_compra']['lista'][$detalles['otKey'][$i]]['cantidad'];	
				}				
			}						
	/* guardar informacion en base d datos */
	$out["resultado"] = $jmy->guardar([	"TABLA"=>"PEDIDOS", // STRING									
										"A_D"=>TRUE, 
										"ID_F"=> [date("U")],
										"GUARDAR"=>["data"=>json_encode($out)],
						]);
						
	//$jmyWeb->pre(["p"=> ["post"=>$out ]]);

	$jmyWeb ->cargar_vista(["url"=>"pedido.php","data"=>[	"out"=>$out["detalles"],
															"detalles"=>$detalles['ot'],
															"no_pedido"=>$out["resultado"]["IDF"][0],
															"total"=>$totales,
															"session"=>$jmyCar->session()
														]]);
}
?>