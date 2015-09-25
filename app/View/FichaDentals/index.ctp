<?php $this->extend('/Common/index'); ?>


<?php $this->start('column') ;?>
    <?php $this->assign('tit_col', 'Opciones:'); ?>
    <ul>    
        <li>
        <?php echo $this->Form->create('FichaDentals', array('action'=>'buscar'))  ?>
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
        <li><?php echo $this->Html->link('Agregar Ficha', array('controller' => 'FichaDentals', 'action'=>'add'));?></li>
        
    </ul> 
<?php $this->end(); ?>

<?php $this->assign('title', 'Lista de Fichas Dentales:'); ?>

<table>
    <tr>
        <th><?php echo $this->Paginator->sort('id_ficha', 'ID:');?></th>
        <th><?php echo $this->Paginator->sort('paciente_id', 'Paciente:');?></th>
        <th><?php echo $this->Paginator->sort('fecha_ficha', 'Fecha:');?></th>
        <th><?php echo $this->Paginator->sort('observacion_ficha', 'Observaciones:');?></th>
        <th>Acciones</th>
    </tr>
    
    <?php foreach($fichas as $ficha): ?>
        <tr>
            <td><?php echo $ficha['FichaDental']['id_ficha']; ?></td>
            <td><?php echo $this->Html->link($ficha['FichaDental']['paciente_id'], array('controller' => 'Tratamientos', 'action'=>'index',$ficha['FichaDental']['id_ficha'])); ?></td>
            <td><?php echo $ficha['FichaDental']['fecha_ficha']; ?></td>
            <td><?php echo $ficha['FichaDental']['observacion_ficha']; ?></td>
            <td>
                <?php echo $this->Html->link('Editar', array('action'=>'edit',$ficha['FichaDental']['id_ficha'])); ?>/
                <?php echo $this->Form->postLink('Borrar', array('action'=>'delete',$ficha['FichaDental']['id_ficha']), array('confirm' => 'Esta seguro?')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php unset($ficha); ?>
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