<?php echo $this->Form->create('PrestacionTratamiento');?>

<fieldset>
    <legend>Registrar Prestacion-Tratamiento:</legend>
    
    <?php
        echo $this->Form->input('Prestacion.prestacion_id');
        echo $this->Form->input('Tratamiento.tratamiento_id');
    ?>
</fieldset>

<?php echo $this->Form->button('Reiniciar', array('type' => 'reset'));?>
<?php echo $this->Form->end('Guardar'); ?>