<?php
    echo $this->Form->create('Tratamiento', array('action' => 'edit'));
?>
<fieldset>
    <legend>Editar Tratamiento:</legend>
    <?php
        echo $this->Form->input('ficha_id', array('label' => 'Paciente:', 'empty' => '(Seleccionar)'));
        echo $this->Form->input('fecha_tratamiento', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 1, 'maxYear' => date('Y') + 1,'label' => 'Fecha:'));
    ?>
    <table>
        <tr>
            <td>Obra Social:</td>
            <td>Diente:</td>
            <td>Cara:</td>
            <td>Prestación: </td>
        </tr>
        <tr>
            <td><?php echo $this->Form->input('obra_id', array('label' => '', 'empty' => '(Seleccionar)')); ?> </td>
            <td><?php echo $this->Form->input('diente_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $dientes)); ?> </td>
            <td><?php echo $this->Form->input('cara_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $caras)); ?> </td>
            <td><?php echo $this->Form->input('Prestacion.0', array('label' => '', 'empty' => '(Seleccionar)', 'options' => $prestacions)); ?> </td>
        </tr>
    </table>
    
    
</fieldset>
<?php
    echo $this->Form->end('Guardar');
?>