<?php echo $this->Form->create('Turno');?>

<fieldset>
    <legend>Registrar Turno:</legend>
    
    <?php
        echo $this->Form->input('fecha_turno', array('minYear' => '2014', 'maxYear' => '2016', 'label' => 'Fecha:'));
        echo $this->Form->input('hora_turno', array('label' => 'Hora:'));
        echo $this->Form->label('Paciente:');
        echo $this->Form->select('paciente_id', array('options' => $pacientes));
        //echo $this->Form->select('paciente_id', array('options' =>  array('Martin' => $pacientes[1]), 'label' => 'Paciente:'));
        echo $this->Form->label('Observación:');
        echo $this->Form->textarea('observacion_turno', array('label' => 'Observación:'));
    ?>
</fieldset>

<?php echo $this->Form->end('Guardar'); ?>