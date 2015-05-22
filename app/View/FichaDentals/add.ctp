<?php echo $this->Form->create('FichaDental');?>

<fieldset>
    <legend>Registrar Ficha Dental:</legend>
    
    <?php
        echo $this->Form->input('paciente_id', array('label' => 'Paciente:', 'empty' => '(Seleccionar)'));
        echo $this->Form->input('fecha_ficha', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 1, 'maxYear' => date('Y') + 1,'label' => 'Fecha:'));
        echo $this->Form->label('Observaciones:');
        echo $this->Form->textarea('observacion_ficha', array('label' => 'Observaciones:'));
    ?>
</fieldset>

<?php echo $this->Form->button('Reiniciar', array('type' => 'reset'));?>
<?php echo $this->Form->end('Guardar'); ?>
