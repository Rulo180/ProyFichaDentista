<?php echo $this->Form->create('Tratamiento');?>

<fieldset>
    <legend>Registrar Tratamiento:</legend>
    
    <?php
        echo $this->Form->label($id_ficha);
        $options = array($id_ficha => $id_ficha);
        echo $this->Form->input('ficha_id',array('options' => $options, 'empty' => '(Seleccionar)'));
        echo $this->Form->input('fecha_tratamiento', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 1, 'maxYear' => date('Y') + 1,'label' => 'Fecha:'));
        echo $this->Form->input('obra_id', array('label' => 'Obra Social:', 'empty' => '(Seleccionar)'));
        echo $this->Form->input('Prestacion');
    ?>
</fieldset>

<fieldset>
    <?php
        echo $this->Form->create('PrestacionTratamiento');
        echo $this->Form->input('PrestacionTratamiento.tratamiento_id', array('value' => $id_ficha));
        echo $this->Form->input('PrestacionTratamiento.prestacion_id');
        echo $this->Form->end('Guardar');
        ?>
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