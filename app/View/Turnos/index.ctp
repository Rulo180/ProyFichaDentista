<?php $this->extend('/Common/index');?>

<?php $this->start('column');?>
    <?php $this->assign('tit_col', 'Filtrar:'); ?>
    <ul>    
         <li><?php echo $this->Form->create('Turno', array('action'=>'buscar'));?>
                    <?php   echo $this->Form->input("Buscar.desde", array('label' => 'desde:', 'type' => 'date', 'dateFormat' => 'DMY', 'separator' => false));
                            //echo $this->Form->input('Buscar.desde', array('label' => 'desde'));?></li>
                <li><?php echo $this->Form->input("Buscar.hasta", array('label' => 'hasta:', 'type' => 'date', 'dateFormat' => 'YMD', 'separator' => false));
                            echo $this->Form->input('Buscar.hasta', array('label' => 'hasta:'));?></li>
                <li><?php echo $this->Form->end('Buscar'); ?></li>
        <li><?php echo $this->Html->link('Agregar Turno', array('controller' => 'Turnos', 'action'=>'add', ))?></li>
        
    </ul> 
<?php $this->end(); ?>

<?php $this->assign('title', 'Lista de Turnos'); ?>


<table>
    <tr>
        <th><?php echo $this->Paginator->sort('id_turno', 'ID');?></th>
        <th><?php echo $this->Paginator->sort('fecha_turno', 'Fecha');?></th>
        <th><?php echo $this->Paginator->sort('hora_turno', 'Hora');?></th>
        <th><?php echo $this->Paginator->sort('paciente_id', 'Paciente');?></th>
        <th><?php echo $this->Paginator->sort('observacion_turno', 'Observacion');?></th>
        <th>Acciones</th>
    </tr>
    
    <?php foreach($turnos as $turno): ?>
        <tr>
            <td><?php echo $turno['Turno']['id_turno']; ?></td>
            <td><?php echo $turno['Turno']['fecha_turno']; ?></td>
            <td><?php echo $turno['Turno']['hora_turno']; ?></td>
            <td><?php echo $turno['Paciente']['Nombre_Completo']; ?></td>
            <td><?php echo $turno['Turno']['observacion_turno']; ?></td>
            <td>
                <?php echo $this->Html->link('Editar', array('action'=>'edit',$turno['Turno']['id_turno'])); ?>/
                <?php echo $this->Form->postLink('Borrar', array('action'=>'delete',$turno['Turno']['id_turno']), array('confirm' => 'Esta seguro?')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php unset($turno); ?>
</table>

<?php $this->start('paginate'); ?>
<?php  
    // Shows the page numbers
    echo $this->Paginator->numbers(array('first' => 2, 'last' => 2));

    // Shows the next and previous links
    echo $this->Paginator->prev(
    '« Anterior',
    null,
    null,
    array('class' => 'disabled'));
    echo $this->Paginator->next(
    'Siguiente »',
    null,
    null,
    array('class' => 'disabled'));

    // prints X of Y, where X is current page and Y is number of pages
    echo $this->Paginator->counter('{:page} de {:pages}'); 
?>

 <?php $this->end(); ?>
      
      