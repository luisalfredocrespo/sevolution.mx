<?php
class JMY3WEBCORE{	
	public function acceso(){
		if($_SESSION['demo'][date('ymd')]){			
			$out = true;
		}elseif($_GET['demo']==date('m')){
			$_SESSION['demo'][date('ymd')] = true;
			$out = true;
		}else{$out = false;}		
		return $out;
	}
	public function estado_web(){
	
		/* post([	"id(optional)"=>221596241,
					"post"=array()
			]);*/
		$url =JMY_SERVER;
		$o['t']=["K"=>$this->tkn(null,1)];
		$o[$this->tkn('p')]=[$this->tkn('p')=>[$this->tkn('id')=>$d['id'],$this->tkn('post')=>base64_encode(json_encode($d['post'])),]];
		$tk=md5(json_encode($o));
		$o['M']=$tk;
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch,CURLOPT_POST, 1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,["datos"=>base64_encode(json_encode($o))]);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		$r= curl_exec($ch);
		$o['outa'] = $r;
		$o['out'] = json_decode($r,1);
		curl_close($ch);
		//return $o;

		return false;
	}
	private function tkn($c,$o=0,$p=[]){
		$K=($p['K']!='')? $p['K']:JMY_KEY;
		$S=($p['S']!='')? $p['S']:JMY_SECRET_KEY;
		return($o)?$K:md5($K.$S.date("YMd").$c);
		}
}
?>