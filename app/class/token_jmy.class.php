<?php
class HiJMY {
	public function post($d,$o=false){ 
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
		return $o;
	}
	public function get($d,$o=false){
		$t[0] = json_decode(base64_decode($d['datos']),1);
		
		$t[2] = ($t[0]['t']['K']==$this->tkn(null,1)) ? $this->tkn("p") : "NoKey";
		$t[1] = (md5(json_encode(["t"=>array("K"=>$t[0]['t']['K']),$this->tkn("p")=>$t[0][$this->tkn("p")]])) == $t[0]["M"])? "siHash":"noHash";
		//$t[2] = ($t[0]['t']['K']==$this->tkn(null,1)) ? $this->tkn("p") : "NoKey";
		if($t[1]!="NoHash" && $t[2]!="NoKey"){
			$o = [	"id"=>$t[0][$this->tkn("p")][$this->tkn("p")][$this->tkn("id")],
					"post"=>json_decode(base64_decode($t[0][$this->tkn("p")][$this->tkn("p")][$this->tkn("post")]),1),
					"t"=>$t
				];
		}
		$t[5] = JMY_KEY;
		$t[6] = JMY_SECRET_KEY;
		sleep(1);
		return$o;
		}
	private function tkn($c,$o=0,$p=[]){
		$K=($p['K']!='')? $p['K']:JMY_KEY;
		$S=($p['S']!='')? $p['S']:JMY_SECRET_KEY;
		return($o)?$K:md5($K.$S.date("YMd").$c);
		}
}