<?php echo $this->Form->create('Prestacion');?>

<fieldset>
    <legend>Registrar Prestacion:</legend>
    
    <?php
        echo $this->Form->input('nombre_prestacion', array('label' => 'Nombre:'));
        echo $this->Form->input('descripcion_prestacion', array('label' => 'Descripcion:'));
    ?>
</fieldset>

<?php echo $this->Form->end('Guardar'); ?>