<div class="row">
    <div class="col-md-4 col-offset-md-3" id="alerta">

    </div>
</div>
<div class="row">
    <div class="col-md-4 col-offset-md-3">
        <input type="hidden" id="ide" value="<?php echo $data['id']; ?>" >
        <input type="text" id="nombre" placeholder="Nombre" value="<?php echo $data['datos']['nombre']; ?>" >
        <input type="text" id="puesto" placeholder="Puesto" value="<?php echo $data['datos']['puesto']; ?>" >
        <input type="text" id="direccion" placeholder="direccion" value="<?php echo $data['datos']['direccion']; ?>" >
        <input type="text" id="telefono" placeholder="telefono" value="<?php echo $data['datos']['telefono']; ?>" >
        <input type="text" id="fecha_de_nacimiento" placeholder="fecha_de_nacimiento" value="<?php echo $data['datos']['fecha_de_nacimiento']; ?>" >
        <input type="text" id="horario_matutino_inicio" placeholder="horario_matutino_inicio" value="<?php echo $data['datos']['horario_matutino_inicio']; ?>" >
        <input type="text" id="horario_matutino_final" placeholder="horario_matutino_final" value="<?php echo $data['datos']['horario_matutino_final']; ?>" >
        <input type="text" id="horario_vezpertino_inicio" placeholder="horario_vezpertino_inicio" value="<?php echo $data['datos']['horario_matutino_inicio']; ?>" >
        <input type="text" id="horario_vezpertino_final" placeholder="horario_vezpertino_final" value="<?php echo $data['datos']['horario_vezpertino_final']; ?>" >
        <button id="actualizar">Actualizar</button>
     
    </div><div class="col-md-4 col-offset-md-3" ></div> 
</div>
