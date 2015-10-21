<?php $this->extend('/Common/index'); ?>

<?php $this->start('column') ;?>
    <?php $this->assign('tit_col', 'Opciones:'); ?>
    <ul>
        <li><?php echo $this->Html->link('Agregar Diente', array('action'=>'add' ))?></li>  
    </ul> 
<?php $this->end(); ?>

<?php $this->assign('title', 'Lista de Dientes'); ?>

<table>
    <tr>
        <th><?php echo $this->Paginator->sort('id_diente', 'ID');?></th>
        <th><?php echo $this->Paginator->sort('codigo_diente', 'Código');?></th>
        <th><?php echo $this->Paginator->sort('tipo_diente', 'Tipo');?></th>
        <th>Acciones</th>
    </tr>
    
    <?php foreach($dientes as $diente): ?>
        <tr>
            <td><?php echo $diente['Diente']['id_diente']; ?></td>
            <td><?php echo $diente['Diente']['cod_diente']; ?></td>
            <td><?php echo $diente['Diente']['tipo_diente']; ?></td>
            <td>
                <?php echo $this->Html->link('Editar', array('action'=>'edit',$diente['Diente']['id_diente'])); ?>/
                <?php echo $this->Form->postLink('Borrar', array('action'=>'delete',$diente['Diente']['id_diente']), array('confirm' => 'Esta seguro?')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php unset($diente); ?>
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