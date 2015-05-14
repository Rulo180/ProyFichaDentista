<?php echo $this->Form->create('Turno');?>

<fieldset>
    <legend>Registrar Turno:</legend>
    
    <?php
        echo $this->Form->input('fecha_turno', array('dateFormat' => 'DMY','minYear' => date('Y'), 'maxYear' => date('Y') + 1, 'label' => 'Fecha:'));
        echo $this->Form->input('hora_turno', array('timeFormat' => '24','label' => 'Hora:'));
        echo $this->Form->input('paciente_id', array('label' => 'Paciente:', 'empty' => '(Seleccionar)'));
        echo $this->Form->label('Observación:');
        echo $this->Form->textarea('observacion_turno', array('label' => 'Observación:'));
    ?>
</fieldset>

<?php echo $this->Form->end('Guardar'); ?>