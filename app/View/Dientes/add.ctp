<?php echo $this->Form->create('Diente');?>

<fieldset>
    <legend>Registrar Diente:</legend>
    
    <?php
        echo $this->Form->input('cod_diente', array('label' => 'Código:'));
        echo $this->Form->label('Molar, Canino, Incisivo');
        echo $this->Form->input('tipo_diente', array('label' => 'Tipo:'));
    ?>
</fieldset>

<?php echo $this->Form->button('Reiniciar', array('type' => 'reset'));?>
<?php echo $this->Form->end('Guardar'); ?>