<ul>
    <li>Nombre: <?php echo $data['datos']['nombre']; ?></li>
    <li>marca: <?php echo $data['datos']['marca']; ?></li>
    <li><a href="<?php $this->url_inicio(); ?>/citas/editar_proveedores/<?php echo $data['id']; ?>">Editar</a>
</ul>