<h1><b>Lista de Obras Sociales</b></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Código</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Email</th>
        <th>C.U.I.T.</th>
        <th>Acciones</th>
    </tr>
    
    <?php foreach($obras as $obra): ?>
        <tr>
            <td><?php echo $obra['ObraSocial']['id_obra']; ?></td>
            <td><?php echo $obra['ObraSocial']['nombre_obra']; ?></td>
            <td><?php echo $obra['ObraSocial']['codigo_obra']; ?></td>
            <td><?php echo $obra['ObraSocial']['telefono_obra']; ?></td>
            <td><?php echo $obra['ObraSocial']['direccion_obra']; ?></td>
            <td><?php echo $obra['ObraSocial']['email_obra']; ?></td>
            <td><?php echo $obra['ObraSocial']['CUIT_obra']; ?></td>
            <td>
                <?php echo $this->Html->link('Editar', array('action'=>'edit',$obra['ObraSocial']['id_obra'])); ?>
                <?php echo $this->Form->postLink('Borrar', array('action'=>'delete',$obra['ObraSocial']['id_obra']), array('confirm' => 'Esta seguro?')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php unset($obra); ?>
</table>
      <?php 
        echo $this->Html->link('Agregar Obra Social', array('controller' => 'ObraSocials', 'action'=>'add', ))
        //echo $this->Html->link('Volver', array('controller' => 'cursos', 'action'=>'index', ));?>
