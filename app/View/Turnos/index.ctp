<?php
$this->extend('/Common/index');

$this->start('column');?>
    <ul>    
        <li>
        <?php echo $this->Html->link('Turnos para Hoy', array('controller' => 'Turnos', 'action'=>'filtrarDia', date('D-M-Y'))) ;?>
        </li>
        <li><?php echo $this->Html->link('Agregar Turno', array('controller' => 'Turnos', 'action'=>'add', ))?></li>
        
    </ul> 
<?php $this->end(); ?>

<?php $this->assign('title', 'Lista de Turnos'); ?>


<table>
    <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Paciente</th>
        <th>Observacion</th>
        <th>Acciones</th>
    </tr>
    
    <?php foreach($turnos as $turno): ?>
        <tr>
            <td><?php echo $turno['Turno']['id_turno']; ?></td>
            <td><?php echo $turno['Turno']['fecha_turno']; ?></td>
            <td><?php echo $turno['Turno']['hora_turno']; ?></td>
            <td><?php echo $turno['Turno']['paciente_id']; ?></td>
            <td><?php echo $turno['Turno']['observacion_turno']; ?></td>
            <td>
                <?php echo $this->Html->link('Editar', array('action'=>'edit',$turno['Turno']['id_turno'])); ?>
                <?php echo $this->Form->postLink('Borrar', array('action'=>'delete',$turno['Turno']['id_turno']), array('confirm' => 'Esta seguro?')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php unset($turno); ?>
</table>
      
      