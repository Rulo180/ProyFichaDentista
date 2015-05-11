<?php echo $this->Form->create('Paciente', array('action' => 'edit')); ?>

<fieldset>
    <legend>Editar Turno:</legend>
    
    <?php
        echo $this->Form->input('fecha_turno', array('minYear' => '2014', 'maxYear' => '2016', 'label' => 'Fecha:'));
        echo $this->Form->input('hora_turno', array('label' => 'Hora:'));
        echo $this->Form->input('paciente_id', array('label' => 'Paciente:'));
        echo $this->Form->label('Observación:');
        echo $this->Form->textarea('observacion_turno', array('label' => 'Observación:'));
    ?>
    
</fieldset>
<?php
    echo $this->Form->end('Guardar');
?>