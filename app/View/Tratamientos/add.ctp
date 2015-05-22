<?php echo $this->Form->create('Tratamiento');?>

<fieldset>
    <legend>Registrar Tratamiento:</legend>
    
    <?php
        echo $this->Form->input('ficha_id', array('label' => 'Paciente:', 'empty' => '(Seleccionar)'));
        echo $this->Form->input('fecha_tratamiento', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 1, 'maxYear' => date('Y') + 1,'label' => 'Fecha:'));
        echo $this->Form->input('obra_id', array('label' => 'Obra Social:', 'empty' => '(Seleccionar)'));
        echo $this->Form->input('Prestacion', array('label' => 'Prestaciónes:', 'empty' => '(Seleccionar)'));
    ?>
</fieldset>

<?php echo $this->Form->button('Reiniciar', array('type' => 'reset'));?>
<?php echo $this->Form->end('Guardar'); ?>