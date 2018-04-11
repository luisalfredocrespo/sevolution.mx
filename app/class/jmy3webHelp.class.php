<?php
//require_once();
class JMY3WEB extends JMY3MySQL{
  public $print;
  public $printSec;
  private $out;
  private $tabla;
  private $modoEdicion;

  public function __construct(){
  	global $tabla;
  	$tabla = "vistaweb";
  	global $modoEdicion;
  	$modoEdicion=($_SESSION['JMY3WEB'][DOY])?ture:MODO_DESAROLLADOR;
	 //$_SESSION['JMY3WEB']['add_js']=[];

  	parent::db([$tabla]); // Verificamos que exista la tabla, de nos er así el sistema la crea
  }
	public function url_templet($d=[]){ if($d['return']){ return RUTA_ACTUAL.BASE_TEMPLET; }else{echo RUTA_ACTUAL.BASE_TEMPLET;} }
	public function url_inicio($d=[]){ if($d['return']){ return RUTA_ACTUAL; }else{echo RUTA_ACTUAL;}  }
  
  	public function archivos($d=[]){ 
  		/* 
  		archivos([	'ruta'=>'carpeta/',
  					'height'=>'',
  					'width'=>'',
  					'permisos'=>[ 	//'des_del_file'=>true, // Desactivar eleiminar archivos
									//'des_regresar'=>true,
									//'des_cre_folder'=>true,
									//'des_del_folder'=>true,
									//'des_upload'=>true,
									//'des_rename_files'=>true,
									//'des_rename_folders'=>true,
									//'des_duplicate'=>true,
									//'des_breadcrumb'=>true,
  		]);

  		*/
  		 
  		$carpetas = explode('/', $d['ruta']);
		$key=md5(json_encode($datos));
		/* RUTINA PARA CREAR FICHEROS EN CASO DE NO EXISTIR */
		for($i=0;$i< count($carpetas);$i++){		
			$fichero = '';
			for($u=0;$u<=$i ;$u++){		
				$fichero .= $carpetas[$u];
				if($u>=0 && $u<$i ){$fichero .= '/';}
			}
			if (!file_exists(BASE_ARCHIVO.$fichero)) { // CREAR FICHERO
				if (mkdir(BASE_ARCHIVO.$fichero, 0755, true))
					chmod(BASE_ARCHIVO.$fichero, 0755);
			}
		}	
		/* PERMISOS DE ARCHIVOS */
		if(count($datos['permisos'])>0){
			$perKey = array_keys($datos['permisos']);
			for($i=0;$i<count($perKey) ;$i++){
				$_SESSION[$this->token_variable('archivos'.$key)][$this->token_variable($perKey[$i])]=$datos['permisos'][$perKey[$i]];
			}
			if(is_array($datos['bloquer_archivos']))
				$_SESSION[$this->token_variable('archivos'.$key)][$this->token_variable('bloquer_archivos')]=$datos['bloquer_archivos'];
		}
		$d['height']=($d['height']!='')?$d['height']:"100%";
		$out = '<iframe width="'.$d['width'].'" height="'.$d['height'].'" style="'.$d['style'].'" frameborder="0" allowtransparency="true"
                src="'.RUTA_ACTUAL.'app/vendor/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&key='.$key.'&fldr='.urlencode($fichero).'&jmy_url='.$datos['bread'].'"></iframe>';
        return $out;
  	}
  	public function token_variable($d=''){ 
		return  md5($_SESSION['session']['TOKEN'].$d.date('d'));						
	}
	public function cargar($d=[],$variable='print',$o=['error'=>'datos insuficientes']){ 
		/* cargar(["pagina"=>"blog","id"=>"titulo_nota"]); // id opcional */
		global  $print;global  $printSec;global $tabla;
		if($d['pagina']!=''){
			$t=($d['tabla']!='')?$d['tabla']:$tabla;
		  	$o = parent::ver([ "TABLA"=>$t, "ID_F"=>$d['pagina'] ]);
		  	$o['PETICION']=$d;
		  	if($d['secundario']!=''){
		  		if(!is_array($printSec)){$printSec=[];}
		  		$printSec[$d['secundario']]=$o['ot'][$d['pagina']];
		  	}else{
		  		$print =$o['ot'][$d['pagina']];
		  	}
		} 
		return $o;
	}

	public function pnt($d,$ph="Texto texto texto",$op=[]){ 
	// pnt(id, place holder);  imprime la infomración cargada por la funcion cargar 
	// pnt(id, place holder, ["secundario"=>"NOMBRE DE LA VARIABLE EXTRA"]); 
		global $print; global $printSec; 
		if($op['secundario']!=''){
			$o=($printSec[$op['secundario']][$d]!='')?$printSec[$op['secundario']][$d]:$ph;
		}else{
			$o=($print[$d]!='')?$print[$d]:$ph;
		}
		if(!$op['return'])
			echo $o;			
		else
			return $o;
	}

	public function guardar($d=[],$r="no data"){
		global $tabla;
		if($d['id']!=''&&$d['pagina']!=''&&$d['valor']!='' ){
			//$d['opciones'] // guardar aparte
			$ta=($d['tabla']!='')?$d['tabla']:$tabla;
			$t=[$d['id']=>$d['valor']];
			$t=["TABLA"=>$ta, 
			"ID_F"=>$d['pagina'],
			"A_D"=>TRUE, 
			"GUARDAR"=>$t	];
			$r=parent::guardar($t);
		} 
		return [$t,$r];
	}

	public function pre($d=[]){
		$o=$d['p'];$t=($d['t']!="")?"<h5>".$d['t']."</h5>":"";
		echo"$t<pre>";print_r($o);echo"</pre>";
	}
	public function cargar_vista($d=[]){	
		global $print;
		global $modoEdicion;
		$data = $d["data"];
		if($modoEdicion){			
			$this->cargar_js(['url'=>BASE_APP.'js/ckeditorN/ckeditor.js']); // funciones jmy 
			$this->cargar_js(['url'=>BASE_APP.'js/ckeditorN/adapters/jquery.js']); // funciones jmy 
			$this->cargar_js(['url'=>'https://code.jquery.com/ui/1.12.1/jquery-ui.js']); // funciones jmy 
			$this->cargar_js(['url'=>BASE_APP.'js/jmy/jmyWeb.js']); // funciones jmy 
		}
		if(file_exists(BASE_TEMPLET.TEMPLET_HEADER)){
			$this -> cargar([ 	"pagina"=>PAGE_HEADER,
						 		"tabla"=>"vistaweb", 
						 		"secundario"=>PAGE_HEADER, 
							]);
			//$header_P = is_array($header_P['ot'])?$header_P['ot'][PAGE_HEADER]:["error"=>"no encontrado"];
			include(BASE_TEMPLET.TEMPLET_HEADER); 
		}	
		if(file_exists(BASE_TEMPLET.$d['url'])){
			include(BASE_TEMPLET.$d['url']);
		}else{
			if(file_exists(BASE_TEMPLET.'error404.php'))
				include(BASE_TEMPLET.'error404.php');
			else
				echo "error 404, no se encontro ".$d['url']; 
		}	
		if(file_exists(BASE_TEMPLET.TEMPLET_FOOTER)){
			$this -> cargar([  "pagina"=>PAGE_FOOTER,
							 	"tabla"=>"vistaweb", 
							 	"secundario"=>PAGE_FOOTER, 
							]);
			include(BASE_TEMPLET.TEMPLET_FOOTER);
		}
	}

	public function cargar_js($d=[]){	
		if(!is_array($_SESSION['JMY3WEB']['add_js']))
			$_SESSION['JMY3WEB']['add_js']=[];
		if($d['url']!="" && !in_array($d['url'],$_SESSION['JMY3WEB']['add_js']))
			$_SESSION['JMY3WEB']['add_js'][]=$d['url'];
		if($d['unico'])
			$_SESSION['JMY3WEB']['cargar_js_borrar'][]=$d['url'];
	}
	public function llamar_js($d=[],$tmp = ''){	
		if(is_array($_SESSION['JMY3WEB']['add_js'])){
			$key = array_keys($_SESSION['JMY3WEB']['add_js']);
			for($i=0;$i<count($key) ;$i++){
				if($_SESSION['JMY3WEB']['add_js'][$i]!=''){
					$u=$_SESSION['JMY3WEB']['add_js'][$key[$i]];
					$u=(strpos($u,'http')===0)?$u:RUTA_ACTUAL.$u;
					$tmp.='<script src="'.$u.'"></script>'; 
				}
				if(in_array($_SESSION['JMY3WEB']['add_js'][$i],$_SESSION['JMY3WEB']['cargar_js_borrar']))
					unset($_SESSION['JMY3WEB']['add_js'][$i]);
			}
			unset($_SESSION['JMY3WEB']['add_js']);
			echo $tmp;
		}
	}
	private function sess($d=[]){
		/*$va = ($_SESSION['JMY3WEB']!="")?[]:json_decode(base64_decode($_SESSION['JMY3WEB']));
		if($d["nom"]!="" && $d["val"]!="")
			$va[$d["nom"]] = $d["val"];
		$_SESSION['JMY3WEB'] = base64_encode(json_encode($va));
		return $va;*/
	}
}