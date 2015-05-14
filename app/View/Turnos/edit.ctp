<?php echo $this->Form->create('Paciente', array('action' => 'edit')); ?>

<fieldset>
    <legend>Editar Turno:</legend>
    
    <?php
        echo $this->Form->input('fecha_turno', array('dateFormat' => 'DMY','minYear' => date('Y'), 'maxYear' => date('Y') + 1, 'label' => 'Fecha:'));
        echo $this->Form->input('hora_turno', array('timeFormat' => '24','label' => 'Hora:'));
        echo $this->Form->input('paciente_id', array('label' => 'Paciente:'));
        echo $this->Form->label('Observación:');
        echo $this->Form->textarea('observacion_turno', array('label' => 'Observación:'));
    ?>
    
</fieldset>
<?php
    echo $this->Form->end('Guardar');
?>