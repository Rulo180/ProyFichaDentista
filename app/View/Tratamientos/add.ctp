<?php echo $this->Form->create('Tratamiento');?>

<fieldset>
    <legend>Registrar Tratamiento:</legend>
    
    
    <table id="tablaTrats">
        <thead>
            <tr>
                <th>Borrar</th>
                <th>Fecha:</th>
                <th>Prestación:</th>
                <th>Diente:</th>
                <th>Cara:</th>
                <th>Obra Social:</th>
            </tr>
        </thead>
        <tbody>
            <tr id="trat0">
                <td><?php echo $this->Form->button('&nbsp;-&nbsp;',array('type'=>'button','title'=>'Borrar tratamiento', 'class' => 'deleteButton')); ?></td>
                <td><?php echo $this->Form->input('0.fecha_trat', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 1, 'maxYear' => date('Y') + 1,'label' => 'Fecha:')); ?> </td>
                <td><?php echo $this->Form->input('0.prestacion_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $prestacions)); ?> </td>
                <td><?php echo $this->Form->input('0.diente_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $dientes)); ?> </td>
                <td><?php echo $this->Form->input('0.cara_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $caras)); ?> </td>
                <td><?php echo $this->Form->input('0.obra_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $obras)); ?> </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td> <?php echo $this->Form->button('+',array('type'=>'button','title'=>'Agregar tratamiento', 'id' => 'addButton','class'=>'addButton')); ?></td>
                <td></td> <td></td> <td></td> <td></td> <td></td>
            </tr>
        </tfoot>   
    </table>
    
    
</fieldset>

<?php echo $this->Form->button('Reiniciar', array('type' => 'reset'));?>
<?php echo $this->Form->end('Guardar Todos'); ?>

<?php echo $this->Html->script(array('jquery-2.1.4'));?>
<?php echo $this->Html->script(array('funciones.js'));?>
