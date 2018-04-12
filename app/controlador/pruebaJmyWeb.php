<?php 
$jmyWeb->pre(["p"=>$jmyWeb->guardar([
	'pagina'=>'home', // Nombre de la pagina o consecutivo blog, productos, galerias, etc....
	'id'=>'test'.rand(1,1000), // Nombre de la variable a guardar
	'valor'=>"valor guardar más ño <div>div</div> jojojo" // Valor a guardar
]),"t"=>"Guardar"]);

$jmyWeb->pre(["p"=>$jmyWeb->guardar([
	'pagina'=>'home', // Nombre de la pagina o consecutivo blog, productos, galerias, etc....
	'id'=>'jajja'.rand(1,1000), // Nombre de la variable a guardar
	'valor'=>"jajajajaj valor guardar más ño <div>div</div> jojojo" // Valor a guardar
]),"t"=>"Guardar"]);

$out =$jmyWeb->cargar([
	'pagina'=>'home', // Nombre de la pagina o consecutivo blog, productos, galerias, etc....
]);
$jmyWeb->pre(["p"=>$out,"t"=>"Final"]);
//$jmyWeb ->cargar(["url"=>"contacto.php"]);
?>