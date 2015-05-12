<?php echo $this->Form->create('Paciente');?>

<fieldset>
    <legend>Registrar Paciente:</legend>
    
    <?php
        echo $this->Form->input('nombre_paciente', array('label' => 'Nombre:'));
        echo $this->Form->input('apellido_paciente', array('label' => 'Apellido:'));
        echo $this->Form->input('nro_afiliado', array('label' => 'Nro. Afiliado:'));
        echo $this->Form->input('fecha_nac', array('minYear' => '1940', 'maxYear' => 'sysdate','label' => 'Fecha de Nac:'));
        echo $this->Form->input('profesion', array('label' => 'Profesión:'));
        echo $this->Form->input('telefono', array('label' => 'Teléfono:'));
        echo $this->Form->input('domicilio', array('label' => 'Domicilio:'));
        echo $this->Form->input('localidad', array('label' => 'Localidad:'));
    ?>
</fieldset>
    <?php echo $this->Form->button('Reiniciar', array('type' => 'reset'));?>
    <?php echo $this->Form->end('Guardar'); ?>
