<?php echo $this->Form->create('Tratamiento');?>

<fieldset>
    <legend>Registrar Tratamiento:</legend>
    
    <?php
        echo $this->Form->input('ficha_id',array('options' => array($id_ficha), 'type' => 'hidden'));
        echo $this->Form->input('fecha_tratamiento', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 1, 'maxYear' => date('Y') + 1,'label' => 'Fecha:'));
        echo $this->Form->input('obra_id', array('label' => 'Obra Social:', 'empty' => '(Seleccionar)'));
        echo $this->Form->input('Prestacion', array('label' => 'Prestación:', 'empty' => '(Seleccionar)'));
    ?>
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