<?php echo $this->Form->create('ObraSocial', array('action' => 'edit')); ?>

<fieldset>
    <legend>Editar Obra Social:</legend>
    
    <?php
        echo $this->Form->input('nombre_obra', array('label' => 'Nombre:'));
        echo $this->Form->input('codigo_obra', array('label' => 'Código:'));
        echo $this->Form->input('telefono_obra', array('label' => 'Teléfono:'));
        echo $this->Form->input('direccion_obra', array('label' => 'Dirección:'));
        echo $this->Form->input('email_obra', array('label' => 'Email:'));
        echo $this->Form->input('CUIT_obra', array('label' => 'C.U.I.T.:'));
    ?>
    
</fieldset>
<?php
    echo $this->Form->end('Guardar');
?>