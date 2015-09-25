<?php echo $this->Form->create('Tratamiento');?>

<fieldset>
    <legend>Registrar Tratamiento:</legend>
    
    <?php
        echo $this->Form->input('ficha_id', array('type' => 'hidden', 'value' => $id_ficha));
    ?>
    <table>
        <tr>
            <td>Prestación: </td>
            <td>Obra Social:</td>
        </tr>
        <tr>
            <td><?php echo $this->Form->input('prestacion_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $prestacions)); ?> </td>
            <td><?php echo $this->Form->input('obra_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $obras)); ?> </td>
        </tr>
    </table>
    
    
</fieldset>

<?php echo $this->Form->button('Reiniciar', array('type' => 'reset'));?>
<?php echo $this->Form->end('Guardar'); ?>
