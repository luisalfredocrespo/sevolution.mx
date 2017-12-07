<?php
require('../config.inc.php');
require("../app/class/token_jmy.class.php");
require("../app/class/jmy3mysql.class.php");
$jmyconect = new HiJMY();
$jmy = new JMY3MySQL();
/*---*/

$ID_F = '';
$out=[
	//"JMY_KEY"=>JMY_KEY,
	//"POST"=>$jmyconect->get($_POST),
	
	"db"=>$jmy->db(["TABLA","PRODUCTOS","CARLOS"]),	
					
	"guardar"=>$jmy->guardar([	"TABLA"=>"PRODUCTOS", // STRING
								"ID_F"=>$ID_F, // STRING
								"A_D"=>TRUE, 
								"GUARDAR"=>["NOMBRE"=>"Nombre XD",
											"APELLIDO"=>"Apellido XD",
											"SEXO"=>"Sexo XD",
											"EDAD"=>"Edad XD"],
					]),
	
	"ver"=>$jmy->ver([	"TABLA"=>"PRODUCTOS", // STRING
						//"ID_D"=>["NOMBRE","APELLIDO","SEXO","SEXO"], // ARRAY OPCIONAL
						"ID_F"=>$ID_F, // STRING OPCIONAL
						//"ID_V"=>[5,6], // ARRAY OPCIONAL
						//"ID_S"=>[7,8], // ARRAY OPCIONAL
						//"LIKE_V"=>["angora","luciernaga"], // ARRAY OPCIONAL
						//"LIKE_V_OPER"=>"AND" // STRING OPCIONAL
					]),				
					
	"borrar"=>$jmy->borrar([	"TABLA"=>"PRODUCTOS", // STRING
								"ID_D"=>["APELLIDO"], // ARRAY 
								"ID_F"=>$ID_F, // STRING 
					]),
	"ver2"=>$jmy->ver([	"TABLA"=>"PRODUCTOS", // STRING
						"ID_D"=>["NOMBRE","APELLIDO","SEXO","SEXO"], // ARRAY OPCIONAL
						"ID_F"=>$ID_F, // STRING OPCIONAL
						//"ID_V"=>[5,6], // ARRAY OPCIONAL
						//"ID_S"=>[7,8], // ARRAY OPCIONAL
						//"LIKE_V"=>["angora","luciernaga"], // ARRAY OPCIONAL
						//"LIKE_V_OPER"=>"AND" // STRING OPCIONAL
					]),
					
];
//echo json_encode($out);
echo '<pre>';
print_r($out);
echo '</pre>';