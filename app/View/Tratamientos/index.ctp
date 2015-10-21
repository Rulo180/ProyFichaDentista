<?php $this->extend('/Common/index'); ?>


<?php $this->start('column') ;?>
    <?php $this->assign('tit_col', 'Opciones:'); ?>
    <ul>    
        <li>
        <?php echo $this->Form->create('Paciente', array('action'=>'buscar'))  ?>
        <?php echo $this->Form->input("Buscar.campo", array('label' => false));?>
        </li>
        <li>
        <?php $options = array('1' => 'Nombre', '2' => 'Afiliado');?>
        <?php $attributes = array('value' => '1', 'separator' => '<br>', 'beetwen' => '...','legend' => false);?>
        <?php echo $this->Form->radio('Buscar.filtro', $options, $attributes); ?>
        </li>
        <li>
        <?php echo $this->Form->end('Buscar');?>
        </li>
        <li><?php echo $this->Html->link('Agregar Tratamiento', array('controller' => 'Tratamientos', 'action'=>'add', $id_ficha, 1));?></li>
        <li><?php echo $this->Html->link('Agregar Múltiples Trat.', array('controller' => 'Tratamientos', 'action'=>'add', $id_ficha, 3));?></li>
        
    </ul> 
<?php $this->end(); ?>

<?php $this->assign('title', 'Lista de Tratamientos:'); ?>

<table>
    <tr>
        <th><?php echo $this->Paginator->sort('id_tratamiento', 'ID:');?></th>
        <th><?php echo $this->Paginator->sort('ficha_id', 'Ficha:');?></th>        
        <th><?php echo $this->Paginator->sort('prestacion_id', 'Prestación:');?></th>
        <th><?php echo $this->Paginator->sort('obra_id', 'Obra Social:');?></th>
        <th>Acciones</th>
    </tr>
    
    <?php foreach($tratamientos as $tratamiento): ?>
        <tr>
            <td><?php echo $tratamiento['Tratamiento']['id_tratamiento']; ?></td>
            <td><?php echo $tratamiento['Tratamiento']['ficha_id']; ?></td>
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