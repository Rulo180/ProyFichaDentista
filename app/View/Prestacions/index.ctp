<?php $this->extend('/Common/index'); ?>

<?php $this->start('column') ;?>
    <?php $this->assign('tit_col', 'Opciones:'); ?>
    <ul>    
        <li><?php echo $this->Html->link('Buscar', array('controller' => 'Pacientes', 'action'=>'buscar', "Valles"));?></li>

        <li><?php echo $this->Html->link('Agregar Prestacion', array('action'=>'add' ))?></li>
        
    </ul> 
<?php $this->end(); ?>

<?php $this->assign('title', 'Lista de Prestaciones'); ?>

<table>
    <tr>
        <th><?php echo $this->Paginator->sort('id_prestacion', 'ID');?></th>
        <th><?php echo $this->Paginator->sort('nombre_prestacion', 'Nombre');?></th>
        <th><?php echo $this->Paginator->sort('codigo_prestacion', 'Código');?></th>
        <th><?php echo $this->Paginator->sort('descripcion_prestacion', 'Descripcion');?></th>
        <th>Acciones</th>
    </tr>
    
    <?php foreach($prestaciones as $prestacion): ?>
        <tr>
            <td><?php echo $prestacion['Prestacion']['id_prestacion']; ?></td>
            <td><?php echo $prestacion['Prestacion']['nombre_prestacion']; ?></td>
            <td><?php echo $prestacion['Prestacion']['codigo_prestacion']; ?></td>
            <td><?php echo $prestacion['Prestacion']['descripcion_prestacion']; ?></td>
            <td>
                <?php echo $this->Html->link('Editar', array('action'=>'edit',$prestacion['Prestacion']['id_prestacion'])); ?>/
                <?php echo $this->Form->postLink('Borrar', array('action'=>'delete',$prestacion['Prestacion']['id_prestacion']), array('confirm' => 'Esta seguro?')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php unset($prestacion); ?>
</table>

<?php $this->start('paginate'); ?>
<?php  
    // Shows the page numbers
    echo $this->Paginator->numbers(array('first' => 2, 'last' => 2));

    // Shows the next and previous links
    echo $this->Paginator->prev(
    '« Previous',
    null,
    null,
    array('class' => 'disabled'));
    echo $this->Paginator->next(
    'Next »',
    null,
    null,
    array('class' => 'disabled'));

    // prints X of Y, where X is current page and Y is number of pages
    echo $this->Paginator->counter('{:page} de {:pages}'); 
?>

 <?php $this->end(); ?>