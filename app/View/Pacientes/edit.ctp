<?php
    echo $this->Form->create('Paciente', array('action' => 'edit'));
?>
<fieldset>
    <legend>Editar Paciente</legend>
        <?php
        echo $this->Form->input('nombre_paciente', array('label' => 'Nombre:'));
        echo $this->Form->input('apellido_paciente', array('label' => 'Apellido:'));
        echo $this->Form->input('fecha_nac', array('label' => 'Fecha de Nac:'));
        echo $this->Form->input('profesion', array('label' => 'Profesión:'));
        echo $this->Form->input('telefono', array('label' => 'Teléfono:'));
        echo $this->Form->input('domicilio', array('label' => 'Domicilio:'));
        echo $this->Form->input('localidad', array('label' => 'Localidad:'));
    ?>
</fieldset>
<?php
    echo $this->Form->end('Guardar');
?>