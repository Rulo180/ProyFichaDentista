<?php $this->extend('/Common/index'); ?>


<?php $this->start('column') ;?>
    <?php $this->assign('tit_col', 'Opciones:'); ?>
    <ul>    
        <li>
        <?php echo $this->Form->create('Paciente')  ?>
        <?php echo $this->Form->input("busqueda", array('label' => 'Paciente:'));?>
        <?php echo $this->Form->end('Buscar', array('controller' => 'Pacientes', 'action'=>'buscar'));?>
        </li>
        <li><?php echo $this->Html->link('Buscar', array('controller' => 'Pacientes', 'action'=>'buscar', "Valles"));?></li>

        <li><?php echo $this->Html->link('Agregar Paciente', array('controller' => 'Pacientes', 'action'=>'add'));?></li>
        
    </ul> 
<?php $this->end(); ?>

<?php $this->assign('title', 'Lista de Pacientes'); ?>

<table>
    <tr>
        <th><?php echo $this->Paginator->sort('id_paciente', 'ID');?></th>
        <th><?php echo $this->Paginator->sort('Nombre_Completo', 'Nombre Completo');?></th>
        <th><?php echo $this->Paginator->sort('nro_afiliado', 'Afiliado:');?></th>
        <th><?php echo $this->Paginator->sort('fecha_nac', 'Fecha de Nac.:');?></th>
        <th><?php echo $this->Paginator->sort('dni_paciente', 'D.N.I.:');?></th>
        <th><?php echo $this->Paginator->sort('profesion', 'Profesión:');?></th>
        <th><?php echo $this->Paginator->sort('telefono', 'Teléfono:');?></th>
        <th><?php echo $this->Paginator->sort('domicilio', 'Domicilio:');?></th>
        <th><?php echo $this->Paginator->sort('localidad', 'Localidad:');?></th>
        <th><?php echo $this->Paginator->sort('ObraSocial.nombre_obra', 'Obra Social:');?></th>
        <th>Acciones</th>
    </tr>
    
    <?php foreach($pacientes as $paciente): ?>
        <tr>
            <td><?php echo $paciente['Paciente']['id_paciente']; ?></td>
            <td><?php echo $paciente['Paciente']['Nombre_Completo']; ?></td>
            <td><?php echo $paciente['Paciente']['nro_afiliado']; ?></td>
            <td><?php echo $paciente['Paciente']['fecha_nac']; ?></td>
            <td><?php echo $paciente['Paciente']['dni_paciente']; ?></td>
            <td><?php echo $paciente['Paciente']['profesion']; ?></td>
            <td><?php echo $paciente['Paciente']['telefono']; ?></td>
            <td><?php echo $paciente['Paciente']['domicilio']; ?></td>
            <td><?php echo $paciente['Paciente']['localidad']; ?></td>
            <td><?php echo $paciente['Paciente']['obra_social_id']; ?></td>
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