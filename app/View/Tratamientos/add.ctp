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
    
    <table id="mytable">
	<tr><th></th><th>Prestación</th></tr>
	<tr id="prestacion0" >
		<td><?php echo $this->Form->button('&nbsp;-&nbsp;',array('type'=>'button')); ?></td>
		<td><?php echo $this->Form->input('unused.Prestacion', array('label' => '', 'empty' => '(Seleccionar)', 'options' => $prestacions)); ?></td>
	</tr>
	<tr id="trAdd"><td> <?php echo $this->Form->button('+',array('type'=>'button','onclick'=>'addPrestacion()')); ?> </td><td></td></tr>
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


<?php echo $this->Html->script(array('jquery-2.1.4'));?>
<script type='text/javascript'>
	var lastRow=0;
	
	function addPrestacion() {
		lastRow++;
		$("#mytable tbody>tr:#prestacion0").clone(true).attr('id','prestacion'+lastRow).removeAttr('style').insertBefore("#mytable tbody>tr:#trAdd");
		$("#prestacion"+lastRow+" button").attr('onclick','removePerson('+lastRow+')');
		$("#prestacion"+lastRow+" input:first").attr('name','[Prestacion]['+lastRow+']').attr('id','id_prestacion'+lastRow);
                $("#prestacion"+lastRow+" select").attr('name','data[Prestacion]['+lastRow+']').attr('id','id_prestacion'+lastRow);
	}
	
	function removePrestacion(x) {
		$("#prestacion"+x).remove();
	}
</script>