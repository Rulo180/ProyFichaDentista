

<h1> Obra Social: <i><?php echo $obra['ObraSocial']['nombre_obra'];?></i> </h1>

<h3>Lista de Pacientes:</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre Completo:</th>
        <th>Afiliado:</th>
        <th>D.N.I.:</th>
        <th>Acciones</th>
    </tr>
    
    <?php foreach($pacientes as $paciente): ?>
        <tr>
            <td><?php echo $paciente['Paciente']['id_paciente']; ?></td>
            <td><?php echo $this->Html->link($paciente['Paciente']['Nombre_Completo'], array('controller' => 'Pacientes', 'action'=>'view',$paciente['Paciente']['id_paciente'])); ?></td>
            <td><?php echo $paciente['Paciente']['nro_afiliado']; ?></td>
            <td><?php echo $paciente['Paciente']['dni_paciente']; ?></td>
            <td>
                <?php echo $this->Html->link('Editar', array('controller' => 'Pacientes','action'=>'edit',$paciente['Paciente']['id_paciente'])); ?>/
                <?php echo $this->Form->postLink('Borrar', array('controller' => 'Pacientes','action'=>'delete',$paciente['Paciente']['id_paciente']), array('confirm' => 'Esta seguro?')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php unset($paciente); ?>
</table>

<?php echo $this->Html->link('Volver', array('controller' => 'ObraSocials', 'action'=>'index' ));?>
