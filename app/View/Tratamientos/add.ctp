<?php echo $this->Form->create('Tratamiento');?>

<fieldset>
    <legend>Registrar Tratamiento:</legend>
    
    <?php
        echo $this->Form->input('ficha_id', array('type' => 'hidden', 'value' => $id_ficha));
    ?>
    <table>
        <tr>
            <td>Fecha:</td>
            <td>Prestación: </td>
            <td>Diente:</td>
            <td>Cara:</td>
            <td>Obra Social:</td>
        </tr>
        <tr>
             <td><?php echo $this->Form->input('fecha_trat', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 1, 'maxYear' => date('Y') + 1,'label' => 'Fecha:')); ?> </td>
             <td><?php echo $this->Form->input('prestacion_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $prestacions)); ?> </td>
             <td><?php echo $this->Form->input('diente_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $dientes)); ?> </td>
             <td><?php echo $this->Form->input('cara_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $caras)); ?> </td>
             <td><?php echo $this->Form->input('obra_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $obras)); ?> </td>
        </tr>
        
        
    </table>
    
    
</fieldset>

<?php echo $this->Form->button('Reiniciar', array('type' => 'reset'));?>
<?php echo $this->Form->end('Guardar'); ?>
