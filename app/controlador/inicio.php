<?php 
$out = $jmy->ver([	
			"TABLA"=>"blog", 		
			"COLUMNAS"=>["titulo","subtitulo","imagen","url","fecha"],
			//"FO"=>true
			//"ID_F"=>'blog'
		]);
$jmyWeb->cargar(["pagina"=>"inicio"]);

echo $jmyWeb ->cargar_vista(["url"=>"inicio.php"]);
?>