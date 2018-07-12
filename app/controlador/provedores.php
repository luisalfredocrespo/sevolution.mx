<?php

if($_SESSION['JMY3WEB'][DOY]){

    $tmp = explode("/",$_GET['peticion']);
    if($tmp[1]!=''){
        $id_proveedores = $tmp[1];
        $_GET['peticion']=$tmp[0];

    }
    switch($_GET['peticion']):
        case 'instalar':
            $jmyWeb->pre(['p'=>$jmy->db(["estetica_empleados","estetica_historial","estetica_productos","estetica_proveedores"]),'t'=>'Estado de DB']);    
        break;
        case 'editar_proveedores':
            $datos = $jmy->ver([	"TABLA"=>"estetica_proveedores", // STRING
                    //"SALIDA"=>"ARRAY",
                    "ID_F"=>$id_proveedores,
                    //"COL"=>["puesto"], // ARRAY OPCIONAL
            ]);
            $datos = $datos['ot'][$id_proveedores];
            $jmyWeb->cargar_js(["url"=>BASE_TEMPLET."js/proveedores.js","unico"=>true]);
            $jmyWeb ->cargar_vista(["url"=>"editar_proveedores.php",
                                    "data"=>["datos"=>$datos, "id"=>$id_proveedores]]);
        break;
        case 'proveedores':
            $datos = $jmy->ver([	"TABLA"=>"estetica_proveedores", // STRING
                    //"SALIDA"=>"ARRAY",
                    "ID_F"=>$id_proveedores,
                    //"COL"=>["puesto"], // ARRAY OPCIONAL
            ]);
            $datos = $datos['ot'][$id_proveedores];
            
            $jmyWeb ->cargar_vista(["url"=>"ver_proveedores.php",
                                    "data"=>["datos"=>$datos, "id"=>$id_proveedores]]);
        break;
        case 'agregar_proveedores_guardar':
            $estado = $jmy->guardar([	
                            "TABLA"=>"estetica_proveedores", // STRING
                            "A_D"=>TRUE, 
                            "ID_F"=>$_POST['ide'],
                            "GUARDAR"=>[
                                "nombre"=>$_POST['nombre'],
                                "puesto"=>$_POST['puesto'],
                                "direccion"=>$_POST['direccion'],
                                "telefono"=>$_POST['telefono'],
                                "fecha_de_nacimiento"=>$_POST['fecha_de_nacimiento'],    
                            ],
                                ]);
                                
                                echo json_encode(["POST"=>$_POST,"GET"=>$_GET,"estado"=>$estado]);
                                break;
        case 'agregar_proveedores':
            $jmyWeb ->pre(['p'=>$_GET,'t'=>'GET']);
            $jmyWeb->cargar_js(["url"=>BASE_TEMPLET."js/proveedores.js","unico"=>true]); // carga JS externo 
            $jmyWeb ->cargar_vista(["url"=>"editar_proveedores.php"]);
        break;
        case 'lista_proveedores' :
            $lista = $jmy->ver([	"TABLA"=>"estetica_proveedores", // STRING
                                    "SALIDA"=>"ARRAY",
                                     //"COL"=>["puesto"], // ARRAY OPCIONAL
                        ]);
        // $jmyWeb ->pre(['p'=>$lista,'t'=>'LISTA']);
            $jmyWeb ->cargar_vista(["url"=>"lista_proveedores.php","data"=>["lista"=>$lista]]);
        break;
        
        default:
    endswitch;
}else{
    $jmyWeb ->cargar_vista(["url"=>"404.php"]);
}


?>