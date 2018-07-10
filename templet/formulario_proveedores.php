<div class="row">
<ul class="menu">
        <li class="current_page_item menu-item-simple-parent">
            <a href="<?php $this->url_inicio(); ?>p/lista_proveedores">Lista</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-6 col-offset-md-3" id="alerta">

    </div>
</div>
<div class="row">
    <div class="col-md-6 col-offset-md-3">
        <input type="text" id="nombre" placeholder="Nombre" >
        <input type="text" id="marca" placeholder="marca" >
        <input type="text" id="direccion" placeholder="direccion" value="<?php echo $data['datos']['direccion']; ?>" >
        <input type="text" id="telefono" placeholder="telefono" value="<?php echo $data['datos']['telefono']; ?>" >
        <button id="guardar">Guardar</button>
    </div>
</div>