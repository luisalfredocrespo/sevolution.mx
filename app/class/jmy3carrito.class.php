<?php
class Carrito {
	public function ver(){
		$key = (is_array($_SESSION['JMY_car'][$_SESSION['JMY_car_s']])) ? array_keys($_SESSION['JMY_car'][$_SESSION['JMY_car_s']]) : false ;
		return ["key"=>$key,
				"lista"=>$_SESSION['JMY_car'][$_SESSION['JMY_car_s']],
			];
	}
	public function agregar($d){		
		$h=$d['JMY_HEADER'];
		unset($d['JMY_HEADER']);
		if($_SESSION['JMY_car_s']==""){
			$s=$this->session();
			$_SESSION['JMY_car_s']=$s;
		}		
		if(is_array($d) && count($d)>0){
			$tmp = $_SESSION['JMY_car'];
			unset($_SESSION['JMY_car']);
			$k=array_keys($d);
			$id=($d['id']!="")?$d['id']:uniqid("A_gen_c_");
			for($i=0;$i<count($k);$i++){
				$tmp[$this->session()][$id][$k[$i]] = $d[$k[$i]];
			}
			$_SESSION['JMY_car'] = $tmp;
		}
		return ["d"=>$d,"ver"=>$this->ver()];  
		//return $d; 
	}
	public function quitar($id){	
		if($id!=''){
			unset($_SESSION['JMY_car'][$this->session()][$id]);
		}
		return ["id"=>$id,"ver"=>$this->ver()]; 
		//return $d; 
	} 
	
	public function session(){
		return($_SESSION['JMY_car_s']=="")?uniqid("JMY_CAR"):$_SESSION['JMY_car_s'];		
	}
	
}


?>