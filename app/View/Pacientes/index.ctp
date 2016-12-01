<?php $this->extend('/Common/index'); ?>

<?php $this->assign('tit_col', 'Opciones:'); ?>

<?php $this->start('column') ;?>
    <ul>    
        <li>
        <?php echo $this->Form->create('Paciente', array('action'=>'buscar'))  ?>
        <?php echo $this->Form->input("Buscar.campo", array('label' => false));?>
        </li>
        <li>
        <?php $options = array('1' => 'Nombre', '2' => 'Afiliado', '3' => 'D.N.I.');?>
        <?php $attributes = array('value' => '1', 'separator' => '<br>', 'beetwen' => '...','legend' => false);?>
        <?php echo $this->Form->radio('Buscar.filtro', $options, $attributes); ?>
        </li>
        <li>
        <?php echo $this->Form->end('Buscar');?>
        </li>
        <li><?php echo $this->Html->link('Agregar Paciente', array('controller' => 'Pacientes', 'action'=>'add'));?></li>
        
    </ul> 
<?php $this->end(); ?>

<?php $this->assign('title', 'Lista de Pacientes'); ?>

<table>
    <tr>
        <th><?php echo $this->Paginator->sort('id_paciente', 'ID');?></th>
        <th><?php echo $this->Paginator->sort('Nombre_Completo', 'Nombre Completo');?></th>
        <th><?php echo $this->Paginator->sort('nro_afiliado', 'Afiliado:');?></th>
        <th><?php echo $this->Paginator->sort('dni_paciente', 'D.N.I.:');?></th>
        <th><?php echo $this->Paginator->sort('ObraSocial.nombre_obra', 'Obra Social:');?></th>
        <th>Acciones</th>
    </tr>
    
    <?php foreach($pacientes as $paciente): ?>
        <tr>
            <td><?php echo $paciente['Paciente']['id_paciente']; ?></td>
            <td><?php echo $this->Html->link($paciente['Paciente']['Nombre_Completo'], array('action'=>'view',$paciente['Paciente']['id_paciente'])); ?></td>
            <td><?php echo $paciente['Paciente']['nro_afiliado']; ?></td>
            <td><?php echo $paciente['Paciente']['dni_paciente']; ?></td>
            <td><?php echo $paciente['ObraSocial']['nombre_obra']; ?></td>
            
            <td>
                <?php echo $this->Html->link('Editar', array('action'=>'edit',$paciente['Paciente']['id_paciente'])); ?>/
                <?php echo $this->Form->postLink('Borrar', array('action'=>'delete',$paciente['Paciente']['id_paciente']), array('confirm' => 'Esta seguro?')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php unset($paciente); ?>
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