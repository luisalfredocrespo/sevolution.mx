<?php
class JMY3WEB {
  public function pre($d=[]){
	$o = $d['p'];
	echo"<pre>";print_r($o);echo"</pre>";
  }
  public function cargar_vista($d=[]){	
	$data = $d["data"];
	if(file_exists(BASE_TEMPLET.TEMPLET_HEADER))
		include(BASE_TEMPLET.TEMPLET_HEADER);
	
	if(file_exists(BASE_TEMPLET.$d['url'])){
		include(BASE_TEMPLET.$d['url']);
	}else{
		if(file_exists(BASE_TEMPLET.'404.php')){
			include(BASE_TEMPLET.'404.php');
		}else{ echo "error 404 ".$d['url']; }
	}
	
	if(file_exists(BASE_TEMPLET.TEMPLET_FOOTER))
		include(BASE_TEMPLET.TEMPLET_FOOTER);
	
	return BASE_TEMPLET.TEMPLET_HEADER;
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
		print_r($_SESSION['JMY3WEB']['add_js']);
		for($i=0;$i<count($key) ;$i++){
			if($_SESSION['JMY3WEB']['add_js'][$i]!='')
				$tmp .= '<script src="'.RUTA_ACTUAL.$_SESSION['JMY3WEB']['add_js'][$key[$i]].'"></script>'; 
			if(in_array($_SESSION['JMY3WEB']['add_js'][$i],$_SESSION['JMY3WEB']['cargar_js_borrar']))
				unset($_SESSION['JMY3WEB']['add_js'][$i]);
		}
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