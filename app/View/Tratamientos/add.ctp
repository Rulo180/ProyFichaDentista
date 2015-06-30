<?php echo $this->Form->create('Tratamiento');?>

<fieldset>
    <legend>Registrar Tratamiento:</legend>
    
    <?php
        echo $this->Form->input('ficha_id', array('type' => 'hidden', 'value' => $id_ficha));
        echo $this->Form->input('fecha_tratamiento', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 1, 'maxYear' => date('Y') + 1,'label' => 'Fecha:'));
    ?>
    <table>
        <tr>
            <td>Obra Social:</td>
            <td>Prestación: </td>
        </tr>
        <tr>
            <td><?php echo $this->Form->input('obra_id', array('label' => '', 'empty' => '(Seleccionar)')); ?> </td>
            <td><?php echo $this->Form->input('Prestacion.0', array('label' => '', 'empty' => '(Seleccionar)','options' => $prestacions)); ?> </td>
        </tr>
        <tr>
            <td><?php echo $this->Form->input('obra_id', array('label' => '', 'empty' => '(Seleccionar)')); ?> </td>
            <td><?php echo $this->Form->input('Prestacion.1', array('label' => '', 'empty' => '(Seleccionar)', 'options' => $prestacions)); ?> </td>
        </tr>
    </table>
    
</fieldset>

<fieldset>
    
    <table>
    <?php //foreach($prest_trats as $prest_trat): ?>
        <tr>
            <td><?php //echo $prest_trat['Prestacion']['id_prestacion']; ?></td>
        </tr>
    <?php //endforeach; ?>
    <?php //unset($prest_trat); ?>
    </table>
</fieldset>

<?php echo $this->Form->button('Reiniciar', array('type' => 'reset'));?>
<?php echo $this->Form->end('Guardar'); ?>