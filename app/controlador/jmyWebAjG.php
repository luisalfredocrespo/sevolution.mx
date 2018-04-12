<?php 
$out=["error"=>"datos insuficientes"];
if($_POST['pagina']!=''&&$_POST['id']!=''&&$_POST['valor']!='' && $_SESSION['JMY3WEB'][DOY]){
	$out=$jmyWeb->guardar(['pagina'=>$_POST['pagina'],'id'=>$_POST['id'],'valor'=>$_POST['valor'],'tabla'=>$_POST['tabla'],'opciones'=>$_POST['opciones']]);
}elseif($_POST['pagina']!=''){
	$out = ['out'=>[]];
}
$out['POST']=$_POST;
echo json_encode($out);
?>
