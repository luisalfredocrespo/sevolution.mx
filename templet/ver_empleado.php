<ul>
    <li>Nombre: <?php echo $data['datos']['nombre']; ?></li>
    <li>Puesto: <?php echo $data['datos']['puesto']; ?></li>
    <li> direccion<?php echo $data['datos']['direccion']; ?></li>
        <li> telefono:<?php echo $data['datos']['telefono']; ?></li>
        <li> fecha_de_nacimiento.<?php echo $data['datos']['fecha_de_nacimiento']; ?></li>
        <li> horario_matutino_inicio:<?php echo $data['datos']['horario_matutino_inicio']; ?></li>
        <li> horario_matutino_final:<?php echo $data['datos']['horario_matutino_final']; ?></li>
        <li> horario_vezpertino_inicio:<?php echo $data['datos']['horario_matutino_inicio']; ?></li>
        <li> horario_vezpertino_final:<?php echo $data['datos']['horario_vezpertino_final']; ?></li>
    <li>><a href="<?php $this->url_inicio(); ?>/citas/editar_empleado/<?php echo $data['id']; ?>">Editar</a>
</ul>