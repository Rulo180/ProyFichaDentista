<h1><b>Lista de Pacientes</b></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Apellido y Nombre</th>
        <th>Fecha de Nac</th>
        <th>Profesión</th>
        <th>Teléfono</th>
        <th>Domicilio</th>
        <th>Localidad</th>
        <th>Acciones</th>
    </tr>
    
    <?php foreach($pacientes as $paciente): ?>
        <tr>
            <td><?php echo $paciente['Paciente']['id_paciente']; ?></td>
            <td><?php echo $paciente['Paciente']['Nombre_Completo']; ?></td>
            <td><?php echo $paciente['Paciente']['fecha_nac']; ?></td>
            <td><?php echo $paciente['Paciente']['profesion']; ?></td>
            <td><?php echo $paciente['Paciente']['telefono']; ?></td>
            <td><?php echo $paciente['Paciente']['domicilio']; ?></td>
            <td><?php echo $paciente['Paciente']['localidad']; ?></td>
            <td>
                <?php echo $this->Html->link('Editar', array('action'=>'edit',$paciente['Paciente']['id_paciente'])); ?>
                <?php echo $this->Form->postLink('Borrar', array('action'=>'delete',$paciente['Paciente']['id_paciente']), array('confirm' => 'Esta seguro?')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php unset($paciente); ?>
</table>
      <?php 
        echo $this->Html->link('Agregar Paciente', array('controller' => 'Pacientes', 'action'=>'add', ))
        //echo $this->Html->link('Volver', array('controller' => 'cursos', 'action'=>'index', ));?>
