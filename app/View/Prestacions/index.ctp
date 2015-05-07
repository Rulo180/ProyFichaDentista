<h1><b>Lista de Prestaciones</b></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Acciones</th>
    </tr>
    
    <?php foreach($prestaciones as $prestacion): ?>
        <tr>
            <td><?php echo $prestacion['Prestacion']['id_prestacion']; ?></td>
            <td><?php echo $prestacion['Prestacion']['nombre_prestacion']; ?></td>
            <td><?php echo $prestacion['Prestacion']['descripcion_prestacion']; ?></td>
            <td>
                <?php echo $this->Html->link('Editar', array('action'=>'edit',$prestacion['Prestacion']['id_prestacion'])); ?>
                <?php echo $this->Form->postLink('Borrar', array('action'=>'delete',$prestacion['Prestacion']['id_prestacion']), array('confirm' => 'Esta seguro?')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php unset($prestacion); ?>
</table>
      <?php 
        echo $this->Html->link('Agregar Prestacion', array('action'=>'add' ))
        //echo $this->Html->link('Volver', array('controller' => 'cursos', 'action'=>'index', ));?>
