<?php echo $this->Form->create('Prestacion');?>

<fieldset>
    <legend>Registrar Prestacion:</legend>
    
    <?php
        echo $this->Form->input('nombre_prestacion', array('label' => 'Nombre:'));
        echo $this->Form->input('codigo_prestacion', array('label' => 'Código:'));
        echo $this->Form->label('Descripción:');
        echo $this->Form->textarea('descripcion_prestacion', array('label' => 'Descripcion:'));
    ?>
</fieldset>

<?php echo $this->Form->button('Reiniciar', array('type' => 'reset'));?>
<?php echo $this->Form->end('Guardar'); ?>