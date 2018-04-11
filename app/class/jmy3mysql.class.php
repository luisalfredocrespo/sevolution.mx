<?php 
class JMY3MySQL {
  public function guardar($d=[]){
    $d['ID_F']=($d['ID']!='')?$d['ID']:$d['ID_F'];
    $d['ID_D']=($d['COLUMNAS']!='')?$d['COLUMNAS']:$d['ID_D'];
    $d['A_D']=($d['AGRGAR_COLUMNAS']!='')?$d['AGRGAR_COLUMNAS']:$d['A_D'];
    $c=1;$r=['TABLA'];//Buscar antes de guardar
    for($i=0;$i<count($r);$i++){ $c= ( ($d[$r[$i]]!='' || is_array($d[$r[$i]]))&&$c==1)?1:0;}
    if($c){$g=$d["GUARDAR"];
      $colKey = (is_array($g)) ? array_keys($g):$d['ID_D'];
      $col = $this->col($colKey,$d['A_D']);
      $tm=[];$fa=[];$ac=[];
      $IDF=($d['ID_F']!='')?$d['ID_F']:uniqid();

      for($i=0;$i<count($colKey);$i++){$tm.='';$ID_D[] = $col['o']['n'][$colKey[$i]]; }     

      $ver =($d["TABLA"]!=''&&$d["ID_F"]!='')?$this->ver(["TABLA"=>$d["TABLA"],"ID_D"=>$ID_D,"ID_F"=>$IDF]):[];
      //Helper -------------------------------------------------------------------------------------------------------AQUI PNEDEJO!!!!
      $tmb=($IDF!='')?$IDF:'';
      $tm=(is_array($ver['ot'])&&$IDF!='')?$ver['ot'][$tmb]:[];    
      $tmkey=(is_array($tm))?array_keys($tm):[];
      $col=$this->col($colKey);
      $resCol=$col;
      $col=$col['o']; 
      for($i=0;$i<count($colKey);$i++){
        $tmb=["N"=>$colKey[$i],"I"=>$col['n'][$colKey[$i]],"V"=>$g[$colKey[$i]]];
        if(!in_array($colKey[$i],$tmkey)){
          $fa[]=$tmb;}else{$ac[]=$tmb;} 
        $comparando[]=$tmb;}
      $cu=new mysqli(DB_HO,DB_US,DB_PA,DB_DB);
      if ($cu->connect_error) { $error ='Error de Conexión ('.$mysqli->connect_errno.')'. $mysqli->error;}else{
        if(count($fa)>0){ 
          for($ib=0;$ib<count($IDF);$ib++){
      $va=[];for($i=0;$i<count($fa);$i++){
      $fa[$i]['V']=(is_array($fa[$i]['V']))?json_encode($fa[$i]['V']):$fa[$i]['V']; 
            $va[]="('".$IDF."','".$fa[$i]['I']."','".$fa[$i]['V']."',1)";
      $ssI[$ib] = "INSERT INTO `".DB_PX.$d["TABLA"]."` (`ID_F`, `ID_D`, `V`, `ID_S`) 
           VALUES ".implode(',',$va)." "; }   
       if( !$rs = $cu->query($ssI[$ib]) ){$error = " error ss ".$cu->error;
           $ac[]=$va;}}}
        if(count($ac)>0){for($i=0;$i<count($ac);$i++){      
      $IDF = (is_array($IDF)) ? $IDF : [$IDF];
            for($ib=0;$ib<count($IDF);$ib++){
        $ac[$i]["V"]=(is_array($ac[$i]["V"]))?json_encode($ac[$i]["V"]):$ac[$i]["V"]; 
          $ssU[$ib] [$i]=($d['b'])? "UPDATE ".DB_PX.$d["TABLA"]." SET ID_S = '0' WHERE ID_D = '".$ac[$i]["I"]."' AND ID_F = '".$IDF[$ib]."' AND ID_S = '1' " : "UPDATE ".DB_PX.$d["TABLA"]." SET V = '".$ac[$i]["V"]."' WHERE ID_D = '".$ac[$i]["I"]."' AND ID_F = '".$IDF[$ib]."' AND ID_S = '1' ";  
        if( !$rs = $cu->query($ssU[$ib] [$i]) ){$error = "error-g-ssU".$ib.'-'.$cu->error; $ssU[$ib] [$i] =$cu->error; }}}}}
    }else{$error="Faltan Datos";}
    return [ // "ver"=>$ver, "ssI"=>$ssI, "ssU"=>$ssU,  "ac"=>$ac, "fa"=>$fa, "ver"=>$ver, "d"=>$d, "resCol"=>$resCol, "tm"=>$tm, ,"comparando"=> $comparando
        "colKey"=> $colKey,"col"=> $col]; 
  }   
  public function borrar($d=[]){
    $d['ID_F']=($d['ID']!='')?$d['ID']:$d['ID_F'];
    $d['ID_D']=($d['COLUMNAS']!='')?$d['COLUMNAS']:$d['ID_D'];
    $c=1;$r=['TABLA','ID_D','ID_F'];//Buscar antes de guardar    
    for($i=0;$i<count($r);$i++){$c=(($d[$r[$i]]!=''||is_array($d[$r[$i]]))&&$c==1)?1:0;}
    if($c){$d['b']=1;$ot=$this->guardar($d);
    }else{$error="Faltan Datos";}
    return["d"=>$d,"oT_BORRAR"=>$ot,"error"=>$error];    
  }
  public function db($d=[]){
    if(count($d)>0 && DB_JMY_ADD_TABLA===true){      
      $cu=new mysqli(DB_HO,DB_US,DB_PA,DB_DB);
      if ($cu->connect_error) { $error ='Error de Conexión ('.$mysqli->connect_errno.')'. $mysqli->error;}else{        
        for($i=0;$i<count($d);$i++){
          $t=$d[$i];
          $t=trim(strtolower($t));if($t!=''){
              $n='CREATE TABLE IF NOT EXISTS `'.DB_PX.$t.'` (`ID` int(11) NOT NULL AUTO_INCREMENT,`ID_F` varchar(50) NOT NULL,`ID_D`  int(11) NOT NULL,`V` text NOT NULL,`ID_S` int(3) NOT NULL,`TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,PRIMARY KEY (`ID`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;';
              $tabla = $t;$tm[]=$n;
              if(!$cu->query($n)){$error[] = "Tabla existente-".$cu->error;$o[$t]=0;}else{$o[$t]=1;}
              $n = 'ALTER TABLE `'.DB_PX.$t.'` ADD UNIQUE KEY `ID` (`ID`), ADD KEY `ID_F` (`ID_F`), ADD KEY `ID_D` (`ID_D`);';
              $tm[]=$n;
              if(!$cu->query($n)){$error[] = "error-db-ss-".$cu->error;$o[$t]=0;}else{$o[$t]=1;}
            }}}}else{$error="Faltan Datos";}          
    return["o"=>$o,"error"=>$error];
  }
  public function ver($d=[]){    
    $d['ID_F']=($d['ID']!='')?$d['ID']:$d['ID_F'];
    $d['COL']=($d['COLUMNAS']!='')?$d['COLUMNAS']:$d['COL'];
    $d['A_D']=($d['AGRGAR_COLUMNAS']!='')?$d['AGRGAR_COLUMNAS']:$d['A_D'];
    $d['ID_S']=($d['ESTADO']!='')?$d['ESTADO']:$d['ID_S'];
    $d['LIKE_V']=($d['BUSQUEDA']!='')?$d['BUSQUEDA']:$d['LIKE_V'];
    $d['V']=($d['VALOR']!='')?$d['VALOR']:$d['V'];
    $w='';$wa=0;$s=['ID_F','ID_D','V'];$pr=$d["TABLA"];$d['ID_S']=($d['ID_S']!='')? $d['ID_S']:1;
    if(count($d['COL'])>0){
      $tmp = $this->col($d['COL'],0,"NAME","Error al solcitar columnas");
      $d['ID_D']=$tmp['o']['ik'];}
    for($i=0;$i<count($s);$i++){
      if(is_array($d[$s[$i]])){
        if($wa==1){$w.=' AND ';}else{$wa=1;}
        $w.=" ".$s[$i]." IN ('".implode("','",$d[$s[$i]])."') ";}elseif($d[$s[$i]]!=''){
      if($wa==1){$w.=' AND ';}else{$wa=1;}
      $w.=" ".$s[$i]." = '".$d[$s[$i]]."' ";}   
  }  
    if($wa==1){$w .= ' AND ';}else{ $wa=1;}
    $w.=" ID_S='".$d['ID_S']."' ";  
    if(is_array($d['LIKE_V'])){$wo=0;
      $op=($d['LIKE_V_OPER']!='')?trim($d['LIKE_V_OPER']):'OR';
      if($wa==1){$w .=' AND ';}else{$wa=1;}
      $w .=" ( ";
      for($o=0;$o<count($d['LIKE_V']) ;$o++){            
        if($wo==1){$w .= ' '.$op.' ' ; }else{ $wo=1; }
        $w .= " V LIKE '%".$d['LIKE_V'][$o]."%' ";}
      $w .=" ) ";}
    $limit=($d["LIMIT"])?$d["LIMIT"]:'LIMIT 3000'; 
    $or=($d["ORDER"])?$d["ORDER"]:" ORDER BY ID DESC ";
    $ca=($d['SELECT']!='')?$d['SELECT']:'ID_F,ID_D,V ';
    $ss="SELECT ".$ca." FROM ".DB_PX.$pr." WHERE ".$w." ".$or." ".$limit." ";
    $cu=new mysqli(DB_HO,DB_US,DB_PA,DB_DB);
    if($cu->connect_error){$error='Error de Conexión ('.$mysqli->connect_errno.') '.$mysqli->connect_error;}else{$ot=[];  
        if(!is_array($d['COL']) && !count($d['COL'])>0) {
          if( !$rs = $cu->query($ss) ){$error = " error ss ".$cu->error;}else{
          while( $rw = $rs->fetch_assoc() ){ 
            $colKey[]=$rw['ID_D'];}}}
        $d['COL'] = (count($d['COL'])>0) ? $this->col($d['COL'],$d['A_D'],"NAME","Error al solcitar columnas")  : $this->col($colKey,$d['A_D'],"ID","Error al solcitar columnas");
        $tmpCol=$d['COL'];
        if(!$rs=$cu->query($ss)){$error = " error ver-ss-".$cu->error;}else{
          while($rw=$rs->fetch_assoc()){ 
            switch($d['SALIDA']):
              case"ID_F":if(!in_array($rw['ID_F'],$ot)){$ot[]=$rw['ID_F'];}break;
              case "CONTADOR":
              $tmp = ($this->isJson($rw['V'])) ? json_decode($rw['V'],1):[$rw['V']];
              for($i=0;$i<count($tmp);$i++){
                if(count($ot[$d["COL"]['o']['i'][$rw['ID_D']]])<1){
                $ot[$d["COL"]['o']['i'][$rw['ID_D']]]=[];}
                if(!in_array($tmp[$i],
                $ot[$d["COL"]['o']['i'][$rw['ID_D']]]))
                $ot[$d["COL"]['o']['i'][$rw['ID_D']]][]=$tmp[$i];}
              break;
              default:
              $idd=($d["COL"]['o']['i'][$rw['ID_D']]!='') ? $d["COL"]['o']['i'][$rw['ID_D']] : $rw['ID_D'];
              $ot[$rw['ID_F']][$idd]=$rw['V']; 
          endswitch;
          }
      $otK=(is_array($ot))?array_keys($ot):0;
      if($d['SALIDA']=='ARRAY'){ for($i=0;$i<count($otK);$i++){
        if(count($ot[$otK[$i]])>=1){
          $ot[$otK[$i]]['ID_F']=$otK[$i]; 
          $otFm[]=$ot[$otK[$i]];
          }
        } }
    }
    } 
    //return ["tmp"=>$tmp,"tmpCol"=>$tmpCol,"ss"=>$ss,"d"=>$d,"ot"=>$ot,"otKey"=>$otK,"d"=>$d];    
    return (!$d['FO']) ? ["ot"=>$ot,"otFm"=>$otFm,"otKey"=>$otK] : ["tmp"=>$tmp,"tmpCol"=>$tmpCol,"ss"=>$ss,"d"=>$d,"ot"=>$ot,"otKey"=>$otK,"otFm"=>$otFm,"d"=>$d];   
  }
  private function isJson($string) {
   json_decode($string);
   return (json_last_error() == JSON_ERROR_NONE);
  }
  private function col($d=[],$ad=DB_JMY_ADD_ID_D,$col="NAME",$error="no"){ // ->col(["NOMBRE","APELLIDO"])
    if(count($d)>0){
      $sa=0;$ss="SELECT * FROM cat_d WHERE ".$col." IN ('".implode("','",$d)."') LIMIT 1000; ";
      $cu=new mysqli(DB_HO,DB_US,DB_PA,DB_DB);
      if($cu->connect_error){$error='Error de Conexión ('.$mysqli->connect_errno.') '.$mysqli->connect_error;}else{
        while($sa<3){if(!$rs=$cu->query($ss)){$error="error-col-ss".$cu->error;}else{$ot=[];          
            while( $rw = $rs->fetch_assoc() ){  
              $w[]=$rw;
              $ot['i'][$rw['ID']] = $rw['NAME'];
              $ot['n'][$rw['NAME']] = $rw['ID'];}$error="Sin error";

            $ot['ik']=(is_array($ot['i']))?array_keys($ot['i']):false;
            $ot['nk']=(is_array($ot['n']))?array_keys($ot['n']):false;
            $sa=(count($d)==count($ot['nk']))?5:$sa;
            if($ad){ $fa=[];
              for($i=0;$i<count($d);$i++){if($ot['nk']==false){if(!in_array($d[$i],$ot['nk'])){$fa[]=$d[$i];}}}
              if(is_array($fa) && count($fa)>0){
                $ssI = "INSERT INTO `cat_d` (`NAME`) VALUES ('".implode("'),('",$fa)."')  ";
                if( !$rs = $cu->query($ssI) ){$error = " error ssI ".$cu->error;} 
              }}}$sa++;}}}
    return ["d"=>$d,"o"=>$ot,"error"=>$error,"ss"=>$ss,"w"=>$w,"fa"=>$fa];
  }
}