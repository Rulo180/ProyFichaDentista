<?php
    echo $this->Form->create('FichaDental', array('action' => 'edit'));
?>
<fieldset>
    <legend>Editar FichaDental</legend>
    <?php
        echo $this->Form->input('paciente_id', array('label' => 'Paciente:', 'empty' => '(Seleccionar)'));
        echo $this->Form->input('fecha_ficha', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 1, 'maxYear' => date('Y') + 1,'label' => 'Fecha:'));
        echo $this->Form->textarea('observacion_ficha', array('label' => 'Observaciones:'));
    ?>
</fieldset>
<?php
    echo $this->Form->end('Guardar');
?>