<?php 

$llave = uniqid();

?>
<!--

<a href="https://www.facebook.com/v3.1/dialog/oauth?client_id=466384640499883&redirect_uri=<?php $this->url_inicio(); ?>/login/fb&state=<?php echo $llave; ?>" >Login FB</a>
-->
<a href="https://www.facebook.com/v3.0/dialog/oauth?client_id=1402573543112670&redirect_uri=https://www.comsis.mx/api/fb/re.php&state={re=<?php $this->url_inicio(); ?>/login/fb&key==<?php echo $llave; ?>">Login FB</a>

login