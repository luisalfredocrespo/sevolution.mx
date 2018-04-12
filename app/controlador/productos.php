<?php 
$jmyconect = new HiJMY();
$jmy = new JMY3MySQL();
$jmyWeb = new JMY3WEB();
$jmyWeb->cargar(["pagina"=>"productos_2"]);
$jmyWeb ->cargar_vista(["url"=>"productos_2.php"]);
?>