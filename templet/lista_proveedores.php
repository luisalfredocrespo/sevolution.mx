<ul>    
    <?php 
    //$this ->pre(['p'=>$data,'t'=>'TITULO_ARRAY']);
    $lista = $data['lista']['otFm'];
    for ($i=0; $i < count($lista) ; $i++) { 
       echo '<li><a href="'.$this->url_inicio(["return"=>true]).'proveedores/editar_proveedores/'.$lista[$i]['ID_F'].'"> '.$lista[$i]['nombre'].' - '.$lista[$i]['marca'].'</a> </li>';
    }?>
</ul>