<?php
$this->extend('/Common/index');



$this->start('column');?>
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
        <th>ID</th>
        <th>Apellido y Nombre</th>
        <th>Afiliado</th>
        <th>Fecha de Nac</th>
        <th>D.N.I.</th>
        <th>Profesión</th>
        <th>Teléfono</th>
        <th>Domicilio</th>
        <th>Localidad</th>
        <th>Obra Social</th>
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
                <?php echo $this->Html->link('Editar', array('action'=>'edit',$paciente['Paciente']['id_paciente'])); ?>
                <?php echo $this->Form->postLink('Borrar', array('action'=>'delete',$paciente['Paciente']['id_paciente']), array('confirm' => 'Esta seguro?')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php unset($paciente); ?>
</table>
        
