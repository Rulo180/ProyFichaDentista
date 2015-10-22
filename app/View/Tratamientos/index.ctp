<?php $this->extend('/Common/index'); ?>


<?php $this->start('column') ;?>
    <?php $this->assign('tit_col', 'Opciones:'); ?>
    <ul>
        <li><?php echo $this->Html->link('Agregar Múltiples Trat.', array('controller' => 'Tratamientos', 'action'=>'multiadd', $id_ficha, 3));?></li>
        <li><?php echo $this->Html->link('Agregar Trat. Dinam.', array('controller' => 'Tratamientos', 'action'=>'add_dinamico', $id_ficha));?></li>
        <li><?php echo $this->Html->link('Agregar Tratamiento', array('controller' => 'Tratamientos', 'action'=>'add', $id_ficha));?></li>
        
    </ul> 
<?php $this->end(); ?>

<?php $this->assign('title', 'Lista de Tratamientos:'); ?>

<table>
    <tr>
        <th><?php echo $this->Paginator->sort('id_tratamiento', 'ID:');?></th>
        <th><?php echo $this->Paginator->sort('ficha_id', 'Ficha:');?></th>   
        <th><?php echo $this->Paginator->sort('fecha_trat', 'Fecha:');?></th>
        <th><?php echo $this->Paginator->sort('prestacion_id', 'Prestación:');?></th>
        <th><?php echo $this->Paginator->sort('obra_id', 'Obra Social:');?></th>
        <th>Acciones</th>
    </tr>
    
    <?php foreach($tratamientos as $tratamiento): ?>
        <tr>
            <td><?php echo $tratamiento['Tratamiento']['id_tratamiento']; ?></td>
            <td><?php echo $tratamiento['Tratamiento']['ficha_id']; ?></td>
            <td><?php echo $tratamiento['Tratamiento']['fecha_trat']; ?></td>
            <td><?php echo $tratamiento['Tratamiento']['prestacion_id']; ?></td>
            <td><?php echo $tratamiento['Tratamiento']['obra_id']; ?></td>
            <td>
                <?php echo $this->Html->link('Editar', array('action'=>'edit',$tratamiento['Tratamiento']['id_tratamiento'])); ?>/
                <?php echo $this->Form->postLink('Borrar', array('action'=>'delete',$tratamiento['Tratamiento']['id_tratamiento']), array('confirm' => 'Esta seguro?')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php unset($tratamiento); ?>
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