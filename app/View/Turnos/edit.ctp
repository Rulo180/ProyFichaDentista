<?php
    echo $this->Form->create('Paciente', array('action' => 'edit'));
?>
<fieldset>
    <legend>Editar Turno:</legend>
    <?php
        echo $this->Form->input('fecha_turno', array('label' => 'Fecha:'));
        echo $this->Form->input('hora_turno', array('label' => 'Hora:'));
        echo $this->Form->input('paciente_id', array('label' => 'Paciente:'));
    ?>
</fieldset>
<?php
    echo $this->Form->end('Guardar');
?>