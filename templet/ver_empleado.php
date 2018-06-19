<ul>
    <li>Nombre: <?php echo $data['datos']['nombre']; ?></li>
    <li>Puesto: <?php echo $data['datos']['puesto']; ?></li>
    <li><a href="<?php $this->url_inicio(); ?>/citas/editar_empleado/<?php echo $data['id']; ?>">Editar</a>
</ul>