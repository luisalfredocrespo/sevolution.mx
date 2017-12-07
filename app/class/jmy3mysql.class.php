<?php
class JMY3MySQL {
  public function guardar($d=[]){
    $c=1;$r=['TABLA'];//Buscar antes de guardar
    for($i=0;$i<count($r);$i++){ $c= ( ($d[$r[$i]]!='' || is_array($d[$r[$i]]))&&$c==1)?1:0;}
    if($c){$g=$d["GUARDAR"];
      $colKey = (is_array($g)) ? array_keys($g):$d['ID_D'];
      $col = $this->col($colKey,$d['A_D']);
      $tm='';$fa=[];$ac=[];
      $IDF=($d['ID_F']!='')?$d['ID_F']:uniqid("j");
      $IDFS=$IDF;
      for($i=0;$i<count($colKey);$i++){$tm.='';$ID_D[] = $col['o']['n'][$colKey[$i]]; }
      $ver =$this->ver(["TABLA"=>$d["TABLA"],"ID_D"=>$ID_D,"ID_F"=>$IDF]);
      $tm=$ver['ot'][$IDF[0]];
      $tmkey=(is_array($tm))?array_keys($tm):[];
      $col=$this->col($colKey);
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
            $va[]="('".$IDF[$ib]."','".$fa[$i]['I']."','".$fa[$i]['V']."',1)";
          $ssI[$ib] = "INSERT INTO `".$d["TABLA"]."` (`ID_F`, `ID_D`, `V`, `ID_S`) 
           VALUES ".implode(',',$va)." "; }         
           if( !$rs = $cu->query($ssI[$ib]) ){$error = " error ss ".$cu->error;
           $ac[]=$va;}}}
        if(count($ac)>0){for($i=0;$i<count($ac);$i++){
            for($ib=0;$ib<count($IDF);$ib++){
          $ssU[$ib] [$i]=($d['b'])? "UPDATE ".$d["TABLA"]." SET ID_S = '0' WHERE ID_D = '".$ac[$i]["I"]."' AND ID_F = '".$IDF[$ib]."' AND ID_S = '1' " : "UPDATE ".$d["TABLA"]." SET V = '".$ac[$i]["V"]."' WHERE ID_D = '".$ac[$i]["I"]."' AND ID_F = '".$IDF[$ib]."' AND ID_S = '1' ";  
        if( !$rs = $cu->query($ssU[$ib] [$i]) ){$error = "error-g-ssU".$ib.'-'.$cu->error; $ssU[$ib] [$i] =$cu->error; }}}}}
    }else{$error="Faltan Datos";}
    return ["ver"=>$ver,         
        "IDF"=>$IDFS, 
        "ssI"=>$ssI, 
        "ssU"=>$ssU, 
        //"ac"=>$ac, 
        //"fa"=>$fa, 
        //"ver"=>$ver, 
        "tm"=>$tm, 
        "colKey"=> $colKey,   
        "col"=> $col,   
        "comparando"=> $comparando,   
        ]; 
  }   
  public function borrar($d=[]){
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
          $t=ereg_replace("[^A-Za-z0-9]", "",ucwords($d[$i]));
          $n='CREATE TABLE IF NOT EXISTS `'.$t.'` (`ID` int(11) NOT NULL AUTO_INCREMENT,`ID_F` varchar(50) NOT NULL,`ID_D` int(11) NOT NULL,`V` text NOT NULL,`ID_S` int(3) NOT NULL,`TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,PRIMARY KEY (`ID`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;';
          $tabla = $t;$tm[]=$n;
          if(!$cu->query($n)){$error[] = "Tabla existente-".$cu->error;$o[$t]=0;}else{$o[$t]=1;}
          $n = 'ALTER TABLE `'.$t.'` ADD UNIQUE KEY `ID` (`ID`), ADD KEY `ID_F` (`ID_F`), ADD KEY `ID_D` (`ID_D`);';
          $tm[]=$n;
          if(!$cu->query($n)){$error[] = "error-db-ss-".$cu->error;$o[$t]=0;}else{$o[$t]=1;}
        }}}else{$error="Faltan Datos";}
    return["o"=>$o,"error"=>$error];
  }
  public function ver($d=[]){
    $w='';$wa=0;$s=['ID_F','ID_D','V','ID_S'];$pr=$d["TABLA"];$d['ID_S']=($d['ID_S']!='')? $d['ID_S']:1;
    if(count($d['COL'])>0){
      $tmp = $this->col($d['COL'],0,"NAME","Error al solcitar columnas");
      $d['ID_D']=$tmp['o']['ik'];}
    for($i=0;$i<count($s);$i++){
    if(is_array($d[$s[$i]])){
      if($wa==1){$w.=' AND ';}else{$wa=1;}
      $w.=" ".$s[$i]." IN ('".implode("','",$d[$s[$i]])."') ";}}  
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
    $ss="SELECT ".$ca." FROM ".$pr." WHERE ".$w." ".$or." ".$limit." ";
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
            }}$otK=(is_array($ot))?array_keys($ot):0;
          }
    //return ["tmp"=>$tmp,"tmpCol"=>$tmpCol,"ss"=>$ss,"d"=>$d,"ot"=>$ot,"otKey"=>$otK];    
    return ["ot"=>$ot,"otKey"=>$otK];    
  }
  private function isJson($string) {
   json_decode($string);
   return (json_last_error() == JSON_ERROR_NONE);
  }
  private function col($d=[],$ad=0,$col="NAME",$error="no"){ // ->col(["NOMBRE","APELLIDO"])
    if(count($d)>0){
      $sa=0;$ss="SELECT * FROM CAT_D WHERE ".$col." IN ('".implode("','",$d)."') LIMIT 1000; ";
      $cu=new mysqli(DB_HO,DB_US,DB_PA,DB_DB);
      if($cu->connect_error){$error='Error de Conexión ('.$mysqli->connect_errno.') '.$mysqli->connect_error;}else{
        while($sa<3){if(!$rs=$cu->query($ss)){$error="error-col-ss".$cu->error;}else{$ot=[];          
            while( $rw = $rs->fetch_assoc() ){  
              $ot['i'][$rw['ID']] = $rw['NAME'];
              $ot['n'][$rw['NAME']] = $rw['ID'];}$error="Sin error";
            $ot['ik']=(is_array($ot['i']))?array_keys($ot['i']):false;
            $ot['nk']=(is_array($ot['n']))?array_keys($ot['n']):false;
            $sa=(count($d)==count($ot['nk']))?5:$sa;
            if($ad){ $fa=[];
              for($i=0;$i<count($d);$i++){
                if(!in_array($d[$i],$ot['nk'])){$fa[]=$d[$i];}}
              if(is_array($fa) && count($fa)>0){
                $ssI = "INSERT INTO `CAT_D` (`NAME`) VALUES ('".implode("'),('",$fa)."')  ";
                if( !$rs = $cu->query($ssI) ){$error = " error ssI ".$cu->error;} 
              }}}$sa++;}}}
    return ["d"=>$d,"o"=>$ot,"error"=>$error];
  }
}