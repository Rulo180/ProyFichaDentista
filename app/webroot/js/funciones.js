    var lastRow=0;
    
$(document).ready(function () {
    
    //Asocia la función delete a cada botón, 
    //cuando renderiza la tabla por primera vez
    $('.btn-delete').on('click', deleteRow);
    
    //Asocia la funcion para añadir una nueva fila al boton,
    //En este caso como es único, se asocia mediante id
    $('#addButton').on('click', addRow);
  
});

function deleteRow() {
    var deleteButton = this;
    var row = $(deleteButton).parents('tr');
    
    row.remove();
    lastRow--;
}

function addRow() {    
    
    lastRow++;
    $("#trat0").clone(true).attr('id', 'trat'+lastRow).insertBefore("tfoot");
    $("#trat"+lastRow+" button").attr('class','botonBorrar');
    $("#trat"+lastRow+" select:first").attr('name','data[Tratamiento]['+lastRow+'][fecha_trat][day]').attr('id','fecha_trat_day'+lastRow);
    $("#trat"+lastRow+" select:eq(1)").attr('name','data[Tratamiento]['+lastRow+'][fecha_trat][month]').attr('id','fecha_trat_month'+lastRow);
    $("#trat"+lastRow+" select:eq(2)").attr('name','data[Tratamiento]['+lastRow+'][fecha_trat][year]').attr('id','fecha_trat_year'+lastRow);
    $("#trat"+lastRow+" select:eq(3)").attr('name','data[Tratamiento]['+lastRow+'][prestacion_id]').attr('id','prestacion_id'+lastRow);
    $("#trat"+lastRow+" select:eq(4)").attr('name','data[Tratamiento]['+lastRow+'][diente_id]').attr('id','diente_id'+lastRow);
    $("#trat"+lastRow+" select:eq(5)").attr('name','data[Tratamiento]['+lastRow+'][cara_id]').attr('id','cara_id'+lastRow);
    $("#trat"+lastRow+" select:eq(6)").attr('name','data[Tratamiento]['+lastRow+'][obra_id]').attr('id','obra_id'+lastRow);

//Solucion Diego

//    //Obtiene el cuerpo de la tabla
//    var $tbody = $('#myTable').find('tbody');
//
//    //Crea la nueva fila
//    var newRow = '<tr><td>Soy una nueva Fila!!!</td><td><button id="myButton" class="btn btn-danger btn-delete" type="button">Quitar</button></td></tr>';
//
//    //Agrega la nueva fila al cuerpo de la tabla
//    $tbody.append(newRow);
//
//    //Quita los eventos de los botones eliminar, ya que los nuevos botones que se agreguen no estarán asociados
//    $('.btn-delete').off();
//
//    //Vuelve a asignar el evento de eliminar, así lo agrega a los 
//    //nuevos botones
//    $('.btn-delete').on('click', deleteRow);


}


