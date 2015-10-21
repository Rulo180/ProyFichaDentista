<?php echo $this->Form->create('Cara');?>

<fieldset>
    <legend>Editar Cara:</legend>
    
    <?php
        echo $this->Form->input('id_cara', array('type' => 'hidden'));
        echo $this->Form->input('cod_cara', array('label' => 'Código:'));
        echo $this->Form->input('nombre_cara', array('label' => 'Nombre:'));
    ?>
</fieldset>

<?php echo $this->Form->button('Reiniciar', array('type' => 'reset'));?>
<?php echo $this->Form->end('Guardar'); ?>