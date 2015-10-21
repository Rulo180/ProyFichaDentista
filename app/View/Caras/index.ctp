<?php $this->extend('/Common/index'); ?>

<?php $this->start('column') ;?>
    <?php $this->assign('tit_col', 'Opciones:'); ?>
    <ul>    
        <li><?php echo $this->Html->link('Agregar Cara', array('action'=>'add' ))?></li>   
    </ul> 
<?php $this->end(); ?>

<?php $this->assign('title', 'Lista de Caras'); ?>

<table>
    <tr>
        <th><?php echo $this->Paginator->sort('id_cara', 'ID');?></th>
        <th><?php echo $this->Paginator->sort('cod_cara', 'Código');?></th>
        <th><?php echo $this->Paginator->sort('nombre_cara', 'Tipo');?></th>
        <th>Acciones</th>
    </tr>
    
    <?php foreach($caras as $cara): ?>
        <tr>
            <td><?php echo $cara['Cara']['id_cara']; ?></td>
            <td><?php echo $cara['Cara']['cod_cara']; ?></td>
            <td><?php echo $cara['Cara']['nombre_cara']; ?></td>
            <td>
                <?php echo $this->Html->link('Editar', array('action'=>'edit',$cara['Cara']['id_cara'])); ?>/
                <?php echo $this->Form->postLink('Borrar', array('action'=>'delete',$cara['Cara']['id_cara']), array('confirm' => 'Esta seguro?')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php unset($cara); ?>
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