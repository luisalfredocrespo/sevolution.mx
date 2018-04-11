<?php
if($_POST['entrar']!=''){
	if($_POST['pass']=='papapodrida' && $_POST['usuario']=='social'){
		$_SESSION['JMY3WEB'][DOY]=true;
	}else{
		$_SESSION['JMY3WEB'][DOY]=false;
		echo 'Contraseña o usuario no válido';
	}
} 
if($_GET['peticion']=='salir'){
	$_SESSION['JMY3WEB'][DOY]=false;
	echo 'session cerrada';
}
if(!$_SESSION['JMY3WEB'][DOY]){
	echo '
	<form action="'.RUTA_ACTUAL.'entrar" method="post">
		<input type="text" name="usuario" placeholder="Usuario">
		<input type="password" name="pass" placeholder="Contraseña">
		<input type="submit" name="entrar" value="Entrar">
	</form>
	';
}else{
	echo 'Actualmente logeado <a href="'.RUTA_ACTUAL.'">Editar web</a> <a href="'.RUTA_ACTUAL.'entrar/salir">Salir</a>';
}
?>