<?php
if(MODO_DESAROLLADOR || $_SESSION['JMY3WEB'][DOY]) {
 echo $jmyWeb->archivos([	'ruta'=>'carpeta/',
					'height'=>'500',
					'width'=>'100%',
					'permisos'=>[ 	
								//'des_del_file'=>true, // Desactivar eleiminar archivos
								//'des_regresar'=>true,
								//'des_cre_folder'=>true,
								//'des_del_folder'=>true,
								//'des_upload'=>true,
								//'des_rename_files'=>true,
								//'des_rename_folders'=>true,
								//'des_duplicate'=>true,
								//'des_breadcrumb'=>true,
						]
			]);
}else{
	$jmyWeb ->cargar_vista(["url"=>"error404.php"]);	
}

//$jmyWeb ->cargar_vista(["url"=>"contacto.php"]);

?>