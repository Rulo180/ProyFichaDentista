<?php echo $this->Form->create('Tratamiento');?>

<fieldset>
    <legend>Registrar Tratamiento:</legend>
    
    
    <table id="tablaTrats">
        <thead>
            <tr>
                <td>Borrar</td>
                <td>Fecha:</td>
                <td>Prestación: </td>
                <td>Diente:</td>
                <td>Cara:</td>
                <td>Obra Social:</td>
            </tr>
        </thead>
        <tbody>
                <?php $i=0; ?>
                <?php for($i = 0; $i < $cant; $i++){ ?>

            <tr id="trat0">
                <td><?php echo $this->Form->button('&nbsp;-&nbsp;',array('type'=>'button','title'=>'Borrar trat', 'id' => 'deleteButton', 'class' => 'deleteButton')); ?></td>
                <td><?php echo $this->Form->input('Tratamiento.'.$i.'.fecha_trat', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 1, 'maxYear' => date('Y') + 1,'label' => 'Fecha:')); ?> </td>
                <td><?php echo $this->Form->input('Tratamiento.'.$i.'.prestacion_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $prestacions)); ?> </td>
                <td><?php echo $this->Form->input('Tratamiento.'.$i.'.diente_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $dientes)); ?> </td>
                <td><?php echo $this->Form->input('Tratamiento.'.$i.'.cara_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $caras)); ?> </td>
                <td><?php echo $this->Form->input('Tratamiento.'.$i.'.obra_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $obras)); ?> </td>
            </tr>            
            <?php } ?>
        </tbody>
        <tfoot>
            <tr id="trAdd">
                <td> <?php echo $this->Form->button('+',array('type'=>'button','title'=>'Agregar trat', 'id' => 'addButton','class'=>'addButton')); ?></td>
                <td></td> <td></td> <td></td> <td></td> <td></td>
            </tr>
        </tfoot>           
    </table>
    
    
</fieldset>

<?php echo $this->Form->button('Reiniciar', array('type' => 'reset'));?>
<?php echo $this->Form->end('Guardar Todos'); ?>

<?php echo $this->Html->script(array('jquery-1.11.2'));?>
<?php echo $this->Html->script(array('funciones.js'));?>


