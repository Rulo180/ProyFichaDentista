<?php echo $this->Form->create('Tratamiento');?>

<fieldset>
    <legend>Registrar Tratamiento:</legend>
    
    
    <table id="tablaTrat">
        <tr>
            <td>Borrar</td>
            <td>Fecha:</td>
            <td>Prestación: </td>
            <td>Diente:</td>
            <td>Cara:</td>
            <td>Obra Social:</td>
        </tr>
           <tr id="trat0">
                <td><?php echo $this->Form->button('&nbsp;-&nbsp;',array('type'=>'button','title'=>'Borrar trat', 'class' => 'botonBorrar')); ?></td>
                <td><?php echo $this->Form->input('Tratamiento.0.fecha_trat', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 1, 'maxYear' => date('Y') + 1,'label' => 'Fecha:')); ?> </td>
                <td><?php echo $this->Form->input('Tratamiento.0.prestacion_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $prestacions)); ?> </td>
                <td><?php echo $this->Form->input('Tratamiento.0.diente_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $dientes)); ?> </td>
                <td><?php echo $this->Form->input('Tratamiento.0.cara_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $caras)); ?> </td>
                <td><?php echo $this->Form->input('Tratamiento.0.obra_id', array('label' => '', 'empty' => '(Seleccionar)','options' => $obras)); ?> </td>
           </tr>            
            <tr id="trAdd"><td> <?php echo $this->Form->button('+',array('type'=>'button','title'=>'Agregar trat','class'=>'botonAgregar')); ?></td>
                <td></td> <td></td> <td></td> <td></td> <td></td>
            </tr>
           
    </table>
    
    
</fieldset>

<?php echo $this->Form->button('Reiniciar', array('type' => 'reset'));?>
<?php echo $this->Form->end('Guardar Todos'); ?>

<?php echo $this->Html->script(array('jquery-1.11.2'));?>


<script type='text/javascript'>

$(document).ready(function () {
    $(".botonBorrar").click(function(){
        $(this).parents("tr").remove();
    });

    var lastRow=0;

    $(".botonAgregar").click(function(){
        lastRow++;
        $("#trat0").clone(true).attr('id', 'trat'+lastRow).insertBefore("#trAdd");
        $("#trat"+lastRow+" button").attr('class','botonBorrar');
        $("#trat"+lastRow+" input:first").attr('name','data[Tratamiento]['+lastRow+'][fecha_trat]').attr('id','fecha_trat'+lastRow);
        $("#trat"+lastRow+" input:eq(1)").attr('name','data[Tratamiento]['+lastRow+'][prestacion_id]').attr('id','prestacion_id'+lastRow);
        $("#trat"+lastRow+" input:eq(2)").attr('name','data[Tratamiento]['+lastRow+'][diente_id]').attr('id','diente_id'+lastRow);
        $("#trat"+lastRow+" input:eq(3)").attr('name','data[Tratamiento]['+lastRow+'][cara_id]').attr('id','cara_id'+lastRow);
        $("#trat"+lastRow+" input:eq(4)").attr('name','data[Tratamiento]['+lastRow+'][obra_id]').attr('id','obra_id'+lastRow);
    });

});
</script>